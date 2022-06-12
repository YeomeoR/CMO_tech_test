$(document).ready(function () {
  console.log('document ready');

  // if checkbox is checked, html label should read 'This is including VAT'
  // and background image should be Rishi
  $('#exVat').on('click', function () {
    console.log('checkbox clicked : ' + $(this).parent().html());
    if ($('label').html() == 'Include VAT? ') {
      console.log('Exclude VAT?');
      $('label').html('Exclude VAT? ');
    }
  });
  //      else, html label should read 'This is excluding VAT'
  //      and styling should be basic
});
