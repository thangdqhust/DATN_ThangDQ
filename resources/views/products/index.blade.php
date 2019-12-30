@extends('layouts.adminheader')
@section('css')
<style type="text/css" media="screen">
  .half-form{
    width: 50%;
    padding: 10px;
    float: left;

  }
  .modal-dialog{
    width: 100%;
  }

</style>
@endsection
@section('content')

<div class="container">



  <br><br>
  <a class="btn btn-primary" data-toggle="modal" href='#add-modal'>+Add New</a>

  <br><br>
  <table class="table table-bordered" id="users-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Origin Cost</th>
        <th>Sale Cost</th>
        <th>Category</th>
        <th>Vendor</th>
        <th>Quantity</th>
        <th>Action</th>
      </tr>
    </thead>
  </table>
</div>
<!-- modal add product -->
<div class="modal fade" id="add-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal title</h4>
      </div>

      <form id="add-form" action="{{asset('admin/product/store')}}" method="POST" >
        <div class="half-form">
         <div class="form-group">
          <label for="">Name</label>
          <input type="text" class="form-control" id="name" placeholder="Input field">
        </div>
        <div class="form-group">
          <label for="">Origin Cost</label>
          <input type="text" class="form-control" id="origin_cost" placeholder="Input field">
        </div>
        <div class="form-group">
          <label for="">Sale Cost</label>
          <input type="text" class="form-control" id="sale_cost" placeholder="Input field">
        </div>
        <div class="form-group">
          <label for="">Quantity</label>
          <input type="text" id="quantity" class="form-control" name="quantity" />
        </div>
        <div class="form-group">
          <label for="">Vendor</label>
          <select name="vendor" id="vendor" class="form-control" >
            @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>}
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="">Category</label>
          <select name="category" id="category_id" class="form-control" >
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>}
            @endforeach
          </select>
        </div>
        <div id="image_preview"></div>
        <div class="form-group">
          <label for="">Images</label>
          <input type="file" id="files" class="form-control" name="file[]" multiple />
        </div>

      </div>                       
      <div class="half-form">
        <div class="form-group">
          <label for="">Descripton</label>
          <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label for="">Content</label>
          <textarea name="content"></textarea>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
  </div>
</div>
</div>
{{-- edit product modal  --}}

<div class="modal fade" id="edit-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <form id="edit-form" action="{{asset('admin/product/update')}}" method="POST">
      <div class="half-form">
       <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" id="ename" name="name" placeholder="Input field" />
      </div>
      <div class="form-group">
        <label for="">Origin Cost</label>
        <input type="text" class="form-control" id="eorigin_cost" name="origin_cost" placeholder="Input field" />
      </div>
      <div class="form-group">
        <label for="">Sale Cost</label>
        <input type="text" class="form-control" id="esale_cost" name="sale_cost" placeholder="Input field" />
      </div>
      <div class="form-group">
        <label for="">Quantity</label>
        <input type="text" id="equantity" class="form-control" name="quantity" />
      </div>
      <div class="form-group">
        <label for="">Vendor</label>
        <select name="vendor" id="evendor" class="form-control">
          @foreach ($users as $user)
          <option value="{{$user->id}}">{{$user->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="">Category</label>
        <select name="category" id="ecategory_id" class="form-control" >
          @foreach ($categories as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
      </div>
      <div id="eimage_preview">

      </div>
      <div class="form-group">
        <label for="">Images</label>
        <input type="file" id="efiles" class="form-control" name="efiles[]" multiple />
      </div>

    </div>                       
    <div class="half-form">
      <div class="form-group">
        <label for="">Descripton</label>
        <textarea name="description" id="edescription"class="form-control"></textarea>
      </div>
      <div class="form-group">
        <label for="">Content</label>
        <textarea name="econtent"></textarea>
      </div>
    </div>
    <input type="hidden" id="eid" name="id">
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit"  class="btn btn-primary">Save changes</button>
    </div>
  </form>
  </div>
</div>
</div>


@endsection

@section('js')
<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace( 'content' );
  CKEDITOR.replace( 'econtent' );
  CKEDITOR.editorConfig = function( config ) {
        // Define changes to default configuration here. For example:
        // config.language = 'fr';
        // config.uiColor = '#AADC6E';
        config.width = '400px';
      };
    </script>
    <script type="text/javascript" charset="utf-8">
      $(function() {
        $.ajaxSetup({

          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
//____________________________________________________________________________________________________

var dataTable = $('#users-table').DataTable({
  processing: true,
  serverSide: true,
  ajax: '{!! route('datatables.data') !!}',
  columns: [
  { data: 'id', name: 'id' },
  { data: 'name', name: 'name' },
  { data: 'origin_cost', name: 'origin_cost' },
  { data: 'sale_cost', name: 'sale_cost' },
  { data: 'category_id', name: 'category_id' },
  { data: 'user_id', name: 'user_id' },
  { data: 'quantity', name: 'quantity' },
  { data: 'action', name: 'action' },
  ]
});

//____________________________________________________________________________________________________


$("#files").change(function(){
 $('#image_preview').html("");
 var total_file=document.getElementById("files").files.length;
 console.log(document.getElementById("files").files);
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<img class'img-responsive img' style='width:50px' src='"+URL.createObjectURL(event.target.files[i])+"'>");
}

});
//____________________________________________________________________________________________________

$("#add-form").submit(function(e){
  e.preventDefault();
}).validate({
  rules: {
    name: {
      required: true,
      minlength: 5
    },
    description: {
      required: true,
    },
    sale_cost:{
      number:true,
      minlength:1,
      maxlength:10   
    },
    quantity:{
      number:true,
      minlength:1,
      maxlength:4   
    },
    origin_cost:{
      number:true,
      minlength:1,
      maxlength:10   
    },
    address: {
      required: true,
      minlength: 5
    },
  },
  messages: {
    name: {
      required: "Enter Your Name",
      minlength: "leaste 5 word"
    },
    description: {
      required: "Write Descripton, plz",
    },
    sale_cost:{
      number:"This is not Number Phone",
      minlength:"This is not Number Phone",
      maxlength:"This is not Number Phone"
    },
    quantity:{
      number:"This is not number",
      minlength:"This is incorect",
      maxlength:"This is incorect"
    },
    origin_cost:{
      number:"This is not Number Phone",
      minlength:"This is not Number Phone",
      maxlength:"This is not Number Phone"
    },
    address: {
      required: "Enter Your Address",
      minlength: "Leaste 5 word"
    },
  },
  submitHandler: function(form) {
    var content = CKEDITOR.instances.content.getData();
    var files = document.getElementById('files').files;
    var createForm = new FormData();
    createForm.append('name',$('#name').val());
    createForm.append('description',$('#description').val());
    createForm.append('content',content);
    createForm.append('image',files);
    createForm.append('user_id',$('#vendor').val());
    createForm.append('quantity',$('#quantity').val());
    createForm.append('category_id',$('#category_id').val());
    createForm.append('sale_cost',$('#sale_cost').val());
    createForm.append('origin_cost',$('#origin_cost').val());

    for (var i = 0; i < files.length; i++) {
      createForm.append('images[]',files[i]);
    }
    $.ajax({
      url: form.action,
      type: form.method,
      data: createForm,
      dataType:'json',
      async:false,
      processData: false,
      contentType: false,
      success: function(response) {
       setTimeout(function () {
         toastr.success('has been added');
       },1000);
       $("#add-modal").modal('hide');
       dataTable.ajax.reload();
     }, error: function (xhr, ajaxOptions, thrownError) {
      toastr.error(thrownError);

    },       
  });
  }
});

//____________________________________________________________________________________________________

$("#edit-form").submit(function(e){
  e.preventDefault();
}).validate({
  rules: {
    name: {
      required: true,
      minlength: 5
    },
    description: {
      required: true,
    },
    sale_cost:{
      number:true,
      minlength:1,
      maxlength:10   
    },
    quantity:{
      number:true,
      minlength:1,
      maxlength:4   
    },
    origin_cost:{
      number:true,
      minlength:1,
      maxlength:10   
    },
    address: {
      required: true,
      minlength: 5
    },
  },
  messages: {
    name: {
      required: "Enter Your Name",
      minlength: "leaste 5 word"
    },
    description: {
      required: "Write Descripton, plz",
    },
    sale_cost:{
      number:"This is not Number Phone",
      minlength:"This is not Number Phone",
      maxlength:"This is not Number Phone"
    },
    quantity:{
      number:"This is not number",
      minlength:"This is incorect",
      maxlength:"This is incorect"
    },
    origin_cost:{
      number:"This is not Number Phone",
      minlength:"This is not Number Phone",
      maxlength:"This is not Number Phone"
    },
    address: {
      required: "Enter Your Address",
      minlength: "Leaste 5 word"
    },
  },
  submitHandler: function(form) {
    var content = CKEDITOR.instances.econtent.getData();
    var files = document.getElementById('efiles').files;
    var updateForm = new FormData();
    updateForm.append('id',$('#eid').val());
    updateForm.append('name',$('#ename').val());
    updateForm.append('description',$('#edescription').val());
    updateForm.append('content',content);
    updateForm.append('vendor_id',$('#evendor').val());
    updateForm.append('quantity',$('#equantity').val());
    updateForm.append('category_id',$('#ecategory_id').val());
    updateForm.append('sale_cost',$('#esale_cost').val());
    updateForm.append('origin_cost',$('#eorigin_cost').val());

    for (var i = 0; i < files.length; i++) {
      updateForm.append('images[]',files[i]);
    }
    $.ajax({
      url: form.action,
      type: form.method,
      data: updateForm,
      dataType:'json',
      async:false,
      processData: false,
      contentType: false,
      success: function(response) {
       setTimeout(function () {
         toastr.success('has been updated');
       },1000);
       $("#edit-modal").modal('hide');
       dataTable.ajax.reload();
     }, error: function (xhr, ajaxOptions, thrownError) {
      toastr.error(thrownError);

    },       
  });
  }
});


  
})
//____________________________________________________________________________________________________

  // get data for form update
  function getInfo(id) {
    console.log(id);
        // $('#editPost').modal('show');

        $.ajax({
          type: "GET",
          url: "{{ asset('admin/getProduct') }}/"+id,

          success: function(response)
          {
            $('#eimage_preview').html("");
            CKEDITOR.instances.econtent.setData(response.content);
            $('#ename').val(response.name);
            $('#edescription').val(response.description);
            $("#esale_cost").val(response.sale_cost);
            $('#eorigin_cost').val(response.origin_cost);
            $('#equantity').val(response.quantity);
            $('#evendor').val(response.user_id);
            $('#ecategory_id').val(response.category_id);
            $('#equantity').val(response.quantity);
            $('#eid').val(response.id);
            for (var i = 0; i < response.images.length; i++) {
             html="<img src='"+response.images[i].link+"' class='img-responsive img' style='display:inline-block;width:50px'>";
             $('#eimage_preview').append(html);
           }         
         },
         error: function (xhr, ajaxOptions, thrownError) {
          toastr.error(thrownError);
        }
      });

      }

//____________________________________________________________________________________________________


    // Update function


      // Delete function
      function alDelete(id){
        swal({
          title: "Bạn có chắc muốn xóa?",
        // text: "Bạn sẽ không thể khôi phục lại bản ghi này!!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",  
        cancelButtonText: "Không",
        confirmButtonText: "Có",
        // closeOnConfirm: false,
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
            type: "delete",
            url: "product/"+id,
            success: function(res)
            {

              if(!res.error) {
                toastr.success('Xóa thành công!');
                $('#product-'+id).remove();
                  //setTimeout(function () {
                    //location.reload();
                  //}, 1000)
                }
              },
              error: function (xhr, ajaxOptions, thrownError) {
                toastr.error(thrownError);
              }
            });
        } else {
          toastr.error("Thao tác xóa đã bị huỷ bỏ!");
        }
      });
      };


      function getReason(id){
        $.ajax({
          type: "post",
          url: "",
          success: function(response)
          {
            console.log(response);
            if (response.notice==null) {
              $("p#reason").append("Admin Không Để Lại Lý Do");
              console.log('test');
            }else{
              $("p#reason").append(response.notice);
            }

          },
          error: function (xhr, ajaxOptions, thrownError) {
            toastr.error(thrownError);
          }
        })
      }
      $('#sale_cost').on('keypress', function(e){
  return e.metaKey || // cmd/ctrl
    e.which <= 0 || // arrow keys
    e.which == 8 || // delete key
    /[0-9]/.test(String.fromCharCode(e.which)); // numbers
  })
      $('#esale_cost').on('keypress', function(e){
  return e.metaKey || // cmd/ctrl
    e.which <= 0 || // arrow keys
    e.which == 8 || // delete key
    /[0-9]/.test(String.fromCharCode(e.which)); // numbers
  })
      $('#origin_cost').on('keypress', function(e){
  return e.metaKey || // cmd/ctrl
    e.which <= 0 || // arrow keys
    e.which == 8 || // delete key
    /[0-9]/.test(String.fromCharCode(e.which)); // numbers
  })
      $('#eorigin_cost').on('keypress', function(e){
  return e.metaKey || // cmd/ctrl
    e.which <= 0 || // arrow keys
    e.which == 8 || // delete key
    /[0-9]/.test(String.fromCharCode(e.which)); // numbers
  })
      $('#quantity').on('keypress', function(e){
  return e.metaKey || // cmd/ctrl
    e.which <= 0 || // arrow keys
    e.which == 8 || // delete key
    /[0-9]/.test(String.fromCharCode(e.which)); // numbers
  })
</script>

@endsection