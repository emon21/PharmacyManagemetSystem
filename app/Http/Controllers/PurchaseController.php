<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Medicine;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $purchases = Purchase::all();
        return view('admin.purchase.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $suppliers  = Supplier::get();
        $invoices = Invoice::get();
        // $voucherNumbers = Purchase::distinct()->pluck('voucher_number');
        // $invoices = Invoice::distinct()->pluck('invoice_name');
        // $invoiceNames = Purchase::select('invoice_name')->distinct()->get();
        // $invoiceNames = Purchase::pluck('invoice_name')->unique();
        // Fetching unique invoice names
        // $invoiceNames = Purchase::distinct()->pluck('invoice_name');
        // return view('admin.purchase.create', compact('suppliers', 'medicines', 'invoiceNames'));
        // Returning view with suppliers and medicines
        // Note: The invoice names are not being used in the view currently, but can be
        return view('admin.purchase.create', [
            'suppliers' => $suppliers,
            'invoices' => $invoices,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Purchase $purchase)
    {
        //
        $purchase->supplier_id = $request->supplier_id;
        $purchase->invoice_id  = $request->invoice_id;
        $purchase->voucher_number = $request->voucher_number;
        $purchase->purchase_date = $request->purchase_date;
        $purchase->total_amount = $request->total_amount;
        $purchase->payment_status = $request->payment_status;
        $purchase->save();

        return redirect()->route('purchase')->with('success','Purchase Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase)
    {
        //
        $suppliers  = Supplier::get();
        $invoices = Invoice::get();
        return view('admin.purchase.edit',[
            'suppliers' => $suppliers,
            'invoices' => $invoices,
            'purchase' => $purchase,
        ]);
        // $voucherNumbers = Purchase::distinct()->pluck('voucher_number');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Purchase $purchase)
    {
        // return $request->all();
        //
        $purchase->supplier_id = $request->supplier_id;
        $purchase->invoice_id  = $request->invoice_id;
        $purchase->voucher_number = $request->voucher_number;
        $purchase->purchase_date = $request->purchase_date;
        $purchase->total_amount = $request->total_amount;
        $purchase->payment_status = $request->payment_status;
        $purchase->save();

        return redirect()->route('purchase')->with('success','Purchase Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        //
        $purchase->delete();
        return redirect()->route('purchase')->with('success', 'Purchase Deleted successfully');
    }
}
