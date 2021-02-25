
@guest('admin')
    @include('admin.layouts.footers.guest')
@endguest

@auth('admin')
    @include('admin.layouts.footers.auth')
@endauth
