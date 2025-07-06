@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle d-flex justify-content-between align-items-center  py-">
        <h1>Customers</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Customers</li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center py-2">
            <h5 class="card-title">Create Customers</h5>
            <a href="{{ route('customers') }}" class="btn btn-primary"> <i class="bi bi-list"></i> Customer List</a>
        </div>
        <div class="card-body mt-3">
            <form action="{{ route('customers.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="customerName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="customerName"
                            class="form-control @error('customerName') is-invalid @enderror " id="customerName"
                            placeholder="Your Name ... !!" value="{{ old('customerName') }}">
                        @error('customerName')
                            <span class="text-danger mt-3"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="customerAddress" class="col-sm-2 col-form-label">Customer Address</label>
                    <div class="col-sm-10">
                        <textarea name="customerAddress" class="form-control @error('customerAddress') is-invalid @enderror" rows="10"
                            cols="5" id="customerAddress" placeholder="Your Customer Address ... !!">{{ old('customerAddress') }}</textarea>

                        @error('customerAddress')
                            <span class="text-danger mt-3"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="contactNumber" class="col-sm-2 col-form-label">Contact Number</label>
                    <div class="col-sm-10">
                        <input type="text" name="contactNumber"
                            class="form-control @error('contactNumber') is-invalid @enderror" id="contactNumber"
                            placeholder="Your Contact Number ... !!" value="{{ old('contactNumber') }}">
                        @error('contactNumber')
                            <span class="text-danger mt-3"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="doctorName" class="col-sm-2 col-form-label">Doctor Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="doctorName"
                            class="form-control @error('doctorName') is-invalid @enderror" id="doctorName"
                            placeholder="Your Doctor Name ... !!" value="{{ old('doctorName') }}">
                        @error('doctorName')
                            <span class="text-danger mt-3"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="doctorAddress" class="col-sm-2 col-form-label">Doctor Address</label>
                    <div class="col-sm-10">
                        <textarea name="doctorAddress" class="form-control @error('doctorAddress') is-invalid @enderror" rows="10"
                            cols="5" id="doctorAddress" placeholder="Your Doctor Address ... !!" value="{{ old('doctorAddress') }}">{{ old('doctorAddress') }}</textarea>
                        @error('doctorAddress')
                            <span class="text-danger mt-3"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Create Customer</button>
                    </div>
                </div>
        </div>


    @endsection
