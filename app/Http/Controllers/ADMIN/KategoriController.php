<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return a view or JSON as needed
        return view('admin.kategori.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate and store the new kategori
        // $validated = $request->validate([...]);
        // Model::create($validated);

        return redirect()->route('admin.kategori-umkm.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $item = Model::findOrFail($id);
        // return view('admin.kategori.show', compact('item'));
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // $item = Model::findOrFail($id);
        // return view('admin.kategori.edit', compact('item'));
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // validate and update
        // $validated = $request->validate([...]);
        // $item = Model::findOrFail($id);
        // $item->update($validated);

        return redirect()->route('admin.kategori-umkm.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // $item = Model::findOrFail($id);
        // $item->delete();

        return redirect()->route('admin.kategori-umkm.index');
    }
}