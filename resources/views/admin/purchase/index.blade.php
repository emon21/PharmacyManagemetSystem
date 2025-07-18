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
                                        <th scope="col">Invoice Date</th>
                                        <th scope="col">Net Price</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">Total Discount</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchases as $purchase)
                                        <tr>
                                            <td>{{ $purchase->id }}</td>
                                            <td>{{ $purchase->supplier_name }}</td>
                                            <td>{{ $purchase->invoice_date }}</td>
                                            <td>{{ $purchase->net_price }}</td>
                                            <td>{{ $purchase->total_price }}</td>
                                            <td>{{ $purchase->total_discount }}</td>
                                            <td>
                                                <a href="{{ url('admin/purchase/edit/' . $purchase->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <a href="{{ url('admin/purchase/delete/' . $purchase->id) }}"
                                                    class="btn btn-danger">Delete</a>
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
