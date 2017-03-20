year = new Date().getFullYear();

// Step 1
console.log('Step 1');
var years = [2001, 1985, 1994, 2014, 1973];
console.log(years);


// Step 2
console.log('Step 2');
var ages = [];
console.log(ages);


// Step 3
console.log('Step 3');
for (i = 0; i < years.length; i++) {
	ages[i] = year - years[i];
}
console.log(ages);


// Step 4
console.log('Step 4');
for (i = 0; i < ages.length; i++) {
	if (ages[i] >= 18) {
		console.log('Person ' + (i + 1) + ' is ' + ages[i] + ' years old, and is of full age.');
	} else {
		console.log('Person ' + (i + 1) + ' is ' + ages[i] + ' years old, and is NOT of full age.');		
	}	
}


// Step 5
console.log('Step 5');

function printFullAge(years){
	var ages = [];
	var fullAges = [];

	for (i = 0; i < years.length; i++) {
		ages[i] = year - years[i];
	}

	for (i = 0; i < ages.length; i++) {
		if (ages[i] >= 18) {
			console.log('Person ' + (i + 1) + ' is ' + ages[i] + ' years old, and is of full age.');
			fullAges.push(true);
		} else {
			console.log('Person ' + (i + 1) + ' is ' + ages[i] + ' years old, and is NOT of full age.');		
			fullAges.push(false);	
		}	
	}
	return fullAges;
}
var a = printFullAge(ages);
console.log(a); 


// Step 6
console.log('Step 6');
var years = [2001, 1985, 1994, 2014, 1973];
var full_1 = printFullAge(years);

var years = [2001, 1985, 1994, 2014, 1973];
var full_2 = printFullAge([2012,1950, 1999]);
console.log(full_1);
console.log(full_2);
