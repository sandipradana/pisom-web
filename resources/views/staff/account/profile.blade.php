@extends('staff.layout')

@section('title', 'Profil')

@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<form method="POST" action="{{ route('staff.account.update') }}">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Kode Staff</label>
							<input id="staff_id" name="id" type="text" class="form-control" value="{{ $user->id }}" placeholder="Kode Staff">
						</div>
						<div class="form-group">
							<label>Nama Pasien</label>
							<input id="staff_name" name="name" type="text" class="form-control" value="{{ $user->name }}" placeholder="Nama Staff">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input id="staff_email" name="email" type="text" class="form-control" value="{{ $user->email }}" placeholder="Email Staff">
						</div>
						<div class="form-group">
							<label>Telepon</label>
							<input id="staff_telepon" name="phone" type="text" class="form-control" value="{{ $user->phone }}" placeholder="Telepon Staff">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input id="staff_telepon" name="password" type="text" class="form-control" placeholder="Password">
						</div>
						<div class="form-group">
							<input id="staff_save" name="save" type="submit" class="form-control btn-danger" value="Simpan">
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')

@endpush