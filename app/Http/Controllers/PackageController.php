<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\PackagePrice;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::with('prices')->get();
        return view('pages.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('pages.packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'description' => 'required|string',
            'durations' => 'required|array',
            'prices' => 'required|array',
            'durations.*' => 'required|string',
            'prices.*' => 'required|numeric',
        ]);

        $package = Package::create($request->only('name', 'type', 'level', 'description'));

        foreach ($request->durations as $index => $duration) {
            PackagePrice::create([
                'package_id' => $package->id,
                'duration' => $duration,
                'price' => $request->prices[$index],
            ]);
        }

        return redirect()->route('packages.index')
                         ->with('success', 'Package created successfully.');
    }

    public function edit($id)
    {
        $package = Package::with('prices')->findOrFail($id);
        return view('pages.packages.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'description' => 'required|string',
            'durations' => 'required|array',
            'prices' => 'required|array',
            'durations.*' => 'required|string',
            'prices.*' => 'required|numeric',
        ]);

        $package = Package::findOrFail($id);
        $package->update($request->only('name', 'type', 'level', 'description'));

        // Delete existing prices
        PackagePrice::where('package_id', $package->id)->delete();

        // Add new prices
        foreach ($request->durations as $index => $duration) {
            PackagePrice::create([
                'package_id' => $package->id,
                'duration' => $duration,
                'price' => $request->prices[$index],
            ]);
        }

        return redirect()->route('packages.index')
                         ->with('success', 'Package updated successfully.');
    }

    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        return redirect()->route('packages.index')
                         ->with('success', 'Package deleted successfully.');
    }
}
