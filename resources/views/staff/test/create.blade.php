@extends('staff.layout')

@section('title', 'Test')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Kode Pasien</label>
                        <input id="patient_id" name="patient_id" type="text" class="form-control" value="{{ $patient_id }}" placeholder="Kode Pasien">
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
                    <div class="form-group">
                        <label>Dokumen</label>
                        <input class="form-control" type="file" name="doc">
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger">Simpan</button>
                 </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $.get("/api/patient/" + $("#patient_id").val(), function(data) {
        $("#patient_name").val(data.name);
    }).fail(function() {
        $("#patient_name").val("-");
    });
    
    $("#patient_id").on('input', function() {
        $.get("/api/patient/" + $("#patient_id").val(), function(data) {
            $("#patient_name").val(data.name);
        }).fail(function() {
            $("#patient_name").val("-");
        });
    });
</script>
@endpush