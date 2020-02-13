                  <div class="row">
                     <!-- Coluna Mural -->
                    <div class="col-md mural cadastrarProfessor" >
                      <h3>Submeter Atividade</h3>
                      <?php
                        /* Chama a conexao */
                        include_once("functions/conn.php");

                        //Se o botão de nome enviar for clicado
                        if(isset($_POST['cadastrar'])){


                            //Verifiica se há atividades pendentes

                            //Insere os dados do aluno na tabela aluno
                            $sql = "INSERT INTO atividades_comp (id_aluno, titulo, tipo, carga_horaria, carga_computada, data_envio, status, nome_arq, ano, comentario, impresso) VALUES (:aluno_ra, :titulo, :tipo, :carga_horaria, :carga_computada, :data_envio, :status, :nome_arq, :ano, :comentario, :impresso)";
                            try{

                              $create = $db->prepare($sql);
                              $create->bindValue(':aluno_ra', $idAluno, PDO::PARAM_INT);
                              $create->bindValue(':titulo', $_POST['titulo'], PDO::PARAM_STR);
                              $create->bindValue(':tipo', $_POST['tipo'], PDO::PARAM_STR);
                              $create->bindValue(':carga_horaria', $_POST['carga_horaria'], PDO::PARAM_STR);
                              $create->bindValue(':carga_computada', 0, PDO::PARAM_STR);
                              $create->bindValue(':data_envio', date('Y-m-d H:i:s'), PDO::PARAM_STR);
                              $create->bindValue(':status', 0, PDO::PARAM_STR); //Em avaliação
                              $create->bindValue(':nome_arq', basename($_FILES["file"]["name"]."-".date('Y-m-d H:i:s')), PDO::PARAM_STR);
                              $create->bindValue(':ano', $_POST['ano'], PDO::PARAM_STR);
                              $create->bindValue(':comentario', "Em avaliação", PDO::PARAM_STR);
                              $create->bindValue(':impresso', $_POST['impresso'], PDO::PARAM_STR);

                              //Executa a query
                              if($create->execute()){
                                echo "Atividade enviada com sucesso!";
                              } else {
                                echo "Falha no envio da atividade!";
                              }

                            } catch (PDOException $e){
                                echo "Erro: ".$e->getMessage()." - Falha no envio da atividade!";
                            }


                            //Caminho da minha pasta local onde serão salvo os arquivos
                            $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/scac/atvd';

                            //Verifica se o usuario selecionou um arquivo
                            if (isset($_FILES['file'])) {

                                //Cria uma referencia para o arquivo
                                $file = $_FILES['file'];

                                //Verifica se houve erro na seleção do arquivo
                                if ($file['error'] !== UPLOAD_ERR_OK) {
                                    echo 'error: ', $file['error'], PHP_EOL;
                                    exit;
                                }

                                //Verifica a extensão do arquivo
                                $allowed = array('pdf', 'doc', 'png', 'ppt');
                                $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                                if (!in_array($extension, $allowed)) {
                                    echo 'error: invalid file extension', PHP_EOL;
                                    exit;
                                }

                                //Seta o endereço no servidor e concatena com o nome do arquivo
                                $target = $upload_dir . '/' . basename(date('Y-m-d H:i:s').'-'.$file['name']);

                                //Move o arquivo da pasta temporario do servidor para a pasta atvd
                                if (!move_uploaded_file($file['tmp_name'], $target)) {
                                    echo 'error: move_uploaded_file failed', PHP_EOL;
                                    print_r(error_get_last());
                                    exit;
                                }

                                echo '<br>Sucesso no envio do arquivo<br>', PHP_EOL;
                                //echo $target, PHP_EOL;
                            } else{
                              echo "teste";
                            }
                      } ?>


                      <form method="post" enctype="multipart/form-data">
                        <div class="form-group ">
                          <label>Titulo</label>
                          <input name="titulo" type="text" required="required">
                        </div>
                        <div class="form-group">

                          <?php

                            //FAZ A PESQUISA NO BANCO DE DADOS
                            $sqlRead = "SELECT tipo FROM ppc ORDER BY tipo ASC";

                            try{
                              $read = $db->prepare($sqlRead);
                              $read->execute();
                            } catch (PDOException $e) {
                              echo $e->getMessage();
                            }

                          ?>
                          <label>Tipo</label>
                          <select name="tipo" class="form-control" required="required">
                            <option value="" selected>Selecione o Tipo</option>
                            <?php
                              while ($rs = $read->fetch(PDO::FETCH_OBJ)){
                                echo "<option value=\"".$rs->tipo."\">".$rs->tipo."</option>";
                              }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Carga Horaria</label>
                          <input name="carga_horaria" type="text" required="required" class="customize">
                        </div>

                        <div class="form-group">
                          <label>Ano</label>
                          <input name="ano" type="text" required="required" class="customize">
                        </div>
                        <div class="form-group">
                          <label>Forma de entrega</label>
                          <select name="impresso" class="form-control customize" required="required" >
                            <option value="" selected>Selecione</option>
                            <option value="0">Online</option>
                            <option value="1">Impresso</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Arquivo para envio</label>
                          <input type="file" name="file" class="form-control-file customize" id="exampleFormControlFile1">
                        </div>
                        <button name="cadastrar" value="cadastrar" type="submit" class="btn btn-primary">Enviar</button>
                      </form>
                    </div>
                    <!-- Coluna Calendario -->
                  </div><!-- END DIV ROW -->
