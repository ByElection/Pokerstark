{include file="nav.tpl"}
<div class="container">
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Mesa</th>
        <th scope="col">Ciegas</th>
        <th scope="col">Jugadores</th>
      </tr>
    </thead>
    <tbody>
      {foreach from=$mesas item=mesa}
        <tr>
          <th scope="row">{$mesa->id_mesa}</th>
		  {foreach from=$ciegas item=ciega}
			{if $mesa->id_ciegas == $ciega->id_ciegas}
				<td>{$ciega->ciega_chica}/{$ciega->ciega_grande}</td>
			{/if}
		  {/foreach}
		  {$count=0}
          {foreach from=$jugadores item=jugador}
			{if $jugador->id_mesa == $mesa->id_mesa}
				{$count = $count+1}
			{/if}
		  {/foreach}
          <td>{$count}/{$mesa->sillas}
			{if $count == $mesa->sillas}
				<button type="button" class="btn btn-primary" disabled>Entrar</button>
			{else}
				
				<a href="mesa/{$mesa->id_mesa}" class="btn btn-primary stretched-link">Entrar</a>
			{/if}
		   </td>
        </tr>
      {/foreach}
    </tbody>
  </div>
