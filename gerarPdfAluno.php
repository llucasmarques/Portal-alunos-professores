<div class="row">
   <!-- Coluna Mural -->
  <div class="col-md" >
    <h3>Gerar PDF Atividades</h3>

    <form action="pdfAluno.php" method="get">
      <div class="form-group">
        <label>Selecione o Ano</label>
        <select name="ano" class="form-control">
          <option value="2018">2018</option>
          <option value="2017">2017</option>
          <option>2016</option>
          <option>2015</option>
          <option>2014</option>
        </select>
      </div>
      <input type="hidden" name="id" value="<?php echo $idAluno;?>">
      <button name="gerar" value="gerar" type="submit" class="btn btn-info"><i class="fas fa-file-pdf"></i> Gerar PFD</button>
    </form>

</div><!-- END DIV ROW -->
