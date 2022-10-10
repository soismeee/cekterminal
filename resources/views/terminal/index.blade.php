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
                <div id="success_message" name="success_message"></div>
                <div class="row need-validation">
                    <div class="col-lg-4">
                        <div class="col-12 input">
                            <label for="nama_terminal" class="form-label">Nama Terminal</label>
                            <input type="hidden" name="id" id="id">
                            <input type="text" class="form-control" required name="nama_terminal" id="nama_terminal" placeholder="Masukan nama terminal" required />
                            <div class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <button class="btn btn-warning" style="display: none" id="update-terminal">Ubah Terminal</button>
                            <button class="btn btn-primary" id="add-terminal">Tambah Terminal</button>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <table id="data-table" class="table data-table">
                                    <thead>
                                        <tr>
                                            <th width="10%">No</th>
                                            <th width="70%">Nama</th>
                                            <th width="20%">#</th>
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
            ajax: '/data_terminal',
            columns: [
                { data: 'DT_RowIndex', name: 'id' },
                { data: 'nama_terminal', name: 'nama_terminal' },
                { data: 'action'},
            ]
        });
    }

    $(document).on('click', '#add-terminal', function(e){
        e.preventDefault();
        
        var data = {'nama_terminal': $('#nama_terminal').val(), '_token': '{{ csrf_token() }}'};
        $.ajax({
            type: "POST",
            url: "/terminals",
            data: data,
            dataType: 'json',
            success: function (response){
                console.log(response);
                if (response.status == 401) {
                    $.each(response.errors, function(key, err_values){
                        $('.input').addClass('has-validation');
                        $('#success_message').addClass('alert alert-warning');
                        $('#success_message').text(response.errors);
                    });
                }else{
                    $('#success_message').addClass('alert alert-success alert-dismissible fade show');
                    $('#success_message').text(response.message);
                    $('#data-table').DataTable().ajax.reload();
                    $('#nama_terminal').val(null);
                }
            }
        });
    });

    $(document).on('click', '#edit-terminal', function(e){
        e.preventDefault();
        var id = $(this).val();
        $('#update-terminal').show();
        $('#add-terminal').hide();
        // console.log(id);
        $.ajax({
            type: "GET",
            url: "/terminals/"+id,
            success: function (response){
                console.log(response.data.nama_terminal.length);
                if (response.status == 401) {
                    $('#success_message').addClass('alert alert-warning');
                    $('#success_message').text(response.errors);
                }else{
                    $('#id').val(response.data.id);
                    $('#nama_terminal').val(response.data.nama_terminal);
                }
            }
        });
    });

    $(document).on('click', '#update-terminal', function(e){
        e.preventDefault();
        var data = {'nama_terminal': $('#nama_terminal').val(), '_token': '{{ csrf_token() }}'};
        var id = $('#id').val();
        $.ajax({
            type: "PUT",
            url: "/terminals/"+id,
            data: data,
            dataType: 'json',
            success: function (response){
                if (response.status == 404) {
                    $.each(response.errors, function(key, err_values){
                        console.log(response);
                        $('.input').addClass('has-validation');
                        $('#success_message').addClass('alert alert-warning');
                        $('#success_message').text(response.errors);
                    });
                }else{
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#data-table').DataTable().ajax.reload();
                    $('#nama_terminal').val(null);
                    $('#update-terminal').hide();
                    $('#add-terminal').show();
                }
            }
        });
    });

    $(document).on('click', '#delete-terminal', function(e){
        e.preventDefault();
        var id = $(this).val();
        $.ajax({
            type: "DELETE",
            url: "/terminals/"+id,
            data: {'_token': '{{ csrf_token() }}'},
            dataType: 'json',
            success: function (response){
                $('.hapusterminal').modal('hide');
                $('#success_message').addClass('alert alert-success');
                $('#success_message').text(response.message);
                $('#data-table').DataTable().ajax.reload();
            }
        });
    });

    
</script>
@endpush

@endsection