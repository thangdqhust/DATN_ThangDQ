<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Color;
use App\Size;
use App\Product_detail;
use App\Category;
use App\Gallary_image;

use Gloudemans\Shoppingcart\Facades\Cart;
class FontEndController extends Controller
{	
  public function index(){
    $categories=Category::get();
    $products= Product::orderBy('id','DESC')->paginate(3);
    foreach ($products as $key => $value) {
    	$img=Gallary_image::where('product_id',$value['id'])->first();
      if ($img!="") {
         $value['image']=$img->link;
     }
 }
 return view('font_end.index',['products'=>$products,'categories'=>$categories]);
}
public function posts($slug){
    $categories=Category::get();
    $products= Product::where('slug',$slug)->first();
    $mainImage=Gallary_image::where('product_id',$products['id'])->first();
    $img=Gallary_image::where('product_id',$products['id'])->get();
        // dd(empty($img));
    if (!empty($img)) {
        foreach ($img as $key => $value) {
            $img[$key]=$value->link;
        }
    }
    $notics=Product::where('slug','<>',$slug)->orderBy('id','DESC')->paginate(8);
    foreach ($notics as $key => $value) {
        $image=Gallary_image::where('product_id',$value['id'])->first();
        if (!empty($image)) {
            $value['image']=$image->link;
        }else{
            $value['image']='https://i.pinimg.com/originals/8c/e1/17/8ce11783765ecce2f91190cbe4c22f25.jpg';
        }
    }
    return view('font_end.posts-cours',['products'=>$products,'mainImage'=>$mainImage,'img'=>$img,'categories'=>$categories,'notics'=>$notics]);
}
public function addCustom (Request $request){
    return $request;
}
public function getColor(Request $request){
    if (empty($request['size'])) {

        $i=0;
        $data=[];
        $code= $request['code'];
        $colors=Product_detail::where('product_id',$code)->get();
        foreach ($colors as $key => $value) {
            $transport=Color::where('id',$value['color_id'])->first();
            $color['color']=$transport['color'];
            $color['id']=$transport['id'];
            $boolean="true";
            foreach ($data as $k => $element) {
                if ($color['color']==$element['color']) {
                    $boolean="false";
                    break;
                }
            }
            if ($boolean=="true") {
               $data[$i]=$color;
               $i++;
           }
       }
       return $data;
   }else{
    $size=$request['size'];
    $sizeT=Size::where('size',$size)->first();
    $i=0;
    $data=[];
    $code= $request['code'];
    $colors=Product_detail::where('product_id',$code)->where('size_id',$sizeT['id'])->get();
    foreach ($colors as $key => $value) {
        $transport=Color::where('id',$value['color_id'])->first();
        $color['color']=$transport['color'];
        $color['id']=$transport['id'];
        $boolean="true";
        foreach ($data as $k => $element) {
            if ($color['color']==$element['color']) {
                $boolean="false";
                break;
            }
        }
        if ($boolean=="true") {
           $data[$i]=$color;
           $i++;
       }
   }
   return $data;
}
}
public function getSize(Request $request){
    if (empty($request['color'])) {
        $i=0;
        $data=[];
        $code= $request['code'];
        $sizes=Product_detail::where('product_id',$code)->get();
        foreach ($sizes as $key => $value) {
            $transport=Size::where('id',$value['size_id'])->first();
            $size['size']=$transport['size'];
            $size['id']=$transport['id'];
            $boolean="true";
            foreach ($data as $k => $element) {
                if ($size['size']==$element['size']) {
                    $boolean="false";
                    break;
                }
            }
            if ($boolean=="true") {
               $data[$i]=$size;
               $i=$i+1;
           }

       }
       return $data;
   }else{
    $i=0;
    $color=$request['color'];
    $colorT=Color::where('color',$color)->first();
    $data=[];
    $code= $request['code'];
    $sizes=Product_detail::where('product_id',$code)->where('color_id',$colorT['id'])->get();
    foreach ($sizes as $key => $value) {
        $transport=Size::where('id',$value['size_id'])->first();
        $size['size']=$transport['size'];
        $size['id']=$transport['id'];
        $boolean="true";
        foreach ($data as $k => $element) {
            if ($size['size']==$element['size']) {
                $boolean="false";
                break;
            }
        }
        if ($boolean=="true") {
           $data[$i]=$size;
           $i=$i+1;
       }

   }
   return $data;
}
}
public function getColor_one(Request $request){
    $id=$request['id'];
    $data=Color::where('id',$id)->first();
    return $data;
}
public function getSize_one(Request $request){
    $id=$request['id'];
    $data=Size::where('id',$id)->first();
    return $data;
}
}
