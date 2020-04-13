<script src="{{ asset('frontAssets/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/wow.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/jqueryValidate.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontAssets/js/function.js') }}"></script>


<script>

    window.addEventListener('load', (event) => {
        $.ajax({
            url: "/faqs",
            method: "get",
            success: function (response) {
                $('#accordion').append(response.data.html);
                if (!response.data.next) {
                    $('#more').addClass('d-none');
                } else {
                    $('#more').data('url', response.data.next);
                }
            }
        })
    });

    $(document).on('click', 'a#more', function () {
        $.ajax({
            url: $(this).data('url'),
            method: "get",
            success: function (response) {
                $('#accordion').append(response.data.html);
                if (!response.data.next) {
                    $('#more').addClass('d-none');
                } else {
                    $('#more').data('url', response.data.next);
                }
            }
        })
    })
</script>
