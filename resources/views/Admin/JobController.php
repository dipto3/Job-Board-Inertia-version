<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobFormRequest;
use App\Services\JobService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    const moduleDirectory = 'admin.jobs.';

    protected $jobService;

    public function __construct(JobService $jobService)
    {
        $this->jobService = $jobService;
    }

    public function index()
    {
        $loggedInUser = Auth::user();
        if (is_null($loggedInUser) || !$loggedInUser->can('index-job')) {
            abort(403, 'Unauthorized Access!');
        }
        $data = [
            'jobs' => $this->jobService->getAllJob()
        ];

        return view(self::moduleDirectory . 'index', $data);
    }

    public function create()
    {

        $loggedInUser = Auth::user();
        if (is_null($loggedInUser) || !$loggedInUser->can('create-job')) {
            abort(403, 'Unauthorized Access!');
        }
        $data = [
            'categories' => $this->jobService->findCategory(),
        ];

        return view(self::moduleDirectory . 'create', $data);
    }

    public function store(JobFormRequest $request)
    {
        $request->validated();
        $job = $this->jobService->storeJob($request);
        if ($job) {
            toastr()->addInfo('', 'Job Created Successfully.');
        } else {
            toastr()->addError('', 'Job posting limit over!');
        }

        return redirect()->route('job.index');
    }

    public function details($id)
    {
        $data = [
            'job' => $this->jobService->findJobInfo($id),
            'categories' => $this->jobService->findCategory(),
        ];

        return view(self::moduleDirectory . 'details', $data);
    }

    public function edit($id)
    {
        $loggedInUser = Auth::user();
        if (is_null($loggedInUser) || !$loggedInUser->can('edit-job')) {
            abort(403, 'Unauthorized Access!');
        }
        $data = [
            'job' => $this->jobService->findJobInfo($id),
            'categories' => $this->jobService->findCategory(),
        ];

        return view(self::moduleDirectory . 'edit', $data);
    }

    public function update(Request $request, $id)
    {
        $job = $this->jobService->updateJob($request, $id);
        if ($job) {
            toastr()->addInfo('', 'Job Updated Successfully.');
        } else {
            toastr()->addError('', 'Something went wrong!');
        }

        return redirect()->route('job.index');
    }

    public function status(Request $request)
    {
        $this->jobService->status($request);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $loggedInUser = Auth::user();
        if (is_null($loggedInUser) || !$loggedInUser->can('delete-job')) {
            abort(403, 'Unauthorized Access!');
        }
        $job = $this->jobService->destroyJobInfo($id);
        if ($job) {
            toastr()->addInfo('', 'Job Removed Successfully.');

            return redirect()->route('job.index');
        }
    }
}
