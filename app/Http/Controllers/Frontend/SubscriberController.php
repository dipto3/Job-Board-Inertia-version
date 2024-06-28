<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\SubscribersService;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    protected $subscribersService;

    public function __construct(SubscribersService $subscribersService)
    {
        $this->subscribersService = $subscribersService;
    }

    public function store(Request $request)
    {
        $subscriber = $this->subscribersService->addSubscriber($request);
        return redirect()->back();
    }
}
