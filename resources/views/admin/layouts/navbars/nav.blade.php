@guest('admin')
    @include('admin.layouts.navbars.navs.guest')
@endguest

@auth('admin')
    @include('admin.layouts.navbars.navs.auth')
@endauth
