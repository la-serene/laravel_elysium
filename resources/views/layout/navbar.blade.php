<div class="wrap-menu-desktop">
    <nav class="limiter-menu-desktop container">

        <!-- Logo desktop -->
        <a href="{{ route('welcome') }}" class="logo">
            <img src="{{ asset("images/icons/logo-01.png") }}" alt="IMG-LOGO">
        </a>

        <!-- Menu desktop -->
        <div class="menu-desktop">
            <ul class="main-menu">
                <li class="active-menu">
                    <a href="index.html">Home</a>
                    <ul class="sub-menu">
                        <li><a href="index.html">Homepage 1</a></li>
                        <li><a href="home-02.html">Homepage 2</a></li>
                        <li><a href="home-03.html">Homepage 3</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route("product.index") }}">Shop</a>
                </li>

                <li class="label1" data-label1="hot">
                    <a href="shoping-cart.html">Features</a>
                </li>

                <li>
                    <a href="about.html">About</a>
                </li>

                <li>
                    <a href="contact.html">Contact</a>
                </li>
            </ul>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                 data-notify="2">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>

            <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
               data-notify="0">
                <i class="zmdi zmdi-favorite-outline"></i>
            </a>
        </div>
    </nav>
</div>
