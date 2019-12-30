@extends('layouts.adminheader')
@section('content')

<div class="container">
  <br><br>
  <a class="btn btn-primary" data-toggle="modal" href='#add-modal'>+Add</a>

  <br><br>
  <table class="table table-bordered" id="users-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Avatar</th>   
        <th>Name</th>
        <th>Email</th>
        <th>phone</th>
        <th>Address</th>
        <th>Position</th>
        <th>Action</th>
      </tr>
    </thead>
  </table>
</div>
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edituser">Update User Information</h5>
      </div>
      <div class="modal-body">
        <form id="edit-form" action="{{asset('admin/users/update')}}" method="POST">
        <div class="form-group">
          <label class="control-label col-sm-2" for="name">Name:</label>
          <input type="text" class="form-control" id="ename" placeholder="Enter name" name="name">
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Email:</label>       
          <input type="email" class="form-control" id="eemail" placeholder="Enter email" name="email">
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="description">Avata:</label>
          <img id="imgFile" class="img img-responsive" width="30%" alt="">
          <input type="file" name="image" id="editfile" onchange="loadFile(event)">
        </div>
        <div class="form-group">
          <label class="control-label" for="phone">Phone:</label>        
          <input type="tel" name="phone"  class="form-control" id="ephone" value="" placeholder="">
        </div>
        <div class="form-group">
         <label class="control-label col-sm-2" for="name">Address:</label>
         <input type="text" class="form-control" id="eaddress" placeholder="Enter address" name="address">
       </div>
       <input type="hidden" name="id" id="eid">
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="UpdateBtn" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>

  </div>
</div>
</div>
<!-- Modal add -->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edituser">Add New User</h5>
      </div>
      <div class="modal-body">
        <form id="add-form" action="{{asset('admin/users/store')}}" method="POST" >
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

<script type="text/javascript" charset="utf-8">
  $(function() {

    $.ajaxSetup({

      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
// --------------------------------------------------------------------------------------------


 var dataTable = $('#users-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{!! route('users.data') !!}',
      columns: [
      { data: 'id', name: 'id' },
      { data: 'avata', name: 'avata' },
      { data: 'name', name: 'name' },
      { data: 'email', name: 'email' },
      { data: 'phone', name: 'phone' },
      { data: 'address', name: 'address' },
      { data: 'role', name: 'role' },
      { data: 'action', name: 'action' },
      ]
    });

// --------------------------------------------------------------------------------------------

    $("#add-form").submit(function(e){
      e.preventDefault();
    }).validate({
      rules: {
        name: {
          required: true,
          minlength: 5
        },
        email: {
          required: true,
          email: true,
        },
        phone:{
          number:true,
          malength:10,    
          minlength:10   
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
        email: {
          required: "Enter Your Email",
          email: "This is not Email",
        },
        phone:{
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
        var file = $('#file').get(0).files[0];
        var createForm = new FormData();
        createForm.append('name', $('#name').val());
        createForm.append('phone', $('#phone').val());
        createForm.append('email', $('#email').val());
        createForm.append('address', $('#address').val());
        createForm.append('password', $('#password').val());
        createForm.append('image', file);
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

// --------------------------------------------------------------------------------------------

    $("#edit-form").submit(function(e){
      e.preventDefault();
    }).validate({
      rules: {
        name: {
          required: true,
          minlength: 5
        },
        email: {
          required: true,
          email: true,
        },
        phone:{
          minlength:10,
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
        email: {
          required: "Enter Your Email",
          email: "This is not Email",
        },
        phone:{
          minlength:"This is not Number Phone",
          maxlength:"This is not Number Phone"
        },
        address: {
          required: "Enter Your Address",
          minlength: "Leaste 5 word"
        },
      },
      submitHandler: function(form) {
        var file = $('#editfile').get(0).files[0];
        var updateForm = new FormData();
        updateForm.append('id', $('#eid').val());
        updateForm.append('name', $('#ename').val());
        updateForm.append('phone', $('#ephone').val());
        updateForm.append('email', $('#eemail').val());
        updateForm.append('address', $('#eaddress').val());
        updateForm.append('image', file);
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


// --------------------------------------------------------------------------------------------
      function getInfo(id) {
        $.ajax({
          type: "GET",
          url: "{{ asset('admin/user/edit') }}"+"/"+ id,

          success: function(response){
            $('#ename').val(response.name);
            $('#eemail').val(response.email);
            $('#ephone').val(response.phone);
            $('#eaddress').val(response.address);        
            $('#eid').val(response.id);
            $("#imgFile").attr("src",response.avata);         
          },
          error: function (xhr, ajaxOptions, thrownError) {
            toastr.error(thrownError);
          }
        });

      }

// --------------------------------------------------------------------------------------------
      // Delete function
      function alDelete(id){

        swal({
          title: "You sure to remove it?",
        // text: "Bạn sẽ không thể khôi phục lại bản ghi này!!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "No",
        confirmButtonText: "Yes",
        // closeOnConfirm: false,
      },
      function(isConfirm) {
        var path = "{{ asset('admin/user') }}"+"/"+ id;
        if (isConfirm) {
          $.ajax({
            type: "delete",
            url: path,
            success: function(res)
            {

              if(!res.error) {
                toastr.success('Removed!');
                $('#rowHtml-'+id).remove();
              }
            },
            error: function (xhr, ajaxOptions, thrownError) {
              toastr.error(thrownError);
            }
          });
        } else {
          toastr.error("Action has been cancel!");
        }
      });
      }
      function setRole(id){
        swal({
          title: "You sure to change position?",
        // text: "Bạn sẽ không thể khôi phục lại bản ghi này!!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "No",
        confirmButtonText: "Yes",
        // closeOnConfirm: false,
      },
      function(isConfirm) {
        var path = "{{ asset('admin/user/role') }}"+"/"+ id;
        if (isConfirm) {
          $.ajax({
            type: "POST",
            url: path,
            success: function(res)
            {
              location.reload(true);
            },
            error: function (xhr, ajaxOptions, thrownError) {
              toastr.error(thrownError);
            }
          });
        } else {
          toastr.error("Action has been cancel!");
        }
      });
      }

    </script>

    @endsection