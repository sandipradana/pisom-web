@extends('staff.layout')

@section('title', 'Page Title')

@section('content')
<h1 class="mt-4">Daftar Test Pasien</h1>
<div class="row">
    <div class="col-md-12">
        {{$dataTable->table()}}
    </div>
</div>
@endsection

@push('scripts')
    {{$dataTable->scripts()}}
@endpush