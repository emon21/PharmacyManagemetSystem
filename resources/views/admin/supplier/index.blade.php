@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle d-flex justify-content-between align-items-center  py-2">
        <h1>All Supplier</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Supplier</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center py-2">
            <h5 class="card-title"><i class="bi bi-list"></i> Supplier List</h5>
            <a href="{{ route('supplier.create') }}" class="btn btn-outline-primary"><i class="bi bi-person-add"></i>
                Create Supplier</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered datatable">
                <thead>
                    <tr class="table-success">
                        <th scope="col">ID</th>
                        <th scope="col">Supplier Name</th>
                        <th scope="col">Supplier Email</th>
                        <th scope="col">Supplier Phone</th>
                        <th scope="col">Supplier Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $supplier)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $supplier->supplier_name }}</td>
                            <td>{{ $supplier->supplier_email }}</td>
                            <td>{{ $supplier->supplier_phone }}</td>
                            <td>{{ $supplier->supplier_address }}</td>
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
                                            

                                            <a class="btn btn-success" href="{{ route('supplier.edit', $supplier->id) }}">
                                                <i class="bi bi-pencil-square "></i>
                                            </a>

                                            <form id="delete-form-{{ $supplier->id }}"
                                                action="{{ route('supplier.destroy', $supplier->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteConfirm({{ $supplier->id }})" class="btn btn-danger"><i
                                                    class="bi bi-trash"></i>
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- pagination --->
            {{-- {{ $Supplier->links() }} --}}
        </div>
    </div>

   
    {{-- <script>
        function deleteConfirm(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script> --}}
@endsection
