@extends('admin.layout')

@section('title', 'Berita')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="{{ route('admin.news.update',  $news->id) }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Judul</label>
                        <input name="title" type="text" class="form-control" value="{{ $news->title }}" placeholder="Judul">
                    </div>
                    <div class="form-group">
                        <label>Konten</label>
                        <textarea name="content" type="text" class="form-control" value="{{ $news->content }}" placeholder="Konten">{{ $news->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Thumbnail</label>
                        <input class="form-control" type="file" name="thumbnail">
                    </div>
                    <div class="form-group">
                        <label>Featured</label>
                        <select name="featured" class="form-control">
                            <option @if($news->featured == 0) selected @endif value="0">Tidak</option>
                            <option @if($news->featured == 1) selected @endif value="1">Ya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="category_id" class="form-control">
                            @foreach($categories as $category)
                            <option @if($category->id == $news->category_id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
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