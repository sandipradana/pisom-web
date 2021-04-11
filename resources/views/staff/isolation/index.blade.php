@extends('staff.layout')

@section('title', 'Isolasi')

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



@push('scripts')
<script>
$(function() {
    window.LaravelDataTables = window.LaravelDataTables || {};
    window.LaravelDataTables["isolation-table"] = $("#isolation-table").DataTable({
        "serverSide": true,
        "processing": true,
        "ajax": {
            "url": "{{ route('staff.isolation.index') }}",
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
            "title": "Kode Pasien",
            "orderable": true,
            "searchable": true
        }, {
            "data": "patient.name",
            "name": "patient.name",
            "title": "Nama Pasien",
            "orderable": true,
            "searchable": true
        }, {
            "data": "start",
            "name": "start",
            "title": "Start",
            "orderable": true,
            "searchable": true
        }, {
            "data": "end",
            "name": "end",
            "title": "End",
            "orderable": true,
            "searchable": true
        }, {
            "data": "action",
            "name": "action",
            "title": "Action",
            "orderable": true,
            "searchable": true
        }],
        "order": [
            [1, "desc"]
        ]
    });
});

    $('button[name=filter_button]').on('click', function(e) {
        window.LaravelDataTables["isolation-table"].draw();
        e.preventDefault();
    });

    $('button[name=filter_reset]').on('click', function(e) {
        $('input[name=filter_date_start]').val("");
        $('input[name=filter_date_end]').val("");
        window.LaravelDataTables["isolation-table"].draw();
        e.preventDefault();
    });

    $('button[name=filter_print]').on('click', function(e) {
        window.location = "{{ route('staff.isolation.print') }}?filter_date_start=" + $('input[name=filter_date_start]').val() + "&filter_date_end=" + $('input[name=filter_date_end]').val()
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