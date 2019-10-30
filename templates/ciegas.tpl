{include file="nav.tpl"}
<div class="container-fluid">
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
          <td>{$ciega->ciega_chica}/{$ciega->ciega_grande}</td>
        </tr>
      {/foreach}
    </tbody>
  </table>
</div>
{include file="footer.tpl"}
