@extends('layout.main')
@section('container')

    @push('css')
        <!-- page css -->
    <link href="/assets/vendors/datatables/dataTables.bootstrap.min.css" rel="stylesheet">
    @endpush

    <div class="main">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4>Keberangkatan</h4>
                    <p>Rekap kedatangan data terminal</p>

                    <div class="row">
                        <div class="col-lg-12">
                            <table id="data-table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th rowspan="2" style="text-align: center">No</th>
                                        <th rowspan="2" style="text-align: center">Tanggal</th>
                                        <th rowspan="2" style="text-align: center">Terminal</th>
                                        <th colspan="2" style="text-align: center">AKAP</th>
                                        <th colspan="2" style="text-align: center">AKDP</th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center">Bus</th>
                                        <th style="text-align: center">Penumpang</th>
                                        <th style="text-align: center">Bus</th>
                                        <th style="text-align: center">Penumpang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($laporan_berangkat as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                                            <td>{{ $item->terminal->nama_terminal }}</td>
                                            <td>{{ $item->jml_bis_akap }}</td>
                                            <td>{{ $item->jml_pnpg_akap }}</td>
                                            <?php $bis_akap_berangkat += $item->jml_bis_akap; ?>
                                            <?php $pnpg_akap_berangkat += $item->jml_pnpg_akap; ?>

                                            <td>{{ $item->jml_bis_akdp }}</td>
                                            <td>{{ $item->jml_pnpg_akdp }}</td>
                                            <?php $bis_akdp_berangkat += $item->jml_bis_akdp; ?>
                                            <?php $pnpg_akdp_berangkat += $item->jml_pnpg_akdp; ?>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3"><strong>Total</strong></td>
                                        <td><strong>{{ $bis_akap_berangkat }}</strong></td>
                                        <td><strong>{{ $pnpg_akap_berangkat }}</strong></td>

                                        <td><strong>{{ $bis_akdp_berangkat }}</strong></td>
                                        <td><strong>{{ $pnpg_akdp_berangkat }}</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4>Kedatangan</h4>
                    <p>Rekap kedatangan data terminal</p>
                    <div class="row">
                        <table id="data-table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="2" style="text-align: center">No</th>
                                    <th rowspan="2" style="text-align: center">Tanggal</th>
                                    <th rowspan="2" style="text-align: center">Terminal</th>
                                    <th colspan="2" style="text-align: center">AKAP</th>
                                    <th colspan="2" style="text-align: center">AKDP</th>
                                </tr>
                                <tr>
                                    <th style="text-align: center">Bus</th>
                                    <th style="text-align: center">Penumpang</th>
                                    <th style="text-align: center">Bus</th>
                                    <th style="text-align: center">Penumpang</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporan_datang as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                                        <td>{{ $item->terminal->nama_terminal }}</td>
                                        <td>{{ $item->jml_bis_akap }}</td>
                                        <td>{{ $item->jml_pnpg_akap }}</td>
                                        <?php $bis_akap_datang += $item->jml_bis_akap; ?>
                                        <?php $pnpg_akap_datang += $item->jml_pnpg_akap; ?>

                                        <td>{{ $item->jml_bis_akdp }}</td>
                                        <td>{{ $item->jml_pnpg_akdp }}</td>
                                        <?php $bis_akdp_datang += $item->jml_bis_akdp; ?>
                                        <?php $pnpg_akdp_datang += $item->jml_pnpg_akdp; ?>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3"><strong>Total</strong></td>
                                    <td><strong>{{ $bis_akap_datang }}</strong></td>
                                    <td><strong>{{ $pnpg_akap_datang }}</strong></td>

                                    <td><strong>{{ $bis_akdp_datang }}</strong></td>
                                    <td><strong>{{ $pnpg_akdp_datang }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <!-- page js -->
        <script src="/assets/js/jquery-3.5.1.js"></script>
        <script src="/assets/vendors/datatables/jquery.dataTables.min.js"></script>
        <script src="/assets/vendors/datatables/dataTables.bootstrap.min.js"></script>
    @endpush
@endsection
