<div class="row avatars">
  <div v-for="avatar in avatars" class="row">
    <a class="avatar" href="#" v-bind:id="avatar.id_avatar">
      <img v-bind:src="avatar.img" class="avatar">
    </a>
    {if $admin}
    <button type="button" class="deletavatar" v-bind:id="avatar.id_avatar">Borrar Avatar</button>
  </div>
    <div class="row">
      <form method="post" id="addavatar" enctype="multipart/form-data">
        <input type="file" name="avatar" accept="image/png, .jpeg, .jpg">
        <button type="button" class="btn btn-primary" id="addavatar">Agregar Avatar</button>
      </form>
    </div>
  {/if}
</div>
