/* global swu_options */
var div  = document.createElement('div');
div.id = 'stand_with_ukraine_overlay';
div.innerHTML = '<a title="' + swu_options.text + '" href="' + swu_options.url + '">' + swu_options.hashtag + '</a>';
document.body.insertAdjacentElement('afterbegin', div);
