<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vendors.index', ['vendors' => Vendor::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vendors.create', ['vendor' => new Vendor()]); //Reference to the view in resource/views
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //1 capture data
        //2 validate data
        $validatedData = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255', 'unique:vendors,email'],
            'password' => ['required', 'string', 'min:8'],
        ]);


        //3 save data
        $vendor = Vendor::create($validatedData);

        return redirect()->route('vendors.index')->with('status', 'Vendor created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor)
    {
        return view('vendors.show', compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $vendor)
    {
        return view('vendors.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendor $vendor)
    {
        $data = $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'email' => ['sometimes', 'nullable', 'email', 'max:255', 'unique:vendors,email,' . $vendor->id],
            'password' => ['nullable', 'string', 'min:8'],
        ]);


        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $vendor->update($data);

        return redirect()->route('vendors.index')->with('status', 'Vendor updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();
        return redirect()->route('vendors.index')->with('status', 'Vendor deleted');
    }
}

