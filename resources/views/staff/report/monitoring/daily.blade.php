@extends('staff.layout')

@section('title', 'Rekap Pemantauan Harian')
@section('sub-title', '')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Date :</label>
                                    <div class="input-group date" id="date" data-target-input="nearest">
                                        <input type="text" name="filter_date" class="form-control datetimepicker-input" data-target="#date" value="{{ date('Y/m/d') }}" />
                                        <div class="input-group-append" data-target="#date" data-toggle="datetimepicker">
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
                <table id="table" class="table dataTable no-footer" role="grid" aria-describedby="isolation-table_info" style="width: 1031px;">
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function() {
        window.LaravelDataTables = window.LaravelDataTables || {};
        window.LaravelDataTables["table"] = $("#table").DataTable({
            "serverSide": true,
            "processing": true,
            "ajax": {
                "url": "{{ route('staff.report.monitoring.daily.data') }}",
                "type": "GET",
                "data": function(data) {
                    data.filter_date = $('input[name=filter_date]').val();
                }
            },
            "columns": [
                {
                    "data": "id",
                    "name": "id",
                    "title": "Id",
                    "orderable": true,
                    "searchable": true
                },
                {
                    "data": "date",
                    "name": "date",
                    "title": "Tanggal",
                    "orderable": false,
                    "searchable": false
                },
                {
                    "data": "name",
                    "name": "name",
                    "title": "Nama",
                    "orderable": true,
                    "searchable": true
                },
                {
                    "data": "age",
                    "name": "age",
                    "title": "Umur",
                    "orderable": false,
                    "searchable": false
                },
                {
                    "data": "gender",
                    "name": "gender",
                    "title": "Jenis Kelamin",
                    "orderable": false,
                    "searchable": false
                },
                {
                    "data": "phone",
                    "name": "phone",
                    "title": "No Telepon",
                    "orderable": true,
                    "searchable": true
                },
                {
                    "data": "todo_status",
                    "name": "todo_status",
                    "title": "Cek Kegiatan",
                    "orderable": false,
                    "searchable": false
                },
                {
                    "data": "symptom_status",
                    "name": "symptom_status",
                    "title": "Cek Gejala",
                    "orderable": false,
                    "searchable": false
                }
            ],
            "dom": "Bfrtip",
            "order": [
                [0, "desc"]
            ]
        });
    });


    $('button[name=filter_button]').on('click', function(e) {
        window.LaravelDataTables["table"].draw();
        e.preventDefault();
    });

    $('button[name=filter_reset]').on('click', function(e) {
        $('input[name=filter_date_start]').val("");
        $('input[name=filter_date_end]').val("");
        window.LaravelDataTables["table"].draw();
        e.preventDefault();
    });

    $('button[name=filter_print]').on('click', function(e) {
        window.location = "{{ route('staff.report.monitoring.daily.print') }}?filter_date=" + $('input[name=filter_date]').val()
        e.preventDefault();
    });

</script>
<script>
    $('#date').datetimepicker({
        format: 'L'
    })
</script>
@endpush