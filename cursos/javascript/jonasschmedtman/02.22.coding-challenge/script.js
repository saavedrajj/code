year = new Date().getFullYear();

// Step 1
console.log('Step 1');
var years = [1965, 2008, 1992, 1940];
console.log(years);


// Step 2
console.log('Step 2');
var ages = [];
console.log(ages);


// Step 3
//var ages2 = []; 
console.log('Step 3');
for (i = 0; i < years.length; i++) {
	ages[i] = year - years[i];
}
console.log(ages);


// Step 4
console.log('Step 4');

for (i = 0; i < ages.length; i++) {
	//var age = year - ages2[i];
	//console.log(age);
	if (ages[i] >= 18) {
		console.log('Person ' + i + ' is ' + ages[i] + ' years old, and is of full age.');
	} else {
		console.log('Person ' + i + ' is ' + ages[i] + ' years old, and is NOT of full age.');		
	}	
}


// Step 5
console.log('Step 5');

function printFullAge(vectorAges) {
	// Step 5.2
	var ages52 = [];
	console.log(ages52);	

	// Step 5.3
	var ages53 = [];	 
	for (i = 0; i < ages1.length; i++) {
		ages53[i] = vectorAges[i];
	}
	console.log(ages53);
	
	// Step 5.4
	var ages54 = [];
	
	for (i = 0; i < ages53.length; i++) {

		if (year - ages53[i] >= 18) {
			ages54[i] = true;
		} else {
			ages54[i] = false;			
		}
	}
	return(ages54);
}

var a = printFullAge(ages2);
console.log(a); 


// Step 6
console.log('Step 6');
var vector1 = [1970, 2000, 2000];
var vector2 = [2000, 1970, 2010];

var full_1 = printFullAge(vector1);
var full_2 = printFullAge(vector2);
console.log(full_1);
console.log(full_2);