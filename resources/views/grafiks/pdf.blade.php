<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Графік метрологічного контролю</title>
    <style type="text/css">

        .page-break { /* Указывает на создание новой страницы */
            page-break-after: always;
        }

        table.grafik {
            border-collapse: collapse; /* Убираем двойные линии между ячейками */
            border: 1px solid;
            width: 100%; /* Ширина таблицы */
        }

        table.grafik td {
            background: #fff; /* Цвет фона ячеек */
            text-align: center; /* Выравнивание*/
        }

        table.grafik th, table.grafik td {
            border-left: 1px dotted black; /* Параметры сетки */
            border-right: 1px dotted black; /* Параметры сетки */
            border-top: 1px solid black; /* Параметры сетки */
            border-bottom: 1px solid black; /* Параметры сетки */
            padding: 4px; /* Поля вокруг текста */
        }

        table.grafik th {
            background: #dee2e6; /*меняем заливку заголовка*/
            text-align: center; /* Выравнивание заголовка по центру */
        }

    </style>
</head>

<style>
    @page {
        padding-top: 1.5% !important;
        margin-left: 1.5% !important;
        margin-right: 1.5% !important;
    }

    body {
        font-family: DejaVu Sans, sans-serif;
        font-size: 7pt;
    }
</style>

<body>
@foreach($grafiks as $item_lab)
    @foreach($item_lab as $item_podr)
        <table class="grafik">
            <caption
                style="text-transform: uppercase;">{{--Заглавными буквами--}}
                <p><b><h3>Графік метрологічного контролю
                            ЗВТ&nbsp;&nbsp;-&nbsp;&nbsp;<u>{{$item_podr[0]->work->name}}</u></h3>
                        Запланований строк виконання: {{$dateFrom}} - {{$dateTo}}<br>
                        {{PODRAZDELENIE}}: {{$item_podr[0]->sit->podrazdelenie->name}};&nbsp;&nbsp;
                        {{LABORATORY}}: {{$item_podr[0]->laboratory->name}};&nbsp;&nbsp;
                        {{KABINET}}: {{$item_podr[0]->sit->type->kabinet->name}};&nbsp;&nbsp;
                        {{BRIGADE}}: {{$item_podr[0]->sit->brigade->name}}<br>
                    </b></p>
            </caption>
            <thead>
            <tr>
                <th width="25%">{{NAME}}</th>
                <th width="11%">{{TYPE}}</th>
                <th width="11%">{{NUMBER}}</th>
                <th width="9%">{{DIAPAZON}}</th>
                <th width="9%">{{POHIBKA}}</th>
                <th width="20%">{{LABORATORYMESTO}}</th>
                <th width="7%">{{DATEPLANWORK}}</th>
                <th width="8%">{{DATEFACTWORK}}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($item_podr as $item)
                <tr>
                    <td height="4%" style="text-align: left">{{$item->sit->type->naimen->name}}</td>
                    <td style="text-align: left">{{$item->sit->type->name}}</td>
                    <td style="text-align: left">{{$item->sit->number}}</td>
                    <td style="text-align: left">{{$item->sit->diapazon}} {{$item->sit->edizm->name}}</td>
                    <td>{{$item->sit->pohibka}}</td>
                    <td style="text-align: left">{{$item->laboratoryMesto->name}}</td>
                    <td>{{$item->datePlanWork}}</td>
                    <td>{{$item->dateFactWork}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="page-break">
            {{--TODO: удалить последнюю страницу в pdf, т.к. она всегда пустая--}}
        </div>
    @endforeach
@endforeach

{{--Скрипт для отображения нумерации страниц на листе--}}
{{--<script type="text/php">
    if (isset($pdf)) {
        $text = "Сторінка {PAGE_NUM} / {PAGE_COUNT}";
        $size = 6;
        $font = $fontMetrics->getFont("Verdana");
        $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
        $x = ($pdf->get_width() - $width) / 2;
        $y = $pdf->get_height() - 25;
        $pdf->page_text($x, $y, $text, $font, $size);
    }


</script>--}}
{{-----------------------------------------------------}}

</body>
</html>
