<?php

namespace App\Http\Controllers;

use App\Models\crud;
use Illuminate\Http\Request;

class crudController extends Controller
{
    public function index()
    {
        $crud = crud::all();
        return view('crud.index', compact('crud'));
    }

    public function create()
    {
        return view('crud.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        crud::create($request->all());
        return redirect()->route('crud.index')->with('success', 'Data created successfully.');
    }

    public function show(crud $crud)
    {
        return view('crud.show', compact('crud'));
    }

    public function edit(crud $crud)
    {
        return view('crud.edit', compact('crud'));
    }

    public function update(Request $request, crud $crud)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $crud->update($request->all());
        return redirect()->route('crud.index')->with('success', 'Data updated successfully.');
    }

    public function destroy(crud $crud)
    {
        $crud->delete();
        return redirect()->route('crud.index')->with('success', 'Data deleted successfully.');
    }
}
