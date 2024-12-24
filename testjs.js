var x=1;
var y=20;
(function(x,y){
    console.log(x+y);
})(x,y)

var x = 1;
var y = 20;

(function(x, y) {
    console.log(x + y);
})(x, y);

var nombre = "Juan";
var edad = 30;

(function(nombre, edad) {
    console.log("Nombre: " + nombre + ", Edad: " + edad);
})(nombre, edad);

// Fuera de la IIFE, las variables globales no se ven afectadas
console.log("Fuera de la IIFE - Nombre: " + nombre + ", Edad: " + edad);
