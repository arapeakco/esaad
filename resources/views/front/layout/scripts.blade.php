<script src="{{ asset('frontAssets/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/wow.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/sweetalert2.init.js') }}"></script>
<script src="{{ asset('frontAssets/js/jqueryValidate.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/chart.bundle.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('frontAssets/js/function.js') }}"></script>


<script>

    $('#ModalPayment').on('show.bs.modal', function (e) {

        var image = $(e.relatedTarget).data('image');
        var name = $(e.relatedTarget).data('name');
        var price = $(e.relatedTarget).data('price');
        var id = $(e.relatedTarget).data('id');

        $(this).find('#membership').find('.widget__item-image img').attr('src', image);
        $(this).find('#membership').find('.widget__item-title').text(name);
        $(this).find('#membership').find('.widget__item-price').text(price + " ريال سعودي ");
        $(this).find('#membership').find('.widget__item-total').text(price + " ريال سعودي ");
        $(this).find('#total').text(price);

        $(this).find('form input[name=amount]').val(price);
        $(this).find('form input[name=membership_id]').val(id);

    });

    @if(session('error'))

    swal.fire("{{ session('error') }}", " ", "error");

    @endif

    @if(session('success'))

    swal.fire("{{ session('success') }}", " ", "success");

    @endif

    @if($errors->any())

    swal.fire("{{ $errors->first() }}", " ", "error");

    @endif


</script>
