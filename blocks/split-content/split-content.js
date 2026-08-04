(function($) {

  $( document ).on( 'click', '.section--split-content [data-button]', function(e) {

    e.preventDefault();

    alert('Button clicked');

  });

})( jQuery );