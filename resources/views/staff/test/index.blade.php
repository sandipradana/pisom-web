@extends('staff.layout')

@section('title', 'Test')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Start :</label>
                                    <div class="input-group date" id="startDate" data-target-input="nearest">
                                        <input type="text" name="filter_date_start" class="form-control datetimepicker-input" data-target="#startDate" />
                                        <div class="input-group-append" data-target="#startDate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>End :</label>
                                    <div class="input-group date" id="endDate" data-target-input="nearest">
                                        <input type="text" name="filter_date_end" class="form-control datetimepicker-input" data-target="#endDate" />
                                        <div class="input-group-append" data-target="#endDate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-4">
                                <label>&nbsp;</label>
                                <button type="button" name="filter_button" class="btn btn-danger btn-lg btn-block">Filter</button>
                            </div>
                            <div class="col-md-4">
                                <label>&nbsp;</label>
                                <button type="button" name="filter_reset" class="btn btn-danger btn-lg btn-block">Reset</button>
                            </div>
                            <div class="col-md-4">
                                <label>&nbsp;</label>
                                <button type="button" name="filter_print" class="btn btn-danger btn-lg btn-block">Print</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                {{ $dataTable->table(['class' => 'table']) }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('breadcrumb')
<div style="float: right;">
    <a href="{{ route('staff.patient.create') }}" class="btn btn-danger">Cetak</a>
    <a href="{{ route('staff.patient.create') }}" class="btn btn-danger">Buat Baru</a>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $(function() {
        window.LaravelDataTables = window.LaravelDataTables || {};
        window.LaravelDataTables["patient-table"] = $("#patient-table").DataTable({
            "serverSide": true,
            "processing": true,
            "ajax": {
                "url": "{{ route('staff.test.index') }}",
                "type": "GET",
                "data": function(data) {
                   
                    data.filter_date_start = $('input[name=filter_date_start]').val();
                    data.filter_date_end = $('input[name=filter_date_end]').val();

                    for (var i = 0, len = data.columns.length; i < len; i++) {
                        if (!data.columns[i].search.value) delete data.columns[i].search;
                        if (data.columns[i].searchable === true) delete data.columns[i].searchable;
                        if (data.columns[i].orderable === true) delete data.columns[i].orderable;
                        if (data.columns[i].data === data.columns[i].name) delete data.columns[i].name;
                    }
                    delete data.search.regex;
                }
            },
            "columns": [{
                "data": "id",
                "name": "id",
                "title": "Id",
                "orderable": true,
                "searchable": true
            }, {
                "data": "patient.id",
                "name": "patient.id",
                "title": "ID Pasien",
                "orderable": true,
                "searchable": true
            }, {
                "data": "patient.name",
                "name": "patient.name",
                "title": "Nama Pasien",
                "orderable": true,
                "searchable": true
            }, {
                "data": "type.name",
                "name": "type.name",
                "title": "Jenis",
                "orderable": true,
                "searchable": true
            }, {
                "data": "date",
                "name": "date",
                "title": "Tanggal",
                "orderable": true,
                "searchable": true
            }, {
                "data": "result_name",
                "name": "result_name",
                "title": "Hasil",
                "orderable": true,
                "searchable": true
            }, {
                "data": "case_name",
                "name": "case_name",
                "title": "Derajat",
                "orderable": true,
                "searchable": true
            }, {
                "data": "journal",
                "name": "journal",
                "title": "Buat Jurnal",
                "orderable": true,
                "searchable": true
            }, {
                "data": "action",
                "name": "action",
                "title": "Action",
                "orderable": true,
                "searchable": true
            }],
            "dom": "Bfrtip",
            "order": [
                [1, "desc"]
            ],
            "buttons": [{
                "extend": "create"
            }]
        });
    });

    $('button[name=filter_button]').on('click', function(e) {
        window.LaravelDataTables["patient-table"].draw();
        e.preventDefault();
    });

    $('button[name=filter_reset]').on('click', function(e) {
        $('input[name=filter_date_start]').val("");
        $('input[name=filter_date_end]').val("");
        window.LaravelDataTables["patient-table"].draw();
        e.preventDefault();
    });

    $('button[name=filter_print]').on('click', function(e) {
        window.location = "{{ route('staff.test.print') }}?filter_date_start=" + $('input[name=filter_date_start]').val() + "&filter_date_end=" + $('input[name=filter_date_end]').val()
        e.preventDefault();
    });
</script>
<script>
    $('#startDate').datetimepicker({
        format: 'L'
    });
    $('#endDate').datetimepicker({
        format: 'L'
    });
</script>
@endpush