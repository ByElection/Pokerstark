{include file="headermesa.tpl"}
<div id="mesa">
	<div class="row">
		{$count=0}
		{$estasentado=false}
		{foreach from=$jugadoresmesa item=jugador}
			<div class="jugador col">
				{foreach from=$usuariosmesa item=usuario}
					{if $usuario->id_usuario == $jugador->id_usuario}
						<h4>{$usuario->username}</h4>
					{/if}
				{/foreach}
				<h5>Fichas: {$jugador->fichas_mesa}</h5>
				{if $jugador->id_usuario == $usuariologeado->id_usuario}
					<a href="pararse/{$usuariologeado->id_usuario}" class="btn btn-primary stretched-link">Pararse</a>
					{$estasentado=true}
				{/if}
				{$count=$count+1}
			</div>
		{/foreach}
		{if $count != $mesa->sillas}
		{$formidnum=1}
		{for $i=$count to $mesa->sillas-1}
			<div class="jugador col">
				<h4>Silla Vacia</h4>
				{if !$estasentado}
					<form id="form{$formidnum}" action="sentarse/{$mesa->id_mesa}/{$usuariologeado->id_usuario}" method="POST">
						<input type="range" onchange="cambiaLabel({$formidnum})" value="{$ciegas->ciega_grande}" name="checkin" min="{$ciegas->ciega_grande}" max="{$usuariologeado->fichas}" step="1">
						<label>{$ciegas->ciega_grande}</label>
						<button type="submit" class="btn btn-primary stretched-link">Sentarce</button>
						{$formidnum=$formidnum+1}
					</form>
				{/if}
			</div>
		{/for}
		{/if}
	</div>
	<div class="container-fluid row mesa">
		<div class="col">
			<h2>Ciega Chica/Grande: {$ciegas->ciega_chica}/{$ciegas->ciega_grande}</h2>
			<h3>Pozo: {$mesa->pozo}</h3>
		</div>
	</div>
</div>
<script src="../js/scriptmesa.js" type="text/javascript"></script>
{include file="footer.tpl"}
