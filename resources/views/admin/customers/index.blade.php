@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle d-flex justify-content-between align-items-center  py-2">
        <h1>All Customers</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Customers</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center py-2">
            <h5 class="card-title">All Customers</h5>
            <a href="{{ route('customers.create') }}" class="btn btn-outline-primary"><i class="bi bi-person-add"></i> Create
                Customer</a>
        </div>
        <div class="card-body">
            <table class="table table-striped datatable">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Customer Address</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Doctor Name</th>
                        <th scope="col">Doctor Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->contactNumber }}</td>
                            <td>{{ $customer->doctorName }}</td>
                            <td>{{ $customer->doctorAddress }}</td>
                            <td>
                                <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i> Show</a>
                                <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>

                                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                 </form>
                                {{-- <a href="{{ route('customers.destroy', $customer->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- pagination --->
            {{ $customers->links() }}
        </div>
    </div>
@endsection
