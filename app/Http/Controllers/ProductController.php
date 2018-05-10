<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Product;
use App\Product_detail;
use App\User;
class ProductController extends Controller
{
    public function index(){
    	$currentUser= User::first();
    	$products= Product::get();
    	// dd($currentUser);
    	$sumNotice="0";
    	$sumPost="0";
    	return view('products.index',['currentUser'=>$currentUser,'sumNotice'=>$sumNotice,'sumPost'=>$sumPost],['products'=>$products]);
    }
    public function anyData()
{	
    // return Datatables::of(User::query())->make(true);
    // $products = Product::select('products.*', 'categories.name as category_name', 'brands.name as brand_name')->join('categories', 'products.category_id', '=', 'categories.id')
    //                         ->join('brands', 'products.brand_id', '=', 'brands.id')
    //                         ->orderBy('products.id', 'desc');
    $products = Product::select('products.*','product-details.quantity as quantity')
    ->join('product-details', 'products.id', '=', 'product-details.product_id');
    // ->join('colors', 'product-details.color_id', '=', 'colors.id')
    // ->join('sizes', 'product-details.size_id', '=', 'sizes.id');

        return Datatables::of($products)
        ->addColumn('action', function ($product) {
            return'
            <button type="button" class="btn btn-xs btn-info" data-toggle="modal" href="#showProduct"><i class="fa fa-eye" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-xs btn-warning"data-toggle="modal" onclick="getProduct('.$product['id'].')" href="#editProduct"><i class="fa fa-pencil" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-xs btn-danger" onclick="alDelete('.$product['id'].')"><i class="fa fa-trash" aria-hidden="true"></i></button>
            ';
            
        })
        // ->setRowClass(function ($image) {
        //     return $image->id % 2 == 0 ? 'pink' : 'green';
        // })
        //->editColumn('image', '<img src=""/>')
        //->editColumn('brand_id', 'tung{{$category_id}}')
        //->editColumn('category_id', Category::where('id', '=',$category_id)->first()->name)
        ->setRowId('product-row-{{$id}}')
        // ->rawColumns(['action'])
        ->make(true);
}
	
    public function getProduct($id){
        $posts=Product::find($id)  ;
        // $categories=Category::orderBy('id','DESC')->get();
        return response()->json($posts);
    }
    public function delete($id){
        // Product::find($id);

        $data=Post::find($id)->delete();
        return response()->json($data);
    }
    
    public function store(PostRequest $request) {
        if ($request->hasFile('image')) {
        $imageName= request()->getHttpHost().'/images/posts/'.time().'.'.$request->image->getClientOriginalExtension();
        
        $request->image->move(public_path('images/posts'), $imageName);
        }else{
            $imageName=request()->getHttpHost().'/images/posts/userDefault.png';
        }
        
        $data=$request->all();
        $data['user_id'] = Auth::user()->id;
        unset($data['image']);
        unset($data['tags']);
        $data['image']=$imageName;
        $data['slug']=str_slug($data['title']);
        $user= Post::create($data);
         return $user;
        // return redirect()->back();
    
    }
    public function updatePost(PostRequest $request) {
        $data=$request->all();
        if ($request->hasFile('editImage')) {
        $imageName= request()->getHttpHost().'/images/posts/'.time().'.'.$request->editImage->getClientOriginalExtension();

        $request->editImage->move(public_path('images/posts'), $imageName);
        $data['image']=$imageName;
        }
        unset($data['editImage']);
        unset($data['tags']);
        unset($data['id']);
        $id=$request->only(['id']);
        $boolean=Post::find($id)->first()->update($data);
        if ($boolean) {
        return Post::find($id)->first();
        }else{
            return response()->json(['error'=>'500']);
        }
    }
    public function getReason($id){
        $post=Post::where('id',$id)->first();
        return $post;
    }
}
