@extends('staff.layout')

@section('title', 'Pasien')
@section('sub-title', 'Edit')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <form method="POST">
                {{ csrf_field() }}
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
                                <input type="text" name="name" class="form-control" value="{{ $patient->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" name="email" class="form-control" value="{{ $patient->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="text" name="address" class="form-control" value="{{ $patient->address }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Phone</label>
                            <div class="col-sm-8">
                                <input type="text" name="phone" class="form-control" value="{{ $patient->phone }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">&nbsp;</label>
                            <div class="col-sm-8">
                                <input type="submit" class="form-control btn btn-danger" value="Simpan">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-8">
                                <input type="text" name="date_of_birth" class="form-control" value="{{ $patient->date_of_birth }}">
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
                                <select name="gender" class="form-control">
                                    <option value="1" @if($patient->gender == 1) selected @endif >Laki</option>
                                    <option value="2" @if($patient->gender == 2) selected @endif >Perempuan</option>
                                </select>
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
            </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('breadcrumb')

@endsection

@push('scripts')

@endpush