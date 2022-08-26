@php
  $namez = DB::table('orders')->get();
@endphp

<h1>Hi your order is confirmed, Kindly view the details below:</h1>
Customer Name:

@foreach($namez as $name)

<h3>{{$name->name}}</h3>
<h3>{{$name->items}}</h3>
<h3>{{$name->address}}</h3>

@endforeach

Thanks for choosing
KotaBazar.com