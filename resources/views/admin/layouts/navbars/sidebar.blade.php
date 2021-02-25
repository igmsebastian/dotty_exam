<div class="sidebar" data-background-color="brown" data-active-color="danger">
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>
                        {{ ucfirst(auth()->user()->username) }}
                    </span>
                </a>
                <div class="clearfix"></div>
            </div>
        </div>
        <ul class="nav">
            <li class="{{ $activeNav == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('admin.index') }}">
                    <i class="ti-panel"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{ $activeNav == 'products' ? 'active' : '' }}">
                <a href="{{ route('admin.product.index') }}">
                    <i class="ti-package"></i>
                    <p>Products</p>
                </a>
            </li>
        </ul>
    </div>
</div>
