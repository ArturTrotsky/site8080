<!DOCTYPE html> {{--TODO: Доработать этот файл--}}
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
            text-align: center; /* Выравнивание*/
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
        <td width=40%; style="background: #dee2e6;">Назва ЗВТ</td>
        <td width=30%; style="background: #dee2e6;">Умовне позначення</td>
        <td width=30%; style="background: #dee2e6;">Індивідуальний номер</td>

    </tr>
    <tr>
        <td style="border-bottom: 2px solid">{{$sit->type->naimen->name}}</td>
        <td style="border-bottom: 2px solid">{{$sit->type->name}}</td>
        <td style="border-bottom: 2px solid">{{$sit->number}}</td>
    </tr>
    <tr>
        <td width=25%; style="background: #dee2e6;">Діапазон вимірювання</td>
        <td width=25%; style="background: #dee2e6;">Клас точності (похибка)</td>
        <td width=25%; style="background: #dee2e6;">Підрозділ</td>
        <td width=25%; style="background: #dee2e6;">Підрозділ</td>
    </tr>
    <tr>
        <td>{{$sit->diapazon}} {{$sit->edizm->name}}</td>
        <td>{{$sit->pohibka}}</td>
        <td>{{$sit->podrazdelenie->name}}</td>
        <td>{{$sit->podrazdelenie->name}}</td>

    </tr>
    </tbody>
</table>

<table class="robota">
    <tbody>
    <tr>
        <td colspan="2" style="background: #dee2e6; text-align: center; border-bottom: 2px solid; border-right: 2px solid;">Роботи</td>
        <td colspan="2" style="background: #dee2e6; text-align: center; border-bottom: 2px solid; border-left: 2px solid;">Виконавець</td>
    </tr>
    <tr>
        <td width="130px" style="border-right:0;">Дата:</td>
        <td width="123px" style="border-right: 2px solid; border-left:0;">{{$sit->dateLastWork}}</td>
        <td width="90px" style="border-right:0;">Лабораторія:</td>
        <td style="border-right: 2px solid; border-left:0;">{{$sit->laboratory->name}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Вид робіт:</td>
        <td style="border-right: 2px solid; border-left:0;">{{$sit->work->name}}</td>
        <td style="border-right:0;">ПІБ:</td>
        <td style="border-right: 2px solid; border-left:0;">{{$sit->pohibka}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Результат:</td>
        <td style="border-right: 2px solid; border-left:0;">{{$sit->diapazon}} {{$sit->edizm->name}}</td>
        <td style="border-right:0;">Підпис:</td>
        <td style="border-right: 2px solid; border-left:0;">{{$sit->pohibka}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Наступний строк:</td>
        <td style="border-right: 2px solid; border-left:0;">{{$sit->diapazon}} {{$sit->edizm->name}}</td>
        <td style="border-right:0;">Тавро:</td>
        <td style="border-right: 2px solid; border-left:0;">{{$sit->pohibka}}</td>
    </tr>




    <tr>
        <td width="130px" style="border-right:0;">Дата:</td>
        <td width="123px" style="border-right: 2px solid; border-left:0;">{{$sit->dateLastWork}}</td>
        <td width="90px" style="border-right:0;">Лабораторія:</td>
        <td style="border-right: 2px solid; border-left:0;">{{$sit->laboratory->name}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Вид робіт:</td>
        <td style="border-right: 2px solid; border-left:0;">{{$sit->work->name}}</td>
        <td style="border-right:0;">ПІБ:</td>
        <td style="border-right: 2px solid; border-left:0;">{{$sit->pohibka}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Результат:</td>
        <td style="border-right: 2px solid; border-left:0;">{{$sit->diapazon}} {{$sit->edizm->name}}</td>
        <td style="border-right:0;">Підпис:</td>
        <td style="border-right: 2px solid; border-left:0;">{{$sit->pohibka}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Наступний строк:</td>
        <td style="border-right: 2px solid; border-left:0;">{{$sit->diapazon}} {{$sit->edizm->name}}</td>
        <td style="border-right:0;">Тавро:</td>
        <td style="border-right: 2px solid; border-left:0;">{{$sit->pohibka}}</td>
    </tr>
    </tbody>
</table>

</body>
</html>
