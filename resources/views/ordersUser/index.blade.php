@extends('layouts.userheader')
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

  <br><br>
  <table class="table table-bordered" id="users-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Code</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Total</th>
        <th>Update</th>
        <th>Action</th>
      </tr>
    </thead>
  </table>
</div>

  {{-- ################################################

                         Model WareHousing

                         ################################################ --}}
                         <div class="modal fade" id="wareHousing">
                          <div class="modal-dialog" style="width: 50%;">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="productTitle"></h4>
                              </div>
                              <div class="container">

                               
                              </div>
                              <div class="modal-body" id="allWareHousing">

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        {{-- ################################################

                         Model WareHousing

                         ################################################ --}}

                         <div class="modal fade" id="AddWareHousing">
                          <div class="modal-dialog" style="width: 50%;">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Modal title</h4>
                              </div>
                              <div class="modal-body">

                                <div class="form-group">
                                  <label for="">Color</label>
                                  <select name="color" id="color_id" class="form-control" >
                                    @foreach ($colors as $color)
                                    <option value="{{$color['id']}}" selected>{{$color['color']}}</option>
                                    @endforeach
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label for="">Size</label>
                                  <select name="color" id="size_id" class="form-control" >
                                    @foreach ($sizes as $size)
                                    <option value="{{$size['id']}}" selected>{{$size['size']}}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="">Quantity  </label>
                                  <input type="text" id="quantity" class="form-control">
                                </div>
                                <input type="hidden" id="product_id">
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="storeWareHousing">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <input type="hidden" id="codeWareHousing" value="">
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
                              ajax: '{!! route('userOder.data') !!}',
                              columns: [
                              { data: 'id', name: 'id' },
                              { data: 'code', name: 'code' },
                              { data: 'name', name: 'name' },
                              { data: 'email', name: 'email' },
                              { data: 'phone', name: 'phone' },
                              { data: 'address', name: 'address' },
                              { data: 'total', name: 'total' },
                              { data: 'updated_at', name: 'updated_at' },
                              { data: 'action', name: 'action' },
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
          url: "{{ asset('getOrder') }}/"+id,
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