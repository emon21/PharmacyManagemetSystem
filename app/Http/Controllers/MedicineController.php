<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMedicineRequest;
use App\Http\Requests\UpdateMedicineRequest;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicines = Medicine::latest()->get();
        return view('admin.medicine.index',['medicines' => $medicines]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.medicine.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMedicineRequest $request,Medicine $medicine)
    {
        //

      //  return $medicine->name = $request->name('name');


        try {

            $medicine->name = $request->name;
            $medicine->packing = $request->packing;
            $medicine->genericName = $request->genericName;
            $medicine->supplierName = $request->supplierName;
            $medicine->save();


            $notification = [
                'type' => 'success',
                'message' => 'Medicine Created successfully.',
                'title' => 'Success',
                'position' => 'top-right',
                'icon' => 'ri-check-line',
                'progressBar' => true,
                'timeOut' => 5000, // 5 seconds
                'extendedTimeOut' => 1000, // 1 second
                'closeButton' => true,
                'closeHtml' => '<button type="button" class="btn-close" aria-label="Close"></button>',
                'showMethod' => 'fadeIn', // Animation for showing the notification
                'hideMethod' => 'fadeOut', // Animation for hiding the notification

            ];
            
            return redirect()->route('medicine')->with('info','Data Inserted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to create medicine: ' . $e->getMessage()]);
        }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicine $medicine)
    {


        return view('admin.medicine.show', ['medicine' => $medicine]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicine $medicine)
    {
        //
        return view('admin.medicine.edit', ['medicine' => $medicine]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicineRequest $request, Medicine $medicine)
    {
        // Update the medicine details
        try {
            #Update the medicine details
            $medicine->update([
                'name' => $request->name,
                'packing' => $request->packing,
                'genericName' => $request->genericName,
                'supplierName' => $request->supplierName,
            ]);

            // $medicine->name = $request->name;
            // $medicine->packing = $request->packing;
            // $medicine->genericName = $request->genericName;
            // $medicine->supplierName = $request->supplierName;
            // $medicine->save();
            # use to toastr notification

            $notification = [
                'type' => 'success',
                'message' => 'Medicine updated successfully.',
                'title' => 'Success',
                'position' => 'top-right'
            ];

            // return redirect()->route('medicine')->with('success', 'Medicine updated successfully.');

            return redirect()->route('medicine')->with($notification);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to update medicine: ' . $e->getMessage()]);
        }

       

        

        // return redirect()->route('medicine.index')->with('success', 'Medicine updated successfully.');
        // return redirect()->route('medicine')->with('success', 'Medicine updated successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicine $medicine)
    {
        try {
            $medicine->delete();
            return redirect()->route('medicine')->with('success', 'Medicine deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to delete medicine: ' . $e->getMessage()]);
        }

    }

    /**
     * Search for a medicine by name.
     */
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        // Logic to search for the medicine by name
        // For example, you can query the database using Eloquent or Query Builder

        return view('admin.medicine.search_results', compact('searchTerm'));
    }

    /**
     * Show the medicine details.
     */
    public function showMedicine($id)
    {
        return view('admin.medicine.show', compact('id'));
    }

    /**
     * Show the medicine details.
     */
    public function stock()
    {
        return view('admin.medicine.stock');
    }

    /**
     * Search for stock.
     */
    public function stockSearch(Request $request)
    {
        $searchTerm = $request->input('search');
        // Logic to search for stock by name or other criteria

        return view('admin.medicine.stock_search_results', compact('searchTerm'));
    }
}