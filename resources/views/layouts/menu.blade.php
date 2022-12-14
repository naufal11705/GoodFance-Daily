<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-white bg-white text-white shadow-none py-2">
  <!-- Container wrapper -->
  <div class="container-fluid" style="margin-left: 55px; margin-right: 50px;">
    <div class="d-flex align-items-center justify-content-start">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-lg-0" href="/">
        <span style="font-weight: 700">GoodFance</span>
        <span style="font-weight: 600"> Dai</span><span style="color: #24FF00">ly</span>
      </a>
    </div>

      <!-- Search -->
      <form action="/search" method="POST" class="mx-3" style="display: inline-block; width:100%;">
        @csrf
        <div class="input-group ms-2">
          <input name="search" style="height: 40px; border-radius: 10px 0 0 10px;" type="text" class="form-control" placeholder="Search">
          <button style="height: 40px; border-radius: 0 10px 10px 0; background-color: #00E833;" class="input-group-text text-white border-0" type="submit">
            <span>
              <a>Search</a>
            </span>
          </button>
        </div>
      </form>
      <!-- Search -->

    <!-- Right elements -->
    <div class="d-flex align-items-center justify-content-end">

      @guest
      <div class="btn-group shadow-none mt-2 mt-lg-0 mt-md-0 mt-xl-0">
        <a style="width: 100px; font-size: 14px;" href="{{ route('login') }}" class="btn btn-outline-dark align-self-center mx-2 mx-lg-3 mx-md-2 mx-xl-3 rounded fw-semibold">Sign in</a>
        <a style="width: 100px; font-size: 14px; background-color: #00E833;" href="{{ route('register') }}" class="btn align-self-center me-2 rounded fw-semibold text-white">Sign up</a>      </div>
      @endguest

      <!-- Account -->
      @auth
      <div class="dropdown hover ms-3" style="z-index: 2;">
        <a class="bg-transparent text-black" href="#">Hello, {{ Auth::user()->name }} <br><span class="fw-bold">Account & List</span>
          <i class="fa-solid fa-caret-down"></i>
        </a>
        <ul class="menu-dropdown" style="width: 190px;">
          <li><a href="{{ route('profile.edit') }}">Account</a></li>
          <li><a style="padding-top: 2.5px;" href="/profile">Become a seller</a></li>
          <li>
            <a style="padding-top: 2.5px; padding-bottom: 7px;" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        </ul>
      </div>
      @endauth
      <!-- Mail -->
      <div class="icon-container">
        <button type="button" class="btn btn-transparent align-self-center shadow-none mt-2 mt-lg-0 mt-md-0 mt-xl-0">
          <a class="text-dark fs-5" href="/chat">
            <i class="fa-regular fa-envelope"></i>
          </a>
          @auth
          @if($countMessage >= '1')
          <div class="count-container " aria-hidden="true">
                {{ $countMessage }}
          </div>
          @endif
          @endauth
        </button>
      </div>
      <!-- Wishlist -->
      <div class="icon-container">
        <button type="button" class="btn btn-transparent align-self-center shadow-none mt-2 mt-lg-0 mt-md-0 mt-xl-0">
          <a class="text-dark fs-5" href="/wishlist">
            <i class="fa-regular fa-heart"></i>
          </a>
          @auth
          @if($countWishlist >= '1')
          <div class="count-container " aria-hidden="true">
                {{ $countWishlist }}
          </div>
          @endif
          @endauth
        </button>
      </div>
      <!-- Cart -->
      <div class="icon-container">
        <button type="button" class="btn btn-transparent align-self-center shadow-none mt-2 mt-lg-0 mt-md-0 mt-xl-0">
          <a class="text-dark fs-5" href="/cart">
            <i class="fas fa-shopping-cart"></i>
          </a>
          @auth
          @if($countCart >= '1')
            <div class="count-container " aria-hidden="true">
                  {{ $countCart }}
            </div>
          @endif
          @endauth
        </button>
      </div>
      @auth
      @if(Auth::user()->role == 'seller')
        <button type="button" class="btn btn-transparent align-self-center shadow-none mt-2 mt-lg-0 mt-md-0 mt-xl-0">
        <a class="text-dark fs-5" href="/seller">
          <i class="fa fa-dashboard"></i>
        </a>
      </button>
      @endif
      @if(Auth::user()->role == 'admin')
        <button type="button" class="btn btn-transparent align-self-center shadow-none mt-2 mt-lg-0 mt-md-0 mt-xl-0">
        <a class="text-dark fs-5" href="/admin">
          <i class="fa fa-dashboard"></i>
        </a>
      </button>
      @endif
      @endauth
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->