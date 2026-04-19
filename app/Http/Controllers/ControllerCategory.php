<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;

class ControllerCategory extends Controller
{
    // ── Admin dashboard — passes all needed data ──────────────────
    public function dashboard()
    {
       ;
    }

    // ── Store new category ────────────────────────────────────────
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string|max:500',
        ]);

        Category::create([
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->back()
                         ->with('success', '✦ Catégorie « ' . $request->name . ' » créée avec succès !');
    }

    public function Edit(int $id){
        $category = Category::find($id);
        return view('admin.edit_categories',compact('category'));

    }
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255|unique:categories,name,' . $id,
            'description' => 'nullable|string|max:500',
        ]);

        $category->update([
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->back()
                         ->with('success', '✦ Catégorie « ' . $request->name . ' » mise à jour !');
    }

    // ── Delete category ───────────────────────────────────────────
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $name     = $category->name;
        $category->delete();

        return redirect()->back()
                         ->with('success', '✦ Catégorie « ' . $name . ' » supprimée.');
    }
}