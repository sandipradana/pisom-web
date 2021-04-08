@extends('staff.layout')

@section('title')
Journal Harian - {{ $day-> name}} ({{ $day->date }})
@endsection('content')

@section('content')
<h2 class="mt-4"></h2>
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
                        <a class="nav-link active" href="#satu" role="tab" data-toggle="tab">Jurnal Aktivitas</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="satu">
                        <table class="table table-sm">
                            <tbody>
                                @foreach($todos as $todo)
                                <tr>
                                    <td>{{ $todo->category->name }}<br />{{ ($todo->data == null ? $todo->type->name : $todo->data) }}</td>
                                    <td>{{ ($todo->status == 1 ? 'Sudah' : 'Belum') }}</a></td>
                                </tr>
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

@push('scripts')

@endpush