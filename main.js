$(document).ready(function () {
  // console.log('document ready');

  // if checkbox is checked, html label should read 'This is including VAT'
  // and background image should be Rishi
  $('#exVat').on('click', function () {
    if ($('label').html() == 'Include VAT? ') {
      let bg = 'images/RishiAndHisVAT.jpg';
      $('body').css({
        'background-image': 'url(' + bg + ')',
        'background-repeat': 'no-repeat',
        'object-fit': 'cover',
        'background-position': 'center 0%',
      });
      $('label').html('Exclude VAT? ');
      //      else, html label should read 'This is excluding VAT'
      //      and styling should be basic
    } else if ($('label').html() == 'Exclude VAT? ') {
      let bg = 'images/piggyBank.jpg';
      $('body').css({
        'background-image': 'url(' + bg + ')',
        'background-repeat': 'no-repeat',
        'object-fit': 'contain',
        'background-position': 'center 0%',
      });
      $('label').html('Include VAT? ');
    }
  });
});
