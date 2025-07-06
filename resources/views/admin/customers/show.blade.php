@extends('admin.layouts.app')
@section('content')
    <div class="pagetitle d-flex justify-content-between align-items-center py-2">
        <h1>Customer Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Customers</li>
                <li class="breadcrumb-item active">Show</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center py-2">
            <h5 class="card-title">Customer Details</h5>
            <a href="{{ route('customers') }}" class="btn btn-primary"> <i class="bi bi-list"></i> Customer List</a>
        </div>
        <div class="card-body">
         <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td>{{ $customer->id }}</td>
                </tr>
                <tr>
                    <th scope="row">Name</th>
                    <td>{{ $customer->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Customer Address</th>
                    <td>{{ $customer->address }}</td>
                </tr>
                <tr>
                    <th scope="row">Contact Number</th>
                    <td>{{ $customer->contactNumber }}</td>
                </tr>
                <tr>
                    <th scope="row">Doctor Name</th>
                    <td>{{ $customer->doctorName }}</td>
                </tr>
                <tr>
                    <th scope="row">Doctor Address</th>
                    <td>{{ $customer->doctorAddress }}</td>
                </tr>
            </tbody>
         </table>
       
   
       </div>
   </div>

@endsection
