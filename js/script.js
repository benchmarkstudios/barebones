(function($) {

	// Add utility classes to lists/tables

  $('li:last-child,td:last-child,tr:last-child,th:last-child').addClass('last');
  $('td:nth-child(odd),th:nth-child(odd),tr:nth-child(odd)').addClass('odd');
  $('td:nth-child(even),th:nth-child(even),tr:nth-child(even)').addClass('even');

  //

})(jQuery);
