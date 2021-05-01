@extends('admin.layout')

@section('title', 'Kegiatan')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('admin.todo.update', $todotype->id) }}">
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
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush