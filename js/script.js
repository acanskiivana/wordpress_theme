// (function($) {
//    $(document).ready(function() {
     
//       $(document).on('click', '.js-filter-item > a', function(e) {
//          e.preventDefault();

//          var category = $(this).data('category');
//          $.ajax({
//             url: wpAjax.ajaxUrl,
//             type: 'post',
//             data: {
//               action: 'filter', 
//               category: category
//             //   page: page
//             },
//             success: function(result) {
//                $('.js-filter').html(result);
//             },
//             error: function(result) {
//                console.warn(result);
//             }
//           });

//       });

//    });
//  }) (jQuery);