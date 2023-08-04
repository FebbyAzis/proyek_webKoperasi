<!DOCTYPE html>
<html lange="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrd-token" content="{{ csrf_token() }}">
        <style>
            table.static{
                position: relative;
                border: 1px solid #543535;
            }
            h1{
                font-size: 20px;
            }
        </style>
        <br>
        <title class="mt-3">Laporan Jasa Anggota</title>

</head>

<body>
    <div class="form-group">
        
        <h1 align="center"><b>Laporan Jasa Anggota</b></h1>
        <p align="center">Koperasi Tutwuri Handayani Dinas Pendidikan Kota Cirebon</p>
        <br>
        <table class="static" align="center" rules="all" border="1px" style="width: 90%;">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Anggota</th>
                <th>Hutang Barang</th>
                <th>Hutang Uang</th>
            </tr>
            @foreach ($cetak as $no=>$item)
            @php
                $total += $item['hutangBarang'];
                $totals += $item['hutangUang'];
            @endphp
            <tr>
                <td>&nbsp;{{ $no+1 }}</td>
                <td>&nbsp;{{date("d/M/Y", strtotime($item->created_at));}}</td>
                <td>&nbsp;{{ $item->users->name }}</td>
                <td align="end">&nbsp;Rp. {{ number_format($item['hutangBarang'] ,0,',','.') }} &nbsp;</td>
                <td align="end">&nbsp;Rp. {{ number_format($item['hutangUang'] ,0,',','.') }} &nbsp;</td>
            </tr>
            @endforeach
            <tfoot>
                <tr>
                    <th colspan="3" >
                        Total &nbsp;&nbsp;&nbsp;
                    </th>
                    <td align="end">&nbsp;Rp. {{ number_format($total ,0,',','.') }} &nbsp;</td>
                    <td align="end">&nbsp;Rp. {{ number_format($totals ,0,',','.') }} &nbsp;</td>
                </tr>
            </tfoot>
            
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>