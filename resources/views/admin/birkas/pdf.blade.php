<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Інформація про ЗВТ</title>
    <style type="text/css">

        .page-break { /* Указывает на создание новой строки */
            page-break-after: always;
        }

    </style>
</head>

<style>
    body.bigBirka {
        font-family: DejaVu Sans, sans-serif;
        font-size: 8pt;
    }

    body.smallBirka {
        font-family: DejaVu Sans, sans-serif;
        font-size: 5pt;
    }
</style>

<body class="bigBirka">

@if($sits->count() >= 3)
    <table width="100%" style="table-layout: fixed">
        @elseif($sits->count() == 2)
            <table width="66.7%" style="table-layout: fixed">
                @else
                    <table width="33.3%" style="table-layout: fixed">
                        @endif

                        @foreach($sits as $key => $sit)
                            @if((($key + 1) % 3) == 1) {
                            <tr>
                                <td width="33%"
                                    style="border: solid black 2px; vertical-align: top; word-wrap: break-word;">
                                    <b>{{$sit->type->name}}</b><br>№ <b>{{$sit->number}}</b><br>Придатний до:
                                    <b>{{$sit->dateBirka}}</b>
                                </td>
                                } @elseif((($key + 1) % 3) == 2) {
                                <td width="33%"
                                    style="border: solid black 2px; vertical-align: top; word-wrap: break-word;">
                                    <b>{{$sit->type->name}}</b><br>№ <b>{{$sit->number}}</b><br>Придатний до:
                                    <b>{{$sit->dateBirka}}</b>
                                </td>
                                } @elseif((($key + 1) % 3) == 0) {
                                <td width="33%"
                                    style="border: solid black 2px; vertical-align: top; word-wrap: break-word;">
                                    <b>{{$sit->type->name}}</b><br>№ <b>{{$sit->number}}</b><br>Придатний до:
                                    <b>{{$sit->dateBirka}}</b>
                                </td>
                            </tr>
                            } @endif
                        @endforeach
                    </table>
</body>

<body class="smallBirka">

@if($sits->count() >= 3)
    <table width="66.7%" style="table-layout: fixed">
        @elseif($sits->count() == 2)
            <table width="44.5%" style="table-layout: fixed">
                @else
                    <table width="22.2%" style="table-layout: fixed">
                        @endif

    @foreach($sits as $key=>$sit)
        @if((($key + 1) % 3) == 1) {
        <tr>
            <td width="33%" style="border: solid black 2px; vertical-align: top; word-wrap: break-word;">
                № <b>{{$sit->number}}</b><br>Прид. до: <b>{{$sit->dateBirka}}</b>
            </td>
            } @elseif((($key + 1) % 3) == 2) {
            <td width="33%" style="border: solid black 2px; vertical-align: top; word-wrap: break-word;">
                № <b>{{$sit->number}}</b><br>Прид. до: <b>{{$sit->dateBirka}}</b>
            </td>
            } @elseif((($key + 1) % 3) == 0) {
            <td width="33%" style="border: solid black 2px; vertical-align: top; word-wrap: break-word;">
                № <b>{{$sit->number}}</b><br>Прид. до: <b>{{$sit->dateBirka}}</b>
            </td>
        </tr>
        } @endif
    @endforeach

</table>

</body>
</html>
