<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Products;
use App\Models\UserTypes;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{

    public function index()
    {
        if(Auth::id())
        {
            return redirect()->back();
        }
        //passing product to view
           $data= Category::all();
        return View('Index',compact('data'));
    }
    public function register(){
      if (User::where('usertype', '1')->exists())
      {
            $user= UserTypes::where('id', 2)->get();
      }
      else{
         $user = UserTypes:: all();
      }
       $data= Category::all();

              return view('verification.register', compact('user','data'));
        }
        public function login(){
                $data= Category::all();
            return view('verification.login',compact('data'));
        }
         public function adminIndex(){
                      return view('admin/Index');

        }
        public function contact(){
            return view('users.contact');
        }
        public function dashboard(){
                    $data= Category::all();
                return view('users.dashboard',compact('data'));

        }
        //show category
        public function category(){

            return view('admin.view-category', compact('data'))->with('no',1);
        }
        //show category edit page
        public function categoryEdit($id)
        {
                       $data = Category::find($id);
                    return view('admin.edit_category',compact('data'));
        }
        public function addProduct()
        {
            $data = Category::all();
            return view('admin.addProduct',compact('data'));
        }
        //show product page
        public function showProduct()
        {
            $data = Products::orderBy('created_at', 'asc')->paginate(15);
            return view('admin.showProduct',compact('data'))->with('no', 1);
        }
        public function editProduct($id )
        {
            $data= Products::find($id);
            $arr= Category::all();
            return view('admin.editProduct',compact('data','arr'));
        }
        //passing product to user interface
        public function product()
        {
            $data= Category::all();
                    $arr=Products::orderBy('created_at', 'asc')->paginate(10);

                    return view('users.product',compact('arr', 'data'));
        }
        public function productlistings($id)
        {
                         $data= Category::all();
                            $arr = Products:: find($id);
                return view('users.listings',compact('data','arr'));
        }
        //redirect nav category
public function navCategory($category_name)
{
            $title= $category_name;
        $arr=Category::find($category_name);
            $data=Category::all();
            $query= Products::where('category',$category_name)->orderBy('created_at', 'asc')->paginate(10);
            return view('users.productCategory', compact('arr','data','query','title'));
}
}

