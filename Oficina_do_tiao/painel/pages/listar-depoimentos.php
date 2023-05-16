<?php
	if(isset($_GET['excluir'])){
		$idExcluir = (int)$_GET['excluir'];
		Painel::deletarRegistro('tb_site.depoimentos', $idExcluir);
		Painel::redirect(INCLUDE_PATH_PAINEL.'listar-depoimentos');
	}
	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 2;

	$depoimentos = Painel::selectAll('tb_site.depoimentos', ($paginaAtual - 1) * $porPagina, $porPagina);

?>
<div class="box-content">
	<h2><i class="fa fa-id-card"></i> Depoimentos Cadastrados</h2>

    <table>
        <tr>
            <td>Nome: </td><!--colunas-->
            <td>Data: </td>
            <td>#</td>
            <td>#</td>
        </tr>

        <?php foreach ($depoimentos as $key => $value) {

        ?>
        <tr>
            <td><?php echo $value['nome']; ?></td>
            <td><?php echo $value['data']; ?></td>
            <td><a class="btn edit" href="<?php echo INCLUDE_PATH_PAINEL;?>editar-depoimento?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil"> Editar</i></a></td>
            <td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH_PAINEL?>listar-depoimentos?excluir=<?php echo $value['id'];?>"><i class="fa fa-times"> Excluir</i></a></td>
        </tr>

        <?php } ?>
    </table>

	<div class="paginacao">
		<?php
			
			$totalPaginas = ceil(count(Painel::selectAll('tb_site.depoimentos')) / $porPagina); //O ceil vai arredondar para impedir erro nos ímpares

			for($i = 1; $i <= $totalPaginas; $i++){
				if($i == $paginaAtual)
					echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'listar-depoimentos?pagina='.$i.'">'.$i.'</a>';
				else
					echo '<a  href="'.INCLUDE_PATH_PAINEL.'listar-depoimentos?pagina='.$i.'">'.$i.'</a>';
			}
			
		?>
	</div><!--paginacao-->

</div><!--box-content-->