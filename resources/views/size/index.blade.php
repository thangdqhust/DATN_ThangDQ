@extends('layouts.adminheader')
@section('css')
<style type="text/css" media="screen">
.paginate_button{
  color: #fff;
  background-color: #e68f35;
  border-color: #d43f3a;
  padding: 6px;
  border-radius: 5px;
  margin: 2px;
}
</style>

<script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
@endsection
@section('content')

<div class="container" style="width:100%">
  <h2>Categories</h2>
  <br />
  <button href="#"  class="btn btn-info" id="addColor">+ Thêm mới </button>
  <input type="text" name="" id="color" class="form-control" style="width: 50%;display: inline-block;">
  <br><br>
  <table id="users-table" class="table table-striped">
    <thead class="flg">
      <tr>
        <th>ID</th>
        <th>Size</th>
        <th>Action</th>
      </tr>
    </thead>
  </table>
</div>
<div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Cập Nhật Thông Tin Danh Mục</h5>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-sm-2" for="name">Size:</label>
            <input type="text" class="form-control" id="ecolor" placeholder="Enter name" name="name">
          </div>
          <input type="hidden" name="eid" id="eid">
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" id="UpdateBtn" class="btn btn-primary">Save changes</button>
          </div>
      </div>

    </div>
  </div>
</div>
<!-- Modal add -->

@endsection
@section('js')

{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> --}}
<script type="text/javascript" charset="utf-8">
  $(function() {
    $('#users-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! route('size.data') !!}',
      columns: [
      { data: 'id', name: 'id' },
      { data: 'size', name: 'size' },
      { data: 'action', name: 'action' },
      ]
    });
  });
  $(function () {
    $.ajaxSetup({

      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $('#addColor').on('click',function(e){
      e.preventDefault();
      $.ajax({
        type:'post',
        url:"{{asset('admin/size/store')}}",
        data:{
          size:$('#color').val(),
        },
        success:function(response){
         console.log(response);
         setTimeout(function () {toastr.success('size '+response.size+' has been added');},1000);
                var html=
                '<tr id="color-'+response.id+'">'+
                '<td>'+response.id+'</td>'+
                '<td>'+response.size+'</td>'+
                '<td>'+
                ' <button type="button" class="btn btn-xs btn-warning"data-toggle="modal" onclick="getProduct('+response.id+')" href="#editProduct"><i class="fa fa-pencil" aria-hidden="true"></i></button> '+
                ' <button type="button" class="btn btn-xs btn-danger" onclick="alDelete('+response.id+')"><i class="fa fa-trash" aria-hidden="true"></i></button>'+
                '</td>'+
                '</tr>';
                $('tbody').prepend(html);
                $('#color').val('');

              }, error: function (xhr, ajaxOptions, thrownError) {
                if (!checkNull(xhr.responseJSON.errors)) {
                  console.log(xhr.responseJSON.errors);
                  $('p#sperrors').remove();
                  if(!checkNull(xhr.responseJSON.errors.size))
                  {
                    for (var i = 0; i < xhr.responseJSON.errors.size.length; i++) {
                      var html='<p id="sperrors" style="color:red">'+xhr.responseJSON.errors.size[i]+'</p>';

                      $(html).insertAfter('#color');
                    }
                  };
                }
                toastr.error(xhr.responseJSON.message);

              },

            })
    });


  })


  // delete post


  // get data for form update

      // Update function
      $('#UpdateBtn').on('click',function(e){
        e.preventDefault();
        var id=$('#ecolor').val();
        console.log(id);
        $.ajax({
          type:'post',
          url: "{{ asset('admin/size/update') }}",
          data:{
            size:$('#ecolor').val(),
            id:$('#eid').val(),
          },
          success: function(response){
            setTimeout(function () {
              toastr.success(response.size+' has been update');

            },1000);

            $('#editProduct').modal('hide');
            var html=
            '<td>'+response.id+'</td>'+
            '<td>'+response.size+'</td>'+
            '<td>'+
            ' <button type="button" class="btn btn-xs btn-warning"data-toggle="modal" onclick="getProduct('+response.id+')" href="#editProduct"><i class="fa fa-pencil" aria-hidden="true"></i></button> '+
            ' <button type="button" class="btn btn-xs btn-danger" onclick="alDelete('+response.id+')"><i class="fa fa-trash" aria-hidden="true"></i></button>'+
            '</td>';
            $('#color-'+response.id).html(html);
          }, error: function (xhr, ajaxOptions, thrownError) {
            if (!checkNull(xhr.responseJSON.errors)) {
              console.log(xhr.responseJSON.errors);
              $('p#sperrors').remove();
              if(!checkNull(xhr.responseJSON.errors.name))
              {
                for (var i = 0; i < xhr.responseJSON.errors.name.length; i++) {
                  var html='<p id="sperrors" style="color:red">'+xhr.responseJSON.errors.name[i]+'</p>';

                  $(html).insertAfter('#name');
                }
              };
              if(!checkNull(xhr.responseJSON.errors.sort_order))
              {
                for (var i = 0; i < xhr.responseJSON.errors.sort_order.length; i++) {
                  var html='<p id="sperrors" style="color:red">'+xhr.responseJSON.errors.sort_order[i]+'</p>';
                  console.log(html);
                  $(html).insertAfter('#sort_order');
                }
              };
            }
            toastr.error(xhr.responseJSON.message);

          },

        })
      });
      function getProduct(id) {
        console.log(id);
        // $('#editPost').modal('show');
        $.ajax({
          type: "GET",
          url: "{{ asset('admin/size/edit') }}" +"/"+ id,

          success: function(response)
          { 
            $('#ecolor').val(response.size);
            $('#eid').val(response.id);
          },
          error: function (xhr, ajaxOptions, thrownError) {
            toastr.error(thrownError);
          }
        });

      }

      // Delete function
      function alDelete(id){
        console.log(id);
        var path = "{{ asset('admin/size') }}"+"/" + id;
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
            url: path,
            success: function(res)
            {

              if(!res.error) {
                toastr.success('Xóa thành công!');
                $('#color-'+id).remove();
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
      function checkNull(value){
        return (value == null || value === '');
      }
    </script>
    @endsection
