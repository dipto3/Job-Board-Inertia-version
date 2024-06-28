<?php

namespace App\Services;

use App\Models\Package;

class PackageService
{
    public function allPackage()
    {
        return Package::all();
    }

    public function activePackage()
    {
        return Package::where('status', 1)->get();
    }

    public function storePackage($request)
    {
        return Package::create([
            'name' => $request->name,
            'price' => $request->price,
            'limit' => $request->limit,
        ]);
    }

    public function findPackage($id)
    {
        return Package::findOrFail($id);
    }

    public function updatePackage($request, $id)
    {
        return Package::where('id', $id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'limit' => $request->limit,
        ]);
    }

    public function status($request)
    {
        return Package::where('id', $request->id)->update([
            'status' => $request->status,
        ]);
    }

    public function packageRemove($id)
    {
        return Package::findOrFail($id)->delete();
    }
}
