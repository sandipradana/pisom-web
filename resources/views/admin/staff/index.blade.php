@extends('admin.layout')

@section('title', 'Staff')

@section('content')
<div class="row">
    <div class="col-md-12">
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
    <a href="{{ route('admin.staff.create') }}" class="btn btn-danger">Buat Baru</a>
</div>
@endsection

@push('scripts')
    {{$dataTable->scripts()}}
@endpush