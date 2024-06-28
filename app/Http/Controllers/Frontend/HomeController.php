<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\HomeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $homeService;

    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }

    public function home()
    {
        $data = $this->homeService->homeFeed();
        return view('frontend.home', $data);
    }

    public function contact()
    {
        return view('frontend.contact.contact');
    }

    public function search(Request $request)
    {
        $data = $this->homeService->searchJob($request);

        return view('frontend.search', $data);
    }
}
