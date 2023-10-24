(function($) {
  "use strict";
  
 // menu 
  $('.siteBar-btn').click( function (){ 
    $('.mobile-menu').toggleClass('siteBar');
    $('.manu-overlay').toggleClass('show');

    $('.mobile-menu nav ul li a').removeClass('show');

  }); 

   


  // owlCarousel
  $(".testimonials").owlCarousel({
    loop: true,
    margin: 30,
    items: 2,
    navText: [
      '<i class="fa fa-angle-left"></i>',
      '<i class="fa fa-angle-right"></i>'
    ],
    nav: false,
    dots: true,
    responsive: {
      0: {
        items: 1
      },
      767: {
        items: 1
      },
      992: {
        items: 2
      }
    }
  });

 
  var slider = $("#range"),
      output = $("#output");

    output.text(slider.val());
    slider.on("input", function () {
      output.text(slider.val());
    });
  
 


    
    const editor = SUNEDITOR.create((document.getElementById('sample') || 'sample'),{
      // All of the plugins are loaded in the "window.SUNEDITOR" object in dist/suneditor.min.js file
      // Insert options 
      buttonList: [
      
          [
          'undo', 'redo',
          'font', 'fontSize', 'formatBlock',
          'paragraphStyle', 'blockquote',
          'bold', 'underline', 'italic', 'strike', 'subscript', 'superscript',
          'fontColor', 'hiliteColor', 'textStyle',
          'removeFormat',
          'outdent', 'indent',
          'align', 'horizontalRule', 'list', 'lineHeight',
          'table', 'link', 'image', 'video', 'audio', /** 'math', */ // You must add the 'katex' library at options to use the 'math' plugin.
          /** 'imageGallery', */ // You must add the "imageGalleryUrl".
          'fullScreen', 'showBlocks', 'codeView',
          'preview', 'print', 'save', 'template',
          /** 'dir', 'dir_ltr', 'dir_rtl' */ // "dir": Toggle text direction, "dir_ltr": Right to Left, "dir_rtl": Left to Right
          ]
      ]
      
  });





})(jQuery);
