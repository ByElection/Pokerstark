{literal}
  <div class="puntaje">
    <p><b>Puntaje: </b>{{puntaje}}</p>
  <input type="range" value="1" min="1" max="5" step="1" class="puntaje"><button type="button" class="puntaje">Enviar</button>
  </div>
  <div id="chat">
    <ul>
      <button type="button" id="invertir">↑↓</button>
      <li v-for="mensaje in mensajes">
        <b>{{mensaje.username}}: </b>{{mensaje.mensaje}}
        <a v-if="admin===1" href="#" class="mensaje" v-bind:id="mensaje.id_mensaje">borrar</a>
      </li>
    </ul>
    <input type="text" class="mensaje" placeholder="mensaje"><button class="mensaje" type="button">←</button>
  </div>
{/literal}
