<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.includes.meta')
    <title>{{get_setting('title')}} - @yield('title')</title>
    @include('frontend.includes.style')
</head>
<body>
<div class="page-wrapper p-0" style="min-height: 0%">

    <header class="header header-intro-clearance header-4" id="header-ajax">
     @include('frontend.includes.header')
    </header>
{{--    <div class="row"><div class="col-md-12">@include('backend.admin.notification')</div></div>--}}

    @yield('body')
    @include('frontend.includes.footer')

</div>

@include('frontend.includes.script')


<script>
    $(document).ready(function () {
        var path = "{{route('autosearch')}}";
        $('#search_text').autocomplete({
            source:function (request,response) {
                $.ajax({
                    url:path,
                    dataType: "JSON",
                    data:{
                        term:request.term
                    },
                    success:function (data) {
                        response(data);
                    }
                });
            },
            minLength:1,
        });
    });
</script>


<script>
    $(document).on('click','.cart-delete',function (e) {
        e.preventDefault();
        var cart_id = $(this).data('id');
        var token = "{{csrf_token()}}";
        var path  = "{{route('cart.delete')}}";

        $.ajax({
            url:path,
            type: "POST",
            dataType : "JSON",
            data:{
                cart_id:cart_id,
                _token:token,
            },
            success:function (data) {
                console.log(data);

                $('body #header-ajax').html(data['header']);
                $('body #cart_counter').html(data['cart_count']);

                if(data['status']){
                    swal({
                        title: "Good job!",
                        text: data['message'],
                        icon: "success",
                        button: "Ok",
                    });
                }
            },
            error:function (err) {
                console.log(err);
            }
        });
    });
</script>

<script>
    function currency_change(currency_code){
        $.ajax({
            type: 'POST',
            url: '{{route('currency.load')}}',
            data:{
              currency_code:currency_code,
              _token: '{{csrf_token()}}',
            },
            success:function (response) {
                if (response['status']){
                    location.reload();
                }
                else{
                    alert('server error');
                }
            }
        });
    }
</script>
</body>
</html>
