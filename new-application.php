<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once 'view/titlename.php'; ?>
</head>
<body>

    <div class="row">
        <!-- Content goes here -->
        <div class="col-lg-4"></div>

        <div class="col-lg-4">
            <div class="card mt-5" style="border: none;">
                <div class="card-title text-center mt-3" >
                    <h1><strong>Add New Application</strong></h1>
                </div>
                <div class="card-body">
                    
                    <a href="index.php"><button type="button" class="btn btn-outline-warning">Cancel</button></a>

                        <form action="mid-process/job-app.process.php" method="post">
                            <div class="row g-3 mt-3">
                                <div class="col-md-12 mb-2">
                                    <label for="company" class="form-label">Company Name</label>
                                    <input type="text" class="form-control" id="company" name="company">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="position" class="form-label">Position</label>
                                    <input type="text" class="form-control" id="position" name="position">
                                </div>
                                <div class="col-md-6">
                                    <label for="applydate" class="form-label">Date Apply</label>
                                    <input type="date" class="form-control" id="applydate" name="applydate">
                                </div>
                            </div>
                            
                            <div class="text-center mt-3">
                                <!-- <input type="submit" value="Save Entry" class="btn btn-outline-primary mt-3" style="width: 40%;"> -->
                                 <button type="submit" name="new_job" class="btn btn-outline-success mt-3" style="width: 40%;">Save Entry</button>
                            </div>

                        </form>
                   
                </div>
            </div>
        </div>

        <div class="col-lg-4"></div>

    </div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>