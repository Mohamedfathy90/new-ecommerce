<!-- Jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Datatables -->
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>


  <!-- SweetAlert 2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- General JS Scripts -->
  <!-- <script src="{{asset('backend')}}/assets/modules/jquery.min.js"></script> -->
  <script src="{{asset('backend')}}/assets/modules/popper.js"></script>
  <script src="{{asset('backend')}}/assets/modules/tooltip.js"></script>
  <script src="{{asset('backend')}}/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="{{asset('backend')}}/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="{{asset('backend')}}/assets/modules/moment.min.js"></script>
  <script src="{{asset('backend')}}/assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="{{asset('backend')}}/assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
  <script src="{{asset('backend')}}/assets/modules/chart.min.js"></script>
  <script src="{{asset('backend')}}/assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="{{asset('backend')}}/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="{{asset('backend')}}/assets/modules/summernote/summernote-bs4.js"></script>
  <script src="{{asset('backend')}}/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  

  
   <!-- IconPicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker-iconset-all.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker.min.js"></script>
 
  
  
  
  
  
  <!-- Page Specific JS File -->
  <!-- <script src="{{asset('backend')}}/assets/js/page/index-0.js"></script> -->
  
  <!-- Template JS File -->
  <script src="{{asset('backend')}}/assets/js/scripts.js"></script>
  <script src="{{asset('backend')}}/assets/js/custom.js"></script>
   
<script  type="text/javascript">

// Slider Table 
var slidertable = $('#slider-table').DataTable({
ajax: "data.json",
stateSave: true,
processing: true,
serverSide: true,
ajax: "/admin/slider",
columns: [
{data: 'DT_RowIndex', name: '', orderable: false, searchable: false},
{ data: 'image', name: 'image' },
{ data: 'type', name: 'type' },
{ data: 'title', name: 'title' },
{ data: 'price', name: 'price' },
{ data: 'order', name: 'order' },
{ data: 'status', name: 'status' },
{ data: 'url', name: 'url' },
{data: 'action', name: 'action', orderable: false},
],
order: [[0, 'desc']]
});


// Category Table 
var categorytable = $('#category-table').DataTable({
stateSave: true,
processing: true,
serverSide: true,
ajax: "/admin/category",
columns: [
{data: 'DT_RowIndex', name: '', orderable: false, searchable: false},
{ data: 'icon', name: 'icon' },
{ data: 'name', name: 'name' },
{ data: 'status', name: 'status' },
{data: 'action', name: 'action', orderable: false},
],
order: [[0, 'desc']]
});


// subCategory Table 
var subcategorytable = $('#subcategory-table').DataTable({
stateSave: true,
processing: true,
serverSide: true,
ajax: "/admin/subcategory",
columns: [
{data: 'DT_RowIndex', name: '', orderable: false, searchable: false},
{ data: 'name', name: 'name' },
{ data: 'category', name: 'category'},
{ data: 'status', name: 'status' },
{data: 'action', name: 'action', orderable: false},
],
order: [[0, 'desc']]
});



// delete action
$(document).on('click','.show_confirm',function (event){
	event.preventDefault();
	var requestURL= $(this).data('url');
	var table= $(this).data('table');
  Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
  })
  .then((result) => {
  if (result.isConfirmed) {
    $.ajax({
      headers:{
			'x-csrf-token':$('meta[name="csrf-token"]').attr('content')
			},
      url  : requestURL ,
      type : "DELETE" , 
      success : function(data) {
      Swal.fire(
      'Deleted!',
      data.message,
      'success'
    )
    switch (table) {
      case "slider":
      slidertable.ajax.reload(); 
      break;
      case "category":
      categorytable.ajax.reload(); 
      break;
      case "subcategory":
      subcategorytable.ajax.reload(); 
      break;
    }
    }
    })
  }
  })
})




// retrieve subcategories depending on category selection

$(document).on('change','.select-category',function (event){
  var requestURL   = $(this).data('url')+$('.select-category').find(":selected").val();
  $.ajax({
      headers:{
			'x-csrf-token':$('meta[name="csrf-token"]').attr('content')
			},
      url  : requestURL ,
      type : "POST" , 
     success : function(data) {
      var $el = $(".select-subcategory");
      $el.empty(); // remove old options
      $.each(data, function (i, value) {
      $('.select-subcategory').append('<option value=' + value.id + '>' + value.name + '</option>');
      });
     } 
   });
})






$(document).on('click','.change-status',function (event){
  var requestURL   = $(this).data('url');
  var requesttable = $(this).data('table')
  $.ajax({
      headers:{
			'x-csrf-token':$('meta[name="csrf-token"]').attr('content')
			},
      url  : requestURL ,
      type : "POST" , 
    success : function() {
      switch (requesttable) {
      case "category":
      categorytable.ajax.reload(); 
      break;
      case "subcategory":
      subcategorytable.ajax.reload(); 
      break;
    }
    } 
  });
})











</script>