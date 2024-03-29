<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
use App\Models\order;
use App\Models\Products;
use App\Models\Reply;
use App\Models\todaysoffers;
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
           $todaysoffers = Products::inRandomOrder()->limit(5)->get();
         //  $arr= Products::filter(request(['search']))->paginate(15);
        return View('Index',compact('data','comment','todaysoffers'));
    }
//sign up page
    public function register(){
      if (User::where('usertype', 'admin')->exists())
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
            if (Auth::user()->usertype=='admin') {

            }
            else{
                return redirect('/logout');
            }
            $total_product= Products::all()->count();
            $total_users=User::where('usertype' , '=' , 'user')->count();
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
            $data= Category::all();
            return view('users.contact', compact('data'));
        }
//user view
        public function dashboard(){
                if (Auth::user()->usertype=='user') {

                }
                else{
                    return redirect('/logout');
                }
                $data= Category::all();
                $comment= Comment::paginate(10);
                $reply = Reply::orderBy('created_at', 'desc')->get();
                $todaysoffers= Products::inRandomOrder()->limit(5)->get();
                return view('users.dashboard',compact('data','comment','reply','todaysoffers'));
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
                            $userid=$user->id;
               $product = Products::find($id);
                    //increasing product quantity in cart
                $product_exist_id=Cart::where('product_id', '=', $id)->where('user_id', '=', $userid)->get('id')->first();

                //checking product
                if($product_exist_id !=null)
                {
                    //finding item in cart
                         $cart = Cart::find($product_exist_id)->first();
                         $quantity=$cart->quantity;
                         $cart->quantity=$quantity+ $request->quantity;
                         //changing ammount base on quantity
                         if($product->discount_price!=null)
        {
            $cart->price= $request->discount_price*$cart->quantity;

        }
else{
    $cart->price=$request->price*$cart->quantity;

}
                        $cart->save();
                         return back()->with('message', 'Item Added Sucessfully');
                }



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
                        return back()->with('message', 'Item Added Sucessfully');
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
    public function changePassword()
    {
        $data = Category::all();
            return view('verification.changePassword', compact('data'));
    }
    public function forgotpassword()
    {
        $data = Category::all();
        return view('verification.forgotpassword', compact('data'));
    }
    public function todayoffers()
    {
            return view('admin.todaysoffers');
    }

}

