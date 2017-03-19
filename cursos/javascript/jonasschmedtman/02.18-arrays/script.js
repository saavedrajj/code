var names = ['John', 'Jane', 'Mark'];
var years = new Array(1990, 1969, 1948);

console.log(names[0]);
names[1] = 'Ben';
console.log(names);

var john = ['John', 'Smith', 1990, 'teacher', false];


john.push('blue');
john.unshift('Mr.');
john.pop();
john.shift();
console.log(john);

//alert(john.indexOf('Smith'));

if(john.indexOf('teacher') === -1) {
console.log('John is NOT a teacher.');
} 