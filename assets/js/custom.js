$(document).ready(function(){

$(".submenu > a").click(function(e) {
    e.preventDefault();
    var $li = $(this).parent("li");
    var $ul = $(this).next("ul");
    if($li.hasClass("open")) {
      $ul.slideUp(350);
      $li.removeClass("open");
    } else {
      $(".nav > li > ul").slideUp(350);
      $(".nav > li").removeClass("open");
      $ul.slideDown(350);
      $li.addClass("open");
    }
  });


    $('#companyRegistrationSubmitBtn').click(function(e) {
      depochecked = $('.companydepocheckboxdiv :checkbox:checked').length ;
      worktype    = $('.workstypecheckboxcontainer :checkbox:checked').length ;
      if(!depochecked || !worktype) {
        e.preventDefault();
        alert("You must select atleast one from the given");
        return false;
      }
    });


        $('#collegeSubmitBtn').click(function(e) {
          depochecked = $('.collegeDepoCheckBoxDiv :checkbox:checked').length ;
          courses      = $('.courseCheckBoxContainer :checkbox:checked').length ;
          if(!depochecked || !courses) {
            e.preventDefault();
            alert("You must select atleast one from the given");
            return false;
          }
        });



// showing and hiding work types with and without any department
  $(".workstypemaincontainer").hide();
    $('.companydepocheckbox').click(function(e) {
      var $id         = $(this).data('did');
      var $name       = $(this).data('dname');
      var $fieldId    =  "#"+$id+"_"+$name;
        if( $(this).is(':checked')) {
               $($fieldId).show();
           } else {
               $($fieldId).hide();
           }
  });


// location selector validation

   $('form#companyform').submit(function(e) {
        if( $('input[name="hqlocation"]').val().length === 0 ) {
          e.preventDefault();
          alert('Please Select the location');
        }
    });


       $('form#collegeform').submit(function(e) {
            if( $('input[name="hqlocation"]').val().length === 0 ) {
              e.preventDefault();
              alert('Please Select the location');
            }
        });




$('.companymorebtncompanymorebtn').click(function(e) {
    //var $name       = $(this).data('dname');

});

$('.companyproofbtn').click(function(e) {
  var $proof       = $(this).data('proof');
  $('.userprofilepic').attr('src',$url);

});

$('.companymapbtn').click(function(e) {
  var $url = $(this).data('proofurl');
  $('.theaterproofimage').attr('src',$url);
});





});

// add branch locations
