<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/dist/css/adminlte.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Chivo:wght@300;400;700;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200&family=Open+Sans:ital,wght@0,500;0,700;1,300;1,400&family=Poppins:wght@300;400;700&family=Teko:wght@300;400;500&family=Zen+Kurenaido&display=swap');

    html {
        box-sizing: border-box;
        font-size: 16px;

    }

    *,
    *:before,
    *:after {
        box-sizing: inherit;
    }

    body {
        overflow: hidden;
    }

    body,
    p {
        margin: 0;
        padding: 0;
    }

    img {
        max-width: 100%;
        height: auto;
    }

    .background-login {

        background: #a5a5a5;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to left, #cfd6e6, #a5a5a5);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to left, #cfd6e6, #a5a5a5);
    }

    .container-login {
        margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: flex;
        width: 70%;
        height: 70%;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;

        font-family: 'Nunito', sans-serif;

    }

    .logo {
        width: 50%;
        background: #515151;
    }

    .logo img {
        width: 350px;
        margin: 20px auto;
        display: block;
    }

    .logo p {
        color: #fff;
        font-size: 18px;
        text-align: center;
    }

    .logo span {
        color: #cfd6e6;
        font-size: 16px;
        display: block;
        text-align: center;
    }

    .login-form {
        width: 50%;
        background: #ffffff80;
        padding: 70px 50px;
    }

    input,
    button {
        margin: 20px;
        outline: none;
        border: none;
        padding: 9px 20px;
        display: block;
        border-radius: 20px;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;
    }

    input {
        width: 70%;
        font-size: 16px;
        border: 1px solid #cfd6e6;
        background: #5151510e;

    }

    button {
        margin-top: 30px;
        width: 40%;
        background-color: #545080;
        color: #cfd6e6;

    }

    form p {
        margin-top: 20px;
        margin-bottom: 30px;
        margin-left: 20px;
        font-size: 18px;
        width: 80%;
    }
    </style>
</head>

<body class="background-login">

    <div class="container-login">

        <div class="logo">
            <img src="<?php echo base_url(); ?>assets/img/buku.png" alt="buku">
            <p>SISTEM PREDIKSI JUMLAH PRODUKSI BUKU</p>
            <span>DENGAN ALGORITMA FUZZY LOGIC TSUKAMOTO</span>
        </div>
        <div class="login-form">
            <form action="<?php echo base_url("login"); ?>" method="post">

                <p>Masukkan Username dan Password untuk Login</p>
                <input type="text" name="username" class="" placeholder="USERNAME">
                <input type="password" name="password" class="" placeholder="PASSWORD">
                <button type="submit">LOGIN</button>
            </form>
        </div>
    </div>


    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/adminlte/dist/js/adminlte.min.js"></script>

</body>

</html>