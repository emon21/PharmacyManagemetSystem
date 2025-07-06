<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $customers = Customer::latest()->simplePaginate(8);
        // return $customers;

        return view('admin.customers.index',['customers'=>$customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerStoreRequest $request)
    {
        
        try {
            //code...
            $customer = new Customer();
            $customer->name = $request->customerName;
            $customer->address = $request->customerAddress;
            $customer->contactNumber = $request->contactNumber;
            $customer->doctorName = $request->doctorName;
            $customer->doctorAddress = $request->doctorAddress;
            $customer->save();
            return redirect()->route('customers');

        } catch (\Exception $ex) {
            //throw $th;

            return redirect()->route('customers')->with('error', $ex->getMessage());

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
        return view('admin.customers.show', ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
        return view('admin.customers.edit',['customer'=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerUpdateRequest $request, Customer $customer)
    {
        //
        # validation for update
        // return $customer;

        # update customer

        // $customer = Customer::find($customer->id);
        // $customer->name = $request->customerName;
        // $customer->contactNumber = $request->contactNumber;
        // $customer->doctorName = $request->doctorName;
        // $customer->doctorAddress = $request->doctorAddress;
        // $customer->save();
        // return redirect()->route('customers');

        # demo user


        // customer::where('id', $customer->id)->update([
        //     'name' => $request->customerName,
        //     'contactNumber' => $request->contactNumber,
        //     'doctorName' => $request->doctorName,
        //     'doctorAddress' => $request->doctorAddress
        // ]);

        try {
            //code...
            $customer->name = $request->customerName;
            $customer->address = $request->customerAddress;
            $customer->contactNumber = $request->contactNumber;
            $customer->doctorName = $request->doctorName;
            $customer->doctorAddress = $request->doctorAddress;
            $customer->save();
            return redirect()->route('customers');
        } catch (\Exception $ex) {
            //throw $th;
            return redirect()->route('customers')->with('error', $ex->getMessage());
        }
      

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
        # customer delete

        // $customer->delete();
        // return redirect()->route('customers');

        try {
            //code...
            $customer->delete();
            return redirect()->route('customers');
        } catch (\Exception $ex) {
            //throw $th;
            return redirect()->route('customers')->with('error', $ex->getMessage());
        }
    }
}
