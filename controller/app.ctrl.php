<?php 

class jobCtrl extends newJob {

    
    //Create a private or public method
    private $companyName;
    private $postionName;
    private $dateApplied;

    //Create a constructor
    public function __construct( $workCompany, $workPosition, $applyDate) {
        $this->companyName = $workCompany;
        $this->postionName = $workPosition;
        $this->dateApplied = $applyDate;
    }


    public function addApplication(){

        $this->createJob($this->companyName, $this->postionName, $this->dateApplied);
    }

    public function updateApplication(){
        
        // $this->updateData($this->jobID, $this->jobStatus);
    }

    //Validation methods


}

class updateCtrl extends newJob{

  private $compID;
  private $jobStats;
  
  public function __construct( $comID, $jobStat ){
    $this->compID = $comID;
    $this->jobStats = $jobStat;
  }

  //To Update

  public function updateJob(){

    $this->updateData($this->jobStats, $this->compID);
  }

  //To validate

}


//View
class viewData extends newJob{
  private $ID; 

  public function __construct($compid){
    $this->ID = $compid;
  }

  public function viewJob(){

    $this->viewDesc($this->ID);
  }

}

?>