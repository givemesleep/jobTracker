<?php 

//Includes DB, Model, Controller
require_once "../model/db.class.php";
require_once "../model/app.class.php";
require_once "../controller/app.ctrl.php";


//To ADD Job Application
if(isset($_POST['new_job'])){
//Issets
$comp = $_POST['company'];
$pos = $_POST['position'];
$date = $_POST['applydate'];

//New Instance
$newJob = new jobCtrl($comp, $pos, $date);
$newJob->addApplication();

//header
header("location: ../index.php");   
}


//TO Update Job Status
if(isset($_GET['statusID']) && isset($_GET['compID'])){
    $statusID = $_GET['statusID']; 
    $userID = $_GET['compID'];

    if($statusID == 1 || $statusID == 2 || $statusID == 3 || $statusID == 4){
        $UpStats = new updateCtrl($userID, $statusID);
        $UpStats->updateJob();
    }else{
        header("location: ../index.php?Err=Invalid_Number");
    }


}

//To View Details for especific job
if(isset($_GET['settingsID'])){
    $compID = $_GET['settingsID'];

    $jobDesc = new viewData($compID);
    $jobDesc->viewJob();

    header("location: ../job-description.php?compID=$compID");
}

if(isset($_POST['job_desc'])){
    $jobID = $_POST['jobIDs'];
    $descript = $_POST['description'];
    $salary = $_POST['salaries'];

    $jobDescs = new addDescription($jobID, $descript, $salary);
    $jobDescs->addDescription();
}


?>