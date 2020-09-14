<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Протокол ЗВТ</title>
    <style type="text/css">

        .page-break { /* Указывает на создание новой строки */
            page-break-after: always;
        }

        table.protocol {
            border-collapse: collapse; /* Убираем двойные линии между ячейками */
            width: 98%; /* Ширина таблицы */
        }

    </style>
</head>

<style>
    @page {
        padding-top: 1.5% !important;
        margin-left: 5% !important;
        margin-right: 1.5% !important;
    }

    body {
        font-family: DejaVu Sans, sans-serif;
        font-size: 7pt;
    }


    .headTable {
        margin-bottom: -2%; /* Отрицательный отступ между заголовком и текстом */
    }

</style>

<body>

<table class="protocol">
    <caption
        style="text-transform: uppercase;">{{--Заглавными буквами--}}
        <p><b><h2 class="headTable">Протокол метрологічного контролю ЗВТ&nbsp;</h2></b></p>
    </caption>
</table>

<table class="protocol">
    <tbody>
    <tr>
        <td align="center" colspan="3" bgcolor="#d3d3d3"><b>Загальна iнформацiя</b></td>
    </tr>
    <tr>
        <td width="35%">Дата робіт:&nbsp;&nbsp;<b>{{$protocol->date}}</b></td>
        <td width="65%">{{LABORATORY}}:&nbsp;&nbsp;<b>{{$protocol->laboratory->name}}</b></td>
    </tr>
    <tr>
        <td width="35%">{{WORK}}:&nbsp;&nbsp;<b>{{$protocol->work->name}}</b></td>
        <td width="65%">Виконавець робіт:&nbsp;&nbsp;<b>{{$protocol->user->name}}</b></td>
    </tr>
    </tbody>
</table>

<br>

<table class="protocol">
    <tbody>
    <tr>
        <td align="center" colspan="3" bgcolor="#d3d3d3"><b>Умови проведення</b></td>
    </tr>
    <tr>
        <td width="30%">Температура довкілля, °С:&nbsp;&nbsp;<b>{{$protocol->temperature}}</b></td>
        <td width="30%">Атмосферний тиск, кПа:&nbsp;&nbsp;<b>{{$protocol->davlenie}}</b></td>
        <td width="40%">Відносна вологість, %:&nbsp;&nbsp;<b>{{$protocol->valazhnost}}</b></td>
    </tr>
    </tbody>
</table>

<br>

<table class="protocol">
    <tbody>
    <tr>
        <td align="center" colspan="2" bgcolor="#d3d3d3"><b>Об'єкт метрологічного
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

<table class="protocol">
    <tbody>
    <tr>
        <td align="center" colspan="3" bgcolor="#d3d3d3"><b>Еталони вимірювання</b></td>
    </tr>
    @if(isset($protocol->etalon1))
        <tr>
            <td width="35%">{{TYPE}}:&nbsp;&nbsp;<b>{{$protocol->etalon1->type->name}}</b><</td>
            <td width="35%">{{NUMBER}}:&nbsp;&nbsp;<b>{{$protocol->etalon1->number}}</b></td>
            <td width="30%">{{DIAPAZON}}
                :&nbsp;&nbsp;<b>{{$protocol->etalon1->diapazon}} {{$protocol->etalon1->edizm->name}}</b></td>
        </tr>
    @endif
    @if(isset($protocol->etalon2))
        <tr>
            <td width="35%">{{TYPE}}:&nbsp;&nbsp;<b>{{$protocol->etalon2->type->name}}</b><</td>
            <td width="35%">{{NUMBER}}:&nbsp;&nbsp;<b>{{$protocol->etalon2->number}}</b></td>
            <td width="30%">{{DIAPAZON}}
                :&nbsp;&nbsp;<b>{{$protocol->etalon2->diapazon}} {{$protocol->etalon2->edizm->name}}</b></td>
        </tr>
    @endif
    @if(isset($protocol->etalon3))
        <tr>
            <td width="35%">{{TYPE}}:&nbsp;&nbsp;<b>{{$protocol->etalon3->type->name}}</b><</td>
            <td width="35%">{{NUMBER}}:&nbsp;&nbsp;<b>{{$protocol->etalon3->number}}</b></td>
            <td width="30%">{{DIAPAZON}}
                :&nbsp;&nbsp;<b>{{$protocol->etalon3->diapazon}} {{$protocol->etalon3->edizm->name}}</b></td>
        </tr>
    @endif
    </tbody>
</table>


<br>

<table class="protocol">
    <tbody>
    <tr>
        <td align="center" colspan="9" bgcolor="#d3d3d3" style="text-transform: uppercase;"><b>Результати вимірювань</b></td>
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
                    еталону, {{$protocol->sit->edizm->name}}</td>
                <td colspan="2" align="center" rowspan="2" style="border: 1px solid;">Результат
                    на ЗВТ, {{$protocol->sit->edizm->name}}</td>
                <td colspan="6" align="center" style="border: 1px solid;">Розрахунок отриманих
                    похибок показань на ЗВТ
                </td>
            </tr>
            <tr bgcolor="#d3d3d3">
                <td colspan="2" align="center" style="border: 1px solid;">абсолютна,
                    Δ, {{$protocol->sit->edizm->name}}</td>
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
</body>
</html>


