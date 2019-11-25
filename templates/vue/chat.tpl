{literal}
  <div id="chat">
    <ul>
      <li v-for="mensaje in mensajes"><b>{{mensaje.id_usuario}}: </b>{{mensaje.mensaje}}</li>
    </ul>
    <input type="text" class="mensaje" placeholder="mensaje"><button class="mensaje" type="button">←</button>
  </div>
{/literal}
