<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <div class="card">
            <div class="card-body">
                <div class="pt-3 ">
                    <img src="{{ asset('admin') }}/assets/img/profile-img.jpg" alt="Profile" class="">
                </div>
                <h2 class="card-title">Hi, {{ Auth::user()->name }}</h2>
                <a href="{{ route('user.profile') }}" class="card-link">User Profile</a>
            </div>
        </div>

        <li class="nav-item">
            <a class="nav-link @if (Request::is('admin/dashboard')) @else collapsed @endif"
                href="{{ url('admin/dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link @if (Request::segment(2) == 'customers') @else collapsed @endif"
                href="{{ route('customers') }}">
                <i class="bi bi-person"></i>
                <span>Customer</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Request::segment(2) == 'medicine') @else collapsed @endif" href="{{ route('medicine') }}">
                <i class="bi bi-person"></i>
                <span>Medicines</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @if (Request::segment(2) == 'medicine-stock') @else collapsed @endif"
                href="{{ route('medicine-stock') }}">
                <i class="bi bi-stack"></i>
                <span>Medicine Stock</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @if (Request::segment(2) == 'supplier') @else collapsed @endif" href="{{ route('supplier') }}">
                <i class="bi bi-list"></i>
                <span>Supplier</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link @if (Request::segment(2) == 'invoice') @else collapsed @endif" href="{{ route('invoice') }}">
                <i class="bi bi-journal-text"></i>
                <span>Invoice</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (Request::segment(2) == 'purchase') @else collapsed @endif" href="{{ route('purchase') }}">
                <i class="bi bi-currency-dollar"></i>
                <span>Purchase</span>
            </a>
        </li>
    </ul>
</aside>
