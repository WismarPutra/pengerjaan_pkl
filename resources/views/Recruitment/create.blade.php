@extends('layouts.app')

@section('content')

<style>
/* SIDEBAR STYLE */
body {
  margin: 0;
  background-color: #E6E6FA;
}

.navbar {
  position: fixed;
  top: 0;
  left: 300px;
  width: calc(100% - 300px); 
  background-color: #FFFFFF;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px 25px;
  z-index: 1000;
  box-shadow: 0 0 2px var(--grey-color-light);
  height: 80px;
}

.left-info {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}

.navbar-name {
  font-size: 13px; 
  font-family: Poppins, sans-serif;
  color: #080808;
}

.navbar-date {
  font-size: 0.7em; /* Memperkecil ukuran email */
  color: #2F4F4F; /* Mengubah warna email */
}

.sidebar {
  width: 300px;
  background-color: #FFFFFF;
  position: fixed;
  top: 0;
  left: 0;
  padding: 20px;
  height: 100%
}

.sidebar ul {
  font-family: Poppins, sans-serif;
  font-size: 12px;
  padding: 9px;
  list-style-type: none;
  margin: 0;
  width: 250px;
  overflow: auto;
}

.sidebar ul li a {
  font-size: 12px;
  display: block;
  color: #2F4F4F;
  padding: 10px 16px;
  margin-bottom: 7px;
  text-decoration: none;
}

.sidebar ul li a.active {
  border-radius: 10px;
  background-color: rgba(38, 130, 255, 0.15);
  color: mediumblue;
  font-weight: bold;
}

ul li a:hover:not(.active) {
  border-radius: 10px;
  background-color: rgba(38, 130, 255, 0.15);
  color: mediumblue;
  font-weight: bold;
}

.main {
  margin-top: 25px;
  margin-bottom: 10px;
  color: #080808;
  font-size: 12px;
  font-weight: bold;
}

.config {
  margin-top: 25px;
  margin-bottom: 10px;
  color: #080808;
  font-size: 12px;
  font-weight: bold;
}

.menu i {
  margin-right: 8px;
}

.home-profile {
  border-bottom: 1px solid #A9A9A9;

}

.home-profile i {
  margin-right: 8px;
}

.sidebar .logo {
  display: flex; /* Mengaktifkan flexbox */
  align-items: center; /* Menyelaraskan elemen secara vertikal */
  gap: 20px;
  margin-bottom: 20px;
  border-bottom: 1px solid #A9A9A9;
  padding: 9px;
}

.sidebar .logo img {
  width: 45px; /* Atur lebar foto */
  height: 45px; /* Atur tinggi foto */
  border-radius: 10%;
}

.logo-info {
  display: flex;
}

.logo-name {
  font-size: 16px; 
  font-weight: bolder;
  font-family: Poppins, sans-serif;
  color: #2F4F4F;
}

.sidebar .profile {
  display: flex; /* Mengaktifkan flexbox */
  align-items: center; /* Menyelaraskan elemen secara vertikal */
  gap: 20px;
  margin-bottom: 10px;
  border-bottom: 1px solid #A9A9A9;
  padding: 9px;
}

.sidebar .profile img {
  width: 45px; /* Atur lebar foto */
  height: 45px; /* Atur tinggi foto */
  border-radius: 10%;
}

.profile-info {
  display: flex;
  flex-direction: column; /* Mengatur nama dan email menjadi kolom */
}

.profile-name {
  font-size: 13px; /* Membuat nama lebih tebal */
  font-family: Poppins, sans-serif;
  color: #080808;
}

.profile-email {
  font-size: 0.7em; /* Memperkecil ukuran email */
  color: #2F4F4F; /* Mengubah warna email */
}

/* TALENT MANAGEMENT STYLES */
#customers {
  font-family: Poppins, sans-serif;  
  border-collapse: collapse;
  width: 100%;
  margin-top: 10px;
}

#customers td, #customers th {
  border: none;
  font-size: 12px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}

#customers th {
  border-bottom: 1px solid #A9A9A9;
  padding-top: 12px;
  padding-bottom: 12px;
  padding-left: 15px;
  padding-right: 12px;
  text-align: left;
  background-color: #E6E6FA;
  color: #080808;
}

#customers td {
  border-bottom: 1px solid #A9A9A9;
  padding: 1px;
  padding-left: 15px;
  padding-right: 12px;
  color: #2F4F4F;
  background-color: white;
}

.horizontal-dots {
    background: none;
    border: none;
    font-size: 30px;
    cursor: pointer;
    color: mediumblue;
    font-weight: bold;
}

.dropdown-action {
    position: relative;
    display: inline-block;
}

.dropdown-action-content {
    display: none;
    position: absolute;
    background-color: white;
    min-width: 100px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    z-index: 1;
    border: 1px solid #ccc;
    padding: 5px;
}

.dropdown-action-detail {
  font-family: Poppins, sans-serif;
  font-weight: normal;
  font-size: 12px;
  color: #555;
  text-decoration: none;
}

.dropdown-action:hover .dropdown-action-content {
    display: block;
}

.page-title {
    font-size: 16px;
    margin-bottom: 20px;
    margin-top: 10px;
    font-family: Poppins, sans-serif;
    font-weight: bolder;
    margin-right: 20px;
    margin-left: 1px;
}

.first, .sec, .third {
    display: inline-block;
    font-weight: bold;
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 12px;
    min-width: 120px;
    text-align: center;
}
.first {
    background-color: rgba(245, 40, 145, 0.1);
    color: deeppink;
}
.sec {
    background-color: rgba(39, 238, 245, 0.15);
    color: mediumturquoise;
}
.third {
    background-color: rgba(38, 130, 255, 0.15);
    color: mediumblue;
}


/* OFFSET UNTUK KONTEN */
.content-header-flex {
    background-color: white;
    padding: 24px 32px;
    padding-top: 40px;
    margin-left: 260px;
    margin-right: 1px;
    border-radius: 20px;
    margin-top: 100px;
    min-height: unset; /* Biar tetap tinggi meski tanpa isi */
    position: relative;
    display: flex; 
    flex-direction: column;
    justify-content: flex-start; /* Memberi jarak antara konten dan tombol */
    align-items: flex-start; /* Menyelaraskan elemen di bagian atas */
    max-width: 100%;
    width: 1100px; /* Sidebar width + padding */
    box-sizing: border-box;
    flex-wrap: wrap;
}

.btn-home {
    padding: 6px 12px;
    border-radius: 6px;
    display: flex;
    align-items: center;
    gap: 6px;
    width: fit-content;
    margin-bottom: 8px;
    color: #696969;
}

.btn-home:hover {
    color: #808080;
}

.breadcrumb-row {
  display: flex;
  align-items: center;
  gap: 8px;
}

.breadcrumb-arrow {
  margin-bottom: 8px;
  padding: 2px 6px;
  color: #696969;
  font-size: 14px;
  gap: 8px;
  margin-left: 8px;
}

.breadcrumb-text {
  font-family: Poppins, sans-serif;
  font-weight: normal;
  font-size: 14px;
  color: #555;
  text-decoration: none;
  margin-bottom: 4px;
  padding: 2px 6px;
}

.breadcrumb-text:hover {
  color: #808080;
}

#customers {
  font-family: Poppins, sans-serif;  
  border-collapse: collapse;
  width: 100%;
  margin-top: 10px;
}

#customers td, #customers th {
  border: none;
  font-size: 12px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}
#customers tr:hover {background-color: #ddd;}

#customers th {
  border-bottom: 1px solid #A9A9A9;
  padding-top: 14px;
  padding-bottom: 14px;
  padding-left: 15px;
  padding-right: 12px;
  text-align: left;
  background-color: #E6E6FA;
  color: #080808;
}

#customers td {
  border-bottom: 1px solid #A9A9A9;
  padding: 1px;
  padding-left: 15px;
  padding-right: 12px;
  padding-bottom: 14px;
  color: #2F4F4F;
  background-color: white;
  padding-top: 14px;

}

.trash-btn {
  border: none;
  background: none;
  padding: 0;
  margin: 0;
  cursor: pointer;
}

.trash-btn i {
  color: red;
  font-size: 18px;
  text-align: center;
}

.form-grid {
  display: grid;
  grid-template-columns: repeat(2, 500px);
  gap: 20px;
  font-family: Poppins, sans-serif;
  font-weight: 200;
  font-size: 14px;
}

.form-group {
  display: flex;
  flex-direction: column;
  margin-right: 50px;
  width: 450px;
}

.label-group {
  display: flex;
  align-items: center;
  gap: 4px;
}

label {
  font-size: 14px;
  font-weight: 200;
  margin-bottom: 6px;
}

.bintang {
  color: red;
}

.form-control {
  padding: 12px;
  font-size: 14px;
  border-radius: 8px;
  border: 1px solid #ccc;
  background-color: white;
}

.form-control1 {
  padding: 12px;
  font-size: 14px;
  border-radius: 8px;
  border: 1px solid #ccc;
  background-color: white;
}

.form-control-read {
  padding: 12px;
  font-size: 14px;
  border-radius: 8px;
  border: 1px solid #ccc;
  background-color: #eaeaea;
}

.form-control:read-only {
  background-color: white;
}

textarea.form-control {
  resize: vertical;
  min-height: 100px;
}

.divider {
  margin: 30px 0;
  border-top: 3px solid #A9A9A9;
}

.file-input {
  display: flex;
  align-items: center;
  border: 1px solid #ddd;
  border-radius: 8px;
  overflow: hidden;
  width: 100%;
  padding: 5px 15px;
}

.file-text {
  flex: 1;
  border: none;
  padding: 10px;
  font-size: 12px;
  color: #666;
  font-weight: normal;
  margin-left: -10px;
}

.file-text:focus {
  outline: none;
}

.file-btn {
  background-color: rgba(0, 0, 205, 0.7);
  color: #fff;
  padding: 5px 8px;
  font-size: 10px;
  cursor: pointer;
  white-space: nowrap;
  border-radius: 6px;
  margin-top: 5px;
  margin-left: 80px;
}

.file-btn:hover {
  background-color: rgba(0, 0, 205);
}

.left-section {
    font-size: 16px;
    margin-bottom: 20px;
    margin-top: 10px;
    font-family: Poppins, sans-serif;
    font-weight: bolder;
    margin-right: 20px;
    margin-left: 1px;
}

.right-section1 {
  display: flex;
  align-items: center;
  gap: 10px;
  flex-wrap: wrap;
  padding-left: 400px;
}

.right-section2 {
  display: flex;
  align-items: center;
  flex-wrap: wrap;
  padding-left: 800px;
  margin-top: 40px;
}

.selanjutnya-btn {
  padding: 14px 20px;
  border-radius: 8px;
  border: 1px solid;
  background-color: rgba(0, 0, 205, 0.8);
  color: white;
  cursor: pointer;
  font-size: 12px;
  display: flex;
  align-items: center;
  font-weight: 600;
  font-family: Poppins, sans-serif;
  text-decoration: none;
}

.selanjutnya-btn:hover {
  background-color: rgb(0, 0, 205);
  color: white;
}

.simpan-btn {
  padding: 14px 30px;
  border-radius: 8px;
  border: 1px solid;
  background-color: rgba(0, 0, 205, 0.8);
  color: white;
  cursor: pointer;
  font-size: 12px;
  display: flex;
  align-items: center;
  font-weight: 600;
  font-family: Poppins, sans-serif;
  text-decoration: none;
}

.simpan-btn:hover {
  background-color: rgb(0, 0, 205);
  color: white;
}

.batal-btn {
  padding: 14px 28px;
  border-radius: 8px;
  border: 1px solid #eaeaea;
  background-color: #eaeaea;
  color: #696969;
  cursor: pointer;
  font-size: 12px;
  display: flex;
  align-items: center;
  margin-right: 7px;
  font-weight: 600;
  font-family: Poppins, sans-serif;
  text-decoration: none;
}

.batal-btn:hover {
  background-color: #C0C0C0;
  color: #696969;
}

.kembali-btn {
  padding: 14px 25px;
  border-radius: 8px;
  border: 1px solid #eaeaea;
  background-color: #eaeaea;
  color: #696969;
  cursor: pointer;
  font-size: 12px;
  display: flex;
  align-items: center;
  margin-right: 5px;
  font-weight: 600;
  font-family: Poppins, sans-serif;
  text-decoration: none;
}

.kembali-btn:hover {
  background-color: #C0C0C0	;
  color: #696969;
}

.progress-container {
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 20px auto;
  max-width: 900px;
  margin-bottom: 60px;
}

.step {
  text-align: center;
  position: relative;
  flex: 1;
}

.circle {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  border: 2px solid #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 10px;
  font-weight: bold;
  background: #fff;
}

.circle2 {
  width: 25px;
  height: 25px;
  border-radius: 50%;
  border: 2px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 0px;
  font-weight: 400;
  color: black;
  background: rgba(0, 0, 205, 0.1);
}

.line {
  height: 3px;
  width: 300px;
  flex: 2;
  background: #ccc;
  margin-top: -20px;
}

.label  {
  font-size: 12px;
  margin-top: 5px;
  color: #555;
  font-family: Poppins, sans-serif;
}

/* Completed step */
.step.completed .circle {
  background: #7CFC00; /* green */
  color: white;
  border-color: #7CFC00;
}

/* Active step */
.step.active .circle {
  background: #fff;
  color: rgba(0, 0, 205, 0.8); 
  border-color: rgba(0, 0, 205, 0.8);
}

.step.active .circle2 {
  background: rgba(0, 0, 205, 0.8);
  color: white; 
  border-color: rgba(0, 0, 205, 0.8);
}

/* Label warna */
.step.completed .label {
  color: #22c55e;
  font-weight: 600;
}
.step.active .label {
  color: rgba(0, 0, 205, 0.8);
  font-weight: 600;
}
.step.pending .label {
  color: #444;
}

/* Line default abu */
.line {
  flex: 1;
  height: 3px;
  background-color: #ccc;
  margin: 0 5px;
}

.line.active {
  background-color: rgba(0, 0, 205, 0.8);
}

.line.completed {
  background-color: #7CFC00;

}

/* Jika step sebelumnya completed, garis berubah hijau */
.step.completed + .line {
  background-color: rgba(0, 0, 205, 0.8);
}

.alert-danger {
    background-color: #f8d7da;   /* merah muda */
    color: crimson;             /* merah teks */
    padding: 12px 14px;
    border-radius: 6px;
    border: 1px solid #f5c6cb;
    font-size: 12px;
    margin-bottom: 20px;
    font-family: Poppins, sans-serif;
    font-weight: 600;
}

.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
    font-family: Poppins, sans-serif;
}

.form-grid h4 {
    font-size: 12px;
    color: #444;
    margin-bottom: 10px;
    font-weight: 500;
    font-family: Poppins, sans-serif;
    margin-top: 15px;
}

.form-grid p {
    font-size: 12px;
    font-weight: 600;
    margin: 0;
    color: #000;
}


.form-group {
  display: flex;
  flex-direction: column;
}


</style>

<div class="navbar">
    <div class="left-info">
        <div class="navbar-name" >Hello, Satria Hadi!</div>
        <div class="navbar-date">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</div>
    </div>
</div>


<!-- SIDEBAR -->
<div class="sidebar">
  <div class="logo">
    <img src="https://d1nxzqpcg2bym0.cloudfront.net/google_play/com.yakes.medrec/a48efce6-1b26-11e7-a318-1938b92725fa/128x128" alt="logo-picture">
    <div class="logo-info">
      <div class="logo-name">HRIS Yakes</div>
    </div>
  </div>
  <div class="profile">
    <img src="https://cdn0-production-images-kly.akamaized.net/-1pYFvsXgXGWz-U3Ybxqnc_mDfk=/1280x1706/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/5202248/original/037743300_1745894554-ChatGPT_Image_Apr_29__2025__09_26_56_AM.jpg" alt="profile_picture">
    <div class="profile-info">
      <div class="profile-name">Satria Hadi</div>
      <div class="profile-email">879002@mail.com</div>
    </div>
  </div>

  <nav>
    <ul class="home-profile">
      <li><a href="#home"><i class="fas fa-house"></i>Home</a></li>
      <li><a href="#profile"><i class="fas fa-user"></i>My Profile</a></li>
    </ul>
  </nav>

  <nav>
    <ul class="menu">
      <h1 class="main">Main Menu</h1>
      <li><a href="{{ route('workforce.index') }}"><i class="fas fa-desktop"></i>Workforce Performance</a></li>
      <li><a href="{{ route('dashboard.index') }}"><i class="fas fa-file-lines"></i>Dashboard Outsource</a></li>
      <li><a href="{{ route('employees.index') }}"><i class="fas fa-user-group"></i>Talent Management</a></li>
      <li><a class="active" href="{{ route('recruitment.index') }}"><i class="fas fa-user"></i>Recruitment Management</a></li>
      <li><a href="{{ route('training.index') }}"><i class="fas fa-chart-line"></i>Training Management</a></li>
      <li><a href="#djm"><i class="fas fa-folder"></i>DJM Management</a></li>
      <h2 class="config">Configuration</h2>
      <li><a href="#user"><i class="fas fa-user"></i>User</a></li>
      <li><a href="#role"><i class="fas fa-gear"></i>Role</a></li>
    </ul>
  </nav>
</div>




<!-- KONTEN UTAMA -->
<div class="content-header-flex">
    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; flex-wrap: wrap;">
        <div style="display: flex; flex-direction: column; gap: 6px;">
        <!-- Baris 1: Home & Breadcrumb -->
        <div style="display: flex; align-items: center; gap: 6px;">
            <div class="breadcrumb-row">
            <a href="{{ route('home') }}" class="btn-home" style="padding: 0; color: #696969;">
                <i class="fas fa-house"></i>
            </a>
            <i class="fas fa-chevron-right breadcrumb-arrow"></i>
            <a href="{{ route('recruitment.index') }}" class="breadcrumb-text">Recruitment Management</a>
            <i class="fas fa-chevron-right breadcrumb-arrow"></i>
            <a href="{{ url()->current() }}" class="breadcrumb-text">Tambah Kebutuhan</a>
            </div> 
        </div>
        <h2 class="page-title">Tambah Kebutuhan</h2>
        </div>
    </div>

    @php
      $currentStep = session('currentStep', 1); // default step = 1
    @endphp

    <div class="progress-container">
      <div class="step {{ $currentStep > 1 ? 'completed' : ($currentStep == 1 ? 'active' : 'pending') }}">
          <div class="circle">
              <div class="circle2">
                {!! $currentStep > 1 ? '<i class="fas fa-check"></i>' : '1' !!}
              </div> 
          </div>
          <div class="label">Detail Posisi</div>
      </div>

      <div class="line {{ $currentStep > 1 ? 'completed' : ($currentStep == 1 ? 'active' : 'pending') }}"></div>

      <div class="step {{ $currentStep > 2 ? 'completed' : ($currentStep == 2 ? 'active' : 'pending') }}">
          <div class="circle">
              <div class="circle2">
                {!! $currentStep > 2 ? '<i class="fas fa-check"></i>' : '2' !!}
              </div> 
          </div>
          <div class="label">Kualifikasi</div>
      </div>

      <div class="line"></div>

      <div class="step {{ $currentStep == 3 ? 'active' : 'pending' }}">
          <div class="circle">
              <div class="circle2">
                {!! $currentStep == 3 ? '3' : '3' !!}
              </div> 
          </div>
          <div class="label">Finalisasi</div>
      </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error:</strong>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('recruitment.store') }}" 
      method="POST" 
      enctype="multipart/form-data" 
      id="recruitmentForm">
            @csrf
            <div class="step-content" id="step-content-1">
              <div class="form-grid">
                  <div class="form-group">
                      <div class="label-group">
                      <label for="namaPosisi">Nama Posisi</label>
                      <label class="bintang">*</label>
                      </div>
                      <input id="namaPosisi" type="text" name="namaPosisi" class="form-control" required>
                  </div>

                  <div class="form-group">
                      <div class="label-group">
                      <label for="regionalDirektorat">Regional / Direktorat</label>
                      <label class="bintang">*</label>
                      </div>
                      <select id="regionalDirektorat" name="regionalDirektorat" class="form-control1" required>
                          <option disabled selected value=""></option>
                          <option value="Direktorat123">Direktorat123</option>
                          <option value="Direktorat123">Direktorat1234</option>
                          <option value="Direktorat123">Direktorat12345</option>
                      </select>
                  </div>

                  <div class="form-group">
                      <div class="label-group">
                      <label for="unitSub">Unit / Sub Direktorat</label>
                      <label class="bintang">*</label>
                      </div>
                      <select id="unitSub" name="unitSub" class="form-control1" required>
                          <option disabled selected value=""></option>
                          <option value="Direktorat123">Direktorat123</option>
                          <option value="Direktorat123">Direktorat1234</option>
                          <option value="Direktorat123">Direktorat12345</option>
                      </select>
                  </div>

                  <div class="form-group">
                      <div class="label-group">
                      <label for="band_posisi">Band Posisi</label>
                      <label class="bintang">*</label>
                      </div>
                      <select id="band_posisi" name="band_posisi" class="form-control1" required>
                          <option disabled selected value=""></option>
                          <option value="VII - V">VII - V</option>
                          <option value="VIII - VI">VIII - VI</option>
                          <option value="IX - VII">IX - VII</option>
                      </select>
                  </div>

                  <div class="form-group">
                      <div class="label-group">
                      <label for="status_kepegawaian">Status Kepegawaian</label>
                      <label class="bintang">*</label>
                      </div>
                      <select id="status_kepegawaian" name="status_kepegawaian" class="form-control1" required>
                          <option disabled selected value=""></option>
                          <option value="TKWT">TKWT</option>
                          <option value="Karyawan Tetap">Karyawan Tetap</option>
                          <option value="Talent Mobility">Talent Mobility</option>
                      </select>
                  </div>

                  <div class="form-group">
                      <div class="label-group">
                      <label for="lokasi_pekerjaan">Lokasi Pekerjaan</label>
                      <label class="bintang">*</label>
                      </div>
                      <select id="lokasi_pekerjaan" name="lokasi_pekerjaan" class="form-control1" required>
                          <option disabled selected value=""></option>
                          <option value="Jakarta">Jakarta</option>
                          <option value="Jawa Barat">Jawa Barat</option>
                          <option value="Jawa Timur">Jawa Timur</option>
                          <option value="Jawa Tengah">Jawa Tengah</option>
                      </select>
                  </div>

                  <div class="form-group">
                      <div class="label-group">
                      <label for="medis_non_medis">Medis/Non Medis</label>
                      <label class="bintang">*</label>
                      </div>
                      <select id="medis_non_medis" name="medis_non_medis" class="form-control1" required>
                          <option disabled selected value=""></option>
                          <option value="Medis">Medis</option>
                          <option value="Non Medis">Non Medis</option>
                      </select>
                  </div>

                  <div class="form-group">
                      <div class="label-group">
                      <label for="jumlah_lowongan">Jumlah Lowongan</label>
                      <label class="bintang">*</label>
                      </div>
                      <input id="jumlah_lowongan" type="text" name="jumlah_lowongan" class="form-control" required>
                  </div>

                  <div class="form-group">
                      <div class="label-group">
                      <label for="target_tanggal">Target Tanggal Hiring</label>
                      <label class="bintang">*</label>
                      </div>
                      <input id="target_tanggal" type="date" name="target_tanggal" class="form-control" required>
                  </div>

                  <div class="form-group">
                      <div class="label-group">
                      <label for="hiring_manager">Hiring Manager (Atasan)</label>
                      <label class="bintang">*</label>
                      </div>
                      <select id="hiring_manager" name="hiring_manager" class="form-control1" required>
                          <option disabled selected value=""></option>
                          <option value="Ariel">Ariel</option>
                          <option value="Orang1">Orang1</option>
                          <option value="Orang2">Orang2</option>
                      </select>
                  </div>

                  <div class="form-group">
                      <div class="label-group">
                          <label>NDE</label>
                          <label class="bintang">*</label>
                      </div>
                      <div class="file-input">
                          <input type="file" name="nde" id="ndeFile" required hidden>
                          <input type="text" class="file-text" id="ndeFileText" placeholder="Tambahkan file" readonly>

                          <label for="ndeFile" class="file-btn">Select File</label>
                          <small class="file-preview text-muted"></small>
                      </div>
                  </div>

              </div>


                <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; flex-wrap: wrap;">
                    <div class="right-section2">
                        <a href="{{ route('recruitment.index') }}" class="batal-btn">Batal</a>
                        <button type="button" onclick="nextStep(1)" class="btn selanjutnya-btn">Selanjutnya</button>

                        <!--
                        <button type="button" id="nextBtn" onclick="nextStep()" class="btn selanjutnya-btn" >Selanjutnya</button>
                        -->
                    </div>
                </div>
              </div>


            <div class="step-content d-none" id="step-content-2">
              <div class="alert-danger">
                  Jika tidak ada kualifikasi spesifik, form ini dapat dikosongkan
              </div>

              <div class="form-grid">
                  <div class="form-group">
                      <div class="label-group">
                          <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                      </div>
                      <select id="pendidikan_terakhir" name="pendidikan_terakhir" class="form-control1">
                          <option disabled selected value=""></option>
                          <option value="Minimal D3">Minimal D3</option>
                          <option value="Minimal S1">Minimal S1</option>
                          <option value="Minimal S2">Minimal S2</option>
                      </select>
                  </div>
                  
                  <div class="form-group">
                      <div class="label-group">
                          <label for="jurusan_relevan">Jurusan Relevan</label>
                      </div>
                      <select id="jurusan_relevan" name="jurusan_relevan" class="form-control1">
                          <option disabled selected value=""></option>
                          <option value="Semua Jurusan">Semua Jurusan</option>
                          <option value="IT">IT</option>
                          <option value="Manajemen">Manajemen</option>
                      </select>
                  </div>

                  <div class="form-group">
                      <div class="label-group">
                          <label for="pengalaman_minimum">Pengalaman Minimum</label>
                      </div>
                      <select id="pengalaman_minimum" name="pengalaman_minimum" class="form-control1">
                          <option disabled selected value=""></option>
                          <option value="TanpaPengalaman">Tanpa Pengalaman</option>
                          <option value="FreshGraduate">Fresh Graduate</option>
                          <option value="Minimal1Tahun">Minimal 1 Tahun</option>
                          <option value="Minimal2Tahun">Minimal 2 Tahun</option>
                      </select>
                  </div>

                  <div class="form-group">
                      <div class="label-group">
                          <label for="domisili_preferensi">Domisili Preferensi</label>
                      </div>
                      <select id="domisili_preferensi" name="domisili_preferensi" class="form-control1">
                          <option disabled selected value=""></option>
                          <option value="TidakAdaPreferensi">Tidak Ada Preferensi</option>
                          <option value="Jawa Barat">Jawa Barat</option>
                          <option value="Jawa Timur">Jawa Timur</option>
                          <option value="Jawa Tengah">Jawa Tengah</option>
                      </select>
                  </div>

                  <div class="form-group">
                      <div class="label-group">
                          <label for="jenis_kelamin">Jenis Kelamin</label>
                      </div>
                      <select id="jenis_kelamin" name="jenis_kelamin" class="form-control1">
                          <option disabled selected value=""></option>
                          <option value="TidakAdaPreferensi">Tidak Ada Preferensi</option>
                          <option value="Wanita">Wanita</option>
                          <option value="Pria">Pria</option>
                      </select>
                  </div>

                  <div class="form-group">
                      <div class="label-group">
                          <label for="batasan_usia">Batasan Usia (Tahun)</label>
                      </div>
                      <input id="batasan_usia" type="text" name="batasan_usia" class="form-control">
                  </div>
              </div>

              <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; flex-wrap: wrap;">
                  <div class="right-section2">
                      <button type="button" onclick="prevStep(2)" class="kembali-btn">Kembali</button>
                      <button type="button" onclick="nextStep(2)" class="btn selanjutnya-btn">Selanjutnya</button>

                      <!--
                      <button type="button" class="kembali-btn" onclick="prevStep()">Kembali</button>
                      <button type="button" id="nextBtn" onclick="nextStep()" class="btn selanjutnya-btn">Selanjutnya</button>
                      -->
                  </div>
              </div>
            </div>

            <div class="step-content d-none" id="step-content-3">
              <div id="previewContent">
                <div class="preview-detail-posisi">
                  <h3 class="page-title">Detail Posisi</h3>
                  <div class="form-grid">
                    <div class="form-group">
                      <h4>Nama Posisi</h4>
                      <p id="previewNamaPosisi"></p>
                    </div>

                    <div class="form-group">
                      <h4>Region/Direktorat</h4>
                      <p id="previewRegionalDirektorat"></p>
                    </div>

                    <div class="form-group">
                      <h4>Unit/Sub Direktorat</h4>
                      <p id="previewUnitSub"></p>
                    </div>

                    <div class="form-group">
                      <h4>Band Posisi</h4>
                      <p id="previewBandPosisi"></p>
                    </div>

                    <div class="form-group">
                      <h4>Status Kepegawaian</h4>
                      <p id="previewStatusKepegawaian"></p>
                    </div>

                    <div class="form-group">
                      <h4>Lokasi Pekerjaan</h4>
                      <p id="previewLokasiPekerjaan"></p>
                    </div>

                    <div class="form-group">
                      <h4>Medis/Non Medis</h4>
                      <p id="previewMedisNonMedis"></p>
                    </div>

                    <div class="form-group">
                      <h4>Jumlah Lowongan</h4>
                      <p id="previewJumlahLowongan"></p>
                    </div>

                    <div class="form-group">
                      <h4>Target Tanggal Hiring</h4>
                      <p id="previewTargetTanggalHiring"></p>
                    </div>

                    <div class="form-group">
                      <h4>Hiring Manager (Atasan)</h4>
                      <p id="previewHiringManager"></p>
                    </div>

                    <div class="form-group">
                      <h4>NDE</h4>
                      <a id="previewNdeFile" href="#" target="_blank" style="display:none; color:blue; text-decoration:underline;">
                          Click to Download
                      </a>
                      <p id="previewNdeEmpty"><i>Belum ada file diunggah</i></p>
                    </div>
                  </div>
                </div>

                <hr class="divider">

                <div class="preview-detail-posisi">
                  <h3 class="page-title">Detail Kualifikasi Pelamar</h3>
                  <div class="form-grid">
                    <div class="form-group">
                      <h4>Pendidikan Terakhir</h4>
                      <p id="previewPendidikanTerakhir"></p>
                    </div>

                    <div class="form-group">
                      <h4>Jurusan Relevan</h4>
                      <p id="previewJurusanRelevan"></p>
                    </div>

                    <div class="form-group">
                      <h4>Pengalaman Minimum</h4>
                      <p id="previewPengalamanMinimum"></p>
                    </div>

                    <div class="form-group">
                      <h4>Domisili Preferensi</h4>
                      <p id="previewDomisiliPreferensi"></p>
                    </div>

                    <div class="form-group">
                      <h4>Jenis Kelamin</h4>
                      <p id="previewJenisKelamin"></p>
                    </div>

                    <div class="form-group">
                      <h4>Batasan Usia</h4>
                      <p id="previewBatasanUsia"></p>
                    </div>  
                  </div>
                </div>
                
              </div>

              <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; flex-wrap: wrap;">
                  <div class="right-section2">
                      <button type="button" onclick="prevStep(3)" class="kembali-btn">Kembali</button>
                      <button type="submit" class="btn simpan-btn" id="submitBtn">Simpan</button>
                  </div>
              </div>
            </div>

    </form>

    

     
</div>

<script>
function nextStep(currentStep) {
    let currentStepContent = document.getElementById("step-content-" + currentStep);
    let inputs = currentStepContent.querySelectorAll("input[required], select[required], textarea[required]");
    let valid = true;
    let firstInvalid = null;

    inputs.forEach(function(input) {
        let errorMsg = input.parentElement.querySelector(".error-msg");

        // 🔹 Validasi khusus file input
        if (input.type === "file") {
            if (input.files.length === 0) {
                input.classList.add("is-invalid");
                if (!errorMsg) {
                    let small = document.createElement("small");
                    small.classList.add("error-msg", "text-danger");
                    small.innerText = "File wajib diunggah";
                    input.parentElement.appendChild(small);
                }
                valid = false;
                if (!firstInvalid) firstInvalid = input;
            } else {
                input.classList.remove("is-invalid");
                if (errorMsg) errorMsg.remove();
            }
        } 
        // 🔹 Validasi untuk input teks, select, textarea
        else {
            if (!input.value.trim()) {
                input.classList.add("is-invalid");
                if (!errorMsg) {
                    let small = document.createElement("small");
                    small.classList.add("error-msg", "text-danger");
                    small.innerText = "Field ini wajib diisi";
                    input.parentElement.appendChild(small);
                }
                valid = false;
                if (!firstInvalid) firstInvalid = input;
            } else {
                input.classList.remove("is-invalid");
                if (errorMsg) errorMsg.remove();
            }
        }
    });

    if (!valid) {
        // fokus ke field pertama yang error
        if (firstInvalid) {
            firstInvalid.scrollIntoView({ behavior: "smooth", block: "center" });
            firstInvalid.focus();
        }
        return; 
    }

    // 🔹 Jika semua valid, lanjut step
    currentStepContent.classList.add("d-none");

    let nextStepContent = document.getElementById("step-content-" + (currentStep + 1));
    if (nextStepContent) {
        nextStepContent.classList.remove("d-none");
    }
}
</script>

<style>
.is-invalid {
    border: 2px solid red !important;
    background-color: #ffe6e6 !important;
}
.error-msg {
    font-size: 0.85rem;
}
</style>



@endsection

<script>
function nextStep(step) {
    document.querySelectorAll('.step').forEach(s => s.classList.add('hidden'));
    document.querySelector('.step-' + step).classList.remove('hidden');
}
function prevStep(step) {
    document.querySelectorAll('.step').forEach(s => s.classList.add('hidden'));
    document.querySelector('.step-' + step).classList.remove('hidden');
}
</script>

<script>
  function nextStep(currentStep) {
      document.getElementById("step-content-" + currentStep).classList.add("d-none");
      var nextStep = currentStep + 1;
      document.getElementById("step-content-" + nextStep).classList.remove("d-none");

      // jika masuk step 3 → tampilkan preview
      if (nextStep === 3) {
          showPreview();
      }
  }

  function prevStep(currentStep) {
      document.getElementById("step-content-" + currentStep).classList.add("d-none");
      var prevStep = currentStep - 1;
      document.getElementById("step-content-" + prevStep).classList.remove("d-none");
  }

  function showPreview() {
      document.getElementById("previewNamaPosisi").innerText =
          document.getElementById("namaPosisi").value;

      document.getElementById("previewRegionalDirektorat").innerText =
          document.getElementById("regionalDirektorat").value;

      document.getElementById("previewUnitSub").innerText =
          document.getElementById("unitSub").value;

      document.getElementById("previewBandPosisi").innerText =
          document.getElementById("band_posisi").value;

      document.getElementById("previewStatusKepegawaian").innerText =
          document.getElementById("status_kepegawaian").value;
      
      document.getElementById("previewLokasiPekerjaan").innerText =
          document.getElementById("lokasi_pekerjaan").value;

      document.getElementById("previewMedisNonMedis").innerText =
          document.getElementById("medis_non_medis").value;

      document.getElementById("previewJumlahLowongan").innerText =
          document.getElementById("jumlah_lowongan").value;
      
      document.getElementById("previewTargetTanggalHiring").innerText =
          document.getElementById("target_tanggal").value;

      document.getElementById("previewHiringManager").innerText =
          document.getElementById("hiring_manager").value;

      document.getElementById("previewNdeFile").innerText =
          document.getElementById("nde").value;

      document.getElementById("previewPendidikanTerakhir").innerText =
          document.getElementById("pendidikan_terakhir").value;

      document.getElementById("previewJurusanRelevan").innerText =
          document.getElementById("jurusan_relevan").value;

      document.getElementById("previewPengalamanMinimum").innerText =
          document.getElementById("pengalaman_minimum").value;

      document.getElementById("previewDomisiliPreferensi").innerText =
          document.getElementById("domisili_preferensi").value;

      document.getElementById("previewJenisKelamin").innerText =
          document.getElementById("jenis_kelamin").value;

      document.getElementById("previewBatasanUsia").innerText =
          document.getElementById("batasan_usia").value;
  }
</script>

<script>
  document.addEventListener("change", function (e) {
      if (e.target && e.target.type === "file") {
          let wrapper = e.target.closest(".file-input"); 
          /*
          let preview = wrapper.querySelector(".file-preview"); */
          let textInput = wrapper.querySelector(".file-text"); 

          if (e.target.files.length > 0) {
              let fileName = e.target.files[0].name;
              if (textInput) textInput.value = fileName; // isi ke input text
              /*
              if (preview) preview.textContent = fileName; // isi ke <small> */
          } else {
              if (textInput) textInput.value = "";
              if (preview) preview.textContent = "Belum ada file";
          }
      }
  });
</script>

<script>
  document.getElementById('ndeFile').addEventListener('change', function(event) {
      const file = event.target.files[0];
      if(file){
          const link = document.getElementById('previewNdeFile');
          const emptyMsg = document.getElementById('previewNdeEmpty');

          link.href = URL.createObjectURL(file); // buat link sementara
          link.style.display = 'inline';
          emptyMsg.style.display = 'none';
      }
  });
</script>

<!--
<script>
    let currentStep = 1;

    function nextStep() {
        if (currentStep < 3) {
            // tandai step sebelumnya completed
            document.getElementById("step-"+currentStep).classList.remove("active");
            document.getElementById("step-"+currentStep).classList.add("completed");

            // step berikutnya jadi aktif
            currentStep++;
            document.getElementById("step-"+currentStep).classList.add("active");
        }
    }

    function prevStep() {
        if (currentStep > 1) {
            // hapus aktif
            document.getElementById("step-"+currentStep).classList.remove("active");

            // mundur
            currentStep--;
            document.getElementById("step-"+currentStep).classList.remove("completed");
            document.getElementById("step-"+currentStep).classList.add("active");
        }
    }

    // perbaikan code
    let currentStep = 1;

    function nextStep() {
        if (currentStep < 3) {
            // step sekarang jadi completed
            const currentEl = document.getElementById("step-" + currentStep);
            currentEl.classList.remove("active");
            currentEl.classList.add("completed");

            // step berikutnya jadi active
            currentStep++;
            const nextEl = document.getElementById("step-" + currentStep);
            nextEl.classList.add("active");
        }
    }

    function prevStep() {
        if (currentStep > 1) {
            // step sekarang hapus active
            const currentEl = document.getElementById("step-" + currentStep);
            currentEl.classList.remove("active");

            // mundur ke step sebelumnya
            currentStep--;
            const prevEl = document.getElementById("step-" + currentStep);
            prevEl.classList.remove("completed");
            prevEl.classList.add("active");
        }
    }

</script>

<script>
    function saveStep(step) {
        let formData = new FormData(document.getElementById('formStep'+step));

        fetch("{{ route('recruitment.saveStep') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': formData.get('_token')
            },
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if(data.success){
                document.getElementById("step"+step).classList.add("d-none");
                document.getElementById("step"+(step+1)).classList.remove("d-none");

                // Kalau step 2 -> ke step 3, tampilkan review
                if(step === 2){
                    showReview();
                }
            }
        });
    }

    function backTo(step){
        document.querySelectorAll('.step').forEach(s => s.classList.add("d-none"));
        document.getElementById("step"+step).classList.remove("d-none");
    }

    function showReview(){
        fetch("{{ route('recruitment.saveStep') }}", {
            method: "POST",
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            body: new URLSearchParams({ step: "review" })
        });

        let reviewDiv = document.getElementById("reviewData");
        reviewDiv.innerHTML = `
            <p><b>Nama Posisi:</b> ${sessionStorage.getItem("nama_posisi") ?? ""}</p>
            <p><b>Region:</b> ${sessionStorage.getItem("region") ?? ""}</p>
             tambahkan semua 
        `;
    }

    function submitFinal(){
        fetch("{{ route('recruitment.submit') }}", {
            method: "POST",
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}" }
        })
        .then(res => res.json())
        .then(data => {
            if(data.success){
                alert("Data berhasil disubmit!");
                window.location.href = "/"; // redirect ke halaman lain
            }
        });
    }
</script>

-->