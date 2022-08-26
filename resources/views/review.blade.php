<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body >
    
<x-navbar></x-navbar>
<h1>Review Order</h1>


 <h3>Items:</h3>
  <div class="d-flex" >
@php
$total=0
@endphp
  @if(session('cart'))
  
     @foreach(session('cart') as $id => $details)
            
            <div  class="card mx-2 p-2" style="width: 150px;">
 <img style="width: 50px;height : 50px;" src="{{$details['image']}}" alt="product image">
            <p>{{$details['name']}}</p>
            @php $total += $details['price'] * $details['quantity'] @endphp

            </div>
       @endforeach
       
            @endif

  </div>
  <br>
   @php
$tempOrderData = session()->get('orderxxx')

@endphp 
  <p class="mx-2">Address :
{{$tempOrderData['address']}}
</p>
 <p class="mx-2">Phone :
{{$tempOrderData['phone']}}
</p>
 <p class="mx-2">Email :
{{$tempOrderData['email']}}
</p>
 <p class="mx-2">Additional info :
{{$tempOrderData['info']}}
</p>

<p class="mx-2"> <strong >Total: ${{$total}}</strong></p>
<a href="/savenpay" class="mx-2 btn btn-success">Pay&Save</a>
</body>
</html>
