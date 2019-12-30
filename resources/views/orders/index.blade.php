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
        <th>Receive</th>
        <th>Leave</th>
        <th>Member</th>
        <th>Product</th>
        <th>Customer</th>
        <th>Note</th>
        <th>Status</th>
      </tr>
    </thead>
  </table>
</div>

<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edituser">Add New Order</h5>
      </div>
      <div class="modal-body">
        <form id="add-form" action="{{asset('admin/order/store')}}" method="POST" >
          <div class="form-group">
            <label class="control-label col-sm-2" for="name">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>       
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
          </div>
          <br><br>
          <div class="form-group">
            <label class="control-label col-sm-2" for="avata">Avata:</label>
            <img id="imgCreate" class="img img-responsive" width="30%" alt="">
            <input type="file" name="image" id="file" onchange="loadFileC(event)">
          </div>
          <br><br>
          <div class="form-group">
            <label class="control-label col-sm-2" for="phone">Phone:</label>        
            <input type="tel" name="phone"  class="form-control" id="phone" value="" placeholder="">
          </div>
          <div class="form-group">
           <label class="control-label col-sm-2" for="name">Address:</label>
           <input type="text" class="form-control" id="address" placeholder="Enter address" name="address">
         </div>
         <div class="portlet-title">
          <div class="form-group">        
            <label class="control-label col-sm-2" for="description">Password:</label>
            <input type="password"  class="form-control" name="password" id='password' placeholder=""> 
          </div>
        </div> 
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
@endsection

@section('js')
<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace( 'content' );
  CKEDITOR.replace( 'econtent' );
</script>
<script>
  $(function() {
    $('#users-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! route('adminOder.data') !!}',
      columns: [
      { data: 'id', name: 'id' },
      { data: 'receive', name: 'receive' },
      { data: 'leave', name: 'leave' },
      { data: 'member', name: 'member' },
      { data: 'product_id', name: 'product_id' },
      { data: 'user_id', name: 'user_id' },
      { data: 'note', name: 'note' },
      { data: 'status', name: 'status' },
      ]
    });
  });
</script>
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
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> --}}
    
    <script type="text/javascript" charset="utf-8">
      $(function () {
        $.ajaxSetup({

          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
      });
      $("#files").change(function(){
       $('#image_preview').html("");
       var total_file=document.getElementById("files").files.length;
       console.log(document.getElementById("files").files);
       for(var i=0;i<total_file;i++)
       {
        $('#image_preview').append("<img class'img-responsive img' style='width:50px' src='"+URL.createObjectURL(event.target.files[i])+"'>");
      }

    });


      function plusData(id) {$.ajax({
        type: "GET",
        url: "product/plus/"+id,

        success: function(response)
        {

          console.log(response);     
        },
        error: function (xhr, ajaxOptions, thrownError) {
          toastr.error(thrownError);
        }
      });

    }
    function wareHousing(id) {
        // $('#editPost').modal('show');
        $('#product_id').val(id);

        $.ajax({
          type: "GET",
          url: "{{ asset('admin/getOrder') }}/"+id,
          success: function(response)
          { 
            console.log(response);
            var html=
            '<table class="table table-bordered">'+ 
            '<thead>'+
            '<tr>'+
            '<th>ID</th>'+
            '<th>Name</th>'+
            '<th>Image</th>'+
            '<th>Color</th>'+
            '<th>Size</th>'+
            '<th>Quantity</th>'+
            '<th>Unit Price</th>'+
            '</tr>'+
            '</thead>'
            +'<tbody>';
            var tbody="";
            for (var i = 0; i < response.length; i++) {
             tbody=tbody+'<tr id="wareHousing-'+response[i].id+'">'+'<td>'+response[i].id+'</td>'+ 
             '<td>'+response[i].name+'</td>'+
             '<td><img src="'+response[i].link+'" class="img img-responsive" style="width:100px;" alt=""></td>'+
             '<td>'+response[i].color_id+'</td>'+
             '<td>'+response[i].size_id+'</td>'+ 
             '<td>'+response[i].quantity+'</td>'+
             '<td>'+response[i].price+'</td>'+
             '</tr>';
           }
           html=html+tbody+'</tbody>'+'</table>';
           $('#allWareHousing').html(html);
           
         },
         error: function (xhr, ajaxOptions, thrownError) {
          toastr.error(thrownError);
        }
      });

      }
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
            url: "admin/product/"+id,
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
            url: "deleteOrder/"+id,
            success: function(res)
            {

              if(!res.error) {
                toastr.success('Hủy Đơn Thành Công!');
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
          toastr.error("Thao tác đã bị huỷ bỏ!");
        }
      });
      };
      function checkNull(value){
        return (value == null || value === '');
      }
    </script>

    @endsection