<!--<div id="map"></div> Para o mapa via api-->
<iframe id="mapa-iframe"src="https://www.google.com/maps/embed?pb=!4v1686579554258!6m8!1m7!1ssiv6r9pgXe9p2JBPJhGJ8g!2m2!1d-8.06616805419371!2d-34.93893737181532!3f32.721550534866154!4f-12.534407536342016!5f0.7820865974627469" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

<div class="contato-container">
	<div class="center">
		<form method="post" action="">
			<input required type="text" name="nome" placeholder="Nome...">
			<div></div>
			<input required type="email" name="email" placeholder="E-mail..">
			<div></div>
			<input required type="tel" name="telefone" placeholder="Telefone...">
			<div></div>
			<textarea required placeholder="Sua mensagem..." name="mensagem"></textarea>
			<div></div>
			<input type="hidden" name="identificador" value="form_contato">
			<input type="submit" name="acao" value="Enviar">
		</form>
	</div><!--center-->
</div><!--contato-container-->