$(document).on("click", ".editdepobtn", function () {
    var $id = $(this).data('id');
    var $department = $(this).data('department');
    $(".depoideditfield").val($id);
    $(".deponameeditfield").val($department);
});

$(document).on("click", ".deletedepobtn", function () {
    var $id = $(this).data('id');
    $(".depoiddelfield").val($id);
});

$(document).on("click", ".changestatusbtn", function () {
    var $id = $(this).data('id');
    var $status = $(this).data('status');
    $('.depoinsertbyfield').val($status);
    $(".depoidfield").val($id);
});


$(document).on("click", ".editcoursebtn", function () {
    var $id = $(this).data('id');
    var $course = $(this).data('course');
    var $depo = $(this).data('department');
    $('.depoinsertbyfield').val($status);
    $(".courseidfield").val($id);
});


$(document).on("click", ".deletecoursebtn", function () {
    var $id = $(this).data('id');
    $(".courseiddelfield").val($id);
});


$(document).on("click", ".editQAbtn", function () {
  var $id = $(this).data('qaid');
  var $question = $(this).data('qaquest');
  var $answer = $(this).data('qaans');
  var $depo = $(this).data('qadepo');
  $(".editQAid").val($id);
  $(".editQAquestion").val($question);
  $(".editQAanswer").val($answer);
  $(".editQAanswer").val($depo);
});



$(document).on("click", ".delQAbtn", function () {
  var $id = $(this).data('qaid');
  $(".delQAid").val($id);
});




$(document).ready(function() {
    $("input[name$='durationselection']").click(function() {
        var test = $(this).val();
        $("div.durationdropdown").hide();
        $("#" + test).show();
    });


});
