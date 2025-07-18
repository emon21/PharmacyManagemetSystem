@extends('admin.layouts.app')
@php
    $pageTitle = 'Purchase Create';
@endphp
@section('content')
    <x-page-title title="Add Purchase" />

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center py-2">
                        <h5 class="card-title">Purchase</h5>
                        <a href="{{ url('admin/purchase') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left-circle"></i> Back to List
                        </a>
                    </div>
                    <!-- End Card Header -->
                    <div class="card-body">
                        <form action="{{ url('admin/purchase/update',$purchase->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6 my-3">
                                    <label for="purchase_date" class="form-label">Supplier Name</label>

                                    <select name="supplier_id" id="supplier" class="form-select">
                                        <option value="">Select Supplier</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}" @if ($supplier->id == $purchase->supplier_id) selected @endif>{{ $supplier->supplier_name }}</option>
                                            
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-sm-6 my-3">
                                    <label for="invoice_id" class="form-label">Invoice ID</label>
                                    <select name="invoice_id" id="invoice_id" class="form-select">
                                        <option value="">Select Invoice ID</option>
                                        @foreach ($invoices as $invoice)
                                            <option value="{{ $invoice->id }}" @if ($invoice->id == $purchase->invoice_id) selected @endif>{{ $invoice->id }}</option>
                                         @endforeach
                                    </select>

                                </div>
                            </div>
                            @php
                                // Generate a unique voucher number


                               // $voucherNumbers = 'inv-' . date('Ymd') . '-' . Str::upper(Str::random(8));
                                $voucherNumbers = 'inv-'. Str::upper(Str::random(8));
                            @endphp

                            <div class="row">
                                <div class="col-md-3">
                                    <label for="voucher_number" class="form-label">Voucher Number</label>
                                    <input type="text" name="voucher_number" id="voucher_number"
                                        class="form-control @error('voucher_number') is-invalid @enderror"
                                        placeholder="Enter Voucher Number"
                                        value="{{ old('voucher_number', $purchase->voucher_number) }}">
                                    @error('voucher_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="purchase_date" class="form-label">Purchase Date</label>
                                    <input type="date" class="form-control @error('purchase_date') is-invalid @enderror"
                                        id="purchase_date" name="purchase_date"
                                        value="{{ old('purchase_date', $purchase->purchase_date) }}" >
                                    @error('purchase_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="total_amount" class="form-label">Total Amount</label>

                                    <input type="text" name="total_amount" id="total_amount" class="form-control"
                                        placeholder="Total Amount" value="{{ old('total_amount', $purchase->total_amount) }}">

                                    @error('total_amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="payment_status" class="form-label">Payment Status</label>

                                    <select name="payment_status" id="payment_status" class="form-select">
                                        <option value="">Select Payment Status</option>
                                        <option value="1" @if ($purchase->payment_status == '1') selected
                                        @endif>Pending</option>
                                        <option value="2" @if ($purchase->payment_status == '2') selected
                                        @endif>Accept</option>
                                        <option value="3" @if ($purchase->payment_status == '3') selected
                                        @endif>Reject</option>
                                    </select>
                                    @error('payment_status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="my-3">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle"></i>
                                    Update</button>
                            </div>

                        </form>
                    </div>
                    <!-- End Card Body -->
                </div>
                <!-- End Card -->
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </section>
    <!-- End Section -->
@endsection

