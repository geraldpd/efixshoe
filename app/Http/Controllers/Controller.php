<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function services()
    {
        $services = Service::all();

        return view('frontend.services', compact('services'));
    }

    public function faqs()
    {
        $max_turnaround_time = Service::max('turnaround_time');

        return view('frontend.faqs', compact('max_turnaround_time'));
    }
}
