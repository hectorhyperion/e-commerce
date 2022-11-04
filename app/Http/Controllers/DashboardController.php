<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Category;
use App\Models\order;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;
use log;

class DashboardController extends Controller
{
    //
    public function cashOrder()
    {
        //getting if user is logged in
          $user = Auth::user();
          //getting user id
          $userid=$user->id;
          //getting all items thats matches user id from cart
        $query = Cart::where('user_id', '=', $userid)->get();
        //sending user data
            foreach ($query as  $order)
            {
                $arr= new order;

                        $arr->user_name = $order->user_name;
                        $arr->address = $order->address;
                        $arr->user_id = $order->user_id;
                        $arr->email = $order->email;
                        $arr->phone = $order->phone;
                        $arr->product_name = $order->product_title;
                        $arr->price = $order->price;
                        $arr->image= $order->image;
                        $arr->quantity = $order->quantity;
                        $arr->product_id = $order->product_id;
                        $arr->payment_status='cash on delivery';
                        $arr->delivery_status='Processing';

                                $arr->save();

                        $_id=$order->id;
                    $cart= Cart::find($_id);
                    $cart->delete();
            }

                return redirect()->back()->with('status', 'Order placed Sucessfully');

    }
    public function payWithCard($totalprice)
    {

            return view('users.payWithCard', compact('totalprice'));
    }

    public function stripePost(Request $request , $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks For Payement"
        ]);
           //getting if user is logged in
           $user = Auth::user();
           //getting user id
           $userid=$user->id;
           //getting all items thats matches user id from cart
         $query = Cart::where('user_id', '=', $userid)->get();
         //sending user data
             foreach ($query as  $order)
             {
                 $arr= new order;

                         $arr->user_name = $order->user_name;
                         $arr->address = $order->address;
                         $arr->user_id = $order->user_id;
                         $arr->email = $order->email;
                         $arr->phone = $order->phone;
                         $arr->product_name = $order->product_title;
                         $arr->price = $order->price;
                         $arr->quantity = $order->quantity;
                         $arr->product_id = $order->product_id;
                         $arr->image= $order->image;
                         $arr->payment_status='paid';
                         $arr->delivery_status='Processing';

                                 $arr->save();

                         $_id=$order->id;
                     $cart= Cart::find($_id);
                     $cart->delete();
             }


        Session::flash('success', 'Payment successful!');

        return back();
    }

}
