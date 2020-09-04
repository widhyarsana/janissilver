<?php

namespace App\Http\Controllers\Report;

use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Production;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class ProductionReportController extends Controller
{
    public function index()
    {

        
        $productions = Production::get();

        return view('report.production.index', compact('productions'));
    }

    public function store()
    {

        $start = request()->start;
        $end = request()->end;

        if ($start != null && $end != null) {
            $productions = Production::where('created_at', '>=', $start)->where('created_at', '<=', $end)->get();
        } else if ($start != null && $end == null) {
            $productions = Production::where('created_at', '>=', $start)->get();
        } else if ($start == null && $end != null) {
            $productions = Production::where('created_at', '<=', $end)->get();
        } else if ($start == null && $end == null) {
            $productions = Production::get();
        }

        if (request()->cetak) {
            $pdf = PDF::loadview('report.production.print', ['productions' => $productions]);
            return $pdf->download('laporan.produksi.pdf');
        } else {
            $message = 'Pencarian Berhasil';
            $rs['message'] = View::make('customer.cart.message')
                ->with('message', $message)
                ->render();
            $rs['content'] = View::make('report.production.content')
                ->with('productions', $productions)
                ->render();

            return response($rs);
        }
    }
}
