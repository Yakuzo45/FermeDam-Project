/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.scss in this case)
// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
var $ = require('jquery');

$(document).ready(function() {
    $('.js-scrollTo').on('click', function() { // Au clic sur un élément
        var page = $(this).attr('href'); // Page cible
        var speed = 750; // Durée de l'animation (en ms)
        $('html, body').animate( { scrollTop: $(page).offset().top }, speed );
        return false;
    });
});

$('#scrollTop').on('click', function () {
    $('html, body').animate( { scrollTop: $('#top').offset().top }, 750 );
    return false;
});