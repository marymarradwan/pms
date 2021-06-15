<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
class ProductsController extends Controller
{
    public function add(){

        return view ('products.add');
    }

  public function store(Request $request){

 $product = new Product;
 $product->name = $request->name;
 $product->barcode = $request->barcode;
 $product->description = $request->description;
 $product->limit_Qty = $request->limit_Qty;
 if(isset($request->image)){
    $image_name=rand().".".$request->image->getClientOriginalExtension();
    $product->imag=$image_name;
    $request->image->move('upload',$image_name);
   }
 $product->current_price = $request->current_price;
 $product->net_price = $request->net_price;
 $product->application = $request->application;
 $product->composition = $request->composition;
 $product->side_effects = $request->side_effects;
 $product->notes = $request->notes;
 $product->format_id = $request->format_id;
 $product->factory_id = $request->factory_id;
 $product->shelf_id = $request->shelf_id;
 $product->pharmacy_id = $request->pharmacy_id;
 $product->type_id = $request->type_id;
 $product->caliber_id = $request->caliber_id;
 $product->chemicalname_id = $request->chemicalname_id;

 $product->save();
        return back();
    }

 public function all(){

 $product= Product::all();
        return view ('products.all', compact('product'));
    }

   public function edit($id){

       $product= Product::where('id','=',$id)->first();

        return view ('products.edit',compact('product'));
    }

    public function update($id,Request $request){

 $product =Product::find($id);
 $product->name = $request->name;
 $product->barcode = $request->barcode;
 $product->description = $request->description;
 $product->limit_Qty = $request->limit_Qty;
 if(isset($request->image)){
    $image_name=rand().".".$request->image->getClientOriginalExtension();
    $product->imag=$image_name;
    $request->image->move('upload',$image_name);
   }
 $product->current_price = $request->current_price;
 $product->net_price = $request->net_price;
 $product->application = $request->application;
 $product->composition = $request->composition;
 $product->side_effects = $request->side_effects;
 $product->notes = $request->notes;
 $product->format_id = $request->format_id;
 $product->factory_id = $request->factory_id;
 $product->shelf_id = $request->shelf_id;
 $product->pharmacy_id = $request->pharmacy_id;
 $product->type_id = $request->type_id;
 $product->caliber_id = $request->caliber_id;
 $product->chemicalname_id = $request->chemicalname_id;
 $product->save();
        return redirect('/products/all');
    }

    public function delete($id){

     $product= Product::find($id);
     $product->delete();
       return redirect('/products/all');
    }
}
