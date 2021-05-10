@extends('staff.layout')

@section('title', 'Pasien')
@section('sub-title', '')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <img style="margin: 0 auto" class="img-fluid" src="{{ url($output_path) }}" />
            </div>
        </div>
    </div>
</div>
@endsection