@extends('admin.layout')

@section('title', 'Rumah Sakit')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" type="text" class="form-control" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input name="address" type="text" class="form-control" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input name="phone" type="text" class="form-control" placeholder="Phone">
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