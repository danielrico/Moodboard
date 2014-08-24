jQuery(document).ready(function ($) {

  // "All" category is active on homepage
  $("body.home").find("header li:first-child").addClass("current-cat");

  $('#container').imagesLoaded( function() {
    // images have loaded
    // masonry
    var $container = $('#container');
    $container.masonry({
      itemSelector: '.item'
    });
    var msnry = $container.data('masonry');
  });

  


});