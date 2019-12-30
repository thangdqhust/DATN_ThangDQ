<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;

use App\Http\Requests\UserUpdateRequest;

use App\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    public function index(){
        
    	return view('user.index');
	}
	public function anyData(){	
    
        $users = User::select('users.*');
        return Datatables::of($users)
        ->addColumn('action', function ($data) {
            return'
            <button type="button" class="btn btn-xs btn-warning"data-toggle="modal" onclick="getInfo('.$data['id'].')" href="#edit-modal"><i class="fa fa-pencil" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-xs btn-danger" onclick="alDelete('.$data['id'].')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
        })
        ->editColumn('avata','<img src="{{$avata}}" style="width:100px;" class="img img-responsive"  alt="">')
        ->editColumn('role', function ($data) {
            if ($data['role']==0) {
                return '<select class="form-control" onchange="setRole('.$data['id'].')"><option selected>User</option><option>Vender</option></select>';
            }else{
                return '<select class="form-control" onchange="setRole('.$data['id'].')"><option>User</option><option selected>Vender</option></select>';
            }
        })
        ->rawColumns(['avata','action','role'])
        ->setRowId('rowHtml-{{$id}}')
        ->make(true);
}
	public function getData($id){
    	$users=User::find($id);
    	return $users;
	}
	
	public function destroy($id){
		$data=User::find($id)->delete();
		return response()->json($data);
	}
    public function setRole($id){
        $data=User::find($id);
        if ($data->role==0) {
            $data->role=1;
            $data->save();
        }else{
            $data->role=0;
            $data->save();
        }
        return response()->json($data);
    }
    
	public function store(UserRequest $request) {
        $imageName= '/images/users/userDefault.png';
		if ($request->hasFile('avata')) {
            $imageName= '/images/users/'.time().'.'.$request->avata->getClientOriginalExtension();
            $request->avata->move(public_path('images/users'), $imageName);
		}        
        $data=$request->all();
        $data['avata']=$imageName;
        $data['password']=Hash::make($data['password']);
        unset($data['image']);
		$user= User::create($data);
		 return $user;
	}
	public function updateUser(UserUpdateRequest $request) {
        $data=$request->all();
        unset($data['id']);
		if ($request->hasFile('avata')) {
        $imageName= 'http://'.request()->getHttpHost().'/images/users/'.time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/users'), $imageName);
        $data['avata']=$imageName;
		}
        
        $id=$request->only(['id']);
        $boolean=User::find($id)->first()->update($data);
        if ($boolean) {
		return response()->json(['success'=>'201']);
        }else{
        	return response()->json(['error'=>'500']);
        }
    }
}
