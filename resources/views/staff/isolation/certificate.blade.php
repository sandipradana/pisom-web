@extends('staff.layout')

@section('title', 'Pasien')
@section('sub-title', '')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                @if($journal->journal_status == 1)
                    <img style="margin: 0 auto" class="img-fluid" src="{{ url($output_path) }}" />
                @else
                    <span class="danger">Pasien belum menyelesaikan isolasi mandiri.</span>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection