@extends('staff.layout')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $total['patient'] }}</h3>
                <p>Pasien</p>
            </div>
            <div class="icon">
                <i class="fas fa-users right"></i>
            </div>
            <a href="{{ route('staff.patient.index') }}" class="small-box-footer">Info lanjut <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $total['test'] }}</h3>
                <p>Test</p>
            </div>
            <div class="icon">
                <i class="fas fa-stethoscope right"></i>
            </div>
            <a href="{{ route('staff.test.index') }}" class="small-box-footer">Info lanjut <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $total['isolation'] }}</h3>
                <p>Isolasi Mandiri</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('staff.isolation.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card mb-4 p-2">
            <canvas id="patient" height="400"></canvas>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-4 p-2">
            <canvas id="gender" height="400"></canvas>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-4 p-2">
            <canvas id="derajat" height="400"></canvas>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-4 p-2">
            <canvas id="cormobid" height="400"></canvas>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-4 p-2">
            <canvas id="symptom" height="400"></canvas>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    var ctxpatient = document.getElementById('patient').getContext('2d');
    var chartpatient = new Chart(ctxpatient, {
        options: {
            title: {
                display: true,
                text: 'Status Isolasi'
            },
            legend: {
                position: 'bottom',
            }
        },
        type: 'doughnut',
        data: {
            labels: {
                !!json_encode($stats['patient']['index']) !!
            },
            datasets: [{
                label: 'Pasien Isolasi',
                data: {
                    !!json_encode($stats['patient']['value']) !!
                },
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
<script>
    var ctxgender = document.getElementById('gender').getContext('2d');
    var chartgender = new Chart(ctxgender, {
        options: {
            title: {
                display: true,
                text: 'Jenis Kelamin'
            },
            legend: {
                position: 'bottom',
            }
        },
        type: 'pie',
        data: {
            labels: {
                !!json_encode($stats['gender']['index']) !!
            },
            datasets: [{
                label: 'Jenis Kelamin',
                data: {
                    !!json_encode($stats['gender']['value']) !!
                },
                backgroundColor: [
                    '#64b5f6',
                    '#e57373'
                ],
            }]
        }
    });
</script>
<script>
    var ctxcormobid = document.getElementById('cormobid').getContext('2d');
    var chartcormobid = new Chart(ctxcormobid, {
        options: {
            title: {
                display: true,
                text: 'Penyakit Bawaan'
            },
            legend: {
                position: 'bottom',
            }
        },
        type: 'bar',
        data: {
            labels: {
                !!json_encode($stats['cormobid']['index']) !!
            },
            datasets: [{
                label: {
                    !!json_encode($stats['cormobid']['index']) !!
                },
                data: {
                    !!json_encode($stats['cormobid']['value']) !!
                },
                backgroundColor: [
                    '#64b5f6',
                    '#e57373'
                ],
                borderWidth: 1
            }]
        }
    });
</script>
<script>
    var ctxderajat = document.getElementById('derajat').getContext('2d');
    var chartderajat = new Chart(ctxderajat, {
        options: {
            title: {
                display: true,
                text: 'Derajat Pasien'
            },
            legend: {
                position: 'bottom',
            }
        },
        type: 'pie',
        data: {
            labels: {
                !!json_encode($stats['case']['index']) !!
            },
            datasets: [{
                label: 'Derajat Kasus',
                data: {
                    !!json_encode($stats['case']['value']) !!
                },
                backgroundColor: [
                    '#A4E374',
                    '#FCFC97',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderWidth: 1
            }]
        }
    });
</script>
<script>
    var ctxsymptom = document.getElementById('symptom').getContext('2d');
    var chartsymptom = new Chart(ctxsymptom, {
        options: {
            title: {
                display: true,
                text: 'Gejala Pasien'
            },
            legend: {
                position: 'bottom',
            }
        },
        type: 'bar',
        data: {
            labels: {
                !!json_encode($stats['symptom']['index']) !!
            },
            datasets: [{
                label: {
                    !!json_encode($stats['symptom']['index']) !!
                },
                data: {
                    !!json_encode($stats['symptom']['value']) !!
                },
                backgroundColor: [
                    '#9DEDEC',
                    '#DE9BE8',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],

                borderWidth: 1
            }]
        },
    });
</script>
@endpush