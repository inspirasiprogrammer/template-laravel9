<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lap. Satuan</title>

    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="{{ asset('assets/ajax/libs/normalize/7.0.0/normalize.min.css') }}">

    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="{{ asset('assets/ajax/libs/paper-css/0.4.1/paper.css') }}">

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>
        #title {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            font-weight: bold;
        }

        #header {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            font-weight: bold;
        }

        .pages {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 8;
        }
        .tabelprint {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 8;
            width: 100%;
            margin-top: 5px;
            border-collapse: collapse;
        }

        .tabelprint tr th {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 8;
            border: 1px solid #131212;
            background-color: #dbdbdb;
        }

        .tabelprint tr td {
            font-family: Arial, Helvetica, sans-serif;
            border: 1px solid #131212;
            padding: 5px;
            font-size: 8;
        }
    </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4">
    <!-- Each sheet element should have the class "sheet" -->
    <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
    <section class="sheet padding-10mm">
        <table style="width: 100%">
            <tr>
                <th align="center">
                    <span id="title">
                        DATA-DATA SATUAN
                    </span>
                </th>
            </tr>
        </table>
        <table class="tabelprint">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Keterangan</th>
            </tr>
            @foreach ($satuan as $key => $item)
            <tr>
                <td align="center">{{ $key + 1 }}</td>
                <td align="center">{{ $item->nama }}</td>
                <td align="center">{{ $item->keterangan }}</td>
            </tr>
            @endforeach
        </table>
    </section>
</body>
</html>
