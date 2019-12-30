<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use Yajra\Datatables\Datatables;
use App\Product;
use App\User;
use App\Category;
use App\Gallary_image;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){
        $categories= Category::get();
        $users= User::where('role','<>','0')->get();
    	return view('products.index',['categories'=>$categories,'users'=>$users]);
    }
    public function anyData(){
        $products = Product::select('products.*');
        return Datatables::of($products)
        ->addColumn('action', function ($product) {
            return'
            <button type="button" class="btn btn-xs btn-info" data-toggle="modal" href="#showProduct"><i class="fa fa-eye" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-xs btn-warning"data-toggle="modal" onclick="getInfo('.$product['id'].')" href="#edit-modal"><i class="fa fa-pencil" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-xs btn-danger" onclick="alDelete('.$product['id'].')"><i class="fa fa-trash" aria-hidden="true"></i></button>
            ';
            
        })
        ->setRowId('product-{{$id}}')
        ->editColumn('sale_cost', '{{ number_format($sale_cost)}}')
        ->editColumn('origin_cost', '{{ number_format($origin_cost)}}')
        // ->rawColumns(['action'])
        ->make(true);
}
	public function plusData($id){
        $product=Product::find($id);
        $product['images']=Gallary_image::where('product_id',$id)->first();
        $product_detail=Product_detail::where('product_id',$product['id'])->first();
        if (!empty($product_detail)) {
        $size=Size::where('id',$product_detail['size_id'])->get();
        $product['size']=$size->size;
        $color=Color::where('id',$product_detail['color_id'])->get();
        $product['color']=$color->color;
        }
        return response()->json($product);
    }
    public function getProduct($id){
        $product=Product::find($id);
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
        $data=$request->only(['name','quantity  ','description','content','sale_cost','origin_cost','category_id','user_id']);
        if ($data['user_id']) {
            $data['user_id']=Auth::id();
        }
        $data['slug']=str_slug($data['name']);
        $product=Product::create($data);
        foreach ($request['images'] as $key => $image) {
            $imageName= '/images/product/'.time().$key.'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images/product'), $imageName);
        $gallary['link']=$imageName;
        $gallary['product_id']=$product['id'];
        $data=Gallary_image::create($gallary);
        }
        return $product;
    
    }
    public function updateProduct(ProductUpdateRequest $request) {
        $data=$request->only(['quantity','name','description','content','sale_cost','origin_cost','category_id','user_id',]);
        if ($data['user_id']) {
            unset($data['user_id']);
        }
        $id=$request->only(['id']);
        $data['slug']=str_slug($data['name']).time();
        $boolean=Product::where('id',$id)->update($data);
        if ($boolean) {
        return Product::find($id)->first();
        }else{
            return response()->json(['error'=>'500']);
        }
        if (!isempty($request['images'])) {
            # code...
            foreach ($request['images'] as $key => $image) {
                $imageName= request()->getHttpHost().'/images/product/'.time().$key.'.'.$image->getClientOriginalExtension();

            $image->move(public_path('images/product'), $imageName);
            $gallary['link']=$imageName;
            $gallary['product_id']=$product['id'];
            $data=Gallary_image::create($gallary);
            }
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
    public function manageUser($slug){

        $products= Product::where('slug',$slug)->first();
        
    }
}
