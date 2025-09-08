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

  .profile-photo {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
  }

  .employee-name {
    font-size: 16px;
    margin: 0;
    font-weight: bold;
  }

  .badge-status {
    background-color: rgba(245, 40, 145, 0.15);
    color: deeppink;
    font-size: 10px;
    border-radius: 8px;
    padding: 2px 8px;
    margin-left: 6px;
    font-family: Poppins, sans-serif;
  }

  .badge-profile,
  .badge-keluarga,
  .badge-cluster {
    background-color: rgba(245, 40, 145, 0.15);
    color: deeppink;
  }

  .badge-pelatihan,
  .badge-payroll,
  .badge-karir,
  .badge-dokumen {
    background-color: rgb(124, 252, 0, 0.15);
    color: LimeGreen;
  }

  .position,
  .directorate {
    font-size: 14px;
    color: #444;
    margin: 2px 0;
  }

  .profile-info {
    display: flex;
    flex-direction: column;
    /* Mengatur nama dan email menjadi kolom */
  }

  .profile-name {
    font-size: 15px;
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


  /* OFFSET UNTUK KONTEN */
  .page-title {
    font-size: 18px;
    margin-bottom: 10px;
    margin-top: 1px;
    font-family: Poppins, sans-serif;
    font-weight: bolder;
    margin-right: 20px;
    margin-left: 1px;
  }

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


  .divider {
    grid-column: 1 / -1;
    margin: 30px 0;
    border-top: 3px solid #A9A9A9;
    margin-bottom: 10px;
  }

  .breadcrumb-row {
    padding: 20px 0;
    font-family: Poppins, sans-serif;
    color: #444;
    display: flex;
    align-items: center;
  }

  .breadcrumb-arrow {
    margin-bottom: 8px;
    padding: 2px 6px;
    color: #696969;
    font-size: 14px;
    gap: 8px;
    margin-left: 8px;
    cursor: pointer;
    margin-top: 4px;
  }

  .breadcrumb-text {
    font-family: Poppins, sans-serif;
    font-weight: normal;
    font-size: 16px;
    color: #555;
    text-decoration: none;
    margin-bottom: 4px;
    padding: 2px 6px;
    font-weight: bold;
    margin-top: 4px;
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
    margin-top: -10px;
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
    margin-bottom: 8px;
    padding: 2px 6px;
  }

  .breadcrumb-text:hover {
    color: #808080;
  }

  .tab-buttons {
    display: flex;
    border-bottom: 1.5px solid #A9A9A9;
    margin-top: 20px;
    font-family: Poppins, sans-serif;
    color: #A9A9A9;
  }

  .tab-button {
    /*
    padding: 10px 68px;  */
    width: 207px;
    height: 35px;
    max-width: 220px;
    border: none;
    background: none;
    font-size: 12px;
    cursor: pointer;
    color: #555;
    border-bottom: 3px solid transparent;
    transition: all 0.2s ease-in-out;

  }

  .tab-button:hover {
    color: #0000CD;
    font-weight: bold;
  }

  .tab-button.active {
    color: #0000CD;
    background-color: #e6e6fa;
    border-bottom: 3px solid #0000CD;
    font-weight: bold;

  }

  .tab-content {
    padding: 20px 0;
    font-family: Poppins, sans-serif;
    color: #444;
    display: flex;
  }

  .content1,
  .content3,
  .content5,
  .content6,
  .content7 {
    display: flex;
    width: 100%;
    justify-content: space-between;
    gap: 20px;
  }

  .left-content {
    margin-top: 5px;
    display: flex;
    gap: 3px;
    align-items: left;
    flex-direction: column;
    font-family: Poppins, sans-serif;
    word-break: break-word;
    word-wrap: break-word;
    width: 50%;
  }

  .left-content7 {
    margin-top: 5px;
    display: flex;
    gap: 3px;
    align-items: left;
    flex-direction: column;
    font-family: Poppins, sans-serif;
    word-break: break-word;
    word-wrap: break-word;
    width: 250px;
  }

  .left-content1 {
    margin-top: 5px;
    display: flex;
    gap: 3px;
    align-items: left;
    flex-direction: column;
    font-family: Poppins, sans-serif;
    word-break: break-word;
    word-wrap: break-word;
    width: 50%;
  }

  .right-content {
    display: flex;
    flex-direction: column;
    gap: 3px;
    padding-top: 20px;
    margin-left: 800px;
  }

  .right-content1 {
    display: flex;
    flex-direction: column;
    gap: 3px;
    padding-top: 20px;
    margin-left: 800px;
  }

  .right-content2 {
    padding-top: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
    padding-left: 300px;
  }

  .right-content3 {
    display: flex;
    flex-direction: column;
    gap: 3px;
    padding-top: 20px;
    margin-left: 820px;
  }

  .right-content7 {
    display: flex;
    flex-direction: column;
    gap: 3px;
    padding-top: 20px;
    margin-left: 650px;
  }

  .content-info {
    font-size: 14px;
    font-weight: bold;
    padding-top: 20px;
    padding-left: -50px;
  }

  .form-grid {
    display: grid;
    grid-template-columns: repeat(2, 500px);
    gap: 24px;
    font-family: Poppins, sans-serif;
    font-weight: normal;
    font-size: 14px;
    padding-top: 35px;
  }

  .form-grid1 {
    display: grid;
    grid-template-columns: repeat(2, 360px);
    gap: 24px;
    font-family: Poppins, sans-serif;
    font-weight: normal;
    font-size: 14px;
    padding-top: 35px;
  }

  .form-group {
    display: flex;
    flex-direction: column;
    margin-right: 50px;
  }

  .form-group1 {
    display: flex;
    flex-direction: column;
    padding-left: 30px;
    margin-right: 30px;
  }

  .form-group2 {
    display: flex;
    flex-direction: column;
    margin-right: 35px;
  }

  .form-group3 {
    display: flex;
    flex-direction: column;
    margin-right: 40px;
    padding-left: -80px;
  }

  .fully-width {
    grid-column: span 2;
    gap: 6px;
    margin-top: -40px;
  }


  .label-group {
    display: flex;
    align-items: center;
    gap: 4px;
  }

  label {
    font-size: 14px;
    font-weight: normal;
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


  .container {
    position: relative;
    /* Penting untuk posisi konten */
  }

  .arrowDown-btn {
    background-color: white;
    border: 1px solid #0000CD;
    padding: 5px 7px;
    cursor: pointer;
    border-radius: 5px;
  }

  .arrowDown-btn1 {
    background-color: white;
    border: 1px solid #0000CD;
    padding: 5px 7px;
    cursor: pointer;
    border-radius: 5px;
  }

  .fa-chevron-down {
    font-size: 16px;
    color: #0000CD;
  }

  .content2 {
    display: none;
    /* Konten tersembunyi */
    position: absolute;
    /* Posisi absolut terhadap kontainer */
    top: 280px;
    /*  Letakkan di bawah tombol */
    left: 0;
    background-color: white;
    border-radius: 20px;
    padding: 0px 32px;
    max-width: 100%;
    width: 1100px;
    /* Sidebar width + padding */
    box-sizing: border-box;
    min-height: unset;
    /* Biar tetap tinggi meski tanpa isi */
    flex-wrap: wrap;
    z-index: 1;
    /* Pastikan di atas elemen lain */
  }


  .content4 {
    display: none;
    /* Konten tersembunyi */
    position: absolute;
    /* Posisi absolut terhadap kontainer */
    top: 370px;
    /*  Letakkan di bawah tombol */
    left: 0;
    background-color: white;
    border-radius: 20px;
    padding: 0px 32px;
    max-width: 100%;
    width: 1100px;
    /* Sidebar width + padding */
    box-sizing: border-box;
    min-height: unset;
    /* Biar tetap tinggi meski tanpa isi */
    flex-wrap: wrap;
    z-index: 1;
    /* Pastikan di atas elemen lain */
  }


  /*  Gaya saat konten ditampilkan */
  .content2.show {
    display: block;
  }

  .content4.show {
    display: block;
  }

  .add-btn {
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
    height: 32px;
    width: 90px;
  }

  .add-btn:hover {
    background-color: #191970;
  }

  .fa-plus {
    font-size: 12px;
    font-weight: bold;
    font-family: Poppins, sans-serif;
    align-items: center;
  }

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
    background-color: rgba(242, 235, 251, 0.8);
    color: #080808;
    font-weight: normal;
  }

  #customers td {
    border-bottom: 1px solid #A9A9A9;
    padding-top: 12px;
    padding-bottom: 12px;
    padding-left: 15px;
    padding-right: 12px;
    text-align: left;
    background-color: white;
    color: #2F4F4F;
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
    width: 100px;
    height: 60px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    z-index: 1;
    border: 1px solid #ccc;
    border-radius: 8px;
    margin-left: -65px;
    padding: 10px;
    margin-top: -10px;
  }

  .dropdown-action-content a {
    display: block;
    font-family: Poppins, sans-serif;
    font-weight: normal;
    font-size: 12px;
    color: #555;
    text-decoration: none;
    margin-left: 8px;
    margin-bottom: -13px;
    /* Atur jarak antar baris */
  }

  .right-section2 {
    display: flex;
    justify-content: flex-end;
    /* dorong ke kanan */
    margin-top: 40px;
    width: 100%;
    padding-left: 820px;

    /*
  display: flex;
  align-items: center;
  flex-wrap: wrap;
  padding-left: 820px;
  margin-top: 40px; */
  }

  .right-section3 {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    padding-left: 820px;
    margin-top: 40px;
  }

  .save-btn {
    padding: 14px 30px;
    border-radius: 8px;
    border: 1px solid;
    background-color: rgb(0, 0, 205);
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
    border: 1px solid #D3D3D3;
    background-color: #D3D3D3;
    color: #696969;
    cursor: pointer;
    font-size: 12px;
    display: flex;
    align-items: center;
    gap: 6px;
    margin-right: 15px;
    font-weight: bold;
    font-family: Poppins, sans-serif;
    text-decoration: none;
  }

  .save-btn:hover {
    background-color: #00008B;
    color: white;
  }

  .cancel-btn:hover {
    background-color: #A9A9A9;
  }

  /* Modal Wrapper */
  #addModal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 2000;
    font-family: Poppins, sans-serif;

  }

  /* Modal Box */
  #addModal .modal-content {
    background: white;
    top: 50px;
    width: 760px;
    height: 550px;
    margin: 100px auto;
    padding: 30px;
    border-radius: 16px;
    text-align: center;
    position: relative;
  }

  #addModal .left-content6 {
    font-family: Poppins, sans-serif;
    font-weight: bold;
    text-align: left;
  }

  #addModal .full-width {
    border-radius: 15px;
    width: 635px;
    height: 200px;
  }

  /* Close Button */
  #addModal .close-button {
    position: absolute;
    top: 30px;
    right: 35px;
    color: #696969;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 6px;
    font-weight: bold;
    width: 20px;
    height: 20px;
    font-size: 20px;
  }

  /* Form Layout */
  #addModal form input[type="file"] {
    margin-bottom: 20px;
  }

  #addModal .form-buttons {
    margin-top: 230px;
    display: flex;
    justify-content: center;
    gap: 20px;
    font-size: 14px;
  }

  #addModal .form-buttons button {
    padding: 10px 140px;
    border-radius: 10px;
  }

  #addModal .form-buttons .cancel {
    border: 1px solid #ccc;
    background: #eee;
    background-color: #D3D3D3;
    color: #696969;
    font-weight: bold;
  }

  #addModal .form-buttons .submit {
    border: none;
    background-color: rgba(0, 0, 205, 0.7);
    color: white;
    font-weight: bold;
  }

  /* MODAL CLUSTER */
  /* Modal Wrapper */
  #addClusterModal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 2000;
    font-family: Poppins, sans-serif;

  }

  /* Modal Box */
  #addClusterModal .modal-content {
    background: white;
    top: 50px;
    width: 760px;
    height: 360px;
    margin: 100px auto;
    padding: 30px;
    border-radius: 16px;
    text-align: center;
    position: relative;
  }

  #addClusterModal .left-content6 {
    font-family: Poppins, sans-serif;
    font-weight: bold;
    text-align: left;
  }


  /* Close Button */
  #addClusterModal .close-button {
    position: absolute;
    top: 30px;
    right: 35px;
    color: #696969;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 6px;
    font-weight: bold;
    width: 20px;
    height: 20px;
    font-size: 20px;
  }

  /* Form Layout */
  #addClusterModal form input[type="file"] {
    margin-bottom: 20px;
  }

  #addClusterModal .form-buttons {
    margin-top: 20px;
    display: flex;
    justify-content: center;
    gap: 20px;
    font-size: 14px;
  }

  #addClusterModal .form-buttons button {
    padding: 10px 140px;
    border-radius: 10px;
  }

  #addClusterModal .form-buttons .cancel {
    border: 1px solid #ccc;
    background: #eee;
    background-color: #D3D3D3;
    color: #696969;
    font-weight: bold;
  }

  #addClusterModal .form-buttons .submit {
    border: none;
    background-color: rgba(0, 0, 205, 0.7);
    color: white;
    font-weight: bold;
  }

  .bintang {
    color: red;
  }

  .timeline {
    border-left: 2px solid #ccc;
    margin-left: 20px;
    padding-left: 20px;
  }

  .timeline-item {
    margin-bottom: 20px;
    position: relative;
  }

  .timeline-item::before {
    content: "";
    position: absolute;
    left: -9px;
    top: 5px;
    width: 15px;
    height: 15px;
    background-color: #0d6efd;
    border-radius: 50%;
  }

  #tambahAktivitasModal {
    display: none;
    position: fixed;
    top: 80px;
    left: -170px;
    z-index: 2000;
    font-family: Poppins, sans-serif;
    width: 100%;
    /*Atau width: max-content; */
    max-width: 100%;
    /*Batasi lebar maksimum */
  }

  #tambahAktivitasModal .modal-content {
    background: white;
    width: 780px;
    max-height: 90vh;
    /* biar responsif */
    overflow-y: auto;
    /* bisa scroll kalau konten banyak */
    margin: auto;
    padding: 30px;
    border-radius: 16px;
    text-align: left;
    display: flex;
    flex-direction: column;
  }

  #tambahAktivitasModal .left-content6 {
    font-family: Poppins, sans-serif;
    font-weight: bold;
    text-align: left;
    margin-top: 10px;
  }

  #tambahAktivitasModal .full-width {
    border-radius: 15px;
    width: 635px;
    height: 200px;
  }

  /* Close Button */
  #tambahAktivitasModal .close-button {
    position: absolute;
    display: flex;
    top: 35px;
    right: 35px;
    color: #696969;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 6px;
    font-weight: bold;
    width: 20px;
    height: 20px;
    font-size: 20px;
  }

  /* Form Layout */
  #tambahAktivitasModal form input[type="file"] {
    margin-bottom: 20px;
  }

  #tambahAktivitasModal .form-grid1 {
    display: grid;
    grid-template-columns: repeat(2, 370px);
    gap: 25px;
    font-family: Poppins, sans-serif;
    font-weight: normal;
  }

  #tambahAktivitasModal .form-group {
    display: flex;
    flex-direction: column;
    font-size: 10px;
  }

  #tambahAktivitasModal .label-group {
    display: flex;
    align-items: center;
    gap: 4px;
  }

  #tambahAktivitasModal .form-grid1 .label {
    font-weight: normal;
    margin-bottom: 6px;
  }

  #tambahAktivitasModal .form-control {
    padding: 12px;
    font-size: 12px;
    border-radius: 8px;
    border: 1px solid #ccc;
    background-color: white;
  }

  #tambahAktivitasModal .form-control1 {
    padding: 12px;
    font-size: 12px;
    border-radius: 8px;
    border: 1px solid #ccc;
    background-color: white;
  }

  #tambahAktivitasModal .form-buttons {
    margin-top: 10px;
    display: flex;
    justify-content: center;
    gap: 20px;
    font-size: 14px;
    position: sticky;
  }

  #tambahAktivitasModal .form-buttons button {
    padding: 10px 145px;
    border-radius: 10px;
  }

  #tambahAktivitasModal .form-buttons .cancel {
    border: 1px solid #ccc;
    background: #eee;
    background-color: #D3D3D3;
    color: #696969;
    font-weight: bold;
  }

  #tambahAktivitasModal .form-buttons .submit {
    border: none;
    background-color: rgba(0, 0, 205, 0.7);
    color: white;
    font-weight: bold;
  }

  #tambahAktivitasModal .addInfo-btn {
    padding: 6px 20px;
    border-radius: 8px;
    border: 1px solid #0000FF;
    background-color: white;
    color: #0000FF;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 6px;
    font-weight: 500;
    height: 32px;
    width: 230px;
    font-size: 14px;
    margin-right: 50px;
  }

  #extraFields {
    display: grid;
    grid-template-columns: 1fr 1fr;
    /* 2 kolom */
    gap: 25px;
    /* jarak antar kolom */
    margin-top: 10px;

    display: grid;
    grid-template-columns: repeat(2, 370px);
    gap: 25px;
    font-family: Poppins, sans-serif;
    font-weight: normal;
  }


  #infoModal {
    z-index: 2100;
    /* modal popup kecil di atas modal utama */
    position: fixed;
    top: 525px;
    left: 920px;
    transform: translate(-50%, -50%);
    width: 230px;
    /* kecil saja */
  }

  #infoModal .modal-content {
    border-radius: 10px;
    background: #fff;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.2);
    /* shadow di sini */
  }

  #infoModal .form-check-label {
    font-family: Poppins, sans-serif;
    font-size: 11px;
    font-weight: normal;
    margin-top: 4px;
  }

  #infoModal .info-option {
    height: 15px;
    width: 15px;
    margin-right: 10px;
  }

  #infoModal .buttons1 {
    display: flex;
    justify-content: center;
    font-size: 12px;
    position: sticky;
    gap: 5px;
  }

  #infoModal .buttons1 button {
    padding: 6px 25px;
    border-radius: 8px;
  }

  #infoModal .buttons1 .cancel1 {
    border: 1px solid #ccc;
    background: #eee;
    background-color: #D3D3D3;
    color: #696969;
    font-weight: bold;
  }

  #infoModal .buttons1 .simpan1 {
    border: none;
    background-color: rgba(0, 0, 205, 0.7);
    color: white;
    font-weight: bold;
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


  .timeline-container {
    position: relative;
    margin: 30px 0;
    padding-left: 40px;
    margin-left: -5px;
    width: 100%;
  }

  .timeline-container1 {
    position: relative;
    margin: 30px 0;
    padding-left: 40px;
    margin-left: 20px;
  }

  .timeline-group {
    position: relative;
    padding-left: 60px;
    border-left: 3px solid #d1d5db;
    margin-bottom: 40px;
    margin-left: 45px;
  }

  .timeline-item {
    position: relative;
    margin-bottom: 40px;
    padding-left: 20px;
    margin-right: 50px;
  }

  .timeline-year {
    position: absolute;
    left: -140px;
    top: 8px;
    background-image: linear-gradient(to right, darkBlue, mediumblue);
    ;
    color: white;
    padding: 4px 14px;
    border-radius: 6px;
    font-weight: 500;
    font-size: 12px;
  }

  .timeline-year1 {
    position: absolute;
    left: -140px;
    top: 8px;
    background-color: #DCDCDC;
    color: black;
    padding: 4px 14px;
    border-radius: 6px;
    font-weight: 500;
    font-size: 12px;
  }

  .timeline-item::after {
    content: "";
    position: absolute;
    left: -108px;
    top: 6px;
    width: 18px;
    height: 18px;
    border-radius: 50%;
    margin-left: 37px;
    margin-top: 5px;
  }

  .timeline-item::before {
    content: none !important;
  }


  .timeline-item.new::after {
    border: 4px solid rgb(100, 149, 237);
    background-color: #0000FF;

  }

  .timeline-item.old::after {
    border: 4px solid rgb(220, 220, 220);
    background-color: #A9A9A9;
  }


  .timeline-content {
    background-color: #fff;
    padding: 10px 0px;
    margin-left: -60px;
    display: flex;
    justify-content: space-between;
  }

  .timeline-content1 {
    background-color: #fff;
    padding: 10px 0px;
    margin-left: -60px;
    margin-top: -5px;
  }


  .role-title {
    color: #1D4ED8;
    font-weight: bold;
    font-size: 14px;
    margin: 0 0 4px;
    flex-direction: column;
    display: flex;
  }

  .role-title1 {
    color: black;
    font-weight: bold;
    font-size: 14px;
    margin: 0 0 4px;
  }

  .sub-info {
    font-size: 12px;
    color: #444;
    margin: 0 0 4px;
  }

  .promo-date {
    font-size: 12px;
    color: #666;
    margin: 0 0 6px;
  }

  .description {
    font-size: 12px;
    color: #333;
  }


  .role-left {
    margin-top: 5px;
    display: flex;
    gap: 3px;
    align-items: left;
    flex-direction: column;
    font-family: Poppins, sans-serif;
    word-break: break-word;
    word-wrap: break-word;
  }

  .role-right {
    display: flex;
    flex-direction: column;
    gap: 3px;
    padding-top: 20px;
  }

  .delete-btn {
    padding: 6px 15px;
    border-radius: 8px;
    border: 1px solid red;
    background-color: white;
    color: red;
    cursor: pointer;
    font-size: 12px;
    display: flex;
    align-items: center;
    gap: 6px;
    font-weight: bold;
    height: 35px;
    width: 92px;
    margin-top: -30px;
    margin-left: -100px;
  }

  .delete-btn:hover {
    background-color: #DCDCDC;
  }

  .edit-btn {
    padding: 6px 20px;
    border-radius: 8px;
    border: 1px solid #0000CD;
    background-color: white;
    color: mediumblue;
    cursor: pointer;
    font-size: 12px;
    display: flex;
    align-items: center;
    gap: 6px;
    font-weight: bold;
    height: 35px;
    width: 92px;
    margin-top: -54px;
    margin-right: -50px;
  }

  .edit-btn:hover {
    background-color: #DCDCDC;
  }

  #detailAktivitasModal {
    display: none;
    position: fixed;
    top: 200px;
    left: -140px;
    z-index: 2200;
    font-family: Poppins, sans-serif;
    width: 100%;
    /*Atau width: max-content; */
    max-width: 100%;
    /*Batasi lebar maksimum */
  }

  #detailAktivitasModal .modal-content {
    background: white;
    width: 750px;
    max-height: 90vh;
    /* biar responsif */
    overflow-y: auto;
    /* bisa scroll kalau konten banyak */
    margin: auto;
    padding: 30px;
    border-radius: 16px;
    text-align: left;
    display: flex;
    flex-direction: column;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.4);
    /* shadow di sini */
  }

  #detailAktivitasModal .left-content6 {
    font-family: Poppins, sans-serif;
    font-weight: bold;
    text-align: left;
    margin-top: 10px;
  }

  /* Close Button */
  #detailAktivitasModal .close-button {
    position: absolute;
    display: flex;
    top: 35px;
    right: 35px;
    color: #696969;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 6px;
    font-weight: bold;
    width: 20px;
    height: 20px;
    font-size: 20px;
  }

  #detailAktivitasModal .form-grid {
    display: grid;
    grid-template-columns: repeat(2, 370px);
    gap: 15px;
    font-family: Poppins, sans-serif;
  }

  #detailAktivitasModal .form-grid h4 {
    font-size: 12px;
    color: #777;
    margin-bottom: 10px;
    font-weight: 500;
    font-family: Poppins, sans-serif;
    margin-top: 15px;
  }

  #detailAktivitasModal .form-grid p {
    font-size: 12px;
    font-weight: 600;
    margin: 0;
    color: #000;
  }

  #detailAktivitasModal .form-grid a {
    font-size: 12px;
    font-weight: 600;
    margin: 0;
    color: mediumblue;
    text-decoration: underline;
  }
</style>

<div class="navbar" style="z-index:0;">
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
      <li><a class="active" href="#tlm"><i class="fas fa-user-group"></i>Talent Management</a></li>
      <li><a href="{{ route('recruitment.index') }}"><i class="fas fa-user"></i>Recruitment Management</a></li>
      <li><a href="#trm"><i class="fas fa-chart-line"></i>Training Management</a></li>
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
      <div style="display: flex; align-items: center; gap: 6px;">
        <div class="breadcrumb-row">
          <a href="{{ route('home') }}" class="btn-home" style="padding: 0; color: #696969;">
            <i class="fas fa-house"></i>
          </a>
          <i class="fas fa-chevron-right breadcrumb-arrow"></i>
          <a href="{{ route('employees.index') }}" class="breadcrumb-text">Talent Management</a>
          <i class="fas fa-chevron-right breadcrumb-arrow"></i>
          <a href="{{ route('employees.show', $employee->id) }}" class="breadcrumb-text">Employee Profile</a>
          <i class="fas fa-chevron-right breadcrumb-arrow"></i>
          <a href="{{ url()->current() }}" class="breadcrumb-text">Edit</a>
        </div>
      </div>
      <h2 class="page-title">Edit Profile</h2>
    </div>


    <!-- NAVIGATION BUTTONS -->
    <div class="tab-buttons">
      <button class="tab-button active" onclick="showTab('profile')">Profile</button>
      <button class="tab-button" onclick="showTab('keluarga')">Data Keluarga</button>
      <button class="tab-button" onclick="showTab('cluster')">Talent Cluster</button>
      <button class="tab-button" onclick="showTab('karir')">Aktivitas Karir</button>
      <button class="tab-button" onclick="showTab('dokumen')">Dokumen</button>

    </div>

    <div class="tab-content" id="profile" style="display: none;">
      <div class="content1">
        <div class="left-content">
          <h4 class="content-info">Informasi Pribadi</h4>
        </div>
        <div class="right-content">
          <button class="arrowDown-btn">
            <i class="fas fa-chevron-down"></i>
          </button>
        </div>
      </div>
      <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-grid">
          <div class="form-group">
            <div class="label-group">
              <label>Nama</label>
            </div>
            <input type="text" name="name" class="form-control" value="{{ $employee->name }}" required>
          </div>

          <div class="form-group1">
            <div class="label-group">
              <label>NIK</label>
            </div>
            <input type="text" name="nik" class="form-control" value="{{ $employee->nik }}" required>
          </div>

          <div class="form-group">
            <div class="label-group">
              <label>E-mail</label>
            </div>
            <input type="text" name="email" class="form-control" value="{{ $employee->email }}" required>
          </div>

          <div class="form-group1">
            <div class="label-group">
              <label>Nomor Telepon</label>
            </div>
            <input type="text" name="no_telepon" class="form-control" value="{{ $employee->no_telepon }}" required>
          </div>

          <div class="form-group">
            <div class="label-group">
              <label>Nomor KTP</label>
            </div>
            <input type="text" name="no_ktp" class="form-control" value="{{ $employee->no_ktp }}" required>
          </div>

          <div class="form-group1">
            <div class="label-group">
              <label>Nomor NPWP</label>
            </div>
            <input type="text" name="no_npwp" class="form-control" value="{{ $employee->no_npwp }}" required>
          </div>

          <div class="form-group">
            <div class="label-group">
              <label>Jenis Kelamin</label>
            </div>
            <select name="jenis_kelamin" class="form-control1" value="{{ $employee->jenis_kelamin }}" required>
              <option disabled selected value=""></option>
              <option value="Laki Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>

          <div class="form-group1">
            <div class="label-group">
              <label>Agama</label>
            </div>
            <select name="agama" class="form-control1" value="{{ $employee->agama }}" required>
              <option disabled selected value=""></option>
              <option value="Islam">Islam</option>
              <option value="Kristen">Kristen</option>
              <option value="Hindu">Hindu</option>
              <option value="Buddha">Buddha</option>
              <option value="Konghucu">Konghucu</option>
            </select>
          </div>

          <div class="form-group">
            <div class="label-group">
              <label>Tempat, Tanggal Lahir</label>
            </div>
            <input type="text" name="ttl" class="form-control" value="{{ $employee->ttl }}" required>
          </div>

          <div class="form-group1">
            <div class="label-group">
              <label>Status Perkawinan</label>
            </div>
            <select name="status_perkawinan" class="form-control1" value="{{ $employee->status_perkawinan }}" required>
              <option disabled selected value=""></option>
              <option value="Kawin">Kawin</option>
              <option value="Belum Kawin">Belum Kawin</option>
              <option value="Cerai Hidup">Cerai Hidup</option>
              <option value="Cerai Mati">Cerai Mati</option>
            </select>
          </div>

          <div class="form-group">
            <div class="label-group">
              <label>Alamat Rumah Sesuai KTP</label>
            </div>
            <textarea name="alamat_ktp" class="form-control" rows="2" value="{{ $employee->alamat_ktp }}" required></textarea>
          </div>

          <div class="form-group1">
            <div class="label-group">
              <label>Alamat Domisili</label>
            </div>
            <textarea name="alamat_domisili" class="form-control" rows="2" value="{{ $employee->alamat_domisili }}" required></textarea>
          </div>
        </div>

        <hr class="divider">

        <div class="content1">
          <div class="left-content">
            <h4 class="content-info">Informasi Pendidikan</h4>
          </div>
          <div class="right-content">
            <button class="arrowDown-btn">
              <i class="fas fa-chevron-down"></i>
            </button>
          </div>
        </div>

        <div class="form-grid">
          <div class="form-group">
            <div class="label-group">
              <label>Level Pendidikan</label>
            </div>
            <select name="level_pendidikan" class="form-control1" value="{{ $employee->level_pendidikan }}" required>
              <option disabled selected value=""></option>
              <option value="D3/D4">D3/D4</option>
              <option value="S1">S1</option>
              <option value="S2">S2</option>
              <option value="S3">S3</option>
            </select>
          </div>

          <div class="form-group1">
            <div class="label-group">
              <label>Jurusan</label>
            </div>
            <select name="jurusan" class="form-control1" value="{{ $employee->jurusan }}" required>
              <option disabled selected value=""></option>
              <option value="Public Health">Public Health</option>
              <option value="blablabla">blablabla</option>
              <option value="claclacla">claclacla</option>
              <option value="dladladla">dladladla</option>
            </select>
          </div>

          <div class="form-group">
            <div class="label-group">
              <label>Institusi Pendidikan</label>
            </div>
            <select name="institusi_pendidikan" class="form-control1" value="{{ $employee->institusi_pendidikan }}" required>
              <option disabled selected value=""></option>
              <option value="UI">Universitas Indonesia</option>
              <option value="UGM">Universitas Gajah Mada</option>
              <option value="ITB">Institut Teknologi Bandung</option>
            </select>
          </div>

          <div class="form-group1">
            <div class="label-group">
              <label>Tahun Lulus</label>
            </div>
            <input type="month" name="tahun_lulus" class="form-control" value="{{ $employee->tahun_lulus }}" required>
          </div>
        </div>

        <div class="right-section2">
          <a href="{{ route('employees.show', $employee->id) }}" class="cancel-btn">Cancel</a>
          <button type="submit" class="btn save-btn">Save</button>
        </div>
      </form>
    </div>

    <div class="tab-content" id="keluarga" style="display: none;">
      <div class="content5">
        <div class="left-content">
          <h4 class="content-info">Informasi Pasangan</h4>
        </div>
        <div class="right-content">
          <button class="arrowDown-btn">
            <i class="fas fa-chevron-down"></i>
          </button>
        </div>
      </div>
      <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-grid">
          <div class="form-group">
            <div class="label-group">
              <label>Nama Lengkap</label>
            </div>
            <input type="text" name="namaPasangan" class="form-control" required>
          </div>

          <div class="form-group1">
            <div class="label-group">
              <label>Tempat, Tanggal Lahir</label>
            </div>
            <input type="text" name="ttlPasangan" class="form-control" required>
          </div>

          <div class="form-group">
            <div class="label-group">
              <label>NIK</label>
            </div>
            <input type="text" name="nikPasangan" class="form-control" required>
          </div>

          <div class="form-group1">
            <div class="label-group">
              <label>Agama</label>
            </div>
            <select name="agamaPasangan" class="form-control1" required>
              <option disabled selected value=""></option>
              <option value="Islam">Islam</option>
              <option value="Kristen">Kristen</option>
              <option value="Hindu">Hindu</option>
              <option value="Buddha">Buddha</option>
              <option value="Konghucu">Konghucu</option>
            </select>
          </div>

          <div class="form-group">
            <div class="label-group">
              <label>Status Perkawinan</label>
            </div>
            <select name="perkawinanPasangan" class="form-control1" required>
              <option disabled selected value=""></option>
              <option value="Belum Kawin">Belum Kawin</option>
              <option value="Kawin">Kawin</option>
              <option value="Cerai Hidup">Cerai Hidup</option>
              <option value="Cerai Mati">Cerai Mati</option>
            </select>
          </div>

          <div class="form-group1">
            <div class="label-group">
              <label>Pekerjaan Pasangan</label>
            </div>
            <select name="pekerjaanPasangan" class="form-control1" required>
              <option disabled selected value=""></option>
              <option value="PNS">PNS</option>
              <option value="Karyawan Swasta">Karyawan Swasta</option>
              <option value="Wiraswasta">Wiraswasta</option>
              <option value="Pekerjaan Lainnya">Pekerjaan Lainnya</option>
            </select>
          </div>

          <div class="form-group">
            <div class="label-group">
              <label>Pendidikan Terakhir</label>
            </div>
            <select name="agamaPasangan" class="form-control1" required>
              <option disabled selected value=""></option>
              <option value="Diploma">Diploma (D1, D2, D3, D4)</option>
              <option value="Sarjana">Sarjana S1</option>
              <option value="Magister">Magister (S2)</option>
              <option value="Doktor">Doktor (S3)</option>
            </select>
          </div>

          <div class="form-group1">
            <div class="label-group">
              <label>Nomor Telepon</label>
            </div>
            <input type="text" name="telponPasangan" class="form-control" required>
          </div>

          <div class="form-group">
            <div class="label-group">
              <label>Alamat Rumah Sesuai KTP</label>
            </div>
            <input type="text" name="alamatPasangan" class="form-control" required>
          </div>

          <div class="form-group1">
            <div class="label-group">
              <label>Alamat Sesuai Domisili</label>
            </div>
            <input type="text" name="domisiliPasangan" class="form-control" required>
          </div>
        </div>
      </form>

      <hr class="divider">

      <div class="content6">
        <div class="left-content">
          <h4 class="content-info">Informasi Anak</h4>
        </div>
        <div class="right-content2">
          <a href="#" class="add-btn" onclick="openAddModal()"><i class="fas fa-plus"></i>Tambah</a>
          <button class="arrowDown-btn1"><i class="fas fa-chevron-down"></i></button>
        </div>
      </div>
      <div id="keluarga-container" class="mt-4">
        <table class="table-auto border border-gray-300 text-center text-xs">

          <thead class="bg-gray-100 text-gray-700">
            <tr class="align-middle">
              <th class="px-3 py-1 text-right whitespace-nowrap">No</th>

              <th class="px-3 py-1 text-right whitespace-nowrap">
                <span class="inline-flex items-center gap-1">
                  <span>Nama Lengkap</span>
                  <a href="{{ route('employees.edit', [
              'employee'          => $employee->id,
              'sort_by_family'    => 'nama_lengkap',
              'sort_order_family' => ($sortByFamily == 'nama_lengkap' && $sortOrderFamily == 'asc') ? 'desc' : 'asc'
          ]) }}#keluarga"

                    class="text-lg text-gray-500 hover:text-black translate-y-[1px]">⇅</a>
                </span>
              </th>

              <th class="px-3 py-1 text-right whitespace-nowrap">
                <span class="inline-flex items-center gap-1">
                  <span>Jenis Kelamin</span>
                  <a href="{{ route('employees.edit', [
              'employee'          => $employee->id,
              'sort_by_family'    => 'jenis_kelamin',
              'sort_order_family' => ($sortByFamily == 'jenis_kelamin' && $sortOrderFamily == 'asc') ? 'desc' : 'asc'
          ]) }}#keluarga"
                    class="text-lg text-gray-500 hover:text-black translate-y-[1px]">⇅</a>
                </span>
              </th>

              <th class="px-3 py-1 text-right whitespace-nowrap">
                <span class="inline-flex items-center gap-1">
                  <span>Tempat, Tanggal Lahir</span>
                  <a href="{{ route('employees.edit', [
              'employee'          => $employee->id,
              'sort_by_family'    => 'tanggal_lahir',
              'sort_order_family' => ($sortByFamily == 'ttl' && $sortOrderFamily == 'asc') ? 'desc' : 'asc'
          ]) }}#keluarga"
                    class="text-lg text-gray-500 hover:text-black translate-y-[1px]">⇅</a>
                </span>
              </th>

              <th class="px-3 py-1 text-right whitespace-nowrap">
                <span class="inline-flex items-center gap-1">
                  <span>Pendidikan Saat Ini</span>
                  <a href="{{ route('employees.edit', [
              'employee'          => $employee->id,
              'sort_by_family'    => 'pendidikan',
              'sort_order_family' => ($sortByFamily == 'pendidikan' && $sortOrderFamily == 'asc') ? 'desc' : 'asc'
          ]) }}#keluarga"
                    class="text-lg text-gray-500 hover:text-black translate-y-[1px]">⇅</a>
                </span>
              </th>

              <th class="px-3 py-2 text-xs text-left font-medium leading-tight">
                <span class="inline-flex items-center gap-1">
                  <span>Status Anak</span>
                  <a href="{{ route('employees.edit', [
              'employee'          => $employee->id,
              'sort_by_family'    => 'status_anak',
              'sort_order_family' => ($sortByFamily == 'status_anak' && $sortOrderFamily == 'asc') ? 'desc' : 'asc'
          ]) }}#keluarga"
                    class="text-lg text-gray-500 hover:text-black translate-y-[1px]">⇅</a>
                </span>
              </th>

              <th class="px-3 py-2 text-xs text-left font-medium leading-tight">
                <span class="inline-flex items-center gap-1">
                  <span>Urutan Anak</span>
                  <a href="{{ route('employees.edit', [
              'employee'          => $employee->id,
              'sort_by_family'    => 'urutan_anak',
              'sort_order_family' => ($sortByFamily == 'urutan_anak' && $sortOrderFamily == 'asc') ? 'desc' : 'asc'
          ]) }}#keluarga"
                    class="text-lg text-gray-500 hover:text-black translate-y-[1px]">⇅</a>
                </span>
              </th>

              <th class="px-3 py-2 text-xs text-left font-medium leading-tight">
                <span class="inline-flex items-center gap-1">
                  <span>Keterangan</span>
                  <a href="{{ route('employees.edit', [
              'employee'          => $employee->id,
              'sort_by_family'    => 'keterangan',
              'sort_order_family' => ($sortByFamily == 'keterangan' && $sortOrderFamily == 'asc') ? 'desc' : 'asc'
          ]) }}#keluarga"
                    class="text-lg text-gray-500 hover:text-black translate-y-[1px]">⇅</a>
                </span>
              </th>

              <th class="px-3 py-2 text-center font-medium leading-tight">Actions</th>
            </tr>
          </thead>

          <tbody class="bg-white divide-y divide-gray-200">
            @foreach($families as $index => $family)
            <tr>
              <td class="px-3 py-2 text-center">{{ $index+1 }}</td>
              <td class="px-3 py-2 text-left">{{ $family->nama_lengkap }}</td>
              <td class="px-3 py-2 text-left">{{ $family->jenis_kelamin }}</td>
              <td class="px-3 py-2 text-left">{{ $family->ttl }}</td>
              <td class="px-3 py-2 text-left">{{ $family->pendidikan }}</td>
              <td class="px-3 py-2 text-left">{{ $family->status_anak }}</td>
              <td class="px-3 py-2 text-left">Anak ke-{{ $family->urutan_anak }}</td>
              <td class="px-3 py-2 text-left">{{ $family->keterangan }}</td>
              <td class="px-3 py-2 text-center">
                <div class="relative inline-block text-left dropdown-action">
                  <button type="button"
                    onclick="toggleActions('{{ $family->id }}')"
                    class="p-1 text-blue-600 hover:text-cyan text-xl">
                    &#x22EF;
                  </button>
                  <div id="dropdownActions-{{ $family->id }}"
                    class="hidden absolute right-0 mt-2 w-32 bg-white rounded-lg shadow-md border border-gray-200 z-50">
                    <!-- Tombol baru -->
                    <button type="button"
                      onclick="openEditPopup('{{ $family->id }}', '{{ $family->nama_lengkap }}', '{{ $family->jenis_kelamin }}', '{{ $family->ttl }}','{{ $family->pendidikan }}', '{{ $family->status_anak }}', '{{ $family->urutan_anak }}', '{{ $family->keterangan }}')"
                      class="block w-full text-left px-3 py-2 text-sm text-gray-700 hover:bg-gray-100">
                      edit
                    </button>
                    <form action="{{ route('families.delete', [$employee->id, $family->id]) }}"
                      method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit"
                        class="w-full text-left px-3 py-2 text-sm text-red-600 hover:bg-red-100">
                        Delete
                      </button>
                    </form>


                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>


        <!-- Popup Edit -->
        <div id="popup-edit" style="z-index: 1;" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
          <div class="bg-white rounded-lg shadow-lg p-6 w-[700px]" style="margin-top: 30px;">
            <h2 class="text-lg font-bold mb-4">Edit Informasi Anak</h2>

            <form id="popup-edit-form" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
              @csrf
              @method('PUT')

              <!-- FE -->
              <div class="mb-3">
                <label class="block mb-1 text-sm ">Nama Lengkap</label>
                <input type="text" id="edit-nama" name="nama_lengkap" class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
              </div>

              <div class="mb-3">
                <label class="block mb1 text-sm font-medium">Jenis Kelamin</label>
                <select id="edit-jk" name="jenis_kelamin" class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="block text-sm font-medium">Tempat, Tanggal Lahir</label>
                <input type="text" id="edit-ttl" name="ttl"
                  placeholder="Contoh: Bandung, 12 Mei 2010"
                  class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
              </div>

              <div class="mb-3">
                <label class="block text-sm font-medium">Pendidikan</label>
                <input type="text" id="edit-pendidikan" name="pendidikan" class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
              </div>

              <div class="mb-3">
                <label class="block text-sm font-medium">Status Anak</label>
                <input type="text" id="edit-status" name="status_anak" class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
              </div>

              <div class="mb-3">
                <label class="block text-sm font-medium">Urutan Anak</label>
                <input type="number" id="edit-urutan" name="urutan_anak" class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
              </div>

              <div class="mb-3">
                <label class="block text-sm font-medium">Keterangan</label>
                <textarea id="edit-keterangan" name="keterangan" class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300"></textarea>
              </div>

              <div class="flex justify-end gap-2 mt-4">
                <button type="button" onclick="closeEditPopup()" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">
                  Batal
                </button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                  Simpan
                </button>
              </div>
            </form>
          </div>
        </div>


      </div>


      <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; flex-wrap: nowrap;">
        <div class="right-section3">
          <a href="{{ route('employees.show', $employee->id) }}" class="cancel-btn">Cancel</a>
          <button type="submit" class="btn save-btn">Save</button>
        </div>
      </div>
    </div>

    <div class="tab-content" id="cluster" style="display: none;">
      <div class="content5">
        <div class="left-content">
          <h4 class="content-info">Talent Cluster</h4>
        </div>
        <div class="right-content3">
          <a href="#" class="add-btn" onclick="openAddClusterModal()"><i class="fas fa-plus"></i>Tambah</a>
        </div>
      </div>
      <table id="customers" style="margin-top: 20px;">
        <tr>
          <th>No</th>
          <th>Period</th>
          <th>Year</th>
          <th>Cluster</th>
          <th>Actions</th>
        </tr>
      </table>

      <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; flex-wrap: wrap;">
        <div class="right-section3">
          <a href="{{ route('employees.show', $employee->id) }}" class="cancel-btn">Cancel</a>
          <button type="submit" class="btn save-btn"><a href="action={{ route('families.store', $employee->id) }}"></a> Save</button>
        </div>
      </div>
    </div>

    <div class="tab-content" id="karir" style="display: none;">
      <div class="aktivitas_karir">
        @include('employee.partials.aktivitas_karir', ['career' => $career, 'employee' => $employee])
      </div>

    </div>

    <div class="tab-content" id="dokumen" style="display: none;">
      <div class="content5">
        <h4 class="content-info">Dokumen Personal</h4>
      </div>
    </div>

    <!-- MODAL TAMBAH ANAK -->
    <div id="addModal">
      <div class="modal-content">
        <div class="content6">
          <div class="left-content6">
            <h3>Tambah Informasi Anak</h3>
          </div>

          <div class="right-content6">
            <button onclick="closeAddModal()" class="close-button">
              <i class="fas fa-circle-xmark"></i>
            </button>
          </div>
        </div>
        <div class="full-width">
          <form action="{{ route('families.store', $employee->id) }}" method="POST">
            @csrf
            <div class="form-grid1">
              <div class="form-group2">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}" required>
              </div>

              <div class="form-group3">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control1" required>
                  <option disabled selected value=""></option>
                  <option value="Laki-Laki" {{ old('jenis_kelamin')==='Laki-Laki'?'selected':'' }}>Laki-Laki</option>
                  <option value="Perempuan" {{ old('jenis_kelamin')==='Perempuan'?'selected':'' }}>Perempuan</option>
                </select>
              </div>

              <div class="form-group">
                <label>Tempat, Tanggal Lahir</label>
                <input type="text" name="ttl" class="form-control"
                  placeholder="Contoh: Jakarta, 18 Agustus 2009"
                  value="{{ old('ttl', $family->ttl ?? '') }}">
              </div>


              <div class="form-group3">
                <label>Pendidikan Saat Ini</label>
                <select name="pendidikan" class="form-control1">
                  <option disabled selected value=""></option>
                  <option value="SD" {{ old('pendidikan')==='SD'?'selected':'' }}>SD</option>
                  <option value="SMP" {{ old('pendidikan')==='SMP'?'selected':'' }}>SMP</option>
                  <option value="SMA" {{ old('pendidikan')==='SMA'?'selected':'' }}>SMA</option>
                  <option value="Kuliah" {{ old('pendidikan')==='Kuliah'?'selected':'' }}>Kuliah</option>
                </select>
              </div>

              <div class="form-group2">
                <label>Status Anak</label>
                <select name="status_anak" class="form-control1">
                  <option disabled selected value=""></option>
                  <option value="Kandung" {{ old('status_anak')==='Kandung'?'selected':'' }}>Kandung</option>
                  <option value="Tidak Kandung" {{ old('status_anak')==='Tidak Kandung'?'selected':'' }}>Tidak Kandung</option>
                </select>
              </div>

              <div class="form-group3">
                <label>Urutan Anak</label>
                <input type="text" name="urutan_anak" class="form-control" value="{{ old('urutan_anak') }}" placeholder="Contoh: 1, 2, 3 atau Anak ke-1">
              </div>

              <div class="form-group2">
                <label>Keterangan</label>
                <select name="keterangan" class="form-control1">
                  <option disabled selected value=""></option>
                  <option value="Ditanggung" {{ old('keterangan')==='Ditanggung'?'selected':'' }}>Ditanggung</option>
                  <option value="Tidak Ditanggung" {{ old('keterangan')==='Tidak Ditanggung'?'selected':'' }}>Tidak Ditanggung</option>
                </select>
              </div>
            </div>

            <div class="form-buttons" style="margin-top:1rem;">
              <button type="button" class="cancel" onclick="history.back()">Cancel</button>
              <button type="submit" class="submit">Tambah</button>
            </div>
          </form>

        </div>

      </div>
      @endsection
      <script>
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
      </script>

      <script>
        document.addEventListener('DOMContentLoaded', function() {
          const tabs = document.querySelectorAll('.tab-content');
          const tabButtons = document.querySelectorAll('.tab-button');

          // Sembunyikan semua tab dulu
          tabs.forEach(tab => tab.style.display = 'none');

          // Ambil hash dari URL
          let hash = window.location.hash || '#profile';
          let activeTab = document.querySelector(hash);

          if (activeTab) {
            activeTab.style.display = 'block';
          }

          // Optional: jika pakai tombol tab (tab-button class), tandai yang aktif
          tabButtons.forEach(btn => {
            const target = btn.getAttribute('href');
            if (target === hash) {
              btn.classList.add('active');
            } else {
              btn.classList.remove('active');
            }
          });
        });
      </script>

      <script>
        function toggleContent(contentId, btn) {
          const content = document.getElementById(contentId);
          content.classList.toggle("show");

          const icon = btn.querySelector('i');
          icon.classList.toggle('fa-chevron-down');
          icon.classList.toggle('fa-chevron-up');
        }
      </script>

      <script>
        function openAddModal() {
          document.getElementById("addModal").style.display = "block";
        }

        function closeAddModal() {
          document.getElementById("addModal").style.display = "none";
        }
      </script>

      <script>
        function openAddClusterModal() {
          document.getElementById("addClusterModal").style.display = "block";
        }

        function closeAddClusterModal() {
          document.getElementById("addClusterModal").style.display = "none";
        }
      </script>


      <script>
        document.addEventListener("DOMContentLoaded", function() {
          const saveBtn = document.getElementById("saveInfo");
          const openInfoBtn = document.getElementById("openInfo");
          const infoModalEl = document.getElementById('infoModal');
          const infoModal = new bootstrap.Modal(infoModalEl, {
            backdrop: false
          });

          openInfoBtn.addEventListener("click", function() {
            infoModal.show();
          });

          // Mapping checkbox value ke field input
          const fieldTemplates = {
            "Tanggal KDMP": `
              <div class="form-group">
                  <div class="label-group">
                      <label>Tanggal KDMP <span class="bintang">*</span></label>
                  </div>
                  <input type="month" name="tanggalKDMP" class="form-control" required>
              </div>
          `,

            "Tanggal TKWT": `
              <div class="form-group">
                  <div class="label-group">
                      <label>Tanggal TKWT <span class="bintang">*</span></label>
                  </div>
                  <input type="month" name="tanggalTKWT" class="form-control" required>
              </div>
          `,

            "Tanggal Akhir TKWT": `
              <div class="form-group">
                  <div class="label-group">
                      <label>Tanggal Akhir TKWT <span class="bintang">*</span></label>
                  </div>
                  <input type="month" name="tanggal_akhirTKWT" class="form-control" required>
              </div>
          `,

            "Tanggal Mutasi": `
              <div class="form-group">
                  <div class="label-group">
                      <label>Tanggal Mutasi <span class="bintang">*</span></label>
                  </div>
                  <input type="month" name="tanggal_mutasi" class="form-control" required>
              </div>
          `,

            "Tanggal PJ": `
              <div class="form-group">
                  <div class="label-group">
                      <label>Tanggal PJ <span class="bintang">*</span></label>
                  </div>
                  <input type="month" name="tanggalPJ" class="form-control" required>
              </div>
          `,

            "Tanggal Lepas PJ": `
              <div class="form-group">
                  <div class="label-group">
                      <label>Tanggal Lepas PJ <span class="bintang">*</span></label>
                  </div>
                  <input type="month" name="tanggal_lepasPJ" class="form-control" required>
              </div>
          `,

            "Tanggal Band Posisi Terakhir": `
              <div class="form-group">
                  <div class="label-group">
                      <label>Tanggal Band Posisi Terakhir <span class="bintang">*</span></label>
                  </div>
                  <input type="month" name="tanggalBand" class="form-control" required>
              </div>
          `,

            "Tanggal Pensiun": `
              <div class="form-group">
                  <div class="label-group">
                      <label>Tanggal Pensiun <span class="bintang">*</span></label>
                  </div>
                  <input type="month" name="tanggal_pensiun" class="form-control" required>
              </div>
          `,

            "Tanggal Akhir Kontrak": `
              <div class="form-group">
                  <div class="label-group">
                      <label>Tanggal Akhir Kontrak <span class="bintang">*</span></label>
                  </div>
                  <input type="month" name="tanggal_akhir_kontrak" class="form-control" required>
              </div>
          `,

            "Dokumen SK": `
              <div class="form-group">
                  <div class="label-group">
                      <label>Dokumen SK <span class="bintang">*</span></label>
                  </div>
                  <div class="file-input">
                    <input type="file" name="dokumenSK" id="dokumen_sk" hidden>
                    <input type="text" class="file-text" id="dokumen_sk_text" placeholder="Tambahkan file" readonly>
                    <label for="dokumen_sk" class="file-btn">Select File</label>
                    <small class="file-preview text-muted"></small>
                  </div>

              </div>
          `,

            "Dokumen Nota Dinas": `
              <div class="form-group">
                  <div class="label-group">
                      <label>Dokumen Nota Dinas <span class="bintang">*</span></label>
                  </div>
                  <input type="file" name="dokumen_nota_dinas" class="form-control">
                  <small class="file-preview text-muted"></small>

              </div>
          `,

            "Dokumen Lainnya": `
              <div class="form-group">
                  <div class="label-group">
                      <label>Dokumen Lainnya <span class="bintang">*</span></label>
                  </div>
                  <input type="file" name="dokumen_lainnya" class="form-control">
                  <small class="file-preview text-muted"></small>
              </div>
          `
          };

          saveBtn.addEventListener("click", function() {
            const extraFields = document.getElementById("extraFields");
            extraFields.innerHTML = ""; // reset dulu

            document.querySelectorAll(".info-option:checked").forEach((checkbox) => {
              if (fieldTemplates[checkbox.value]) {
                extraFields.insertAdjacentHTML("beforeend", fieldTemplates[checkbox.value]);
              }
            });

            infoModal.hide(); // tutup popup kecil
          });
        });
      </script>

      <!--
<script>
  document.getElementById("dokumen_sk").addEventListener("change", function() {
      const fileName = this.files.length ? this.files[0].name : "";
      document.getElementById("dokumen_sk_text").value = fileName;
  });
</script>
-->

      <!--
<script>
  document.getElementById("dokumen_sk").addEventListener("change", function() {
      const fileName = this.files[0] ? this.files[0].name : "Belum ada file dipilih";
      document.getElementById("file-preview").innerText = fileName;
  });
</script>
-->

      <script>
        document.addEventListener("change", function(e) {
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
        document.addEventListener('DOMContentLoaded', () => {
          // Toggle menu dropdown
          window.toggleActions = function(id) {
            // Tutup menu lain dulu
            document.querySelectorAll('.dropdown-action-content').forEach(menu => {
              if (menu.id !== 'dropdownActions-' + id) {
                menu.classList.add('hidden');
              }
            });

            // Toggle menu yang sesuai tombol
            const currentMenu = document.getElementById('dropdownActions-' + id);
            if (currentMenu) {
              currentMenu.classList.toggle('hidden');
            }
          };

          // Klik di luar menutup semua menu
          document.addEventListener('click', (e) => {
            if (!e.target.closest('.dropdown-action')) {
              document.querySelectorAll('.dropdown-action-content').forEach(menu => {
                menu.classList.add('hidden');
              });
            }
          });

          // Tekan Escape menutup semua menu
          document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
              document.querySelectorAll('.dropdown-action-content').forEach(menu => {
                menu.classList.add('hidden');
              });
            }
          });
        });
      </script>
      <!-- <script>
        function toggleActions(id) {
          // Tutup semua dropdown lain
          document.querySelectorAll('.dropdown-action-content').forEach(el => {
            if (el.id !== "dropdownActions-" + id) {
              el.classList.add('hidden');
            }
          });

          // Toggle dropdown yang diklik
          const dropdown = document.getElementById("dropdownActions-" + id);
          dropdown.classList.toggle("hidden");
        }

        // Klik di luar dropdown → auto tutup
        window.addEventListener('click', function(e) {
          if (!e.target.closest('.dropdown-action')) {
            document.querySelectorAll('.dropdown-action-content').forEach(el => {
              el.classList.add('hidden');
            });
          }
        });
      </script> -->
      <script>
        function openEditPopup(id, nama, jk, tempat_tanggal_lahirr, pendidikan, status, urutan, keterangan) {
          document.getElementById('popup-edit').classList.remove('hidden');

          // isi data
          document.getElementById('edit-nama').value = nama;
          document.getElementById('edit-jk').value = jk;
          document.getElementById('edit-ttl').value = tempat_tanggal_lahirr;
          document.getElementById('edit-pendidikan').value = pendidikan;
          document.getElementById('edit-status').value = status;
          document.getElementById('edit-urutan').value = urutan;
          document.getElementById('edit-keterangan').value = keterangan;

          // set form action ke families.update
          document.getElementById('popup-edit-form').action =
            `/employees/{{ $employee->id }}/families/${id}`;
        }

        function closeEditPopup() {
          document.getElementById('popup-edit').classList.add('hidden');
        }
      </script>