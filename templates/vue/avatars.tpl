<div class="row avatars">
  <div class="row">
    <a v-for="avatar in avatars" class="avatar" href="#" v-bind:id="avatar.id_avatar">
      <img v-bind:src="avatar.img" class="avatar">
    </a>
  </div>
  {if $admin}
    <div class="row">
      <form action="profile" method="post" enctype="multipart/form-data">
        <input type="file" name="avatar">
        <button type="submit" class="btn btn-primary" name="button">Agregar Avatar</button>
      </form>
    </div>
  {/if}
</div>
