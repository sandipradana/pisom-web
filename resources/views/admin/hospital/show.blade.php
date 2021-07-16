@extends('admin.layout')

@section('title', 'Rumah Sakit')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('admin.hospital.update', $hospital->id) }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" type="text" class="form-control" value="{{ $hospital->name }}" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input name="address" type="text" class="form-control" value="{{ $hospital->address }}" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input name="phone" type="text" class="form-control" value="{{ $hospital->phone }}" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="text" class="form-control" value="{{ $hospital->email }}" placeholder="Email">
                    </div>
                    <button type="submit" class="btn btn-danger">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush