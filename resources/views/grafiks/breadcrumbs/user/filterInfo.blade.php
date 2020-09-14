<div class="col-md-5">
    <div class="form-group">
        <h6><b>ЗАСТОСОВАНІ ФІЛЬТРИ:</b></h6>
        <h6>{{DATEPLANWORK}}:&nbsp;
            <b>{{$dateFrom}} - {{$dateTo}}</b></h6>
        <h6>{{PODRAZDELENIE}}:&nbsp;
            <b>{{\Auth::user()->getPodrazdeleniesNames()}}</b>
        </h6>
    </div>
</div>
