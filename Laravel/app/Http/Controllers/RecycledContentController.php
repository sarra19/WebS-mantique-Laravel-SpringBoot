<?php
namespace App\Http\Controllers;

use App\Models\RecycledContent;
use Illuminate\Http\Request;

class RecycledContentController extends Controller
{
    public function index()
    {
        $recycledContents = RecycledContent::all();
        return view('BackOffice.recycled-content.index', compact('recycledContents'));
    }

    public function create()
    {
        return view('BackOffice.recycled-content.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'percentage' => 'required|numeric|min:0|max:100',
            'content_description' => 'nullable|string|max:1000',
        ]);

        RecycledContent::create($validatedData);

        return redirect()->route('recycled-content.index')->with('success', 'Recycled content created successfully!');
    }

    public function show($id)
    {
        $recycledContent = RecycledContent::findOrFail($id);
        return view('BackOffice.recycled-content.show', compact('recycledContent'));
    }

    public function edit($id)
    {
        $recycledContent = RecycledContent::findOrFail($id);
        return view('BackOffice.recycled-content.edit', compact('recycledContent'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'percentage' => 'required|numeric|min:0|max:100',
            'content_description' => 'nullable|string|max:1000',
        ]);

        $recycledContent = RecycledContent::findOrFail($id);
        $recycledContent->update($validatedData);

        return redirect()->route('recycled-content.index')->with('success', 'Recycled content updated successfully!');
    }

    public function destroy($id)
    {
        $recycledContent = RecycledContent::findOrFail($id);
        $recycledContent->delete();

        return redirect()->route('recycled-content.index')->with('success', 'Recycled content deleted successfully!');
    }
}
