<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Report\GenerateRequest;
use Illuminate\Http\Request;
use App\Models\Booking;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookingStatuses = Booking::statuses();

        return view('admin.reports.index', compact('bookingStatuses'));
    }

    public function generate(GenerateRequest $request)
    {
        $dateRange = $request->date_range;

        $result = Booking::query()
                        ->whereStatus($request->status)
                        ->where(function($query) use ($dateRange) {

                            switch (true) {
                                case 'week':
                                break;

                                case 'range':
                                break;

                                case 'year':
                                break;

                                case 'custom':
                                break;

                                default: //* today
                                    $query
                                    ->whereBetween('updated_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()]);
                                break;
                            }
                        })
                        ->get();

        return $result;
    }
}
