<table id="table" class="table table-hover table-sm table-bordered">
    <thead>
    <tr>
        <th>{{DATEPLANWORK}}</th>
        <th>{{DATEFACTWORK}}</th>
        <th>{{NAME}}</th>
        <th>{{TYPE}}</th>
        <th>{{NUMBER}}</th>
        <th>{{PODRAZDELENIE}}</th>
        <th>{{DIAPAZON}}</th>
        <th>{{POHIBKA}}</th>
        <th>{{PERIODMETROLOGY}}</th>
        <th>{{LABORATORY}}</th>
        <th>{{LABORATORYMESTO}}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($grafikItems as $item)
        <tr>
            <td>
                <div class="btn-group">
                    <button form="datePlanWork"
                            title="Строк виконання"
                            class="btn btn-default btn-sm"
                            data-toggle="dropdown"
                            border="none"
                            style="background-color: {{$item->setColor()}}; width: 100px">
                        {{$item->datePlanWork}}
                    </button>
                </div>
            </td>
            <td>
                <div class="btn-group">
                    <button form="dateFactWork"
                            title="Дата виконання"
                            class="btn btn-default btn-sm"
                            data-toggle="dropdown"
                            border="none"
                            style="width: 100px">
                        {{$item->dateFactWork ?? 'Відсутня'}}
                    </button>
                </div>
            </td>
            <td>{{$item->sit->type->naimen->name}}</td>
            <td>{{$item->sit->type->name}}</td>
            <td>{{$item->sit->number}}</td>
            <td>{{$item->sit->podrazdelenie->name}}</td>
            <td>{{$item->sit->diapazon}} {{$item->sit->edizm->name}}</td>
            <td>{{$item->sit->pohibka}}</td>
            <td>{{$item->sit->periodMetrology}}</td>
            <td>{{$item->laboratory->name}}</td>
            <td>{{$item->laboratoryMesto->name}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
