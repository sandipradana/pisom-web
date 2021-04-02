@extends('layout.admin')

@section('title', 'Page Title')

@section('content')
<h1 class="mt-4">Kategori Berita</h1>
<form method="post" action="{{ route('admin.symptom.update', $symptom->id) }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label>Name</label>
        <input name="name" type="text" class="form-control" value="{{ $symptom->name }}" placeholder="Nama">
    </div>
    <button type="submit" class="btn btn-secondary">Simpan</button>
</form>
@endsection

@push('scripts')

@endpush