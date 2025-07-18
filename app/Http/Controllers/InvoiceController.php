<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Helpers\NotificationHelper;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $invoices = Invoice::latest()->get();
        return view('admin.invoice.index', ['invoices' => $invoices]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $customers = Customer::latest()->get();
        return view('admin.invoice.create', ['customers' => $customers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Invoice $invoice)
    {

        $invoice->customer_id = $request->customerID;
        $invoice->invoice_date = $request->invoiceDate;
        $invoice->net_total = $request->netTotal;
        $invoice->total_amount = $request->totalAmount;
        $invoice->total_discount = $request->totalDiscount;
        $invoice->save();

        # Flash Message Notification Helper Function
        $notification = NotificationHelper::notify('Invoice Created Successfully', 'success', 'Created');

        return redirect()->route('invoice')->with('notification', $notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {

        $customers = Customer::latest()->get();
        return view('admin.invoice.edit', [
            'customers' => $customers,
            'invoice' => $invoice
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
        $invoice->customer_id = $request->customerID;
        $invoice->invoice_date = $request->invoiceDate;
        $invoice->net_total = $request->netTotal;
        $invoice->total_amount = $request->totalAmount;
        $invoice->total_discount = $request->totalDiscount;
        $invoice->save();

        # Flash Message Notification Helper Function
        $notification = NotificationHelper::notify('Invoice Updated Successfully', 'success', 'Updated');

        return redirect()->route('invoice')->with('notification', $notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //

        $invoice->delete();

        # Flash Message Notification Helper Function
        $notification = NotificationHelper::notify('Invoice Deleted Successfully', 'error', 'Deleted');

        return redirect()->route('invoice')->with('notification', $notification);
    }
}
