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
                        <h5 class="card-title">Add Purchase</h5>
                        <a href="{{ url('admin/purchase') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left-circle"></i> Back to List
                        </a>
                    </div>
                    <!-- End Card Header -->
                    <div class="card-body">
                        <form action="{{ url('admin/purchase/store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- @include('admin.purchase.form') --}}
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="supplier_id" class="form-label">Supplier</label>
                                    <select class="form-select @error('supplier_id') is-invalid @enderror" id="supplier_id"
                                        name="supplier_id" required>
                                        <option value="">Select Supplier</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}"
                                                {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                                {{ $supplier->supplier_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('supplier_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="purchase_date" class="form-label">Purchase Date</label>
                                    <input type="date" class="form-control @error('purchase_date') is-invalid @enderror"
                                        id="purchase_date" name="purchase_date"
                                        value="{{ old('purchase_date', date('Y-m-d')) }}" required>
                                    @error('purchase_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="invoice_no" class="form-label">Invoice No</label>
                                    <input type="text" class="form-control @error('invoice_no') is-invalid @enderror"
                                        id="invoice_no" name="invoice_no" value="{{ old('invoice_no') }}" required>
                                    @error('invoice_no')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="total_amount" class="form-label">Total Amount</label>
                                    <input type="number" step="0.01"
                                        class="form-control @error('total_amount') is-invalid @enderror" id="total_amount"
                                        name="total_amount" value="{{ old('total_amount') }}" required>
                                    @error('total_amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Product Items Dynamic Section -->
                            <div class="row mb-3">
                                <div class="col-12">
                                    <h5>Purchase Items</h5>
                                    <div id="purchaseItemsContainer">
                                        <!-- Dynamic rows will be added here -->
                                        <div class="row item-row mb-2">
                                            <div class="col-md-4">
                                                <label class="form-label">Product</label>
                                                <select class="form-select product-select" name="items[0][product_id]"
                                                    required>
                                                    <option value="">Select Product</option>
                                                    @foreach ($medicines as $product)
                                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">Quantity</label>
                                                <input type="number" class="form-control" name="items[0][quantity]"
                                                    required>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">Unit Price</label>
                                                <input type="number" step="0.01" class="form-control unit-price"
                                                    name="items[0][unit_price]" required>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label">Total</label>
                                                <input type="number" step="0.01" class="form-control item-total"
                                                    name="items[0][total]" readonly>
                                            </div>
                                            <div class="col-md-2 d-flex align-items-end">
                                                <button type="button" class="btn btn-danger remove-item">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" id="addItemBtn" class="btn btn-primary mt-2">Add Item</button>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="notes" class="form-label">Notes</label>
                                    <textarea class="form-control" id="notes" name="notes" rows="3">{{ old('notes') }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-primary">Save Purchase</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
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


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add new item row
            document.getElementById('addItemBtn').addEventListener('click', function() {
                const container = document.getElementById('purchaseItemsContainer');
                const itemCount = container.querySelectorAll('.item-row').length;
                const newRow = container.querySelector('.item-row').cloneNode(true);

                // Update indexes in names
                newRow.innerHTML = newRow.innerHTML.replace(/items\[0\]/g, `items[${itemCount}]`);

                // Clear values
                newRow.querySelector('.product-select').value = '';
                newRow.querySelector('input[name^="items"][name$="[quantity]"]').value = '';
                newRow.querySelector('input[name^="items"][name$="[unit_price]"]').value = '';
                newRow.querySelector('.item-total').value = '';

                container.appendChild(newRow);
            });

            // Remove item row
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-item')) {
                    if (document.querySelectorAll('.item-row').length > 1) {
                        e.target.closest('.item-row').remove();
                        calculateGrandTotal();
                    } else {
                        alert('At least one item is required.');
                    }
                }
            });

            // Calculate item total
            document.addEventListener('input', function(e) {
                if (e.target.name && e.target.name.includes('quantity') ||
                    e.target.name && e.target.name.includes('unit_price')) {
                    const row = e.target.closest('.item-row');
                    const quantity = parseFloat(row.querySelector(
                        'input[name^="items"][name$="[quantity]"]').value) || 0;
                    const unitPrice = parseFloat(row.querySelector(
                        'input[name^="items"][name$="[unit_price]"]').value) || 0;
                    const total = quantity * unitPrice;
                    row.querySelector('.item-total').value = total.toFixed(2);

                    // Update grand total
                    calculateGrandTotal();
                }
            });

            // Calculate grand total
            function calculateGrandTotal() {
                let grandTotal = 0;
                document.querySelectorAll('.item-total').forEach(input => {
                    grandTotal += parseFloat(input.value) || 0;
                });
                document.getElementById('total_amount').value = grandTotal.toFixed(2);
            }
        });
    </script>
@endpush
