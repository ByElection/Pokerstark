{include file="navinvitado.tpl"}
<div class="conteiner-fluid">
  <div class="row">
    <div class="col-4">
    </div>
    <div class="col-4">

      <form action="login" method="POST">
        <div class="form-group">
          <input name="username" type="text" class="form-control" placeholder="Usuario">
        </div>
        <div class="form-group">
          <input name="password" type="password" class="form-control" placeholder="Contraseña">
          {if $error!=null && $error[':error'] == "userpass"}
            <small class="form-text text-muted">USUARIO Y/O CONTRASEÑA INCORRECTA</small>
          {/if}
        </div>
        <div class="row">
          <div class="col-3">
            <button type="submit" value="login" class="btn btn-primary">Entrar</button>
          </div>
          <div class="col-6">
          </div>
        </div>
      </form>
    </div>
    <div class="col-4">
    </div>
  </div>
</div>
{include file ="footer.tpl"}
