{if $esta}
  {include file="nav.tpl"}
{else}
  {include file="navinvitado.tpl"}
{/if}
<div class="container">
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Posicion</th>
        <th scope="col">Usuario</th>
        <th scope="col">Ganado</th>
      </tr>
    </thead>
    <tbody>
      {$count=1}
      {foreach from=$users item=user}
        <tr>
          <th scope="row">{$count}</th>
          <td>{$user->username}</td>
          <td>{$user->fichas}</td>
        </tr>
        {$count=$count+1}
      {/foreach}
    </tbody>
  </div>
