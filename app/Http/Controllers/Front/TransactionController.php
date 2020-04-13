<?php

namespace App\Http\Controllers\Front;

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
        $membership = Post::find($data['membership_id']);

        $description = ' دعم ' . $membership->name;
        $source = [
            'type' => 'creditcard',
            'name' => $data['source']['name'],
            'number' => $data['source']['number'],
            'month' => $data['source']['month'],
            'year' => $data['source']['year'],
            'cvc' => $data['source']['cvv'],
        ];

        $result = $this->get_payment_link(100, $description, $source);

        if (@$result->id){
            $transaction['name'] = $data['name'];
            $transaction['phone'] = $data['phone'];
            $transaction['membership_id'] = $data['membership_id'];
            $transaction['payment_id'] = $result->id;
            $transaction['status'] = $result->status;
            $transaction['currency'] = $result->currency;
            $transaction['amount'] = $result->amount;
            $transaction['credit'] = $result->source->company;
            $transaction['number'] = $result->source->number;

            Transaction::create($transaction);

            return redirect()->to($result->source->transaction_url);
        }else{
            return back()->with('error' , __('front.error'));
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
        if (@$request->id){
            $item = Transaction::where('payment_id' , $request->id)->first();
            $item->update(['status' => $request->status ]);

            return redirect('/')->with('success' , __('front.success'));
        }
    }
}
