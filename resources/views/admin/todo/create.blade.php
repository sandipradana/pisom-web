@extends('layout.admin')

@section('title', 'Page Title')

@section('content')
<h1 class="mt-4">Kegiatan</h1>
<form method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label>Name</label>
        <input name="name" type="text" class="form-control" placeholder="Nama">
    </div>
	<div class="form-group">
        <label>Kategori</label>
        <select name="category_id" class="form-control">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-secondary">Simpan</button>
</form>
@endsection

@push('scripts')

@endpush