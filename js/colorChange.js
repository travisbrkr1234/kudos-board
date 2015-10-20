document.addEventListener('DOMContentLoaded', function() {
	var options = ['125079',  '51A3DC',  '79BE37',  'A05D8E',  '646771']

	backgroundHex = options[Math.floor(Math.random() * options.length)];
	document.querySelector('body').style.background = '#' + backgroundHex;
});
