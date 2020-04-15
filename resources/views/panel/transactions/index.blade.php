@extends('panel.layout.master' , ['title' => 'الحركات المالية'])

@push('css')
    <link href="{{asset('panelAssets/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css"/>
@endpush


@section('content_head')
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">الحركات المالية</h3>
            </div>
        </div>
    </div>

@endsection

@section('content')
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand fa fa-money-bill"></i>
										</span>
                <h3 class="kt-portlet__head-title">
                    الحركات المالية
                </h3>
            </div>

        </div>
        <div class="kt-portlet__body">

            <!--begin: Search Form -->
            <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">

                <div class="row align-items-center">
                    <div class="col-xl-12 order-2 order-xl-1">

                        <div class="row align-items-center">
                            <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                <div class="kt-input-icon kt-input-icon--left">
                                    <input type="text" class="form-control"
                                           placeholder="بحث" id="generalSearch">
                                    <span class="kt-input-icon__icon kt-input-icon__icon--left">
																<span><i class="la la-search"></i></span>
															</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>

            <!--end: Search Form -->
        </div>
        <div class="kt-portlet__body kt-portlet__body--fit">

            <!--begin: Datatable -->
            <div class="kt-datatable text-center" id="ajax_data"></div>

            <!--end: Datatable -->
        </div>
    </div>
@endsection


@push('js')
    <script src="{{asset('panelAssets/js/jquery.dataTables.js')}}" type="text/javascript"></script>
    <script src={{asset('panelAssets/js/data-ajax.js')}}  type="text/javascript"></script>


    <script>

        window.data_url = '{{ route('panel.transactions.datatable') }}';

        window.columns = [
            {
                field: ' ',
                title: "الرقم التسلسلي",
                width: 100,
                textAlign: "center",
                template: function (data , index, datatable) {
                    return ( (datatable.getCurrentPage() - 1) * datatable.getPageSize() ) +  index + 1;
                },
            },
            {
                field: 'name',
                title: "الإسم",
                textAlign: "center",

            },
            {
                field: 'phone',
                title: "رقم الجوال",
                textAlign: "center",

            },
            {
                field: 'member_id',
                title: "الداعية",
                textAlign: "center",
                template : function (data) {
                    return data.member.name;
                }

            },
            {
                field: 'status',
                title: "الحالة",
                textAlign: "center",

            },
            {
                field: 'amount',
                title: "المبلغ",
                textAlign: "center",
                template : function (data) {
                    return data.amount + " " + data.currency;
                }
            },
        ];


    </script>


@endpush
