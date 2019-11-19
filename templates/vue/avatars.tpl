<div class="row avatars">
  <div class="row">
    <a v-for="avatar in avatars" href="#">
      <img v-bind:src="avatar.img" class="avatar">
    </a>
  </div>
  {if $admin}
    <div class="row">
      <input type="file" name="file">
      <button type="button" class="btn btn-primary" name="button">Agregar Avatar</button>
    </div>
  {/if}
</div>
