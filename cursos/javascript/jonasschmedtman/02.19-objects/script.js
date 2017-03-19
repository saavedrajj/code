var john = {
	name: 'John',
	lastName: 'Smith',
	yearOfbirth: '1990',
	job: 'teacher',
	isMarried: false
}

console.log(john.lastName);
console.log(john['lastName']);

var xyz = 'job';
console.log(john[xyz]);

john.lastName = 'Miller';
john['job'] = 'programmer';

console.log(john);



var jane = new Object();
jane.name = 'Jane';
jane.lastName = 'Smith';
jane['yearOfbirth'] = 1069;
jane['job'] = 'retired';
jane['married'] = true;

console.log(jane);