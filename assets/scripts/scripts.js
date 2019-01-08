import $ from 'jquery';

/**
 * Mobile navigation toggle
 * @param  {mixed} event
 */

const toggleMenu = (event) => {
    event.preventDefault();
    $('.js-menu-toggle, .nav--header').toggleClass('open');
    $('.header').toggleClass('menu-open');
};

$('.js-menu-toggle').on('click', toggleMenu);

