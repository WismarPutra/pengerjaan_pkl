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

.badge-profile, .badge-keluarga, .badge-cluster, .badge-pelatihan, .badge-payroll, .badge-karir, .badge-dokumen {
  background-color: rgba(245, 40, 145, 0.15);
  color: deeppink;
}

.position, .directorate {
  font-size: 14px;
  color: #444;
  margin: 2px 0;
}

.profile-info {
    display: flex;
    flex-direction: column; /* Mengatur nama dan email menjadi kolom */
}

.profile-name {
  font-size: 15px; /* Membuat nama lebih tebal */
  font-family: Poppins, sans-serif;
  color: #080808;
}

.profile-email {
  font-size: 0.7em; /* Memperkecil ukuran email */
  color: #2F4F4F; /* Mengubah warna email */
}


/* OFFSET UNTUK KONTEN */
.page-title {
    font-size: 20px;
    margin-bottom: 20px;
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

.right-section {
  display: flex;
  align-items: center;
  gap: 10px;
  flex-wrap: wrap;
  margin-top: 60px;
}

.stat-boxes {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  margin-top: 1px;
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
  height: 37px;
  width: 90px;
}

.edit-btn {
  padding: 6px 20px;
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
  height: 35px;
  width: 90px;
}

.export-btn:hover {
  background-color: #2F4F4F;
}

.edit-btn:hover {
  background-color: #f0f0f0;
}

.left-profile {
    margin-top: 10px;
    margin-left: 20px;
    display: flex;
    gap: 3px;
    align-items: left;
    flex-direction: column;
    font-family: Poppins, sans-serif;
    margin-bottom: 10px;
}

.right-profile {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 10px;
    border-left: 3px solid #A9A9A9;
    padding-left: 50px;
    margin-left: 300px;
    text-align: left;
}

.contact-info {
    color: #2F4F4F;
    text-align: right;
    gap: 29px;
}

.profile-employee {
    display: flex;
    align-items: center;
    gap: 8px; 
    font-family: Poppins, sans-serif;
}

.emprof {
    display: flex;
}

.position {
    font-family: Poppins, sans-serif;
    font-size: 13px;
    margin-top: 5px;
}

.directorate {
    font-family: Poppins, sans-serif;
    font-size: 13px;
}

.contact {
    font-family: Poppins, sans-serif;
    font-size: 12px;
    text-align: left;
    line-height: 25px;
    margin-top: 5px;
    margin-bottom: 5px;
}

.email {
    font-family: Poppins, sans-serif;
    font-size: 12px;
    text-align: left;
    line-height: 25px;
    margin-bottom: 5px;
}

.telp {
    font-family: Poppins, sans-serif;
    font-size: 12px;
    text-align: left;
    line-height: 25px;
}

.tab-buttons {
  display: flex;
  border-bottom: 1.5px solid #A9A9A9;
  margin-top: 20px;
  font-family: Poppins, sans-serif;
}

.tab-button {
    padding: 8px 37px;
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
}

.tab-button.active {
  color: #0000CD;
  background-color: #e6e6fa;
  border-radius: 10px 10px 0 0;
  border-bottom: 3px solid #0000CD;
}

.tab-content {
  padding: 20px 0;
  font-family: Poppins, sans-serif;
  color: #444;
  display: flex;
}

.divider {
    grid-column: 1 / -1;
    margin: 30px 0;
    border-top: 3px solid #A9A9A9;
    margin-bottom: 10px;
}

.left-content {
    margin-top: 10px;
    margin-left: 20px;
    display: flex;
    gap: 3px;
    align-items: left;
    flex-direction: column;
    font-family: Poppins, sans-serif;
    word-break: break-word;
    word-wrap: break-word;
    width: 60%; 
}

.right-content {
    width: 40%;
    display: flex;
    flex-direction: column;
    gap: 3px;
    margin-left: 0;
    text-align: left;
    padding-top: 27px;
}

.info1 {
    gap: 5px;
    margin-top: 20px;
    font-size: 13px;
}

.info2 {
    font-size: 13px;
    font-weight: bold;
    text-align: left;
}

.content1, .content2 {
  display: flex;
  width: 100%;
  padding-right: 90px;
  justify-content: space-between;
  gap: 20px;
}

.content3 {
    display: flex;
    width: 100%;
    padding-right: 90px;
    justify-content: space-between;
    gap: 20px;
}

.content7 {
  display: flex;
  width: 100%;
  padding-right: 90px;
  justify-content: space-between;
  gap: 20px;
}

.content8 {
  display: flex;
  width: 100%;
  padding-right: 90px;
  gap: 20px;
}

.content6 {
  display: flex;
  width: 100%;
  padding-right: 90px;
  justify-content: space-between;
  gap: 20px;
}

.content-info, .content-info2, .content-info3, .content-info4, .content-info7 {
    font-size: 14px;
    font-weight: bold;
    padding-top: 20px;
}

.content-info6 {
    font-size: 14px;
    font-weight: bold;
    padding-top: 20px;
}

.left-content2, .left-content3, .left-content8 {
    width: 60%;
    display: flex;
    flex-direction: column;
    gap: 3px;
    font-family: Poppins, sans-serif;
    word-break: break-word;
    word-wrap: break-word;
    padding-top: 15px;
    margin-top: 10px;
    margin-left: 20px;
    margin-bottom: 30px;
}

.right-content2, .right-content3 {
    width: 40%;
    display: flex;
    flex-direction: column;
    gap: 3px;
    font-family: Poppins, sans-serif;
    word-break: break-word;
    word-wrap: break-word;
    padding-top: 15px;
    margin-top: 10px;
    margin-left: 50px;
}

.right-content6 {
    display: flex;
    flex-direction: column;
    gap: 3px;
    font-family: Poppins, sans-serif;
    word-break: break-word;
    word-wrap: break-word;
    padding-top: 15px;
    margin-top: 55px;
    margin-left: 500px;
    min-width: 280px;
    max-width: 400px;
}

.right-content8 {
    display: flex;
    flex-direction: column;
    gap: 3px;
    font-family: Poppins, sans-serif;
    word-break: break-word;
    word-wrap: break-word;
    padding-top: 15px;
    margin-top: 10px;
    margin-left: 20px;
    padding-left: 80px;
}

.left-content6, .left-content7 {
    width: 60%;
    display: flex;
    flex-direction: column;
    gap: 3px;
    font-family: Poppins, sans-serif;
    word-break: break-word;
    word-wrap: break-word;
    padding-top: 15px;
    margin-top: 10px;
    margin-left: 20px;
    margin-bottom: 30px;
}



.right-content7 {
  display: flex;
    flex-direction: column;
    gap: 3px;
    font-family: Poppins, sans-serif;
    word-break: break-word;
    word-wrap: break-word;
    padding-top: 15px;
    margin-top: 55px;
    margin-left: 500px;
    min-width: 180px;
    max-width: 220px;
}


.left-content4 {
    margin-top: 10px;
    margin-left: 20px;
    display: flex;
    gap: 3px;
    align-items: left;
    flex-direction: column;
    font-family: Poppins, sans-serif;
    word-break: break-word;
    word-wrap: break-word;
    width: 60%; 
}

.right-content4 {
    width: 40%;
    display: flex;
    flex-direction: column;
    gap: 3px;
    margin-left: 0;
    text-align: left;
    padding-top: 15px;
}

.content4 {
  display: flex;
  width: 100%;
  padding-right: 90px;
  justify-content: space-between;
  gap: 20px;
}

/* TABLE */
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

.left-section {
    font-size: 18px;
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
  margin-right: 18px;
  font-weight: bold;
}

.filter-btn1 {
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
  margin-right: 10px;
  font-weight: bold;
}


.filter-btn:hover {
  background-color: #f0f0f0;
}

/* Filter Modal Styles */
.filter-modal {
  display: none;
  position: absolute;
  right: 40px;
  top: 80px;
  background: white;
  box-shadow: 0 0 20px rgba(0,0,0,0.1);
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

.reset-btn, .apply-btn {
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
    background: white;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    z-index: 999;
    border: 1px solid #ccc;
    padding: 10px;
    text-decoration: none;
    width: 120px;
    text-decoration: normal
/*
  display: none;
  position: absolute;
  right: 40px;
  top: 80px;
  background: white;
  box-shadow: 0 0 20px rgba(0,0,0,0.1);
  border-radius: 12px;
  padding: 20px;
  width: 400px;
  z-index: 999; */
}

.dropdown-action:hover .dropdown-action-content {
  background-color: white;
  border-radius: 6px;
  color: #000;
  display: block;
}

.status {
  display: inline-block;
  font-weight: bold;
  padding: 4px 12px;
  border-radius: 12px;
  font-size: 12px;
  text-align: center;
  background-color: rgb(124, 252, 0, 0.15); 
  color: LimeGreen;
}

#customers1 {
  font-family: Poppins, sans-serif;  
  border-collapse: collapse;
  width: 100%;
  margin-top: 10px;
}

#customers1 td, #customers1 th {
  border: none;
  font-size: 12px;
}

#customers1 tr:nth-child(even){background-color: #f2f2f2;}
#customers1 tr:hover {background-color: #ddd;}

#customers1 th {
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

#customers1 td {
  border-bottom: 1px solid #A9A9A9;
  padding-top: 12px;
  padding-bottom: 12px;
  padding-left: 15px;
  padding-right: 12px;
  text-align: left;
  background-color: white;
  color: #2F4F4F;
}

.sertifikat-link {
  color: blue;
  text-decoration: underline;
  cursor: pointer;
  font-weight: 500;
}

.ktp-link {
  color: blue;
  text-decoration: underline;
  cursor: pointer;
  font-weight: 500;
  font-family: Poppins, sans-serif;
  font-size: 13px;
  font-weight: bold;
  text-align: left;
}

.sertif-link {
  color: blue;
  text-decoration: underline;
  cursor: pointer;
  font-weight: 500;
  font-family: Poppins, sans-serif;
  font-size: 13px;
  font-weight: bold;
  text-align: left;
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

.right-section2 {
  display: flex;
  align-items: center;
  gap: 10px;
  flex-wrap: wrap;
  padding-left: 460px;
}

.payslip-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
    gap: 20px;
    margin-top: 20px;
  }

.payslip-card {
    background: #ffffff;
    padding: 15px;
    border-radius: 12px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.08);
    text-align: center;
    transition: transform 0.2s ease;
}

.payslip-card:hover {
    transform: translateY(-3px);
}

.pdf-icon {
    width: 50px;
    margin-bottom: 10px;
}

.payslip-text {
    font-size: 13px;
}

.download-link {
    display: inline-block;
    margin-top: 5px;
    color: #007BFF;
    font-weight: 500;
    font-size: 12px;
    text-decoration: underline;
}

.right-section3 {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
    padding-left: 350px;
}

.feedback1-btn {
    cursor: pointer;
    font-size: 12px;
    font-family: Poppins, sans-serif;
    text-decoration: none;
    color: #555;
}

.feedback-btn {
    padding: 10px 20px;
    border-radius: 8px;
    border: 1px solid #ccc;
    background-color: rgba(16, 15, 16, 0.8);
    color: white;
    cursor: pointer;
    font-size: 13px;
    display: flex;
    align-items: center;
    gap: 6px;
    height: 35px;
    width: 170px;
    font-family: Poppins, sans-serif;
    font-weight: bold;
}

.feedback-btn:hover {
    background-color: #2F4F4F;
}

/* Modal title dan deskripsi */
#feedbackModal .modal-title {
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    font-weight: 600;
    margin-left: 10px;
}

#feedbackModal .modal-body p {
    font-size: 15px;
    color: #555;
    font-family: 'Poppins', sans-serif;
    margin-left: 10px;
    margin-right: 20px;
}



/* Skala pertanyaan */
#feedbackModal .form-label {
    margin-left: 10px;
    font-weight: 500;
    font-size: 14px;
    font-family: 'Poppins', sans-serif;
}

#feedbackModal .btn-check:checked + .btn-outline-primary {
    background-color: #4e73df;
    color: white;
    border-color: #4e73df;
}

#feedbackModal .btn-outline-primary {
    width: 36px;
    padding: 5px 0;
    font-size: 13px;
    margin-left: 10px;
}

/* Textarea */
#feedbackModal textarea.form-control {
    resize: vertical;
    font-size: 14px;
    font-family: 'Poppins', sans-serif;
    margin-left: 10px;
    width: 750px;
}

/* Footer buttons */
#feedbackModal .modal-footer .btn {
    min-width: 100px;
    font-family: 'Poppins', sans-serif;
}

.emoji-select-group {
  display: flex;
  justify-content: space-around;
  margin-bottom: 20px;
  gap: 10px;
  height: 120px;
  weight: 250px;
  margin-left: 10px;
  
}

.emoji-option {
  border: 2px solid #ddd;
  padding: 10px;
  border-radius: 10px;
  width: 240px;
  text-align: center;
  font-size: 40px;
  cursor: pointer;
  transition: 0.3s ease;
}

.emoji-option:hover {
  background-color: #f0f0f0;
}

.emoji-label {
  font-size: 14px;
  margin-top: 5px;
  font-family: 'Poppins', sans-serif;
}

input[type="radio"]:checked + .emoji-option {
  border-color: #4e73df;
  background-color: #e7ecff;
}

.plus-btn {
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
  height: 37px;
  width: 90px;
  margin-left: 400px;
}

.plus-btn:hover {
  background-color: #191970;
}

.left-section9 {
    display: flex;
    flex-direction: column;
    gap: 3px;
    font-family: Poppins, sans-serif;
    word-break: break-word;
    word-wrap: break-word;
    padding-top: 15px;
    margin-top: 10px;
    margin-left: 20px;
    margin-bottom: 30px;
    font-size: 14px;
    font-weight: bold;
}


.content9 {
  display: flex;
  width: 100%;
  padding-right: 90px;
  gap: 20px;
}

.left-section10 {
    display: flex;
    flex-direction: column;
    gap: 3px;
    font-family: Poppins, sans-serif;
    word-break: break-word;
    word-wrap: break-word;
    padding-top: 15px;
    margin-top: 10px;
    margin-left: 20px;
    margin-bottom: 30px;
    font-size: 14px;
    font-weight: bold;

}


.timeline-container {
  position: relative;
  margin: 30px 0;
  padding-left: 40px;
  margin-left: 20px;
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
  margin-left: 30px;
}

.timeline-item {
  position: relative;
  margin-bottom: 40px;
  padding-left: 20px;
  margin-right: 50px;
}

.timeline-year {
  position: absolute;
  left: -130px;
  top: 8px;
  background-color: #4F46E5; 
  color: white;
  padding: 2px 9px;
  border-radius: 10px;
  font-weight: bold;
  font-size: 12px;
}

.timeline-year1 {
  position: absolute;
  left: -130px;
  top: 8px;
  background-color: #DCDCDC; 
  color: black;
  padding: 2px 9px;
  border-radius: 10px;
  font-weight: bold;
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

.timeline-item.new::after {
  border: 4px solid rgb(100, 149, 237); 
  background-color: #0000FF;

}

.timeline-item.old::after {
  border: 4px solid rgb(220, 220, 220);
  background-color: #A9A9A9	;
}


.timeline-content {
  background-color: #fff;
  padding: 10px 0px;
  margin-left: -60px;
}


.role-title {
  color: #1D4ED8;
  font-weight: bold;
  font-size: 14px;
  margin: 0 0 4px;
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

.dropdown-action-detail {
  font-family: Poppins, sans-serif;
  font-weight: normal;
  font-size: 12px;
  color: #555;
  text-decoration: none;
}

.right-section11 {
  display: flex;
  align-items: center;
  gap: 10px;
  flex-wrap: wrap;
  padding-left: 389px;
}

.search-container1 {
  position: relative;
}

.search-bar1 {
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

.filter-btn1 {
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
  margin-right: 1px;
}

.filter-btn1:hover {
  background-color: #f0f0f0;
}

.plus-btn1 {
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

.plus-btn1:hover {
  background-color: #191970;
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

#addClusterModal .left-content11 {
  font-family: Poppins, sans-serif;
  font-weight: bold;
  text-align: left;
}

#addClusterModal .full-width {
  border-radius: 15px;
  width: 635px;
  height: 200px;
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
  margin-top: 40px;
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

.form-grid1 {
  display: grid;
  grid-template-columns: repeat(2, 360px);
  gap: 24px;
  font-family: Poppins, sans-serif;
  font-weight: normal;
  font-size: 14px;
  padding-top: 35px;
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
  

</style>

<div class="navbar">
    <div class="left-info">
        <div class="navbar-name" >Hello, {{ $employee->name }}</div>
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
        <div class="profile-name">{{ $employee->name }}</div>
        <div class="profile-email">{{ $employee->email }}</div>
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
          <a href="{{ url()->current() }}" class="breadcrumb-text">Employee Profile</a>
        </div> 
      </div>
      <h2 class="page-title">Employee Profile</h2>
  </div>
    <div class="right-section">
        <a href="{{ route('employees.edit', $employee->id) }}" class="edit-btn"><i class="fas fa-pen"></i>Edit</a>
        <button class="export-btn"><i class="fas fa-upload"></i>Export</button>
    </div>
  </div>

  <div class="emprof">
    <img class="profile-photo" src="https://cdn0-production-images-kly.akamaized.net/-1pYFvsXgXGWz-U3Ybxqnc_mDfk=/1280x1706/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/5202248/original/037743300_1745894554-ChatGPT_Image_Apr_29__2025__09_26_56_AM.jpg" alt="profile_picture">
        <div class="left-profile">
            <div class="profile-employee">
                <h3 class="employee-name">{{ $employee->name }}</h3>
                <span class="badge-status" id="badgeStatus">Karyawan Tetap</span>
            </div>
            <p class="position">{{ $employee->posisi }} • {{ $employee->nik }}</p>
            <p class="directorate">Directorate {{ $employee->direktorat }}</p>
        </div>
        <div class="right-profile">
            <div class="contact-info">
                <p class="contact">Contacts</p>
                <p class="email">E-mail : {{ $employee->email }}</p>
                <p class="telp">Nomor Telepon : {{ $employee->no_telepon }}</p>
            </div>
        </div>
  </div>

      <!-- NAVIGATION BUTTONS -->
  <div class="tab-buttons">
    <button class="tab-button active" onclick="showTab('profile')">Profile</button>
    <button class="tab-button" onclick="showTab('keluarga')">Data Keluarga</button>
    <button class="tab-button" onclick="showTab('cluster')">Talent Cluster</button>
    <button class="tab-button" onclick="showTab('pelatihan')">Histori Pelatihan</button>
    <button class="tab-button" onclick="showTab('payroll')">Data Payroll</button>
    <button class="tab-button" onclick="showTab('karir')">Aktivitas Karir</button>
    <button class="tab-button" onclick="showTab('dokumen')">Dokumen</button>

  </div>

    <!-- CONTENT AREA -->
  <div class="tab-content" id="profile">
    <div class="content1" >
        <div class="left-content">
            <h4 class="content-info">Informasi Pribadi</h4>
            <p class="info1">Nomor KTP</p>
            <p class="info2">{{ $employee->no_ktp }}</p>
            <p class="info1">Jenis Kelamin</p>
            <p class="info2">{{ $employee->jenis_kelamin }}</p>
            <p class="info1">Tempat, Tanggal Lahir</p>
            <p class="info2">{{ $employee->ttl }}</p>
            <p class="info1">Alamat Rumah Sesuai KTP</p>
            <p class="info2">{{ $employee->alamat_ktp }}</p>
        </div>
        <div class="right-content">
            <h4 class="content-info"></h4>
            <p class="info1">Nomor NPWP</p>
            <p class="info2">{{ $employee->no_npwp }}</p>
            <p class="info1">Agama</p>
            <p class="info2">{{ $employee->agama }}</p>
            <p class="info1">Status Perkawinan</p>
            <p class="info2">{{ $employee->status_perkawinan }}</p>
            <p class="info1">Alamat Domisili</p>
            <p class="info2">{{ $employee->alamat_domisili }}</p>
        </div>
    </div>

    <hr class="divider">

    <div class="content2" >
        <div class="left-content2">
            <h4 class="content-info2">Informasi Pekerjaan</h4>
            <p class="info1">Nama Posisi</p>
            <p class="info2">Health Care Staffs</p>
            <p class="info1">Unit/Sub Direktorat</p>
            <p class="info2">Health Care</p>
            <p class="info1">BP Group</p>
            <p class="info2">BP1234</p>
            <p class="info1">DIT</p>
            <p class="info2">DIT123</p>
            <p class="info1">Status PJ</p>
            <p class="info2">Bukan PJ</p>
            <p class="info1">Lokasi Kerja</p>
            <p class="info2">Yakes Jakarta</p>
            <p class="info1">Tanggal Bergabung</p>
            <p class="info2">8 April 2011</p>
            <p class="info1">Kode DJM</p>
            <p class="info2">12345678912</p>
        </div>
        <div class="right-content2">
            <h4 class="content-info2"></h4>
            <p class="info1">Regional/Direktorat</p>
            <p class="info2">Health Care</p>
            <p class="info1">Direct Supervisor</p>
            <p class="info2">OSM Healthcare</p>
            <p class="info1">Posisi Band</p>
            <p class="info2">VII - V</p>
            <p class="info1">Sub-DIT</p>
            <p class="info2">SUB123</p>
            <p class="info1">Status Kepegawaian</p>
            <p class="info2">Organik Yakes</p>
            <p class="info1">Kota</p>
            <p class="info2">Jakarta</p>
            <p class="info1">Masa Kerja</p>
            <p class="info2">14 Tahun 2 Bulan</p>
            <p class="info1">Medis/Non-Medis</p>
            <p class="info2">Non-Medis</p>
        </div>
    </div>

    <hr class="divider">

    <div class="content3" >
        <div class="left-content3">
            <h4 class="content-info3">Informasi Pendidikan</h4>
            <p class="info1">Level Pendidikan</p>
            <p class="info2">{{ $employee->level_pendidikan }}</p>
            <p class="info1">Institusi Pendidikan</p>
            <p class="info2">{{ $employee->institusi_pendidikan }}</p>
        </div>
        <div class="right-content3">
            <h4 class="content-info3"></h4>
            <p class="info1">Jurusan</p>
            <p class="info2">{{ $employee->jurusan }}</p>
            <p class="info1">Tahun Lulus</p>
            <p class="info2">{{ $employee->tahun_lulus }}</p>
        </div>
    </div>
  </div>

  <div class="tab-content" id="keluarga" style="display: none;">
    <div class="content4" >
        <div class="left-content4">
            <h4 class="content-info4">Informasi Pasangan</h4>
            <p class="info1">Nama Lengkap</p>
            <p class="info2">Arini Paramita</p>
            <p class="info1">NIK</p>
            <p class="info2">32748258800001</p>
            <p class="info1">Status Pernikahan</p>
            <p class="info2">Kawin</p>
            <p class="info1">Pendidikan Terakhir</p>
            <p class="info2">DIV/S1</p>
            <p class="info1">Alamat Rumah Sesuai KTP</p>
            <p class="info2">Puri 11 Blok Y-00 Jl. Boulevard Residential, RT.004/RW.001, Pd. Pucung, Karang Tengah, Tangerang Selatan, Banten</p>
        </div>
        <div class="right-content4">
            <h4 class="content-info4"></h4>
            <p class="info1">Tempat, Tanggal Lahir</p>
            <p class="info2">Palembang, 30 November 1988</p>
            <p class="info1">Agama</p>
            <p class="info2">Islam</p>
            <p class="info1">Pekerjaan Pasangan</p>
            <p class="info2">Pegawai Swasta</p>
            <p class="info1">Nomor Telepon</p>
            <p class="info2">+62872847168092</p>
            <p class="info1">Alamat Domisili</p>
            <p class="info2">Sama dengan Alamat KTP</p>
        </div>
    </div>

    <hr class="divider">

    <table id="customers" style="margin-top: 10px;">
      <tr>
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>Jenis Kelamin</th>
        <th>Tempat, Tanggal Lahir</th>
        <th>Pendidikan Saat Ini</th>
        <th>Status Anak</th>
        <th>Urutan Anak</th>
        <th>Keterangan</th>
      </tr>
      <tr>
        <td>1</td>
        <td>Rayan Arka</td>
        <td>Laki-Laki</td>
        <td>Jakarta, 18 Agustus 2009</td>
        <td>SD</td>
        <td>Kandung</td>
        <td>Anak ke-1</td>
        <td>Ditanggung</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Aurelia Zahra</td>
        <td>Perempuan</td>
        <td>Jakarta, 2 Juli 2013</td>
        <td>SD</td>
        <td>Kandung</td>
        <td>Anak ke-2</td>
        <td>Ditanggung</td>
      </tr>
    </table>
  </div>

  <div class="tab-content" id="cluster" style="display: none;">
    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; flex-wrap: wrap;">
      <h2 class="left-section">Talent Cluster</h2>
      <div class="right-section11">
        <div class="search-container1">
          <i class="fas fa-search search-icon"></i>
          <input type="text" placeholder="Cari berdasarkan nama" class="search-bar" />
        </div>
        <button class="filter-btn1" onclick="toggleFilter()"><i class="fas fa-sliders"></i> Filters</button>
        <button class="plus-btn1" onclick="openAddClusterModal()"><i class="fas fa-plus"></i>Tambah</button>
      </div>
    </div>
    <table id="customers1" style="margin-top: 10px;">
      <tr>
        <th>No</th>
        <th>Periode</th>
        <th>Year</th>
        <th>Cluster</th>
      </tr>
    </table>
  </div>

  <div class="tab-content" id="pelatihan" style="display: none;">
    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; flex-wrap: wrap;">
      <h2 class="left-section">List History Pelatihan</h2>
      <div class="right-section1">
        <div class="search-container">
          <i class="fas fa-search search-icon"></i>
          <input type="text" placeholder="Search by Name" class="search-bar" />
        </div>
        <button class="filter-btn" onclick="toggleFilter()"><i class="fas fa-sliders"></i> Filters</button>
      </div>
    </div>
    <table id="customers1" style="margin-top: 10px;">
      <tr>
        <th>No</th>
        <th>Nama Training</th>
        <th>Pelaksana</th>
        <th>Tanggal Mulai</th>
        <th>Tanggal Akhir</th>
        <th>Status</th>
        <th>Sertifikat</th>
        <th>Actions</th>
      </tr>
      <tr>
        <td>1</td>
        <td>Effective Communication Skills</td>
        <td>Learning Centre</td>
        <td>29 June 2025</td>
        <td>29 June 2025</td>
        <td>
          <div class="status">Selesai</div>
        </td>
        <td><a href="#" class="sertifikat-link">Klik untuk Melihat</a></td>
        <td class="actions-cell">
          <div class="dropdown-action">
            <button class="horizontal-dots">&#x22EF;</button>
            <div class="dropdown-action-content">
              <a href="#" class="dropdown-action-detail" onclick="showPelatihanDetail()">Detail</a><br>
              <a class="feedback1-btn" data-bs-toggle="modal" data-bs-target="#feedbackModal">Input Feedback</a>
            </div>
          </div>
        </td>
      </tr>
    </table>
  </div>

  <div class="tab-content" id="pelatihan-detail" style="display: none;">
    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; flex-wrap: wrap;">
          <div class="left-section">
            <div class="breadcrumb-row">
              <i href="#" onclick="backToPelatihan()" class="fas fa-arrow-left breadcrumb-arrow"></i>
              <div class="breadcrumb-text">Histori Pelatihan: Effective Communication Skills</div>
            </div>
          </div>
          <div class="right-section3">
            <div class="feedback-container">
              <button type="button" class="feedback-btn" data-bs-toggle="modal" data-bs-target="#feedbackModal"><i class="fas fa-message"></i>Input Feedback</button>
            </div>
          </div>
    </div>
    <div class="content8" >
        <div class="left-content8">
            <p class="info1">Training ID</p>
            <p class="info2">TR12345</p>
            <p class="info1">Deskripsi Training</p>
            <p class="info2">This is the description of training digital literacy 29 May 2025</p>
            <p class="info1">Pelaksana</p>
            <p class="info2">Learning Centre</p>
            <p class="info1">Tanggal Mulai</p>
            <p class="info2">29 June 2025 10:00:00</p>
            <p class="info1">Lokasi</p>
            <p class="info2">Gedung ABC Jl. Merah Putih No. 30 Bandung</p>
            <p class="info1">Status</p>
            <p class="info2">Selesai</p>
        </div>
        <div class="right-content8">
            <p class="info1">Nama Training</p>
            <p class="info2">Effective Communication Skills</p>
            <p class="info1">Tipe Training</p>
            <p class="info2">Internal</p>
            <p class="info1">Durasi</p>
            <p class="info2">1 Day</p>
            <p class="info1">Tanggal Selesai</p>
            <p class="info2">29 June 2025 14:00:00</p>
            <p class="info1">Metode Pelatihan</p>
            <p class="info2">Offline</p>
            <p class="info1">Sertifikat</p>
            <a href="#" class="sertif-link">Klik untuk Melihat</a>
        </div>
    </div>
    
  </div>

  <div class="tab-content" id="payroll" style="display: none;">
    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; flex-wrap: wrap;">
        <h2 class="left-section">List Data Payroll</h2>
        <div class="right-section2">
          <div class="search-container">
            <i class="fas fa-search search-icon"></i>
            <input type="text" placeholder="Search by Name" class="search-bar" />
          </div>
          <button class="filter-btn" onclick="toggleFilter()"><i class="fas fa-sliders"></i> Filters</button>
        </div>
    </div>
    @if(isset($payslips) && is_array($payslips))
    <div class="payslip-grid">
        @foreach($payslips as $payslip)
            <div class="payslip-card">
                <img src="{{ asset('assets/pdf-icon.png') }}" alt="PDF" class="pdf-icon">
                <div class="payslip-text">
                <strong>{{ $payslip['filename'] }}</strong><br>
                <span>{{ $payslip['date'] }}</span><br>
                <a href="{{ route('employees.payslip.download', ['filename' => $payslip['filename']]) }}" class="download-link">Klik untuk Download</a>
                </div>
            </div>
        @endforeach
    </div>
    @else
      <p>Tidak ada data payslip.</p>
    @endif
  </div>

  <div class="tab-content" id="karir" style="display: none;">
    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; flex-wrap: wrap;">
        <h2 class="left-section9">Aktivitas Karir</h2>
    </div>
    <div class="timeline-container">
      <div class="timeline-group">
        <div class="timeline-item new">
          <div class="timeline-year">2023</div>
            <div class="timeline-content">
              <h4 class="role-title">Nama Role Sekarang</h4>
              <p class="sub-info">Maret 2023 - Sekarang (3 Tahun 1 Bulan) • Nama Direktorat • Band Level V</p>
              <p class="promo-date">Tanggal Promosi: 1 Maret 2023</p>
              <p class="description">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus error eveniet culpa eos cupiditate doloribus impedit aliquid saepe aut nobis, consequuntur ex fuga consectetur quasi dolorum eum. Blanditiis, quibusdam incidunt?</p>
            </div>
        </div>
        <div class="timeline-item old">
          <div class="timeline-year1">2020</div>
          <div class="timeline-content">
            <h4 class="role-title1">PJ Role ABC</h4>
            <p class="sub-info">Januari 2020 - Februari 2023 (3 Tahun 2 Bulan) • Nama Direktorat • Band Level V</p>
            <p class="promo-date">Tanggal Menjadi PJ: 3 Feb 2021</p>
            <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium illo alias ut impedit nihil eum molestias cupiditate eligendi numquam! Quae ex non quis autem esse! Eveniet nemo culpa porro nisi!</p>
          </div>
        </div>
        <div class="timeline-item old">
          <div class="timeline-year1">2011</div>
          <div class="timeline-content">
            <h4 class="role-title1">Staff Posisi ABC</h4>
            <p class="sub-info">Januari 2011 - Desember 2020 (8 Tahun 11 Bulan) • Nama Direktorat • Band Level V</p>
            <p class="promo-date">Tanggal Karyawan Tetap: 1 Januari 2011</p>
            <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores ad reprehenderit nesciunt cumque iste accusantium, eligendi quidem dolorum. Impedit facilis molestias quibusdam. Earum laborum ea, eligendi molestias in eos error.</p>
          </div>
        </div>
      </div>
    </div>

    <hr class="divider">

    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; flex-wrap: wrap;">
        <h2 class="left-section10">Histori Pekerjaan Sebelumnya</h2>
    </div>
    <div class="timeline-container1">
      <div class="timeline-group">
        <div class="timeline-item old">
          <div class="timeline-year1">2010</div>
          <div class="timeline-content">
            <h4 class="role-title1">Role Pekerjaan Sebelumnya</h4>
            <p class="sub-info">PT Nama Perusahaan</p>
            <p class="promo-date">April 2010 - Desember 2010 (9 Bulan)</p>
            <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Id adipisci eligendi animi ad ipsa alias officiis veritatis! Perferendis veniam voluptates, omnis porro, architecto mollitia laudantium laborum rerum rem vel assumenda.</p>
          </div>
        </div>
        <div class="timeline-item old">
          <div class="timeline-year1">2010</div>
          <div class="timeline-content">
            <h4 class="role-title1">Role Pekerjaan Sebelumnya</h4>
            <p class="sub-info">PT Nama Perusahaan</p>
            <p class="promo-date">Januari 2010 - Maret 2010 (3 Bulan)</p>
            <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum soluta quaerat at accusamus repudiandae consequatur eum ut perferendis blanditiis dicta laboriosam rem incidunt hic iste itaque quidem vitae, deleniti possimus.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="tab-content" id="dokumen" style="display: none;">
    <div class="content6" >
      <div class="left-content6">
        <h4 class="content-info6">Dokumen Personal</h4>
        <p class="info1">KTP</p>
        <a href="#" class="ktp-link">Klik untuk Melihat</a>
        <p class="info1">BPJS Kesehatan</p>
        <a href="#" class="ktp-link">Klik untuk Melihat</a>
        <p class="info1">NPWP</p>
        <a href="#" class="ktp-link">Klik untuk Melihat</a>
      </div>
      <div class="right-content6">
        <p class="info1">Kartu Keluarga</p>
        <a href="#" class="ktp-link">Klik untuk Melihat</a>
        <p class="info1">BPJS Ketenagakerjaan</p>
        <a href="#" class="ktp-link">Klik untuk Melihat</a>
        <p class="info1">Nota Dinas</p>
        <a href="#" class="ktp-link">Klik untuk Melihat</a>
      </div>
    </div>

    <hr class="divider">

    <div class="content7" >
      <div class="left-content7">
        <h4 class="content-info7">Dokumen Lainnya</h4>
        <p class="info1">Hasil Psikotest</p>
        <a href="#" class="ktp-link">Klik untuk Melihat</a>
        <p class="info1">Hasil Assessment 02</p>
        <a href="#" class="ktp-link">Klik untuk Melihat</a>
      </div>
      <div class="right-content7">
        <p class="info1">Hasil Assessment 01</p>
        <a href="#" class="ktp-link">Klik untuk Melihat</a>
        <p class="info1">Hasil Assessment 03</p>
        <a href="#" class="ktp-link">Klik untuk Melihat</a>
      </div>
    </div>
  </div>


  <!-- CLUSTER MODAL -->
  <div id="addClusterModal">
    <div class="modal-content">
      <div class="content11">
        <div class="left-content11">
          <h3>Tambah Penilaian Talent Cluster</h3>
        </div>
      
        <div class="right-content11">
          <button onclick="closeAddClusterModal()" class="close-button">
            <i class="fas fa-circle-xmark"></i>
          </button>
        </div>
      </div>
      <div class="full-width">
        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-grid1">
            <div class="form-group2">
              <div class="label-group">
                <label>Periode</label>
              </div>
              <select name="periodeCluster" class="form-control1"  required>
                <option disabled selected value=""></option>
                <option value="Q1">Q1</option>
                <option value="Q2">Q2</option>
                <option value="Q3">Q3</option>
                <option value="Q4">Q4</option>
              </select>
            </div>

            <div class="form-group3">
              <div class="label-group">
                <label>Tahun</label>
              </div>
              <input type="month" name="tahunCluster" class="form-control" /><br><br>
            </div>

            <div class="form-group2 fully-width">
              <div class="label-group">
                <label>Talent Cluster</label>
                <label class="bintang">*</label>
              </div>
              <select name="talentCluster" class="form-control1" required>
                <option disabled selected value=""></option>
                <option value="Potential Employee">Potential Employee</option>
                <option value="Promotable Employee">Promotable Employee</option>
              </select>
            </div>
          </div>
        </form>
      </div>
      
      <div class="form-buttons">
          <button type="button" class="cancel" onclick="closeAddClusterModal()">Cancel</button>
          <button type="submit" class="submit">Tambah</button>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <form action="{{ route('feedback.store') }}" methode="POST">
                  @csrf
                  <div class="modal-header">
                    <h5 class="modal-title" id="feedbackModalLabel">Bantu Kami Lebih Baik!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body">
                    <p>Terima Kasih telah mengikuti pelatihan ini. Silahkan berikan umpan balik agar kami dapat terus melakukan perbaikan.</p>
                    <div class="d-flex justify-content-between mb-4">
                      <div class="emoji-select-group text-center">
                        <input type="radio" name="emoji_feedback" id="emoji1" value="Sangat Suka" hidden>
                        <label for="emoji1" class="emoji-option">
                          🥰
                          <div class="emoji-label">Sangat Suka</div>
                        </label>

                        <input type="radio" name="emoji_feedback" id="emoji2" value="Cukup Baik" hidden>
                        <label for="emoji2" class="emoji-option">
                          😀 
                          <div class="emoji-label">Cukup Baik</div>
                        </label>

                        <input type="radio" name="emoji_feedback" id="emoji3" value="Kurang Baik" hidden>
                        <label for="emoji3" class="emoji-option">
                          😔 
                          <div class="emoji-label">Kurang Baik</div>
                        </label>
                      </div>
                    </div>

                    @php
                      $questions = [
                        "Hasil pelatihan yang saya ikuti, menambah pengetahuan dan keterampilan saya",
                        "Saya mudah mengimplementasikan hasil pelatihan dalam tugas/pekerjaan saya",
                        "Hasil pelatihan yang didapat mempercpat/mempermudah penyelesaian tugas/pekerjaan saya",
                        "Saya menerapkan secara konsisten hasil pelatihan pada tugas/pekerjaan saya",
                        "Hasil pelatihan yang saya ikuti meningkatkan kinerja/performance di unit saya saat ini"
                      ];
                    @endphp

                    @foreach($questions as $index => $question)
                      <div class="mb-3">
                        <label class="form-label">{{ $question }} <span class="text-danger">*</span></label>
                        <div class="d-flex gap-2 flex-wrap">
                          @for($i =1; $i <= 10; $i++)
                            <div>
                              <input type="radio" class="btn-check" name="q{{ $index+1 }}" id="q{{ $index+1 }}_{{ $i }}" value="{{ $i }}" required>
                              <label class="btn btn-outline-primary btn-sm" for="q{{ $index+1 }}_{{ $i }}">{{ $i }}</label>
                            </div>
                          @endfor
                        </div>
                      </div>
                    @endforeach

                    <div class="mb-3">
                      <label class="form-label">Beritahu kami bagaimana kami bisa memperbaiki pelatihan ini <span class="text-danger">*</span></label>
                      <textarea class="form-control" name="saran" rows="3" required></textarea>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
            </div>
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

  const badge = document.getElementById('badgeStatus');
  if (badge) {
    // Reset class dulu
    badge.className = 'badge-status';

    switch (tabId) {
      case 'profile':
        badge.textContent = 'Karyawan Tetap';
        badge.classList.add('badge-profile');
        break;
      case 'keluarga':
        badge.textContent = 'Karyawan Tetap';
        badge.classList.add('badge-keluarga');
        break;
      case 'cluster':
        badge.textContent = 'Karyawan Tetap';
        badge.classList.add('badge-keluarga');
        break;
      case 'pelatihan':
        badge.textContent = 'Karyawan Tetap';
        badge.classList.add('badge-pelatihan');
        break;
      case 'payroll':
        badge.textContent = 'Karyawan Tetap';
        badge.classList.add('badge-payroll');
        break;
      case 'karir':
        badge.textContent = 'Karyawan Tetap';
        badge.classList.add('badge-karir');
        break;
      case 'dokumen':
        badge.textContent = 'Karyawan Tetap';
        badge.classList.add('badge-dokumen');
        break;
      default:
        badge.textContent = 'Karyawan Tetap';
        badge.classList.add('badge-profile');
    }
  }
}
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
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
  function showPelatihanDetail() {
    document.getElementById('pelatihan').style.display = 'none';
    document.getElementById('pelatihan-detail').style.display = 'block';
  }

  function backToPelatihan() {
    event.preventDefault(); // agar tidak reload halaman
    document.getElementById('pelatihan-detail').style.display = 'none';
    document.getElementById('pelatihan').style.display = 'block';
  }
</script>

<script>
  function openFeedbackModal() {
    document.getElementById('feedbackModal').style.display = 'block';
  }

  function closeFeedbackModal() {
    document.getElementById('feedbackModal').style.display = 'none';
  }

  // Tutup jika klik di luar konten
  window.onclick = function(event) {
    const modal = document.getElementById('feedbackModal');
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }

  function openFeedbackModal() {
    document.getElementById("feedbackModal").style.display = "block";
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
