<div class="pagetitle d-flex justify-content-between align-items-center  py-2">
    <h1>{{ $title }}</h1>
    <nav>
        <ol class="breadcrumb">
            {{-- Use a variable for the home URL to allow flexibility --}}
            {{-- If $homeUrl is not set, default to 'admin/dashboard' --}}
            {{-- Use a variable for the home URL to allow flexibility --}}
            <li class="breadcrumb-item">
                <a href="{{ url($homeUrl ?? 'admin/dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
    </nav>
</div>