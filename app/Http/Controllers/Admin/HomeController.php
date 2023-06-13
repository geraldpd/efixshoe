<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use App\Models\PaymentDetail;
use App\Models\PaymentMethod;
use App\Models\Service;
use App\Models\User;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bookings = Booking::whereDate('created_at', Carbon::today())->count();
        $services = Service::count();
        $pmethods = PaymentMethod::count();
        $vouchers = Voucher::count();

        $date = \Carbon\Carbon::today()->subDays(30);
        $bookingsPerDay = Booking::select(DB::raw("COUNT(*) as count"), DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as date_created'))
            ->where('created_at', '>=', $date)
            ->groupBy('date_created')
            ->pluck('count', 'date_created');
 
        $bookings_lbl = $bookingsPerDay->keys();
        $bookings_val = $bookingsPerDay->values();

        $salesPerDay = PaymentDetail::select(DB::raw("COUNT(*) as count"), DB::raw("SUM((total_cost-discount)/100) as total_sales"), DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as date_created'))
            ->where('created_at', '>=', $date)
            ->groupBy('date_created')
            ->pluck('total_sales', 'date_created');
 
        $sales_lbl = $salesPerDay->keys();
        $sales_val = $salesPerDay->values();

        return view('admin.home', compact('bookings', 'services', 'pmethods', 'vouchers', 'bookings_lbl', 'bookings_val', 'sales_lbl', 'sales_val'));
    }
}
