<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    //view review page
    public function review(Order $order){
      return view('review');
      //session()->get('orderxxx');
    }

    
    //create order on shipping page
    public function reviewPost(Request $request)
    {
try {
            $formFields = $request->validate([

                'name' => ['required', 'min:3'],
                'email' => ['required'],
                'address' => ['required'],
                'phone' => ['required'],
                'total',
                'items' ,
                'info' => ['required']
            ]);
           //dd($formFields);

        //    $formFields['name'] = 'apolo';
        //     $formFields['email'] = 'apolo@apolo.com';
        //     $formFields['address'] = 'apolo';
        //     $formFields['phone'] = '69696969';
        //     $formFields['total'] = 67;
        //     $formFields['items'] = json_encode(session('cart'));
        //     $formFields['info'] = 'apolo';
            $request->session()->put('orderxxx', $formFields);
          
     
            return redirect('/review')->with('message', 'Order Created');
            
    
} catch (\Throwable $th) {
    dd($th);
}
       
    
    }

    public function savenpay(){
   
       $finalData = session('orderxxx');
   $finalData['items'] = json_encode(session('cart'));
        $finalData['user_id'] = auth()->id();
      //  dd($finalData);
   Order::create($finalData);
        return view('savenpay',[
            'orders' => Order::latest()
        ]);
    }
    
}