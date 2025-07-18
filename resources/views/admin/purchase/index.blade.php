@extends('admin.layouts.app')

{{-- @section('pageTitle', 'Purchase List') --}}


{{-- @section('title', 'Purchase Page') --}}
@php
    $pageTitle = 'Purchase Page';
@endphp

{{-- {{ $pageTitle = 'Purchase Page'
    }} --}}

{{-- <div class="pagetitle d-flex justify-content-between align-items-center py-2">
    <h1>{{ $title ?? 'Purchase List' }}</h1>
    <nav>
        <ol class="breadcrumb">
            {{-- Use a variable for the home URL to allow flexibility --}}
            {{-- If $homeUrl is not set, default to 'admin/dashboard' --}}
            {{-- <li class="breadcrumb-item">
                <a href="{{ url($homeUrl ?? 'admin/dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">{{ $title ?? 'Purchase List' }}</li>
        </ol>
    </nav> --}}
{{-- </div> --}}


@section('content')
    {{-- <div class="pagetitle">
        <h1>Purchase List</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Purchase</li>
            </ol>
        </nav>
    </div> --}}

    <x-page-title title="Purchase List" />
    
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center py-2">
                        <h5 class="card-title">Purchase List</h5>
                        <a href="{{ url('admin/purchase/create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Add Purchase
                        </a>
                    </div>
                    <!-- End Card Header -->

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="table-success">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Supplier Name</th>
                                        <th scope="col">Invoice ID</th>
                                        <th scope="col">Voucher Number</th>
                                        <th scope="col">Purchase Date</th>
                                        <th scope="col">Total Amount</th>
                                        <th scope="col">Payment Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchases as $purchase)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $purchase->supplier->supplier_name }}</td>
                                            <td>{{ $purchase->invoice_id }}</td>
                                            <td>{{ $purchase->voucher_number }}</td>
                                            <td>{{ $purchase->purchase_date }}</td>
                                            <td>{{ $purchase->total_amount }}</td>
                                            <td>{{ $purchase->payment_status }}
                                                @if($purchase->payment_status == '1')
                                                    <span class="badge bg-info">Pending</span>
                                                @elseif($purchase->payment_status == '2')
                                                    <span class="badge bg-success">Accept</span>
                                                    @else
                                                    <span class="badge bg-danger">Reject</span>
                                                @endif
                                            </td>
                                           
                                            <td>
                                                <a href="{{ url('admin/purchase/edit/' . $purchase->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                    <form action="{{ url('admin/purchase/destroy/' . $purchase->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                        
                                                    </form>
                                                {{-- <a href="{{ url('admin/purchase/destroy/' . $purchase->id) }}"
                                                    class="btn btn-danger">Delete</a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
