<?php
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        $depoimento = Painel::select('tb_site.depoimentos', 'id = ?', array($id));
    } else {
        Painel::alert('erro', "Você precisa passar o parâmetro ID");
        die();        
    }
?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Editar Depoimentos</h2>

    <form method="post" enctype="multipart/form-data"><!--Para trabalhar com o upload de imagem-->

        <?php
            if(isset($_POST['acao'])){
                //Enviei o formulario
                if(Painel::update($_POST)){
                    Painel::alert('sucesso', "A edição do depoimento foi realizada com sucesso!");
                    $depoimento = Painel::select('tb_site.depoimentos', 'id = ?', array($id));                    

                } else {
                    Painel::alert('erro', "Campos vazios não são permitidos!");
                   
                }
                
            }   
        ?>

		<div class="form-group">
			<label>Nome da Pessoa: </label>
			<input type="text" name="nome" value="<?php echo $depoimento['nome'];?>" required>
		</div><!--form-group-->

        <div class="form-group">
			<label>Depoimento: </label>
			<textarea name="depoimento" required><?php echo $depoimento['depoimento'];?></textarea>
		</div><!--form-group-->

        <div class="form-group">
			<label>Data: </label>
			<input formato="data" type="text" name="data" value="<?php echo $depoimento['data'];?>"required>
		</div><!--form-group-->




		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $depoimento['id'];?>">
			<input type="hidden" name="nome_tabela" value="tb_site.depoimentos">
			<input type="submit" name="acao" value="Atualizar!">
		</div><!--form-group-->

	</form>

</div><!--box-content-->