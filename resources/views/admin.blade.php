 @php

  $orders = DB::table('orders')->get();
 $totalSales = DB::table('orders')->sum('total');
 $totalOrderReceived = DB::table('orders')->count('total');
 $totalOrderConfirmed = DB::table('orders')->where("order_status","=","order confirmed")->count('total');
  $totalOrderShipped = DB::table('orders')->where("order_status","=","order shipped")->count('total');
    $totalOrderDelivered = DB::table('orders')->where("order_status","=","order delivered")->count('total');
$totalOrderCancelled = 3;
@endphp
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
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
 google.charts.setOnLoadCallback(drawChart);
    function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['TotalOrders', {{$totalOrderReceived}}],
          ['OrderConfirmed', {{ $totalOrderConfirmed}}],
          ['OrderShipped', {{  $totalOrderShipped}}],
          ['OrderDelivered', {{  $totalOrderDelivered}}],
          ['OrderCancelled', {{$totalOrderCancelled}}]
        ]);

        // Set chart options
        var options = {
                       'width':600,
                       'height':500};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
     <!--   Core JS Files   -->

</head>
<body >
 <h1>Admin Page</h1>

<div style="border-radius: 15px" class="card p-4">
<div class="d-flex" ><h3>TotalSales : {{$totalSales}}$ </h3><span> <div id="chart_div"></div> </span>
 
  
</div>
   <h3> TotalOrders : {{$totalOrderReceived}} </h3>
</div>
   
@foreach ($orders as $order) 
      <div class="card">
        <ul>
          <li>
            <p name='name'>Customer name: {{$order->name}}</p>  
            <p name='user_id'>User id: {{$order->user_id}}</p>  
            @php 
             $itemsss = $order->items;
             $new_items = explode(',', $itemsss);
             
             @endphp
             {{-- {{dd($new_items)}} --}}
             
             <p>order Details: {{$itemsss}}</p>
               
             
             <form action='/admin/mail/{{$order->order_id}}/adminorderdetails' method="POST">
               @csrf
           <p  class="btn btn-success my-1 dissabled" disabled>Current status: {{$order->order_status}}</p>
                <select name="order_status" class="form-select" aria-label="Default select example">
  <option selected>Change order status</option>
  <option value="order confirmed">Confirm</option>
  <option value="order shipped">Shipped</option>
  <option value="order delivered">Delivered</option>
  <input class="btn btn-primary mx-2" type="submit" >
            </form>
            
        
        </li>
      </ul>
      </div>
     
       
      
      @endforeach
</body>
</html>