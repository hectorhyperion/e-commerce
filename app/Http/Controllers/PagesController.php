<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
use App\Models\order;
use App\Models\Products;
use App\Models\Reply;
use App\Models\UserTypes;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Stripe\Product;

class PagesController extends Controller
{
//home page
    public function index()
    {
        if(Auth::id())
        {
            return redirect()->back();
        }
        //passing product to view
           $data= Category::all();
           $comment =Comment::all();
         //  $arr= Products::filter(request(['search']))->paginate(15);
        return View('Index',compact('data','comment'));
    }
//sign up page
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
//login page
        public function login(){
                $data= Category::all();
            return view('verification.login',compact('data'));
        }
//admin view
         public function adminIndex(){
            $total_product= Products::all()->count();
            $total_users=User::all()->count();
            $total_order= order::all()->count();
            $order= order::all();
            $total_revenue= 0;
                    foreach ($order as  $order) {
                         $total_revenue= $total_revenue + $order->price;
                    }
                    $total_delivered =order::where('delivery_status', '=', 'delivered')->get()->count();
                    $total_processing =order::where('delivery_status', '=', 'processing')->get()->count();

                      return view('admin/Index', compact('total_product', 'total_users', 'total_order', 'total_revenue','total_delivered', 'total_processing'));

        }

        public function contact(){
            return view('users.contact');
        }
//user view
        public function dashboard(){

                $data= Category::all();
                $comment= Comment::paginate(10);
                $reply = Reply::orderBy('created_at', 'desc')->get();
                return view('users.dashboard',compact('data','comment','reply'));
        }

        //show category
        public function category(){
                $data= Category::filter(request(['search']))->paginate(10);
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
        //admin show product page
        public function showProduct()
        {
            $data = Products::orderBy('created_at', 'asc')->filter(request(['search']))->paginate(15);
            return view('admin.showProduct',compact('data'))->with('no', 1);
        }
        //admin edit products
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
              $arr=Products::orderBy('created_at', 'asc')->filter(request(['search']))->paginate(10);

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
public function addCart(Request $request, $id)
{


        if (Auth::id())
         {
                            $user =Auth::user();
               $product = Products::find($id);


  if($product->discount_price!=null)
 {
            $arr= $request->discount_price*$request->quantity;

}
else{
    $arr=$request->price*$request->quantity;

}
                    $formField =([
                                'user_name'=> $user->name,
                                'email' =>$user->email,
                                'phone'=>$user->phone,
                                'address'=>$user->address,
                                'user_id'=>$user->id,
                                'product_title'=>$product->product_name,
                                    'price'=>$arr,
                                'product_id'=>$product->id,
                                'image'=>$product->image,
                                'quantity'=>$request->quantity

                    ]);
                        Cart::create($formField);
                        return redirect()->back();
        }
        else{
                return redirect('login');
        }
}
//show cart
public function showCart()
{

                 $id=Auth::user()->id;
    $data   =Category::all();
                 $arr = Cart::where('user_id','=', $id)->get();
            return view('users.Cart',compact('data','arr'));
}
    public function RemoveCart($id)
    {
            $query= Cart::find($id);
            $query->delete();
                    return redirect()->back();
    }
}

