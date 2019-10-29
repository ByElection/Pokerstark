{include file="navadmin.tpl"}
<div class="container-fluid">
  <form id="myform-ciegas" action="editciega/{$editciega->id_ciegas}" method="post">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Ciega</th>
          <th scope="col">Ciega chica/Ciega grande</th>
        </tr>
      </thead>
      <tbody>
        {foreach from=$ciegas item=ciega}
          <tr>
            <th scope="row">{$ciega->id_ciegas}</th>
              {if $editciega != null && $editciega->id_ciegas == $ciega->id_ciegas}
                <td>
                  <input type="number" name="ciega_chica" min="10" value="{$ciega->id_ciegas}">/{$ciega_chica * 2}
                </td>
                  {/if}
                  <td>
                    <a href="deletciega/{$ciega->id_ciegas}" class="btn btn-primary stretched-link">Eliminar</a>
                    {if $editciega != null && $editciega->id_ciegas == $ciega->id_ciegas}
                      <button form="myform-ciegas" type="submit" class="btn btn-primary stretched-link">Editar</button>
                    {else}
                      <a href="editciega/{$ciega->id_ciegas}" class="btn btn-primary stretched-link">Editar</a>
                    {/if}
                  </td>
          </tr>
        {/foreach}}
      </tbody>
    </table>
  </form>
</div>
<div class="conteiner">
  <div class="row">
    <div class="col-2">
      <form action="agregarciega" method="post">
        Ciega chica: <input type="number" name="ciega_chica" min="10">
        Ciega grande: <label id='ciegagrande'>JAVASCRIP</label>
      </form>
    </div>
  </div>
</div>
{include file="footer.tpl"}
