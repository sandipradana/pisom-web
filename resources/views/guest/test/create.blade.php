@extends('staff.layout')

@section('title', 'Page Title')

@section('content')
<h1 class="mt-4">Test</h1>
<form method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label>Kode Pasien</label>
        <input id="patient_id"  name="patient_id" type="text" class="form-control" placeholder="Kode Pasien">
    </div>
    <div class="form-group">
        <label>Nama Pasien</label>
        <input id="patient_name" name="patient_name" type="text" class="form-control" placeholder="Nama Pasien">
    </div>
    <div class="form-group">
        <label>Jenis Test</label>
        <select name="test_type_id" class="form-control">
            @foreach($testTypes as $testType)
                <option value="{{ $testType->id }}">{{ $testType->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Hasil</label>
        <select name="result" class="form-control">
            <option value="1">Negatif</option>
            <option value="2">Positif</option>
            <option value="3">Sembuh</option>
        </select>
    </div>
    <div class="form-group">
        <label>Derajat</label>
        <select name="case" class="form-control">
            <option value="0">-</option>
            <option value="1">OTG</option>
            <option value="2">Ringan</option>
        </select>
    </div>
    <button type="submit" class="btn btn-secondary">Simpan</button>
</form>
@endsection

@push('scripts')
<script>
    $("#patient_id").on('input', function() {
        $.get("/api/patient/" + $("#patient_id").val(), function( data ) {
            $( "#patient_name" ).val(data.name);
         }).fail(function() {
            $( "#patient_name" ).val("-");
        });
    });
</script>
@endpush