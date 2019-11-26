{literal}
  <div id="chat">
    <ul>
      <button type="button" id="invertir">↑↓</button>
      <li v-for="mensaje in mensajes">
        <b>{{mensaje.id_usuario}}: </b>{{mensaje.mensaje}}
        <a href="#" class="mensaje" v-bind:id="mensaje.id_mensaje">borrar</a>
      </li>
    </ul>
    <input type="text" class="mensaje" placeholder="mensaje"><button class="mensaje" type="button">←</button>
  </div>
{/literal}
