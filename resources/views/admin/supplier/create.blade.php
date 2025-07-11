@extends('admin.layouts.app')
@section('content')
    <div class="pagetitle d-flex justify-content-between align-items-center  py-2">
        <h1>Add Supplier</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Supplier</li>
                <li class="breadcrumb-item">Create</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title">Create Supplier</h5>
            <a href="{{ route('supplier') }}" class="btn btn-outline-primary"><i class="bi bi-arrow-left"></i> Supplier List</a>
        </div>
        <div class="card-body">

            <form class="row g-3" action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <label for="supplierName" class="form-label">Supplier Name</label>
                    <input type="text" class="form-control" id="supplierName" value="{{ old('supplierName') }}"
                        placeholder="Supplier Name" name="supplierName">
                    @if ($errors->has('supplierName'))
                        <span class="text-danger mt-3">{{ $errors->first('supplierName') }}</span>
                    @endif
                    {{-- @error('name')
                        <span class="text-danger mt-3"> {{ $message }} </span>
                    @enderror --}}

                </div>
                <div class="col-md-6">
                    <label for="supplierEmail" class="form-label">Supplier Email</label>
                    <input type="text" class="form-control" id="supplierEmail" value="{{ old('supplierEmail') }}"
                        placeholder="Supplier Email" name="supplierEmail">
                    @if ($errors->has('supplierEmail'))
                        <span class="text-danger mt-3">{{ $errors->first('supplierEmail') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="supplierPhone" class="form-label">Supplier Phone</label>
                    <input type="text" class="form-control" id="supplierPhone" value="{{ old('supplierPhone') }}"
                        placeholder="Enter Generic Name" name="supplierPhone">
                    @if ($errors->has('supplierPhone'))
                        <span class="text-danger mt-3">{{ $errors->first('supplierPhone') }}</span>
                    @endif
                </div>
                <div class="col-12">
                    <label for="supplierAddress" class="form-label">Supplier Address</label>
                    <textarea name="supplierAddress" class="form-control" id="supplierAddress" rows="5" cols="10"
                        value="{{ old('supplierAddress') }}" placeholder="Supplier Address">{{ old('supplierAddress') }}</textarea>
                    @if ($errors->has('supplierAddress'))
                        <span class="text-danger mt-3">{{ $errors->first('supplierAddress') }}</span>
                    @endif
                </div>

                <div class="text-left">
                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
            </form><!-- End Multi Columns Form -->

        </div>
    </div>
@endsection
