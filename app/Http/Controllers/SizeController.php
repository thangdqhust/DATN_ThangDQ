<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Size;
use Auth;
use Yajra\Datatables\Datatables;
class SizeController extends Controller
{
    public function index(){
     	$currentUser= Auth::user();
    	// dd($currentUser);
    	$sumNotice="0";
    	$sumPost="0";
    	return view('size.index',['currentUser'=>$currentUser,'sumNotice'=>$sumNotice,'sumPost'=>$sumPost]);
	}

	public function anyData(){
        $sizes = size::select('sizes.*');
        return Datatables::of($sizes)
        ->addColumn('action', function ($size) {
            return'
            <button type="button" class="btn btn-xs btn-warning"data-toggle="modal" onclick="getProduct('.$size['id'].')" href="#editProduct"><i class="fa fa-pencil" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-xs btn-danger" onclick="alDelete('.$size['id'].')"><i class="fa fa-trash" aria-hidden="true"></i></button>
            ';
            
        })
        ->setRowId('color-{{$id}}')
        ->make(true);
}

	
	public function getData($id){
    	$sizes=Size::find($id);
    	return $sizes;
	}



	public function destroy($id){
		// Product::find($id);

		$data=Size::find($id)->delete();
		return response()->json($data);
	}



	public function store(Request $request) {
		$data=$request->only(['size']);
		$size=Size::create($data);
		return $size;
	}



	public function updateData(Request $request) {
		$id=$request->only(['id']);
		$data=$request->only(['size']);
		$categories=Size::find($id)->first()->update($data);
		if ($categories) {
			$data=Size::where('id',$id)->first();
    		return $data;
		};
		 return response()->json(['error'=>'500']);	
	}
}
