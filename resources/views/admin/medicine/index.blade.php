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
            <h5 class="card-title"><i class="bi bi-list"></i> Medicine List</h5>
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
            <table class="table table-striped table-bordered datatable">
                <thead>
                    <tr class="table-success">
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
                                <div class="dropdown">
                                    <button
                                        class="btn btn-link text-dark mx-2 d-flex justify-content-center align-items-center"
                                        type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical fs-5"></i>
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">

                                        <div class="dropdown-item mx-2">
                                            <button class="btn btn-primary btn-show" data-name="{{ $medicine->name }}"
                                                data-packing="{{ $medicine->packing }}"
                                                data-generic="{{ $medicine->genericName }}"
                                                data-supplier="{{ $medicine->supplierName }}" data-toggle="modal"
                                                data-target="#medicineModal"><i class="bi bi-"></i>Show
                                            </button>

                                            <a class="btn btn-success" href="{{ route('medicine.edit', $medicine->id) }}">
                                                {{-- <i class="bi bi-arrow-down-left-square"></i> --}}
                                                <i class="bi bi-pencil-square "></i>
                                            </a>

                                            <form id="delete-form-{{ $medicine->id }}"
                                                action="{{ route('medicine.destroy', $medicine->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="deleteConfirm({{ $medicine->id }})" class="btn btn-danger"><i
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

    <script>
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
    </script>
@endsection
