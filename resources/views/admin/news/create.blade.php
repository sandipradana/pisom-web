@extends('admin.layout')

@section('title', 'Page Title')

@section('content')
<h1 class="mt-4">Buat Berita</h1>
<form method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label>Judul</label>
        <input name="title" type="text" class="form-control" placeholder="Judul">
    </div>
    <div class="form-group">
        <label>Konten</label>
        <textarea name="content" type="text" class="form-control" placeholder="Konten"></textarea>
    </div>
    <div class="form-group">
        <label>Thumbnail</label>
        <input class="form-control"  type="file" name="thumbnail">
    </div>
    <div class="form-group">
        <label>Featured</label>
        <select name="featured" class="form-control">
            <option value="0">Tidak</option>
            <option value="1">Ya</option>
        </select>
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