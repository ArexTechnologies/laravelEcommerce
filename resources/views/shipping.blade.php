

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
<body>
    <x-navbar></x-navbar>
    <h1>Shipping Screen{{auth()->id()}}</h1>
<div class="mx-2php artisan make:migration create_products_table row">
  <div class="col-md-8 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Biling details</h5>
      </div>
      <div class="card-body">



       <form method="POST" action="/review/{order}">
  @csrf
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <input type="text" id="form7Example1" class="form-control"  name="name" value="{{old('name')}}"/>
                  @error('name')
   <p style="color: red">{{$message}}</p>
   @enderror
                <label class="form-label" for="form7Example1">First name</label>
              </div>
            </div>
          
          </div>

       
          <div class="form-outline mb-4">
            <input type="text" id="form7Example4" class="form-control" name="address" value="{{old('address')}}" />
              @error('address')
   <p style="color: red">{{$message}}</p>
   @enderror
            <label class="form-label" for="form7Example4">Address</label>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="form7Example5" class="form-control" name="email" value="{{old('email')}}"/>
             @error('email')
   <p style="color: red">{{$message}}</p>
   @enderror
            <label class="form-label" for="form7Example5">Email</label>
          </div>

          <!-- Number input -->
          <div class="form-outline mb-4">
            <input type="number" id="form7Example6" class="form-control"  name="phone" value="{{old('phone')}}"/>
             @error('phone')
   <p style="color: red">{{$message}}</p>
   @enderror
            <label class="form-label" for="form7Example6">Phone</label>
          </div>

          <!-- Message input -->
          <div class="form-outline mb-4">
            <textarea class="form-control" id="form7Example7" rows="2" name="info" value="{{old('info')}}"></textarea>
             @error('info')
   <p style="color: red">{{$message}}</p>
   @enderror
            <label class="form-label" for="form7Example7">Additional information</label>
          </div>
  @php $total = 0 @endphp
           
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
            
              @endforeach
               <div class="form-outline mb-4">
            <input type="number" id="form7Example6" class="form-control" value="{{$total}}" name="total" disabled/>
            <label class="form-label" for="form7Example6">Total</label>
          </div>

        @endif

          <!-- Checkbox -->
         <input type="submit" class="btn btn-primary btn-lg btn-block" role="button">
          <p>Items: {{json_encode(session('cart'))}}</p>
        
        </form>
      </div>
    </div>
  </div>

  <div class="col-md-4 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Summary</h5>
      </div>
      <div class="card-body">
        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
            Products
            <span>$53.98</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center px-0">
            Shipping
            <span>Gratis</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
            <div>
              <strong>Total amount</strong>
              <strong>
                <p class="mb-0">(including VAT)</p>
              </strong>
            </div>
            @php $total = 0 @endphp
       
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
           
              @endforeach
               <span><strong>{{$total}}</strong></span>
        @endif
          </li>
        </ul>

 

       
      </div>
    </div>
  </div>
</div>
</body>
</html>


