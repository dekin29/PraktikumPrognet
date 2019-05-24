<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function tahun()
    {
        $tahun = DB::select('SELECT YEAR(created_at) as tahun, COUNT(id) as jumlah, SUM(total) as total FROM transactions WHERE transactions.`status`="success" GROUP BY YEAR(created_at)');
        // return $tahun;
        return view('admin.report.reportTahunan',compact('tahun'));
    }

    public function bulan()
    {
        $bulan = DB::select('SELECT YEAR(created_at) as tahun, MONTHNAME(created_at) AS bulan, COUNT(id) AS jumlah, SUM(total)AS total FROM transactions WHERE transactions.`status` = "success" GROUP BY MONTH(created_at)');
        return view('admin.report.reportBulanan',compact('bulan'));
    }
}
