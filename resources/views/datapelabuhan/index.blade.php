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
                            <label for="nama_pelabuhan" class="form-label">Nama Pelabuhan</label>
                            <input type="hidden" name="id" id="id">
                            <input type="text" class="form-control" required name="nama_pelabuhan" id="nama_pelabuhan" placeholder="Masukan nama Pelabuhan" required />
                            <div class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <button class="btn btn-warning" style="display: none" id="update-pelabuhan">Ubah Pelabuhan</button>
                            <button class="btn btn-primary" id="add-pelabuhan">Tambah Pelabuhan</button>
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
            ajax: '/data_pelabuhan',
            columns: [
                { data: 'DT_RowIndex', name: 'id' },
                { data: 'nama_pelabuhan', name: 'nama_pelabuhan' },
                { data: 'action'},
            ]
        });
    }

    $(document).on('click', '#add-pelabuhan', function(e){
        e.preventDefault();
        
        var data = {'nama_pelabuhan': $('#nama_pelabuhan').val(), '_token': '{{ csrf_token() }}'};
        $.ajax({
            type: "POST",
            url: "/pelabuhans",
            data: data,
            dataType: 'json',
            success: function (response){
                if (response.status == 401) {
                    $.each(response.errors, function(key, err_values){
                        console.log(response);
                        $('.input').addClass('has-validation');
                        $('#success_message').addClass('alert alert-warning');
                        $('#success_message').text(response.errors);
                    });
                }else{
                    $('#success_message').addClass('alert alert-success alert-dismissible fade show');
                    $('#success_message').text(response.message);
                    $('#data-table').DataTable().ajax.reload();
                    $('#nama_pelabuhan').val(null);
                }
            }
        });
    });

    $(document).on('click', '#edit-pelabuhan', function(e){
        e.preventDefault();
        var id = $(this).val();
        $('#update-pelabuhan').show();
        $('#add-pelabuhan').hide();
        // console.log(id);
        $.ajax({
            type: "GET",
            url: "/pelabuhans/"+id,
            success: function (response){
                if (response.status == 401) {
                    $('#success_message').addClass('alert alert-warning');
                    $('#success_message').text(response.errors);
                }else{
                    $('#id').val(response.data.id);
                    $('#nama_pelabuhan').val(response.data.nama_pelabuhan);
                }
            }
        });
    });

    $(document).on('click', '#update-pelabuhan', function(e){
        e.preventDefault();
        var data = {'nama_pelabuhan': $('#nama_pelabuhan').val(), '_token': '{{ csrf_token() }}'};
        var id = $('#id').val();
        $.ajax({
            type: "PUT",
            url: "/pelabuhans/"+id,
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
                    $('#nama_pelabuhan').val(null);
                    $('#update-terminal').hide();
                    $('#add-terminal').show();
                }
            }
        });
    });

    $(document).on('click', '#delete-pelabuhan', function(e){
        e.preventDefault();
        var id = $(this).val();
        $.ajax({
            type: "DELETE",
            url: "/pelabuhans/"+id,
            data: {'_token': '{{ csrf_token() }}'},
            dataType: 'json',
            success: function (response){
                $('.hapuspelabuhan').modal('hide');
                $('#success_message').addClass('alert alert-success');
                $('#success_message').text(response.message);
                $('#data-table').DataTable().ajax.reload();
            }
        });
    });

    
</script>
@endpush

@endsection