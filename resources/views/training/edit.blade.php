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

.form-grid {
  display: grid;
  grid-template-columns: repeat(2, 500px);
  gap: 24px;
  font-family: Poppins, sans-serif;
  font-weight: normal;
  font-size: 14px;
}

.form-group {
  display: flex;
  flex-direction: column;
}

label {
  font-size: 14px;
  margin-bottom: 6px;
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

.full-width {
  grid-column: span 2;
  gap: 6px; 
  margin-bottom: 10px;
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

.create-btn {
  padding: 14px 30px;
  border-radius: 8px;
  border: 1px solid;
  background-color: #0000CD;
  color: white;
  cursor: pointer;
  font-size: 12px;
  display: flex;
  align-items: center;
  gap: 6px;
  font-weight: bold;
  font-family: Poppins, sans-serif;
  text-decoration: none;
}

.cancel-btn {
  padding: 14px 30px;
  border-radius: 8px;
  border: 1px solid #eaeaea;
  background-color: #eaeaea;
  color: #696969;
  cursor: pointer;
  font-size: 12px;
  display: flex;
  align-items: center;
  gap: 6px;
  margin-right: 18px;
  font-weight: bold;
  font-family: Poppins, sans-serif;
  text-decoration: none;
}

.add-btn {
  padding: 7px 12px;
  border-radius: 8px;
  border: 1px solid;
  background-color: #0000CD;
  color: white;
  cursor: pointer;
  font-size: 12px;
  display: flex;
  align-items: center;
  gap: 6px;
  margin-right: 18px;
  font-weight: bold;
  font-family: Poppins, sans-serif;
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
      <li><a href="{{ route('recruitment.index') }}"><i class="fas fa-user"></i>Recruitment Management</a></li>
      <li><a class="active"><i class="fas fa-chart-line"></i>Training Management</a></li>
      <li><a href="{{ route('djm.index') }}"><i class="fas fa-folder"></i>DJM Management</a></li>
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
          <a href="{{ route('training.index') }}" class="breadcrumb-text">Training Management</a>
          <i class="fas fa-chevron-right breadcrumb-arrow"></i>
          <a href="{{ url()->current() }}" class="breadcrumb-text">Edit</a>
        </div> 
      </div>
      <h2 class="page-title">Edit Training</h2>
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
  <form action="{{ route('training.store') }}" method="POST">
    @csrf
        <div class="form-grid">
        <div class="form-group">
            <label>ID Training *</label>
            <input type="text" name="id_training" class="form-control-read" required>
        </div>

        <div class="form-group">
            <label>Nama Training *</label>
            <input type="text" name="nama_training" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Deskripsi Training *</label>
            <input type="text" name="deskripsi_training" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Tipe Training *</label>
            <select name="tipe_training" class="form-control1" required>
                <option disabled selected value=""></option>
                <option value="Internal">Internal</option>
                <option value="Eksternal">Eksternal</option>
            </select>
        </div>

        <div class="form-group">
            <label>Penyelenggara *</label>
            <input type="text" name="penyelenggara" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Durasi *</label>
            <input type="text" name="durasi" class="form-control-read" required>
        </div>

        <div class="form-group">
            <label>Sertifikat Partisipasi</label>
            <select name="sertifikat_partisipasi" class="form-control1" required>
                <option disabled selected value=""></option>
                <option value="Ada">Ada</option>
                <option value="Tidak">Tidak Ada</option>
            </select>
        </div>

        <div class="form-group">
            <label>Sertifikat Pelatihan</label>
            <select name="sertifikat_pelatihan" class="form-control1" required>
                <option disabled selected value=""></option>
                <option value="Ada">Ada</option>
                <option value="Tidak">Tidak Ada</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>Tanggal Mulai *</label>
            <input type="datetime-local" name="tanggal_mulai" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Tanggal Selesai *</label>
            <input type="datetime-local" name="tanggal_selesai" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Lokasi *</label>
            <input type="text" name="lokasi" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Metode Pelatihan *</label>
            <select name="metode_pelatihan" class="form-control1" required>
                <option disabled selected value=""></option>
                <option value="Online"> Online </option>
                <option value="Offline"> Offline </option>
            </select>
        </div>

        <div class="form-group">
            <label>Partisipan *</label>
            <input type="int" name="partisipan" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Status *</label>
            <input type="text" name="status" class="form-control-read" required>
        </div>
        </div>

        <hr class="divider">

        <div class="form-grid">
            <div class="form-group">
                <label>Biaya per Orang *</label>
                <input type="text" name="biaya" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Total Biaya *</label>
                <input type="text" name="total_biaya" class="form-control-read" required>
            </div>
        </div>
    
        <hr class="divider">

        <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; flex-wrap: wrap;">
            <h2 class="left-section">List Of Participants</h2>
            <div class="right-section1">
                <button class="add-btn"><i class="fas fa-plus"></i> Add</button>
            </div>
        </div>
        <table id="customers" style="margin-top: 10px;">
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Regional/Direktorat</th>
                <th>Nama Posisi</th>
                <th>Email</th>
                <th>No Telepon</th>
                <th>Actions</th>
            </tr>
        </table>
        <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; flex-wrap: wrap;">
            <div class="right-section2">
                <a href="{{ route('training.index') }}" class="cancel-btn">Cancel</a>
                <button type="submit" class="btn create-btn">Create</button>
            </div>
        </div>
  </form>
        
</div>
@endsection