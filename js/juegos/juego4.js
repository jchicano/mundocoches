// == Variables globales ==
var velocidad = 80; // Velocidad de la serpiente
var tamano = 10; // El tamaño de la serpiente y la comida
var puntuacion = 0;

// == Clases ==

class objeto {
	constructor() {
		this.tamano = tamano;
	}

	choque(obj) { // Se calcula si hay contacto o no
		var difx = Math.abs(this.x - obj.x); // Se calcula la diferencia entre las posiciones X e Y
		var dify = Math.abs(this.y - obj.y); // abs saca el valor absoluto
		if(difx >= 0 && difx < tamano && dify >= 0 && dify < tamano) {
			return true;
		} else {
			return false;
		}
	}
}

class Cola extends objeto {
	constructor(x,y) {
		super();
		this.x = x;
		this.y = y;
		this.siguiente = null;
	}

	dibujar(ctx) {
		if(this.siguiente != null){
			this.siguiente.dibujar(ctx);
		}
		ctx.fillStyle = "#0000FF";
		ctx.fillRect(this.x, this.y, this.tamano, this.tamano);
	}

	setxy(x,y) { // Actualiza los X e Y
		if(this.siguiente != null) {
			this.siguiente.setxy(this.x, this.y); // Esto hace que haga el efecto de serpiente
		}
		this.x = x;
		this.y = y;
	}

	meter() {
		if(this.siguiente == null) {
			this.siguiente = new Cola(this.x, this.y);
		} else {
			this.siguiente.meter();
		}
	}

	verSiguiente() {
		return this.siguiente;
	}
}

class Comida extends objeto {
	constructor() {
		super();
		this.x = this.generar();
		this.y = this.generar();
	}
	generar() { // Función que se usa para ubicar la comida aleatoriamente
		var num = (Math.floor(Math.random() * 59))*10;
		return num;
	}
	colocar() { // Función que se usa para darle una nueva posición cuando "la serpiente coma"
		this.x = this.generar();
		this.y = this.generar();
	}
	dibujar(ctx) {
		ctx.fillStyle = "#FF0000";
		ctx.fillRect(this.x, this.y, this.tamano, this.tamano);
	}
}

// == Juego ==
var cabeza = new Cola(20,20);
var comida = new Comida();
var ejex = true; // Estos booleanos son para que no podamos cambiar de dirección en el mismo eje
var ejey = true;
var xdir = 0;
var ydir = 0;

function movimiento() {
	var nx = cabeza.x+xdir;
	var ny = cabeza.y+ydir;
	cabeza.setxy(nx,ny);
}

function control(event) {
    var cod = event.keyCode;
	if(ejex) {
		if(cod == 38) { // Flecha arriba
			ydir = -tamano;
			xdir = 0;
			ejex = false;
			ejey = true;
		}
		if(cod == 40) { // Flecha abajo
			ydir = tamano;
			xdir = 0;
			ejex = false;
			ejey = true;
		}
	}
	if(ejey) {
		if(cod == 37) { // Flecha derecha
			ydir = 0;
			xdir = -tamano;
			ejey = false;
			ejex = true;
		}
		if(cod == 39) { // Flecha izquierda
			ydir = 0;
			xdir = tamano;
			ejey = false;
			ejex = true;
		}
	}
}

function findeJuego() {
	// Se reestablece todo el juego para prepararlo para la siguiente partida
	xdir = 0;
	ydir = 0;
	ejex = true;
	ejey = true;
	cabeza = new Cola(20,20);
	comida = new Comida();
	document.getElementById("score").innerHTML = 0;
	alert("|| Game Over || Haga click en 'Aceptar' para volver a empezar ||");
}

function choquepared() {
	if(cabeza.x < 0 || cabeza.x > 590 || cabeza.y < 0 || cabeza.y > 590) { // 590 es el ancho y alto menos los 10 de la serpiente
		findeJuego();
	}
}

function choquecuerpo() {
	var temp = null;
	try {
		temp = cabeza.verSiguiente().verSiguiente(); // Al principio no podremos acceder a esto porque no hay siguiente (null) por eso el try
	} catch(err) {
		temp = null;
	}
	while(temp != null) {
		if(cabeza.choque(temp)) {
			findeJuego(); // Game Over
		} else {
			temp = temp.verSiguiente();
		}
	}
}

function dibujar() {
	var canvas = document.getElementById("canvas"); // Accedemos al canvas
	var ctx = canvas.getContext("2d"); // Contexto gráfico del canvas
	ctx.clearRect(0,0, canvas.width, canvas.height); // (X, Y, Ancho, Alto) Limpiamos la pantalla haciendo un cuadro con el tamaño del canvas
	// Se dibuja la serpiente y la comida
	cabeza.dibujar(ctx);
	comida.dibujar(ctx);
}

function main() {
	choquecuerpo();
	choquepared();
	dibujar();
	movimiento();
	if(cabeza.choque(comida)) { // Si la serpiente 'choca' con la comida
		document.getElementById("score").innerHTML++;
		comida.colocar(); // Se genera otra comida
		cabeza.meter(); // La serpiente aumenta de tamaño
	}
}

setInterval("main()", velocidad); // Bucle que repetirá el metodo main cada 80 (variable velocidad) milisegundos