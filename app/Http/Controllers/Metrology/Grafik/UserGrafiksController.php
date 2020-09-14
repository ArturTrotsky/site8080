<?php

namespace App\Http\Controllers\Metrology\Grafik;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Metrology\Grafik;
use App\Models\Metrology\Kabinet;
use App\Models\Metrology\Podrazdelenie;
use App\Models\Metrology\Sit;
use App\Models\Metrology\Type;
use PDF;

use App\Http\Controllers\Controller;

class UserGrafiksController extends Controller
{
    public function index()
    {
        if (Session::has('dateFrom')) {
            $dateFrom = Session::get('dateFrom');
            $dateFrom = $dateFrom[0];
        } else {
            $dateFrom = Carbon::now()->format('Y-m-01');
            Session::push('dateFrom', $dateFrom);
        }

        if (Session::has('dateTo')) {
            $dateTo = Session::get('dateTo');
            $dateTo = $dateTo[0];
        } else {
            $dateTo = Carbon::now()->format('Y-m-t');
            Session::push('dateTo', $dateTo);
        }

        $kabinets_id = \Auth::user()->kabinets->pluck('id')->all() ?:
            Kabinet::all()->pluck('id');
        $podrazdelenies_id = \Auth::user()->podrazdelenies->pluck('id')->all() ?:
            Podrazdelenie::all()->pluck('id');

        $sitFilterIds = Sit::whereIn('type_id', Type::whereIn('kabinet_id', $kabinets_id)->get('id'))
            ->whereIn('podrazdelenie_id', $podrazdelenies_id)
            ->pluck('id')->all();

        if (Session::has('grafikIds')) {
            $grafikIds = Session::get('grafikIds');
            $grafikIds = $grafikIds[0];
            $grafikItems = Grafik::whereIn('id', $grafikIds)
                ->orderBy('datePlanWork', 'ASC')
                ->get();
        } else {
            $grafikItems = Grafik::whereBetween('datePlanWork', [$dateFrom, $dateTo])
                ->whereIn('sit_id', $sitFilterIds)
                ->where('work_id', '=', 1)
                ->where('status_id', '=', 1)
                ->orderBy('datePlanWork', 'ASC')
                ->get();
        }

        $grafikIdJson = json_encode($grafikItems->pluck('id')->all());

        return view('grafiks.user',
            compact('grafikItems', 'grafikIdJson',
                'dateFrom', 'dateTo'));
    }


    public function store(Request $request)
    {
        if (!$request->dateFilter) {
            $dateFrom = Session::get('dateFrom');
            $dateFrom = $dateFrom[0];
            $dateTo = Session::get('dateTo');
            $dateTo = $dateTo[0];
        } else {
            $dateFilter = explode(" - ", $request->dateFilter);
            $dateFrom = $dateFilter[0];
            $dateTo = $dateFilter[1];
            session(['dateFrom' => null, 'dateTo' => null]);
            Session::push('dateFrom', $dateFrom);
            Session::push('dateTo', $dateTo);
        }

        $kabinets_id = \Auth::user()->kabinets->pluck('id')->all() ?:
            Kabinet::all()->pluck('id');
        $podrazdelenies_id = \Auth::user()->podrazdelenies->pluck('id')->all() ?:
            Podrazdelenie::all()->pluck('id');

        $sitFilterIds = Sit::whereIn('type_id', Type::whereIn('kabinet_id', $kabinets_id)->get('id'))
            ->whereIn('podrazdelenie_id', $podrazdelenies_id)
            ->pluck('id')->all();

        $grafikItems = Grafik::whereBetween('datePlanWork', [$dateFrom, $dateTo])
            ->whereIn('sit_id', $sitFilterIds)
            ->where('work_id', '=', 1)
            ->where('status_id', '=', 1)
            ->orderBy('datePlanWork', 'ASC')
            ->get();

        $grafikIds = $grafikItems->pluck('id')->toArray();
        session(['grafikIds' => null]);
        Session::push('grafikIds', $grafikIds);

        $grafikIdJson = json_encode($grafikItems->pluck('id')->all());

        return view('grafiks.user',
            compact('grafikItems', 'grafikIdJson',
                'dateFrom', 'dateTo'));
    }


    public function reset($value)
    {
        session(['dateFrom' => null, 'dateTo' => null]);

        $dateFrom = Carbon::now()->format('Y-m-01');
        Session::push('dateFrom', $dateFrom);

        $dateTo = Carbon::now()->format('Y-m-t');
        Session::push('dateTo', $dateTo);

        return redirect()->route('user.poverka.index');
    }


    public function showPDF(Request $request)
    {
        $grafikIds = json_decode($request->id);

        $grafikItems = Grafik::whereIn('id', $grafikIds)->get()->sortBy('datePlanWork');

        foreach ($grafikItems as $item) {
            $grafiks[$item->laboratory->id][$item->sit->podrazdelenie->id][] = $item;
        }

        $pdf = PDF::loadView('grafiks.pdf',
            ['grafiks' => $grafiks,
                'dateFrom' => $request->dateFrom,
                'dateTo' => $request->dateTo,
            ])->setPaper('a4', 'landscape');

        return $pdf->stream();
    }
}
