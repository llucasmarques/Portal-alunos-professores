<?php

		include_once("functions/conn.php");
	//FAZ A PESQUISA CURSO NO BANCO DE DADOS
	$sqlRead = "SELECT * FROM atividades_comp ORDER BY data_envio, status DESC";

	try{
		$read = $db->prepare($sqlRead);
		$read->execute();
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

  while ($rs = $read->fetch(PDO::FETCH_OBJ)){ ?>
		saiojo
			<?php echo $rs->titulo;?>
<?php	}

?>
