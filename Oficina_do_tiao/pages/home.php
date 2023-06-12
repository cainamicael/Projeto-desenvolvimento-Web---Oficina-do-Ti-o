
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
                <h2>Profissão: Protetor do Orçamento Brasileiro</h2>

                <p>
                    Formado pela vida, desde sua infância, ensinado pelo seu pai, Orlingleydson Sebastião, conhecido como 
                    TIÃO, concerta todo tipo de meio de transporte que vê pela frente. Seu primeiro trabalho carreira solo 
                    foi fazer a retífica a domicílio de um Gol Quadrado Ap.
                </p>

                <p>
                    Desde então, ele encontrou a vua vocação e vem se aperfeiçoando cada vez mais. Aprendeu durante o tempo que serviu a aeronautica, o concerto de aviões, helicópteros e afins. 
                    Sua maior ambição é cobrir qualquer orçamento feito, e entregar um trabalho exemplar, com no mínimo, 1 ano de garantia!
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
                <h3><i class="fa-solid fa-motorcycle"></i></h3>
                <h4>Motos</h4>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, odit? Voluptates, sint officiis. Voluptatem, earum obcaecati voluptatibus libero quis aspernatur temporibus iusto id dolorem amet. Doloribus vitae minima reiciendis enim.
                </p>
            </div><!--Box especialidades-->
            <div class="w33 left box-especialidades">
                <h3><i class="fa-solid fa-car"></i></h3>
                <h4>Carros</h4>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam, odit? Voluptates, sint officiis. Voluptatem, earum obcaecati voluptatibus libero quis aspernatur temporibus iusto id dolorem amet. Doloribus vitae minima reiciendis enim.
                </p>
            </div><!--Box especialidades-->
            <div class="w33 left box-especialidades">
                <h3><i class="fa-solid fa-plane"></i></h3>
                <h4>Aeronaves</h4>
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
