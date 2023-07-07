<!-- Jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Datatables -->
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>


  <!-- SweetAlert 2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



   
        <!--font-awesome js-->
    <script src="{{asset('frontend')}}/js/Font-Awesome.js"></script>
    <!--select2 js-->
    <script src="{{asset('frontend')}}/js/select2.min.js"></script>

    <script src="{{asset('frontend')}}/js/main.js"></script>

    <!--slick slider js-->
    <script src="{{asset('frontend')}}/js/slick.min.js"></script>
    <!--simplyCountdown js-->
    <script src="{{asset('frontend')}}/js/simplyCountdown.js"></script>
    <!--product zoomer js-->
    <script src="{{asset('frontend')}}/js/jquery.exzoom.js"></script>
    <!--nice-number js-->
    <script src="{{asset('frontend')}}/js/jquery.nice-number.min.js"></script>
    <!--counter js-->
    <script src="{{asset('frontend')}}/js/jquery.waypoints.min.js"></script>
    <script src="{{asset('frontend')}}/js/jquery.countup.min.js"></script>
    <!--add row js-->
    <script src="{{asset('frontend')}}/js/add_row_custon.js"></script>
    <!--multiple-image-video js-->
    <script src="{{asset('frontend')}}/js/multiple-image-video.js"></script>
    <!--sticky sidebar js-->
    <script src="{{asset('frontend')}}/js/sticky_sidebar.js"></script>
    <!--price ranger js-->
    <script src="{{asset('frontend')}}/js/ranger_jquery-ui.min.js"></script>
    <script src="{{asset('frontend')}}/js/ranger_slider.js"></script>
    <!--isotope js-->
    <script src="{{asset('frontend')}}/js/isotope.pkgd.min.js"></script>
    <!--venobox js-->
    <script src="{{asset('frontend')}}/js/venobox.min.js"></script>
    <!--classycountdown js-->
    <script src="{{asset('frontend')}}/js/jquery.classycountdown.js"></script>

    <script src="{{asset('backend')}}/assets/modules/summernote/summernote-bs4.js"></script>

  
    
    
    <script>
      $('.summernote').summernote({
        tabsize: 2,
        height: 150
      });
    </script>


<script type="text/javascript">
// Products Table 
var producttable = $('#product-table').DataTable({
stateSave: true,
processing: true,
serverSide: true,
ajax: "/vendor/product",
columns: [
{data: 'DT_RowIndex', name: '', orderable: false, searchable: false},
{ data: 'thumbnail', name: 'thumbnail'},
{ data: 'name', name: 'name'},
{ data: 'vendor_id', name: 'vendor_id'},
{ data: 'brand_id', name: 'brand_id'},
{ data: 'category_id', name: 'category_id'},
{ data: 'price', name: 'price'},
{ data: 'type', name: 'type'},
{ data: 'qty', name: 'qty'},
{ data: 'status', name: 'status'},
{data: 'action', name: 'action', orderable: false , width:'200'},
],
order: [[0, 'desc']]
});
</script>