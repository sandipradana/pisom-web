@extends('admin.layout')

@section('title', 'Dashboard')
@section('page-title', 'Page Title')

@section('content')
<!--
  <div class="col-12 col-sm-12 col-md-12 mb-1">
    <div class="card">
      <div class="card-body">
        <div id="map" style="height: 400px;"></div>
      </div>
    </div>
  </div>
  -->
<h5 class="mb-2">Pengguna</h5>
<div class="row">
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Admin</span>
        <span class="info-box-number">
          {{ $total_admin }}
        </span>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-nurse"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Petugas</span>
        <span class="info-box-number">{{ $total_staff }}</span>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-injured"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Pasien</span>
        <span class="info-box-number">{{ $total_patient }}</span>
      </div>
    </div>
  </div>
</div>

<h5 class="mb-2">Berita</h5>
<div class="row">
  <div class="col-12 col-sm-6 col-md-6">
    <div class="info-box">
      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-newspaper"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Berita</span>
        <span class="info-box-number">
          {{ $total_news }}
        </span>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-6">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-folder-open"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Kategori Berita</span>
        <span class="info-box-number">{{ $total_news }}</span>
      </div>
    </div>
  </div>
</div>

<h5 class="mb-2">Master</h5>
<div class="row">
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-hospital"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Rumah Sakit</span>
        <span class="info-box-number">{{ $total_hospital }}</span>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-pills"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Obat</span>
        <span class="info-box-number">{{ $total_medicine }}</span>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-diagnoses"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Gejala</span>
        <span class="info-box-number">{{ $total_symptom }}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-stethoscope"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Jenis Test</span>
        <span class="info-box-number">{{ $total_test }}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
</div>
<div class="row">
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-running"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Jenis Kegiatan</span>
        <span class="info-box-number">{{ $total_todo }}</span>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-folder"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Kategori Kegiatan</span>
        <span class="info-box-number">{{ $total_todo_category }}</span>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-stethoscope"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Penyakit Bawaan</span>
        <span class="info-box-number">{{ $total_todo_category }}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
</div>

@endsection

@push('scripts')
<script>
  $(document).ready(function() {

    return;

    $(function() {
      new jvm.Map({
        map: 'indonesia_id',
        container: $('#map'),
      });
    });
  });
</script>
@endpush