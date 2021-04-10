@extends('staff.patient.layout')

@section('title', 'Pasien')
@section('sub-title', 'Detil')

@section('sub-content')
<div class="row p-2">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-sm table-striped">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nama Penyakit</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach($patient_cormobid as $cormobid)
                        <tr>
                            <td width="10px">{{ $i }}</td>
                            <td><b>{{ $cormobid->cormobid->name }}</b></td>
                            <td><a href="{{ route('staff.patient.cormobid.delete', [$patient->id, $cormobid->id]) }}">Delete</a></td>
                        </tr>
                        <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('staff.patient.cormobid.add', $patient->id) }}">
                    {{ csrf_field() }}
                    <label class="form-label">Tambah Penyakit Bawaan</label>
                    <select name="cormobidId" class="form-control form-sm">
                        <option value="-">Pilih Penyakit</option>
                        @foreach($cormobids as $cormobid)
                        <option value="{{ $cormobid->id }}">{{ $cormobid->name }}</option>
                        @endforeach
                    </select>
                    <input type="submit" class="btn btn-danger btn-block mt-2" readonly class="form-control" value="Tambah">
                </form>
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