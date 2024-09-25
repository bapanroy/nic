<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemGroup;
use Illuminate\Http\Request;

class ItemGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itemGroups = ItemGroup::all();
        return view('itemgroups.index', compact('itemGroups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $itemGroups = ItemGroup::all();
        // return view('items.create', compact('itemGroups'));
        return view('itemgroups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:item_groups',
        ]);

        ItemGroup::create($request->only('name'));
        return redirect()->route('item-groups.index')->with('success', 'Item Group created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $itemGroup = ItemGroup::findOrFail($id);

        return view('itemgroups.show', compact('itemGroup'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        //$itemGroups = ItemGroup::all();
        $itemGroup = ItemGroup::findOrFail($id);
        return view('itemgroups.edit', compact('itemGroup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:item_groups,name,' . $id,
        ]);

        $itemGroup = ItemGroup::findOrFail($id);
        $itemGroup->update($request->only('name'));


        return redirect()->route('item-groups.index')->with('success', 'Item Group updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $itemGroup = ItemGroup::findOrFail($id);
        $itemGroup->delete();
        return redirect()->route('itemgroups.index')->with('success', 'Item Group deleted successfully.');
    }
}
