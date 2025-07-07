@extends('admin.layouts.app')

@section('content')
    <div class="pagetitle d-flex justify-content-between align-items-center  py-2">
        <h1>All Medicines</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Medicines</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center py-2">
            <h5 class="card-title">All Medicines</h5>
            <a href="{{ route('medicine.create') }}" class="btn btn-outline-primary"><i class="bi bi-person-add"></i>
                Create Medicine</a>
        </div>

        {{-- @if ('success')
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif --}}
        <div class="card-body">
            <table class="table table-striped datatable">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Packing</th>
                        <th scope="col">generic Name</th>
                        <th scope="col">supplier Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medicines as $medicine)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $medicine->name }}</td>
                            <td>{{ $medicine->packing }}</td>
                            <td>{{ $medicine->genericName }}</td>
                            <td>{{ $medicine->supplierName }}</td>
                            <td>
                                {{-- <a href="{{ route('medicine.show', $medicine->id) }}" class="btn btn-primary"><i 
                                class="fa fa-eye"></i> Show</a> --}}

                                <!-- Button to Open the Modal -->
                                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#medicineModal">
                                    <i class="fa fa-eye"></i> Show
                                </button> --}}
                                <button class="btn btn-primary btn-show" data-name="{{ $medicine->name }}"
                                    data-packing="{{ $medicine->packing }}" data-generic="{{ $medicine->genericName }}"
                                    data-supplier="{{ $medicine->supplierName }}" data-toggle="modal"
                                    data-target="#medicineModal">
                                    <i class="fa fa-eye"></i> Show 
                                </button>

                                <a href="{{ route('medicine.edit', $medicine->id) }}" class="btn btn-success"><i
                                        class="fa fa-edit"></i> Edit</a>
                                {{-- <form action="{{ route('medicine.destroy', $medicine->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>
                                        Delete</button>
                                </form> --}}

                                <form id="delete-form-{{ $medicine->id }}" action="{{ route('medicine.destroy', $medicine->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button onclick="deleteConfirm({{ $medicine->id }})" class="btn btn-danger">Delete</button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- pagination --->
            {{-- {{ $medicines->links() }} --}}
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="medicineModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Medicine Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                   
                    <p><strong>Name : </strong> <span id="modalName"></span></p>
                    <p><strong>Packing : </strong> <span id="modalPacking"></span></p>
                    <p><strong>Generic Name : </strong> <span id="modalGeneric"></span></p>
                    <p><strong>Supplier Name : </strong> <span id="modalSupplier"></span></p>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    
 @push('scripts')
        <script>
            $(document).ready(function() {
                $('.btn-show').on('click', function() {
                    let name = $(this).data('name');
                    let packing = $(this).data('packing');
                    let generic = $(this).data('generic');
                    let supplier = $(this).data('supplier');

                    $('#modalName').text(name);
                    $('#modalPacking').text(packing);
                    $('#modalGeneric').text(generic);
                    $('#modalSupplier').text(supplier);

                    $('#medicineModal').modal('show');
                });
            });
        </script>
    @endpush



  

@endsection
