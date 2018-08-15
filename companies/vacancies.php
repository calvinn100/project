<?php
include './includes/header.php';
$companydepartments = explode(',', $departments);
$companydeposize = sizeof($companydepartments);
$companyworktypes = explode(',', $worktypes);
$companyworktypesize = sizeof($companyworktypes);
$alljobvacancies = $functions->getAllJObVacanciesByCompanyId($loginid);

?>


  <h4 class="text-center">Vacancies</h4>

  <form class="" action="../actions.php?action=addVacancy" method="post">
  <input required type="text" name="userid" value="<?=$loginid?>" class="hidden">
    <div class="form-group">
        <div class="col-xs-12">
          <label>Departments</label>
        </div>
        <div class="col-xs-12">
        <?php for($i=0;$i<$companydeposize;$i++) {
            $depoid = $companydepartments[$i];
            $depodata = $functions->getDepartmentById($depoid);
            $deponame = $depodata[0]['name'];
          ?>
          <div class="col-xs-3 checkboxcontainer companydeposinvacancy">
            <input type="checkbox" class="companydepocheckbox "  name="companyDepos[]" value="<?=$depoid?>"> &nbsp;
            <div><?=$deponame?></div>
          </div>
        <?php } ?>
      </div>
    </div>

    <div class="form-group">
        <div class="col-xs-12"  style="padding-top:15px;">
          <label>Work Types</label>
        </div>
        <div class="col-xs-12">
        <?php for($i=0;$i<$companyworktypesize;$i++) {
            $typeid = $companyworktypes[$i];
            $typedata = $functions->getWorkTypeById($typeid);
            $typename = $typedata[0]['name'];
          ?>
          <div class="col-xs-3 checkboxcontainer companyworktypesinvacancy">
            <input type="checkbox" class="companydepocheckbox"  name="worktype[]" value="<?=$typeid?>"> &nbsp;
            <div><?=$typename?></div>
          </div>
        <?php } ?>
      </div>
    </div>

        <div class="form-group">
          <div class="col-xs-12"  style="padding-top:15px;">
            <label>Vacancy For</label>
          </div>
          <div class="col-xs-9">
            <input required type="text" name="vacancyfor" class="form-control" placeholder="Vacancy for the post of">
          </div>
        </div>

    <div class="form-group">
      <div class="col-xs-12"  style="padding-top:15px;">
        <label>Job Description</label>
      </div>
      <div class="col-xs-9">
        <textarea required class="form-control" name="jobdescription" rows="8" placeholder="Please Enter Job Description" cols="80"></textarea>
      </div>
    </div>
    <div class="form-group" >
      <div class="col-xs-12"  style="padding-top:15px;">
        <label>Job Vacancies</label>
      </div>
      <div class="col-xs-9">
        <input required type="number" class="form-control" name="vacancy" placeholder="Please enter number of vacancies">
      </div>
    </div>
    <div class="form-group">
      <div class="col-xs-12" style="padding-top:15px;">
          <button type="submit" id="addCompanyVacancy" class="btn btn-default ">Enter Job Vacancy</button>

      </div>
    </div>


  </form>
<div class="col-xs-12">
  <h4 class="text-center page-header"  style="padding-top:25px;">Posted vacancies</h4>
</div>
<div class="col-xs-12">
  <?php
    foreach($alljobvacancies as $jobvacancies){
      $vacancyid = $jobvacancies['id'];
      $depoid = $jobvacancies['departmentid'];
      $job = $jobvacancies['job'];
      $worktypesid = $jobvacancies['worktypesid'];
      $description = $jobvacancies['description'];
      $vacancies = $jobvacancies['vacancies'];
      if(strlen($job)>=30){
        $job = substr($job, 0, 30);
        $job = $job.'...';
      }
      $depoid = explode(',', $depoid);

   ?>
  <div class="col-xs-4" style="padding:10px">
    <div class="col-xs-12" style="padding:5px;border:1px solid #d7d7d7;border-radius:5px">
      <div class="col-xs-12" style="font-size:16px;font-weight:600;padding:5px;text-transform:capitalize"><?=$job?></div>
      <div class="col-xs-12" style="font-size:12px;padding:2px 5px;text-transform:capitalize">
        <?php
          for($i=0;$i<sizeof($depoid);$i++){
            $depoid = $functions->getDepartmentById($depoid[$i]);
            $deponame = $depoid[0]['name'];
          }
          echo $deponame;
         ?>
      </div>
      <div class="col-xs-12" style="font-size:12px;padding:2px 5px" ><?='No. of vacancies :'.$vacancies?></div>
      <div class="col-xs-12 viewmorevacancybtn" style="font-size:12px;padding:2px 5px;color:blue;cursor:pointer"  data-vacancyid='<?=$vacancyid?>' data-toggle="modal" data-target='#viewMoreAboutVacancy'>
        View More
      </div>
    </div>
  </div>
  <?php } ?>

</div>


<?php include './includes/footer.php'; ?>

<div class="modal fade" id="viewMoreAboutVacancy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Vacancy Details</h4>
      </div>
      <div class="modal-body vacancydata">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
