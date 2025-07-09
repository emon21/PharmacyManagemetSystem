@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle d-flex justify-content-between align-items-center  py-">
        <h1>Customers</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Medicine Stock</li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center py-2">
            <h5 class="card-title">Create Medicine Stock</h5>
            <a href="{{ route('customers') }}" class="btn btn-primary"> <i class="bi bi-list"></i> Medicine Stock List</a>
        </div>
        <div class="card-body mt-3">
            <form action="{{ route('medicine-stock.update', $medicineStock) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label for="customerAddress" class="col-sm-2 col-form-label">Medicine Name</label>
                    <div class="col-sm-4 mb-3">
                        <select name="medicine_id" class="form-select">
                            <option selected="">Select Medicine Name</option>
                            @foreach ($medicines as $medicine)
                                <option value="{{ $medicine->id }}" @if ($medicineStock->medicine_id == $medicine->id) selected @endif >
                                    {{ $medicine->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="batch_id" class="col-sm-2 col-form-label">Batch ID</label>
                    <div class="col-sm-4">
                        <input type="text" name="batch_id" class="form-control" placeholder="Batch ID" id="batch_id"
                            value="{{ old('batch_id',$medicineStock->batch_id) }}">
                        @error('batch_id')
                            <span class="text-danger mt-3"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="expiry_date" class="col-sm-2 col-form-label">Expiry Date</label>
                    <div class="col-sm-4">
                        <input type="date" name="expiry_date" class="form-control" id="expiry_date"
                            value="{{ old('expiry_date',$medicineStock->expiry_date) }}">
                        @error('expiry_date')
                            <span class="text-danger mt-3"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="quantity" class="col-sm-2 col-form-label">quantity</label>
                    <div class="col-sm-4">
                        <input type="number" name="quantity" class="form-control" id="quantity"
                            value="{{ old('quantity',$medicineStock->quantity) }}">
                        @error('quantity')
                            <span class="text-danger mt-3"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="mrp" class="col-sm-2 col-form-label">MRP</label>
                    <div class="col-sm-4">
                        <input type="text" name="mrp" class="form-control" placeholder="Enter Your MRP"
                            id="mrp" value="{{ old('mrp',$medicineStock->mrp) }}">
                        @error('mrp')
                            <span class="text-danger mt-3"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="rate" class="col-sm-2 col-form-label">Rate</label>
                    <div class="col-sm-4">
                        <input type="text" name="rate" class="form-control" placeholder="Enter Your Rate"
                            id="rate" value="{{ old('rate',$medicineStock->rate) }}">
                        @error('rate')
                            <span class="text-danger mt-3"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
        </div>
    @endsection
