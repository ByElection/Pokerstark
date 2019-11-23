<div v-for="n in {$mesa->sillas}" class="silla col">
  <span v-for="jugador in jugadores">
    <span v-if="jugador.silla === n">
      <h4></h4>
    </span>
    <span v-else>
      <h4>Silla Vacia</h4>
    </span>
  </span>
</div>
