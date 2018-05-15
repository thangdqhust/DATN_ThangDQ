<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use App\User;
use App\Http\Requests\VendorRequest;
use Yajra\Datatables\Datatables;

class VendorController extends Controller
{
     public function index(){
    	$currentUser= User::first();
    	$vendors= Vendor::get();
    	// dd($currentUser);
    	$sumNotice="0";
    	$sumPost="0";
    	return view('vendor.index',['currentUser'=>$currentUser,'sumNotice'=>$sumNotice,'sumPost'=>$sumPost],['vendors'=>$vendors]);
    }
    public function anyData(){	
    
        $vendors = Vendor::select('vendors.*');
        return Datatables::of($vendors)
        ->addColumn('action', function ($vendor) {
            return'
            <button type="button" class="btn btn-xs btn-info" data-toggle="modal" href="#showProduct"><i class="fa fa-eye" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-xs btn-warning"data-toggle="modal" onclick="getProduct('.$vendor['id'].')" href="#editProduct"><i class="fa fa-pencil" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-xs btn-danger" onclick="alDelete('.$vendor['id'].')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
        })
        ->setRowId('vendor-{{$id}}')
        ->make(true);
}
	
    public function getVendor($id){
        $vendor=Vendor::find($id)  ;
        // $categories=Category::orderBy('id','DESC')->get();
        return response()->json($vendor);
    }
    public function destroy($id){
        // Product::find($id);

        $data=Vendor::find($id)->delete();
        return response()->json($data);
    }
    
    public function store(VendorRequest $request) {
        $data=$request->only('name','code','phone','address');
        $product=Vendor::create($data);
        return $product;
        // $data['code']=$codeVendor.''
        // $data['user_id'] = Auth::user()->id;
        // unset($data['image']);
        // unset($data['tags']);
        // $data['image']=$imageName;
         // return $user;
        // return redirect()->back();
    
    }
    public function updateVendor(VendorRequest $request) {
        $data=$request->only('name','code','phone','address');
        $id=$request->only('id');
        $boolean=Vendor::where('id',$id)->update($data);
        if ($boolean) {
        return Vendor::find($id)->first();
        }else{
            return response()->json(['error'=>'500']);
        }
        
    }
}
