@extends('admin.layouts.app')
@section('content')
    <div class="pagetitle d-flex justify-content-between align-items-center  py-2">
        <h1>Add Medicine</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Medicines</li>
                <li class="breadcrumb-item">Create</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title">Create Medicine</h5>
            <a href="{{ route('medicine') }}" class="btn btn-outline-primary"><i class="bi bi-arrow-left"></i> Medicine List</a>
        </div>
        <div class="card-body">
           

        
            <form class="row g-3" action="{{route('medicine.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" value="{{old('name')}}" placeholder="Enter medicine name" name="name">
                    @if ($errors->has('name'))
                        <span class="text-danger mt-3">{{ $errors->first('name') }}</span>
                    @endif
                    {{-- @error('name')
                        <span class="text-danger mt-3"> {{ $message }} </span>
                    @enderror --}}

                </div>
                <div class="col-md-6">
                    <label for="packing" class="form-label">Packing</label>
                    <input type="email" class="form-control" id="packing" value="{{ old('packing') }}" placeholder="Enter packing information" name="packing">
                    @if ($errors->has('packing'))
                        <span class="text-danger mt-3">{{ $errors->first('packing') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="genericName" class="form-label">Generic Name</label>
                    <input type="text" class="form-control" id="genericName" value="{{ old('genericName') }}" placeholder="Enter Generic Name" name="genericName">
                    @if ($errors->has('genericName'))
                        <span class="text-danger mt-3">{{ $errors->first('genericName') }}</span>
                    @endif
                </div>
                <div class="col-12">
                    <label for="supplierName" class="form-label">Supplier Name</label>
                    <input type="text" class="form-control" id="supplierName" value="{{ old('supplierName') }}" placeholder="Enter supplier name" name="supplierName">
                    @if ($errors->has('supplierName'))
                        <span class="text-danger mt-3">{{ $errors->first('supplierName')
                        }}</span>
                    @endif
                </div>

                <div class="text-left">
                    <button type="submit" class="btn btn-primary">Submit</button>
         
                </div>
            </form><!-- End Multi Columns Form -->

        </div>
    </div>
@endsection
