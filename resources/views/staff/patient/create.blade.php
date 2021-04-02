@extends('staff.layout')

@section('title', 'Pasien')
@section('sub-title', 'Buat Baru')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" type="text" class="form-control" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="text" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="text" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label>No Hp</label>
                        <input name="phone" type="text" class="form-control" placeholder="No Hp">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input name="date_of_birth" type="date" class="form-control" placeholder="Tanggal Lahir">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input name="address" type="text" class="form-control" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="gender" class="form-control">
                            <option value="1">Laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-danger btn-block">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush