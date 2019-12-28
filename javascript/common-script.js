
/* accordion */

  $(function(){
    $('#accordion').dcAccordion({
        eventType: 'click',
        autoClose: true,
        saveState: true,
        disableLink: true,
        speed: 'slow',
        showCount: false,
        autoExpand: true,
//      cookie: 'dcjq-accordion-1',
        classExpand: 'dcjq-current-parent'
      });
  });

/* sidebar toggle */

  $(function() {
    function responsiveView() {
        var wSize = $(window).width();
        if (wSize <= 768 ) {
            $('#container').addClass('sidebar-close');
            $('#sidebar > ul').hide();
        }

        if (wSize > 768) {
            $('#container').removeClass('sidebar-close');
            $('#sidebar > ul').show();
        }
    }
    $(window).on('load', responsiveView);
    $(window).on('resize', responsiveView);
  });

  $('.fa-bars').click(function () {
    if ($('#sidebar > ul').is(":visible") === true) {
        $('#main-content').css({
            'margin-left': '0px'
        });
        $('#sidebar').css({
            'margin-left': '-210px'
        });
        $('#sidebar > ul').hide();
        $('#container').addClass('sidebar-closed');
    } else {
        $('#main-content').css({
            'margin-left': '210px'
        });
        $('#sidebar > ul').show();
        $('#sidebar').css({
            'margin-left': '0'
        });
        $('#container').removeClass('sidebar-closed');
    }
  });

/* change active tab */

  $(".sub-menu a").on("click", function() {
    $(".sub-menu a").removeClass("active");
    $(this).addClass("active");
  });

/* map */
  var map = L.map('mapcontainer').setView([-0.919097, 119.884344], 15);

  var layer = L.tileLayer('https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png', {
        scheme: 'TMS'
      }).addTo(map);

      L.marker([-0.918893, 119.884280]).addTo(map)
