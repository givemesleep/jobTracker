<?php 

//Includes DB, Model, Controller
require_once "../model/db.class.php";
require_once "../model/app.class.php";
require_once "../controller/app.ctrl.php";

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

?>