<?php

namespace App\Http\Controllers;

use log;
use Stripe;
use Session;
use App\Models\Cart;
use App\Models\User;
use App\Mail\Contact;
use App\Models\order;
use App\Models\Reply;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Failed;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    //payment with cash
    public function cashOrder()
    {
        //getting if user is logged in
        $user = Auth::user();
        //getting user id
        $userid=$user->id;
        //getting all items thats matches user id from cart
        $query = Cart::where('user_id', '=', $userid)->get();
        //sending user data
        foreach ($query as  $order) {
            $arr= new order();

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
 DB::table('products')->where('product_name', $order->product_title)->decrement('quantity', $order->quantity);
        return redirect()->back()->with('status', 'Order placed Sucessfully');
    }
    //payment method
    public function payWithCard($totalprice)
    {
        return view('users.payWithCard', compact('totalprice'));
    }

    //payment method  for users

    public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
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
        foreach ($query as  $order) {
            $arr= new order();

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
        DB::table('products')->where('product_name', $order->product_title)->decrement('quantity', $order->quantity);
        return redirect()->back()->with('status', 'Order placed Sucessfully');

    }
    //show user order
        public function showUserOrder()
        {
            if (Auth::id()) {
                $user= Auth::user();
                $userid=$user->id;
                $data= order::where('user_id', '=', $userid)->paginate(10);
                return view('users.order', compact('data'))->with('no', 1);
            } else {
                return redirect('login');
            }
        }
        //user cancel order
        public function cancelOrder($id)
        {
            $arr = order::find($id);
            $arr->delivery_status ='Your Order Has Been Cancelled';
            $arr->save();
            return back();
        }
//show comments
        public function comment(Request  $request)
        {

                $formfields = $request->validate([
                            'name' => 'required',
                            'comment'=>'required|min:3'
                ]);
             $formfields['user_id']= Auth::user()->id;
                   Comment::Create($formfields);
                   return back()->with('comment', 'Comment sucessfully added' );
        }
        //show comment
        public function showComment()
        {
        $comment= Comment::all();
            return view('components._comments', compact('comment'));
        }

        public function replyComment(Request $request)
        {
                $formfields= $request->validate([
                    'name' => 'required',
                    'reply'=>'required',
                    'comment_id'=>'required'
                ]);

                $formfields['user_id']=Auth::user()->id;

                    Reply::Create($formfields);
                 return back()->with('comment', 'comment Sent Sucessfully');
        }
//resetting password
        public function UpdatePassword(Request $request)
        {
            //basic validation
                $formfields= $request->validate([
                    'oldpassword' => 'required',
                    'password' => 'required|min:6|max:20',
                ]);
                //get password from database
                    $getpassword = auth()->user()->password;

                //check if current password match
            if (Hash::check($request->oldpassword, $getpassword)) {
                    //save new password
                User::whereId(auth()->user()->id)->update([
                    'password' => Hash::make($request->password)
                ]);
                        return back()->with('change_password', 'Password Changed sucessfully');
                    }

                    else{
                            return back()->with('change_password', 'The old password dosent match your old password');
                    }



        }
        //send complain to admins
        public function contactus(Request $request)
        {
                $formfields = $request->validate([
                    'name'=>'required',
                    'email' =>'required|email',
                    'message'=>'required',
                    'head'=>'required'
        ]);
            $this->sendmail($formfields);
            return back()->with('message', 'Mail Sent Sucessfully our Tech team will review your mail soon ');



        }
        public function sendmail($formfields)
        {
                Mail::to('agimqwertyakomaye@gmail.com')->send(new Contact($formfields));
                return back()->with('message', 'A Password Reset Link Has Been Sent To Your Email');
        }

}

