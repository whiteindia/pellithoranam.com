$(function(){
	
  /*LIST-GRID-VIEW*/
  $('button').on('click',function(e) {
      if ($(this).hasClass('grid-btn')) {
          $('.wed-search-listing ul').removeClass('list').addClass('grid');
      }
      else if($(this).hasClass('list-btn')) {
          $('.wed-search-listing ul').removeClass('grid').addClass('list');
      }
  });



  $('.wed-profile-pic').bxSlider({
    pagerCustom: '#wed-profile-pic-slider'
  });

  /*TOGGLE-PROFILE-DETAILS*/

  function toggleIcon(e) {
      $(e.target)
          .prev('.wed-filter-heading')
          .find(".more-less")
          .toggleClass('glyphicon-plus glyphicon-minus');
  }
  $('.wed-filter-collapse').on('hidden.bs.collapse', toggleIcon);
  $('.wed-filter-collapse').on('shown.bs.collapse', toggleIcon);

  $('#calendar').fullCalendar({
			header: {
			},
			defaultDate: '2016-12-12',
			navLinks: true,
			editable: true,
			eventLimit: true,
			events: [
				{
					title: 'All Day Event',
					start: '2016-12-01'
				},
				{
					title: 'Long Event',
					start: '2016-12-07',
					end: '2016-12-10'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2016-12-09T16:00:00'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2016-12-16T16:00:00'
				},
				{
					title: 'Conference',
					start: '2016-12-11',
					end: '2016-12-13'
				},
				{
					title: 'Meeting',
					start: '2016-12-12T10:30:00',
					end: '2016-12-12T12:30:00'
				},
				{
					title: 'Lunch',
					start: '2016-12-12T12:00:00'
				},
				{
					title: 'Meeting',
					start: '2016-12-12T14:30:00'
				},
				{
					title: 'Happy Hour',
					start: '2016-12-12T17:30:00'
				},
				{
					title: 'Dinner',
					start: '2016-12-12T20:00:00'
				},
				{
					title: 'Birthday Party',
					start: '2016-12-13T07:00:00'
				},
				{
					title: 'Click for Google',
					url: 'http://google.com/',
					start: '2016-12-28'
				}
			]
		});
		
$(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.wed-scrollup').fadeIn();
        } else {
            $('.wed-scrollup').fadeOut();
        }
    });

    $('.wed-scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
	
 $('.wed-inside-menu li.dropdown').hover(function() {
        $(this).addClass('open');
    }, function() {
        $(this).removeClass('open');
    });


/*$('.datepicker').datepicker();*/




/*HIGHLIGHTED-PROFILE-SLIDER*/

  // $('.wed-highlight-profile ul').bxSlider({
  // slideWidth: 125,
  // minSlides:1,
  // maxSlides:6,
  // speed:1000,
  // auto:true,
  // pager:false,
  // pause:4000,
  // slideMargin: 10
  // });


  /*MATCHING-PROFILE-SLIDER*/

  // $('.wed-matching-slider ul').bxSlider({
  // slideWidth: 148,
  // minSlides:1,
  // maxSlides:4,
  // speed:1000,
  // auto:true,
  // pager:false,
  // pause:4000,
  // slideMargin: 10
  // });


  /*PROFILE-IMAGE-SLIDER*/

  });
