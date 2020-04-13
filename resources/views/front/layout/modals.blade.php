
<div class="modal fade ModalVideo" id="ModalVideoMaster" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <iframe src="https://www.youtube.com/embed/dXpyoSe7yWo"  class="videoModal"></iframe>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="ModalPayment" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="modal-title">اختر طريقة الدفع</h3>
                <div class="widget__item-list">
                    <div class="widget__item-2">
                        <div class="widget__item-action"><i class="fa fa-times-circle"></i></div>
                        <div class="widget__item-content">
                            <div class="widget__item-image">
                                <img src="{{ asset('frontAssets/images/img-4.png') }}" alt="">
                            </div>
                            <div class="widget__item-info">
                                <h3 class="widget__item-title">عضوية التميز</h3>
                                <p class="widget__item-price">220 ريال</p>
                            </div>
                        </div>
                        <div class="widget__item-total">234 <span>ريال</span></div>
                    </div>
                    <div class="widget__item-2">
                        <div class="widget__item-action"><i class="fa fa-times-circle"></i></div>
                        <div class="widget__item-content">
                            <div class="widget__item-image">
                                <img src="images/img-4.png" alt="">
                            </div>
                            <div class="widget__item-info">
                                <h3 class="widget__item-title">عضوية التميز</h3>
                                <p class="widget__item-price">220 ريال</p>
                            </div>
                        </div>
                        <div class="widget__item-total">234 <span>ريال</span></div>
                    </div>
                </div>
                <h3 class="modal-title">اختر طريقة الدفع</h3>
                <div class="list-payment-method">
                    <label class="m-radio mb-0">
                        <input type="radio" checked name="checkbox"><span class="checkmark"></span><img src="{{ asset('frontAssets/images/visa.png') }}" alt="">
                    </label>
                    <label class="m-radio mb-0">
                        <input type="radio" name="checkbox"><span class="checkmark"></span><img src="{{ asset('frontAssets/images/mastercard.png') }}" alt="">
                    </label>
                    <label class="m-radio mb-0">
                        <input type="radio" name="checkbox"><span class="checkmark"></span><img src="{{ asset('frontAssets/images/mada.png') }}" alt="">
                    </label>
                </div>
                <form action="" class="form-payment">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="رقم البطاقة">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="الإسم على البطاقة ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="تاريخ الإنتهاء">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="الرقم السري">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="الإسم الكريم">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="رقم الجوال">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="total"><h3 class="pl-2">الإجمالي</h3>431<span>ريال </span></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <div class="form-group mb-0">
                                <button type="submit" class="general_btn_lg">ادفع الان</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end:: Page -->
