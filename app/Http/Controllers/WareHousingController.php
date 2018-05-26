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
use App\Size;
use App\Color;
use Hash;
use App\Order;
use App\Order_detail;
use Gloudemans\Shoppingcart\Facades\Cart;
class WareHousingController extends Controller
{   
    public static $numberOfOrder=0;
    public function wareHousing(Request $request){
        $id=$request['id'];
        $data= Product::where('id',$id)->first();
        $result[0]= $data;
        if (!empty($data)) {
            $detail= Product_detail::where('product_id',$data['code'])->orderBy('id','DESC')->get();
            # code...
            if (!$detail->isEmpty()) {

                foreach ($detail as $key => $value) {
                    $color=Color::where('id',$value['color_id'])->first();
                    $size=Size::where('id',$value['size_id'])->first();
                    $value['color_id']=$color['color'];
                    $value['size_id']=$size['size'];
                }
                $result[1]= $detail;
            }
        }
        return response()->json($result);
    }
    public function storewareHousing(Request $request){
        // return $request;
        $id=$request['product_id'];
        $data= Product::where('id',$id)->first();
        $detail=$request->only(['color_id','size_id','quantity']);
        $detail['product_id']=$data['code'];
        $check=Product_detail::where('product_id',$data['code'])->where('size_id',$detail['size_id'])->where('color_id',$detail['color_id'])->first();
        if (!empty($check)) {
            $a=(int)$detail['quantity'];
            $b=(int)$check['quantity'];
            (string)$c=$a+$b;
            $check['quantity']=(string)$c;
            // return $check;
            // return $quantity;
            $data=$check->only(['quantity','color_id','size_id','product_id']);
            $xx=Product_detail::find($check['id'])->first()->update($data);
            $data=Product_detail::where('product_id',$check['product_id'])->orderBy('id','DESC')->get();
            foreach ($data as $key => $value) {
                $color=Color::where('id',$value['color_id'])->first();
                $size=Size::where('id',$value['size_id'])->first();
                $value['color_id']=$color['color'];
                $value['size_id']=$size['size'];
            }
            return $data;
        }else{
            // return $detail;
            Product_detail::create($detail);
            $data=Product_detail::where('product_id',$detail['product_id'])->orderBy('id','DESC')->get();
            foreach ($data as $key => $value) {
                $color=Color::where('id',$value['color_id'])->first();
                $size=Size::where('id',$value['size_id'])->first();
                $value['color_id']=$color['color'];
                $value['size_id']=$size['size'];
            }
            return $data;
        }
        
    }
    public function destroy($id){
        // Product::find($id);

        $data=Product_detail::find($id)->delete();
        return response()->json($data);
    }
    public function addToCart(Request $request)
    {      
        $code=$request['code'];
        $size=$request['size'];
        $color=$request['color'];
        $quantity=$request['quantity'];
        $product=Product::where('code',$code)->first();
        $image=Gallary_image::where('product_id',$product['id'])->first();
        $price=(int)$product['sale_cost']*(int)$quantity;
        $cart = Cart::add(
            $product['code'], $product['name'],$quantity, $price,
            ['size' =>$size,'color' => $color,'image' => $image['link']]);
        return $cart;
    }
    public function createOrder(Request $request)
    {   $data =$request->only(['name','phone','email','address']);
        $data['code']='UO'.time();
        $total=Cart::total();
        $total=explode('.', $total);
        $data['total']=str_replace( ',', '', $total[0] );
        $order=Order::create($data);
        foreach (Cart::content() as $key => $value) {
            $color=Color::where('color',$value->options['color'])->first();
            $size=Size::where('size',$value->options['size'])->first();
            $detail=Product_detail::where('product_id',$value->id)->where('color_id',$color['id'])->where('size_id',$size['id'])->first();
            $update['quantity']=(int)$detail['quantity']-(int)$value->qty;
            Product_detail::where('id',$detail['id'])->update($update);
            $orderDetail['order_id']=$order['id'];
            $orderDetail['product_detail_id']=$detail['id'];
            $orderDetail['product_id']=$value->id;
            $orderDetail['quantity']=$value->qty;

            Order_detail::create($orderDetail);
        }
       return response()->json('true'); 
    }
    public function orderDelete($id)
    {   $data=Cart::remove($id);
       return response()->json(Cart::total());
    }  
    public function deleteAll(Request $request)
    {   $data=Cart::destroy();
       return response()->json(Cart::total());
    } 

}	