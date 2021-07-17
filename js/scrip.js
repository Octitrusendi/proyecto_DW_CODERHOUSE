//Ejecutar función en el evento click
document.getElementById("btn_open").addEventListener("click", open_close_menu);

//Declaramos variables
var side_menu = document.getElementById("menu_side");
var btn_open = document.getElementById("btn_open");

//Evento para mostrar y ocultar menú
    function open_close_menu(){
        side_menu.classList.toggle("menu__side_move");
    }


    window.addEventListener("resize", function(){
        if (window.innerWidth > 760){

            side_menu.classList.remove("menu__side_move");
        }
      

    });