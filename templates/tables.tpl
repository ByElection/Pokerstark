{include file="nav.tpl"}
<div class="container">
  <form action="tables" method="post">
    <label>Filtar por Ciegas</label>
    <select onchange="this.form.submit()" name="filtraciegas">
      {if $filtraciegas==null}
        <option value="todas" selected>TODAS</option>
      {else}
        <option value="todas">TODAS</option>
      {/if}
      {foreach from=$ciegas item=ciega}
        {if $filtraciegas!=NULL && $ciega->id_ciegas == $filtraciegas->id_ciegas}
          <option value="{$ciega->id_ciegas}" selected>{$ciega->ciega_chica}/{$ciega->ciega_grande}</option>
        {else}
          <option value="{$ciega->id_ciegas}">{$ciega->ciega_chica}/{$ciega->ciega_grande}</option>
        {/if}
      {/foreach}
  </form>
  </select>
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
          {if $filtraciegas!=NULL && $filtraciegas->id_ciegas == $mesa->id_ciegas}
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
          {elseif $filtraciegas==NULL}
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
          {/if}
      {/foreach}
    </tbody>
  </div>
