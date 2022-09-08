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
<x-navbar></x-navbar>
<body>
   <div class="mx-4 p-4">
  <div class="row">
        <div class="col-6 "> 
            <img style="height: 30rem" src={{$itoms->image}}>
        </div>
        <div style="margin: 2rem" class="col-4">
            <div style="border: 1px solid black;border-radius:15px" class="p-2">
<h3>{{$itoms->title}}</h3>
            <p>{{$itoms->description}}</p>
            <h4>Price: {{$itoms->price}}$ </h4>
              <h4>Rating: {{$itoms->rating->rate}} </h4>
              <div >
            <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i>

              </div>
                                <p ><a href="{{ route('add_to_cart', $itoms->id) }}" class=" btn btn-dark btn-block text-center" role="button">Add to cart</a> </p>
        
            </div>
            
        </div>

       </div>
       <div class="card mx-4 p-4">
        <h3>Review the product</h3>
        <form action="/detail/{{$itoms->id}}" method="POST" >
@csrf
        <textarea name="review" style=" resize: none;" class="card" placeholder="Describe yourself here..." > </textarea>
<button type="submit"  class="btn btn-dark m-2">Submit Review</button>
        </form>
       </div>
      
       <div class="card mx-4 p-4">
@php
    $reviews = json_decode(DB::table('reviews')->get());
  
    $_i = 1;
@endphp
<h3>What other customer says:</h3>
 @foreach($reviews as $review)
@php
   $customer = DB::table('users')->get()->where('id','=',$review->user_id);
//    foreach ($customer as $custome) {
//     dump($custome->name);
//    }
  
@endphp

@foreach($customer as $custome)
<ul>
    <li>"{{json_decode($review->review)}}"-{{$custome->name}} </li>
</ul>
   
 @endforeach
@php


$_i++;
@endphp
@endforeach
       </div>
   </div>
     
   <x-footer></x-footer>
</body>
</html>