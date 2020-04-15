<?php

namespace App\Http\Controllers\Front;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Post;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function store(PaymentRequest $request)
    {

        $data = $request->all();

        $description = ' دعم العضويات في موقع اسعاد ';
        $source = [
            'type' => 'creditcard',
            'name' => $data['source']['name'],
            'number' => $data['source']['number'],
            'month' => $data['source']['month'],
            'year' => $data['source']['year'],
            'cvc' => $data['source']['cvc'],
        ];

        $result = $this->get_payment_link($data['amount'], $description, $source);

        if (@$result->id) {

            $membership_ids = explode(',', $data['membership_id']);

            foreach ($membership_ids as $id) {
                $member = Post::find($id);
                if (isset($member)) {
                    $transaction['name'] = $data['name'];
                    $transaction['phone'] = $data['phone'];
                    $transaction['membership_id'] = $id;
                    $transaction['payment_id'] = $result->id;
                    $transaction['status'] = $result->status;
                    $transaction['currency'] = $result->currency;
                    $transaction['amount'] = ($member->data['price']??0);
                    $transaction['credit'] = $result->source->company;
                    $transaction['number'] = $result->source->number;

                    Transaction::create($transaction);
                }
            }


            return $this->response_api(true , $result->source->transaction_url , StatusCodes::OK);
        } else {
            return $this->response_api(false ,  __('front.error') , StatusCodes::INTERNAL_ERROR);
        }


    }

    public function get_payment_link($amount, $description, array $source = [])
    {

        $msg_lang = strtolower('arabic');
        $fields = array_merge([
            //unused default values but must be sent through gateway
            'amount' => $amount,
            'currency' => 'SAR',
            'description' => $description,
            'source' => $source,
            'callback_url' => url('pay/status'),
        ]);


        return $this->sendPayment($fields);

    }


    public function sendPayment($fields)
    {

        $fields['publishable_api_key'] = config('moyasar.publishable_key');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.moyasar.com/v1/payments');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result);
    }


    function get_ip()
    {
        $ip = "0.0.0.0";
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public function status(Request $request)
    {

        if (@$request->id && $request->failed == "paid") {
            $item = Transaction::where('payment_id', $request->id)->update(['status' => $request->status]);;
            return redirect('/')->with('success', __('front.success'));
        }else{
            $item = Transaction::where('payment_id', $request->id)->update(['status' => $request->status]);;
            return redirect('/')->with('error', __($request->message));
        }
    }
}
