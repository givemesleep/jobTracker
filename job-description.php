<?php 
require_once 'model/db.class.php';
require_once 'model/app.class.php';

//Fetch Data
$fetchData = new newJob();
$details = $fetchData->viewDesc($_GET['compID']);
$jobDescs = $fetchData->viewJobDesc($_GET['compID']);

$jobID = $details['jobID'];
$company = $details['company_name'];
$dateApplied = date('F d, Y', strtotime($details['date_applied']));
$jobStatus = $details['job_status'];
$statusDesc; 
$rolePostion = $details['position'];

$description = $jobDescs['job_desc'] ?? $jobDescs;
$monSal = $jobDescs['job_salary'] ?? $jobDescs;

switch($jobStatus){
    case 1:
        $statusDesc = "<span class='text-success'>Hired</span>";
    break;
    case 2:
        $statusDesc = "<span class='text-warning'>Interview</span>";
    break;
    case 3:
        $statusDesc = "<span class='text-danger'>Rejected</span>";
    break;
    case 4:
        $statusDesc = "<span class='text-secondary'>No Response</span>";
    break;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'view/titlename.php'; ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

</head>
<body>

    <div class="row">
        <!-- Content goes here -->
        <div class="col-lg-2"></div>

        <div class="col-lg-8">
            <div class="card mt-5" style="border: none;">
                <div class="card-title text-center mt-3" >
                    <h1><strong>Job Application Tracker</strong></h1>
                    <p class="text-center">Keep track of your job applications and their status.</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        
                        <div class="col-md-12 text-end">
                            <a href="add-description.php?compID=<?php echo $_GET['compID'] ?>"><button type="button" class="btn btn-outline-success"><i class="bi bi-pencil-square"></i></button></a>                            
                            <a href="index.php"><button type="button" class="btn btn-outline-primary"><i class="bi bi-house"></i></button></a>                            
                        </div>

                        <div class="col-md-4 mt-3">
                            <div class="card" style="border: 1px solid">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3><strong><?php echo $company; ?></strong></h3>
                                            <h6>Date Applied : <?php echo $dateApplied; ?></h6>
                                            <h6>Job Status : <?php echo $statusDesc; ?></h6>
                                            <h6>Role/Position : <?php echo $rolePostion; ?></h6>
                                            <h6>Salary : <?php echo $monSal; ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8 mt-3">
                            <div class="card" style="border: 1px solid">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6><i class="bi bi-justify"></i>  <strong>Job Description </strong></h6>
                                        </div>
                                        <div class="col-md-12 mt-4">
                                            <h6><?php echo $description; ?></h6>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <h6><strong></strong></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mt-3">
                            <h6><i class="bi bi-gear-fill text-primary"></i> <strong>Configure Status</strong></h6>
                            <a href="mid-process/job-app.process.php?statusID=1&compID=<?php echo $jobID; ?>"><button type="button" class="btn btn-outline-success" title="Hired" name="status">Hired</button></a>
                            <a href="mid-process/job-app.process.php?statusID=2&compID=<?php echo $jobID; ?>"><button type="button" class="btn btn-outline-warning" title="Interview" name="status">Interview</button></a>
                            <a href="mid-process/job-app.process.php?statusID=3&compID=<?php echo $jobID; ?>"><button type="button" class="btn btn-outline-danger" title="Rejected" name="status">Reject</button></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2"></div>

    </div>
</body>
</html>