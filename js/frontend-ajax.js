(function($) {
  $(document).ready(function() {

    // On menu link click listener
    $(document).on('click', '.js-filter-item > a', function(e) {
      e.preventDefault();

      // Get the category from the menu item's data attribute
      var category = $(this).data('category');

      // Remove all active classes
      $(document).find('.js-filter-item.tab--active')
        .removeClass('tab--active')
        .addClass('tab--border');

      // Add active class to the current one
      $(this).parent()
        .addClass('tab--active')
        .removeClass('tab--border');
      
      // Remove all posts
      $(document).find('#posts').html('');
      $(document).find('.js-filter')
        .removeClass('loading')
        .removeClass('finished');

      // Fetch posts
      fetchPosts(category, 0);
    });

    // On scroll check if the last loaded post is visible
    // If it is, load the next x posts - The infinity scroll functionality
    $(document).on('scroll', function() {
      // Get all visible items
      var items = $(document).find('#posts > a');

      // Check if the last loaded post visible
      if (items.length) {
        var lastItem = $(items[items.length - 1]),
          itemTop = lastItem.offset().top,
          itemBotom = itemTop + lastItem.outerHeight(),
          screenTop = $(window).scrollTop(),
          screenBottom = screenTop + $(window).innerHeight();
    
        // If the last item is visible, fetch the next x posts
        if ((screenBottom > itemTop) && (screenTop < itemBotom)) {

          // Get the currently active category
          var category = $(document).find('.js-filter-item.tab--active > a').data('category');

          // Fetch the next posts
          fetchPosts(category, items.length);
        }
      }
    });
  });

  /**
   * 
   * @param {Integer} category - The category id
   * @param {Integer} loadedPosts - The count of loaded (visible) posts
   */
  function fetchPosts(category, loadedPosts) {
    // Check if the filter array has "loading" or "finished" class
    var jsFilter = $(document).find('.js-filter');
    if (jsFilter.hasClass('finished') || jsFilter.hasClass('loading')) {
      return;
    }

    // Add loading class to the filter array
    jsFilter.addClass('loading');

    // Count the current page
    var page = loadedPosts < 6 ? 1 : Math.ceil(loadedPosts / 6) + 1;
    // console.log(page);
    // Make an AJAX call - fetch the next x posts
    $.ajax({
      url: frontend_ajax_object.ajaxurl,
      type: 'post',
      data: {
        action: 'filter', 
        category: category,
        page: page
      },
      success: function(response) {
        if (typeof response.hasOwnProperty('data') && Object.keys(response.data).length > 0) {
          
          for (const [key, post] of Object.entries(response.data)) {
            var id = $(post).attr('id');
            console.log(key, id);
            if ($("#"+id).length == 0) {
              // Append the new posts
              $(document).find('#posts').append(post);
            }
          }
          // Remove the loading class
          jsFilter.removeClass('loading');

          // If the response contains less than 6 posts there are no more posts so we add the finished class
          if (Object.keys(response.data).length < 6) {
            jsFilter.addClass('finished');
          }
        } else {
          // There is no more posts - add finished class
          jsFilter.removeClass('loading');
          jsFilter.addClass('finished');
        }
      },
    });
  }
}) (jQuery);