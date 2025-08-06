<?php 

class newJob extends dbconn {

    // Define methods for adding, updating, deleting applications

    public function createJob($companyName, $postionName, $dateApplied){
        $jobSQL = "INSERT INTO job_app_list (company_name, position, date_applied, job_status)
                   VALUES (?, ?, ?, 4)";
        $jobDE = array($companyName, $postionName, $dateApplied);
        $jobSTMT = $this->connect()->prepare($jobSQL);
        $jobSTMT->execute($jobDE);
        
        header("location: ../index.php");
        exit();
    }

    public function viewData(){
        $apps = "SELECT * FROM job_app_list ORDER BY job_status ASC";
        $appSTMT = $this->connect()->prepare($apps);
        $appSTMT->execute();
        $dataRet = $appSTMT->fetchAll();
        return $dataRet;
    }

    public function updateData($status, $compID){
        $upStats = "UPDATE job_app_list SET job_status = ? WHERE jobID = ?";
        $upDE = array($status, $compID);
        $upSTMT = $this->connect()->prepare($upStats);
        $upSTMT->execute($upDE);

        header("location: ../job-description.php?compID=$compID");
        exit();
    }

    public function viewDesc($compIDs){
        $viewDesc = "SELECT * FROM job_app_list WHERE jobID = ?";
        $descDE = array($compIDs);
        $descSTMT = $this->connect()->prepare($viewDesc);
        $descSTMT->execute($descDE);
        $dataRet = $descSTMT->fetch();
        
        return $dataRet;
        // header("location: ../job-description.php");
        // exit();
    }

    public function viewJobDesc($jobDescID){
        $info = "No Information Found!";
        
        $desc = "SELECT * FROM job_descriptions WHERE jobID = ?";
        $descsDE = array($jobDescID);
        $descSTMT = $this->connect()->prepare($desc);
        $descSTMT->execute($descsDE);

        $countRes = $descSTMT->rowCount();
        $dataRes = $descSTMT->fetch();
        if($countRes == 0 || $countRes == null){
            return $info;
        }else{
            return $dataRes;
        }


    }

    public function addJobDesc($jobID, $jobDesc, $jobSal){

        //Improved Code Here

        $SQL = "SELECT * FROM job_descriptions WHERE jobID = ?";
        $DE = array($jobID);
        $STMT = $this->connect()->prepare($SQL);
        $STMT->execute($DE);

        $ROW = $STMT->rowCount();
        $RES = $STMT->fetch();
        
        if($RES['isEdit'] == 0 && $ROW == 0){

            $descSQL = "INSERT INTO job_descriptions(jobID, job_desc, job_salary, isEdit)
                        VALUES(?,?,?,1)";
            $descDE = array($jobID, $jobDesc, $jobSal);
            $descSTMT = $this->connect()->prepare($descSQL);
            $descSTMT->execute($descDE);

            header("location: ../job-description.php?compID=$jobID");
            exit();

        }elseif($RES['isEdit'] == 1 && $ROW > 0){
            
            $descSQL = "UPDATE job_descriptions SET job_desc = ?, job_salary = ? WHERE jobID = ? AND isEdit = 1";
            $descDE = array( $jobDesc, $jobSal, $jobID);
            $descSTMT = $this->connect()->prepare($descSQL);
            $descSTMT->execute($descDE);

            header("location: ../job-description.php?compID=$jobID");
            exit();

        }else{
            if($jobID == null || $jobDesc == null || $jobSal == null){
                header("location: ../index.php?Err=Entries_Empty");
            }
        }


    }

    //DB Validation

    // public function ifCompanyExist($companyName){
    //     $compDupSQL = "SELECT * FROM job_app_list WHERE company_name = ?;";
    //     $compDE = array($companyName);
    //     $compSTMT = $this->connect()->prepare($compDupSQL);

    //     if(!$compSTMT->execute($compDE)){
    //         $compSTMT = null;
    //         header("location: ../index.php?Err=Failed to find");
    //         exit();
    //     }

    //     $compRes = null;
    //     if($compSTMT->rowCount() == 0){
    //         $compRes = false;
    //     } else{
    //         $compRes = true;
    //     }

    // }
    



}


?>