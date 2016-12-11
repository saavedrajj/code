var friend01 = 'John';
var friend02 = 'Mark';
var friend03 = 'Billy';

var age01 = 22;
var age02 = 22;
var age03 = 22;

var height01 = 164;
var height02 = 164;
var height03 = 164;

score01 = height01 + (age01 * 5);
console.log('score01 (' + friend01 + '): ' + score01);
score02 = height02 + (age02 * 5);
console.log('score02 (' + friend02 + '): ' + score02);
score03 = height03 + (age03 * 5);
console.log('score03 (' + friend03 + '): ' + score03);


if (score01 > score02) {
	console.log(friend01 + ' wins! score:' + score01);
} else if (score01 < score02 ) {
	console.log(friend02 + ' wins! score:' + score02);
} else if (score01 === score02 ) {
	console.log('Draw!');
}

/*************/

if (score01 > score02 && score03) {
	console.log(friend01 + ' wins!');
} else if (score02 > score01 && score03) {
	console.log(friend02 + ' wins!');
} else if (score03 > score01 && score02) {
	console.log(friend03 + ' wins!');
} else {
	console.log('It\'s a Draw!!');	
}