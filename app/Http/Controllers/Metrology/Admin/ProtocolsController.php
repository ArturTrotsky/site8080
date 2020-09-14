<?php

namespace App\Http\Controllers\Metrology\Admin;

use Illuminate\Http\Request;
use App\Models\Metrology\Grafik;
use App\Models\Metrology\Laboratory;
use App\Models\Metrology\Protocol;
use App\Models\Metrology\Sit;
use App\Models\Metrology\User;
use App\Models\Metrology\Work;
use PDF;

class ProtocolsController extends AdminBaseController
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('status.moderator.admin');
    }

    public function index()
    {
        dd('index');
    }

    public function create(Request $request)
    {
        $grafik = Grafik::find($request['grafik_id']);
        $sits = Sit::with('type', 'edizm', 'work')->get();
        $works = Work::select('id', 'name')->get();
        $laboratories = Laboratory::select('id', 'name')->get();
        $users = User::select('id', 'name')->get();
        $sit = Sit::find($request['sit_id']);

        return view('protocols.create', compact('sit', 'sits', 'works', 'laboratories', 'grafik', 'users'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'temperature' => 'required',
            'davlenie' => 'required',
            'valazhnost' => 'required',
            'sit_id' => 'required',
            'grafik_id' => 'required',
            'work_id' => 'required',
            'laboratory_id' => 'required',
            'user_id' => 'required',
        ]);
        $protocol = Protocol::create($request->all());

        $grafik = Grafik::find($request['grafik_id']);
        $grafik->setProtocol($protocol->id);

        $etalons = Sit::find([$request->etalon1_id, $request->etalon2_id, $request->etalon3_id]);

        return view('protocols.preview', compact('protocol', 'etalons', 'grafik'));
    }

    public function show($id)
    {
        $protocol = Protocol::find($id);
        $pdf = PDF::loadView('protocols.pdf', compact('protocol'));

        return $pdf->stream();
    }

    public function edit($id)
    {
        $protocol = Protocol::find($id);
        $sits = Sit::with('type', 'edizm', 'work')->get();
        $works = Work::select('id', 'name')->get();
        $laboratories = Laboratory::select('id', 'name')->get();
        $users = User::select('id', 'name')->get();

        return view('protocols.edit', compact('protocol', 'sits', 'works', 'laboratories', 'users'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'date' => 'required',
            'temperature' => 'required',
            'davlenie' => 'required',
            'valazhnost' => 'required',
            'sit_id' => 'required',
            'work_id' => 'required',
        ]);

        $protocol = Protocol::find($id);
        $protocol->update($request->all());
        $etalons = Sit::find([$request->etalon1_id, $request->etalon2_id, $request->etalon3_id]);

        return view('protocols.preview', compact('protocol', 'etalons'));
    }

    public function saveToDB($id)
    {
        if (\Auth::user()->isAdministrator())
            return redirect()->route('admin.poverka.index');
        else return redirect()->route('moderator.poverka.index');
    }

    public function destroy($id)
    {
        Protocol::find($id)->delete();

        $grafik = Grafik::where('protocol_id', $id)->first();
        $grafik->delProtocol();

        return redirect()->back();
    }
}
