// Function constructor
/*
var john = {
	name: 'John',
	yearOfBirth: 1990,
	job: 'teacher'
};

var Person = function(name, yearOfbirth, job) {
	this.name = name;
	this.yearOfBirth = yearOfbirth;
	this.job = job;
};

Person.prototype.calculateAge =
function() {
		console.log(2016 - this.yearOfBirth);
};

Person.prototype.lastName = 'Smith';

var john = new Person('John', 1990, 'teacher');
var jane = new Person('Jane', 1969, 'designer');
var mark = new Person('Jane', 1948, 'retired');

john.calculateAge();
jane.calculateAge();
mark.calculateAge();

console.log(john.lastName);
console.log(jane.lastName);
console.log(mark.lastName);
*/


/* Object.create */
var personProto = {
	calculateAge: function() {
		console.log(2016 - this.yearOfbirth);
	}
}

var john = Object.create(personProto);
john.name = 'John';
john.yearOfBirth = 1990;
john.job = 'teacher';

var jane = Object.create(personProto, {
	name: {value: 'Jane'},
	yearOfbirth: {value: 1969},
	job: {value: 'designer'}	
})