{literal}
  <div v-for="i in mesa.sillas">
    {{mesa.sillas}}
    <div v-for="jugador in jugadores">
      {{usuariologeado}}
      <div v-if="i == jugadores[i].silla" v-bind:id="i" class="silla jugador col">
          <h4>{{jugador.username}}</h4>
          <h5>Fichas: {{jugador.fichas_mesa}}</h5>
          <button v-if="jugador.id_usuario === usuariologeado.id_usuario" id="pararse" class="btn btn-primary stretched-link">Pararse</button>
      </div>
      <div v-else v-bind:id="i" class="sillavacia jugador col">
          <h4>Silla {{i}} Vacia</h4>
  					<input type="range" v-bind:id="i" v-bind:value="mesa.ciegas.ciega_grande" name="checkin" v-bind:min="mesa.ciegas.ciega_grande" v-bind:max="usuariologeado.fichas" step="1">
  					<label>{{mesa.ciegas.ciega_grande}}</label>
  					<button type="button" class="sentarsebtn btn-primary stretched-link">Sentarce</button>
      </div>
    </div>
  </div>
{/literal}
