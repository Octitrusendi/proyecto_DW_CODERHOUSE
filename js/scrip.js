

window.onscroll = function(){
    scroll = document.documentElement.scrollTop;

    div = document.getElementById("nav");

    if (scroll > 20){
        div.classList.add('encabezado__style-scroll');
    }else if (scroll < 20){
        div.classList.remove('encabezado__style-scroll');
    }
    
    scroll = document.documentElement.scrollTop;

    div = document.getElementById("volverArriba");

    if (scroll > 200){
        div.classList.add('pieDePagina__icon');
    }else if (scroll < 200){
        div.classList.remove('pieDePagina__icon');
    }

}


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

    const typed = new Typed('.typed', {
        strings: [
        
        ],
    
        stringsElement: '#cadenas-texto', // ID del elemento que contiene cadenas de texto a mostrar.
        typeSpeed: 75, // Velocidad en mlisegundos para poner una letra,
        startDelay: 300, // Tiempo de retraso en iniciar la animacion. Aplica tambien cuando termina y vuelve a iniciar,
        backSpeed: 75, // Velocidad en milisegundos para borrrar una letra,
        smartBackspace: true, // Eliminar solamente las palabras que sean nuevas en una cadena de texto.
        shuffle: false, // Alterar el orden en el que escribe las palabras.
        backDelay: 1500, // Tiempo de espera despues de que termina de escribir una palabra.
        loop: true, // Repetir el array de strings
        loopCount: 1, // Cantidad de veces a repetir el array.  false = infinite
        showCursor: true, // Mostrar cursor palpitanto
        cursorChar: '', // Caracter para el cursor
        contentType: 'html', // 'html' o 'null' para texto sin formato
    });
    
    const typed2 = new Typed('.typed2', {
        strings: [
            '<i class="typed__ciudad">Marcos Juárez</i>',
            '<i class="typed__ciudad">General Roca</i>'
        ],
    
        //stringsElement: '#cadenas-texto', // ID del elemento que contiene cadenas de texto a mostrar.
        typeSpeed: 75, // Velocidad en mlisegundos para poner una letra,
        startDelay: 300, // Tiempo de retraso en iniciar la animacion. Aplica tambien cuando termina y vuelve a iniciar,
        backSpeed: 75, // Velocidad en milisegundos para borrrar una letra,
        smartBackspace: true, // Eliminar solamente las palabras que sean nuevas en una cadena de texto.
        shuffle: false, // Alterar el orden en el que escribe las palabras.
        backDelay: 1500, // Tiempo de espera despues de que termina de escribir una palabra.
        loop: true, // Repetir el array de strings
        loopCount: false, // Cantidad de veces a repetir el array.  false = infinite
        showCursor: true, // Mostrar cursor palpitanto
        cursorChar: '|', // Caracter para el cursor
        contentType: 'html', // 'html' o 'null' para texto sin formato
    });

