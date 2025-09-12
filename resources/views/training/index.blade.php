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
    font-size: 0.7em;
    /* Memperkecil ukuran email */
    color: #2F4F4F;
    /* Mengubah warna email */
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
    display: flex;
    /* Mengaktifkan flexbox */
    align-items: center;
    /* Menyelaraskan elemen secara vertikal */
    gap: 20px;
    margin-bottom: 20px;
    border-bottom: 1px solid #A9A9A9;
    padding: 9px;
  }

  .sidebar .logo img {
    width: 45px;
    /* Atur lebar foto */
    height: 45px;
    /* Atur tinggi foto */
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
    display: flex;
    /* Mengaktifkan flexbox */
    align-items: center;
    /* Menyelaraskan elemen secara vertikal */
    gap: 20px;
    margin-bottom: 10px;
    border-bottom: 1px solid #A9A9A9;
    padding: 9px;
  }

  .sidebar .profile img {
    width: 45px;
    /* Atur lebar foto */
    height: 45px;
    /* Atur tinggi foto */
    border-radius: 10%;
  }

  .profile-info {
    display: flex;
    flex-direction: column;
    /* Mengatur nama dan email menjadi kolom */
  }

  .profile-name {
    font-size: 13px;
    /* Membuat nama lebih tebal */
    font-family: Poppins, sans-serif;
    color: #080808;
  }

  .profile-email {
    font-size: 0.7em;
    /* Memperkecil ukuran email */
    color: #2F4F4F;
    /* Mengubah warna email */
  }

  /* TALENT MANAGEMENT STYLES */
  #customers {
    font-family: Poppins, sans-serif;
    border-collapse: collapse;
    width: 100%;
    margin-top: 10px;
  }

  #customers td,
  #customers th {
    border: none;
    font-size: 12px;
  }

  #customers tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  #customers tr:hover {
    background-color: #ddd;
  }

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
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    z-index: 1;
    border: 1px solid #ccc;
    padding: 5px;
    border-radius: 8px;
  }

  .dropdown-action-detail {
    font-family: Poppins, sans-serif;
    font-weight: normal;
    font-size: 12px;
    color: #555;
    text-decoration: none;
    margin-left: 8px;
  }

  .dropdown-action-edit {
    font-family: Poppins, sans-serif;
    font-weight: normal;
    font-size: 12px;
    color: #555;
    text-decoration: none;
    margin-left: 8px;
  }

  .dropdown-action:hover .dropdown-action-content {
    display: block;
  }

  .page-title {
    font-size: 20px;
    margin-bottom: 20px;
    margin-top: 10px;
    font-family: Poppins, sans-serif;
    font-weight: bolder;
    margin-right: 20px;
    margin-left: 1px;
  }

  .first,
  .sec,
  .third {
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
    min-height: unset;
    /* Biar tetap tinggi meski tanpa isi */
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    /* Memberi jarak antara konten dan tombol */
    align-items: flex-start;
    /* Menyelaraskan elemen di bagian atas */
    max-width: 100%;
    width: 1100px;
    /* Sidebar width + padding */
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


  .left-section {
    flex: 1;
  }

  .right-section {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
    padding-top: 20px;
  }

  /* 
  .stat-boxes {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    gap: 1px;
    margin-top: 1px;
  } */

  /* Toolbar (Search, Export, Filters) */
  .search-container {
    position: relative;
  }

  .search-icon {
    position: absolute;
    top: 8px;
    left: 18px;
    color: #888;
  }

  .search-bar {
    padding: 8px 5px 5px 30px;
    border: none;
    border-radius: 8px;
    width: 300px;
    background-color: #F5F5F5;
    font-size: 12px;
    font-family: Poppins, sans-serif;
    padding-left: 40px;
    padding-top: 7px;
  }

  .export-btn {
    padding: 6px 12px;
    border-radius: 8px;
    border: 1px solid #ccc;
    background-color: #696969;
    color: white;
    cursor: pointer;
    font-size: 12px;
    display: flex;
    align-items: center;
    gap: 6px;
    font-weight: bold;
    font-family: Poppins, sans-serif;
  }

  .filter-btn {
    padding: 6px 12px;
    border-radius: 8px;
    border: 1px solid #0000CD;
    background-color: #FFFFFF;
    color: mediumblue;
    cursor: pointer;
    font-size: 12px;
    display: flex;
    align-items: center;
    gap: 6px;
    font-weight: bold;
    font-family: Poppins, sans-serif;
  }

  .export-btn:hover {
    background-color: #2F4F4F;
  }

  .filter-btn:hover {
    background-color: #f0f0f0;
  }

  .create-btn {
    padding: 6px 12px;
    border-radius: 8px;
    border: 1px solid #0000CD;
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

  .create-btn:hover {
    background-color: #00008B;
  }

  /* Filter Modal Styles */
  .filter-modal {
    display: none;
    position: absolute;
    right: 40px;
    top: 80px;
    background: white;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    border-radius: 12px;
    padding: 20px;
    width: 400px;
    z-index: 999;
  }

  .filter-header {
    display: flex;
    justify-content: space-between;
    font-weight: bold;
    margin-bottom: 10px;
    border-bottom: 1px solid #A9A9A9;
    font-family: Poppins, sans-serif;
    color: #2F4F4F;
  }

  .filter-section {
    margin-bottom: 15px;
    font-family: Poppins, sans-serif;
    color: #2F4F4F;

  }

  .filter-section label {
    display: block;
    font-size: 12px;
    margin-bottom: 4px;
  }

  .filter-section .clear-link {
    float: right;
    font-size: 12px;
    color: blue;
    text-decoration: none;
    cursor: pointer;
  }

  .filter-footer {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
  }

  .filter-section select {
    font-size: 12px;
    font-family: Poppins, sans-serif;
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 10px;
    width: 300px;
    color: #2F4F4F;
  }

  .reset-btn,
  .apply-btn {
    padding: 6px 12px;
    border-radius: 6px;
    border: none;
    font-weight: bold;
    cursor: pointer;
  }

  .reset-btn {
    background-color: white;
    border: 1px solid #0000CD;
    font-size: 12px;
    color: mediumblue;
    font-family: Poppins, sans-serif;
  }

  .apply-btn {
    background-color: #0000CD;
    color: white;
    border: none;
    font-size: 12px;
    font-family: Poppins, sans-serif;
  }

  .tab-buttons {
    width: 100%;
    display: flex;
    justify-content: space-around;
    border-bottom: 1.5px solid #A9A9A9;
    margin-top: 20px;
    font-family: Poppins, sans-serif;
  }

  .tab-button {
    padding: 8px 37px;
    border: none;
    background: none;
    font-size: 16px;
    cursor: pointer;
    color: #555;
    border-bottom: 3px solid transparent;
    transition: all 0.2s ease-in-out;
    font-weight: bold;
  }

  .tab-button:hover {
    color: #0000CD;
  }

  .tab-button.active {
    color: #0000CD;
    background-color: #e6e6fa;
    border-radius: 10px 10px 0 0;
    border-bottom: 3px solid #0000CD;
  }

  .close-btn {
    background: none;
    border: none;
    font-size: 18px;
    cursor: pointer;
    color: #A9A9A9;
    padding: 0;
    margin: 0;
    line-height: 2;
  }

  .stat-boxes {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 3px;
    margin-bottom: 10px;
    justify-content: space-between;
  }

  .stat-boxes2 {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 5px;
    margin-bottom: 10px;
    width: 152vh;
  }

  .stat-box {
    display: flex;
    align-items: center;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 12px;
    padding: 6px;
    min-width: 300px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    flex: 1;
    max-width: 240px;
    height: 80px;
  }

  .stat-box2 {
    display: flex;
    align-items: center;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 12px;
    padding: 6px;
    min-width: 200px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    flex: 1;
    max-width: 500px;
    height: 80px;
  }

  .double-box {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 12px;
    padding: 10px;
    min-width: 400px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    flex: 1;
    max-width: 600px;
    height: 80px;
    display: flex;
    justify-content: space-between;
    gap: 20px;
  }

  .sub-box {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .icon-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    font-size: 12px;
    margin-right: 12px;
  }

  .blue {
    background-color: #5c47fb;
  }

  .purple {
    background-color: #8A2BE2;
  }

  .cyan {
    background-color: #1cc7d0;
  }

  .pink {
    background-color: #f73ab7;
  }

  .stat-info {
    display: flex;
    flex-direction: column;
  }

  .stat-value {
    font-weight: bold;
    font-size: 12px;
    color: #222;
    font-family: Poppins, sans-serif;
  }

  .stat-label {
    font-size: 12px;
    color: #555;
    font-family: Poppins, sans-serif;
  }

  .dropdown-action-delete {
    font-family: Poppins, sans-serif;
    font-weight: normal;
    font-size: 12px;
    color: red;
    text-decoration: none;
    border: none;
    background-color: white;
    margin-left: 8px;
    padding: 0;
    margin-bottom: -10px;
    font-weight: bold;
  }
</style>

<div class="navbar">
  <div class="left-info">
    <div class="navbar-name">Hello, Satria Hadi!</div>
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
      <li><a class="active" href="#trm"><i class="fas fa-chart-line"></i>Training Management</a></li>
      <li><a href="{{ route('djm.index') }}"><i class="fas fa-folder"></i>DJM Management</a></li>
      <h2 class="config">Configuration</h2>
      <li><a href="#user"><i class="fas fa-user"></i>User</a></li>
      <li><a href="#role"><i class="fas fa-gear"></i>Role</a></li>
    </ul>
  </nav>
</div>




<!-- KONTEN UTAMA -->
<div class="content-header-flex overflow-x-hidden" style="width:160vh; margin-left: 42vh;">
  <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; flex-wrap: wrap;">
    <div style="display: flex; flex-direction: column; gap: 6px;">
      <!-- Baris 1: Home & Breadcrumb -->
      <div style="display: flex; align-items: center; gap: 6px;">
        <div class="breadcrumb-row">
          <a href="{{ route('home') }}" class="btn-home" style="padding: 0; color: #696969;">
            <i class="fas fa-house"></i>
          </a>
          <i class="fas fa-chevron-right breadcrumb-arrow"></i>
          <a href="{{ url()->current() }}" class="breadcrumb-text">Training Management</a>
        </div>
      </div>
      <h2 class="page-title">Training Management</h2>
    </div>
    <div class="right-section">
      <div class="search-container">
        <i class="fas fa-search search-icon"></i>
        <input type="text" placeholder="Search by Name" class="search-bar" />
      </div>
      <button class="export-btn"><i class="fas fa-upload"></i> Export</button>
      <button class="filter-btn" onclick="toggleFilter()"><i class="fas fa-sliders"></i> Filters</button>
      <a href="{{ route('training.create') }}" class="create-btn" onclick="toggleCreate()"><i class="fas fa-plus"></i> Create</a>
    </div>
  </div>

  <!-- FILTER MODAL -->
  <div class="filter-modal" id="filterModal">
    <div class="filter-header">
      <span>Filter</span>
      <button class="close-btn" onclick="toggleFilter()">&times;</button>
    </div>
    <div class="filter-section">
      <label>Filter Name</label>
      <a href="#" class="clear-link">Clear</a>
      <select>
        <option>Select one from filter</option>
        <option>Option A</option>
        <option>Option B</option>
      </select>
    </div>
    <div class="filter-section">
      <label>Filter Name</label>
      <a href="#" class="clear-link">Clear</a>
      <select>
        <option>Select one from filter</option>
        <option>Option A</option>
        <option>Option B</option>
      </select>
    </div>
    <div class="filter-footer">
      <button class="reset-btn">Reset</button>
      <button class="apply-btn">Apply</button>
    </div>
  </div>

  <!-- NAVIGATION BUTTONS -->

  <div class="tab-buttons">
    <button class="tab-button active" onclick="showTab('sedangBerjalan')">Sedang Berjalan</button>
    <button class="tab-button" onclick="showTab('trainingNeedsAnalysis')">Training Needs Analysis</button>
    <button class="tab-button" onclick="showTab('selesai')">Selesai</button>

  </div>

  <!-- STATISTIK SEDANG BERJALAN-->
  <div id="sedangBerjalan" class="tab-content">
    <div class="stat-boxes w-full">
      <div class="stat-box">
        <div class="icon-circle blue"><i class="fas fa-user-group"></i></div>
        <div class="stat-info">
          <div class="stat-value">{{ $pelatihanBerjalan }}</div>
          <div class="stat-label">Total Pelatihan Berjalan</div>
        </div>
      </div>

      <div class="stat-box">
        <div class="icon-circle cyan"><i class="fas fa-building"></i></div>
        <div class="stat-info">
          <div class="stat-value">{{ $pelatihanDijadwalkan }}</div>
          <div class="stat-label">Total Pelatihan Dijadwalkan</div>
        </div>
      </div>

      <div class="double-box">
        <div class="sub-box">
          <div class="icon-circle purple"><i class="fas fa-file-lines"></i></div>
          <div class="stat-info">
            <div class="stat-value">{{ $tna }} Pelatihan</div>
            <div class="stat-label">Jumlah Pelatihan TNA</div>
          </div>
        </div>
        <div class="sub-box">
          <div class="stat-info">
            <div class="stat-value">{{ $nonTna }} Pelatihan</div>
            <div class="stat-label">Jumlah Pelatihan Non-TNA</div>
          </div>
        </div>
      </div>

    </div>


    <!-- TABEL MENAMPILKAN DATA SEDANG BERJALAN -->
    <div class="overflow-x-scroll" style="max-width: 153vh;">
      <table id="customers" style="min-width: 1100px;">
        <tr>
          <th class="sticky left-0 z-20 bg-gray-100 px-3 py-1 border-b">No</th>
          <th class="px-3 py-1 text-right whitespace-nowrap">
            Nama Training (Learning Solutsion)
            <a href="{{ route('training.index', [
          'sort_by_training'   => 'nama_training',
          'sort_order_training'=> ($sortByTraining == 'nama_training' && $sortOrderTraining == 'asc') ? 'desc' : 'asc'
      ]) }}#trainings">
              {!! $sortByTraining == 'nama_training' ? '⇅' : '⇅' !!}
          </th>
          <th class="px-3 py-1 text-right whitespace-nowrap">
            Status
            <a href="{{ route('training.index', [
          'sort_by_training'   => 'status',
          'sort_order_training'=> ($sortByTraining == 'status' && $sortOrderTraining == 'asc') ? 'desc' : 'asc'
      ]) }}#trainings">
              {!! $sortByTraining == 'status' ? '⇅' : '⇅' !!}
          </th>
          <th class="px-3 py-1 text-right whitespace-nowrap">
            Stream
            <a href="{{ route('training.index', [
          'sort_by_training'   => 'stream',
          'sort_order_training'=> ($sortByTraining == 'stream' && $sortOrderTraining == 'asc') ? 'desc' : 'asc'
      ]) }}#trainings">
              {!! $sortByTraining == 'stream' ? '⇅' : '⇅' !!}
          </th>
          <th class="px-3 py-1 text-right whitespace-nowrap">
            Keterangan
            <a href="{{ route('training.index', [
          'sort_by_training'   => 'keterangan',
          'sort_order_training'=> ($sortByTraining == 'keterangan' && $sortOrderTraining == 'asc') ? 'desc' : 'asc'
      ]) }}#trainings">
              {!! $sortByTraining == 'keterangan' ? '⇅' : '⇅' !!}
          </th>
          <th class="px-3 py-1 text-right whitespace-nowrap">
            Jumlah Peserta
            <a href="{{ route('training.index', [
          'sort_by_training'   => 'jumlah_peserta',
          'sort_order_training'=> ($sortByTraining == 'jumlah_peserta' && $sortOrderTraining == 'asc') ? 'desc' : 'asc'
      ]) }}#trainings">
              {!! $sortByTraining == 'jumlah_peserta' ? '⇅' : '⇅' !!}
          </th>
          <th class="px-3 py-1 text-right whitespace-nowrap">
            Tanggal Mulai
            <a href="{{ route('training.index', [
          'sort_by_training'   => 'tanggal_mulai',
          'sort_order_training'=> ($sortByTraining == 'tanggal_mulai' && $sortOrderTraining == 'asc') ? 'desc' : 'asc'
      ]) }}#trainings">
              {!! $sortByTraining == 'tanggal_mulai' ? '⇅' : '⇅' !!}
          </th>
          <th class="px-3 py-1 text-right whitespace-nowrap">
            Tanggal Selesai
            <a href="{{ route('training.index', [
          'sort_by_training'   => 'tanggal_selesai',
          'sort_order_training'=> ($sortByTraining == 'tanggal_selesai' && $sortOrderTraining == 'asc') ? 'desc' : 'asc'
      ]) }}#trainings">
              {!! $sortByTraining == 'tanggal_selesai' ? '⇅' : '⇅' !!}
          </th>
          <th class="px-3 py-1 text-right whitespace-nowrap">
            Tipe Training
            <a href="{{ route('training.index', [
          'sort_by_training'   => 'tipe_training',
          'sort_order_training'=> ($sortByTraining == 'tipe_training' && $sortOrderTraining == 'asc') ? 'desc' : 'asc'
      ]) }}#trainings">
              {!! $sortByTraining == 'tipe_training' ? '⇅' : '⇅' !!}
          </th>
          <th class="px-3 py-1 text-right whitespace-nowrap">
            Penyelenggara
            <a href="{{ route('training.index', [
          'sort_by_training'   => 'penyelenggara',
          'sort_order_training'=> ($sortByTraining == 'penyelenggara' && $sortOrderTraining == 'asc') ? 'desc' : 'asc'
      ]) }}#trainings">
              {!! $sortByTraining == 'penyelenggara' ? '⇅' : '⇅' !!}
          </th>
          <th class="px-3 py-1 text-right whitespace-nowrap">
            Metode Pelatihan
            <a href="{{ route('training.index', [
          'sort_by_training'   => 'metode_pelatihan',
          'sort_order_training'=> ($sortByTraining == 'metode_pelatihan' && $sortOrderTraining == 'asc') ? 'desc' : 'asc'
      ]) }}#trainings">
              {!! $sortByTraining == 'metode_pelatihan' ? '⇅' : '⇅' !!}
          </th>
          <th class="px-3 py-1">
            TNA/Non TNA
            <a href="{{ route('training.index', [
          'sort_by_training'   => 'tna',
          'sort_order_training'=> ($sortByTraining == 'tna' && $sortOrderTraining == 'asc') ? 'desc' : 'asc'
      ]) }}#trainings">
              {!! $sortByTraining == 'tna' ? '⇅' : '⇅' !!}
          </th>
          <th class="sticky right-0 z-30 bg-gray-100 px-3 py-1 border-b">Actions</th>
        </tr>
        @foreach($training as $training)
        <tr>
          <td class="sticky left-0 z-20 bg-gray-100 px-3 py-1 border-b">{{ $loop->iteration }}</td>
          <td>{{ $training->nama_training }}</td>
          <td>{{ $training->status }}</td>
          <td>{{ $training->stream }}</td>
          <td>{{ $training->keterangan }}</td>
          <td>{{ $training->partisipan }}</td>
          <td>{{ \Carbon\Carbon::parse($training->tanggal_mulai)->setTimezone('Asia/Jakarta')->format('d F Y H:i:s') }}</td>
          <td>{{ \Carbon\Carbon::parse($training->tanggal_selesai)->setTimezone('Asia/Jakarta')->format('d F Y H:i:s') }}</td>
          <td>{{ $training->tipe_training }}</td>
          <td>{{ $training->penyelenggara }}</td>
          <td>{{ $training->metode_pelatihan }}</td>
          <td>{{ $training->tna }}</td>

          <!-- Actions sticky kanan -->
          <td class="sticky right-0 z-20 bg-white px-3 py-1 border-b">
            <div class="dropdown-action" style="position: relative;">
              <button class="horizontal-dots">&#x22EF;</button>
              <!-- DropDown Action -->
              <div class="absolute right-0 w-40 bg-white border border-gray-200 rounded-lg shadow-lg hidden z-60">
                <a href="{{ route('training.show', $training->id) }}"
                  class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-100">
                  Detail
                </a>
                <a href="{{ route('training.edit', $training->id) }}"
                  class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-100">
                  Edit
                </a>
                <form action="{{ route('training.destroy', $training->id) }}" method="POST"
                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit"
                    class="w-full text-left px-4 py-2 text-xs text-red-600 hover:bg-red-100">
                    Cancelled
                  </button>
                </form>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </table>


      <!-- MENGHITUNG TOTAL DATA YANG AKAN DITAMPILKAN -->
      <div class="flex items-center gap-2 mt-5">
        <span>Menampilkan</span>

        <form method="GET" action="{{ route('training.index') }}">
          <select
            name="per_page"
            id="per_page"
            class="w-24 border-2 border-black rounded-md px-2 py-1"
            onchange="this.form.submit()">
            @for ($i = 1; $i <= 10; $i++)
              <option value="{{ $i }}" {{ $perPage == $i ? 'selected' : '' }}>
              {{ $i }}
              </option>
              @endfor
          </select>
        </form>

        <span>entri dari {{ $totalTraining }} entri</span>
      </div>
    </div>
  </div>


  <!-- TRAINING NEEDS ANALYSIS -->

  <div class="tab-content" id="trainingNeedsAnalysis" style="display: none;">
    <div class="stat-boxes2 w-full">
      <div class="px-3 py-2 stat-box2">
        <div class="icon-circle blue"><i class="fas fa-user-group"></i></div>
        <div class="stat-info">
          <div class="stat-value font-bold">Rp.{{ number_format($totalBiaya, 0, ',','.') }}</div>
          <div class="stat-label">Total Anggaran 2025</div>
        </div>
      </div>

      <div class="stat-box2 px-3 py-2 w-[100%]">
        <div class="icon-circle cyan"><i class="fas fa-building"></i></div>
        <div class="stat-info">
          <div class="stat-value font-bold">Rp.{{ number_format($biaya, 0, ',','.') }}</div>
          <div class="stat-label">Anggaran Terpakai 2025</div>
        </div>
      </div>

      <div class="stat-box2 px-3 py-2">
        <div class="icon-circle purple"><i class="fas fa-file-lines"></i></div>
        <div class="stat-info">
          <div class="stat-value font-bold">{{ $totalNamaTraining }}</div>
          <div class="stat-label">Total Learning Solutsion</div>
        </div>
      </div>

      <div class="stat-box2 px-3 py-2">
        <div class="icon-circle purple"><i class="fas fa-star"></i></div>
        <div class="stat-info">
          <div class="stat-value font-bold">{{ $tna }} Pelatihan</div>
          <div class="stat-label">Realisasi TNA 2025</div>
        </div>
      </div>

    </div>


    <!-- TABEL MENAMPILKAN DATA TRAINING NEEDS ANALYSIS -->
    <div class="overflow-x-scroll" style="max-width: 153vh;">
      <table id="customers" style="min-width: 1100px;">
        <tr>
          <th class="sticky left-0 z-20 bg-gray-100 px-3 py-1 border-b">No</th>
          <th class="px-3 py-1 text-right whitespace-nowrap">
            Tahun
            <a href="{{ route('training.index', [
          'sort_by_training'   => 'tanggalMulai',
          'sort_order_training'=> ($sortByTraining == 'tanggalMulai' && $sortOrderTraining == 'asc') ? 'desc' : 'asc'
      ]) }}#trainingNeedsAnalysis">
              {!! $sortByTraining == 'tanggalMulai' ? '⇅' : '⇅' !!}
          </th>
          <th class="px-3 py-1 text-right whitespace-nowrap">
            Learning Solutsion
            <a href="{{ route('training.index', [
          'sort_by_training'   => 'nama_training',
          'sort_order_training'=> ($sortByTraining == 'nama_training' && $sortOrderTraining == 'asc') ? 'desc' : 'asc'
      ]) }}#trainingNeedsAnalysis">
              {!! $sortByTraining == 'nama_training' ? '⇅' : '⇅' !!}
          </th>
          <th class="px-3 py-1 text-right whitespace-nowrap">
            Status
            <a href="{{ route('training.index', [
          'sort_by_training'   => 'status',
          'sort_order_training'=> ($sortByTraining == 'status' && $sortOrderTraining == 'asc') ? 'desc' : 'asc'
      ]) }}#trainingNeedsAnalysis">
              {!! $sortByTraining == 'status' ? '⇅' : '⇅' !!}
          </th>
          <th class="px-3 py-1 text-right whitespace-nowrap">
            Stream
            <a href="{{ route('training.index', [
          'sort_by_training'   => 'stream',
          'sort_order_training'=> ($sortByTraining == 'stream' && $sortOrderTraining == 'asc') ? 'desc' : 'asc'
      ]) }}#trainingNeedsAnalysis">
              {!! $sortByTraining == 'stream' ? '⇅' : '⇅' !!}
          </th>
          <th class="px-3 py-1 text-right whitespace-nowrap">
            Keterangan
            <a href="{{ route('training.index', [
          'sort_by_training'   => 'keterangan',
          'sort_order_training'=> ($sortByTraining == 'keterangan' && $sortOrderTraining == 'asc') ? 'desc' : 'asc'
      ]) }}#trainingNeedsAnalysis">
              {!! $sortByTraining == 'keterangan' ? '⇅' : '⇅' !!}
          </th>
          <th class="px-3 py-1 text-right whitespace-nowrap">
            Jumlah Peserta
            <a href="{{ route('training.index', [
          'sort_by_training'   => 'jumlah_peserta',
          'sort_order_training'=> ($sortByTraining == 'jumlah_peserta' && $sortOrderTraining == 'asc') ? 'desc' : 'asc'
      ]) }}#trainingNeedsAnalysis">
              {!! $sortByTraining == 'jumlah_peserta' ? '⇅' : '⇅' !!}
          </th>
          <th class="px-3 py-1 text-right whitespace-nowrap">
            Tanggal Mulai
            <a href="{{ route('training.index', [
          'sort_by_training'   => 'tanggal_mulai',
          'sort_order_training'=> ($sortByTraining == 'tanggal_mulai' && $sortOrderTraining == 'asc') ? 'desc' : 'asc'
      ]) }}#trainingNeedsAnalysis">
              {!! $sortByTraining == 'tanggal_mulai' ? '⇅' : '⇅' !!}
          </th>
          <th class="px-3 py-1 text-right whitespace-nowrap">
            Tanggal Selesai
            <a href="{{ route('training.index', [
          'sort_by_training'   => 'tanggal_selesai',
          'sort_order_training'=> ($sortByTraining == 'tanggal_selesai' && $sortOrderTraining == 'asc') ? 'desc' : 'asc'
      ]) }}#trainingNeedsAnalysis">
              {!! $sortByTraining == 'tanggal_selesai' ? '⇅' : '⇅' !!}
          </th>
          <th class="px-3 py-1 text-right whitespace-nowrap">
            Tipe Training
            <a href="{{ route('training.index', [
          'sort_by_training'   => 'tipe_training',
          'sort_order_training'=> ($sortByTraining == 'tipe_training' && $sortOrderTraining == 'asc') ? 'desc' : 'asc'
      ]) }}#trainingNeedsAnalysis">
              {!! $sortByTraining == 'tipe_training' ? '⇅' : '⇅' !!}
          </th>
          <th class="px-3 py-1 text-right whitespace-nowrap">
            Penyelenggara
            <a href="{{ route('training.index', [
          'sort_by_training'   => 'penyelenggara',
          'sort_order_training'=> ($sortByTraining == 'penyelenggara' && $sortOrderTraining == 'asc') ? 'desc' : 'asc'
      ]) }}#trainingNeedsAnalysis">
              {!! $sortByTraining == 'penyelenggara' ? '⇅' : '⇅' !!}
          </th>
          <th class="px-3 py-1 text-right whitespace-nowrap">
            Metode Pelatihan
            <a href="{{ route('training.index', [
          'sort_by_training'   => 'metode_pelatihan',
          'sort_order_training'=> ($sortByTraining == 'metode_pelatihan' && $sortOrderTraining == 'asc') ? 'desc' : 'asc'
      ]) }}#trainingNeedsAnalysis">
              {!! $sortByTraining == 'metode_pelatihan' ? '⇅' : '⇅' !!}
          </th>
          <th class="px-3 py-1">
            TNA/Non TNA
            <a href="{{ route('training.index', [
          'sort_by_training'   => 'tna',
          'sort_order_training'=> ($sortByTraining == 'tna' && $sortOrderTraining == 'asc') ? 'desc' : 'asc'
      ]) }}#trainingNeedsAnalysis">
              {!! $sortByTraining == 'tna' ? '⇅' : '⇅' !!}
          </th>
          <th class="sticky right-0 z-30 bg-gray-100 px-3 py-1 border-b">Actions</th>
        </tr>


        @foreach($trainings as $row)
        <tr>
          <td class="sticky left-0 z-20 bg-gray-100 px-3 py-1 border-b">{{ $loop->iteration }}</td>
          <td>{{ \Carbon\Carbon::parse($row->tanggal_mulai)->format('Y') }}</td>
          <td>{{ $row->nama_training }}</td>
          <td>{{ $row->status }}</td>
          <td>{{ $row->stream }}</td>
          <td>{{ $row->keterangan }}</td>
          <td>{{ $row->partisipan }}</td>
          <td>{{ \Carbon\Carbon::parse($row->tanggal_selesai)->setTimezone('Asia/Jakarta')->format('d F Y H:i:s') }}</td>
          <td>{{ $row->tipe_training }}</td>
          <td>{{ $row->penyelenggara }}</td>
          <td>{{ $row->metode_pelatihan }}</td>
          <td>{{ $row->tna }}</td>

          <!-- Actions sticky kanan -->
          <td class="sticky right-0 z-20 bg-white px-3 py-1 border-b">
            <div class="dropdown-action" style="position: relative;">
              <button class="horizontal-dots">&#x22EF;</button>
              <!-- DropDown Action -->
              <div class="absolute right-0 w-40 bg-white border border-gray-200 rounded-lg shadow-lg hidden z-60">
                <a href="{{ route('training.show', $row->id) }}"
                  class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-100">
                  Detail
                </a>
                <a href="{{ route('training.edit', $row->id) }}"
                  class="block px-4 py-2 text-xs text-gray-700 hover:bg-gray-100">
                  Edit
                </a>
                <form action="{{ route('training.destroy', $row->id) }}" method="POST"
                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit"
                    class="w-full text-left px-4 py-2 text-xs text-red-600 hover:bg-red-100">
                    Cancelled
                  </button>
                </form>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>




@endsection

<script>
  function toggleFilter() {
    const modal = document.getElementById("filterModal");
    modal.style.display = modal.style.display === "block" ? "none" : "block";
  }

  function showTab(tabId) {
    // Sembunyikan semua konten
    const tabs = document.querySelectorAll('.tab-content');
    tabs.forEach(tab => tab.style.display = 'none');

    // Hapus kelas aktif dari semua tombol
    const buttons = document.querySelectorAll('.tab-button');
    buttons.forEach(btn => btn.classList.remove('active'));

    // Tampilkan tab yang diklik
    document.getElementById(tabId).style.display = 'block';

    // Tambahkan kelas aktif ke tombol yang diklik
    event.currentTarget.classList.add('active');
  }

  document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll(".horizontal-dots");

    buttons.forEach(btn => {
      btn.addEventListener("click", e => {
        e.stopPropagation();

        // Tutup semua dropdown lain
        document.querySelectorAll("td .absolute").forEach(menu => {
          if (menu !== btn.nextElementSibling) {
            menu.classList.add("hidden");
          }
        });

        // Toggle dropdown yg diklik
        btn.nextElementSibling.classList.toggle("hidden");
      });
    });

    // Tutup kalau klik di luar
    document.addEventListener("click", () => {
      document.querySelectorAll("td .absolute").forEach(menu => {
        menu.classList.add("hidden");
      });
    });
  });
</script>