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
                        {{-- <form class="row g-3"> --}}
                            <div class="col-md-6">
                                <label for="terminal_id" class="form-label">Terminal</label>
                                <select id="terminal_id" name="terminal_id" class="form-select">
                                    <option selected>Pilih Terminal</option>
                                    @foreach ($terminals as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_terminal }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="inputState" class="form-label">Jml Bis</label>
                                <input type="number" class="form-control" name="jml_bis" id="jml_bis" placeholder="Input jumlah bis">
                            </div>
                            <div class="col-md-3">
                                <label for="inputState" class="form-label">Jml Penumpang</label>
                                <input type="number" class="form-control" name="jml_penumpang" id="jml_penumpang" placeholder="Input jumlah penumpang">
                            </div>
                            <div class="col-md-6">
                                <label for="akaporakdp" class="form-label">AKAP or AKDP</label>
                                <select id="akaporakdp" name="akaporakdp" class="form-select">
                                    <option selected>Pilih Status</option>
                                    <option value="akap">AKAP</option>
                                    <option value="akdp">AKDP</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="datangorberangkat" class="form-label">Datang or Berangkat</label>
                                <select id="datangorberangkat" name="datangorberangkat" class="form-select">
                                    <option selected>Pilih Status</option>
                                    <option value="datang">Datang</option>
                                    <option value="berangkat">Berangkat</option>
                                </select>
                            </div>
                            <div class="col-10"></div>
                            <div class="col-2 mt-3">
                                <button id="add-data" class="btn btn-primary">Simpan Inputan</button>
                            </div>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <table id="data-table" class="table data-table">
                            <thead>
                                <tr>
                                    <th rowspan="2" width="5%">No</th>
                                    <th rowspan="2" width="30%">Terminal</th>
                                    <th rowspan="2" width="25%">Tanggal</th>
                                    <th colspan="2" width="20%" style="text-align: center">AKAP</th>
                                    <th colspan="2" width="20%" style="text-align: center">AKDP</th>
                                </tr>
                                <tr>    
                                    <th>Jml Bis</th>
                                    <th>Jml Orang</th>
                                    <th>Jml Bis</th>
                                    <th>Jml Orang</th>
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
                    ajax: '/data_input',
                    columns: [
                        { data: 'DT_RowIndex', name: 'id' },
                        { data: 'nama_terminal' },
                        { data: 'tanggal' },
                        { data: 'jml_bis_akap', name: 'jml_bis_akap' },
                        { data: 'jml_pnpg_akap', name: 'jml_pnpg_akap' },
                        { data: 'jml_bis_akdp', name: 'jml_bis_akdp' },
                        { data: 'jml_pnpg_akdp', name: 'jml_pnpg_akdp' },
                    ]
                });
            }

            $(document).on('click', '#add-data', function(e) {
                e.preventDefault();

                var data = {
                    'terminal_id': $('#terminal_id').val(),
                    'jml_bis': $('#jml_bis').val(),
                    'jml_penumpang': $('#jml_penumpang').val(),
                    'akaporakdp': $('#akaporakdp').val(),
                    'datangorberangkat': $('#datangorberangkat').val(),
                    '_token': '{{ csrf_token() }}'
                };
                console.log(data)
                $.ajax({
                    type: "POST",
                    url: "/savedata",
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
                            $('#terminal_id').val('Pilih Terminal');
                            $('#jml_bis').val(null);
                            $('#jml_penumpang').val(null);
                            $('#akaporakdp').val('Pilih Status');
                            $('#datangorberangkat').val('Pilih Status');
                        }
                    }
                });
            });
        </script>
    @endpush
@endsection
