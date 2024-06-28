<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageFormRequest;
use App\Services\PackageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    const moduleDirectory = 'admin.package.';

    protected $packageService;

    public function __construct(PackageService $packageService)
    {
        $this->packageService = $packageService;
    }

    public function package()
    {
        $data = [
            'packages' => $this->packageService->activePackage(),
        ];

        return view(self::moduleDirectory.'pricing', $data);
    }

    public function index()
    {
        $loggedInUser = Auth::user();
        if (is_null($loggedInUser) || ! $loggedInUser->can('index-package')) {
            abort(403, 'Unauthorized Access!');
        }
        $data = [
            'packages' => $this->packageService->allPackage(),
        ];

        return view(self::moduleDirectory.'index', $data);
    }

    public function create()
    {
        $loggedInUser = Auth::user();
        if (is_null($loggedInUser) || ! $loggedInUser->can('create-package')) {
            abort(403, 'Unauthorized Access!');
        }

        return view(self::moduleDirectory.'create');
    }

    public function store(PackageFormRequest $request)
    {
        $request->validated();
        $package = $this->packageService->storePackage($request);
        toastr()->addInfo('', 'Package Created Successfully.');

        return redirect()->route('package.index');
    }

    public function edit($id)
    {
        $loggedInUser = Auth::user();
        if (is_null($loggedInUser) || ! $loggedInUser->can('edit-package')) {
            abort(403, 'Unauthorized Access!');
        }
        $data = [
            'package' => $this->packageService->findPackage($id),
        ];

        return view(self::moduleDirectory.'edit', $data);
    }

    public function update(Request $request, $id)
    {
        $package = $this->packageService->updatePackage($request, $id);
        toastr()->addInfo('', 'Package Updated Successfully.');

        return redirect()->route('package.index');
    }

    public function status(Request $request)
    {
        $this->packageService->status($request);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $loggedInUser = Auth::user();
        if (is_null($loggedInUser) || ! $loggedInUser->can('delete-package')) {
            abort(403, 'Unauthorized Access!');
        }
        $this->packageService->packageRemove($id);

        toastr()->addInfo('', 'Package Removed Successfully.');

        return redirect()->route('package.index');
    }
}
