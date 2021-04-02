@extends('staff.layout')

@section('title', 'Page Title')

@section('content')
<h1 class="mt-4">Daftar Pasien</h1>
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

@if($test->result == 2)
<form method="post" action="{{ route('staff.isolation.store', [$test->patient->id, $test->id]) }}">
    {{ csrf_field() }}
    <button type="submit" class="btn btn-danger">Buat Journal</button>
</form>
@endif
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