<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Proposal Masuk</title>
</head>

<body>

    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col">

                    <table border="1" width="100%">
                        <tbody>
                            <tr>
                                <td valign="top">
                                    <div align="center">
                                        <span style="font-size: x-small;">&emsp;&emsp;&emsp;&emsp;<img src="/admin/assets/img/sttb.png" style="max-width: 6rem;" alt="Gambar iahn"></span>
                                    </div>
                                </td>
                                <td>
                                    <table border="0" cellpadding="1" style="width: 500px;text-align: center;">
                                        <tbody>
                                            <tr>
                                                <td width="100%"><span style="font-size: x-small;">
                                                        <h6>PERGURUAN TINGGI <br>SEKOLAH TINGGI TEKNOLOGI BANDUNG</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="100%"><span style="font-size: x-small;">
                                                        <center>
                                                        <pre>Jl. Soekarno Hatta No.378, Kb. Lega, Kec. Bojongloa Kidul <br> Telepon (022) 5224000,<br> https://sttbandung.ac.id/ email : info@sttbandung.ac.id</pre>
                                                        </center>
                                                    </span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <div class="bg-warning">
                        <h6>Laporan Proposal Masuk</h6>
                    </div>
                    <table class="table table-striped table-bordered table-sm">
                        <thead>
                            <th style="text-align: center;font-size: small;">No.</th>
                            <th style="text-align: center;font-size: small;">Nama Proposal</th>
                            <th style="text-align: center;font-size: small;">Tanggal Masuk</th>
                            <th style="text-align: center;font-size: small;">Pengajuan SKKM</th>
                            <th style="text-align: center;font-size: small;">Target Pendaftar</th>
                            <th style="text-align: center;font-size: small;">Penanggung Jawab</th>
                            <th style="text-align: center;font-size: small;">Nominal Pengajuan</th>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($item as $letter)
                            <tr>
                                <td style="text-align: center;font-size: small;">{{ $no++; }}</td>
                                <td style="text-align: center;font-size: small;">{{ $letter->letter_no }}</td>
                                <td style="text-align: center;font-size: small;">{{ Carbon\Carbon::parse($letter->letter_date)->translatedFormat('l, d F Y') }}</td>
                                <td style="text-align: center;font-size: small;">{{ $letter->agenda_no }}</td>
                                <td style="text-align: center;font-size: small;">{{ $letter->regarding }}</td>
                                <td style="text-align: center;font-size: small;">{{ $letter->sender->name }}</td>
                                <td style="text-align: center;font-size: small;">{{ $letter->nominal }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script>
        window.print();
        window.onafterprint = window.close;
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>