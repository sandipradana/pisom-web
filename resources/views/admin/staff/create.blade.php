@extends('admin.layout')

@section('title', 'Staff')

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
                        <label>Email</label>
                        <input name="email" type="text" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label>No Hp</label>
                        <input name="phone" type="text" class="form-control" placeholder="No Hp">
                    </div>
                    <div class="form-group">
                        <label>Rumah Sakit</label>
                        <select name="hospital_id" class="form-control">
                            @foreach($hospitals as $hospital)
                            <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                            @endforeach
                        </select>
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