<?php

namespace App\Http\Controllers\Metrology\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Metrology\Sit;
use PDF;

class BirkasController extends AdminBaseController
{
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'dateBirka' => 'required',
        ]);

        $sit = Sit::find($id);
        $sit->dateBirka = $request->dateBirka;
        $sit->save();

        Session::push('birkaSitIDs', $id);

        return redirect()->back();
    }

    public function showPDF(Request $request)
    {
        $sit_ids = json_decode($request->sit_id);
        $sits = Sit::find($sit_ids);

        $pdf = PDF::loadView('admin.birkas.pdf', compact('sits'));

        return $pdf->stream();
    }

    public function reset(Request $request)
    {
        session(['birkaSitIDs' => null]);

        return redirect()->back();
    }
}
