/*  add new input for specialize */
function add_specialize(){
      var new_chq_no = parseInt($('#total_chq').val())+1;
      var new_input="<input class='new_input input_style' type='text' id='new_"+new_chq_no+"'>";
    var txt_input=document.getElementsByClassName(".new_input");
      $('#new_specialize').append(new_input);
      $('#total_chq').val(new_chq_no);
    
        $(".edit-about").on("click",function(){
            $(".new_input").show();
        });
        $(".save-about").on("click",function(){
            $(".new_input").hide();
            $(".name-specialize").append(" - ");
             $(".name-specialize").append($('#new_'+new_chq_no).val());
        });
    

    }
    function remove_specialize(){
      var last_chq_no = $('#total_chq').val();
      if(last_chq_no>1){
        $('#new_'+last_chq_no).remove();
        $('#total_chq').val(last_chq_no-1);
        
         
      }
    }

/*  add new input for style */
function add_style(){
      var new_chq_no = parseInt($('#total_chq').val())+1;
      var new_input="<input class='input_style new_input' type='text' id='new_"+new_chq_no+"'>";
      $('#new_style').append(new_input);
      $('#total_chq').val(new_chq_no);
    
       $(".edit-about").on("click",function(){
            $(".new_input").show();
        });
        $(".save-about").on("click",function(){
            $(".new_input").hide();
            
            $(".name-style").append(" - ");
             $(".name-style").append($('#new_'+new_chq_no).val());
        });
       
//        $('#new_'+new_chq_no).on("change", function(){
//            $(".name-style").append(" - ");
//            $(".name-style").append($(this).val());
//        });
    }
    function remove_style(){
      var last_chq_no = $('#total_chq').val();
      if(last_chq_no>1){
        $('#new_'+last_chq_no).remove();
        $('#total_chq').val(last_chq_no-1);
      }
    }

/*  add new input for speaks */

function add_speaks(){
      var new_chq_no = parseInt($('#total_chq').val())+1;
      var new_input="<input class='new_input input_style' type='text' id='new_"+new_chq_no+"'>";
      $('#new_speaks').append(new_input);
      $('#total_chq').val(new_chq_no);
    
        $(".edit-background").on("click",function(){
            $(".new_input").show();
        });
        $(".save-background").on("click",function(){
            $(".new_input").hide();
            
            $(".name-speaks").append(" - ");
            $(".name-speaks").append($('#new_'+new_chq_no).val());
        });
       
//        $('#new_'+new_chq_no).on("change", function(){
//            $(".name-speaks").append(" - ");
//            $(".name-speaks").append($(this).val());
//        });
    }
    function remove_speaks(){
      var last_chq_no = $('#total_chq').val();
      if(last_chq_no>1){
        $('#new_'+last_chq_no).remove();
        $('#total_chq').val(last_chq_no-1);
      }
    }

/*  add new input for interests */
function add_interests(){
      var new_chq_no = parseInt($('#total_chq').val())+1;
      var new_input="<input class='new_input input_style' type='text' id='new_"+new_chq_no+"'>";
      $('#new_interests').append(new_input);
      $('#total_chq').val(new_chq_no);
    
        $(".edit-interests").on("click",function(){
            $(".new_input").show();
        });
        $(".save-interests").on("click",function(){
            $(".new_input").hide();
            $(".name-interests").append(" - ");
            $(".name-interests").append($('#new_'+new_chq_no).val());
        });
      
    }
    function remove_interests(){
      var last_chq_no = $('#total_chq').val();
      if(last_chq_no>1){
        $('#new_'+last_chq_no).remove();
        $('#total_chq').val(last_chq_no-1);
      }
        $(".save-interests").on("click",function(){
            $('#new_'+last_chq_no).on("change", function(){
            $(".name-interests").append(" - ");
            $(".name-interests").append($(this).val());
        });
        });
        
    }

//    $('.submit').click(function() {
//        var list = wrapper.find('input').map(function() {
//          return $(this).val();
//        }).get();
//        // send to server here
//        console.log(list);
//      });



    

    
$(document).ready(function(e) {
    "use strict";
    
    $(".info-profile").slideDown();
    
    
    
    $(function() {
      $("#uploadFile").on("change", function() {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test(files[0].type)) { // only image file
          var reader = new FileReader(); // instance of the FileReader
          reader.readAsDataURL(files[0]); // read the local file

          reader.onloadend = function() { // set image data as background of div
            $("#imagePreview").css("background-image", "url(" + this.result + ")");
          }
        }
      });
      $('#imagePreview').click(function() {
        $('#uploadFile').trigger('click');
      });
    });
    
//       // Select all links with hashes
//$('a[href*="#"]')
//  // Remove links that don't actually link to anything
//  .not('[href="#"]')
//  .not('[href="#0"]')
//  .click(function(event) {
//    // On-page links
//    if (
//      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
//      && 
//      location.hostname == this.hostname
//    ) {
//      // Figure out element to scroll to
//      var target = $(this.hash);
//      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
//      // Does a scroll target exist?
//      if (target.length) {
//        // Only prevent default if animation is actually gonna happen
//        event.preventDefault();
//        $('html, body').animate({
//          scrollTop: target.offset().top
//        }, function() {
//          // Callback after animation
//          // Must change focus!
//          var $target = $(target);
//          $target.focus();
//          if ($target.is(":focus")) { // Checking if the target was focused
//            return false;
//          } else {
//            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
//            $target.focus(); // Set focus again
//          };
//        });
//      }
//    }
//  });
//    
    
    
    
    
	$(".btn-profile").on("click",function(){
		$(".info-profile").slideToggle();
        $(".info-account").slideUp();
        $(".info-settings").slideUp();
	});
	
	$(".btn-account").on("click",function(){
		$(".info-account").slideToggle();
        $(".info-profile").slideUp();
        $(".info-settings").slideUp();
	});
	
	$(".btn-settings").on("click",function(){
		$(".info-settings").slideToggle();
        $(".info-profile").slideUp();
        $(".info-account").slideUp();
	});
	
	$(".profile-down").on("click",function(){
		$(".info-profile").slideToggle();
        $(".info-account").slideUp();
        $(".info-settings").slideUp();
	});
	
	$(".account-down").on("click",function(){
		$(".info-account").slideToggle();
        $(".info-profile").slideUp();
        $(".info-settings").slideUp();
	});
	
	$(".settings-down").on("click",function(){
		$(".info-settings").slideToggle();
        $(".info-profile").slideUp();
        $(".info-account").slideUp();
	});
	
    
    // start dynamic Name
    $(".hov-edit").on("click",function(){
        
		$(".name").hide();
        $(".input").show();
        $(".hov-edit").hide();
        $(".btn-save").show();
            
	});
    
    $(".name").on("click",function(){
		$(".name").hide();
        $(".input").show();
        $(".hov-edit").hide();
        $(".btn-save").show();
            
	});
    
    $(".input").on("change", function(){
        $(".name").text($(this).val());
    });
    
    $(".btn-save").on("click",function(){
        $(".name").show();
        $(".input").hide();
        $(".btn-save").hide();
        $(".hov-edit").show();
	});

	///////////// end dynamic Name ///////////////////
    
    
	///////////// start dynamic about ///////////////////
    $(".edit-about").on("click",function(){
        $(".save-about").show();
        $(".edit-about").hide();
        
        $(".name-specialize").hide();
        $(".input-specialize").show();
        
        
        $(".name-style").hide();
        $(".input-style").show();
       
        
        $(".name-levels").hide();
        $(".input-levels").show()
        
        $(".operator").show();
        
        
//        $(".plus-specialize").on("click",function(){
//            $(".in-plus").insertAfter(".plus-txt");
//            $(".in-plus").show();
//        });
    
        
    });
    
    
    
    
    $(".input-specialize").on("change", function(){
        $(".name-specialize").text($(this).val());
    });
    
     $(".input-style").on("change", function(){
        $(".name-style").text($(this).val());
    });
    
    $(".input-levels").on("change", function(){
        $(".name-levels").text($(this).val());
    });
    
    $(".save-about").on("click",function(){
        $(".save-about").hide();
        $(".edit-about").show();
        
        $(".name-specialize").show();
        $(".input-specialize").hide();
        
        $(".name-style").show();
        $(".input-style").hide();
        
        $(".name-levels").show();
        $(".input-levels").hide();
    
        $(".operator").hide();
	});
    
    ///////////// end dynamic about ///////////////////
    
    
    ///////////// start dynamic qualifications ///////////////////
    
      // start dynamic teaching
    
    $(".edit-teaching").on("click",function(){
		$(".name-teaching").hide();
        $(".input-teaching").show();
        $(".edit-teaching").hide();
        $(".save-teaching").show();
            
	});
    
   
    
    $(".input-teaching").on("change", function(){
        $(".name-teaching").text($(this).val());
    });
    
    $(".save-teaching").on("click",function(){
        $(".name-teaching").show();
        $(".input-teaching").hide();
        $(".save-teaching").hide();
        $(".edit-teaching").show();
	});

	// end dynamic teaching
    
    $(".edit-qualificate").on("click",function(){
        $(".save-qualificate").show();
        $(".edit-qualificate").hide();
        
       $(".name-teaching").hide();
        $(".input-teaching").show();
        
       $(".name-certificate").hide();
        $(".input-certificate").show();
        
       
    });
    
   
   
    $(".input-teaching").on("change", function(){
        $(".name-teaching").text($(this).val());
    });
    
     $(".input-certificate").on("change", function(){
        $(".name-certificate").text($(this).val());
    });
 
    
    
    
    $(".save-qualificate").on("click",function(){
        $(".save-qualificate").hide();
        $(".edit-qualificate").show();
        
       $(".name-teaching").show();
        $(".input-teaching").hide();
        
       $(".name-certificate").show();
        $(".input-certificate").hide();
        
     
    
	});
    
    ///////////// end dynamic qualifications ///////////////////
    
    
    ///////////// start dynamic background ///////////////////
    
    
    $(".edit-background").on("click",function(){
        $(".save-background").show();
        $(".edit-background").hide();
        
        $(".name-speaks").hide();
        $(".input-speaks").show();
        
       $(".name-profession").hide();
        $(".input-profession").show();
        
        $(".name-education").hide();
        $(".input-education").show();
        
       $(".operator-Speaks").show();
    });
    
    
     $(".input-speaks").on("change", function(){
        $(".name-speaks").text($(this).val());
    });
    
     $(".input-profession").on("change", function(){
        $(".name-profession").text($(this).val());
    });
    
     $(".input-education").on("change", function(){
        $(".name-education").text($(this).val());
    });
    
    
    
    $(".save-background").on("click",function(){
        $(".save-background").hide();
        $(".edit-background").show();
        
         $(".name-speaks").show();
        $(".input-speaks").hide();
        
       $(".name-profession").show();
        $(".input-profession").hide();
        
       $(".name-education").show();
        $(".input-education").hide();
        
        $(".operator-Speaks").hide();
	});
    
    ///////////// end dynamic background ///////////////////
    
    
      ///////////// start dynamic interests ///////////////////
    
    
    $(".edit-interests").on("click",function(){
        $(".save-interests").show();
        $(".edit-interests").hide();
        
        $(".name-discussing").hide();
        $(".input-discussing").show();
        
       $(".name-interests").hide();
        $(".input-interests").show();
        
       $(".operator-interests").show();
    });
    
    
    
    $(".input-discussing").on("change", function(){
        $(".name-discussing").text($(this).val());
    });
    
    
     $(".input-interests").on("change", function(){
        $(".name-interests").text($(this).val());
    });
    
  
    
    
    $(".save-interests").on("click",function(){
        $(".save-interests").hide();
        $(".edit-interests").show();
            
         $(".name-discussing").show();
        $(".input-discussing").hide();
        
      $(".name-interests").show();
        $(".input-interests").hide();
     
        $(".operator-interests").hide();
	});
    
    ///////////// end dynamic interests ///////////////////
    
//   
//    // start dynamic discussing
//    $(".edit-discussing").on("click",function(){
//		$(".name-discussing").hide();
//        $(".input-discussing").show();
//        $(".edit-discussing").hide();
//        $(".save-discussing").show();
//            
//	});
//    
//    
//    $(".input-discussing").on("change", function(){
//        $(".name-discussing").text($(this).val());
//    });
//    
//    $(".save-discussing").on("click",function(){
//        $(".name-discussing").show();
//        $(".input-discussing").hide();
//        $(".save-discussing").hide();
//        $(".edit-discussing").show();
//	});
//	
//    
//	// end dynamic discussing
//    
//    // start dynamic interests
//    $(".edit-interests").on("click",function(){
//		$(".name-interests").hide();
//        $(".input-interests").show();
//        $(".edit-interests").hide();
//        $(".save-interests").show();
//        
//        
//        
//        
//    
//            
//	});
//    
//    
//    
//    $(".input-interests").on("change", function(){
//        $(".name-interests").text($(this).val());
//    });
//    
//    $(".save-interests").on("click",function(){
//        $(".name-interests").show();
//        $(".input-interests").hide();
//        $(".save-interests").hide();
//        $(".edit-interests").show();
//	});
//	
//    
//	// end dynamic interests
//    
    // start dynamic first
    $(".edit-first").on("click",function(){
		$(".name-first").hide();
        $(".input-first").show();
        $(".edit-first").hide();
        $(".save-first").show();
            
	});
    
    $(".name-first").on("click",function(){
		$(".name-first").hide();
        $(".input-first").show();
        $(".edit-first").hide();
        $(".save-first").show();
            
	});
    
    $(".input-first").on("change", function(){
        $(".name-first").text($(this).val());
    });
    
    $(".save-first").on("click",function(){
        $(".name-first").show();
        $(".input-first").hide();
        $(".save-first").hide();
        $(".edit-first").show();
	});
	
	// end dynamic first
    
    // start dynamic last
    $(".edit-last").on("click",function(){
		$(".name-last").hide();
        $(".input-last").show();
        $(".edit-last").hide();
        $(".save-last").show();
            
	});
    
    $(".name-last").on("click",function(){
		$(".name-last").hide();
        $(".input-last").show();
        $(".edit-last").hide();
        $(".save-last").show();
            
	});
    
    $(".input-last").on("change", function(){
        $(".name-last").text($(this).val());
    });
    
    $(".save-last").on("click",function(){
        $(".name-last").show();
        $(".input-last").hide();
        $(".save-last").hide();
        $(".edit-last").show();
	});
	
	// end dynamic last
    
     // start dynamic email
    $(".edit-email").on("click",function(){
		$(".name-email").hide();
        $(".input-email").show();
        $(".edit-email").hide();
        $(".save-email").show();
            
	});
    
    $(".name-email").on("click",function(){
		$(".name-email").hide();
        $(".input-email").show();
        $(".edit-email").hide();
        $(".save-email").show();
            
	});
    
    $(".input-email").on("change", function(){
        $(".name-email").text($(this).val());
    });
    
    $(".save-email").on("click",function(){
        $(".name-email").show();
        $(".input-email").hide();
        $(".save-email").hide();
        $(".edit-email").show();
	});
	
	// end dynamic email
    
     // start dynamic password
    $(".edit-password").on("click",function(){
		$(".name-password").hide();
        $(".input-password").show();
        $(".edit-password").hide();
        $(".save-password").show();
            
	});
    
    $(".name-password").on("click",function(){
		$(".name-password").hide();
        $(".input-password").show();
        $(".edit-password").hide();
        $(".save-password").show();
            
	});
    
//    $(".input-password").on("change", function(){
//        $(".name-password").text($(this).val());
//    });
    
    $(".save-password").on("click",function(){
        $(".name-password").show();
        $(".input-password").hide();
        $(".save-password").hide();
        $(".edit-password").show();
	});
	
	// end dynamic password
	
     // start dynamic phone
    $(".edit-phone").on("click",function(){
		$(".name-phone").hide();
        $(".input-phone").show();
        $(".edit-phone").hide();
        $(".save-phone").show();
            
	});
    
    $(".name-phone").on("click",function(){
		$(".name-phone").hide();
        $(".input-phone").show();
        $(".edit-phone").hide();
        $(".save-phone").show();
            
	});
    
    $(".input-phone").on("change", function(){
        $(".name-phone").text($(this).val());
    });
    
    $(".save-phone").on("click",function(){
        $(".name-phone").show();
        $(".input-phone").hide();
        $(".save-phone").hide();
        $(".edit-phone").show();
	});
	
	// end dynamic phone
    
      // start dynamic lang
      
    $(".edit-lang").on("click",function(){
		$(".name-lang").hide();
        $(".input-lang").show();
        $(".edit-lang").hide();
        $(".save-lang").show();
            
	});
    
    $(".name-lang").on("click",function(){
		$(".name-lang").hide();
        $(".input-lang").show();
        $(".edit-lang").hide();
        $(".save-lang").show();
            
	});
    
    $(".input-lang").on("change", function(){
        $(".name-lang").text($(this).val());
    });
    
    $(".save-lang").on("click",function(){
        $(".name-lang").show();
        $(".input-lang").hide();
        $(".save-lang").hide();
        $(".edit-lang").show();
	});
	
	// end dynamic lang
    
    // start dynamic country
    $(".edit-country").on("click",function(){
		$(".name-country").hide();
        $(".input-country").show();
        $(".edit-country").hide();
        $(".save-country").show();
            
	});
    
    $(".name-country").on("click",function(){
		$(".name-country").hide();
        $(".input-country").show();
        $(".edit-country").hide();
        $(".save-country").show();
            
	});
    
    $(".input-country").on("change", function(){
        $(".name-country").text($(this).val());
    });
    
    $(".save-country").on("click",function(){
        $(".name-country").show();
        $(".input-country").hide();
        $(".save-country").hide();
        $(".edit-country").show();
	});
	
	// end dynamic country
    
      // start dynamic timezone
    $(".edit-timezone").on("click",function(){
		$(".name-timezone").hide();
        $(".input-timezone").show();
        $(".edit-timezone").hide();
        $(".save-timezone").show();
            
	});
    
    $(".name-timezone").on("click",function(){
		$(".name-timezone").hide();
        $(".input-timezone").show();
        $(".edit-timezone").hide();
        $(".save-timezone").show();
            
	});
    
    $(".input-timezone").on("change", function(){
        $(".name-timezone").text($(this).val());
    });
    
    $(".save-timezone").on("click",function(){
        $(".name-timezone").show();
        $(".input-timezone").hide();
        $(".save-timezone").hide();
        $(".edit-timezone").show();
	});
	
	// end dynamic timezone
    
     
      // start dynamic notification
    $(".edit-notification").on("click",function(){
		$(".name-notification").hide();
        $(".input-notification").show();
        $(".edit-notification").hide();
        $(".save-notification").show();
            
	});
    
    $(".name-notification").on("click",function(){
		$(".name-notification").hide();
        $(".input-notification").show();
        $(".edit-notification").hide();
        $(".save-notification").show();
            
	});
    
    $(".input-notification").on("change", function(){
        $(".name-notification").text($(this).val());
    });
    
    $(".save-notification").on("click",function(){
        $(".name-notification").show();
        $(".input-notification").hide();
        $(".save-notification").hide();
        $(".edit-notification").show();
	});
	
	// end dynamic timezone
});