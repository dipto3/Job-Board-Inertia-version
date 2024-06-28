<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SubscribersService;
use Illuminate\Support\Facades\Auth;

class SubscribersController extends Controller
{
    const moduleDirectory = 'admin.subscriber.';

    protected $subscribersService;

    public function __construct(SubscribersService $subscribersService)
    {
        $this->subscribersService = $subscribersService;
    }

    public function index()
    {
        $loggedInUser = Auth::user();
        if (is_null($loggedInUser) || ! $loggedInUser->can('index-subscriber')) {
            abort(403, 'Unauthorized Access!');
        }
        $data = [
            'subscribers' => $this->subscribersService->allSubscriber(),
        ];

        return view(self::moduleDirectory.'index', $data);
    }
}
