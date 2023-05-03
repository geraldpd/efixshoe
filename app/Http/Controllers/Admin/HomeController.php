<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use App\Models\PaymentMethod;
use App\Models\Service;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

        return view('admin.home', compact('bookings', 'services', 'pmethods', 'vouchers'));
    }
}
