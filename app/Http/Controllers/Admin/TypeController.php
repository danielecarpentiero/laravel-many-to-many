<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $types = Type::all();

        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();

        $new_type = new Type();
        $new_type->title = $data['title'];
        $new_type->slug = Str::of($new_type->title)->slug();

        $new_type->save();

        return redirect()->route('admin.types.index')->with('messages', "Type $new_type->title added successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $type->slug = Str::of($data['title'])->slug();

        $type->update($data);

        return redirect()->route('admin.types.index')->with('messages', "Type $type updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type): \Illuminate\Http\RedirectResponse
    {
        $type->delete();

        return redirect()->route('admin.types.index')->with('messages', "Type $type deleted successfully");
    }
}
