<div class="top-bar">
    <div class="content-topbar flex-sb-m h-full container">
        <div class="left-top-bar">
            Free shipping for standard order over $100!
        </div>

        <div class="right-top-bar flex-w h-full">
            <a href="#" class="flex-c-m trans-04 p-lr-25">
                Help & FAQs
            </a>

            @if (Route::has('login'))
                @auth
                    <a href="{{ route('welcome') }}" class="flex-c-m trans-04 p-lr-25">
                        My account
                    </a>

                    <a href="{{ route('user.logout') }}" class="flex-c-m trans-04 p-lr-25">
                        Log out
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="flex-c-m trans-04 p-lr-25">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="flex-c-m trans-04 p-lr-25">
                            Register
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</div>
