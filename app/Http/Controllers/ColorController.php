<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Color;
use Auth;
use Yajra\Datatables\Datatables;
class ColorController extends Controller
{
    public function index(){
     	$currentUser= Auth::user();
    	// dd($currentUser);
    	$sumNotice="0";
    	$sumPost="0";
    	return view('color.index',['currentUser'=>$currentUser,'sumNotice'=>$sumNotice,'sumPost'=>$sumPost]);
	}

	public function anyData(){
        $colors = Color::select('colors.*');
        return Datatables::of($colors)
        ->addColumn('action', function ($color) {
            return'
            <button type="button" class="btn btn-xs btn-warning"data-toggle="modal" onclick="getProduct('.$color['id'].')" href="#editProduct"><i class="fa fa-pencil" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-xs btn-danger" onclick="alDelete('.$color['id'].')"><i class="fa fa-trash" aria-hidden="true"></i></button>
            ';
            
        })
        ->setRowId('color-{{$id}}')
        ->make(true);
}

	
	public function getData($id){
    	$colors=Color::find($id);
    	return $colors;
	}



	public function destroy($id){
		// Product::find($id);

		$data=Color::find($id)->delete();
		return response()->json($data);
	}



	public function store(Request $request) {
		$data=$request->only(['color']);
		$color=Color::create($data);
		return $color;
	}



	public function updateData(Request $request) {
		$id=$request->only(['id']);
		$data=$request->only(['color']);
		$categories=Color::find($id)->first()->update($data);
		if ($categories) {
			$data=Color::where('id',$id)->first();
    		return $data;
		};
		 return response()->json(['error'=>'500']);	
	}
}
