@extends('layout')
   
@section('content')
<h1>Search Screen</h1>
<div class="d-flex">
{{-- <img style="width: 50%; " src="{{ asset('/assets/images/xxx.jpg') }}" alt="description of myimage"> --}}
   
<div class="row">
 
  

<br>
 @foreach($yyy as $itom)

 @php
$gullus = Http::get("https://fakestoreapi.com/products/" . $itom->id );
$mullus[] =  json_decode($gullus)
 @endphp
 @foreach($mullus as $mullu)
 <div class="column">
<h1>{{$mullu}}</h1>
 </div>
 @endforeach


@endforeach 
    
    
</div>
    </div> 
@endsection