<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerService extends Controller
{
 
    public function index()
    {
       

     
    }
    public function create()
    {
         $services = Service::where('barber_id', Auth::user()->barber->id)->get();
        $categories = Category::all();

        return view('barber.create_service', compact('categories','services'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:191',
            'duration' => 'required|string|max:191',
            'description' => 'required|string|max:191',
            'category_id' => 'required|exists:categories,id',
            'prix' => 'required|integer'
        ]);

        $validated['barber_id'] = Auth::user()->barber->id;

        Service::create($validated);

        return redirect()->back()
            ->with('success', 'Service created successfully');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);

        if ($service->barber_id !== Auth::user()->barber->id) {
            abort(403);
        }

        $categories = Category::all();

        return view('barber.edit_service', compact('service', 'categories'));
    }

       public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        if ($service->barber_id !== Auth::user()->barber->id) {
            abort(403);
        }

        $validated = $request->validate([
            'titre' => 'required|string|max:191',
            'duration' => 'required|string|max:191',
            'description' => 'required|string|max:191',
            'category_id' => 'required|exists:categories,id',
            'prix' => 'required|integer'
        ]);

        $service->update($validated);

        return redirect()->route('create.services')
            ->with('success', 'Service updated successfully');
    }

   
    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        if ($service->barber_id !== Auth::user()->barber->id) {
            abort(403);
        }

        $service->delete();

        return redirect()->route('create.services')
            ->with('success', 'Service deleted successfully');
    }
}