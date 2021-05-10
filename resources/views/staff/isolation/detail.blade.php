@extends('staff.layout')

@section('title', 'Isolasi')

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
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Rumah Sakit</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" value="{{ $patient->hospital->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Staff</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" value="{{ $patient->staff->name }}">
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Jurnal Pasien</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">Jurnal Pemeriksaan</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="profile">
                        <div class="container-fluid">
                            <div class="row">
                            <div class="col-md-6">
                                    <table class="table table-sm">
                                        <tbody>
                                            @foreach((isset($journal->day) ? $journal->day : []) as $day)
                                            <tr>
                                                <td><b>{{ $day->name }}</b><br />{{ date('d M Y', strtotime($day->date)) }}</td>
                                                <td><a href="{{ route('staff.isolation.todo.detail', [$journal->id, $day->id]) }}">View</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <div class="container-fluid">
                                        <div class="row">
                                            @foreach($todoStats as $key => $value)
                                                @if(count($value['label']) > 0)
                                                <div class="col-md-12">
                                                    <canvas id="todo_{{ $key }}" height="400"></canvas>
                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="buzz">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-sm">
                                        <tbody>
                                            @foreach((isset($journal->day) ? $journal->day : []) as $day)
                                            <tr>
                                                <td><b>{{ $day->name }}</b><br />{{ date('d M Y', strtotime($day->date)) }}</td>
                                                <td><a href="{{ route('staff.isolation.check.detail', [$journal->id, $day->id]) }}">View</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <canvas id="symptom" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@foreach($todoStats as $key => $value)
@if(count($value['label']) > 0)
<script>
    var ctxsymptom = document.getElementById('todo_{{ $key }}').getContext('2d');
    var chartsymptom = new Chart(ctxsymptom, {
        options: {
            title: {
                display: true,
                text: 'Grafik {{ $todoStats[$key]["name"] }}'
            },
            legend: {
                position: 'bottom',
            }
        },
        type: 'doughnut',
        data: {
            labels: {!!json_encode($value['label']) !!},
                datasets: [{
                label: 'Grafik Gejala',
                data: {!!json_encode($value['value']) !!},
                backgroundColor: [
                    '#9DEDEC',
                    '#DE9BE8',
                    'rgba(255, 206, 86, 0.9)',
                    'rgba(75, 192, 192, 0.9)',
                    'rgba(153, 102, 255, 0.9)',
                    'rgba(255, 159, 64, 0.9)'
                ],
            }]
        },
    });
</script>
@endif
@endforeach
<script>
    var ctxsymptom = document.getElementById('symptom').getContext('2d');
    var chartsymptom = new Chart(ctxsymptom, {
        options: {
            title: {
                display: true,
                text: 'Grafik Gejala'
            },
            legend: {
                position: 'bottom',
            }
        },
        type: 'doughnut',
        data: {
            labels: {!!json_encode($symptomStats['label']) !!},
            datasets: [{
                label: 'Grafik Gejala',
                data: {!!json_encode($symptomStats['value']) !!},
                backgroundColor: [
                    '#9DEDEC',
                    '#DE9BE8',
                    'rgba(255, 206, 86, 0.9)',
                    'rgba(75, 192, 192, 0.9)',
                    'rgba(153, 102, 255, 0.9)',
                    'rgba(255, 159, 64, 0.9)'
                ],
            }]
        },
    });
</script>
@endpush


@section('breadcrumb')
<div style="float: right;">
    <a href="{{ route('staff.isolation.print-detail', $journal->id) }}" class="btn btn-danger">Print</a>
    <a href="{{ route('staff.isolation.certificate', $journal->id) }}" class="btn btn-danger">Sertifikat</a>
</div>
@endsection