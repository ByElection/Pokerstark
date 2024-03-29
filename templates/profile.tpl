{include file="nav.tpl"}
<div class="container" style="margin-top: 64px;">
  <div class="row">
    <div class="col-6">
      <div class="row" id="useravatar">
        <img class="avatar" v-bind:src="avatar.img" alt="foto de perfil">
      </div>
      <div class="row">
        <button type="button" class="btn btn-primary avatars">Cambiar foto</button>
      </div>
      {include file="vue/avatars.tpl"}
    </div>
    <div class="col-6">
        <h4>Nombre: {$nombre}</h4>
        <h4>Pais: {$pais}</h4>
        <h4>Fichas: {$fichas} <a href="profile/{$fichas+1000}" class="btn btn-primary stretched-link">+</a></h4>
    </div>
  </div>
  <script src="./js/script.js" charset="utf-8"></script>
  <script src="./js/scriptperfil.js" charset="utf-8"></script>
</div>
