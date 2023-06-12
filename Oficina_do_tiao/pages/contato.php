<!--<div id="map"></div> Para o mapa via api-->
<iframe id="mapa-iframe"src="https://www.google.com/maps/embed?pb=!4v1686580549102!6m8!1m7!1soi5c3gEql8q5U-7Y-srVVQ!2m2!1d-8.064335343800604!2d-34.93852944527487!3f26.572740052432472!4f-4.566793028094935!5f0.7820865974627469" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

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