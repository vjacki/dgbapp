<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\employee;
use App\Models\movement;
use App\Models\product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        //
        $movements = Movement::with(['employee', 'customer', 'product'])->get();
        return view('movements.index',compact('movements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():View
    {
        //
        $employees=Employee::all();
        $products=Product::all();
        $customers=customer::all();
        return view('movements.create',compact('employees','products','customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request):RedirectResponse
    {
        //

        Movement::create([
            'quantity' => $request->quantity,
            'date' => $request->date,
            'movementType' => $request->movementType,
            'employee_id' => $request->employeeId,
            'product_id' => $request->productId,
            'customer_id' => $request->customerId,
            'price' => $request->price,

        ]);
        return redirect()->route('movements.index')->with('success', 'Movement created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        //
        $employees=Employee::all();
        $products=Product::all();
        $customers=customer::all();
        $movement = Movement::find($id);
        return view('movements.create',compact('movement','employees','products','customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
        $movement=movement::find($id);

        $movement->update([
            'quantity' => $request->quantity,
            'date' => $request->date,
            'movementType' => $request->movementType,
            'price' => $request->price,
            'employee_id' => $request->employeeId,
            'customer_id' => $request->customerId,
            'product_id' => $request->productId,
        ]);
        return redirect()->route('movements.index')->with('success', 'Movement updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        //
        $movement=movement::find($id);
        $movement->delete();
        return redirect()->route('movements.index')->with('success', 'Movement deleted successfully.');
    }
}
