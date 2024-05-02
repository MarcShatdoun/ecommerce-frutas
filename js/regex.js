let nombre = "Maria Jose"



const pattern = /^[a-zA-ZáéíóúàèìòùüñÑçÇ\s]+$/

console.log(nombre.match(pattern));
console.log(nombre.search(pattern));
console.log(nombre.replace(pattern, "A"));
console.log(pattern.test(nombre));  