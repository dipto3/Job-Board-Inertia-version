<?php

namespace App\Services;

use App\Mail\JobPost;
use App\Models\Category;
use App\Models\Job;
use App\Models\JobApply;
use App\Models\JobView;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class JobService
{
    public function findCategory()
    {
        return Category::where('status', 1)->get();
    }

    public function storeJob($request)
    {
        // dd($request->all());
        $loggedInUser = Auth::user();

        $jobLimit = $loggedInUser->companyInfo->package->limit;
        $packageID = $loggedInUser->companyInfo->package->id;


        //Existing package's job post count 
        $packageJobsCount = Job::where('user_id', $loggedInUser->id)->where('package_id', $loggedInUser->companyInfo->package->id)->count();
        // dd($packageJobsCount);
        if ($packageJobsCount >= $jobLimit) {

            return false; // Job posting limit over
        }
        $tags = implode(',', $request->tags);

        $job = Job::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'uuid' => Str::uuid()->toString(),
            'user_id' => $loggedInUser->id,
            'package_id' => $packageID,
            'tags' => $tags,
            'location' => $request->location,
            'published' => $request->published,
            'deadline' => $request->deadline,
            'salary' => $request->salary,
            'employment_type' => $request->employment_type,
            'experience' => $request->experience,
            'gender' => $request->gender,
            'description' => $request->description,
            'status' => $request->status,
            'link' => $request->link,
        ]);
        //Get category for Send mail to the subscriber 
        $subscribers = Subscriber::where('category_id', $request->category_id)->get();

        foreach ($subscribers as $subscriber) {

            Mail::to($subscriber->email)->send(new JobPost($job));
        }

        return $job;
    }



    public function getAllJob()
    {
        //If role admin then show all jobs
        if (Auth::user()->role_id == 1) {
            $jobs = Job::orderBy('id', 'DESC')->get();
            //Specific job's view count
            foreach ($jobs as $job) {
                $job->totalViews = JobView::where('job_id', $job->id)->count();
            }

            return $jobs;
        } else {
            //If role not admin then show loggedInUser jobs
            $loggedInUser = Auth::user();
            $jobs = Job::where('user_id', $loggedInUser->id)->orderBy('id', 'DESC')->get();

            //Specific job's view count
            foreach ($jobs as $job) {
                $job->totalViews = JobView::where('job_id', $job->id)->count();
                $job->totalClick = JobApply::where('job_id', $job->id)->count();
            }

            return $jobs;
        }
    }

    public function findJobInfo($id)
    {
        return Job::findOrFail($id);
    }

    public function updateJob($request, $id)
    {
        $loggedInUser = Auth::user();
        $tags = implode(',', $request->tags);
        $data = [
            'title' => $request->title,
            'category_id' => $request->category,
            'user_id' => $loggedInUser->id,
            'tags' => $tags,
            'location' => $request->location,
            'published' => $request->published,
            'deadline' => $request->deadline,
            'salary' => $request->salary,
            'employment_type' => $request->employment_type,
            'experience' => $request->experience,
            'gender' => $request->gender,
            'description' => $request->description,
            'status' => $request->status,
            'link' => $request->link,
        ];
        $job = Job::where('id', $id)->update($data);

        return $job;
    }

    public function status($request)
    {
        $job = Job::where('id', $request->id)->update([
            'status' => $request->status,
        ]);

        return $job;
    }

    public function destroyJobInfo($id)
    {
        return Job::findOrFail($id)->delete();
    }

    public function jobDetailsPage($uuid, $request)
    {
        $job = Job::where('uuid', $uuid)->first();

        //store ip adress for job view count
        $ipAddress = $request->ip();
        $existIp = JobView::where('job_id', $job->id)->where('ipAddress', $ipAddress)->first();
        //check for store unique ip address
        if (!$existIp) {
            JobView::create([
                'job_id' => $job->id,
                'ipAddress' => $ipAddress,
            ]);
        }

        return $job;
    }

    public function clcik($id, $request)
    {
        $loggedInUser = Auth::user()->id;
        $job = Job::find($id);
        $ipAddress = $request->ip();
        $existIp = JobApply::where('job_id', $job->id)->where('user_id', $loggedInUser)->where('ipAddress', $ipAddress)->first();
        //check for store unique ip address
        if (!$existIp) {
            JobApply::create([
                'job_id' => $id,
                'ipAddress' => $ipAddress,
                'user_id' => $loggedInUser,
            ]);
        }

        return $job;
    }
}
