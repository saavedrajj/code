// Step 1:
var arrayAgesTemp = [1965, 2008, 1992];
console.log(arrayAgesTemp);

// Step 2:
var arrayAges = [];
console.log(arrayAges);


// Step 3:
for (i = 0; i < arrayAgesTemp.length; i++) {
	console.log(arrayAgesTemp[i]);
	arrayAges[i] = arrayAgesTemp[i];
}
console.log(arrayAges);

// Step 4:
year = new Date().getFullYear();

for (i = 0; i < arrayAges.length; i++) {
	var age = year - arrayAges[i];
	if (age >= 18) {
		console.log('Full age: True' + '. Age: ' + age);
	}
}

// Step 5:
function printFullAge (ages) {
 return 2;
}

var a = printFullAge(arrayAgesTemp);
console.log(a);

// Step 6:
// var full_1 = printFullAge (arrayAgesTemp);
// var full_2 = printFullAge (arrayAgesTemp);