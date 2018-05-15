<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Yajra\Datatables\Datatables;
use App\Product;
use App\Vendor;
use App\Product_detail;
use App\User;
use App\Gallary_image;
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
    public function anyData(){
            // return Datatables::of(User::query())->make(true);
    // $products = Product::select('products.*', 'categories.name as category_name', 'brands.name as brand_name')->join('categories', 'products.category_id', '=', 'categories.id')
    //                         ->join('brands', 'products.brand_id', '=', 'brands.id')
    //                         ->orderBy('products.id', 'desc');
    // $products = Product::select('products.*','product-details.quantity as quantity')
    // ->join('product-details', 'products.id', '=', 'product-details.product_id');
    // ->join('colors', 'product-details.color_id', '=', 'colors.id')
    // ->join('sizes', 'product-details.size_id', '=', 'sizes.id');
        $products = Product::select('products.*');
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
        ->setRowId('product-{{$id}}')
        // ->rawColumns(['action'])
        ->make(true);
}
	
    public function getProduct($id){
        $product=Product::find($id)  ;
        // $categories=Category::orderBy('id','DESC')->get();
        $product['images']=Gallary_image::where('product_id',$id)->get();
        return response()->json($product);
    }
    public function destroy($id){
        // Product::find($id);

        $data=Product::find($id)->delete();
        return response()->json($data);
    }
    
    public function store(ProductRequest $request) {
        $vendor=$request->only(['vendor']);
        $codeVendor=Vendor::where('id',$vendor)->first();
        $data=$request->only(['name','description','content','sale_cost','origin_cost']);
        (int)$number=Product::where('vendor',$codeVendor['id'])->count();
        $numberAll=$number+2;
        if ($number<10) {
        $data['code']=$codeVendor['code'].'0000'.$numberAll;
        }elseif ($number<100) {
            $data['code']=$codeVendor['code'].'000'.$numberAll;
        }elseif ($number<1000) {
            $data['code']=$codeVendor['code'].'00'.$numberAll;
        }elseif ($number<10000) {
            $data['code']=$codeVendor['code'].'0'.$numberAll;
        }
        $data['slug']=str_slug($data['name']);
        $data['vendor']=$codeVendor['id'];
        $product=Product::create($data);
        
        foreach ($request['images'] as $key => $image) {
            $imageName= 'http://'.request()->getHttpHost().'/images/product/'.time().$key.'.'.$image->getClientOriginalExtension();

        $image->move(public_path('images/product'), $imageName);
        $gallary['link']=$imageName;
        $gallary['product_id']=$product['id'];
        $data=Gallary_image::create($gallary);
        }
        return $product;
        // $data['code']=$codeVendor.''
        // $data['user_id'] = Auth::user()->id;
        // unset($data['image']);
        // unset($data['tags']);
        // $data['image']=$imageName;
         // return $user;
        // return redirect()->back();
    
    }
    public function updateProduct(ProductRequest $request) {
        $id=$request->only(['id']);
        $vendor=$request->only(['vendor']);
        $codeVendor=Vendor::where('id',$vendor)->first();
        $data=$request->only(['name','description','content','sale_cost','origin_cost']);
        $data['slug']=str_slug($data['name']);
        $data['vendor']=$codeVendor['id'];
        $boolean=Product::where('id',$id)->update($data);
        if ($boolean) {
        return Product::find($id)->first();
        }else{
            return response()->json(['error'=>'500']);
        }
        foreach ($request['images'] as $key => $image) {
            $imageName= request()->getHttpHost().'/images/product/'.time().$key.'.'.$image->getClientOriginalExtension();

        $image->move(public_path('images/product'), $imageName);
        $gallary['link']=$imageName;
        $gallary['product_id']=$product['id'];
        $data=Gallary_image::create($gallary);
        }
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
