// Ajax.js
// console.log('ajaxx');
jQuery(function ($) {
  // On filter submit or pagination number click listener
  $("body").on("click", ".filter-submit", function (e) {
    // console.log('click');
    e.preventDefault();

    var page = 1;

    // if the category is selected, put it in the category variable
    if ($("#category option:selected").length) {
      var category = $("#category option:selected").val();
    }

    // if the search keyword isn't empty, put it in the keyword variable
    if ($("#keyword").val().length > 1) {
      var keyword = $("#keyword").val();
    }

    $("#response").html(""); // delete response content
    $("#pagination-ajax").html(""); // delete pagination

    $.ajax({
      url: ajaxUrl.ajaxurl,
      type: "post",
      dataType: "json",
      data: {
        action: "myfilter",
        category: category,
        keyword: keyword,
        page: page,
      },
      beforeSend: function () {
        $(".load").fadeIn("300"); // show loader until results are displayed/returned
      },
      success: function (data) {
        // if there is at least one post, then insert posts and updated pagination
        if (data.posts.length > 0) {
          var posts = '<div class="news-grid">';
          // Add sticky post
          if (data.sticky !== null) {
            if (
              (page == 1 && category == "All") ||
              (page == 1 && category == "Company News")
            ) {
              posts += data.sticky;
            }
          }
          posts += data.posts.join("");
          posts += "</div>";
          // console.log(posts);
          $("#response").html(posts); // insert posts
          $("#pagination-ajax").html(pagination(data.pages, data.current_page)); // insert pagination ( pagination(number, current_page) function used )
        } else {
          // if there no posts, insert 'no-posts' message and remove pagination
          var no_posts = "<h4>No posts.</h4>";
          $("#response").html(no_posts);
          $("#pagination-ajax").empty();
        }
      },
      complete: function () {
        $(".load").fadeOut("300"); // hide loader when results are displayed/returned
      },
    });
    // filter apply or pagination number is clicked, when the result is returned, then scroll to top of newss section
    $("html, body").animate(
      {
        scrollTop: $(".news__filter").offset().top - 30,
      },
      700
    );

    return false;
  });

  // On filter submit or pagination number click listener
  $("body").on("click", ".pagination-ajax__item", function (e) {
    // console.log('click');
    e.preventDefault();

    // check for current pagination number, and if exsists put it in the page variable
    if ($("#pagination-ajax").find(".current").data("number")) {
      var page = $("#pagination-ajax").find(".current").data("number");
    }

    // if clicked on some of pagination number, get pagination number(data-number) and put it in the page variable
    if ($(this).data("number")) {
      var page = $(this).attr("data-number");
    }

    // if clicked on next/prev in pagination number list, increase/decrease page variable
    if ($(this).data("next")) {
      page++;
    }
    if ($(this).data("prev")) {
      page--;
    }

    // if the category is selected, put it in the category variable
    if ($("#category option:selected").length) {
      var category = $("#category option:selected").val();
    }

    // if the search keyword isn't empty, put it in the keyword variable
    if ($("#keyword").val().length > 1) {
      var keyword = $("#keyword").val();
    }

    $("#response").html(""); // delete response content
    $("#pagination-ajax").html(""); // delete pagination

    var postid = 1642;

    $.ajax({
      url: ajaxUrl.ajaxurl,
      type: "post",
      dataType: "json",
      data: {
        action: "myfilter",
        category: category,
        keyword: keyword,
        page: page,
      },
      beforeSend: function () {
        $(".load").fadeIn("300"); // show loader until results are displayed/returned
      },
      success: function (data) {
        // if there is at least one post, then insert posts and updated pagination
        if (data.posts.length > 0) {
          var posts = '<div class="news-grid">';
          // Add sticky post
          if (data.sticky !== null) {
            if (
              (page == 1 && category == "All") ||
              (page == 1 && category == "Company News")
            ) {
              posts += data.sticky;
            }
          }
          posts += data.posts.join("");
          posts += "</div>";
          // console.log(posts);
          $("#response").html(posts); // insert posts
          $("#pagination-ajax").html(pagination(data.pages, data.current_page)); // insert pagination ( pagination(number, current_page) function used )
        } else {
          // if there no posts, insert 'no-posts' message and remove pagination
          var no_posts = "<h4>No posts.</h4>";
          $("#response").html(no_posts);
          $("#pagination-ajax").empty();
        }
      },
      complete: function () {
        $(".load").fadeOut("300"); // hide loader when results are displayed/returned
      },
    });
    // filter apply or pagination number is clicked, when the result is returned, then scroll to top of newss section
    $("html, body").animate(
      {
        scrollTop: $(".news__filter").offset().top - 30,
      },
      700
    );

    return false;
  });

  // Custom function
  // used in ajax success to display updated ajax-pagination
  // takes the max number of pagination pages, and current_page
  function pagination(number, current_page) {
    // show pagination, if there is more than one pagination page
    if (number > 1) {
      var html = '<ul class="pagination">';
      if (current_page > 1) {
        html +=
          '<li class="pagination-ajax__item prev num" data-prev="prev"><a  href="#" ><span>prev</span></a></li>';
      }
      var i = 1;
      while (i <= number) {
        html += '<li class="pagination-ajax__item num';
        if (i == current_page) {
          html += " current";
        }
        html +=
          '" data-number="' +
          i +
          '"><a href="#"><span>' +
          i +
          "</span></a></li>";
        i++;
      }
      if (current_page < number && number > 1) {
        html +=
          '<li class="pagination-ajax__item num next" data-next="next"><a  href="#" ><span>next</span></a></li>';
      }
      html += "</ul>";
    } else {
      html = "";
    }
    return html;
  }
});
