<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Report\GenerateRequest;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;
use Laravel\Ui\Presets\React;

class ReportController extends Controller
{

    private $grouped_statuses;

    private $reports;

    /**
     * Instantiate a new ReportController instance.
     */
    public function __construct()
    {
        $this->grouped_statuses = [
            'DONE' => [
                Booking::COMPLETED
            ],
            'ACTIVE' => [
                Booking::PENDING,
                Booking::PROCESSING,
                Booking::AWAITING_PAYMENT,
                Booking::FOR_PICKUP,
                Booking::FOR_DELIVERY,
                Booking::FOR_CASH_ON_DELIVERY,
            ],
            'FAILED' => [
                Booking::DECLINED,
               //? Booking::CANCELLED,
            ]
        ];

        $this->reports = [
            'bookings' => 'Bookings',
            'customers' => 'Customers',
            'vouchers' => 'Vouchers'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grouped_statuses = $this->grouped_statuses;
        $reports = $this->reports;

        return view('admin.reports.index', compact('grouped_statuses', 'reports'));
    }

    public function generate(GenerateRequest $request)
    {
        switch ($request->report) {
            case 'bookings':
                $result = $this->bookingReport($request);
                break;

            case 'customers':
                $result = $this->customerReport($request);
                break;

            case 'vouchers':
                return redirect()->back()->with('message', 'Vouchers report comming soon!');
                break;
        }

        return view("admin.reports.result-$request->report", compact('result'));
    }

    private function bookingReport(Request $request)
    {
        $result = Booking::query()
                    ->when($request->status != 'ALL', function($query) {
                        $query->whereStatus(request()->status);
                    })
                    ->where(function($query) {
                        switch (request()->date_range) {
                            case 'today':
                                $query
                                ->whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()]);
                            break;

                            case 'week':
                                $query
                                ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfDay()]);
                            break;

                            case 'month':
                                $query
                                ->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfDay()]);
                            break;

                            case 'year':
                                $query
                                ->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfDay()]);
                            break;

                            default:
                                $from = Carbon::parse(request()->custom_date_range_from);
                                $to = Carbon::parse(request()->custom_date_range_to);

                                $query
                                ->whereBetween('created_at', [$from->startOfDay(), $to->endOfDay()]);
                            break;
                        }
                    })
                    ->get();

        return $result;
    }

    private function customerReport(Request $request)
    {
        return User::query()
        ->whereHas(
            'roles', function($q){
                $q->where('name', 'customer');
            }
        )
        ->orderBy('created_at', 'desc')
        ->get();
    }

    private function voucherReport(Request $request)
    {
        //code
    }

}
