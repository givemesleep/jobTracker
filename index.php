<?php 
require_once 'model/db.class.php';
require_once 'model/app.class.php';

//Fetch Data
$fetchData = new newJob();


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
                    
                    <a href="new-application.php"><button type="button" class="btn btn-outline-primary">Add Application</button></a>

                    <table class="table table-striped table-hover mt-3">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Positon</th>
                            <th scope="col">Date Applied</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Must Arrange into Hired (Green), Interviewed (Yellow), Rejected (Red), No Response (Gray) -->
                            
                            <?php 
                            $apps = $fetchData->viewData();
                            $count = 1;
                            $status; $newClass;
                            foreach($apps as $job){

                                switch($job['job_status']){
                                    case 1: 
                                        $status="Hired";
                                        $newClass="text-success";
                                    break;
                                    case 2:
                                        $status="Interview";
                                        $newClass="text-warning";
                                    break;
                                    case 3:
                                        $status="Rejected";
                                        $newClass="text-danger";
                                    break;
                                    case 4:
                                        $status="No Response";
                                        $newClass="text-secondary";
                                    break;
                                }
                                // $dates = new DateTime($job['date_applied']);
                                // $dates->format('F d, Y');

                                $dates = $job['date_applied'];
                                $formatDate = date("F d, Y", strtotime($dates));

                                echo '
                                <tr>
                                    <th>'.$count++.'</th>
                                    <td>'.$job['company_name'].'</td>
                                    <td>'.$job['position'].'</td>
                                    <td>'.$formatDate.'</td>
                                    <td class="'.$newClass.'">'.$status.'</td>
                                    <td class="text-center">
                                        <a href="mid-process/job-app.process.php?statusID=1&compID='.$job['jobID'].'"><button type="button" class="btn btn-outline-success" title="Hired" name="status">H</button></a>
                                        <a href="mid-process/job-app.process.php?statusID=2&compID='.$job['jobID'].'"><button type="button" class="btn btn-outline-warning" title="Interview" name="status">I</button></a>
                                        <a href="mid-process/job-app.process.php?statusID=3&compID='.$job['jobID'].'"><button type="button" class="btn btn-outline-danger" title="Rejected" name="status">R</button></a>
                                        <a href="mid-process/job-app.process.php?settingsID='.$job['jobID'].'"><button type="button" class="btn btn-outline-primary" title="Settings" name="status"><i class="bi bi-gear-fill"></i>   </button></a>
                                    </td>
                                </tr> ';
                            }
                            
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-2"></div>

    </div>
</body>
</html>