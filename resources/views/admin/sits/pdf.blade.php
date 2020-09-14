<!DOCTYPE html> {{--TODO: Доработать этот файл: ПІБ--}}
<html>
<head>
    <meta charset="utf-8">
    <title>Інформація про ЗВТ</title>
    <style type="text/css">
        table.basi {
            border-collapse: collapse; /* Убираем двойные линии между ячейками */
            border: 2px solid;
            width: 720px; /* Ширина таблицы */
            margin-left: 40px;
        }

        table.basi th {
            background: #fff; /* Цвет фона ячейки */
            text-align: left; /* Выравнивание по левому краю */
        }

        table.basi td {
            background: #fff; /* Цвет фона ячеек */
            text-align: left; /* Выравнивание*/
        }

        table.basi th, table.basi td {
            border: 1px dotted black; /* Параметры сетки */
            padding: 4px; /* Поля вокруг текста */
        }

        table.robota {
            border-collapse: collapse; /* Убираем двойные линии между ячейками */
            border: 2px solid;
            width: 720px; /* Ширина таблицы */
            margin-left: 40px;
        }

        table.robota th {
            background: #fff; /* Цвет фона ячейки */
            text-align: left; /* Выравнивание по левому краю */
        }

        table.robota td {
            background: #fff; /* Цвет фона ячеек */
            text-align: left; /* Выравнивание*/
        }

        table.robota th, table.robota td {
            border: 1px dotted black; /* Параметры рамки */
            padding: 4px; /* Поля вокруг текста */
        }
    </style>
</head>

<style>
    body {
        font-family: DejaVu Sans, sans-serif;
        font-size: 10pt;
    }
</style>

<body>

<table class="basi">
    <caption
        style="margin-bottom: 20px;
        margin-top: -20px;
        text-transform: uppercase;"> {{--Заглавными буквами--}}
        <p><b>Кременчуцький завод технічного вуглецю<br>
                Метрологічна облікова картка ЗВТ</b></p>
    </caption>
    <tbody>
    <tr>
        <td colspan="2"
            style="background: #dee2e6; text-align: center; border-bottom: 2px solid; border-right: 2px solid;">
            Характеристики ЗВТ
        </td>
    </tr>
    <tr>
        <td width=30%;>Назва ЗВТ</td>
        <td>{{$sit->type->naimen->name}}</td>
    </tr>
    <tr>
        <td>Умовне позначення</td>
        <td>{{$sit->type->name}}</td>
    </tr>
    <tr>
        <td>Індивідуальний номер</td>
        <td>{{$sit->number}}</td>
    </tr>
    <tr>
        <td>Діапазон вимірювання</td>
        <td>{{$sit->diapazon}} {{$sit->edizm->name}}</td>
    </tr>
    <tr>
        <td>Клас точності (похибка)</td>
        <td>{{$sit->pohibka}}</td>
    </tr>
    <tr>
        <td>Підрозділ</td>
        <td>{{$sit->podrazdelenie->name}}</td>
    </tr>
    <tr>
        <td>Статус</td>
        <td>{{$sit->status->name}}</td>
    </tr>
    </tbody>
</table>

<table class="robota">
    <tbody>
    <tr>
        <td
            style="background: #dee2e6; text-align: center; border-bottom: 2px solid; border-right: 2px solid;">
            Найменування виконаних робіт
        </td>
    </tr>
    @if($sit->protocol)
        @foreach($sit->protocol as $protocol)
            <tr>
                <td>{{$protocol->date}}, {{$protocol->work->name}}, {{$protocol->laboratory->name}}, ПІБ</td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

</body>
</html>
