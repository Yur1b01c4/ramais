<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dicas Ramais</title>
    <link rel="shortcut icon" href="./img/logo-nardini.png" type="image/x-icon">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
</head>
<body>
    <section>
      <nav>
            <button type="button" id="nav-mode_switch">
              <i class="fas fa-sun"></i>
              <i class="fas fa-moon"></i>
            </button>
      </nav>
    </section>

  <a class="link" href="./index.php">
    <button class="botao">
      < Voltar
      <svg class="svg" viewBox="0 0 448 512">
        </svg>
    </button>
  </a>
 
    <details class="collapse">
        <summary class="title">Ligações entre unidades	&#127981;</summary>
        <div class="description">
            <h3>Vista Alegre</h3>
                <p>Para discar para <b>unidade de Aporé </b> coloque o digito <b> 13 </b> antes do Ramal.</p>
            <hr>
            <h3>Aporé</h3>
                <p>Para discar para <b>unidade de Vista alegre </b> coloque o digito <b> 12 </b> antes do Ramal<p>
        </div>
    </details>

    <details class="collapse">
        <summary class="title">Como fazer a busca   &#128270;</summary>
        <div class="description">
            <p>Para buscar as informações do contato desejado basta digitar na <b>barra de pesquisa</b> o <b>nome</b>, <b>ramal</b>, <b>área</b> ou <b>unidade</b> do contato desejado.</p>
        <hr>
            <p>Pode ser pesquisado <b>um campo</b> por vez, exemplo: </p>
        <img src="./img/exemplo.png" alt="Exemplo de pesquisa">
        </div>
    </details>

    <details class="collapse">
        <summary class="title">Campo do Email   &#9993;&#65039;</summary>
        <div class="description">
            <p>Ao passar o mouse por cima do email de algum usuario, nota-se que ele mudará de cor</p>
        <hr>
        <img src="./img/exemplo_email.png" alt="Exemplo de email">
            <p>Ao clicar, você será redirecionado para o Teams, onde estará com a conversa daquele usuario aberta.</p>
        <hr>
            <p>Caso não abra na conversa do usuario, o email pode estar errado na lista, relate aos responsaveis do site.</p>
        </div>
    </details>

    <details class="collapse">
        <summary class="title">Problemas/duvidas/sugestões&#9888;&#65039;</summary>
        <div class="description">
            <p>Caso queira ser adicionado(a) na Lista, tenha alguma dúvida ou algum problema com o site e queira relatar, entre em contato com:</p>
        <hr>
            <p>&#128589;   <a class='subli' target='_blank' href="https://teams.microsoft.com/l/chat/0/0?users=thelma.rozani@nardini.ind.br">Thelma rozani</a>
        <hr>
        &#128589;&#8205;&#9794;&#65039;  <a class='subli' target='_blank' href="https://teams.microsoft.com/l/chat/0/0?users=yuri.santana@nardini.ind.br">Yuri santana</a></p>
        </div>
    </details>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const body = document.body;
    const navModeSwitch = document.getElementById('nav-mode_switch');

    navModeSwitch.addEventListener('click', () => {
      body.classList.toggle('dark');
      const isDarkMode = body.classList.contains('dark');
      localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
    });

    if (localStorage.getItem('theme') === 'dark') {
      body.classList.add('dark');
    }
  });
</script>

</body>
</html>

<style>

* {
  transition: all 0.1.5s ease;
}
    :root {
  --space-xxs: 4px;
  --space-xs: 8px;
  --space-sm: 16px;
  --space: 24px; 
  --space-md: 32px;
  --space-lg: 48px;
  --space-xlg: 64px;

  --screen-sm: 768px;

  --gray: #555;
  --gray-dark: rgb(66, 66, 66);
  --gray-darker: #111;
  --gray-light: #f1f1f1;
  --gray-lighter: #fafafa;
  --blue: #187888;
  --yellow: #e6af05;
  --white: #fff;
  --black: #000;

  --brand-primary: var(--blue);
  --background: var(--white);
  --text-color: var(--gray-darker);
}

body {
  background-color: var(--background);
  color: var(--text-color);
  font-family: "Open Sans", sans-serif;
  font-size: 20px;
}

details {
  summary {
    list-style: none;
  }
}

.collapse {
  border: solid 1px var(--gray-dark);
  border-radius: 30px;
  box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.25);
  margin-left: auto;
  margin-right: auto;
  max-width: 1000px;
  transition: background-color 0.25s;
  will-change: background-color;

  &:first-child {
    margin-top: var(--space);
  }

  &:not(:last-child) {
    margin-bottom: var(--space-sm);
  }
}

.title {
  cursor: pointer;
  font-weight: 550;
  padding: var(--space-sm);
  position: relative;

  &:after {
    position: absolute;
    right: var(--space-sm);
    transform: translatey(-50%);
    top: 50%;
  }
}

.description {
  border-top: var(--gray-dark) solid 1px;
  font-size: 18px;
  line-height: 15px;
  padding: var(--space-sm);
}

.subli{
  text-decoration: none;
  color: #068d53;
}

.subli:hover{
  color: #068d53;
  text-decoration: underline;
}
  .botao {
  width: 100px;
  height: 50px;
  background-color: rgb(255, 69, 69);
  border-radius: 10px;
  color: white;
  border: none;
  cursor: pointer;
}

.svg {
  width: 5px;
  text-decoration: none;
}

.svg path {
  fill: rgb(0, 206, 62);
}

.botao:hover {
  background-color: rgb(77, 77, 77);
  transition-duration: .2s;
}

.link{
  top: 20px;
  left: 0px;
  position: sticky;
}

/* Css modo dark */
/* Css modo dark */
/* Css modo dark */

.fa-sun{
  color: #FF8801;
}

.fa-sun:hover{
  color: #eb7d00;
}

.fa-moon{
  color: #FFCC00;
}


.fa-moon:hover{
  color: #e9ba00;
}

.sino{
  cursor: pointer;
}

#nav-mode_switch {
  background: transparent;
  outline: none;
  border: none;
  cursor: pointer;
  position: absolute;
  right: 5px;
  margin-top: 5px;
  margin-right: 5px;
  font-size: 28px;
} 

body.dark .border-dark {
  border-color: #eee !important;
}

body.dark .table-bordered>:not(caption)>*>* {
  border-width: 0 1px;
  color: #eee;
}

body.dark #nav-mode_switch .fa-sun {
  display: none;
}

body.dark #nav-mode_switch .fa-moon {
  display: block;
}

#nav-mode_switch .fa-moon {
  display: none;
}

.btn-success-primary {
  background-color:  #05C270 !important;
  color: #fff !important;
}

.btn-success-primary:hover {
  background-color:  #068d53 !important;
  color: #fff !important;
}

.btn-outline-success-primary{
  border-color:  #05C270 !important;
  color: #eee !important;
}

.btn-outline-success-primary:hover{
  border-color:  #068d53 !important;
  color: #fff !important;
}

body.dark {
  background-color: var(--gray-darker);
  color: var(--white);
}

body.dark .collapse {
  border: solid 1px var(--gray-lighter);
  box-shadow: 1px 1px 3px rgba(255, 255, 255, 0.25);
}

body.dark .description {
  border-top: var(--gray-lighter) solid 1px;
}

</style>