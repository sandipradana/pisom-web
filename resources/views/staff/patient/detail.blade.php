@extends('staff.layout')

@section('title', 'Pasien')
@section('sub-title', 'Detil')

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
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#satu" role="tab" data-toggle="tab">Jurnal Pasien</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tiga" role="tab" data-toggle="tab">Riwayat Test</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#empat" role="tab" data-toggle="tab">Riwayat Penyakit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#lima" role="tab" data-toggle="tab">Resep Obat</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="satu">
                        <table class="table table-sm">
                            <tbody>
                                @foreach($journals as $journal)
                                <tr>
                                    <td><b>Jurnal-{{ $journal->id }}</b><br />{{ date('d M Y', strtotime($journal->start)) }} - {{ date('d M Y', strtotime($journal->end)) }}</td>
                                    <td><a href="{{ route('staff.isolation.detail', $journal->id) }}">View</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tiga">
                        <table class="table table-sm">
                            <tbody>
                                <tr>
                                    <td>Test ID</td>
                                    <td>Jenis Test</td>
                                    <td>Derajat</td>
                                    <td>Tanggal</td>
                                    <td>Hasil</td>
                                </tr>
                                @foreach($tests as $test)
                                <tr>
                                    <td><b>{{ $test->id }}</b></td>
                                    <td>{{ $test->type->name }}</b></td>
                                    <td>{{ ['-', 'OTG', 'Ringan'][(int) $test->case] }}</td>
                                    <td>{{ $test->date }}</td>
                                    <td>{{ ['Negatif', 'Positif', 'Sembuh'][(int) $test->result - 1] }}</td>
                                    <td><a href="{{ route('staff.test.detail', $journal->id) }}">View</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="empat">
                        <br />
                        <form method="post" action="{{ route('staff.patient.cormobid.add', $patient->id) }}">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Penyakit Bawaan</label>
                                <div class="col-sm-8">
                                    <select name="cormobidId" class="form-control">
                                        <option value="-">Pilih Penyakit</option>
                                        @foreach($cormobids as $cormobid)
                                        <option value="{{ $cormobid->id }}">{{ $cormobid->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">&nbsp;</label>
                                <div class="col-sm-8">
                                    <input type="submit" readonly class="form-control" value="Tambah">
                                </div>
                            </div>
                        </form>
                        <table class="table table-sm">
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
                    <div role="tabpanel" class="tab-pane fade" id="lima">
                        <br />
                        <form method="post" action="{{ route('staff.patient.medicine.add', $patient->id) }}">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Obat</label>
                                <div class="col-sm-8">
                                    <select name="medicineId" class="form-control">
                                        <option value="-">Pilih Obat</option>
                                        @foreach($medicines as $medicine)
                                        <option value="{{ $medicine->id }}">{{ $medicine->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">&nbsp;</label>
                                <div class="col-sm-8">
                                    <input type="submit" readonly class="form-control" value="Tambah">
                                </div>
                            </div>
                        </form>
                        <table class="table table-sm">
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($patient_medicine as $medicine)
                                <tr>
                                    <td width="10px">{{ $i }}</td>
                                    <td><b>{{ $medicine->medicine->name }}</b></td>
                                    <td><a href="{{ route('staff.patient.medicine.delete', [$patient->id, $medicine->id]) }}">Delete</a></td>
                                </tr>
                                <?php $i++; ?>
                                @endforeach
                            </tbody>
                        </table>
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
    <a href="{{ route('staff.patient.detail.print', $patient->id) }}" class="btn btn-danger">Cetak</a>
    <a href="{{ route('staff.patient.edit', $patient->id) }}" class="btn btn-danger">Edit</a>
</div>
@endsection

@push('scripts')

@endpush