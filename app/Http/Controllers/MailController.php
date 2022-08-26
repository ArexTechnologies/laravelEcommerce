<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail as FacadesMail;

class MailController extends Controller
{
    public function index()
    {
      
        try {
            $data = ['name'=> 'Arun'];
            $user['to']= 'amitbagda503@gmail.com';
       
              Mail::send('mail', $data,function($messages) use ($user){
                $messages->to($user['to']);
                $messages->subject('Order Confirmed');
              });
            
            return '<h1>You have confirmed the order</h1>';
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
}