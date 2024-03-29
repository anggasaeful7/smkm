<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Status Pengajuan Proposal</title>
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
                                        <span style="font-size: x-small;">&emsp;&emsp;&emsp;&emsp;<img src="/admin/assets/img/sttb.png" style="max-width: 7rem;" alt="Gambar iahn"></span>
                                    </div>
                                </td>
                                <td>
                                    <table border="0" cellpadding="1" style="width: 500px;text-align: center;">
                                        <tbody>
                                            <tr>
                                                <td width="100%"><span style="font-size: x-small;">
                                                        <h6>PENDIDIKAN TINGGI<br>SEKOLAH TINGGI TEKNOLOGI BANDUNG</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="100%">
                                                    <span style="font-size: x-small;">
                                                        <center>
                                                        <pre>Jl. Soekarno Hatta No.378, Kb. Lega, Kec. Bojongloa Kidul <br> Telepon (022) 5224000,<br> https://sttbandung.ac.id/ email : info@sttbandung.ac.id</pre>
                                                        </center>
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <div>
                        <h6>Laporan Status Pengajuan Proposal</h6>
                    </div>
                    <table class="table table-striped table-bordered table-sm" width="100%">
                        <thead>
                            <th style="text-align: center;font-size: small;">No.</th>
                            <th style="text-align: center;font-size: small;">Nama Proposal</th>
                            <th style="text-align: center;font-size: small;" width="20">Status</th>
                            <th style="text-align: center;font-size: small;">Tanggal Penyelesaian</th>
                            <th style="text-align: center;font-size: small;">Nominal Disetujui</th>
                        </thead>
                        <tbody>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($item as $letter)
                            <tr>
                                <td style="text-align: center;font-size: small;">{{ $no++; }}</td>
                                <td style="text-align: center;font-size: small;">{{ $letter->letter->letter_no }}</td>
                                <td style="text-align: center;font-size: small;" width="20">{{ $letter->status }}</td>
                                <td style="text-align: center;font-size: small;">{{ Carbon\Carbon::parse($letter->letter->created_at)->translatedFormat('l, d F Y') }}</td>
                                <td style="text-align: center;font-size: small;">{{ $letter->letter->nominal }}</td>
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

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>