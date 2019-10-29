{include file="navadmin.tpl"}
<a class="nav-link" href="logout">Salir</a>
<div class="container-fluid">
  <form id="myform" action="edit/{$editmesa->id_mesa}" method="POST">
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
          {if $editmesa != null && $editmesa->id_mesa == $mesa->id_mesa}
          <td>
              <select name="ciegas" form="myform">
                {foreach from=$ciegas item=ciega}
                  {if $mesa->id_ciegas==$editmesa->id_ciegas}
                    <option value="{$ciega->id_ciegas}" selected>{$ciega->ciega_chica}/{$ciega->ciega_grande}</option>
                  {else}
                    <option value="{$ciega->id_ciegas}">{$ciega->ciega_chica}/{$ciega->ciega_grande}</option>
                  {/if}
                {/foreach}
              </select>
          </td>
            {$count=0}
            {foreach from=$jugadores item=jugador}
              {if $jugador->id_mesa == $mesa->id_mesa}
                {$count = $count+1}
              {/if}
            {/foreach}
            <td>{$count}/<input type="number" name="sillas" min="{$count}" value="{$mesa->sillas}">
          {else}
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
          {/if}
                <a href="delet/{$mesa->id_mesa}" class="btn btn-primary stretched-link">Eliminar</a>
                {if $editmesa != null && $editmesa->id_mesa == $mesa->id_mesa}
                  <button form="myform" type="submit" class="btn btn-primary stretched-link">Editar</button>
                {else}
                  <a href="edit/{$mesa->id_mesa}" class="btn btn-primary stretched-link">Editar</a>
                {/if}
              </td>
          </tr>
          {/foreach}
        </tbody>
      </table>
    </form>
    </div>
    <div class="conteiner">
      <div class="row">
        <div class="col-2">

          <form action="agregar" method="post">
            Ciegas: <select class="" name="ciegas">
                      {foreach from=$ciegas item=ciega}
                          <option value="{$ciega->id_ciegas}">{$ciega->ciega_chica}/{$ciega->ciega_grande}</option>
                      {/foreach}
                    </select>
            Sillas: <input class="form-control"type="number" name="sillas"  max="9">
            <button class="btn btn-primary" type="submit" value="agregar">AGREGAR</button>
          </form>
        </div>
      </div>
    </div>

      {include file="footer.tpl"}
