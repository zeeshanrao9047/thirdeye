<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FormData;

class FormDataController extends Controller
{
    // Show the form
    public function create()
    {
        return view('form.create');
    }

    // Store the form data
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
            'address' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        $data = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'address' => $validatedData['address'],
            'image' => $imagePath,
        ];

        FormData::create(['data' => json_encode($data)]);

        return redirect()->route('form.index')->with('success', 'Form data saved successfully.');
    }

    // Show all form data
    public function index()
    {
        $formData = FormData::all();
        return view('form.index', compact('formData'));
    }

    // Show the form for editing the specified data
    public function edit($id)
    {
        $formEntry = FormData::findOrFail($id);
        $data = json_decode($formEntry->data, true);

        return view('form.edit', compact('formEntry', 'data'));
    }

    // Update the specified data
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $formEntry = FormData::findOrFail($id);
        $data = json_decode($formEntry->data, true);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        $data['name'] = $validatedData['name'];
        $data['email'] = $validatedData['email'];
        $data['address'] = $validatedData['address'];
        if (!empty($validatedData['password'])) {
            $data['password'] = bcrypt($validatedData['password']);
        }

        $formEntry->update(['data' => json_encode($data)]);

        return redirect()->route('form.index')->with('success', 'Form data updated successfully.');
    }
}
