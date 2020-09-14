@extends('layouts.layout')

@section('title', 'Протокол')
@section('header', 'Попередній перегляд протоколу метрологічного контролю ЗВТ')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-0">
                </div>
            </div>
        </section>

        <section class="content">

            {{Form::open(['route'=>['protocols.saveToDB', $protocol->id], 'method'=>'put'])}}
            <div class="content">
                <div class="card card-default">
                    <div class="card-body">
                        <table width="100%">
                            <tbody>
                            <tr>
                                <td width="20%">Дата робіт:</td>
                                <td width="40%"><b>{{$protocol->date}}</b></td>
                                <td width="20%">Температура довкілля, °С:</td>
                                <td width="30%"><b>{{$protocol->temperature}}</b></td>
                            </tr>
                            <tr>
                                <td>{{WORK}}:</td>
                                <td><b>{{$protocol->work->name}}</b></td>
                                <td>Атмосферний тиск, кПа:</td>
                                <td><b>{{$protocol->davlenie}}</b></td>
                            </tr>
                            <tr>
                            <td>{{LABORATORY}}:</td>
                            <td><b>{{$protocol->laboratory->name}}</b></td>
                            <td>Відносна вологість, %:</td>
                            <td><b>{{$protocol->valazhnost}}</b></td>
                            </tr>
                            <tr>
                                <td>Виконавець робіт:</td>
                                <td><b>{{$protocol->user->name}}</b></td>
                                <td></td>
                                <td><b></b></td>
                            </tr>
                            </tbody>
                        </table>

                        <br>

                        <table width="100%">
                            <tbody>
                            <tr>
                                <td colspan="2" bgcolor="#d3d3d3"><b>Об'єкт метрологічного
                                        контролю</b>
                                </td>
                            </tr>
                            <tr>
                                <td width="35%">{{NAME}}:</td>
                                <td width="65%">
                                    <b>{{$protocol->sit->type->naimen->name}}</b></td>
                            </tr>
                            <tr>
                                <td>{{TYPE}}:</td>
                                <td><b>{{$protocol->sit->type->name}}</b></td>
                            </tr>
                            <tr>
                                <td>{{NUMBER}}:</td>
                                <td><b>{{$protocol->sit->number}}</b></td>
                            </tr>
                            <tr>
                                <td>{{DIAPAZON}}:</td>
                                <td>
                                    <b>{{$protocol->sit->diapazon}} {{$protocol->sit->edIzm->name}}</b></td>
                            </tr>
                            <tr>
                                <td>{{POHIBKA}}:</td>
                                <td><b>{{$protocol->sit->pohibka}}</b></td>
                            </tr>
                            <tr>
                                <td>Строк метрологічного контролю згідно графіка:</td>
                                <td><b>{{$protocol->grafik->datePlanWork}}</b></td>
                            </tr>
                            </tbody>
                        </table>

                        <br>

                        <table width="100%">
                            <tbody>
                            @foreach($etalons as $etalon)
                                <tr>
                                    <td colspan="2" bgcolor="#d3d3d3"><b>Еталон вимірювання</b></td>
                                </tr>
                                <tr>
                                    <td width="35%">{{TYPE}}:</td>
                                    <td width="65%"><b>{{$etalon->type->name}}</b></td>
                                </tr>
                                <tr>
                                    <td>{{NUMBER}}:</td>
                                    <td><b>{{$etalon->number}}</b></td>
                                </tr>
                                <tr>
                                    <td>{{DIAPAZON}}:</td>
                                    <td><b>{{$etalon->diapazon}} {{$etalon->edizm->name}}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><br></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <br>

                        <table width="100%">
                            <tbody>
                            <tr>
                                <td align="center" colspan="9" bgcolor="#d3d3d3"><b>Результати вимірювань</b></td>
                            </tr>
                            @for ($i = 1; $i <= 16; $i++)
                                @if($protocol["valueEtalon$i"."1"] !== null)
                                    <tr>
                                        <td colspan="9"><br></td>
                                    </tr>
                                    <tr>
                                        <td colspan="9"><i><b>Канал {{$i}}</b></i></td>
                                    </tr>
                                    <tr bgcolor="#d3d3d3">
                                        <td rowspan="3" align="center" style="border: 1px solid;">Значення
                                            еталону, {{$etalon->edizm->name}}</td>
                                        <td colspan="2" align="center" rowspan="2" style="border: 1px solid;">Результат
                                            на ЗВТ, {{$etalon->edizm->name}}</td>
                                        <td colspan="6" align="center" style="border: 1px solid;">Розрахунок отриманих
                                            похибок показань на ЗВТ
                                        </td>
                                    </tr>
                                    <tr bgcolor="#d3d3d3">
                                        <td colspan="2" align="center" style="border: 1px solid;">абсолютна,
                                            Δ, {{$etalon->edizm->name}}</td>
                                        <td colspan="2" align="center" style="border: 1px solid;">відносна, δ, %</td>
                                        <td colspan="2" align="center" style="border: 1px solid;">зведена, γ, %</td>
                                    </tr>
                                    <tr bgcolor="#d3d3d3">
                                        <td width="11%" align="center" style="border: 1px solid;">прямий хід</td>
                                        <td width="11%" align="center" style="border: 1px solid;">зворотній хід</td>
                                        <td width="11%" align="center" style="border: 1px solid;">прямий хід</td>
                                        <td width="11%" align="center" style="border: 1px solid;">зворотній хід</td>
                                        <td width="11%" align="center" style="border: 1px solid;">прямий хід</td>
                                        <td width="11%" align="center" style="border: 1px solid;">зворотній хід</td>
                                        <td width="11%" align="center" style="border: 1px solid;">прямий хід</td>
                                        <td width="11%" align="center" style="border: 1px solid;">зворотній хід</td>
                                    </tr>
                                    @for ($y = 1; $y <= 6; $y++)
                                        @if($protocol["valueEtalon$i$y"] !== null)
                                            <tr>
                                                <td style="padding-left: 20px;">
                                                    <b>{{$protocol["valueEtalon$i$y"]}}</b></td>
                                                <td style="padding-left: 20px;">
                                                    <b>{{$protocol["valueSitPryamoy$i$y"]}}</b></td>
                                                <td style="padding-left: 20px;">
                                                    <b>{{$protocol["valueSitObratniy$i$y"]}}</b></td>
                                                <td style="padding-left: 20px;">
                                                    <b>{{$protocol->raschetAbsPoh("valueSitPryamoy$i$y", "valueEtalon$i$y")}}</b>
                                                </td>
                                                <td style="padding-left: 20px;">
                                                    <b>{{$protocol->raschetAbsPoh("valueSitObratniy$i$y", "valueEtalon$i$y")}}</b>
                                                </td>
                                                <td style="padding-left: 20px;">
                                                    <b>{{$protocol->raschetVidnPoh("valueSitPryamoy$i$y", "valueEtalon$i$y")}}</b>
                                                </td>
                                                <td style="padding-left: 20px;">
                                                    <b>{{$protocol->raschetVidnPoh("valueSitObratniy$i$y", "valueEtalon$i$y")}}</b>
                                                </td>
                                                <td style="padding-left: 20px;">
                                                    <b>{{$protocol->raschetZvedPoh("valueSitPryamoy$i$y", "valueEtalon$i$y", $protocol->sit->maxShkaly)}}</b>
                                                </td>
                                                <td style="padding-left: 20px;">
                                                    <b>{{$protocol->raschetZvedPoh("valueSitObratniy$i$y", "valueEtalon$i$y", $protocol->sit->maxShkaly)}}</b>
                                                </td>
                                            </tr>
                                        @endif
                                    @endfor
                                @endif
                            @endfor
                            </tbody>
                        </table>

                        <br>

                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-md-auto">
                        <a href="{{route('protocols.edit', $protocol->id)}}" style="width:150px;"
                           class="btn btn-danger">Редагувати</a>
                    </div>
                    <div class="col-md-auto">
                            <button type="submit" style="width:150px;" class="btn btn-primary">Вихід</button>
                    </div>
                </div>
            </div>

            {{Form::close()}}

        </section>

    </div>
@endsection

