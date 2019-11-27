{include file="nav.tpl"}
<div class="container">
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Usuario</th>
        <th scope="col">Admin</th>
        <th scope="col">Eliminar</th>
      </tr>
    </thead>
    <tbody>
      {foreach from=$users item=user}
        <tr>
          <th scope="row">{$user->username}</th>
          <td>
            {if $user->admin==1}
              <a href="setadmin/{$user->username}" class="setadmin">Sacar Admin</a>
            {else}
              <a href="setadmin/{$user->username}" class="setadmin">Dar Admin</a>
            {/if}
          </td>
          <td><a href="deletuser/{$user->username}" id="deletuser">Borrar usuario</a></td>
        </tr>
      {/foreach}
    </tbody>
  </div>
