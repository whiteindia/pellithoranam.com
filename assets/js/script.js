 // $('.wed-highlight-profile ul').bxSlider({
 //    slideWidth: 200,
 //    minSlides:6,
 //    maxSlides:5,
 //    speed:1000,
 //    auto:true,
 //    pager:true,
 //    pause:4000,
 //    slideMargin: 10
 //  });

var defaultText = 'Click me and enter some text';

function endEdit(e) {
    var input = $(e.target),
        label = input && input.prev();

    label.text(input.val() === '' ? defaultText : input.val());
    input.hide();
    label.show();
}

$('.clickedit').hide()
.focusout(endEdit)
.keyup(function (e) {
    if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
        endEdit(e);
        return false;
    } else {
        return true;
    }
})
.prev().click(function () {
    $(this).hide();
    $(this).next().show().focus();
});

 
 /*----------profile pic slide----------------*/
$('.wed-profile-pic').bxSlider({
  pagerCustom: '#wed-profile-pic-slider'
});

/*------------------------------------------- */

 /*--------Collapse in my match page----------*/
function toggleIcon(e) {
    $(e.target)
        .prev('.wed-filter-heading')
        .find(".more-less")
        .toggleClass('glyphicon-plus glyphicon-minus');
}
$('.wed-filter-collapse').on('hidden.bs.collapse', toggleIcon);
$('.wed-filter-collapse').on('shown.bs.collapse', toggleIcon);
/*------------------------------------------- */

/*-------Tooltip for mobile no & print--------*/
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
/*------------------------------------------- */