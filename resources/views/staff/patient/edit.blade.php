@extends('staff.layout')

@section('title', 'Pasien')
@section('sub-title', 'Edit')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">ID Pasien</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" value="{{ $patient->id }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nama Pasien</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" value="{{ $patient->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" value="{{ $patient->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" value="{{ $patient->address }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Phone</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" value="{{ $patient->phone }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" value="{{ $patient->date_of_birth }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Umur</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" value="{{ \Carbon\Carbon::parse($patient->date_of_birth)->age }} Tahun">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" value="{{ ($patient->gender == 1 ? 'Laki-laki' : 'Perempuan') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Rumah Sakit</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" value="{{ $patient->hospital->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Petugas</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" value="{{ $patient->staff->name }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('breadcrumb')
<div style="float: right;">
    <a href="{{ route('staff.test.create', $patient->id) }}" class="btn btn-danger">Test</a>
    <button onclick="printDocument('{{ route('staff.patient.detail.print', $patient->id) }}')" class="btn btn-danger">Cetak</button>
    <a href="{{ route('staff.patient.edit', $patient->id) }}" class="btn btn-danger">Edit</a>
</div>
@endsection

@push('scripts')
<script>
    function printDocument(url) {
        var doc = window.open(url);
        doc.window.print();
        doc.onafterprint = function() {
            doc.close()
        }
    }
</script>
@endpush