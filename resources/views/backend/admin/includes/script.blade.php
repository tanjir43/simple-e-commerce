<script src="{{asset('/')}}admin-assets/js/jquery-3.6.0.js"></script>
<script src="{{asset('/')}}admin-assets/js/bootstrap.js"></script>

<script src="{{asset('/')}}admin-assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}admin-assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}admin-assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}admin-assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}admin-assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL PLUGINS-->
<script src="{{asset('/')}}admin-assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}admin-assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}admin-assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<script src="{{asset('/')}}admin-assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
<script src="{{asset('/')}}admin-assets/js/datatables.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<!-- CORE SCRIPTS-->
<script src="{{asset('/')}}admin-assets/js/app.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}admin-assets/js/bootstrap-notify.min.js"></script>
<!-- PAGE LEVEL SCRIPTS-->
<script src="{{asset('/')}}admin-assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>


<script type="text/javascript">
    $(function() {
        $('#summernote').summernote();
        $('#summernote_air').summernote({
            airMode: true
        });
    });
</script>

<script>
    $(document).on('change','#categoryId',function () {
        var categoryId = $(this).val();
        $.ajax({
            method: 'GET',
            url:'{{url('/get-sub-category-by-id')}}',
            data:{id: categoryId},
            dataType:'json',
            success: function (res) {
                var option ='';
                option += '<option value="" disabled selected> -- Select Sub Category Name -- </option>'
                $.each(res,function (key, value) {
                    option += '<option value="'+value.id+'">'+value.name+'</option>';
                });
                $('#subcategoryId').empty().append(option);
            },
            error:function (e) {
                console.log(e);
            }
        });
    });
</script>

<script>
    setTimeout(function () {
        $('#alert').slideUp();
    },4000);
</script>


<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>


<script>
    $('#lfm').filemanager('image');
</script>
<script>
    $('#lfm1').filemanager('image');
</script>

<script>
    $(document).ready(function() {
        $('#example-table').DataTable();
    } );
</script>

@yield('scripts')















