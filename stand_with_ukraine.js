document.addEventListener('DOMContentLoaded', function() {
	let body = document.getElementsByTagName('body')[0];
	let div  = document.createElement('div');
	div.id = 'stand_with_ukraine_overlay';
	div.innerHTML = '<a href="' + swu_options.url + '">' + swu_options.text + '</a>';
	document.body.insertBefore(div, body.firstChild);
});
