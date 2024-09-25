<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Expenditure;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ExpenditureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenditures = Expenditure::where('user_id', Auth::id())->with('item')->get();
        return view('expenditures.index', compact('expenditures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Item::all();
        return view('expenditures.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'description' => 'nullable|string|max:255',
        ]);

        Expenditure::create([
            'user_id' => Auth::id(),
            'item_id' => $request->item_id,
            'amount' => $request->amount,
            'date' => $request->date,
            'description' => $request->description,
        ]);

        return redirect()->route('expenditures.index')->with('success', 'Expenditure created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //$expenditure = Expenditure::where('user_id', Auth::id())->with('item')->findOrFail($id);
        $expenditure = Expenditure::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('expenditures.show', compact('expenditure'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //$expenditure = Expenditure::where('user_id', Auth::id())->findOrFail($id);
        $expenditure = Expenditure::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $items = Item::all();
        return view('expenditures.edit', compact('expenditure', 'items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'description' => 'nullable|string|max:255',
        ]);

        //$expenditure = Expenditure::where('user_id', Auth::id())->findOrFail($id);
        $expenditure = Expenditure::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $expenditure->update($request->all());

        return redirect()->route('expenditures.index')->with('success', 'Expenditure updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //$expenditure = Expenditure::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $expenditure = Expenditure::where('user_id', Auth::id())->findOrFail($id);
        $expenditure->delete();
        return redirect()->route('expenditures.index')->with('success', 'Expenditure deleted successfully.');
    }
}
