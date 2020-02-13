<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SCAC</title>

    <!-- MetasTag -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Import CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/style.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">



    <!-- Import Javacript-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/login.js"></script>


  </head>
  <body class="bgAluno">
    <div class="container">
	     <div class="cadAluno-container center-block">
            <div id="output"></div>
            <div class="avatar">
              <h1>SCAC</h1>
              <h2>Sistema de Controle de Atividades Complementares</h2>
            </div>
            <div class="form-box">
                <form action="" method="">
                    <h3>Avaliar Atividade</h3>
                    <div class="dadosAtividade">
                      <strong>Nome Aluno:</strong> Lucas Marconhas <br>
                      <strong>Titulo Atividade:</strong>Curso de paint básico <br>
                      <strong>Tipo:</strong> dhshoaohdiao <br>
                      <strong>Carga Horária:</strong> 1500 <br>
                      <strong>Ano:</strong> 2018 <br>
                      <strong>Data de Envio:</strong> 23/02/2018 às 15:30 <br>
                      <strong>Visualizar atividade:</strong> <i class="fas fa-file-pdf"></i> <br><br>

                      <form>
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Aprovação da atividade: </label>
                          <select class="form-control" id="exampleFormControlSelect1">
                            <option>Aprovado</option>
                            <option>Reprovado</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="">Avaliação: </label>
                          <textarea name="name" rows="8" cols="50"></textarea>
                        </div>

                    </div>

                      <div class="col">
                        <button class="btn-primary btn btn-info btn-block cadAluno" name="submit-cad" type="submit">Enviar avaliação</button>
                      </div>
                </form>
            </div>
        </div>
    </div>
      <h6>Barra do Garças/MT &copy; <?php echo date("Y"); ?> - Todos os direitos não reservados</h6>
  </body>
</html>
