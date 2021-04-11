@extends('staff.layout')

@section('title', 'Test')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label>Kode Pasien</label>
                    <input id="patient_id" name="patient_id" type="text" class="form-control" value="{{ $test->patient->id }}" placeholder="Kode Pasien">
                </div>
                <div class="form-group">
                    <label>Nama Pasien</label>
                    <input id="patient_name" name="patient_name" type="text" class="form-control" value="{{ $test->patient->name }}" placeholder="Nama Pasien">
                </div>
                <div class="form-group">
                    <label>Jenis Test</label>
                    <input id="test_type_id" name="test_type_id" type="text" class="form-control" value="{{ $test->type->name }}" placeholder="Jenis Test">
                </div>
                <div class="form-group">
                    <label>Hasil</label>
                    <input id="result" name="result" type="text" class="form-control" value="{{ ['Negatif', 'Positif', 'Sembuh'][(int) $test->result - 1] }}" placeholder="Hasil">
                </div>
                <div class="form-group">
                    <label>Derajat</label>
                    <input id="case" name="case" type="text" class="form-control" value="{{ ['-', 'OTG', 'Ringan'][(int) $test->case] }}" placeholder="Hasil">
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('breadcrumb')
<div style="float: right;">
    <a href="{{ route('staff.isolation.store', [$test->patient->id, $test->id]) }}" class="btn btn-danger">Buat Isolasi</a>
    <a href="{{ route('staff.test.print-detail', [$test->id]) }}" class="btn btn-danger">Cetak</a>
</div>
@endsection

@push('scripts')
<script>
    $("#patient_id").on('input', function() {
        $.get("/api/patient/" + $("#patient_id").val(), function(data) {
            $("#patient_name").val(data.name);
        }).fail(function() {
            $("#patient_name").val("-");
        });
    });
</script>
@endpush