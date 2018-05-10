<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\Datatables\Datatables;
use App\User;
use App\Product;

use AuthenticatesUsers;
class FormController extends Controller
{
     public function create()
    {
        //
        return view('products.index');
        
    }
    public function anyData()
{	
    // return Datatables::of(User::query())->make(true);
    // $products = Product::select('products.*', 'categories.name as category_name', 'brands.name as brand_name')->join('categories', 'products.category_id', '=', 'categories.id')
    //                         ->join('brands', 'products.brand_id', '=', 'brands.id')
    //                         ->orderBy('products.id', 'desc');
    $products = Product::select('products.*');

        return Datatables::of($products)
        ->addColumn('action', function ($product) {
            return'
            <button type="button" class="btn btn-xs btn-info" data-id="'.$product->id.'"><i class="fa fa-eye" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-xs btn-warning" data-id="'.$product->id.'"><i class="fa fa-pencil" aria-hidden="true"></i></button>
            <button type="button" class="btn btn-xs btn-danger" data-id="'.$product->id.'"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
	
    
 /*Output: 
4 inch
1
8 megapixel
5.1 inch
1
16 megapixel
*/
}
