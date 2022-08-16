@extends('layout')
   
@section('content')
<div class="flex">
<img style="width: 50%; " src="{{ asset('/assets/images/xxx.jpg') }}" alt="description of myimage">
   
<div class="row">
    @foreach($itoms as $itom)
        <div class="col-xs-18 col-sm-6 col-md-3">
            {{-- @php dd($product);
            @endphp --}}
                
                        <div class="img_thumbnail">
                            <img  style="width: 150px;height : 150px;" src="{{ $itom->image }}" alt="">
                            <div class="caption">
                                <h4>{{ $itom->title }}</h4>
                                <p style="width:10rem;" class="text-truncate">{{ $itom->description }}</p>
                                <p><strong>Price: </strong> {{ $itom->price }}$</p>
                                <p  class="btn-holder"><a href="{{ route('add_to_cart', $itom->id) }}" class=" btn btn-success btn-block text-center" role="button">Add to cart</a> </p>
                            </div>
                        </div>
        </div>
    @endforeach
</div>
    </div> 
@endsection
