<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use App\User;
class CategoryController extends Controller
{
     public function index(){
        $currentUser= Auth::guard('admin')->user();
    	$categories= Category::get();
    	// dd($currentUser);
    	$sumNotice="0";
    	$sumPost="0";
    	return view('category.index',['currentUser'=>$currentUser,'sumNotice'=>$sumNotice,'sumPost'=>$sumPost],['categories'=>$categories]);
	}

	public function anyData(){
        $categories = Category::select('categories.*');
        return Datatables::of($categories)
        ->addColumn('action', function ($category) {
            return'
            <button type="button" class="btn btn-xs btn-info" data-toggle="modal" href="#showProduct"><i class="fa fa-eye" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-xs btn-warning"data-toggle="modal" onclick="getProduct('.$category['id'].')" href="#editProduct"><i class="fa fa-pencil" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-xs btn-danger" onclick="alDelete('.$category['id'].')"><i class="fa fa-trash" aria-hidden="true"></i></button>
            ';
            
        })
        ->setRowId('category-{{$id}}')
        ->make(true);
}

	
	public function getData($id){
    	$categories=Category::find($id);
    	return $categories;
	}



	public function destroy($id){
		// Product::find($id);

		$data=Category::find($id)->delete();
		return response()->json($data);
	}



	public function store(CategoryRequest $request) {
		$data=$request->only(['name','parent_id','sort_order']);
		$categories=Category::create($data);
		$pid=$categories->parent_id;
		if ($pid=='0') {
    			$categories['parent_id']="Main Category";
    		}else{
	    		$pid=Category::where('id',$pid)->first();
	    		$categories['parent_id']=$pid->name;
    		}
		return $categories;
	}



	public function updateData(CategoryRequest $request) {
		$id=$request->only(['id']);
		$data=$request->only(['name','parent_id','sort_order']);
		$categories=Category::find($id)->first()->update($data);
		if ($categories) {
			$data=Category::where('id',$id)->first();
			$pid=$data->parent_id;
			if ($pid=='0') {
    			$data['parent_id']="Main Category";
    		}else{
	    		$pid=Category::where('id',$pid)->first();
	    		$data['parent_id']=$pid->name;
    		}
    		return $data;
		};
		 return response()->json(['error'=>'500']);	
	}
}
