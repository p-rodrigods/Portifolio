
<?php
     $usuario_autenticado = false;

    $usuario = array(
        array('email' => 'adm@teste.com.br', 'senha' => '123456'),
        array('email' => 'user@teste.com.br', 'senha' => '123abcd'),
    );


    foreach($usuario as $user){
       
        if( $user['email'] == $_POST['email'] &&  $user['senha'] == $_POST['senha']){
            $usuario_autenticado = true;
        }

    }

    if($usuario_autenticado){
        echo 'Usuario autenticado';
    }else{
       header('Location: index.php?login=erro');
    }