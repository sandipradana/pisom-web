xtends('admin.layout')

@section('title', 'Page Title')

@section('content')
<h1 class="mt-4">Profil</h1>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label>Kode Admin</label>
			<input id="id" name="id" type="text" class="form-control" value="{{ $user->id }}" placeholder="ID Admin">
		</div>
		<div class="form-group">
			<label>Nama Pasien</label>
			<input id="name" name="name" type="text" class="form-control" value="{{ $user->name }}" placeholder="Nama Admin">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input id="email" name="email" type="text" class="form-control" value="{{ $user->email }}" placeholder="Email Admin">
		</div>
		<div class="form-group">
			<label>Telepon</label>
			<input id="telepon" name="phone" type="text" class="form-control" value="{{ $user->phone }}" placeholder="Telepon Admin">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input id="telepon" name="phone" type="text" class="form-control" placeholder="Password">
		</div>
		<div class="form-group">
			<input id="save" name="save" type="button" class="form-control btn-danger" value="Simpan">
		</div>
	</div>
</div>
@endsection

@push('scripts')

@endpush