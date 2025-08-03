<?php 
require_once 'model/db.class.php';
require_once 'model/app.class.php';

//Fetch Data
$fetchData = new newJob();
$details = $fetchData->viewDesc();

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
                            <a href="new-application.php"><button type="button" class="btn btn-outline-success"><i class="bi bi-pencil-square"></i></button></a>                            
                            <a href="index.php"><button type="button" class="btn btn-outline-primary"><i class="bi bi-house"></i></button></a>                            

                        </div>

                        <div class="col-md-4 mt-3">
                            <div class="card" style="border: 1px solid">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3><strong>Job Name</strong></h3>
                                            <h6>Date Applied : </h6>
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
                                            <h6><strong>Job Description </strong></h6>
                                        </div>
                                        <div class="col-md-12 mt-5">
                                            <h6>Full Description</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2"></div>

    </div>
</body>
</html>