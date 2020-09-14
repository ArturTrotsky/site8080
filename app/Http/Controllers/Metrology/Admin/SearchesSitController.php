<?php

namespace App\Http\Controllers\Metrology\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Metrology\Brigade;
use App\Models\Metrology\Edizm;
use App\Models\Metrology\Laboratory;
use App\Models\Metrology\Podrazdelenie;
use App\Models\Metrology\Sit;
use App\Models\Metrology\Type;
use App\Models\Metrology\Status;
use App\Models\Metrology\Work;

class SearchesSitController extends AdminBaseController
{
    public function index()
    {
        if (Session::has('birkaSitIDs')) {
            $birkaSitIDs = Session::get('birkaSitIDs');
            $birkaSits = Sit::find($birkaSitIDs);
        } else {
            $birkaSitIDs = null;
            $birkaSits = null;
        }

        $sits = [];
        $search_number_full = null;
        $search_number_part = null;
        $arrIdJson = null;

        $birkaSitIDsJson = json_encode($birkaSitIDs);

        return view('admin.searches.index',
            compact('sits', 'search_number_full', 'search_number_part',
                'arrIdJson', 'birkaSitIDsJson', 'birkaSits'));
    }

    public function search(Request $request)
    {
        if (Session::has('birkaSitIDs')) {
            $birkaSitIDs = Session::get('birkaSitIDs');
            $birkaSits = Sit::whereIn('id', $birkaSitIDs)->get();
        } else {
            $birkaSitIDs = null;
            $birkaSits = null;
        }

        if ($request->get('search_number_full') !== null) {
            $search_number_full = $request->get('search_number_full');
            $search_number_part = null;
            $this->validate($request, [
                'search_number_full' => 'required',
            ]);
            $sits = Sit::with(
                'type.naimen', 'podrazdelenie',
                'type.kabinet', 'type.group', 'edizm',
                'status', 'work', 'brigade', 'laboratory',
                'laboratoryMesto', 'laboratoryObladnannya')
                ->where('number', 'like', $search_number_full)
                ->get();
        } else {
            $search_number_part = $request->get('search_number_part');
            $search_number_full = null;
            $this->validate($request, [
                'search_number_part' => 'required|min:3',
            ]);
            $sits = Sit::with(
                'type.naimen', 'podrazdelenie',
                'type.kabinet', 'type.group', 'edizm',
                'status', 'work', 'brigade', 'laboratory',
                'laboratoryMesto', 'laboratoryObladnannya')
                ->where('number', 'like', '%' . $search_number_part . '%')
                ->get();
        }

        $arrIdJson = json_encode($sits->pluck('id')->all());
        $birkaSitIDsJson = json_encode($birkaSitIDs);

        return view('admin.searches.index',
            compact('sits', 'search_number_full', 'search_number_part', 'arrIdJson', 'birkaSitIDsJson', 'birkaSits'));
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

        return view('admin.searches.edit', compact(
            'sit', 'types', 'podrazdelenies', 'edizms',
            'statuses', 'works', 'brigades', 'laboratories'));
    }

    public function show($id)
    {
        //
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

        $search_number_full = Sit::where('id', $id)->pluck('number')->first();
        $search_number_part = null;

        $sits = Sit::where('number', $search_number_full)->get();

        if (Session::has('birkaSitIDs')) {
            $birkaSitIDs = Session::get('birkaSitIDs');
            $birkaSits = Sit::whereIn('id', $birkaSitIDs)->get();
        } else {
            $birkaSitIDs = null;
            $birkaSits = null;
        }

        $arrIdJson = json_encode($sits->pluck('id')->all());
        $birkaSitIDsJson = json_encode($birkaSitIDs);

        return view('admin.searches.index', compact(
            'sits', 'search_number_full', 'search_number_part', 'arrIdJson', 'birkaSitIDsJson', 'birkaSits'));
    }

    public function destroy($id)
    {
        Sit::find($id)->delete();
        return redirect()->route('searches.index');
    }
}
