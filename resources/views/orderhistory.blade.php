<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order History</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
 
<x-navbar></x-navbar>
<h1>Order History</h1>
<div class="text-center d-flex">
@php
$user = auth()->user()->id;
//dd($user);
 $orders = DB::table('orders')->get()->where('user_id','=', $user);
 foreach ($orders as $order ) 
//dd($orders); 
 $items[] = json_decode($order->items);
 $nummi =1;
@endphp




@foreach($items as $item)

<div style="border-radius: 15px" class="card flex mx-2 p-2" >

<h3>Order Details:</h3>
<p><span>{{$nummi++}} </span> {{$order->name}}</p>  <p>{{$order->created_at}}</p>  
{{-- This shows Arun Sharma --}}

   @foreach($item as $ite)
   
<p>Product Name: {{$ite->name}}</p>
<p>Price: {{$ite->price}}</p>
<div style="border-radius: 15px; background-color:azure" class="card">
Status : {{$order->order_status}}
</div>
   @endforeach
  
</div>

@endforeach
</div>
</body>
</html>


