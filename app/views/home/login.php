<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background: url('<?= BASEURL; ?> /img/Home.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background: #fff;
            padding: 20px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
    </style>
<div class="login-container">
<div class="login-box">
<form action="<?= BASEURL ?>/home/login" method="post">
    <fieldset>
        <legend>Login</legend>
        <p>
            <label>Username:</label>
            <input type="text" name="username" class="form-control" placeholder="username..." />
        </p>
        <p>
            <label>Password:</label>
            <input type="password" name="password" class="form-control" placeholder="password..." />
        </p>
        <p>
            <input type="submit" class="btn btn-primary" name="submit" value="Login" />
        </p>
    </fieldset>
</form>
</div>
</div>
<script>
    if (window.history && window.history.pushState) {
        window.history.pushState(null, null, window.location.href);
        window.addEventListener('popstate', function () {
            window.history.pushState(null, null, window.location.href);
        });
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>


<!-- https://kotakode.com/pertanyaan/2458/Login-sesuai-dengan-email%2Crole%2C-dan-id-supaya-role-yang-memiliki-akses-yang-sama-(misal-%3A-admin)-dat 
https://www.tutupkurung.com/2021/07/contoh-dan-cara-membuat-aplikasi-login.html
https://www.rajaputramedia.com/artikel/cara-membuat-script-login-multiuser-php-mysql.php
https://www.petanikode.com/php-login-register/