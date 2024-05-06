@extends('admin.temp_admin.index')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between text-light">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <h1 class="teks-manajemen h3 mb-0" style="color: black">Laporan Rekap Panen Bulanan</h1>
            </div>
        </div>

        <div class="d-sm-flex align-items-center justify-content-between text-light">
            <a href="/laporan-rekap-panen-bulanan/{{ $id_tanggal_panen }}" class="btn btn-primary mb-4">
                <i class="fas fa-arrow-circle-left"></i>
            </a>
            <!-- Button trigger modal-->
            <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModalCenter">
                <i class="fas fa-file-download"></i> Download
            </button>

            <!-- Modal-->
            <div class="modal fade" id="exampleModalCenter" data-backdrop="static" tabindex="-1" role="dialog"
                aria-labelledby="staticBackdrop" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="card text-center" style="color: black">
                            <div class="card-header text-dark">
                                Silahkan pilih download :
                            </div>
                            <div class="card-body">
                                <a href="/laporan/rekappanenbulanan/download/excel/{{ $id_tanggal_panen }}/{{ $id_tanggal_panen_revisi }}"
                                    class="btn mb-4 text-white justify-content-end" style="background-color: #006F1F">
                                    <i class="fas fa-file-excel"></i> Download Excel
                                </a>
                                <a href="/laporan-rekap-panen-bulanan/checkData/download/{{ $id_tanggal_panen }}/{{ $id_tanggal_panen_revisi }}"
                                    class="btn mb-4 text-white" style="background-color: #006F1F">
                                    <i class="fas fa-file-pdf"></i> Download PDF
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card w-100" style="overflow: auto; background-color: #D9D9D9">
            <div class="card-body">
                @if (session('success'))
                    <div id="success-alert" class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table table-sm table-borderless" style="background-color: white; border-radius: 10px">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Anggota</th>
                            <th>Rotasi 1</th>
                            <th>Rotasi 2</th>
                            <th>Rotasi 3</th>
                            <th>Rotasi 4</th>
                            <th>Total Keseluruhan Tonase</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($kelompokData as $key => $kelompok)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $kelompok['nama_anggota'] }}</td>
                                @php
                                    $totalKeseluruhanTonase = 0; // Inisialisasi total keseluruhan tonase
                                @endphp
                                @for ($i = 1; $i <= 4; $i++)
                                    <td>
                                        @if (isset($kelompok['dates'][$i - 1]))
                                            {{ number_format($kelompok['dates'][$i - 1]['total_tonase'], 0, ',') }} Kg
                                        @else
                                            0 Kg
                                        @endif
                                    </td>
                                    @php
                                        if (isset($kelompok['dates'][$i - 1])) {
                                            $totalKeseluruhanTonase += $kelompok['dates'][$i - 1]['total_tonase']; // Menambahkan total tonase per tanggal panen
                                        }
                                    @endphp
                                @endfor
                                <td>
                                    {{ number_format($totalKeseluruhanTonase, 0, ',') }} Kg
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
