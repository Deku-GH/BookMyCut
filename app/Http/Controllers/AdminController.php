<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     // Dashboard
    public function dashboard()
    {
        $users = User::latest()->take(5)->get();
        $categories = Category::latest()->take(5)->get();

        return view('admin.dashboard', compact('users', 'categories'));
    }

    // Users page
    public function users()
    {
        $users = User::all();

        return view('admin.users', compact('users'));
    }

    // Categories page
    public function categories()
    {
        $categories = Category::all();

        return view('admin.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
