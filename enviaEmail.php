<?php

  if(isset($_POST['enviarEmail'])){

    $email = $_POST['email'];
    $data = date("d/m/Y H:i:s");
    /*verifica se a pessoa digitou o email corretamente*/
    if (empty($email)){

      echo "<div class=\"no\">Por favor, informe seu E-mail!</div>";

    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){

      echo "<div class=\"no\">Por Favor, informe um E-mail Válido!</div>";

    }else{

     $msn ="
     <html>
       <body>
           <strong>Titulo: </strong>$rs->titulo<br>
           <strong>Nome Aluno: </strong>$rs->nome<br>
           <strong>Link para avaliação: </strong><a href=\"http://localhost/scac/avaliaAtividade.php?atividade=$rs->id_atividade\">Clique aqui</a><br>
           Enviado por SCAC - Sistema de Controle de Atividades complementares em $data
      </body>
     </html>";


     $para = $email;
     $assunto = "Tarefa para Avaliação - $rs->titulo\n - $rs->tipo\n";
     $headers = "From: coordenador@scac.net\n";
     $headers .= "Content-Type: text/html; charset=\"utf-8\"\n\n";

     mail($para, $assunto, $msn, $headers);

     // <-- FIM CORPO DO EMAIL
     echo "<div class=\"ok\">Mensagem enviada com sucesso! Entraremos em contato por E-mail! $para</div>";

    }
  }


?>
