<div class="row">
   <!-- Coluna Mural -->
  <div class="col-md mural" >
    <h3>Visualizar Atividades</h3>


      <legend class="legend-atividades"><i class="fas fa-eye"></i>  <i class="fas fa-exclamation-circle"></i> - Observação Professor</legend>
      <span><strong>Aluno: </strong><?php echo $_GET['nome'];?> <br><br>
    <ul class="list-group">

      <?php

        $alunoId = $_GET['aluno'];

        include_once("functions/conn.php");
        //FAZ A PESQUISA CURSO NO BANCO DE DADOS
        $sqlRead = "SELECT a.nome, ati.* FROM aluno a, atividades_comp ati WHERE a.id_aluno = :id and ati.id_aluno = :id ORDER BY data_envio, status DESC";

        try{
          $read = $db->prepare($sqlRead);
            $read->bindValue(':id', $alunoId, PDO::PARAM_STR);
          $read->execute();
        } catch (PDOException $e) {
          echo $e->getMessage();
        }



      ?>

      <?php
        while ($rs = $read->fetch(PDO::FETCH_OBJ)){

          $status = "";
          $statusCor = "";
          $statusIcon = "";
          if($rs->status == 0){
            $statusIcon = "<i class=\"fas fa-hourglass-half\"></i>";
            $status = "Atividade em processamento!";
          }elseif($rs->status == 1){
            $statusIcon = "<i class=\"fas fa-check\"></i>";
            $statusCor = "sucess";
            $status = "Atividade aprovada!";
          }elseif($rs->status == 2){
            $statusIcon = "<i class=\"fas fa-ban\"></i></i>";
            $statusCor = "danger";
            $status = "Atividade negada!";
          }elseif($rs->status == 3){
            $statusIcon = "<i class=\"fas fa-ban\"></i>";
            $statusCor = "dangers";
            $status = "Atividade negada coordenador!";
          }

      ?>

        <a data-toggle="modal" data-target="#modal<?php echo $rs->id_atividade;?>" title="<?php echo $status;?>" class="list-group-item<?php echo $statusCor;?>" ><?php echo $statusIcon;?> Atividade <?php echo  date("d/m/Y", strtotime($rs->data_envio))." - ". $status;?></i></a>





        <!-- Target Modal -->
        <div class="modal fade" id="modal<?php echo $rs->id_atividade;?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $rs->titulo;?>" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Atividade <?php echo  date("d/m/Y", strtotime($rs->data_envio))." - ". $rs->titulo;?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="dadosAtividade">
                  <strong>Nome Aluno: </strong><?php echo $rs->nome;?> <br>
                  <strong>Status: </strong><?php echo $statusIcon;?> <?php echo $status;?><br>
                  <strong>Titulo: </strong><?php echo $rs->titulo;?> <br>
                  <strong>Tipo: </strong> <?php echo $rs->tipo;?><br>
                  <strong>Carga Horaria: </strong><?php echo $rs->carga_horaria;?> <br>
                  <strong>Carga Aprovada: </strong><?php echo $rs->carga_computada;?> <br>
                  <strong>Data de submissão: </strong> <?php echo  date("d/m/Y H:i:s", strtotime($rs->data_envio));?><br>
                  <?php if($rs->impresso == 0){ ?>
                      <strong>Professor: </strong> <?php echo $rs->professor;?><br>
                  <?php }else{
                    echo "Atividade foi entregue impressa ao coordenador!<br>";
                  }?>

                  <strong>Professor: </strong> <?php echo $rs->professor;?><br>
                  <strong>Avaliação: </strong> <?php echo $rs->comentario;?>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              </div>
            </div>
          </div>
        </div> <!-- End modal -->

      <?php
        }
      ?>
    </ul>
  </div>
</div><!-- END DIV ROW -->
