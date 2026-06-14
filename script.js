function Menu() {

  var menu = document.getElementById("menuvert");

  if (menu.style.display === "none") {
      // torna o menu visível
      menu.style.display = "block";
  } else {
      // oculta o menu
      menu.style.display = "none"; 
  }
}

//<button class="botao-01" onclick="Menu()">&#9776</button> COLOCAR NA PAGINA INICIAL DEPOIS 