<?php
require_once("validador_acesso.php");
?>
<!doctype html>
<html lang="pt-br">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>App Help Desk</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

     <style>
          .card-login {
               padding: 45px 0 0;
          }

          .navbar a {
               text-decoration: none;
               font-weight: 500;
               color: #fff;
          }

          .navbar-band {
               padding: 15px;
          }

          .navbar-band img {
               margin: 0 10px 0 20px;
          }
     </style>
</head>

<body>

     <nav class="navbar navbar-dark bg-dark">
          <a class="navbar-brand" href="#">
               <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
               App Help Desk
          </a>
     </nav>

     <div class="container">
          <div class="row mt-5">

               <div class="card-abrir-chamado">
                    <div class="card">
                         <div class="card-header">
                              Abertura de chamado
                         </div>
                         <div class="card-body">
                              <div class="row">
                                   <div class="col">

                                        <form>
                                             <div class="form-group">
                                                  <label>Título</label>
                                                  <input type="text" class="form-control" placeholder="Título">
                                             </div>

                                             <div class="form-group">
                                                  <label>Categoria</label>
                                                  <select class="form-control">
                                                       <option>Criação Usuário</option>
                                                       <option>Impressora</option>
                                                       <option>Hardware</option>
                                                       <option>Software</option>
                                                       <option>Rede</option>
                                                  </select>
                                             </div>

                                             <div class="form-group">
                                                  <label>Descrição</label>
                                                  <textarea class="form-control" rows="3"></textarea>
                                             </div>

                                             <div class="row mt-5">
                                                  <div class="col-6">
                                                       <a href="home.php" class="btn btn-lg btn-warning btn-block form-control">Voltar</a>
                                                  </div>

                                                  <div class="col-6">
                                                       <button class="btn btn-lg btn-info btn-block form-control" type="submit">Abrir</button>
                                                  </div>
                                             </div>
                                        </form>

                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
</body>

</html>