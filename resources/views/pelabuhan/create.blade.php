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
                    <h4>Input data terminal</h4>
                    <p>Masukan beberapa data yang dibutuhkan</p>

                    <div class="row">
                        <div class="col-md-3">
                            <label class="form-label">Pilihan Pelabuhan</label>
                            <select id="pelabuhan_id" name="pelabuhan_id" class="form-select">
                                <option selected>Pilih Pelabuhan</option>
                                @foreach ($pelabuhan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_pelabuhan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="inputState" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Input jumlah bis">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Datang or Berangkat</label>
                            <select id="berangkatordatang" name="berangkatordatang" class="form-select">
                                <option selected>Pilih Status</option>
                                <option value="datang">Datang</option>
                                <option value="berangkat">Berangkat</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="inputState" class="form-label">Jml Trip</label>
                            <input type="number" class="form-control" name="jml_trip" id="jml_trip" placeholder="Input jumlah trip">
                        </div>
                        {{-- ######################################################################################################## --}}
                        <div class="col-md-2 mt-3">
                            <label for="inputState" class="form-label">E PNP</label>
                            <input type="number" class="form-control" name="e_pnp" id="e_pnp" placeholder="Input jumlah E PNP">
                        </div>
                        <div class="col-md-2 mt-3">
                            <label for="inputState" class="form-label">E R2</label>
                            <input type="number" class="form-control" name="e_r2" id="e_r2" placeholder="Input jumlah E PNP">
                        </div>
                        <div class="col-md-2 mt-3">
                            <label for="inputState" class="form-label">E R4</label>
                            <input type="number" class="form-control" name="e_r4" id="e_r4" placeholder="Input jumlah E PNP">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="inputState" class="form-label">E BUS</label>
                            <input type="number" class="form-control" name="e_bus" id="e_bus" placeholder="Input jumlah E PNP">
                        </div>
                        <div class="col-md-3 mt-3">
                            <label for="inputState" class="form-label">E TRUK</label>
                            <input type="number" class="form-control" name="e_truk" id="e_truk" placeholder="Input jumlah E PNP">
                        </div>
                        <div class="col-10"></div>
                        <div class="col-2 mt-3">
                            <button id="add-data" class="btn btn-primary">Simpan Inputan</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <table id="data-table" class="table data-table">
                            <thead>
                                <tr>
                                    <th rowspan="2">Tanggal</th>
                                    <th rowspan="2">Jml trip</th>
                                    <th colspan="5" style="text-align: center">Berangkat</th>
                                    <th rowspan="2">Jml trip</th>
                                    <th colspan="5" style="text-align: center">Datang</th>
                                </tr>
                                <tr>
                                    {{-- keberangkatan --}}
                                    <th>E pnp</th>
                                    <th>E r2</th>
                                    <th>E r4</th>
                                    <th>E bus</th>
                                    <th>E truk</th>
                                    {{-- kedatangan --}}
                                    <th>E pnp</th>
                                    <th>E r2</th>
                                    <th>E r4</th>
                                    <th>E bus</th>
                                    <th>E truk</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
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

        <script>
            $(document).ready(function () {
                loaddata();
            });

            function loaddata(){
                $('#data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    responseive: true,
                    ajax: '/data_input_pelabuhan',
                    columns: [
                        { data: 'tanggal' },
                        { data: 'jmltrip_berangkat', name: 'jmltrip_berangkat' },
                        { data: 'e_pnp_berangkat', name: 'e_pnp_berangkat' },
                        { data: 'e_r2_berangkat', name: 'e_r2_berangkat' },
                        { data: 'e_r4_berangkat', name: 'e_r4_berangkat' },
                        { data: 'e_bus_berangkat', name: 'e_bus_berangkat' },
                        { data: 'e_truk_berangkat', name: 'e_truk_berangkat' },
                        { data: 'jmltrip_datang', name: 'jmltrip_datang' },
                        { data: 'e_pnp_datang', name: 'e_pnp_datang' },
                        { data: 'e_r2_datang', name: 'e_r2_datang' },
                        { data: 'e_r4_datang', name: 'e_r4_datang' },
                        { data: 'e_bus_datang', name: 'e_bus_datang' },
                        { data: 'e_truk_datang', name: 'e_truk_datang' },
                    ]
                });
            }

            $(document).on('click', '#add-data', function(e) {
                e.preventDefault();

                var data = {
                    'pelabuhan_id': $('#pelabuhan_id').val(),
                    'tanggal': $('#tanggal').val(),
                    'berangkatordatang': $('#berangkatordatang').val(),
                    'jml_trip': $('#jml_trip').val(),
                    'e_pnp': $('#e_pnp').val(),
                    'e_r2': $('#e_r2').val(),
                    'e_r4': $('#e_r4').val(),
                    'e_bus': $('#e_bus').val(),
                    'e_truk': $('#e_truk').val(),
                    '_token': '{{ csrf_token() }}'
                };
                console.log(data)
                $.ajax({
                    type: "POST",
                    url: "/savedatapelabuhan",
                    data: data,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 401) {
                            $.each(response.errors, function(key, err_values) {
                                console.log(response);
                                $('.input').addClass('has-validation');
                                $('#success_message').addClass('alert alert-warning');
                                $('#success_message').text(response.errors);
                            });
                        } else {
                            $('#success_message').addClass(
                                'alert alert-success alert-dismissible fade show');
                            $('#success_message').text(response.message);
                            $('#data-table').DataTable().ajax.reload();
                        }
                    }
                });
            });
        </script>
    @endpush
@endsection
