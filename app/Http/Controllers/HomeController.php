<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AttendanceSheet;
use Carbon\Carbon;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $fromDate = Carbon::parse(Carbon::now()->toFormattedDateString())->startOfWeek(Carbon::SUNDAY);
        $toDate = Carbon::parse(Carbon::now()->toFormattedDateString())->endOfWeek(Carbon::THURSDAY);

        // $user = auth()->user();

        $user = Auth::user();
        $UserAttendance = AttendanceSheet::whereBetween('attendance_sheet.created_at', [$fromDate, $toDate])
        ->latest()->take(10)->get();
        return view('home',compact('user', 'UserAttendance'));
    }
}
