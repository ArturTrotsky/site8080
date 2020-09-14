<?php

namespace App\Http\Controllers\Metrology\Admin;

use Illuminate\Http\Request;
use App\Models\Metrology\Brigade;
use App\Models\Metrology\Edizm;
use App\Models\Metrology\Laboratory;
use App\Models\Metrology\Podrazdelenie;
use App\Models\Metrology\Sit;
use App\Models\Metrology\Type;
use App\Models\Metrology\Status;
use App\Models\Metrology\Work;
use PDF;

class SitsController extends AdminBaseController
{
    public function index()
    {
        $sits = Sit::with(
            'type.naimen', 'podrazdelenie',
            'type.kabinet', 'type.group', 'edizm',
            'status', 'work', 'brigade', 'laboratory',
            'laboratoryMesto', 'laboratoryObladnannya')
            ->orderBy('id', 'DESC')
            ->paginate(500);

        return view('admin.sits.index', compact('sits'));
    }

    public function create()
    {
        $types = Type::get(['id', 'name']);
        $podrazdelenies = Podrazdelenie::get(['id', 'name']);
        $edizms = Edizm::get(['id', 'name']);
        $statuses = Status::get(['id', 'name']);
        $works = Work::get(['id', 'name']);
        $brigades = Brigade::get(['id', 'name']);
        $laboratories = Laboratory::get(['id', 'name']);

        return view('admin.sits.create',
            compact('types', 'podrazdelenies', 'edizms', 'statuses',
                'works', 'brigades', 'laboratories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [ //https://laravel.com/docs/5.8/validation#available-validation-rules
            'type_id' => 'required',
            'number' => 'required',
            'pohibka' => 'required',
            'podrazdelenie_id' => 'required',
            'brigade_id' => 'required',
            'status_id' => 'required',
            'diapazon' => 'required',
            'edizm_id' => 'required',
            'minShkaly' => 'required',
            'maxShkaly' => 'required',
            'work_id' => 'required',
            'periodMetrology' => 'required',
            'laboratory_id' => 'required',
            'laboratoryObladnannya_id' => 'required',
            'laboratoryMesto_id' => 'required',
            'dateLastWork' => 'required',
        ]);

        $sit = Sit::create($request->all());
        $sit->addDateNextWork();

        return redirect()->route('sits.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $sit = Sit::find($id);
        $types = Type::get(['id', 'name']);
        $podrazdelenies = Podrazdelenie::get(['id', 'name']);
        $edizms = Edizm::get(['id', 'name']);
        $statuses = Status::get(['id', 'name']);
        $works = Work::get(['id', 'name']);
        $brigades = Brigade::get(['id', 'name']);
        $laboratories = Laboratory::get(['id', 'name']);

        return view('admin.sits.edit', compact(
            'sit', 'types', 'podrazdelenies', 'edizms',
            'statuses', 'works', 'brigades', 'laboratories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [ //https://laravel.com/docs/5.8/validation#available-validation-rules
            'type_id' => 'required',
            'number' => 'required',
            'pohibka' => 'required',
            'podrazdelenie_id' => 'required',
            'brigade_id' => 'required',
            'status_id' => 'required',
            'diapazon' => 'required',
            'edizm_id' => 'required',
            'minShkaly' => 'required',
            'maxShkaly' => 'required',
            'work_id' => 'required',
            'periodMetrology' => 'required',
            'laboratory_id' => 'required',
            'laboratoryObladnannya_id' => 'required',
            'laboratoryMesto_id' => 'required',
            'dateLastWork' => 'required',
        ]);

        $sit = Sit::find($id);
        $sit->update($request->all());
        $sit->addDateNextWork();

        $grafikItem = $sit->grafik()->get()->last();
        $grafikItem->work_id = $sit->work_id;
        $grafikItem->status_id = $sit->status_id;
        $grafikItem->laboratory_id = $sit->laboratory_id;
        $grafikItem->laboratoryMesto_id = $sit->laboratoryMesto_id;
        $grafikItem->datePlanWork = $sit->dateNextWork;
        $grafikItem->save();

        return redirect()->route('sits.index');
    }

    public function destroy($id)
    {
        Sit::find($id)->delete();
        return redirect()->route('sits.index');
    }

    public function showPDF($id)
    {
        $sit = Sit::find($id);
        $pdf = PDF::loadView('admin.sits.pdf', compact('sit'));
        return $pdf->stream();
    }

    public function downloadPDF($id)
    {
        $sit = Sit::find($id);
        $pdf = PDF::loadView('admin.sits.pdf', compact('sit'));
        return $pdf->download("sit$id.pdf");
    }
}
