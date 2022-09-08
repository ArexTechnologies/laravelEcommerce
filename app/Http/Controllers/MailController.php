<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Mail as FacadesMail;

class MailController extends Controller
{
    public function index(Request $request , $order)
   {
    Order::where('order_id', '=', $order)->update(["order_status" => $request->order_status]);
    $xxx = DB::table('orders')->get()->where('order_id', '=', $order);
    $userName = $xxx->first()->name;
    $userEmail = $xxx->first()->email;
    $userOrderId = $xxx->first()->order_id;
    $userOrderStatus = $xxx->first()->order_status;
    session()->put('OrderIdMail', $userOrderId);
    $userAddress = $xxx->first()->address;
    try {
      $data = ['name' => $userName];
      $user['to'] = $userEmail;
      $user['subject'] = $userOrderStatus;
      Mail::send('mail', $data, function ($messages) use ($user) {
        $messages->to($user['to']);
        $messages->subject($user['subject']);
      });

      //return redirect('/admin/mail/' . $userOrderId)->with('message', 'order conirmed by admin');
    } catch (\Throwable $th) {
      throw $th;
    }


      return view('adminorderdetails');
        
    }




    
  public function changer($order)

  {
    dd($order);
        $xxx = DB::table('orders')->get()->where('order_id', '=', $order);
    $xxx->update(["order_status"=> "order shipped"]);
    $xxx = Order::where('order_id', '=', $order)->update(["order_status" => "order shipped"]);
    //dd($order);
    return view('adminorderdetails');
  }
    
    public function confo($order){
   $xxx = DB::table('orders')->get()->where('order_id','=', $order);
    
    // dd($xxx->first()->total);
$userName = $xxx->first()->name;
$userEmail = $xxx->first()->email;
    $userOrderId = $xxx->first()->order_id;
   session()->put('OrderIdMail', $userOrderId);
$userAddress =$xxx->first()->address;
    try {
      $data = ['name' => $userName];
      $user['to'] = $userEmail;

      Mail::send('mail', $data, function ($messages) use ($user) {
        $messages->to($user['to']);
        $messages->subject('Order Confirmed');
      });

      return redirect('/admin/mail/' . $userOrderId)->with('message', 'order conirmed by admin');
    } catch (\Throwable $th) {
      throw $th;
    }
 return view('adminorderdetails');
    }
}