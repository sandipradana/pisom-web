@extends('admin.layout')

@section('title', 'Page Title')

@section('content')
<h1 class="mt-4">Kegiatan</h1>
<form method="post" action="{{ route('admin.todotype.update', $todotype->id) }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label>Name</label>
        <input name="name" type="text" class="form-control" value="{{ $todotype->name }}" placeholder="Nama">
    </div>
	<div class="form-group">
        <label>Kategori</label>
        <select name="category_id" class="form-control">
            @foreach($categories as $category)
                <option @if($category->id == $todotype->todo_category_id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-secondary">Simpan</button>
</form>
@endsection

@push('scripts')

@endpush