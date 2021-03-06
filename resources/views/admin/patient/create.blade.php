@extends('admin.layout')

@section('title', 'Page Title')

@section('content')
<h1 class="mt-4">Buat Admin</h1>
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
        <input name ="password" type="password" class="form-control" placeholder="Password">
    </div>
    <div class="form-group">
        <label>No Hp</label>
        <input name="phone" type="text" class="form-control" placeholder="No Hp">
    </div>
    <button type="submit" class="btn btn-secondary">Simpan</button>
</form>
@endsection

@push('scripts')

@endpush