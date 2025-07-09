@extends('admin.layouts.app')
@section('title', 'Medicine Stock')
@section('content')
    <div class="pagetitle d-flex justify-content-between align-items-center py-2">
        <h1>Medicine Stock List</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Medicine Stock</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex d-flex justify-content-between align-items-center py-2">
                    <h5 class="card-title">Medicine Stock List</h5>
                    <a href="{{ route('medicine-stock.create') }}" class="btn btn-outline-primary ">
                        <i class="bi bi-plus"></i> Add Medicine Stock</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead class="table-success">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Medicine Name</th>
                                <th scope="col">Batch ID</th>
                                <th scope="col">Expiry Date</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">MRP</th>
                                <th scope="col">Rate</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($medicineStocks as $stock)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $stock->medicine->name }}</td>
                                    <td>{{ $stock->batch_id }}</td>
                                    <td>{{ date('d-m-Y',strtotime($stock->expiry_date)) }}</td>
                                    <td>{{ $stock->quantity }}</td>
                                    <td>{{ $stock->mrp }}</td>
                                    <td>{{ $stock->rate }}</td>
                                    <td>
                                        
                                        <a class="btn btn-primary btn-show" data-bs-toggle="modal"
                                            data-bs-target="#medicineStockModal" data-expiry_date="{{ $stock->expiry_date }}"><i class="bi bi-"></i>Show
                                        </a>

                                        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#medicineStockModal">
                                    <i class="fa fa-eye"></i> Show gg
                                </button> --}}

                                        <a href="{{ route('medicine-stock.edit', $stock->id) }}" class="btn btn-warning"><i
                                                class="bi bi-trash"></i> Edit</a>

                                        <form id="delete-form-{{ $stock->id }}"
                                            action="{{ route('medicine-stock.destroy', $stock->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <button onclick="deleteConfirm({{ $stock->id }})" class="btn btn-danger"><i
                                                class="bi bi-trash"></i>
                                        </button>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- <div class="mt-3">
                        {{ $medicineStocks->links() }}
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
@endsection

<!-- The Modal -->
<div class="modal fade" id="medicineStockModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Medicine Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <p><strong>Name : </strong> <span id="expiry_date"></span></p>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

@section('scripts')

    <script>
        $(document).ready(function() {
                        $('.btn-show').on('click', function() {
                            let name = $(this).data('expiry_date');
                            // let packing = $(this).data('packing');
                            // let generic = $(this).data('generic');
                            // let supplier = $(this).data('supplier');

                            $('#expiry_date').text(name);
                            // $('#modalPacking').text(packing);
                            // $('#modalGeneric').text(generic);
                            // $('#modalSupplier').text(supplier);

                            $('#medicineStockModal').modal('show');
                        });
                    });

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
            });
        }
    </script>

@endsection
