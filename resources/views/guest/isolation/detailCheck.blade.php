@extends('staff.layout')

@section('title', 'Page Title')

@section('content')
<h2 class="mt-4">Journal Gejala Harian - {{ $day-> name}} ({{ $day->date }})</h2>
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
            <label class="col-sm-4 col-form-label">Phone</label>
            <div class="col-sm-8">
                <input type="text" readonly class="form-control" value="{{ $patient->phone }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-8">
                <input type="text" readonly class="form-control" value="{{ $patient->date_of_birth }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-8">
                <input type="text" readonly class="form-control" value="{{ ($patient->gender == 1 ? 'Laki-laki' : 'Perempuan') }}">
            </div>
        </div>
    </div>
</div>

<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" href="#satu" role="tab" data-toggle="tab">Jurnal Gejala Pasien</a>
    </li>
</ul>

<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="satu">
        <table class="table table-sm">
            <tbody>
                 @foreach($symptoms as $symptom)
                <tr>
                    <td><b>{{ $symptom->symptom->name }}</b></td>
                    <td>{{ ( $symptom->status == 1 ? 'Ada' : 'Tidak Ada') }}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')

@endpush