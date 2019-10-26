{include file="header.tpl"}
<div id="mesa">
	{foreach from=$mesa item=jugador}

		<div class="jugador">
			{$jugador->fichas_mesa}
		</div>
	{/foreach}
</div>