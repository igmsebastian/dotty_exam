<nav class="navbar navbar-expand-lg fixed-top nav-down navbar-transparent" color-on-scroll="500">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand text-primary" href="{{ route('home') }}"
                rel="tooltip" title="Paper Kit 2 PRO" data-placement="bottom">
                Ecommerce
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" data-nav-image="{{ asset('assets') }}/img/blurred-image-1.jpg"
            data-color="orange">
            <ul class="navbar-nav ml-auto">
                @auth('user')
                <li class="dropdown nav-item">
                    <a class="btn btn-round btn-info dropdown-toggle nav-link" href="#" data-toggle="dropdown" aria-expanded="false">
                        <i class="nc-icon nc-single-02"></i> Welcome, {{ auth()->guard('user')->user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-danger">
                      <a href="#" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Logout
                      </a>
                    </div>
                  </li>
                @endauth
                <li class="nav-item">
                    <a class="btn btn-round btn-warning" href="{{ route('order.index') }}">
                        <i class="nc-icon nc-box-2"></i> My Orders
                    </a>
                </li>
                @guest('user')
                <li class="nav-item">
                    <a class="btn btn-round btn-info" href="{{ route('login.form') }}">
                        <i class="nc-icon nc-single-02"></i>Login
                    </a>
                </li>
                @endguest
                <li class="nav-item">
                    <a class="btn btn-round btn-danger" href="{{ route('cart.checkout') }}">
                        <i class="nc-icon nc-cart-simple"></i> <span id="item-count">{{ \Cart::count() != 0 ? \Cart::count() : '' }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
