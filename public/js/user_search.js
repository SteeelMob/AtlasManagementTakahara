$(function () {
  $('.search_conditions').click(function () {
    $('.search_conditions_inner').slideToggle('open');
    $('.search_conditions').toggleClass('open', 200);
  });
  $('.subject_edit_btn').click(function () {
    $('.subject_inner').slideToggle();
    $('.subject_edit_btn').toggleClass('open', 200);
  });
});

