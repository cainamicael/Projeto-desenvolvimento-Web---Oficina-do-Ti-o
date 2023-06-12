
<section class="banner-container">
    <div style="background-image: url('<?php echo INCLUDE_PATH;?>images/bg-form.jpg')" class="banner-single"></div> <!--banner-single-->
    <div style="background-image: url('<?php echo INCLUDE_PATH;?>images/bg-form2.jpg')" class="banner-single"></div> <!--banner-single-->
    <div style="background-image: url('<?php echo INCLUDE_PATH;?>images/bg-form3.jpg')" class="banner-single"></div> <!--banner-single-->
    <div class="overlay"></div> <!--overlay-->
        <div class="center">

           

            <form method="post">
                <h2>Quer receber descontos especiais?</h2>
                <input type="email" name="email" placeholder="Digite seu Email..." required>
                <input type="hidden" name="identificador" value="form_home">
                <input type="submit" name="acao" value="Cadastrar">
            </form>
        </div><!--center-->
        <div class="bullets">
            
        </div><!-- Bullets -->
    </section><!--Banner principal-->

    <section class="descricao-autor">
        <div class="center">
            <div class="w50 left">
                <h2>Profissão: Programador Aeroespacial Terceirizado</h2>

                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet sequi ipsam dicta officia temporibus omnis tempore quisquam iusto fugit quia doloribus earum molestias quae et officiis eum nulla, nesciunt velit.
                </p>

                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid, necessitatibus. Voluptatibus consectetur accusamus ratione, animi, hic numquam minima maxime excepturi iste amet consequuntur repellendus voluptatem repudiandae aliquid. Facilis, maxime culpa!
                </p>
            </div><!--w50-->

            <div class="w50 left">
                <!--Pegar imagem depois-->
                <img class="right" src="<?php echo INCLUDE_PATH; ?>images/tião.jpg">
            </div><!--w50-->
            <div class="clear"></div><!--clear-->
        </div><!--center-->
    </section><!--Descrição autor-->
    
    <section class="especialidades">
        <div class="center">
            <h2 class="title">Especialidades</h2>
            <div class="w33 left box-especialidades">
                <h3><i class="devicon-css3-plain"></i></h3>
                <h4>CSS3</h4>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, odit? Voluptates, sint officiis. Voluptatem, earum obcaecati voluptatibus libero quis aspernatur temporibus iusto id dolorem amet. Doloribus vitae minima reiciendis enim.
                </p>
            </div><!--Box especialidades-->
            <div class="w33 left box-especialidades">
                <h3><i class="devicon-html5-plain"></i></h3>
                <h4>HTML5</h4>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, odit? Voluptates, sint officiis. Voluptatem, earum obcaecati voluptatibus libero quis aspernatur temporibus iusto id dolorem amet. Doloribus vitae minima reiciendis enim.
                </p>
            </div><!--Box especialidades-->
            <div class="w33 left box-especialidades">
                <h3><i class="devicon-javascript-plain"></i></h3>
                <h4>JavaScript</h4>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, odit? Voluptates, sint officiis. Voluptatem, earum obcaecati voluptatibus libero quis aspernatur temporibus iusto id dolorem amet. Doloribus vitae minima reiciendis enim.
                </p>
            </div><!--Box especialidades-->
            <div class="clear"></div>
        </div><!--center-->
    </section><!--Especialidades-->

    <section class="extras">
        <div class="center">
            <div id="depoimentos" class="w50 left depoimentos-container">
                <h2 class="title">Depoimentos</h2>
                <?php
                    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.depoimentos` ORDER BY order_id ASC LIMIT 3");//Quero só 3
                    $sql->execute();

                    $depoimentos = $sql->fetchAll();

                    foreach ($depoimentos as $key => $value) {
                        # code...
                    
                ?>
                <div class="depoimento-single">
                    <p class="depoimento-descricao">
                        <?php echo $value['depoimento'];?>
                    </p>
                    <p class="nome-autor"><?php echo $value['nome'];?> - <?php echo $value['data']?></p>
                </div><!--Depoimento single-->
                <?php } ?>
            </div><!--w50-->

            <div id="servicos" class="w50 left servicos-container">
                <h2 class="title">Serviços</h2>
                <div class="servicos">
                    <ul>
                        <?php
                            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.servicos` ORDER BY order_id ASC LIMIT 3");//Quero só 3
                            $sql->execute();
        
                            $servicos = $sql->fetchAll();
        
                            foreach ($servicos as $key => $value) {

                        ?>
                        <li>
                            <?php echo $value['servico'];?>
                        </li>
                        <?php } ?>
                    </ul>
                </div><!--servicos-->
            </div><!--w50-->
            <div class="clear"></div><!--clear-->
        </div><!--center-->
    </section><!--Extras-->
