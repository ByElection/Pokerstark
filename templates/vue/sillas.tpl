
  <div v-for="i in mesa.sillas" v-bind:id="i" class="jugador col">
    <div v-for="jugador in jugadores">
      <div v-if="i === jugador.id_usuario">
        {literal}
          <h4>{{jugador.username}}</h4>
          <h5>Fichas: {{jugador.fichas_mesa}}</h5>
          <button v-if="jugador.id_usuario===usuariologeado" id="pararse" class="btn btn-primary stretched-link">Pararse</button>
        {/literal}
        {$estasentado=true}
      </div>
      <div v-else>
        {literal}
          <h4>Silla {{i}} Vacia</h4>
        {/literal}
        {if !$estasentado}
          {literal}
  					<input type="range" v-bind:id="i" onchange="cambiaLabel({{i}})" v-bind:value="mesa.ciegas.ciega_grande" name="checkin" v-bind:min="mesa.ciegas.ciega_grande" v-bind:max="usuariologeado.fichas" step="1">
  					<label>{{mesa.ciegas.ciega_grande}}</label>
  					<button type="button" class="sentarsebtn btn-primary stretched-link">Sentarce</button>
          {/literal}
        {/if}
      </div>
    </div>
  </div>
