@php
    $pages = App\Models\Page::where('tempname', $activeTemplate)
        ->where('is_default', Status::NO)
        ->get();
@endphp
<header class="header">
    <div class="header__bottom">
        <div class="container">
            <nav class="navbar navbar-expand-xl align-items-center p-0">
                <a class="site-logo site-title" href="{{ route('home') }}"><img src="{{ siteLogo() }}" alt="site-logo"></a>
                <button class="navbar-toggler ml-auto" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="menu-toggle"></span>
                </button>
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav main-menu m-auto">
                        <li><a href="{{ route('home') }}">@lang('Home')</a></li>
                        @foreach ($pages as $k => $data)
                            <li><a href="{{ route('pages', [$data->slug]) }}">{{ __($data->name) }}</a></li>
                        @endforeach
                        <li><a href="{{ route('games') }}">@lang('Games')</a></li>
                        <li><a href="{{ route('catalog') }}">@lang('Catalog')</a></li>
                        <li><a href="{{ route('blog') }}">@lang('Blog')</a></li>
                        <li><a href="{{ route('contact') }}">@lang('Contact')</a></li>
                    </ul>
                    <div class="nav-right">
                        <a href="{{ route('cart') }}"><i class="las la-cart-plus"></i> @lang('Cart') &nbsp;<span class="cart-quantity"> {{cart()->count()}} </span> </a>
                        @auth
                            <a href="{{ route('user.home') }}"><i class="las la-tachometer-alt"></i> @lang('Dashboard')</a>
                            <a href="{{ route('user.logout') }}"><i class="las la-sign-out-alt"></i> @lang('Logout')
                            </a>
                        @else
                            <a href="{{ route('user.login') }}"><i class="las la-sign-in-alt"></i> @lang('Login')</a>
                            @if (gs('registration'))
                                <a href="{{ route('user.register') }}"><i class="las la-user-plus"></i> @lang('Register')</a>
                            @endif
                        @endauth
                        @include($activeTemplate . 'partials.language')
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
