@extends('panel.layout.master' , ['title' => 'الرئيسية'])

@section('content_head')
    <div class="kt-subheader  kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">لوحة التحكم</h3>
            </div>
        </div>
    </div>

@endsection


@section('content')
    <!--Begin::Row-->

    <div class="kt-portlet">
        <div class="kt-portlet__body  kt-portlet__body--fit">
            <div class="row row-no-padding row-col-separator-lg">

                <div class="col-md-  col-lg-6 col-xl-3">
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__info">
                                <h4 class="kt-widget24__title">
                                    عدد عمليات الدفع
                                </h4>
                            </div>
                            <span class="kt-widget24__stats kt-font-brand">{{ $transactions }}</span>
                        </div>

                        <div class="progress progress--sm">
                            <div class="progress-bar kt-bg-brand" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="kt-widget24__action"></div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__info">
                                <h4 class="kt-widget24__title">
                                    المبلغ المدفوع
                                </h4>
                            </div>
                            <span class="kt-widget24__stats kt-font-warning">{{ $total_amount }}</span>
                        </div>
                        <div class="progress progress--sm">
                            <div class="progress-bar kt-bg-warning" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>


                <div class="col-md-  col-lg-6 col-xl-3">
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__info">
                                <h4 class="kt-widget24__title">
                                    عدد العمليات الناجحة
                                </h4>
                            </div>
                            <span class="kt-widget24__stats kt-font-success">{{ $successTransactions }}</span>
                        </div>

                        <div class="progress progress--sm">
                            <div class="progress-bar kt-bg-success" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="kt-widget24__action"></div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-6 col-xl-3">
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__info">
                                <h4 class="kt-widget24__title">
                                    عدد العمليات الفاشلة
                                </h4>
                            </div>
                            <span class="kt-widget24__stats kt-font-danger">{{ $failedTransactions }} </span>
                        </div>
                        <div class="progress progress--sm">
                            <div class="progress-bar kt-bg-danger" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!--End::Row-->
@endsection
