
//v1.0
/*
var john = {
	name: 'John',
	lastName: 'Smith',
	yearOfbirth: '1990',
	job: 'teacher',
	isMarried: false,
	family: ['Jim', 'Mark', 'Bob'],
	calculateAge: function() {
		return 2016 - this.yearOfbirth;
	}
};

console.log(john.family[2]);
console.log(john.calculateAge());

var age = john.calculateAge();
john.age = age;

console.log(john);
*/


//v2.0

var john = {
	name: 'John',
	lastName: 'Smith',
	yearOfbirth: '1990',
	job: 'teacher',
	isMarried: false,
	family: ['Jim', 'Mark', 'Bob'],
	calculateAge: function() {
		this.age = 2016 - this.yearOfbirth;
	}
};

john.calculateAge();
console.log(john);

var mike = {
	yearOfbirth: '1950',
	calculateAge: function() {
		this.age = 2016 - this.yearOfbirth;
	}
};

mike.calculateAge();
console.log(mike);
