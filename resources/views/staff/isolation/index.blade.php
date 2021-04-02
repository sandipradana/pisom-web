@extends('staff.layout')

@section('title', 'Page Title')

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



@push('scripts')
    {{ $dataTable->scripts() }}
@endpush