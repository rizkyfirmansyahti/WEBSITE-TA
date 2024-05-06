@extends('superadmin.temp_superadmin.index')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between text-light">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-2">
                <h1 class="teks-manajemen h3 mb-0" style="color: black">Laporan Data Panen</h1>
            </div>
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-primary mb-4">
            <i class="fas fa-arrow-circle-left"></i>
        </a>

        <div class="card w-100" style="overflow: auto; background-color: #D9D9D9">
            <div class="card-body">
                <table class="table table-sm table-borderless" style="background-color: white; border-radius: 10px">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kelompok</th>
                            <th>Total Tonase</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                            $totalTonaseKelompok = 0;
                        @endphp
                        @forelse ($kelompokData as $kelompok)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $kelompok['nama_kelompok'] }}</td>
                                <td>{{ number_format($kelompok['total_tonase']) }} Kg</td>
                            </tr>
                            @php
                                $totalTonaseKelompok += $kelompok['total_tonase'];
                            @endphp
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Data kelompok tidak tersedia</td>
                            </tr>
                        @endforelse
                        <tr>
                            <td colspan="2"><strong>Total Keseluruhan</strong></td>
                            <td><strong>{{ number_format($totalTonaseKelompok) }} Kg</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection