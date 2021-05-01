@extends('admin.layout')

@section('title', 'Test')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('admin.testtype.update', $testtype->id) }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" type="text" class="form-control" value="{{ $testtype->name }}" placeholder="Nama">
                    </div>
                    <button type="submit" class="btn btn-secondary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush