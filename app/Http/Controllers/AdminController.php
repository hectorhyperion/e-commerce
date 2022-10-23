<?php

namespace App\Http\Controllers;

use log;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    //
    public function addcategory(Request $request)
    {
        $data = $request->validate([
                'category_name'=>'required|min:1'
        ]);

        $catt= Category::create($data);
        if ($catt == true) {
            return redirect()->back()->with('status', 'Category Created Sucessfully');
        }
    }
//delete category
    public function categoryDelete(Category $id)
    {
        $id->delete();
        return redirect()->back()->with('status', 'Category Deleted Sucessfully');
    }
    //store category edit
    public function storeCategory(Request $request, Category $id)
    {
        $data= $request->validate([
                'category_name'=>'required'
        ]);
        $id->update($data);
        if ($data == true) {
            return redirect('/Category')->with('status', 'Category Deleted Sucessfully');
        }
    }
    //adding product 
    public function productStore(Request $request)
    {
                        $formFields = $request->validate([
                                'product_name'=>'required|min:2',
                                'description'=>'required|min:50',
                                'quantity'=>'required',
                                'price' =>'required',
                                'discount_price'=>'required',
                                'image'=>'required',
                                'category' =>'required',
                        ]);
                        if ($request->hasFile('image'))
                        {
                       $formFields['image']=$request->file('image')->store('images', 'public');
                       }
                       Products::insert($formFields);
                       return redirect()->back()->with('success', 'Product Added sucessfylly');
    }
    //deleting product from databse 
    public function deleteProduct(Products $id){
         
            $id->delete();
            return redirect()->back()->with('product', 'Product deleted Sucessfully');
    }
    //updating products
    public function storeEditProducts(Request $request, Products $id)
    {
        $formFields = $request->validate([
            'product_name'=>'required|min:2',
            'description'=>'required|min:50',
            'quantity'=>'required',
            'price' =>'required',
            'discount_price'=>'required',
            'category' =>'required',
    ]);
    if ($request->hasFile('image'))
    {
                $formFields['image']=$request->file('image')->store('images', 'public');
               
                 // $data->update($formFields);
        }          
            $id->update($formFields);
            return redirect('/showProduct')->with('product', 'Product Updated sucessfully');
  
    }
}
