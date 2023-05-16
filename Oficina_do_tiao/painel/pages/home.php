<?php $usuariosOnline = Painel::listarUsuariosOnline();?>
<?php 
    $pegarVisitasTotais = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas`");
    $pegarVisitasTotais->execute();
    $pegarVisitasTotais = $pegarVisitasTotais->rowCount();

    //Pegar visitas hoje
    $data = date('Y-m-d');
    $pegarVisitasHoje = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas` WHERE dia = ?");
    $pegarVisitasHoje->execute(array($data));
    $pegarVisitasHoje = $pegarVisitasHoje->rowCount();
?>
<div class="box-content left w100">
    <h2><i class="fa fa-home">  Painel de Controle - <?php echo NOME_EMPRESA; ?></i></h2>

    <div class="box-metricas"><!--box-metrica-->

        <div class="box-metrica-single">
            <div class="box-metrica-wraper">
                <h2>Usuários Online</h2>
                <p><?php echo count($usuariosOnline); ?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->

        <div class="box-metrica-single">
            <div class="box-metrica-wraper">
                <h2>Total de visitas</h2>
                <p><?php echo $pegarVisitasTotais;?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->

        <div class="box-metrica-single">
            <div class="box-metrica-wraper">
                <h2>Total de Visitas Hoje</h2>
                <p><?php echo $pegarVisitasHoje;?></p>
            </div><!--box-metrica-wraper-->
        </div><!--box-metrica-single-->

    </div><!--box-metrica-->


</div><!--box-content-->


<div class="box-content left w100">
    <h2><i class="fa fa-rocket"> Usuarios Online no Site</i></h2>
    <div class="table-responsive">
        <div class="row">
            <div class="col">
                <span>IP</span>
            </div><!--col-->
            <div class="col">
                <span>Ultima Acao</span>
            </div><!--col-->
            <div class="clear"></div>
        </div><!--row-->

        <?php
            foreach ($usuariosOnline as $key => $value) {

        ?>

        <div class="row">
            <div class="col">
                <span><?php echo $value['ip']; ?></span>
            </div><!--col-->
            <div class="col">
                <span><?php echo date('d/m/Y H:i:s', strtotime($value['ultima_acao']));?></span><!--Para deixar dd-mm-aaaa-->
            </div><!--col-->
            <div class="clear"></div>
        </div><!--row-->

        <?php
            } 
        ?>

    </div><!--table-responsive-->
</div>

<div class="box-content left w100">
    <h2><i class="fa fa-rocket"> Usuarios do Painel</i></h2>
    <div class="table-responsive">
        <div class="row">
            <div class="col">
                <span>Nome</span>
            </div><!--col-->
            <div class="col">
                <span>Cargo</span>
            </div><!--col-->
            <div class="clear"></div>
        </div><!--row-->

        <?php
            $usuariosPainel = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios`");
            $usuariosPainel->execute();
            $usuariosPainel = $usuariosPainel->fetchAll();

            foreach ($usuariosPainel as $key => $value) {

        ?>

        <div class="row">
            <div class="col">
                <span><?php echo $value['nome']; ?></span>
            </div><!--col-->
            <div class="col">
                <span><?php echo pegaCargo($value['cargo']);?></span><!--Para deixar dd-mm-aaaa-->
            </div><!--col-->
            <div class="clear"></div>
        </div><!--row-->

        <?php
            } 
        ?>

    </div><!--table-responsive-->
</div>

<div class="clear"></div>
