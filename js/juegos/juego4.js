// === Variables ===

var bucle; // Guarda el bucle del juego
var velocidad = 5; // Desplazamiento de los objetos en pixeles 
var canvas = document.getElementById("canvas"); //Acceso al id canvas
var areaW = canvas.width; // Ancho del canvas
var areaH = canvas.height; // Alto del canvas
var ctx = canvas.getContext("2d"); // Contexto gráfico, donde se dibuja
var puntosj1 = 0; // Puntuación Jugador 1
var puntosj2 = 0;  // Puntuación Jugador 2
var tamanoPala = 75; // El tamaño de la pala
var superficie = areaH - tamanoPala; // La superficie del área de juego

// === Clases ===

class Base { // Clase para detectar los choques
    choque(obj){ 
        if(this.fondo < obj.y || this.y > obj.fondo || this.derecha < obj.x || this.x > obj.derecha){
            return false;
        } else {
            return true; // Hay contacto/colisión
        }
    }
}

class Bola extends Base {
    constructor(){
        super();
        this.t = 25; // Tamaño de la bola
        this.x = Math.floor(Math.random() * (areaW - this.t)); // floor redondea
        this.y = Math.floor(Math.random() * (areaH - this.t));
        this.xdir = velocidad; // Variables de dirección
        this.ydir = velocidad;
    }

    dibujar(){
        ctx.fillRect(this.x, this.y, this.t, this.t); // X, Y, Ancho, Alto
        ctx.fillStyle = '#000099';
    }

    choqueV(){ // Colisión vertical
        if(this.y <= 0 || this.y >= (areaH - this.t)){
            this.ydir = -this.ydir; // Cambia de dirección
        }
    }

    choqueH(){ // Colisión horizontal
        if(this.x <= 0){
            this.xdir = this.xdir // Cambia de dirección
            puntosj2++;
        }
        if(this.x >= (areaW - this.t)){
            this.xdir = this.xdir // Cambia de dirección
            puntosj1++;
        }
    }

    mover(){ // Se suma constantemente la posición de X e Y y se comprueban las colisiones
        this.x += this.xdir;
        this.y += this.ydir;
        this.choqueV();
        this.choqueH();
    }
}

class Pala extends Base {
    constructor(x){
        super();
        this.x = x;
        this.y = Math.floor(Math.random() * superficie);
        this.w = 25;
        this.h = tamanoPala;
        this.dir = 0;
    }

    dibujar() {
        ctx.fillRect(this.x, this.y, this.w, this.h);
    }

    mover(){
       this.y += this.dir;
       if(this.y <= 0){ // Cuando llegue a lo alto
           this.y = 0;
           this.dir = 0;
       } 
       if(this.y >= superficie){ // Cuando llegue abajo
           this.y = superficie;
           this.dir = 0;
       }
    }
}

// === Objetos ===

var bola = new Bola();
var jugador1 = new Pala(30); // Ese 30 es para separarlo de la pared izquierda
var jugador2 = new Pala(545); // 600-25-30 | 600 = Ancho del área de juego 


// === Funciones principales ===

function dibujar(){
    ctx.clearRect(0,0, areaW, areaH); // Borra lo anterior
    bola.dibujar(); // Llama a la función del objeto para dibujar la bola
    jugador1.dibujar();
    jugador2.dibujar();
}

function frame(){
    bola.mover();
    jugador1.mover();
    jugador2.mover();
    dibujar();
    bucle = requestAnimationFrame(frame); // Hace una solicitud al navegador para realizar la animación, por lo que programará el repintado de la pantalla

}

function start(){
    var modal = document.getElementById("modal");
    modal.style.display = "none"; // Al empezar oculta lo primero que se ve para iniciar el juego

    frame(); // Para iniciar al juego, llamamos a frame para que haga la funcion de animar
}