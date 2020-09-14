<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Інформація про ЗВТ</title>
    <style type="text/css">
        TABLE {
            border-collapse: collapse; /* Убираем двойные линии между ячейками */
            width: 100%; /* Ширина таблицы */
        }

        TH {
            background: #fff; /* Цвет фона ячейки */
            text-align: left; /* Выравнивание по левому краю */
        }

        TD {
            background: #fff; /* Цвет фона ячеек */
            text-align: left; /* Выравнивание по левому краю */
        }

        TH, TD {
            border: 1px solid black; /* Параметры рамки */
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

<table>
    <caption
        style="margin-bottom: 20px;
        text-transform: uppercase;"> {{--Заглавными буквами--}}
        <b>Інформація про ЗВТ</b>
    </caption>
    <tbody>
    <tr>
        <td style="border-right:0; width: 40%;">ID</td>
        <td style="border-left:0;">{{$sit->id}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Назва ЗВТ</td>
        <td style="border-left:0;">{{$sit->type->naimen->name}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Умовне позначення</td>
        <td style="border-left:0;">{{$sit->type->name}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Індивідуальний номер</td>
        <td style="border-left:0;">{{$sit->number}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Підрозділ</td>
        <td style="border-left:0;">{{$sit->podrazdelenie->name}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Діапазон вимірювання</td>
        <td style="border-left:0;">{{$sit->diapazon}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Одиниця вимірювання</td>
        <td style="border-left:0;">{{$sit->edizm->name}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Нижня межа вимірювання</td>
        <td style="border-left:0;">{{$sit->minShkaly}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Верхня межа вимірювання</td>
        <td style="border-left:0;">{{$sit->maxShkaly}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Клас точності (похибка)</td>
        <td style="border-left:0;">{{$sit->pohibka}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Група ЗВТ</td>
        <td style="border-left:0;">{{$sit->type->group->name}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Кабінет</td>
        <td style="border-left:0;">{{$sit->type->kabinet->name}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Вид робіт</td>
        <td style="border-left:0;">{{$sit->work->name}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Період проведення робіт, міс.</td>
        <td style="border-left:0;">{{$sit->periodMetrology}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Дата останнього проведення робіт</td>
        <td style="border-left:0;">{{$sit->dateLastWork}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Лабораторія, що виконує роботи</td>
        <td style="border-left:0;">{{$sit->laboratory->name}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Місце виконання робіт</td>
        <td style="border-left:0;">{{$sit->laboratoryMesto->name}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Обладнання лабораторії</td>
        <td style="border-left:0;">{{$sit->laboratoryObladnannya->name}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Бригада, що вилучає прилади</td>
        <td style="border-left:0;">{{$sit->brigade->name}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Період проведення ППР, міс.</td>
        <td style="border-left:0;">{{$sit->type->periodPpr}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Період проведення TO, міс.</td>
        <td style="border-left:0;">{{$sit->type->periodTo}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Період проведення верифікації, міс.</td>
        <td style="border-left:0;">{{$sit->type->periodVerification}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Вартість калібрування, грн.</td>
        <td style="border-left:0;">{{$sit->type->cenaKalibrovki}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Код калібрування</td>
        <td style="border-left:0;">{{$sit->type->kodKalibrovki}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Вартість повірки, грн.</td>
        <td style="border-left:0;">{{$sit->type->cenaPoverki}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Код повірки</td>
        <td style="border-left:0;">{{$sit->type->kodPoverki}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Статус</td>
        <td style="border-left:0;">{{$sit->status->name}}</td>
    </tr>
    <tr>
        <td style="border-right:0;">Дата стану</td>
        <td style="border-left:0;">{{$sit->date_sostoyaniya}}</td>
    </tr>
    </tbody>
</table>

</body>

</html>
