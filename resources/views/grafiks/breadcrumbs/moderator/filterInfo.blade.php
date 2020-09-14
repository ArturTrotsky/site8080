<div class="col-md-5">
    <div class="form-group">
        <h6><b>ЗАСТОСОВАНІ ФІЛЬТРИ:</b>&nbsp;&nbsp;{{DATEPLANWORK}}
            :&nbsp;&nbsp;<b>{{$dateFrom}}
                - {{$dateTo}}</b></h6>
        <h6>{{PODRAZDELENIE}}:&nbsp;
            <b>{{\Auth::user()->getPodrazdeleniesNames()}}</b>
            &nbsp;&nbsp;&nbsp;{{KABINET}}:&nbsp;
            <b>{{\Auth::user()->getKabinetsNames()}}</b>
        </h6>
        <h6>{{LABORATORY}}:&nbsp;
            <b>Всі</b>
            &nbsp;&nbsp;&nbsp;{{BRIGADE}}:&nbsp;
            <b>Всі</b>
        </h6>
    </div>
</div>
