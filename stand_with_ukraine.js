document.addEventListener('DOMContentLoaded', function() {
	let body = document.getElementsByTagName('body')[0];
	let div  = document.createElement('div');
	div.id = 'stand_with_ukraine_overlay';
	div.innerHTML = '<a href="https://war.ukraine.ua/">#StandWithUkraine</a>';
	document.body.insertBefore(div, body.firstChild);
});
