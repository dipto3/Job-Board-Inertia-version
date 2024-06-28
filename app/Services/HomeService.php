<?php

namespace App\Services;

use App\Models\Job;

class HomeService
{
    public function homeFeed()
    {
        $activeJobs = Job::where('status', 1)
            ->where('deadline', '>=', now()->startOfDay())
            ->get();

        // dd(now()->startOfDay());
        return compact('activeJobs');
    }

    public function searchJob($request)
    {
        $query = $request->input('search');

        $jobs = Job::where('tags', 'like', "$query%")
            ->orWhere('location', 'like', "$query%")
            ->orWhere('salary', 'like', "$query%")
            ->get();

        return compact('jobs');
    }
}
