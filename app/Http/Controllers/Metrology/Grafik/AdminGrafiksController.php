<?php

namespace App\Http\Controllers\Metrology\Grafik;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Metrology\Brigade;
use App\Models\Metrology\Grafik;
use App\Models\Metrology\Kabinet;
use App\Models\Metrology\Laboratory;
use App\Models\Metrology\Podrazdelenie;
use App\Models\Metrology\Sit;
use App\Models\Metrology\Type;
use PDF;

use App\Http\Controllers\Metrology\Controller;

class AdminGrafiksController extends Controller
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


        /* початок кабінети */
        if (Session::has('kabinet')) {
            if (!in_array('-1', Session::get('kabinet'))) {
                $kabinets_id = Session::get('kabinet');
                $kabinet = Kabinet::whereIn('id', $kabinets_id)->first();
            } else {
                $kabinets_id = Kabinet::pluck('id')->all();
                $kabinet = -1;
            }
        } else {
            $kabinets_id = Kabinet::pluck('id')->all();
            $kabinet = -1;
            Session::push('kabinet', $kabinet);
        }
        $kabinets = Kabinet::all();
        /* кiнець кабінети */


        /* початок підрозділи */
        if (Session::has('podrazdelenie')) {
            if (!in_array('-1', Session::get('podrazdelenie'))) {
                $podrazdelenies_id = Session::get('podrazdelenie');
                $podrazdelenie = Podrazdelenie::whereIn('id', $podrazdelenies_id)->first();
            } else {
                $podrazdelenies_id = Podrazdelenie::pluck('id')->all();
                $podrazdelenie = -1;
            }
        } else {
            $podrazdelenies_id = Podrazdelenie::pluck('id')->all();
            $podrazdelenie = -1;
            Session::push('podrazdelenie', $podrazdelenie);
        }
        $podrazdelenies = Podrazdelenie::all();
        /* кiнець підрозділи */


        /* початок бригади */
        if (Session::has('brigade')) {
            if (!in_array('-1', Session::get('brigade'))) {
                $brigades_id = Session::get('brigade');
                $brigade = Brigade::whereIn('id', $brigades_id)->first();
            } else {
                $brigades_id = Brigade::pluck('id')->all();
                $brigade = -1;
            }
        } else {
            $brigades_id = Brigade::pluck('id')->all();
            $brigade = -1;
            Session::push('brigade', $brigade);
        }
        $brigades = Brigade::all();
        /* кiнець бригади */


        /* початок лабораторії */
        if (Session::has('laboratory')) {
            if (!in_array('-1', Session::get('laboratory'))) {
                $laboratories_id = Session::get('laboratory');
                $laboratory = Laboratory::whereIn('id', $laboratories_id)->first();
            } else {
                $laboratories_id = Laboratory::pluck('id')->all();
                $laboratory = -1;
            }
        } else {
            $laboratories_id = Laboratory::pluck('id')->all();
            $laboratory = -1;
            Session::push('laboratory', $laboratory);
        }
        $laboratories = Laboratory::all();
        /* кiнець лабораторії */


        $sitFilterIds = Sit::whereIn('type_id', Type::whereIn('kabinet_id', $kabinets_id)->get('id'))
            ->whereIn('podrazdelenie_id', $podrazdelenies_id)
            ->whereIn('laboratory_id', $laboratories_id)
            ->whereIn('brigade_id', $brigades_id)
            ->pluck('id')->all();


        if (Session::has('grafikIds')) {
            $grafikIds = Session::get('grafikIds');
            $grafikIds = $grafikIds[0];
            $grafikItems = Grafik::whereIn('id', $grafikIds)
                ->orderBy('datePlanWork', 'ASC');
        } else {
            $grafikItems = Grafik::whereBetween('datePlanWork', [$dateFrom, $dateTo])
                ->whereIn('sit_id', $sitFilterIds)
                ->where('work_id', '=', 1)
                ->where('status_id', '=', 1)
                ->orderBy('datePlanWork', 'ASC');
        }

        $grafikIdJson = json_encode($grafikItems->pluck('id')->all());
        $grafikItems = $grafikItems->paginate(15);
        /*TODO: Status????*/

        return view('grafiks.admin',
            compact('grafikItems', 'grafikIdJson',
                'dateFrom', 'dateTo',
                'kabinet', 'kabinets',
                'podrazdelenie', 'podrazdelenies',
                'laboratory', 'laboratories',
                'brigade', 'brigades'));
    }


    public function filter(Request $request)
    {
        /* початок кабінети */
        if (!$request->kabinet) {
            if (!in_array('-1', Session::get('kabinet'))) {
                $kabinets_id = Session::get('kabinet');
                $kabinet = Kabinet::whereIn('id', $kabinets_id)->first();
            } else {
                $kabinets_id = Kabinet::pluck('id')->all();
                $kabinet = -1;
            }
        } elseif ($request->kabinet == -1) {
            $kabinets_id = Kabinet::pluck('id')->all();
            $kabinet = -1;
        } else {
            $kabinets_id = Kabinet::where('id', $request->kabinet)->pluck('id')->all();
            $kabinet = Kabinet::whereIn('id', $kabinets_id)->first();
            session(['kabinet' => null]);
            Session::push('kabinet', $request->kabinet);
        }
        $kabinets = Kabinet::all();
        /* кiнець кабінети */


        /* початок підрозділи */
        if (!$request->podrazdelenie) {
            if (!in_array('-1', Session::get('podrazdelenie'))) {
                $podrazdelenies_id = Session::get('podrazdelenie');
                $podrazdelenie = Podrazdelenie::whereIn('id', $podrazdelenies_id)->first();
            } else {
                $podrazdelenies_id = Podrazdelenie::pluck('id')->all();
                $podrazdelenie = -1;
            }
        } elseif ($request->podrazdelenie == -1) {
            $podrazdelenies_id = Podrazdelenie::pluck('id')->all();
            $podrazdelenie = -1;
        } else {
            $podrazdelenies_id = Podrazdelenie::where('id', $request->podrazdelenie)->pluck('id')->all();
            $podrazdelenie = Podrazdelenie::whereIn('id', $podrazdelenies_id)->first();
            session(['podrazdelenie' => null]);
            Session::push('podrazdelenie', $request->podrazdelenie);
        }
        $podrazdelenies = Podrazdelenie::all();
        /* кiнець підрозділи */


        /* початок бригади */
        if (!$request->brigade) {
            if (!in_array('-1', Session::get('brigade'))) {
                $brigades_id = Session::get('brigade');
                $brigade = Brigade::whereIn('id', $brigades_id)->first();
            } else {
                $brigades_id = Brigade::pluck('id')->all();
                $brigade = -1;
            }
        } elseif ($request->brigade == -1) {
            $brigades_id = Brigade::pluck('id')->all();
            $brigade = -1;
        } else {
            $brigades_id = Brigade::where('id', $request->brigade)->pluck('id')->all();
            $brigade = Brigade::whereIn('id', $brigades_id)->first();
            session(['brigade' => null]);
            Session::push('brigade', $request->brigade);
        }
        $brigades = Brigade::all();
        /* кiнець бригади */


        /* початок лабораторії */
        if (!$request->laboratory) {
            if (!in_array('-1', Session::get('laboratory'))) {
                $laboratories_id = Session::get('laboratory');
                $laboratory = Laboratory::whereIn('id', $laboratories_id)->first();
            } else {
                $laboratories_id = Laboratory::pluck('id')->all();
                $laboratory = -1;
            }
        } elseif ($request->laboratory == -1) {
            $laboratories_id = Laboratory::pluck('id')->all();
            $laboratory = -1;
        } else {
            $laboratories_id = Laboratory::where('id', $request->laboratory)->pluck('id')->all();
            $laboratory = Laboratory::whereIn('id', $laboratories_id)->first();
            session(['laboratory' => null]);
            Session::push('laboratory', $request->laboratory);
        }
        $laboratories = Laboratory::all();
        /* кiнець лабораторії */


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

        $sitFilterIds = Sit::whereIn('type_id', Type::whereIn('kabinet_id', $kabinets_id)->get('id'))
            ->whereIn('podrazdelenie_id', $podrazdelenies_id)
            ->whereIn('laboratory_id', $laboratories_id)
            ->whereIn('brigade_id', $brigades_id)
            ->pluck('id')->all();

        $grafikItems = Grafik::whereBetween('datePlanWork', [$dateFrom, $dateTo])
            ->whereIn('sit_id', $sitFilterIds)
            ->where('work_id', '=', 1)
            ->where('status_id', '=', 1)
            ->orderBy('datePlanWork', 'ASC');

        $grafikIdJson = json_encode($grafikItems->pluck('id')->all());
        $grafikIds = $grafikItems->pluck('id')->toArray();

        session(['grafikIds' => null]);
        Session::push('grafikIds', $grafikIds);

        $grafikItems = $grafikItems->paginate(15);

        return view('grafiks.admin',
            compact('grafikItems', 'grafikIdJson',
                'dateFrom', 'dateTo',
                'kabinet', 'kabinets',
                'podrazdelenie', 'podrazdelenies',
                'brigade', 'brigades',
                'laboratory', 'laboratories'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'dateFactWork' => 'required',
            'id' => 'required',
        ]);

        $grafik = Grafik::find($request->id);
        $grafik->setFields($request->all());

        $sit = $grafik->sit;
        $period = $sit->periodMetrology;
        $newDatePlanWork = Carbon::parse($request->dateFactWork)->addMonth($period);

        $grafikNext = Grafik::create([
            'sit_id' => $sit->id,
            'work_id' => $sit->work_id,
            'status_id' => $sit->status_id,
            'datePlanWork' => $newDatePlanWork,
            'laboratory_id' => $sit->laboratory_id,
            'laboratoryMesto_id' => $sit->laboratoryMesto_id
        ]);

        $grafik->next_id = $grafikNext->id;
        $grafik->save();

        $sit->dateLastWork = $request->dateFactWork;
        $sit->dateNextWork = $newDatePlanWork;
        $sit->save();

        return redirect()->route('admin.poverka.index');
    }


    public function update(Request $request, $id)
    {
        if (isset($request->datePlanWork) != array_key_exists('datePlanWork', $request->all())) {
            return redirect()->route('admin.poverka.index');
        }
        if (isset($request->dateFactWork) != array_key_exists('dateFactWork', $request->all())) {
            return redirect()->route('admin.poverka.index');
        }

        $grafik = Grafik::find($id);
        $grafik->update($request->all());

        if ($request->dateFactWork) {
            $sit = $grafik->sit;
            $period = $sit->periodMetrology;
            $newDatePlanWork = Carbon::parse($request->dateFactWork)->addMonth($period);
            $grafikNext = Grafik::where('id', $grafik->next_id)->first();

            $grafikNext->datePlanWork = $newDatePlanWork;
            $grafikNext->save();

            $sit->dateLastWork = $request->dateFactWork;
            $sit->dateNextWork = $newDatePlanWork;
            $sit->save();
        }

        return redirect()->route('admin.poverka.index');
    }


    public function reset($value)
    {
        session(['dateFrom' => null, 'dateTo' => null,
            'kabinet' => [-1], 'podrazdelenie' => [-1], 'brigade' => [-1], 'laboratory' => [-1],
            'grafikIds' => null]);

        $dateFrom = Carbon::now()->format('Y-m-01');
        Session::push('dateFrom', $dateFrom);

        $dateTo = Carbon::now()->format('Y-m-t');
        Session::push('dateTo', $dateTo);

        return redirect()->route('admin.poverka.index');
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
