<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: rgb(224,243,246);
            background: linear-gradient(150deg, rgba(224,243,246,1) 27%, rgba(255,255,0,1) 100%);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        center {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        img {
            width: 360px;
            height: auto;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        a {
            display: block;
            text-align: center;
            padding: 10px 20px;
            background-color: #121212;
            color: #ffff00;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background-color: #ffffff;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    if(isset($_SESSION['email'])) {
    ?>
        <center>
            <h1>Selamat Datang ;)</h1>
            <img src="../assets/ajigijaw.jpg" alt="Ajigijaw" width="360px"><br/>
            <a href="./logout.php">Logout</a>
        </center>
    <?php
    } else {
        echo '<script>window.location.replace("./login.php");</script>';
    }
    ?>
</body>
</html>
