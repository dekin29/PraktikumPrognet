<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminNotif;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $notif = AdminNotif::where('read_at',NULL)->get();
        return view('admin.admin',compact('notif'));
    }

    public function tahun()
    {
        $tahun = DB::select('SELECT YEAR(created_at) as tahun, COUNT(id) as jumlah, SUM(total) as total FROM transactions WHERE transactions.`status`="success" GROUP BY YEAR(created_at)');
        // return $tahun;
        return view('admin.report.reportTahunan',compact('tahun'));
    }

    public function bulan()
    {
        $bulan = DB::select('SELECT YEAR(created_at) as tahun, MONTHNAME(created_at) AS bulan, COUNT(id) AS jumlah, SUM(total)AS total FROM transactions WHERE transactions.`status` = "success" GROUP BY MONTH(created_at)');
        return view('admin.report.reportBulan',compact('bulan'));
    }
}
