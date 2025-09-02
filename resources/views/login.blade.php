@extends('layouts.app')

@section('content')

<style>

.login-page {
    display: flex;
    width: 100%;
    padding-right: 90px;
    justify-content: space-between;
    gap: 20px;
}

.login-left {
    width: 50%;
    display: grid;
}

.login-left img {
    width: 800px; /* Atur lebar foto */
    height: 800px; /* Atur tinggi foto */
    border-radius: 10%;
}

.login-right {
    display: grid;
    gap: 24px;
    font-family: Poppins, sans-serif;
}

.body-login {
    display: flex;
    flex-direction: column;
    padding-top: 170px;
}

.body-login h2 {
    font-family: Poppins, sans-serif;
    font-size: 32px;
    font-weight: bold;
    padding-bottom: 15px;
}

.body-login h3 {
    font-family: Poppins, sans-serif;
    font-size: 12px;
    font-weight: normal;
    padding-bottom: 15px;

}

.form-group {
    display: flex;
    flex-direction: column;
    padding-bottom: 15px;
    padding-top: 10px;
}

.label-group {
    display: flex;
    align-items: center;
    gap: 4px;
    font-family: Poppins, sans-serif;
    font-size: 12px;
    padding-bottom: 10px;

}

.form-control {
    width: 460px;
    height: 40px;
    font-size: 12px;
    border-radius: 8px;
    border: 1px solid #ccc;
    background-color: white;
}

textarea.form-control {
    resize: vertical;
    min-height: 200px;
}

.content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 10px;
    margin-bottom: 15px;
}

.checkbox {
    display: flex;
    align-items: center;
    gap: 5px;
    padding-left: 5px;
}

.forgot-pass {
    font-size: 12px;
    color: #333;
    text-decoration: none;
    padding-right: 60px;
}

.forgot-pass:hover {
    color: rgb(0, 0, 205);
}

.form-checkbox {
    width: 20px;
    height: 20px;
    border-radius: 5px;
    border: 1px solid #ccc;
    background-color: white;
    margin-right: 10px;
}

.checkbox label {
    font-size: 12px;
    padding-top: 3px;
}

.form-control1 {
    width: 460px;
    height: 40px;
    font-size: 12px;
    border-radius: 8px;
    border: 1px solid rgba(0, 0, 205, 0.7);
    background-color: rgba(0, 0, 205, 0.7);
    color: white;
    font-size: 14px;
    font-weight: bold;
    cursor: pointer;
}

.form-control1:hover {
    background-color: #0000CD;
}

</style>

<meta name="csrf-token" content="{{ csrf_token() }}">


<div class="login-page">
    <div class="login-left">
        <img src="{{ asset('img/loginPage.svg') }}" alt="Login Illustration">
    </div>

    <div class="login-right">
        <div class="body-login">
            <h2>Selamat Datang</h2>
            <h3>Silakan login dengan menggunakan NIK dan kata sandi Anda untuk melanjutkan akses</h3>

            @if(Session::has('error'))
                <div class="mb-4 text-red-600 text-sm">
                    {{ Session::get('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('actionlogin') }}">
                @csrf
                <div class="form-group">
                    <div class="label-group">
                        <label>NIK/Username</label>
                    </div>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan NIK/Username Anda" required>
                </div>

                <div class="form-group">
                    <div class="label-group">
                        <label>Kata Sandi</label>
                    </div>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan Kata Sandi Anda" required>
                </div>

                <div class="content">
                    <div class="checkbox">
                        <input type="checkbox" name="remember" id="remember" class="form-checkbox">
                        <label for="remember">Ingat Saya</label>
                    </div>
                    <a href="#" class="forgot-pass">Lupa Kata Sandi?</a>
                </div>

                <div class="form-group">
                    <button type="submit" class="form-control1">Masuk</button> 
                </div>
            </form>
        </div>
    </div>
</div>





@endsection

