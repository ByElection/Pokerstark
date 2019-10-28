{include file="header.tpl"}
<div id="mesa">
	<div class="row">
		{$count=0}
		{foreach from=$jugadoresmesa item=jugador}
			<div class="jugador col">
				{foreach from=$usuariosmesa item=usuario}
					{if $usuario->id_usuario == $jugador->id_usuario}
						<h4>{$usuario->username}</h4>
					{/if}
				{/foreach}
				<h5>Fichas: {$jugador->fichas_mesa}</h5>
				{if $jugador->id_usuario == $usuariologeado->id_usuario}
					<a href="pararse/{$id_usuario}" class="btn btn-primary stretched-link">Pararse</a>
				{/if}
				{$count=$count+1}
			</div>
		{/foreach}
		{if $count != $mesa->sillas}
		{for $i=$count to $mesa->sillas}
			<div class="jugador col">
				<h4>Silla Vacia</h4>
					<input type="range" name="checkin" min="{$ciegas->ciega_grande}" max="{$usuariologeado->fichas}">
					<a href="sentarse/{$mesa->id_mesa}/{$usuariologeado->id_usuario}" class="btn btn-primary stretched-link">Sentarce</a>
			</div>
		{/for}
		{/if}
	</div>
	<div class="row mesa">
		<div class="col">
			<h2>Ciega Chica/Grande: {$ciegas->ciega_chica}/{$ciegas->ciega_grande}</h2>
			<h3>Pozo: {$mesa->pozo}</h3>
		</div>
		<img src="../img/mesa.jpg">
	</div>
</div>
{include file="footer.tpl"}