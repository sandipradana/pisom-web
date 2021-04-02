@extends('staff.layout')

@section('title', 'Pasien')
@section('sub-title', '')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <label>Filter</label>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control float-right" id="reservation">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-danger btn-lg btn-block">Filter</button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-danger btn-lg btn-block">Cetak</button>
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
    <a href="{{ route('staff.patient.create') }}" class="btn btn-danger">Buat Baru</a>
</div>
@endsection

@push('scripts')
{{$dataTable->scripts()}}

<script>
    $('#reservation').daterangepicker()
</script>
@endpush