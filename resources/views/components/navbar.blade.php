<nav  class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a style="color: black" class="navbar-brand" href="/">KotaBazar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div style="" class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
        <li class="nav-item ">
          <a style="color: black" class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a style="color: black" class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a style="color: black" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a style="color: black" class="dropdown-item" href="#">Action</a></li>
            <li><a style="color: black" class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a style="color: black" class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
       
      </ul>
    <form class="d-flex mx-2" role="search" action="/search" method="post">
      @csrf
      <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="mx-2 btn btn-outline-success" type="submit">Search</button>
    </form>

    </div>
   
    @auth
    Hello,
      <div class="dropdown">
  <button class=" mx-2 btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
{{auth()->user()->name}}
  </button>
  <div style="border-radius: 15px" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="/orderhistory">Order History</a>
    <a class="dropdown-item" href="#">Profile</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>

 <form  method="POST" action="/logout">
  @csrf
<button class="btn btn-danger" type="submit">logout</button>
 </form>
    @else
       <a href="/login" class="btn btn-dark">Login</a>
    @endauth
 
      <div  class=" d-flex justify-content-end" >
      
 {{$slot}}
      </div>
  </div>
</nav>





