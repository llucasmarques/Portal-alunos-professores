
                  <div class="row">
                     <!-- Coluna Mural -->
                    <div class="col-md-8 mural" >
                      <h3>Registro de Atividades</h3>
                      <script type="text/javascript">
                        $(document).ready(function(){
                          comeca();
                        })
                        var timerI = null;
                        var timerR = false;

                        function para(){
                            if(timerR)
                                clearTimeout(timerI)
                            timerR = false;
                        }
                        function comeca(){
                            para();
                            lista();
                        }
                        function lista(){
                          $.ajax({
                            url:"atualizaListaAjax.php",
                              success: function (textStatus){
                              $('#lista').html(textStatus); //mostrando resultado
                            }
                          })
                          timerI = setTimeout("lista()", 60000);//tempo de espera
                                    timerR = true;

                        }
                      </script>
                      <div id="lista">
                        <ul class="list-group">
                          <li class="list-group-item" color="black"><i class="fas fa-hourglass-half"></i> Atividade 21/01/2018 - Em processamento</li>
                          <li class="list-group-item list-group-item-action list-group-item-success" color="green"><i class="fas fa-check"></i> Atividade 21/01/2018 - Aprovado</li>
                          <li class="list-group-item list-group-item-action list-group-item-danger" color="red"><i class="fas fa-times"></i> Atividade 21/01/2018 - Negado</li>
                        </ul>
                        <a href="?pagina=registroAtividades"><div class="text-right"><button type="button" class="btn btn-primary btn-sm">Visualizar Atividades</button></a></div>
                      </div>
                    </div>

                    <!-- Coluna Calendario -->
                    <div class="col-md-4" >
                      <!-- define the calendar element -->
                      <a href="?pagina=submeterAtividade"><button type="button" formaction="" class="btn btn-success submeter-atividade"><i class="fas fa-plus"></i> Submeter Atividade</button></a>

                      <div id="my-calendar"></div>
                    </div>
                  </div><!-- END DIV ROW -->
