$(document).ready(function(){
	$("#menu-toggle").click(function(e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
	});

	$('.addeducationcolleges').change(function(){
			var collegeid = $(this).val();
			if(collegeid){
					$.ajax({
							type:'POST',
							url:'../ajaxData.php',
							data:{'type':'changecoursebydepo','collegeid':collegeid},
							success:function(e){
									$('.addeducationcourses').html(e);
							}
					});
			}else{
					$('.addeducationcourses').html('<option value="">Select Course first</option>');
			}
		});
	});



		$(document).on("click", ".viewmorevacancybtn", function () {
			var vacancyid = $(this).data('vacancyid');
			if(vacancyid){
					$.ajax({
							type:'POST',
							url:'../ajaxData.php',
							data: {'type':'vacancydatas','vacancyid':vacancyid},
							success:function(data){
								console.log(data);
								$('.vacancydata').html(data);
						}
					});
			}else{
					$('.vacancydata').html('Please select a vacancy');
			}
		});



			$(document).on("click", ".expressintrestbtn", function () {
				var userid = $(this).data('userid');
				var companyid = $(this).data('companyid');
				if(companyid){
						$.ajax({
								type:'POST',
								url:'../ajaxData.php',
								data: {'type':'sendinterestmail','userid':userid,'companyid':companyid},
								success:function(data){
									console.log(data);
									$('.showalert').html(data);
							}
						});
				}else{
						$('.showalert').html('Please select a vacancy');
				}
			});



						$(document).on("click", "#addskillbtn", function () {
							var userid = $('.userid').val();
							var skills = $('.addskillfield').val();
							$.ajax({
									type:'POST',
									url:'../ajaxData.php',
									data: {'type':'addskills','userid':userid,'skills':skills},
									success:function(data){
										console.log(data);
										$('.skillshowcontainer').html(data);
								}
							});
						});




$('#interestalreadyadded').delay(5).fadeOut('slow');

  $('#addCompanyVacancy').click(function(e) {
    depochecked = $('.companydeposinvacancy :checkbox:checked').length ;
    courses      = $('.companyworktypesinvacancy :checkbox:checked').length ;
    if(!depochecked || !courses) {
      e.preventDefault();
      alert("You must select atleast one from the given");
      return false;
    }
  });

	$(document).on("click", ".viewusercertibtn", function () {
	    var $course = $(this).data('course');
	    var $certi = $(this).data('certificates');
			$certi = '.'+$certi;
			$('.usercoursecerti').attr('src',$certi);
   	$(".usercoursename").text($course);
	});
