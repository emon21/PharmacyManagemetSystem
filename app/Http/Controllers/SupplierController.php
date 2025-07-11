<?php

namespace App\Http\Controllers;

use App\Helpers\NotificationHelper;
use App\Http\Requests\SupplierStoreRequest;
use App\Http\Requests\SupplierUpdateRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $suppliers = Supplier::latest()->get();
        return view('admin.supplier.index', ['suppliers' => $suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupplierStoreRequest $request, Supplier $supplier)
    {
        $supplier->supplier_name = $request->supplierName;
        $supplier->supplier_email = $request->supplierEmail;
        $supplier->supplier_phone = $request->supplierPhone;
        $supplier->supplier_address = $request->supplierAddress;
        $supplier->save();

        # notification helper function
        $notification = NotificationHelper::notify('Supplier Created Successfully', 'success');

        // $notification = [
        //     'type' => 'success',
        //     'message' => 'Supplier Created Successfully.',
        //     'title' => 'Success',
        //     'position' => 'top-right'
        // ];

        return redirect()->route('supplier')->with('notification', $notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //

        return view('admin.supplier.edit', ['supplier' => $supplier]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupplierUpdateRequest $request, Supplier $supplier)
    {

        $supplier->supplier_name = $request->supplierName;
        $supplier->supplier_email = $request->supplierEmail;
        $supplier->supplier_phone = $request->supplierPhone;
        $supplier->supplier_address = $request->supplierAddress;
        $supplier->save();

        # notification helper function
        // $notification = NotificationHelper::notify('Supplier Created Successfully', 'success');

        $notification = [
            'type' => 'success',
            'message' => 'Supplier Updated Successfully.',
            'title' => 'Updated Success',
            'position' => 'top-right'
            
        ];

        return redirect()->route('supplier')->with('notification',$notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //
        // $supplier->delete();

        Supplier::destroy($supplier->id);

        // $notification = [
        //     'title' => 'Success',
        //     'message' => 'Supplier Delete Successfully.',
        //     'type' => 'error',
        //     'position' => 'top-right'
        // ];

        $notification = NotificationHelper::notify('Supplier Delete Successfully', 'error');


        return redirect()->route('supplier')->with('notification', $notification);
    }
}
