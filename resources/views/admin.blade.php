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
     <!--   Core JS Files   -->

</head>
<body >
 <h1>Admin Page</h1>

 @php
  $orders = DB::table('orders')->get();
@endphp

      @foreach ($orders as $order) 
       <div class="card">
         <ul>
        <li>
          <p>Customer name: {{$order->name}}</p>  
             <p>User id: {{$order->user_id}}</p>  
             @php 
             $itemsss = $order->items;
             $new_items = explode(',', $itemsss);
            
 @endphp
             {{-- {{dd($new_items)}} --}}
      
        <p>order Details: {{$itemsss}}</p>
    
       
             <a href="/admin/mail" class="btn btn-primary">Confirm Order </a>   
        
        </li>
      </ul>
      </div>
     
       
      
      @endforeach
</body>
</html>