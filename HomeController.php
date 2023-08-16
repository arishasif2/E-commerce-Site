<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Stripe;
use App\Models\User;
class HomeController extends Controller
{
    public function index(){
        $product=Product::all();
        return view('home.userpage',compact('product'));
    }

    public function redirect(){
        $usertype=Auth::user()->usertype;
        if($usertype =='1'){
            return view('admin/home');
        }
        else{
            $product=Product::all();
        return view('home.userpage',compact('product'));
        }
    }
    public function product_details($id)
    {
        $product=Product::find($id);
        return view('home.productdetails',compact('product'));
    }

    public function add_cart(Request $req,$id)
    {
       if(Auth::id()){
        $user=Auth::user();
        $product=Product::find($id);
        $cart=new Cart;
        $cart->name=$user->name;
        $cart->phone=$user->phone;
        $cart->email=$user->email;
        $cart->address=$user->address;
        $cart->user_id=$user->id;
        $cart->product_title=$product->title;
        $cart->product_id=$product->id;
        if($product->discount_price!=NULL){
        $cart->price=$product->discount_price;}
        else{
            $cart->price=$product->price;
        }
        $cart->image=$product->image;
        $cart->quantity=$req->quantity;
        $cart->total_cost=$cart->price*$req->quantity;
        $cart->save();
        return redirect()->back()->with('message','Added to Cart');
       }
    }

    public function cart_details()
    {
        $cart=Cart::all();
        return view('home.cart',compact('cart'));
    }
    public function cart_delete(string $id)
    {
        DB::table('carts')->where('id',$id)->delete();
        return redirect()->back()->with('message','Deleted Successfully');
    }

    public function cash_order()
    {
       $user=Auth::user();
       $userid=$user->id;
       $data=Cart::where('user_id','=',$userid)->get();
       foreach($data as $data){
        $order= new Order;
        $order->name=$data->name;
        $order->phone=$data->phone;
        $order->email=$data->email;
        $order->address=$data->address;
        $order->user_id=$data->user_id;
        $order->product_title=$data->product_title;
        $order->product_id=$data->product_id;
        $order->price=$data->price;

        $order->image=$data->image;
        $order->quantity=$data->quantity;
        $order->total_cost=$data->total_cost;

        $order->payment_mode='Cash on delivery';
        $order->delivery_status='Processing';
        $order->save();
        $cartid=$data->id;
        $cart=Cart::find($cartid)->delete();
       }
       return redirect()->back()->with('message','Order Submitted');
    }

    public function stripe($totalprice){
        return view("home.stripe",compact("totalprice"));
    }

    public function stripePost(Request $request,$totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "pkr",
                "source" => $request->stripeToken,
                "description" => "Thanks for Purchasing."
        ]);

        $user=Auth::user();
       $userid=$user->id;
       $data=Cart::where('user_id','=',$userid)->get();
       foreach($data as $data){
        $order= new Order;
        $order->name=$data->name;
        $order->phone=$data->phone;
        $order->email=$data->email;
        $order->address=$data->address;
        $order->user_id=$data->user_id;
        $order->product_title=$data->product_title;
        $order->product_id=$data->product_id;
        $order->price=$data->price;

        $order->image=$data->image;
        $order->quantity=$data->quantity;
        $order->total_cost=$data->total_cost;

        $order->payment_mode='Card Payment';
        $order->delivery_status='Processing';
        $order->save();
        $cartid=$data->id;
        $cart=Cart::find($cartid)->delete();
       }

        Session::flash('success', 'Payment successful!');

        return back();
    }
}
