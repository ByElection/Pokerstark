{include file="header.tpl"}
<a class="nav-link" href="logout">Salir</a>
<div class="container-fluid">
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


          <a href="delet/{$mesa->id_mesa}" class="btn btn-primary stretched-link">Eliminar</a>
          <a href="mesa/{$mesa->id_mesa}" class="btn btn-primary stretched-link">Eliminar</a>
          <a href="mesa/{$mesa->id_mesa}" class="btn btn-primary stretched-link">Eliminar</a>

        </td>
      </tr>
      {/foreach}
    </tbody>
  </table>
  </div>
  <div class="conteiner">
    <div class="row">

  <form action="agregar" method="post">
    <input class="form-control" type="number" name="ciegas" max=4>
    <input class="form-control" type="number" name="pozo" max="10000">
    <input class="form-control"type="number" name="sillas"  max="9">
    <button class="btn btn-primary" type="submit" value="agregar">
  </form>
</div>
</div>

  {include file="footer.tpl"}
