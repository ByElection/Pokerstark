{include file="nav.tpl"}
<div class="container-fluid">
  {if $editciega!=null}
  <form id="myform-ciegas" action="editciega/{$editciega->id_ciegas}" method="post">
  {/if}
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
                <td>
                    {if $editciega != null && $editciega->id_ciegas == $ciega->id_ciegas}
                      <input form="myform-ciegas" type="number" name="ciega_chica" min="10" value="{$ciega->ciega_chica}" class="ciegagrandeedit" onchange="ciegagrandeedit()">/<span class="ciegagrandeedit">{$ciega->ciega_chica*2}</span>
                      <button form="myform-ciegas" type="submit" class="btn btn-primary stretched-link">Editar</button>
                    {else}
                      {$ciega->ciega_chica}/{$ciega->ciega_grande}
                      <a href="editciega/{$ciega->id_ciegas}" class="btn btn-primary stretched-link">Editar</a>
                      <a href="deletciega/{$ciega->id_ciegas}" class="btn btn-primary stretched-link">Eliminar</a>
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
      <form action="agregarciega" method="post">
        Ciega chica: <input class="ciegagrandeadd" type="number" name="ciega_chica" min="10" onchange="ciegagrandeadd()">
        Ciega grande: <span class="ciegagrandeadd">0</span>
        <button type="submit" class="btn btn-primary stretched-link">AGREGAR CIEGA</button>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript" src="./js/scriptciegas.js"></script>
<script type="text/javascript" src="../js/scriptciegas.js"></script>
{include file="footer.tpl"}
