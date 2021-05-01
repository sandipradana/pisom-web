@extends('admin.layout')

@section('title', 'Patient')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" type="text" class="form-control" value="{{ $patient->name }}" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="text" class="form-control" value="{{ $patient->email }}" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>No Hp</label>
                        <input name="phone" type="text" class="form-control" value="{{ $patient->phone }}" placeholder="No Hp">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush