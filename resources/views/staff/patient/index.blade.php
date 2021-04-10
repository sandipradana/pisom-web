@extends('staff.layout')

@section('title', 'Pasien')
@section('sub-title', '')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Start :</label>
                                    <div class="input-group date" id="startDate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#startDate" />
                                        <div class="input-group-append" data-target="#startDate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>End :</label>
                                    <div class="input-group date" id="endDate" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#endDate" />
                                        <div class="input-group-append" data-target="#endDate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <label>&nbsp;</label>
                                <button type="button" class="btn btn-danger btn-lg btn-block">Filter</button>
                            </div>
                            <div class="col-md-6">
                                <label>&nbsp;</label>
                                <button type="button" class="btn btn-danger btn-lg btn-block">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                {{ $dataTable->table(['class' => 'table']) }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('breadcrumb')
<div style="float: right;">
    <a href="{{ route('staff.patient.create') }}" class="btn btn-danger">Cetak</a>
    <a href="{{ route('staff.patient.create') }}" class="btn btn-danger">Buat Baru</a>
</div>
@endsection

@push('scripts')
{{$dataTable->scripts()}}
<script>
    $('#startDate').datetimepicker({
        format: 'L'
    });
    $('#endDate').datetimepicker({
        format: 'L'
    });
</script>
@endpush