@extends('layout.main')
@section('container')

    @push('css')
        <!-- page css -->
    <link href="/assets/vendors/datatables/dataTables.bootstrap.min.css" rel="stylesheet">
    @endpush

    <div class="main">
        <h4 class="mb-3">Pelabuhan {{ $labuhan->nama_pelabuhan }}</h4>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h4>Keberangkatan</h4>
                    <p>Rekap keberangkatan data pelabuhan</p>

                    <div class="row">
                        <div class="col-lg-12">
                            <table id="data-table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="text-align: center" width="5%">No</th>
                                        <th style="text-align: center">Tanggal</th>
                                        <th style="text-align: center">Jml Trip</th>
                                        <th style="text-align: center">E PNP</th>
                                        <th style="text-align: center">E R2</th>
                                        <th style="text-align: center">E R4</th>
                                        <th style="text-align: center">E BUS</th>
                                        <th style="text-align: center">E TRUK</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($laporan_berangkat as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>{{ $item->jmltrip_berangkat }}</td>
                                        <td>{{ $item->e_pnp_berangkat }}</td>
                                        <td>{{ $item->e_r2_berangkat }}</td>
                                        <td>{{ $item->e_r4_berangkat }}</td>
                                        <td>{{ $item->e_bus_berangkat }}</td>
                                        <td>{{ $item->e_truk_berangkat }}</td>

                                        <?php $totjmltrip_berangkat += $item->jmltrip_berangkat; ?>
                                        <?php $epnp_berangkat += $item->e_pnp_berangkat; ?>
                                        <?php $er2_berangkat += $item->e_r2_berangkat; ?>
                                        <?php $er4_berangkat += $item->e_r4_berangkat; ?>
                                        <?php $ebus_berangkat += $item->e_bus_berangkat; ?>
                                        <?php $etruk_berangkat += $item->e_truk_berangkat; ?>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2"><strong>Total</strong></td>
                                        <td><strong>{{ $totjmltrip_berangkat }}</strong></td>
                                        <td><strong>{{ $epnp_berangkat }}</strong></td>
                                        <td><strong>{{ $er2_berangkat }}</strong></td>
                                        <td><strong>{{ $er4_berangkat }}</strong></td>
                                        <td><strong>{{ $ebus_berangkat }}</strong></td>
                                        <td><strong>{{ $etruk_berangkat }}</strong></td>
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
                    <p>Rekap kedatangan data pelabuhan</p>

                    <div class="row">
                        <div class="col-lg-12">
                            <table id="data-table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="text-align: center" width="5%">No</th>
                                        <th style="text-align: center">Tanggal</th>
                                        <th style="text-align: center">Jml Trip</th>
                                        <th style="text-align: center">E PNP</th>
                                        <th style="text-align: center">E R2</th>
                                        <th style="text-align: center">E R4</th>
                                        <th style="text-align: center">E BUS</th>
                                        <th style="text-align: center">E TRUK</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($laporan_datang as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>{{ $item->jmltrip_datang }}</td>
                                        <td>{{ $item->e_pnp_datang }}</td>
                                        <td>{{ $item->e_r2_datang }}</td>
                                        <td>{{ $item->e_r4_datang }}</td>
                                        <td>{{ $item->e_bus_datang }}</td>
                                        <td>{{ $item->e_truk_datang }}</td>

                                        <?php $totjmltrip_datang += $item->jmltrip_datang; ?>
                                        <?php $epnp_datang += $item->e_pnp_datang; ?>
                                        <?php $er2_datang += $item->e_r2_datang; ?>
                                        <?php $er4_datang += $item->e_r4_datang; ?>
                                        <?php $ebus_datang += $item->e_bus_datang; ?>
                                        <?php $etruk_datang += $item->e_truk_datang; ?>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2"><strong>Total</strong></td>
                                        <td><strong>{{ $totjmltrip_datang }}</strong></td>
                                        <td><strong>{{ $epnp_datang }}</strong></td>
                                        <td><strong>{{ $er2_datang }}</strong></td>
                                        <td><strong>{{ $er4_datang }}</strong></td>
                                        <td><strong>{{ $ebus_datang }}</strong></td>
                                        <td><strong>{{ $etruk_datang }}</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
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
