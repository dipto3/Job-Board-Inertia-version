<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\JobService;
use Illuminate\Http\Request;

class JobController extends Controller
{
    protected $jobService;

    public function __construct(JobService $jobService)
    {
        $this->jobService = $jobService;
    }

    public function jobDetails($uuid, Request $request)
    {
        $data = [
            'job' => $this->jobService->jobDetailsPage($uuid, $request),
        ];
        return view('frontend.jobs.description', $data);
    }

    public function clcik($id, Request $request)
    {
        $job = $this->jobService->clcik($id, $request);

        return redirect()->to($job->link);
    }
}
