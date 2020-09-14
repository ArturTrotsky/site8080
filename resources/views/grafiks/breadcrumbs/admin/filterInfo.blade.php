<div class="col-md-5">
    <div class="form-group">
        <h6><b>ЗАСТОСОВАНІ ФІЛЬТРИ:</b>&nbsp;&nbsp;{{DATEPLANWORK}}
            :&nbsp;&nbsp;<b>{{$dateFrom}}
                - {{$dateTo}}</b></h6>
        <h6>{{PODRAZDELENIE}}:&nbsp;
            @if(isset($podrazdelenie->id))<b>{{$podrazdelenie->name}}</b>
            @else <b>Всі</b>
            @endif
            &nbsp;&nbsp;&nbsp;{{KABINET}}:&nbsp;
            @if(isset($kabinet->id))<b>{{$kabinet->name}}</b>
            @else <b>Всі</b>
            @endif</h6>
        <h6>{{LABORATORY}}:&nbsp;
            @if(isset($laboratory->id))<b>{{$laboratory->name}}</b>
            @else <b>Всі</b>
            @endif
            &nbsp;&nbsp;&nbsp;{{BRIGADE}}:&nbsp;
            @if(isset($brigade->id))<b>{{$brigade->name}}</b>
            @else <b>Всі</b>
            @endif</h6>
    </div>
</div>
