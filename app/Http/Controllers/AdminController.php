<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use log;

class AdminController extends Controller
{
    //
    public function addcategory(Request $request)
    {
            $data = $request->validate([
                    'category_name'=>'required|min:1'
            ]);
         
            $catt= Category::create($data);
            if ($catt == true)
            {
               return redirect()->back()->with('status', 'Category Created Sucessfully');
            }
    }

    public function categoryDelete(Category $id)
    {
              $id->delete();
                return redirect()->back()->with('status', 'Category Deleted Sucessfully');
    }
    public function storeCategory( Request $request, Category $id)
    {
                        $data= $request->validate([
                                'category_name'=>'required'
                        ]);  
                        $id->update($data);
                        if ($data == true) {
                                 return redirect('/Category')->with('status', 'Category Deleted Sucessfully');
                        }

                     
    }
}
