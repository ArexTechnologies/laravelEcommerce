@php
$OrderIdMail = session('OrderIdMail');
  $xxx = DB::table('orders')->get()->where('order_id','=', $OrderIdMail );
  $userName = $xxx->first()->name;
$userEmail = $xxx->first()->email;
$userAddress = $xxx->first()->address;
    $userOrderId = $xxx->first()->order_id;
     $userOrderStatus = $xxx->first()->order_status;
        $userTotal = $xxx->first()->total;
    $userInfo = $xxx->first()->info;
    $userItems = json_decode( $xxx->first()->items); 

@endphp

<h1>Hi {{$userName}} Thanks for placing order, your status is: {{$userOrderStatus}}</h1>
<h2>Name: {{$userName}}</h2>
<h2>Address: {{$userAddress}} </h2>
<h2>Order ID: {{$userOrderId }} </h2>
<h2>Total : {{$userTotal}} $</h2>
<h2>Additional Info : {{$userInfo}}</h2>


@foreach($userItems as $Item)

<div class="flex">
<h2> Item Name: {{ $Item->name}} </h2>
<img style="width: 50px; height50x" src={{ $Item->image}}>
</div>

<h2> Item Price: {{ $Item->price}} </h2>
<h2> Item Quantity: {{ $Item->quantity}} </h2>

@endforeach
<h1>Thanks for choosing</h1>
<br>
<h1>KotaBazar.com</h1>
