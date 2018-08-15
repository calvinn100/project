<?php

require_once('DbConnection.php');

class Functions extends DbConnection {

/** Common functions **/
  public function emailCheck($email) {
    $useremailcheck = $this->selectUserByEmail($email);
    if($useremailcheck) {
    			return FALSE;
    }else{
        $theateremailcheck = $this->selectTheaterDataByEmail($email);
        if($theateremailcheck){
        			return FALSE;
        }else{
          			return TRUE;
        }
    }
}

public function userLogin($email,$password) {
  $table = 'users';
  $user = $this->loginCheck($table,$email, $password);
	if($user) {
			$type = 'users';
			$userid = $user[0]['id'];
			return array($userid,$type);
		}
		else {
        $table = 'college';
				$college = $this->loginCheck($table,$email, $password);
				if($college) {
						$type = 'colleges';
						$userid = $college[0]['id'];
						return array($userid,$type);
					}
					else {
              $table = 'companies';
							$companies = $this->loginCheck($table,$email, $password);
							if($companies) {
									$type = 'companies';
									$userid = $companies[0]['id'];
									return array($userid,$type);
								}
								else {
                  $table = 'admin';
                  $admin = $this->loginCheck($table,$email, $password);
    							if($admin) {
    									$type = 'admin';
    									$userid = $admin[0]['id'];
    									return array($userid,$type);
    								}else{
                        return FALSE;
                      }
									}
						  }
				  }
	    }


public function loginCheck($table,$email,$password) {
  $query = "SELECT * FROM $table WHERE email='$email' AND password= '$password'";
  $output = $this->getData($query);
	return $output;
}

public function oldPasswordCheck($table,$password,$loginid) {
    $query = "SELECT * FROM $table WHERE password='$password' AND id= '$loginid'";
    $output = $this->getData($query);
  	return $output;
}


public function passwordChange($table,$new,$loginid){
	$query  = "UPDATE $table SET password = '$new' WHERE id = '$loginid'" ;
	$output = $this->setData($query);
	return $output;
}




public function changeStatus($id,$table,$status) {
	$query  = "UPDATE $table SET status = '$status' WHERE id = $id" ;
	$output = $this->setData($query);
	return $output;
}

public function delete($table,$id) {
		$query = "DELETE FROM $table WHERE id=$id";
		$output = $this->setData($query);
		return $output;
}

public function pagenations($selectedfunction,$table,$pagelimit,$status='') {
	$count = count($selectedfunction);
	$pagelimit = $pagelimit;
	$total_page_no = ceil($count / $pagelimit);
	if(!isset($_GET['page'])) { $page = 1; }
	else { $page = $_GET['page']; }
	$limitstart = (($page-1)*$pagelimit);
	$pagenatedoutput = $this->selectAllwithstatus($table,$status,$limitstart,$pagelimit,$status);
	$returnvalues = array($total_page_no,$pagenatedoutput);
	return $returnvalues;
}

public function pageinationPages($total_page_no){?>
	<div class="col-xs-12 text-center">
		<ul class="pagination">
			<?php for($i=1;$i<=$total_page_no;$i++) { ?>
			<li><a href="?page=<?=$i?>"><?=$i?></a></li>
			<?php }?>
		</ul>
	</div>
<?php
}


public function selectallwithstatus($table,$status,$limitstart,$limitend) {
	if($status === '') { $query = "SELECT * FROM $table order by id desc LIMIT $limitstart,$limitend "; }
	else {$query = "SELECT * FROM $table WHERE status='$status' order by id desc LIMIT $limitstart,$limitend "; }
  return $this->getData($query);
}

/** Common functions  Ends**/

/**Departments*/
public function addDepartments($department,$insertby) {
  $query = "INSERT INTO departments SET name='$department', insertby='$insertby'" ;
  $output = $this->setData($query);
  return $output;
}

public function getAllDepartments() {
  $query = "SELECT * FROM departments" ;
  $output = $this->getData($query);
  return $output;
}


public function getAllDepartmentsInDescendingOrder() {
  $query = "SELECT * FROM departments ORDER BY id DESC";
  $output = $this->getData($query);
  return $output;
}


public function getAllDepartmentsByStatusAndOrder($insertby='admin',$order='DESC') {
  $query = "SELECT * FROM departments WHERE insertby='$insertby' ORDER BY id $order";
  $output = $this->getData($query);
  return $output;
}



public function getApprovedDepartments() {
  $query = "SELECT * FROM departments WHERE insertby='admin'" ;
  $output = $this->getData($query);
  return $output;
}



public function getApprovedDepartmentById($id) {
  $query = "SELECT * FROM departments WHERE insertby='admin' AND id=$id" ;
  $output = $this->getData($query);
  return $output;
}


public function getDepartmentById($id) {
  $query = "SELECT * FROM departments WHERE id='$id'" ;
  $output = $this->getData($query);
  return $output;
}

public function updateDepartments($id,$department) {
  $query = "UPDATE departments SET name='$department' WHERE id='$id'";
  $output = $this->setData($query);
  return $output;
}

public function updateDepoStatus($id,$insertby) {
  $query = "UPDATE departments SET insertby='$insertby' WHERE id='$id'";
  $output = $this->setData($query);
  return $output;
}


/**Courses*/
public function getAllCoursesInDescendingOrder() {
  $query = "SELECT * FROM courses ORDER BY id DESC";
  $output = $this->getData($query);
  return $output;
}
public function getCoursesById($courseid) {
  $query = "SELECT * FROM courses WHERE id='$courseid'";
  $output = $this->getData($query);
  return $output;
}

public function getCoursesByDepartmentId($depoid) {
  $query = "SELECT * FROM courses WHERE department='$depoid'";
  $output = $this->getData($query);
  return $output;
}

public function getUsersByCourseId($id) {
  $query = "SELECT * FROM education WHERE course='$id' ORDER BY id DESC";
  $output = $this->getData($query);
  return $output;
}


public function getUsersById($id) {
  $query = "SELECT * FROM users WHERE id='$id' ORDER BY id DESC";
  $output = $this->getData($query);
  return $output;
}



public function getUsersByIdAndStatus($id,$status='approved') {
  $query = "SELECT * FROM users WHERE id='$id' AND status = '$status' ORDER BY id DESC";
  $output = $this->getData($query);
  return $output;
}



public function getAllCoursesInNameOrder() {
  $query = "SELECT * FROM courses ORDER BY name ASC";
  $output = $this->getData($query);
  return $output;
}

public function getApprovedCoursesInDescendingOrder($id) {
  $query = "SELECT * FROM courses WHERE department='$id' ORDER BY id DESC";
  $output = $this->getData($query);
  return $output;
}

public function addCourses($coursename,$department,$duration,$insertby) {
  $query = "INSERT INTO courses SET name='$coursename', department='$department', courseduration = '$duration',insertby='$insertby'" ;
  $output = $this->setData($query);
  return $output;
}

public function addUserEducation($id, $college, $course, $fileupload) {
  $query = "INSERT INTO education SET userid = '$id', college = '$college', course = '$course', certificates = '$fileupload'";
  $output = $this->setData($query);
  return $output;
}

public function getUserEducation($order='ASC') {
  $query = "SELECT * FROM education ORDER BY id $order";
  $output = $this->getData($query);
  return $output;
}

/**Question answers*/
public function getAllQa() {
  $query = "SELECT * FROM interviewquestions";
  $output = $this->getData($query);
  return $output;
}

public function getQAbyId($id) {
  $query = "SELECT * FROM interviewquestions WHERE id='$id'";
  $output = $this->getData($query);
  return $output;
}

public function getQAbyDepartment($depoid) {
  $query = "SELECT * FROM interviewquestions WHERE companydepartment='<?=$depoid?>'";
  $output = $this->getData($query);
  return $output;
}

public function setQA($question,$answer,$depoid) {
  $query = "INSERT INTO interviewquestions SET question='$question',answer='$answer',companydepartment='$depoid'";
  $output = $this->setData($query);
  return $output;
}

public function updateQA($id,$question,$answer,$depoid) {
  $query  = "UPDATE interviewquestions SET question='$question',answer='$answer',companydepartment='$depoid' WHERE id = '$id'" ;
  $output = $this->setData($query);
  return $output;
}

/**Company Departments*/
public function getAllCompanyTypes($order='ASC') {
  $query = "SELECT * FROM companyworktype ORDER BY id $order";
  $output = $this->getData($query);
  return $output;
}

public function getAllCompanyDepartments($order='ASC') {
  $query = "SELECT * FROM companydepartments ORDER BY id $order";
  $output = $this->getData($query);
  return $output;
}

public function delCompanydepoByTypeid($id) {
  $query = "DELETE FROM companydepartments WHERE type=$id";
  $output = $this->setData($query);
  return $output;
}
public function getCompanyTypesById($id) {
  $query = "SELECT * FROM companyworktype WHERE id='$id'";
  $output = $this->getData($query);
  return $output;
}
public function getAllCompanydepoByTypeid($id) {
  $query = "SELECT * FROM companydepartments WHERE type='$id'";
  $output = $this->getData($query);
  return $output;
}

public function getCompanyTypesByStatus($status) {
  $query = "SELECT * FROM companyworktype WHERE status='$status'";
  $output = $this->getData($query);
  return $output;
}

public function setCompanyType($departments,$type,$status) {
  $query = "INSERT INTO companyworktype SET department='$departments',name='$type',status='$status'";
  $output = $this->setData($query);
  return $output;
}

public function setCompanyDepartments($type,$departments,$status) {
  $query = "INSERT INTO companydepartments SET type='$type',department='$departments',status='$status'";
  $output = $this->setData($query);
  return $output;
}

public function updateCompanyType($id,$type) {
  $query  = "UPDATE companytype SET name='$type' WHERE id = '$id'" ;
  $output = $this->setData($query);
  return $output;
}

public function updateCompanyTypeStatus($id,$status) {
  $query  = "UPDATE companytype SET status='$status' WHERE id = '$id'" ;
  $output = $this->setData($query);
  return $output;
}

public function companyRegistration($name,$description,$companydepos,$worktypes,$companyphone,$companyemail,$companyaddress,$hqlocation,$latitude,$longitude,$city,$state,$country,$companyproofpath,$companydppath,$verificationcode,$status,$mailverification) {
  $query = "Insert into companies set name              = '$name',"
          . "                        companydescription = '$description',"
          . "                        proof              = '$companyproofpath',"
          . "                        profilepic         = '$companydppath',"
          . "                        departments        = '$companydepos',"
          . "                        worktypes          = '$worktypes',"
          . "                        phone              = '$companyphone',"
          . "                        email              = '$companyemail',"
          . "                        password           = '$verificationcode',"
          . "                        address            = '$companyaddress',"
          . "                        hqlocation         = '$hqlocation',"
          . "                        hqlatitude         = '$latitude',"
          . "                        hqlongitude        = '$longitude',"
          . "                        city               = '$city',"
          . "                        state              = '$state',"
          . "                        country            = '$country',"
          . "                        status             = '$status',"
          . "                        mailverification   = '$mailverification'";
          $output = $this->setData($query);
          return $output;
}

public function collegeRegistration($name,$description,$collegephone,$collegeemail,$verificationcode,$collegeaddress,$collegelocation,$city,$state,$country,$latitude,$longitude,$collegetype,$colgdepos,$colgcourses,$collegeproofpath,$collegedppath,$status,$verificationcode) {
  $query = "Insert into college set name         = '$name',"
        . "                         description  = '$description',"
        . "                         address      = '$collegeaddress',"
        . "                         affiliation  = '$collegeproofpath',"
        . "                         profilepic   = '$collegedppath',"
        ."                          location     = '$collegelocation',"
        ."                          city         = '$city',"
        ."                          state        = '$state',"
        ."                          country      = '$country',"
        . "                         latitude     = '$latitude',"
        . "                         longitude    = '$longitude',"
        . "                         phone        = '$collegephone',"
        . "                         email        = '$collegeemail',"
        . "                         password     = '$verificationcode',"
        . "                         collegetype  = '$collegetype',"
        . "                         departments  = '$colgdepos',"
        . "                         courses      = '$colgcourses',"
        . "                         status       = '$status'";
        $output = $this->setData($query);
        return $output;
}


public function userregistration($name,$email,$phone,$verificationcode,$profileimage,$status,$gender) {
  $query = "Insert into users set name         = '$name',"
          . "                     email        = '$email',"
          . "                     phone        = '$phone',"
          . "                     password     = '$verificationcode',"
          . "                     profileimage = '$profileimage',"
          . "                     status       = '$status',"
          . "                     gender       = '$gender',"
          . "                     mailverification  = 'not verified'";
  $output = $this->setData($query);
  return $output;
}

public function getCompanyTypeByName($type) {
  $query = "SELECT * FROM companyworktype WHERE name='$type'" ;
  $output = $this->getData($query);
  return $output;
}

public function getCompanyDataById($id) {
  $query = "SELECT * FROM companies WHERE id='$id'" ;
  $output = $this->getData($query);
  return $output;
}

public function getUserDataById($id) {
  $query = "SELECT * FROM users WHERE id='$id'" ;
  $output = $this->getData($query);
  return $output;
}

public function getEducationDataByUserId($id) {
  $query = "SELECT * FROM education WHERE userid='$id'" ;
  $output = $this->getData($query);
  return $output;
}

public function getAllApprovedColleges($order='ASC') {
  $query = "SELECT * FROM college ORDER BY id $order";
  $output = $this->getData($query);
  return $output;
}


public function getAllCompanies($order='ASC') {
  $query = "SELECT * FROM companies ORDER BY id $order";
  $output = $this->getData($query);
  return $output;
}


public function getAllCompanyTypesByStatusAndOrder($status='approved',$order='ASC') {
  $query = "SELECT * FROM companyworktype WHERE status='$status' ORDER BY id $order";
  $output = $this->getData($query);
  return $output;
}


public function getWorkTypeById($typeid) {
  $query = "SELECT * FROM companyworktype WHERE id='$typeid'";
  $output = $this->getData($query);
  return $output;
}


public function getApprovedWorkTypeByDepo($depoid) {
  $query = "SELECT * FROM companyworktype WHERE department='$depoid' AND status='approved'";
  $output = $this->getData($query);
  return $output;
}

public function getAllApprovedCollegeTypes() {
  $query = "SELECT * FROM collegetypes WHERE status='approved'";
  $output = $this->getData($query);
  return $output;
}

public function changeMailVerificationStatus($table,$id,$status='verified') {
  $query  = "UPDATE $table SET mailverification = '$status' WHERE id = $id" ;
	$output = $this->setData($query);
	return $output;
}

public function changeToNewPassword($loginid,$table,$mailverification) { ?>
  <script type="text/javascript">
  <?php
    if($mailverification === 'not verified') {?>
      $(document).ready(function(){
            $('#changeNewPassword').modal({
                backdrop: 'static',
                keyboard: false
            });
              $('#changeNewPassword').modal('show');
          });
    <?php } ?>
  </script>

    <div class="modal fade" id="changeNewPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <form action="../actions.php?action=firstPasswordChange" method="post">
                <input  type="text" class="form-control hidden" name="passchangeid" value="<?=$loginid?>" >
                <input  type="text" class="form-control hidden" name="table" value="<?=$table?>" >
                <label>New Password</label>
                <input type="password" class="form-control" name="newpassword" >
                <br>
                <label>Re enter new Password</label>
                <input type="password" class="form-control" name="renewpassword" >
                <br>
                <button type="submit" class="btn btn-primary">Change Password</button>
            </form>
          </div>
        </div>
      </div>
    </div>
<?php }

public function statusModal($status) { ?>
    <script type="text/javascript">
    <?php
      if($status !== 'approved') {?>
        $(document).ready(function(){
              $('#statusModal').modal({
                  backdrop: 'static',
                  keyboard: false
              });
                $('#statusModal').modal('show');
            });
      <?php } ?>
    </script>
      <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body text-center">
              <?php if($status === 'blocked'){ ?>
                <br>
                <h3>Your account has been blocked</h3>
                <p>Please contact the admin</p>
                <br>
              <?php } if($status === 'pending'){?>
                <br>
                <h3>Your account has not been approved by admin</h3>
                <p>You can access the features after the admin verification only</p>
                <br>
            <?php } ?>
            </div>
          </div>
        </div>
      </div>
<?php }

public function getCollegeCoursesByCollegeId($collegeid) {
  $query = "SELECT * FROM college WHERE id='$collegeid'";
  $output = $this->getData($query);
  return $output;
}

public function getCollegeDataById($id) {
  $query = "SELECT * FROM college WHERE id='$id'";
  $output = $this->getData($query);
  return $output;
}


public function changeCompanyDesc($id,$desc) {
  $query  = "UPDATE companies SET companydescription = '$desc' WHERE id = '$id'" ;
	$output = $this->setData($query);
	return $output;
}

public function addCompanyVacancy($id,$depos,$worktypes,$job,$aboutjob,$vacancy){
  $query = "Insert into vacancies set companyid         = '$id',"
          . "                        departmentid       = '$depos',"
          . "                        job                = '$job',"
          . "                        worktypesid        = '$worktypes',"
          . "                        description        = '$aboutjob',"
          . "                        vacancies          = '$vacancy'";
          $output = $this->setData($query);
          return $output;
}

public function getAllJObVacanciesByCompanyId($id){
$query = "SELECT * FROM vacancies WHERE companyid = '$id'";
$output = $this->getData($query);
return $output;
}

public function getAllVacanciesById($id){
$query = "SELECT * FROM vacancies WHERE id = '$id'";
$output = $this->getData($query);
return $output;
}


public function getCompaniesIntrestToUserById($userprofileid,$loginid){
  $query = "SELECT * FROM companiesintrestedinusers WHERE companyid='$loginid' AND userid='$userprofileid'";
  $output = $this->getData($query);
  return $output;
}


public function setCompanyInterest($userid,$companyid){
  $query = "INSERT INTO companiesintrestedinusers SET companyid = '$companyid',"
         . "                                          userid    = '$userid'";
          $output = $this->setData($query);
          return $output;
}

public function getSkillsByUserId($userid) {
  $query = "SELECT * FROM skills WHERE userid='$userid' ORDER BY skill";
  $output = $this->getData($query);
  return $output;
}
public function getSkillsByUserIdAndSkillName($userid,$skill) {
  $query = "SELECT * FROM skills";
  print_r($query);
  exit();
  $output = $this->getData($query);
  return $output;
}

public function addUserSkills($userid,$skills){
  $query = "INSERT INTO skills SET userid = '$userid', skill    = '$skills'";
          $output = $this->setDataAndReturnLastInsertId($query);
          return $output;
}


} ?>
