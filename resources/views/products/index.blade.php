@extends('layouts.adminheader')
@section('css')
<style type="text/css" media="screen">
.form-group{
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
<a class="btn btn-primary" data-toggle="modal" href='#addProduct'>+Add Product</a>

<br><br>
<table class="table table-bordered" id="users-table">
    <thead class="flg">
      <tr>
        <th>ID</th>
        <th>Code</th>
        <th>Name</th>
        <th>Origin Cost</th>
        <th>Sale Cost</th>
        <th>Descripton</th>
        {{-- <th>Quantity</th> --}}
        <th>Update</th>
        <th>Action</th>
      </tr>
    </thead>
    {{-- <tbody>
      @php $count=1 @endphp
      @foreach($products as $product)
      <tr id="user_{{$product['id']}}">

        <td>{{$count++}}</td>
        <td><img src="{{$product['image']}}" class="img img-responsive" width="200px" alt=""></td>
        <td>{{$product['title']}}</td>
        <td>{!! $product['updated_at']->diffForHumans() !!}</td>
        <td> @if($product['status']==0)
         <a href="#" class="btn btn-info"> Browsing</a>
         @endif
         @if($product['status']==1)
         <a href="#" class="btn btn-success"> Posted</a>
         @endif
         @if($product['status']==2)
         <a href="#" class="btn btn-danger"> Cancelled</a><br><br>
         <a href="javascript:;" onclick="getReason({{$product['id']}})" data-toggle="modal" data-target="#reason" class="btn btn-warning fa fa-exclamation-circle"> Reason</a>
         @endif</td>
        <td>
          <a href="javascript:;" onclick="editProduct({{$product['id']}})" class="btn btn-success" data-toggle="modal" data-target="#editProduct" ><i class="fa fa-wrench"></i> Repair </a>
         <br>
         <br>
         <a  class="btn btn-danger fa fa-trash-o" onclick="alDelete({{$product['id']}})" type="submit"> Delete</a>
       </td>
     </tr>
     @endforeach
   </tbody> --}}
 </table>
</div>
<!-- modal add product -->
<div class="modal fade" id="addProduct">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modal title</h4>
            </div>
                
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
                    <label for="">Descripton</label>
                    <input type="text" class="form-control" id="description" placeholder="Input field">
                </div>
                <div class="form-group">
                    <label for="">Content</label>
                    <input type="text" class="form-control" id="content" placeholder="Input field">
                </div>
                <div class="form-group">
                    <label for="">Vendor</label>
                    <br>
                    <select name="vendor" id="vendor" class="form-control" >
                        <option value="1" selected>Vũ Thắng</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Sizes</label>
                    <input type="text" class="form-control" id="size" placeholder="Input field">
                </div>
                <div class="form-group">
                    <label for="">Colors</label>
                    <input type="text" class="form-control" id="color" placeholder="Input field">
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
{{-- edit product modal  --}}

<div class="modal fade" id="editProduct">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" id="ename" placeholder="Input field">
                </div>
                <div class="form-group">
                    <label for="">Origin Cost</label>
                    <input type="text" class="form-control" id="eorigin_cost" placeholder="Input field">
                </div>
                <div class="form-group">
                    <label for="">Sale Cost</label>
                    <input type="text" class="form-control" id="esale_cost" placeholder="Input field">
                </div>
                <div class="form-group">
                    <label for="">Descripton</label>
                    <input type="text" class="form-control" id="edescription" placeholder="Input field">
                </div>
                <div class="form-group">
                    <label for="">Content</label>
                    <input type="text" class="form-control" id="econtent" placeholder="Input field">
                </div>
                <div class="form-group">
                    <label for="">Vendor</label>
                    <br>
                    <select name="vendor" id="evender" class="form-control" >
                        <option value="1" selected>Vũ Thắng</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Sizes</label>
                    <input type="text" class="form-control" id="esize" placeholder="Input field">
                </div>
                <div class="form-group">
                    <label for="">Colors</label>
                    <input type="text" class="form-control" id="ecolor" placeholder="Input field">
                </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'code', name: 'code' },
            { data: 'name', name: 'name' },
            { data: 'origin_cost', name: 'origin_cost' },
            { data: 'sale_cost', name: 'sale_cost' },
            { data: 'description', name: 'description' },
            // { data: 'product-details.quantity', name: 'Quantity' },
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
    <script src="{{asset('js/inputTags.jquery.min.js')}}"></script>
    <script >$('#tags').inputTags();$('#etags').inputTags();</script>
    <script ></script>
    <script type="text/javascript" charset="utf-8">
      $(function () {
        $.ajaxSetup({

          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $('#StoreBtn').on('click',function(e){
          e.preventDefault();
          var content = CKEDITOR.instances.content.getData();
          var file = $('#file').get(0).files[0];
          var newPost = new FormData();
          newPost.append('title',$('#title').val());
          newPost.append('description',$('#description').val());
          newPost.append('content',content);
          newPost.append('category_id',$('#category').val());
          newPost.append('tags',$('#tags').val());
          newPost.append('image',file);
          console.log(newPost);
          $.ajax({
            type:'post',
            url:"",
            data:newPost,
            dataType:'json',
            async:false,
            processData: false,
            contentType: false,
            success:function(response){
                 console.log(response);
                 setTimeout(function () {
                 toastr.success('has been added');
                  // window.location.href="";
                  // 
                },1000);
                // var data = JSON.parse(response).data;
                var html=
                '<tr id="user_'+response.id+'">'+
                '<td>'+'#'+'</td>'+
                '<td><img src="'+response.image+'" class="img img-responsive" width="200px" alt="">'+'</td>'+
                '<td>'+response.title+'</td>'+
                '<td>'+response.updated_at+'</td>'+
                '<td>'+'<a href="#" class="btn btn-info">Browsing</a>'+'</td>'+
                '<td>'+
                '<a href="javascript:;"  onclick="editPost('+response.id+') " class="btn btn-success" data-toggle="modal" data-target="#editPost"  ><i class="fa fa-edit"></i> Repair </a>'+'<br>'+'<br>'+
                '<a  class="btn btn-danger fa fa-trash-o" onclick="alDelete('+response.id+')" type="submit">Delete</a>'

                +
                '</td>'+
                '</tr>';
                console.log(html);
                $('tbody').prepend(html);
                $('#create').modal('hide');
          }, error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr);
            if (!checkNull(xhr.responseJSON)) {
              $('p#sperrors').hide();
            if(!checkNull(xhr.responseJSON.errors.title))
            {
              for (var i = 0; i < xhr.responseJSON.errors.title.length; i++) {
              var html='<p id="sperrors" style="color:red">'+xhr.responseJSON.errors.title[i]+'</p>';
              console.log(html);
              $(html).insertAfter('#title');

              }
            };
            if(!checkNull(xhr.responseJSON.errors.content))
            {
              for (var i = 0; i < xhr.responseJSON.errors.content.length; i++) {
              var html='<p id="sperrors" style="color:red">'+xhr.responseJSON.errors.content[i]+'</p>';
              console.log(html);
              $(html).insertAfter('#contentdiv');

              }
            };
            if(!checkNull(xhr.responseJSON.errors.description))
             {console.log('test ok');
              for (var i = 0; i < xhr.responseJSON.errors.description.length; i++) {
              var html='<p id="sperrors" style="color:red">'+xhr.responseJSON.errors.description[i]+'</p>';
              console.log(html);
              $(html).insertAfter('#description');

              }
            };
            if(!checkNull(xhr.responseJSON.errors.tags))
             {
              for (var i = 0; i < xhr.responseJSON.errors.tags.length; i++) {
              var html='<p id="sperrors" style="color:red">'+xhr.responseJSON.errors.tags[i]+'</p>';
              console.log(html);
              $(html).insertAfter('#tag');

              }
            }
            if (!checkNull(xhr.responseJSON.message)) {

            toastr.error(xhr.responseJSON.message);
            }
          };

          },

        })
        });

$('#UpdateBtn').on('click',function(e){
        console.log($('#etitle').val());
        e.preventDefault();
        var econtent = CKEDITOR.instances.econtent.getData();
          var efile = $('#editfile').get(0).files[0];
          var updatePost = new FormData();
          updatePost.append('title',$('#etitle').val());
          updatePost.append('description',$('#edescription').val());
          updatePost.append('content',econtent);
          updatePost.append('category_id',$('#ecategory').val());
          updatePost.append('tags',$('#etags').val());
          updatePost.append('editImage',efile);
          updatePost.append('id',$('#eid').val());
        $.ajax({
          type:'post',
          url: "",

          data:updatePost,
          dataType:'json',
            async:false,
            type:'post',
            processData: false,
            contentType: false,
          success: function(response){
            console.log(response);
        // var result = JSON.parse(response);
        setTimeout(function () {
          toastr.success(response.name+'has been added');
          // window.location.href="";
        },1000);
        
        $('#editPost').modal('hide');
        var html=
        '<td>'+'#'+'</td>'+
                '<td><img src="'+response.image+'" class="img img-responsive" width="200px" alt="">'+'</td>'+
                '<td>'+response.title+'</td>'+
                '<td>'+response.updated_at+'</td>'+
                '<td>'+'<a href="#" class="btn btn-info">Browsing</a>'+'</td>'+
                '<td>'+
                '<a href="javascript:;"  onclick="editPost('+response.id+') " class="btn btn-success" data-toggle="modal" data-target="#editPost"  ><i class="fa fa-edit"></i> Repair </a>'+'<br>'+'<br>'+
                '<a  class="btn btn-danger fa fa-trash-o" onclick="alDelete('+response.id+')" type="submit">Delete</a>'

                +
                '</td>';

        console.log(html);
        $('#user_'+response.id).html(html);
      },  error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.responseJSON.errors);
            $("p.sperrors").replaceWith("");
            if(!checkNull(xhr.responseJSON.errors.title))
            { 
              for (var i = 0; i < xhr.responseJSON.errors.title.length; i++) {
              var html='<p class="sperrors" style="color:red">'+xhr.responseJSON.errors.title[i]+'</p>';
              console.log(html);
              $(html).insertAfter('#etitle');

              }
            };
            if(!checkNull(xhr.responseJSON.errors.content))
            {
              for (var i = 0; i < xhr.responseJSON.errors.content.length; i++) {
              var html='<p class="sperrors" style="color:red">'+xhr.responseJSON.errors.content[i]+'</p>';
              console.log(html);
              $(html).insertAfter('#econtentdiv');

              }
            };
            if(!checkNull(xhr.responseJSON.errors.description))
             {
              for (var i = 0; i < xhr.responseJSON.errors.description.length; i++) {
              var html='<p  class="sperrors" style="color:red">'+xhr.responseJSON.errors.description[i]+'</p>';
              console.log(html);
              $(html).insertAfter('#edescription');

              }
            };
            if(!checkNull(xhr.responseJSON.errors.tags))
             {
              for (var i = 0; i < xhr.responseJSON.errors.tags.length; i++) {
              var html='<p class="sperrors" style="color:red">'+xhr.responseJSON.errors.tags[i]+'</p>';
              console.log(html);
              $(html).insertAfter('#etag');

              }
            };
            toastr.error(xhr.responseJSON.message);

          },

    })
      });
      })



  // get data for form update
  function getProduct(id) {
    console.log(id);
        // $('#editPost').modal('show');

        $.ajax({
          type: "GET",
          url: "getProduct/"+id,

          success: function(response)
          {console.log(response);
            CKEDITOR.instances.econtent.setData(response.content);
            $('#etitle').val(response.title),
            $('#edescription').val(response.description),
            $('#editfile').val(response.avata),
            $("#imgFile").attr("src",response.image);
            $('#eid').val(response.id)         
          },
          error: function (xhr, ajaxOptions, thrownError) {
            toastr.error(thrownError);
          }
        });

      }
      // Update function
      

      // Delete function
      function alDelete(id){
        console.log(id);
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
            url: "",
            success: function(res)
            {

              if(!res.error) {
                toastr.success('Xóa thành công!');
                $('#user_'+id).remove();
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
    </script>

@endsection