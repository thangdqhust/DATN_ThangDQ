<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Yajra\Datatables\Datatables;
use App\Product;
use App\Category;
use App\User;
use App\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $products= Product::get();
        $users= User::get();
        return view('orders.index',['products'=>$products,'users'=>$users,]);
    }
    public function anyData(){

        $orders = Order::with('products')->with('users');
        return Datatables::of($orders)
         ->editColumn('product_id', function($order)
                          {
                             return $order->product->name;
                          })
        ->addColumn('action', function ($order) {
            return'
            <button type="button" class="btn btn-xs btn-info" data-toggle="modal" href="#wareHousing" onclick="wareHousing('.$order['id'].')" ><i class="fa fa-eye" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-xs btn-danger" onclick="alDelete('.$order['id'].')"><i class="fa fa-trash" aria-hidden="true"></i></button>
            ';
            
        })
        ->setRowId('product-{{$id}}')
        ->editColumn('total', '{{ number_format($total)}}')
        // ->rawColumns(['action'])
        ->make(true);
    }

    public function store(Requests $request){
        $data = $request->only(['member','product_id','user_id','receive','leave','status','note']);
        $data=Order::create($data);
        return response()->json('true');
    }

    public function setNote(Requests $request){
        $data = $request->only(['note']);
        $id = $request->only(['id']);
        $data=Order::find($id)->update($data);
        return response()->json('true');
    }
    
    public function getNote($id){
        $data=Order::find($id);
        return $data;
    }
    public function changeStatus(Requests $request){
        $data = $request->only(['status']);
        $id = $request->only(['id']);
        $data=Order::find($id)->update($data);
        return response()->json('true');
    }
}


