@extends('admin.layouts.app')
@section('content')
    <div class="pagetitle d-flex justify-content-between align-items-center  py-2">
        <h1>Add Invoice</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Invoice</li>
                <li class="breadcrumb-item">Edit</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title">Edit Invoice</h5>
            <a href="{{ route('invoice') }}" class="btn btn-outline-primary"><i class="bi bi-arrow-left"></i> Invoice
                List</a>
        </div>
        <div class="card-body">

            <form class="row my-3" action="{{ route('invoice.update',$invoice) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                <div class="col-md-4">
                    <label for="customerID" class="form-label">Customer</label>
                    <select class="form-select" id="customerID" name="customerID">
                        <option selected="">Choose...</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}" {{ ($customer->id == $invoice->customer_id) ? 'selected' : '' }} >{{ $customer->name }}</option>
                            {{-- @if($customer->id == $invoice->customer_id ) selected '' @endif --}}
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="invoiceDate" class="form-label">Invoice Date</label>
                    <input type="date" class="form-control" id="invoiceDate"
                        placeholder="Invoice Date ...!!" name="invoiceDate" value="{{ old('invoiceDate', now()->format('Y-m-d')) }}"
                        readonly disable>
                    @if ($errors->has('invoiceDate'))
                        <span class="text-danger mt-3">{{ $errors->first('invoiceDate') }}</span>
                    @endif
                </div>

                </div>

                <div class="row mt-2">
                    <div class="col-md-4">
                        <label for="netTotal" class="form-label">Net Total</label>
                        <input type="number" class="form-control" id="netTotal" value="{{ old('netTotal',$invoice->net_total) }}"
                            placeholder="Net Total" name="netTotal">
                        @if ($errors->has('netTotal'))
                            <span class="text-danger mt-3">{{ $errors->first('netTotal') }}</span>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <label for="totalAmount" class="form-label">Total Amount</label>
                        <input type="number" class="form-control" id="totalAmount" value="{{ old('totalAmount',$invoice->total_amount) }}"
                            placeholder="Total Amount" name="totalAmount">
                        @if ($errors->has('totalAmount'))
                            <span class="text-danger mt-3">{{ $errors->first('totalAmount') }}</span>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <label for="totalDiscount" class="form-label">Total Discount</label>
                        <input type="number" class="form-control" id="totalDiscount" value="{{ old('totalDiscount',$invoice->total_discount) }}"
                            placeholder="Total Discount" name="totalDiscount">
                        @if ($errors->has('totalDiscount'))
                            <span class="text-danger mt-3">{{ $errors->first('totalDiscount') }}</span>
                        @endif
                    </div>
                </div>

                <div class="text-left mt-1">
                    <button type="submit" class="btn btn-success mt-1">Invoice Update</button>
                </div>
            </form>

        </div>
    </div>
@endsection
