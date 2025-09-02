<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register User</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">


    <style>
        body, html {
            font-family: 'Poppins', sans-serif;
            font-size: 25px;
            height: 100%;
            margin: 0;
        }

        .center-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .form-box {
            width: 100%;
            max-width: 700px;
        }

        .fa-envelope {
            font-size: 20px;
        }

        .fa-user {
            font-size: 20px;
        }

        .fa-key {
            font-size: 20px;
        }

        .fa-address-book {
            font-size: 20px;
        }

        .form-control {
            font-size: 16px;    
            height: 60px;        /* Memperbesar tinggi box */
            padding: 15px 20px;  /* Menambah ruang dalam box */
            border-radius: 10px;
        }

        .custom-btn {
            height: 70px;                 /* Tinggi tombol */
            font-size: 22px;              /* Ukuran font */
            display: flex;
            align-items: center;
            justify-content: center;     /* Horizontal center */
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="center-wrapper"><br>
        <div class="form-box">
            <h2 class="text-center">FORM REGISTER USER</h2>
            <hr>
            @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            <form action="{{route('actionregister')}}" method="post">
            @csrf
                <div class="form-group">
                    <label><i class="fa fa-envelope"></i> Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-user"></i> Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-key"></i> Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-address-book"></i> Role</label>
                    <select class="form-control" name="role" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="Admin">Admin</option>
                        <option value="HCM">HCM</option>
                        <option value="Employee">Employee</option>
                        <option value="BoD">BoD</option>              
                    </select>
                </div>
                <button type="submit"class="btn btn-primary btn-block custom-btn">Register</button>
                <hr>
                <p class="text-center">Sudah punya akun? silahkan <a href="/">Login Disini!</a></p>
            </form>
        </div>
    </div>
</body>
</html>

