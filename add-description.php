<?php 
require_once 'model/db.class.php';
require_once 'model/app.class.php';

//Fetch Data
$fetchData = new newJob();
$details = $fetchData->viewDesc($_GET['compID']);

$companyName = $details['company_name'];


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
                    <h1><strong>Add Company Description</strong></h1>
                    <p><?php echo $companyName; ?></p>
                </div>
                <div class="card-body">
                    
                    <a href="job-description.php?compID=<?php echo $details['jobID']; ?>"><button type="button" class="btn btn-outline-warning">Cancel</button></a>

                        <form action="mid-process/job-app.process.php" method="post">
                            <div class="row g-3 mt-3">
                                <input type="hidden" name="jobIDs" value="<?php echo $details['jobID']; ?>">
                                <div class="col-md-12 mb-2">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="salaries" class="form-label">Salary</label>
                                    <input type="number" class="form-control text-end" id="salaries" name="salaries">
                                </div>
                            </div>
                            
                            <div class="text-center mt-3">
                                <!-- <input type="submit" value="Save Entry" class="btn btn-outline-primary mt-3" style="width: 40%;"> -->
                                 <button type="submit" name="job_desc" class="btn btn-outline-success mt-3" style="width: 40%;">Save Description</button>
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

<script>

</script>