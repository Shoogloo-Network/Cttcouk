$('div #ShowLess').click(function () {
    $(this).hide();
    $(this).next().show();
});
$('div #ShowMore').click(function () {
    $(this).hide();
    $(this).prev().show();
});

document.addEventListener('DOMContentLoaded', function() {
  var dropdownToggles = document.querySelectorAll('.nav-item.dropdown .dropdown-toggle');

  dropdownToggles.forEach(function(toggle) {
    toggle.addEventListener('click', function(e) {
      var parent = e.target.closest('.dropdown');
      var menu = parent.querySelector('.dropdown-menu');
      var isOpen = menu.classList.contains('show');

      // Close all open dropdowns
      document.querySelectorAll('.dropdown-menu.show').forEach(function(openMenu) {
        openMenu.classList.remove('show');
      });

      // Toggle the clicked dropdown
      if (!isOpen) {
        menu.classList.add('show');
      }
    });
  });

  // Close dropdowns when clicking outside
  document.addEventListener('click', function(e) {
    if (!e.target.closest('.dropdown')) {
      document.querySelectorAll('.dropdown-menu.show').forEach(function(openMenu) {
        openMenu.classList.remove('show');
      });
    }
  });
});


$(document).ready(function(){
  // Resize the slide-read-more Div
  var box = $(".slide-read-more");
  var minimumHeight = 400; // max height in pixels
  var initialHeight = box.innerHeight();

  // Reduce the text if it's longer than minimumHeight
  if (initialHeight > minimumHeight) {
      box.css('height', minimumHeight);
      $(".read-more-button").show();
  }

  SliderReadMore();
  function SliderReadMore() {
      $(".slide-read-more-button").on('click', function () {
          // Get current height
          var currentHeight = box.innerHeight();
          // Get height with auto applied
          var autoHeight = box.css('height', 'auto').innerHeight();
          // Reset height and revert to original if current and auto are equal
          var newHeight = (currentHeight | 0) === (autoHeight | 0) ? minimumHeight : autoHeight;

          box.css('height', currentHeight).animate({
              height: newHeight
          }, 500, function() {
              // Check if the box is collapsing to the minimumHeight
              if (newHeight === minimumHeight) {
                  // Focus on the specific div after collapsing
                  document.getElementById('locateRM').scrollIntoView({ behavior: 'smooth' });
              }
          });
          $(".slide-read-more-button").toggle();
      });
  }
});

