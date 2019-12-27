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
        $currentUser= Auth::guard('admin')->user();
    	$users= User::get();
    	// dd($currentUser);
    	$sumNotice="0";
    	$sumPost="0";
    	return view('user.index',['currentUser'=>$currentUser,'sumNotice'=>$sumNotice,'sumPost'=>$sumPost],['users'=>$users]);
	}
	public function anyData(){	
    
        $users = User::select('users.*');
        return Datatables::of($users)
        ->addColumn('action', function ($user) {
            return'
            <button type="button" class="btn btn-xs btn-info" data-toggle="modal" href="#showProduct"><i class="fa fa-eye" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-xs btn-warning"data-toggle="modal" onclick="getProduct('.$user['id'].')" href="#editUser"><i class="fa fa-pencil" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-xs btn-danger" onclick="alDelete('.$user['id'].')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
        })
        ->editColumn('avata','<img src="{{$avata}}" style="width:100px;" class="img img-responsive"  alt="">')
        ->rawColumns(['avata','action'])
        ->setRowId('user-{{$id}}')
        ->make(true);
}
	public function getData($id){
    	$users=User::find($id);
    	// $categories=Category::orderBy('id','DESC')->get();
    	return $users;
	}
	
	public function destroy($id){
		// Product::find($id);
		// $data=User::find($id);
		$data=User::find($id)->delete();
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
