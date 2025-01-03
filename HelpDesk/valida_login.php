
<?php
     
    session_start();
     
    $usuario_autenticado = false;
    $usuario_id = null;
    $perfil_id = null;

    $perfis = array(1 => 'Administrativo', 2 => 'Usuario');

    $usuario = array(
        array('id' => 1,'email' => 'adm@teste.com.br', 'senha' => '123456', 'perfil_id' => 1),
        array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => '123456', 'pefil_id' => 1 ),
        array('id' => 3,'email' => 'maria@teste.com.br', 'senha' => '123456', 'perfil_id' => 2),
        array('id' => 4,'email' => 'jose@teste.com.br', 'senha' => '123456', 'perfil_id' => 2),
    );


    foreach($usuario as $user){
       
        if( $user['email'] == $_POST['email'] &&  $user['senha'] == $_POST['senha']){
            $usuario_autenticado = true;
            $usuario_id = $user['id'];
            $perfil_id = $user['perfil_id'];
        }

    }

    if($usuario_autenticado){
        echo 'Usuario autenticado';
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $perfil_id;
        header('Location: home.php');
    }else{
       header('Location: index.php?login=erro');
    }