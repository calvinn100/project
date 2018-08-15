<?php
require './libs/Functions.php';
require './libs/Common.php';
require './libs/Mails.php';
$mails = new Mails();
$functions = new Functions();
$common = new Common();

if (!empty($_REQUEST)) {
    $action = $_REQUEST['action'];



/***************************   SETTINGS AND MISC ******************************/

if ($action === 'logincheck') {
    $ipaddress = getHostByName(getHostName());
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = $functions->userLogin($email,$password);
    if($result) {
      $userid = $result[0];
      $type = $result[1];
      if($type !== 'admin'){ $sendnotification =  $mails->loginNotification($email,$ipaddress); }
      session_start();
      if (!empty($_SESSION)) { session_destroy(); }
      $_SESSION['logintype'] = $type;
      $_SESSION['id'] = $userid;
      echo '<script type="text/javascript">';
			echo 'alert("Welcome user");';
      echo 'window.location="'.$type.'/index.php"' ;
	    echo '</script>';
		}else{
			echo '<script type="text/javascript">';
			echo 'alert("Username and password are not matching");';
      echo 'window.location="./index.php"' ;
      echo '</script>';
		}
}

if ($action === 'logout') {
    session_start();
    $page = $_SESSION['logintype'];
    $_SESSION = array(); // Unset all of the session variables.
    if(empty($_SESSION)){
      session_destroy();
      echo '<script type="text/javascript">';
      echo 'alert("See you again");';
      echo 'window.location="./index.php";';
      echo '</script>';
    }else{
      echo '<script type="text/javascript">';
      echo 'alert("Error");';
      echo 'window.location="./'.$page.'/index.php";';
      echo '</script>';
    }
  }

if ($action === 'changepassword') {
      session_start();
      $loginid = $_SESSION['id'];
      $logintype = $_SESSION['logintype'];
      $table = $_POST['table'];
      $old = $_POST['oldpassword'];
      $new = $_POST['newpassword'];
      $re = $_POST['reenterpassword'];
      $oldpasscheck = $functions->oldPasswordCheck($table,$old,$loginid);
    if($oldpasscheck) {
      $email = $oldpasscheck[0]['email'];
      $name = $oldpasscheck[0]['name'];
        if($new === $re) {
          $passwordupdate = $functions->passwordChange($table,$new,$loginid);
          if($passwordupdate){
            $mailsubject = 'Carrer Project Password Change Notification';
            $notificationtype = 'password';
            $notificationmail = $mails->notificationmail($mailsubject,$name,$notificationtype,$new,$email);
            echo '<script type="text/javascript">';
            echo 'alert("Passwords updated");';
            echo 'window.location="./'.$logintype.'/settings.php";';
            echo '</script>';
          }
        }else{
          echo '<script type="text/javascript">';
          echo 'alert("Passwords not matching");';
          echo 'window.location="./'.$logintype.'/settings.php";';
          echo '</script>';
        }
      }else{
        echo '<script type="text/javascript">';
        echo 'alert("Old password is incorrect");';
        echo 'window.location="./'.$logintype.'/settings.php";';
        echo '</script>';
      }
}

if ($action === 'changeStatus') {
	$id = $_POST['id'];
	$insertby = $_POST['insertby'];
	$result = $functions->updateDepoStatus($id,$insertby);
  	if($result) {
  		echo '<script type="text/javascript">';
  		echo 'alert("Department Status Changed");';
  		echo 'window.location="./admin/departments.php";';
  		echo '</script>';
  	}else{
  		echo '<script type="text/javascript">';
  		echo 'alert("Error");';
  		echo 'window.location="./admin/departments.php";';
  		echo '</script>';
  	}
}



/***************************  Courses ********************************/

if ($action === 'addCourse') {
  $department = $_POST['department'];
  $coursename = $_POST['coursename'];
  $duration = $_POST['courseduration'];
  $insertby = $_POST['insertby'];
  $result = $functions->addCourses($coursename,$department,$duration,$insertby);
    if($result) {
      echo '<script type="text/javascript">';
      echo 'alert("Course Added");';
      echo 'window.location="./admin/courses.php";';
      echo '</script>';
    }else{
      echo '<script type="text/javascript">';
      echo 'alert("Error");';
      echo 'window.location="./admin/courses.php";';
      echo '</script>';
    }
}

if ($action === 'deleteCourse') {
  $id = $_POST['courseid'];
  $table = 'courses';
	$result = $functions->delete($table,$id);
  	if($result) {
  		echo '<script type="text/javascript">';
  		echo 'alert("Course Deleted");';
  		echo 'window.location="./admin/courses.php";';
  		echo '</script>';
  	}else{
  		echo '<script type="text/javascript">';
  		echo 'alert("Error");';
  		echo 'window.location="./admin/courses.php";';
  		echo '</script>';
  	}
}



/*************************** Departments *****************************/

if ($action === 'addDepartment') {
  	$name = $_POST['department'];
  	$insertby = $_POST['insertby'];
  	$result = $functions->addDepartments($name,$insertby);
  	if($result) {
  		echo '<script type="text/javascript">';
  		echo 'alert("Department Added");';
  		echo 'window.location="./admin/departments.php";';
  		echo '</script>';
  	}else{
  		echo '<script type="text/javascript">';
  		echo 'alert("Error");';
  		echo 'window.location="./admin/departments.php";';
  		echo '</script>';
  	}
}

if ($action === 'updatedepo') {
  	$id = $_POST['depoid'];
  	$department = $_POST['department'];
  	$result = $functions->updateDepartments($id,$department);
  	if($result) {
  		echo '<script type="text/javascript">';
  		echo 'alert("Department Updated");';
  		echo 'window.location="./admin/departments.php";';
  		echo '</script>';
  	}else{
  		echo '<script type="text/javascript">';
  		echo 'alert("Error");';
  		echo 'window.location="./admin/departments.php";';
  		echo '</script>';
  	}
}

if ($action === 'deletedepo') {
  	$id = $_POST['depoid'];
  	$table = 'departments';
  	$result = $functions->delete($table,$id);
  	if($result) {
  		echo '<script type="text/javascript">';
  		echo 'alert("Department Deleted");';
  		echo 'window.location="./admin/departments.php";';
  		echo '</script>';
  	}else{
  		echo '<script type="text/javascript">';
  		echo 'alert("Error");';
  		echo 'window.location="./admin/departments.php";';
  		echo '</script>';
  	}
}

if ($action === 'addCompanyType') {
  $departments = $_POST['departments'];
  $type = $_POST['type'];
  $status = $_POST['status'];
  $companytypecheck = $functions->getCompanyTypeByName($type);
  if($companytypecheck){
        echo '<script type="text/javascript">';
        echo 'alert("Company type already present");';
        echo 'window.location="./admin/addcompanytypes.php";';
        echo '</script>';
  }else{
      $result = $functions->setCompanyType($departments,$type,$status);
        if($result) {
            echo '<script type="text/javascript">';
            echo 'alert("Company type added");';
            echo 'window.location="./admin/companytypes.php";';
            echo '</script>';
        }else{
            echo '<script type="text/javascript">';
            echo 'alert("Error");';
            echo 'window.location="./admin/companytypes.php";';
            echo '</script>';
          }
        }
      }

if($action === 'addCollegeType') {
    $type = $_POST['type'];
    $status = $_POST['status'];
    $result = $functions->setCollegeType($type,$status);
      if($result) {
          echo '<script type="text/javascript">';
          echo 'alert("College type added");';
          echo 'window.location="./admin/collegetypes.php";';
          echo '</script>';
      }else{
          echo '<script type="text/javascript">';
          echo 'alert("Error");';
          echo 'window.location="./admin/collegetypes.php";';
          echo '</script>';
        }
  }


if ($action === 'addCompanyDepartments') {
  $type = $_POST['type'];
  $department = $_POST['department'];
  $status = $_POST['status'];
  $result = $functions->setCompanyDepartments($type,$department,$status);
  if($result) {
    echo '<script type="text/javascript">';
    echo 'alert("Department Added");';
    echo 'window.location="./admin/companydepartments.php";';
    echo '</script>';
  }else{
    echo '<script type="text/javascript">';
    echo 'alert("Error");';
  //  echo 'window.location="./admin/companydepartments.php";';
    echo '</script>';
  }
}

if ($action === 'updateCompanyType') {
  $id = $_POST['id'];
  $type = $_POST['type'];
  $result = $functions->updateCompanyType($id,$type);
  if($result) {
    echo '<script type="text/javascript">';
    echo 'alert("updated");';
    echo 'window.location="./admin/addcompanytypes.php";';
    echo '</script>';
  }else{
    echo '<script type="text/javascript">';
    echo 'alert("Error");';
    echo 'window.location="./admin/addcompanytypes.php";';
    echo '</script>';
  }
}

if ($action === 'deletecompanytype') {
  $id = $_POST['id'];
  $table = 'companytype';
  $page = $_POST['page'];
  $selectCompanyDepos = $functions->getAllCompanydepoByTypeid($id);
  if($selectCompanyDepos) { $delcompanydepos = $functions->delCompanydepoByTypeid($id);}
  $result  = $functions->delete($table,$id);
  if($result) {
    echo '<script type="text/javascript">';
    echo 'alert("Deleted");';
    echo 'window.location="'.$page.'"' ;
    echo '</script>';
  }else{
    echo '<script type="text/javascript">';
    echo 'alert("Error");';
    echo 'window.location="'.$page.'"' ;
    echo '</script>';
  }

}



/*************************** Registrations ****************************/

if ($action === 'registerCompany') {
          $page = $_POST['currentpage'];
          $name = $_POST['name'];
          $status = $_POST['status'];
          $description = $_POST['description'];
          $companydepos = $_POST['companydepos'];
          $companydepos =  implode(',',$companydepos);
          $worktypes    = $_POST['worktypes'];
          $worktypes = implode(',',$worktypes);
          $companyphone = $_POST['companyphone'];
          $companyemail = $_POST['companyemail'];
          $companyaddress = $_POST['companyaddress'];

          $hqlocation = $_POST['hqlocation'];
          $latitude   = $_POST['latitude_fieldonly'];
          $longitude  = $_POST['longitude_fieldonly'];
          $city       = $_POST['city_fieldonly'];
          $state      = $_POST['state_fieldonly'];
          $country    = $_POST['country_fieldonly'];
          $mailverification = 'not verified';
          $companyproof = 'companyproof';
          $companydp = 'companydp';
          $proofdest = './assets/images/company/proof/';
          $dpdest = './assets/images/company/dp/';
          $verificationcode = $mails->SendPasswordByMail($name,'jeybin@gmail.com');
          if($verificationcode) {
            $companyproofpath = $common->uploads($companyproof,$proofdest);
            $companydppath = $common->uploads($companydp,$dpdest);
            if($companyproofpath && $companydppath){
              $result = $functions->companyRegistration($name,$description,$companydepos,$worktypes,$companyphone,$companyemail,$companyaddress,$hqlocation,$latitude,$longitude,$city,$state,$country,$companyproofpath,$companydppath,$verificationcode,$status,$mailverification);
              if($result) {
        				echo '<script type="text/javascript">';
        				echo 'alert("Company added");';
                echo 'window.location="'.$page.'"' ;
        				echo '</script>';
        			}else{
        				echo '<script type="text/javascript">';
        				echo 'alert("Error");';
                echo 'window.location="'.$page.'"' ;
        				echo '</script>';
        			}
            }else{
              echo '<script type="text/javascript">';
              echo 'alert("file upload error");';
              echo 'window.location="'.$page.'"' ;
              echo '</script>';
            }
          }else{
            echo '<script type="text/javascript">';
            echo 'alert("Verification sending error");';
            echo 'window.location="'.$page.'"' ;
            echo '</script>';
          }
  }

if($action === 'registercollege') {
      $currentpage = $_POST['currentpage'];
      $status = $_POST['status'];
      $name = $_POST['name'];
      $description = $_POST['description'];
      $collegephone = $_POST['collegephone'];
      $collegeemail = $_POST['collegeemail'];
      $collegeaddress = $_POST['collegeaddress'];
      $collegelocation = $_POST['collegelocation'];
      $collegetype = $_POST['collegetype'];
      $collegedepos = $_POST['colegedepos'];
      $colgdepos =  implode(',',$collegedepos);
      $collegecourses = $_POST['courses'];
      $colgcourses =  implode(',',$collegecourses);
      $latitude = $_POST['latitude_fieldonly'];
      $longitude = $_POST['longitude_fieldonly'];
      $collegeproof = 'collegeproof';
      $collegedp = 'collegedp';
      $city = $_POST['city_fieldonly'];
      $state = $_POST['state_fieldonly'];
      $country = $_POST['country_fieldonly'];
      $proofdest = './assets/images/company/proof/';
      $dpdest = './assets/images/company/dp/';
      $verificationcode = $mails->SendPasswordByMail($name,$collegeemail);
      if($verificationcode) {
        $collegeproofpath = $common->uploads($collegeproof,$proofdest);
        $collegedppath = $common->uploads($collegedp,$dpdest);
          if($collegeproofpath && $collegedppath){
          $result = $functions->collegeRegistration($name,$description,$collegephone,$collegeemail,$verificationcode,$collegeaddress,$collegelocation,$city,$state,$country,$latitude,$longitude,$collegetype,$colgdepos,$colgcourses,$collegeproofpath,$collegedppath,$status,$verificationcode);
            if($result) {
                        echo '<script type="text/javascript">';
                        echo 'alert("College added");';
                        echo 'window.location="'.$currentpage.'"' ;
                        echo '</script>';
                      }else{
                        echo '<script type="text/javascript">';
                        echo 'alert("Error");';
                        echo 'window.location="'.$currentpage.'"' ;
                        echo '</script>';
                      }
                    }else{
                      echo '<script type="text/javascript">';
                      echo 'alert("file upload error");';
                      echo 'window.location="'.$currentpage.'"' ;
                      echo '</script>';
                    }
                  }else{
                    echo '<script type="text/javascript">';
                    echo 'alert("Verification sending error");';
                    echo 'window.location="'.$currentpage.'"' ;
                    echo '</script>';
                  }
}

if($action === 'registeruser') {
      $currentpage = $_POST['currentpage'];
      $currentpage = $currentpage.".php";
      $status = $_POST['status'];
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $gender = $_POST['gender'];
      $profilepic = 'profilepic';
      $profileimagedest = './assets/images/users/dp/';
      $verificationcode = $mails->SendPasswordByMail($name,$email);
      if($verificationcode) {
        $profileimage = $common->uploads($profilepic,$profileimagedest);
        if($profileimage){
          $result = $functions->userregistration($name,$email,$phone,$verificationcode,$profileimage,$status,$gender);
          if($result) {
            echo '<script type="text/javascript">';
            echo 'alert("User added please check the mail for the password");';
            echo 'window.location="'.$currentpage.'"' ;
            echo '</script>';
          }else{
            echo '<script type="text/javascript">';
            echo 'alert("Error");';
            echo 'window.location="'.$currentpage.'"' ;
            echo '</script>';
          }
        }else{
          echo '<script type="text/javascript">';
          echo 'alert("file upload error");';
               echo 'window.location="'.$currentpage.'"' ;
          echo '</script>';
        }
      }else{
        echo '<script type="text/javascript">';
        echo 'alert("Verification sending error");';
        echo 'window.location="'.$currentpage.'"' ;
        echo '</script>';
      }
}

/*************************** Registrations End ****************************/

if($action === 'firstPasswordChange') {
    $id = $_POST['passchangeid'];
    $table = $_POST['table'];
    $password = $_POST['newpassword'];
    $repassword = $_POST['renewpassword'];
    if($password === $repassword){
        $result = $functions->passwordChange($table,$password,$id);
        if($result) {
          $functions->changeMailVerificationStatus($table,$id);
          echo '<script type="text/javascript">';
          echo 'alert("passwords updated");';
          echo 'window.location="index.php"' ;
          echo '</script>';
        }else{
          echo '<script type="text/javascript">';
          echo 'alert("Error");';
          echo 'window.location="index.php"' ;
          echo '</script>';
      }
      }else{
        echo '<script type="text/javascript">';
        echo 'alert("passwords not matching");';
        echo 'window.location="index.php"' ;
        echo '</script>';
    }
  }

if ($action === 'changeCompanyDesc') {
  $id = $_POST['loginid'];
  $page = $_POST['page'];
  $about = $_POST['aboutCompany'];
  $result = $functions->changeCompanyDesc($id,$about);
  if($result) {
      echo '<script type="text/javascript">';
      echo 'alert("Data updated");';
      echo 'window.location="'.$page.'";';
      echo '</script>';
    }else{
      echo '<script type="text/javascript">';
      echo 'alert("Error");';
      echo 'window.location="'.$page.'";';
      echo '</script>';
  }
}

if($action === 'addVacancy') {
  $id = $_POST['userid'];
  $depos = $_POST['companyDepos'];
  $worktypes = $_POST['worktype'];
  $aboutjob = $_POST['jobdescription'];
  $job = $_POST['vacancyfor'];
  $vacancy = $_POST['vacancy'];
  $depos = implode(',', $depos);
  $worktypes = implode(',', $worktypes);
  $result = $functions->addCompanyVacancy($id,$depos,$worktypes,$job,$aboutjob,$vacancy);
  if($result) {
      echo '<script type="text/javascript">';
      echo 'alert("Data updated");';
      echo 'window.location="companies/vacancies.php";';
      echo '</script>';
    }else{
      echo '<script type="text/javascript">';
      echo 'alert("Error");';
      echo 'window.location="companies/vacancies.php";';
      echo '</script>';
  }
}

if($action === 'addusereducation') {
  $id = $_POST['userid'];
  $currentpage = $_POST['currentpage'];
  $college =  $_POST['college'];
  $course = $_POST['course'];
  $certificate = 'coursecertificate';
  $dest = './assets/images/users/certificates/';
  $fileupload = $common->uploads($certificate,$dest);
  if($fileupload){
  $result = $functions->addUserEducation($id, $college, $course, $fileupload);
  if($result) {
      echo '<script type="text/javascript">';
      echo 'alert("Education Added");';
      echo 'window.location="'.$currentpage.'";';
      echo '</script>';
    }else{
      echo '<script type="text/javascript">';
      echo 'alert("Error");';
  //    echo 'window.location="'.$currentpage.'";';
      echo '</script>';
    }
  }else{
    echo '<script type="text/javascript">';
    echo 'alert("file upload error");';
//    echo 'window.location="'.$currentpage.'";';
    echo '</script>';

}

}




}

?>
