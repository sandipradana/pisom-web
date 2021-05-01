@extends('admin.layout')

@section('title', 'Kegiatan')

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
                        <label>Kategori</label>
                        <select name="category_id" class="form-control">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
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