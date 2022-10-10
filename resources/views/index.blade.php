@extends('layout.main')
@section('container')
    @push('css')
        <!-- page css -->
        <link href="/assets/vendors/datatables/dataTables.bootstrap.min.css" rel="stylesheet">
    @endpush

    <div class="main">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-muted mb-2">Jumlah Terminal</div>
                        <h3>{{ $terminals->count() }}</h3>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="text-muted mb-2">Jumlah data input</div>
                        <h3>{{ $inputdata->count() }}</h3>
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
