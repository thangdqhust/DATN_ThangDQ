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
  <a class="btn btn-primary" data-toggle="modal" href='#addProduct'>+Add Product</a>

  <br><br>
  <table class="table table-bordered" id="users-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Code</th>
        <th>Name</th>
        <th>Origin Cost</th>
        <th>Sale Cost</th>
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
        <label for="">Vendor</label>
        <select name="vendor" id="vendor" class="form-control" >
          <option value="1" selected>Vũ Thắng</option>
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
      <button type="button" id="StoreBtn" class="btn btn-primary">Save changes</button>
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
      <div class="half-form">
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
        <label for="">Vendor</label>
        <select name="vendor" id="evendor" class="form-control" >
          <option value="1" selected>Vũ Thắng</option>
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
    <input type="hidden" id="eid" name="eid">
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button" id="UpdateBtn" class="btn btn-primary">Save changes</button>
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
      ajax: '{!! route('datatables.data') !!}',
      columns: [
      { data: 'id', name: 'id' },
      { data: 'code', name: 'code' },
      { data: 'name', name: 'name' },
      { data: 'origin_cost', name: 'origin_cost' },
      { data: 'sale_cost', name: 'sale_cost' },
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
        $("#files").change(function(){
         $('#image_preview').html("");
         var total_file=document.getElementById("files").files.length;
         console.log(document.getElementById("files").files);
         for(var i=0;i<total_file;i++)
         {
          $('#image_preview').append("<img class'img-responsive img' style='width:50px' src='"+URL.createObjectURL(event.target.files[i])+"'>");
        }

      });
        $('#StoreBtn').on('click',function(e){
          e.preventDefault();
          var content = CKEDITOR.instances.content.getData();
          var files = document.getElementById('files').files;
          
          var newPost = new FormData();
          newPost.append('name',$('#name').val());
          newPost.append('description',$('#description').val());
          newPost.append('content',content);
          newPost.append('vendor',$('#vendor').val());
          newPost.append('sale_cost',$('#sale_cost').val());
          newPost.append('origin_cost',$('#origin_cost').val());
          
          for (var i = 0; i < files.length; i++) {

            newPost.append('images[]',files[i]);
          }
          $.ajax({
            type:'post',
            url:"product/store",
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
                '<tr id="product-'+response.id+'">'+
                '<td>'+'#'+'</td>'+
                '<td>'+response.code+'</td>'+
                '<td>'+response.name+'</td>'+
                '<td>'+response.origin_cost+'</td>'+
                '<td>'+response.sale_cost+'</td>'+
                '<td>'+response.updated_at+'</td>'+
                '<td>'+
                '<button type="button" class="btn btn-xs btn-info" data-toggle="modal" href="#showProduct"><i class="fa fa-eye" aria-hidden="true"></i></button> '+
                ' <button type="button" class="btn btn-xs btn-warning"data-toggle="modal" onclick="getProduct('+response.id+')" href="#editProduct"><i class="fa fa-pencil" aria-hidden="true"></i></button> '+
                ' <button type="button" class="btn btn-xs btn-danger" onclick="alDelete('+response.id+')"><i class="fa fa-trash" aria-hidden="true"></i></button>'+
                '</td>'+
                '</tr>';
                console.log(html);
                $('tbody').prepend(html);
                $('#addProduct').modal('hide');
              }, error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr);
                if (!checkNull(xhr.responseJSON)) {
                  $('p#sperrors').hide();
                  if(!checkNull(xhr.responseJSON.errors.name))
                  {
                    for (var i = 0; i < xhr.responseJSON.errors.name.length; i++) {
                      var html='<p id="sperrors" style="color:red">'+xhr.responseJSON.errors.name[i]+'</p>';
                      console.log(html);
                      $(html).insertAfter('#name');

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
              if(!checkNull(xhr.responseJSON.errors.sale_cost))
              {
                for (var i = 0; i < xhr.responseJSON.errors.sale_cost.length; i++) {
                  var html='<p id="sperrors" style="color:red">'+xhr.responseJSON.errors.sale_cost[i]+'</p>';
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
  e.preventDefault();
  var econtent = CKEDITOR.instances.econtent.getData();
  var efiles = document.getElementById('efiles').files;
  var updatePost = new FormData();
  updatePost.append('id',$('#eid').val());
  updatePost.append('name',$('#ename').val());
  updatePost.append('description',$('#edescription').val());
  updatePost.append('content',econtent);
  updatePost.append('vendor',$('#evendor').val());
  updatePost.append('sale_cost',$('#esale_cost').val());
  updatePost.append('origin_cost',$('#eorigin_cost').val());
  console.log(updatePost);
  for (var i = 0; i < efiles.length; i++) {

    updatePost.append('images[]',efiles[i]);
  }  $.ajax({
    type:'post',
    url: "product/update",

    data:updatePost,
    dataType:'json',
    async:false,
    processData: false,
    contentType: false,
    success: function(response){
      console.log(response);
        // var result = JSON.parse(response);
        setTimeout(function () {
          toastr.success(response.name+'has been added');
          // window.location.href="";
        },1000);
        
        $('#editProduct').modal('hide');
        var html=
        '<td>'+'#'+'</td>'+
        '<td>'+response.code+'</td>'+
        '<td>'+response.name+'</td>'+
        '<td>'+response.origin_cost+'</td>'+
        '<td>'+response.sale_cost+'</td>'+
        '<td>'+response.updated_at+'</td>'+
        '<td>'+
        '<button type="button" class="btn btn-xs btn-info" data-toggle="modal" href="#showProduct"><i class="fa fa-eye" aria-hidden="true"></i></button> '+
        ' <button type="button" class="btn btn-xs btn-warning"data-toggle="modal" onclick="getProduct('+response.id+')" href="#editProduct"><i class="fa fa-pencil" aria-hidden="true"></i></button> '+
        ' <button type="button" class="btn btn-xs btn-danger" onclick="alDelete('+response.id+')"><i class="fa fa-trash" aria-hidden="true"></i></button>'+
        '</td>';
        $('#product-'+response.id).html(html);
      },  error: function (xhr, ajaxOptions, thrownError) {
        $("p.sperrors").replaceWith("");
        if (!checkNull(xhr.responseJSON)) {


        if(!checkNull(xhr.responseJSON.errors.name))
        { 
          for (var i = 0; i < xhr.responseJSON.errors.name.length; i++) {
            var html='<p class="sperrors" style="color:red">'+xhr.responseJSON.errors.name[i]+'</p>';
            $(html).insertAfter('#ename');

          }
        };
        if(!checkNull(xhr.responseJSON.errors.content))
        {
          for (var i = 0; i < xhr.responseJSON.errors.content.length; i++) {
            var html='<p class="sperrors" style="color:red">'+xhr.responseJSON.errors.content[i]+'</p>';
            $(html).insertAfter('#econtentdiv');

          }
        };
        if(!checkNull(xhr.responseJSON.errors.description))
        {
          for (var i = 0; i < xhr.responseJSON.errors.description.length; i++) {
            var html='<p  class="sperrors" style="color:red">'+xhr.responseJSON.errors.description[i]+'</p>';
            $(html).insertAfter('#edescription');

          }
        };
        if(!checkNull(xhr.responseJSON.errors.sale_cost))
        {
          for (var i = 0; i < xhr.responseJSON.errors.sale_cost.length; i++) {
            var html='<p class="sperrors" style="color:red">'+xhr.responseJSON.errors.sale_cost[i]+'</p>';
            $(html).insertAfter('#etag');

          }
        };
        };

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
          {
            $('#eimage_preview').html("");
            CKEDITOR.instances.econtent.setData(response.content);
            $('#ename').val(response.name);
            $('#edescription').val(response.description);
            $("#esale_cost").val(response.sale_cost);
            $('#eorigin_cost').val(response.origin_cost);
            $('#evendor').val(response.vendor);
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