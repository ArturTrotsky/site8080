<table id="table" height="150px" class="table table-hover table-sm table-bordered">
    <thead>
    <tr>
        <th>{{DIYA}}</th>
        <th>{{DATEPLANWORK}}</th>
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
                {{--Кнопка Приймання ЗВТ--}}
                <div class="btn-group">
                    <button form="dateInbox"
                            title="Дата приймання ЗВТ"
                            class="btn btn-default btn-sm"
                            data-toggle="dropdown"
                            border="none"
                            style="width: 130px">
                        <img src="\img\buttons\inbox.png" width="20">
                        @if($item->dateInbox) {{$item->dateInbox}}
                        @else відсутня
                        @endif
                        <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu" style="width:300px">
                        {{Form::open(['route'=>['moderator.poverka.update', $item->id], 'method'=>'put'])}}
                        <div class="input-group">
                            <input type="text"
                                   class="form-control pull-right"
                                   id="dateInboxCreate{{$item->id}}"
                                   name="dateInbox"
                                   value=""
                                   placeholder="Дата приймання ЗВТ">
                            <span class="input-group-prepend">
                                                    <button type="submit" value="dateInbox" name="button-name"
                                                            class="btn btn-primary">OK</button>
                                                    </span>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
                {{--Кінець кнопка Приймання ЗВТ--}}

                {{--Кнопка Видача ЗВТ--}}
                <div class="btn-group">
                    <button form="dateOutbox"
                            title="Дата видачі ЗВТ"
                            class="btn btn-default btn-sm"
                            data-toggle="dropdown"
                            border="none"
                            style="width: 130px">
                        <img src="\img\buttons\outbox.png" width="20">
                        @if($item->dateOutbox) {{$item->dateOutbox}}
                        @else відсутня
                        @endif
                        <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu" style="width:300px">
                        {{Form::open(['route'=>['moderator.poverka.update', $item->id], 'method'=>'put'])}}
                        <div class="input-group">
                            <input type="text"
                                   class="form-control pull-right"
                                   id="dateOutboxCreate{{$item->id}}"
                                   name="dateOutbox"
                                   value=""
                                   placeholder="Дата видачі ЗВТ">
                            <span class="input-group-prepend">
                                                    <button type="submit" value="dateOutbox" name="button-name"
                                                            class="btn btn-primary">OK</button>
                                                    </span>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
                {{--Кінець кнопка Видача ЗВТ--}}

                {{--Кнопка Протокол--}}
                <div class="btn-group">
                    <button title="Протокол ЗВТ"
                            class="btn btn-default btn-sm dropdown-toggle"
                            type="submit"
                            data-toggle="dropdown"
                            style="width: 130px">
                        <img src="\img\buttons\protocol.png" width="20">
                        @if($item->protocol) {{$item->protocol->date}}
                        @else відсутній
                        @endif
                    </button>
                    <div class="dropdown-menu" style="background-color: #dee2e6">
                        <h6 class="dropdown-header">ПРОТОКОЛ</h6>
                        <div class="dropdown-divider"></div>
                        @if(!$item->protocol)
                            <a class="dropdown-item"
                               href="{{route('protocols.create', ['sit_id'=>$item->sit->id, 'grafik_id'=>$item->id])}}">Створити
                                новий</a>
                        @else
                            <a class="dropdown-item"
                               href="{{route('protocols.show', $item->protocol->id)}}">Відкрити</a>
                            <a class="dropdown-item"
                               href="{{route('protocols.edit', $item->protocol->id)}}">Редагувати</a>
                            <a class="dropdown-item" href="#">
                                {{Form::open(['route'=>['protocols.destroy', $item->protocol->id], 'method'=>'delete'])}}
                                <button class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Ви впевнені?')"
                                        type="submit"
                                        class="delete">
                                    <i>Видалити</i>
                                </button>
                                {{Form::close()}}
                            </a>
                        @endif
                    </div>
                </div>
                {{--Кінець кнопка Протокол--}}

                {{--Кнопка Бирка--}}
                <div class="btn-group">
                    <button form="dateBirka"
                            title="Дата на бирці"
                            class="btn btn-default btn-sm"
                            data-toggle="dropdown"
                            border="none"
                            style="width: 130px">
                        <img src="\img\buttons\birka.png" width="20">
                        @if($item->sit->dateBirka) {{$item->sit->dateBirka}}
                        @else відсутня
                        @endif
                    </button>
                </div>
                {{--Кінець кнопка Бирка--}}
            </td>

            <td>
                {{--Кнопка План работ--}}
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
                {{--Кінець кнопка План работ--}}

                {{--Кнопка виконання робіт--}}
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
                {{--Кінець кнопка виконання робіт--}}
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
