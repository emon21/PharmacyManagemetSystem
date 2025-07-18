
@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle d-flex justify-content-between align-items-center  py-2">
        <h1>All Invoice</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Invoice</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center py-2">
            <h5 class="card-title"><i class="bi bi-list"></i> Invoice List</h5>
            <a href="{{ route('invoice.create') }}" class="btn btn-outline-primary"><i class="bi bi-person-add"></i>
                Create Invoice</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered datatable">
                <thead>
                    <tr class="table-success">
                        <th scope="col">ID</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Invoice Date</th>
                        <th scope="col">Net Price</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Total Discount</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $invoice)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $invoice->customer->name }}</td>
                            <td>{{ $invoice->invoice_date }}</td>
                            <td>{{ $invoice->net_total }}</td>
                            <td>{{ $invoice->total_amount }}</td>
                            <td>{{ $invoice->total_discount }}</td>
                            <td>
                                <div class="dropdown">
                                    <button
                                        class="btn btn-link text-dark mx-2 d-flex justify-content-center align-items-center"
                                        type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical fs-5"></i>
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">

                                        <div class="dropdown-item mx-2">
                                            

                                            <a class="btn btn-success" href="{{ route('invoice.edit', $invoice->id) }}">
                                                <i class="bi bi-pencil-square "></i>
                                            </a>

                                            <form id="delete-form-{{ $invoice->id }}"
                                                action="{{ route('invoice.destroy', $invoice->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteConfirm({{ $invoice->id }})" class="btn btn-danger">
                                            <i class="bi bi-trash"></i>
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
           
        </div>
    </div>


@endsection
