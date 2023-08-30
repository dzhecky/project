<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="icon" href="oya.png">
    <title>APK Pembayaran SPP</title>
</head>
<body>
    <style>
        *{
            box-sizing: border-box;
        }

        body{
            align-items: center;
            display: flex;
            justify-content: center;
            flex-direction: column;
            background:url(zuran.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o background-size: cover;
            background-size: cover;
            font-family: 'Poppins';
            min-height: 100%;
            margin: 10%;
        }

        .container{
            position: relative;
            width: 768px;
            max-width: 100%;
            min-height: 480px;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 14px 28px rgba(0,0,0,0. 25),
                        0 10px 10px rgba(0,0,0,0. 22)

        }

        .sign-up, .sign-in{
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            transition: all 0,6s ease-in-out;
        }

        .sign-up{
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .sign-in{
            width: 50%;
            z-index: 2;
        }

        form{
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 50px;
            height: 100%;
            text-align: center;
        }

        h1{
            font-weight: bold;
            margin: 0;
        }

        p{
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            letter-spacing: 0.5px;
            margin: 15px 0 20px;
        }

        input{
            background: #eee;
            padding: 12px 15px;
            margin: 8px 15px;
            width: 100%;
            border-radius: 5px;
            border: none;
            outline: none;
        }

        a{
            text-decoration: none;
            color: white;
        }

        button{
            color: #fff;
            background: #00008B;
            font=size: 20px;
            font-weight: bold;
            padding: 12px 55px;
            margin: 20px;
            border-radius: 20px;
            border: 1px solid #00008B;
            outline: none;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
            cursor: pointer;
        }

        button:active{
            transform: scale(0.90);
        }

        #signIn, #signUp{
            background-color: transparent;
            border: 2px solid;
        }

        .container.right-panel-active .sign-in{
            transform: translateX(100%);
        }
        .container.right-panel-active .sign-up{
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
        }

        .overlay-container{
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;

        }

        .container.right-panel-active .overlay-container{
            transform: translateX(-100%);
        }

        .overlay{
            position: relative;
            color: #fff;
            background: #00008B;
            left: -100%;
            height: 100%;
            width: 200%;
            background: linear-gradient(to right, #00008B, #008B8B);
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .container.right-panel-active .overlay{
            transform: translateX(50%);
        }

        .overlay-right, .overlay-left{
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 40px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 50%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay-left{
            transform: translateX(-20%);
        }

        .overlay-right{
            right: 0;
            transform: translateX(0);
        }

        .container.right-panel-active .overlay-left{
            transform: translateX(0);
        }
        .container.right-panel-active .overlay-right{
            transform: translateX(20%);
        }

        img{
            width: 50%;
        }

    </style>
    <div class="container" id="main">
        <div class="sign-up">
            <form action="proses_login_siswa.php" method="post">
            <img src="oya.png">
                <h1>Login Siswa</h1>
                <br>
                <input type="number" name="nisn" placeholder="Masukan nisn">
                <input type="password" name="nis" placeholder="Masukan password">
                <button type="submit">Login</button>
            </form>
        </div>
        <div class="sign-in">
            <form action="proses_login_petugas.php" method="post">
                <img src="oya.png">
                <h1>Login</h1>
                <p>silahkan masukan akun</p>
                <input type="text" name="username" placeholder="Masukan username">
                <input type="password" name="password" placeholder="Masukan password">
                <button type="submit">Login</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-right">
                    <h1>Haloo!</h1>
                    <p>jika kamu siswa login disini ya</p>
                    <button id="signIn">disini!</button>
                </div>
                <div class="overlay-left">
                    <h1>Haloo!</h1>
                    <p>jika kamu petugas login disini ya</p>
                    <button id="signUp">disini!</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const main = document.getElementById('main');

        signUpButton.addEventListener('click', () => {
            main.classList.remove("right-panel-active");
        });
        signInButton.addEventListener('click', () => {
            main.classList.add("right-panel-active");
        });
    </script>
</body>
</html>