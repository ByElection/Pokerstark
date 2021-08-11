<!DOCTYPE html>
<html lang="en">
<head>
    <base href='{$basehref}'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <title>PokerStark - {$titulo}</title>
</head>
<body class="">
  {if $admin=1}
    <div class="soyadmin" id="1"></div>
  {else}
    <div class="soyadmin" id="0"></div>
  {/if}
    <div class="fantasmin" id="{$usuariologeado->id_usuario}"></div>
  <header>
    <div class="">
      <img class="full" src="img/PokerStark.png" alt="">
    </div>
  </header>
