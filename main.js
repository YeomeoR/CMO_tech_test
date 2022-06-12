$(document).ready(function () {
  // console.log('document ready');

  // if checkbox is checked, html label should read 'This is including VAT'
  // and background image should be Rishi
  $('#exVat').on('click', function () {
    // console.log('checkbox clicked : ' + $(this).parent().html());
    if ($('label').html() == 'Does this amount Include VAT? ') {
      // console.log('Doesn this amount Exclude VAT?');
      $('label').html('Does this amount Exclude VAT? ');
      //      else, html label should read 'This is excluding VAT'
      //      and styling should be basic
    } else if ($('label').html() == 'Does this amount Exclude VAT? ') {
      // console.log('Does this amount Include VAT? ');
      $('label').html('Does this amount Include VAT? ');
    }
  });
});
