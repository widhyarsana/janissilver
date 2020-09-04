<div class="card card-sidebar-mobile">
    <ul class="nav nav-sidebar" data-nav-type="accordion">

        <!-- Main -->
        <li class="nav-item-header">
            <div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i>
        </li>
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link ">
                <i class="icon-home4"></i>
                <span>
                    Dashboard
                </span>
            </a>
        </li>


        @role('kepala-bidang')
        <li class="nav-item">
            <a href="{{ route('superadmin.admin.index') }}" class="nav-link">
                <i class="icon-user-tie"></i>
                <span>
                    Admin
                </span>
            </a>
        </li>

        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-book3"></i> <span>Laporan</span></a>
        
            <ul class="nav nav-group-sub" data-submenu-title="Laporan">
                <li class="nav-item"><a href="{{ route('report.production.index') }}" class="nav-link">Laporan
                        Produksi</a></li>
                <li class="nav-item"><a href="{{ route('report.order.index') }}" class="nav-link">Laporan Pesanan</a></li>
                <li class="nav-item"><a href="{{ route('report.shipment.index') }}" class="nav-link">Laporan
                        Pengiriman</a></li>
            </ul>
        </li>
        @endrole


        @role('admin')

        <li class="nav-item">
            <a href="{{ route('admin.product.index') }}" class="nav-link">
                <i class="icon-percent"></i>
                <span>
                    Produk
                </span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.customer.index') }}" class="nav-link">
                <i class="icon-users"></i>
                <span>
                    Pelanggan
                </span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{  route('admin.order.index') }}" class="nav-link">
                <i class="icon-cart5"></i>
                <span>
                    Pesanan
                </span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.production.index') }}" class="nav-link">
                <i class="icon-office"></i>
                <span>
                    Produksi
                </span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.shipment.index') }}" class="nav-link">
                <i class="icon-truck"></i>
                <span>
                    Pengiriman
                </span>
            </a>
        </li>
        <li class="nav-item nav-item-submenu">
            <a href="#" class="nav-link"><i class="icon-book3"></i> <span>Laporan</span></a>

            <ul class="nav nav-group-sub" data-submenu-title="Laporan">
                <li class="nav-item"><a href="{{ route('report.production.index') }}" class="nav-link">Laporan Produksi</a></li>
                <li class="nav-item"><a href="{{ route('report.order.index') }}" class="nav-link">Laporan Pesanan</a></li>
                <li class="nav-item"><a href="{{ route('report.shipment.index') }}" class="nav-link">Laporan Pengiriman</a></li>
            </ul>
        </li>

        @endrole

        @role('customer')
        <li class="nav-item">
            <a href="{{ route('customer.product.index') }}" class="nav-link">
                <i class="icon-percent"></i>
                <span>
                    Produk
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{  route('customer.order.index') }}" class="nav-link">
                <i class="icon-cart5"></i>
                <span>
                    Pesanan
                </span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a href="{{  route('customer.cart.index') }}" class="nav-link">
        <i class="icon-cart5"></i>
        <span>
            cart
        </span>
        </a>
        </li> --}}
        @endrole

    </ul>
</div>