<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App Help Desk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .card-login {
            padding: 30px 0 0;
        }
        .navbar a{
            text-decoration: none;
            font-weight: 500;
            color: #fff;
        }
        .navbar-band{
           padding: 15px ;
        }

        .navbar-band img{
            margin: 0 10px 0 20px;
        }

        .form-group input{
            margin: 15px 0 15px 0;
        }

        form{
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="navbar navbar-dark bg-dark">
        <a class="navbar-band" href="#">
            <img src="img/logo.png" alt="" width="30" height="30" class="d-inline-block align-top">
            App Help Desk
        </a>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card-login">
                    <div class="card">
                        <div class="card-header">
                            Login
                        </div>
                        <div class="card-body">
                            <form action="" method="">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Senha">
                                </div>
                                <button class="btn btn-md btn-info btn-block" type="submit">Entrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>