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
          <td>{$mesa->ciega_chica}/{$mesa->ciega_grande}</td>
          {if $mesa->silla1 != null}
            {$count=$count+1}
          {elseif $mesa->silla2 != null}
            {$count=$count+1}
          {elseif $mesa->silla3 != null}
            {$count=$count+1}
          {elseif $mesa->silla4 != null}
          { $count=$count+1}
          {elseif $mesa->silla5 != null}
            {$count=$count+1}
          {elseif $mesa->silla6 != null}
            {$count=$count+1}
          {elseif $mesa->silla7 != null}
            {$count=$count+1}
          {elseif $mesa->silla8 != null}
            {$count=$count+1}
          {elseif $mesa->silla9 != null}
            {$count=$count+1}
          {/if}
          <td>{$count}/9<button type="button" class="btn btn-primary">Entrar</button></td>
          {$count=0}
        </tr>
      {/foreach}
    </tbody>
  </div>
