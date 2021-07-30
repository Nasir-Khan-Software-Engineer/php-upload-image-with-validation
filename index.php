<?php 
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />


    <style>
      .download-btn,.delete-form{
        display: inline-block !important;
        padding: 5px;
      }
      .delete-btn,.download-all-btn{
        border: 0px solid red;
        background:none;
        cursor: pointer;
      }
      .checkbox .custom-checkbox{
        top: 0;
        right: -25px;
        
      }
      .download-all-btn{
        border:1px solid #333;
      }
    </style>

    <title>PHP image upload with validation</title>
  </head>
  <body>
    

    <div class="container">
      <div class="row justify-content-center my-4">
        <div class="col-12 col-lg-8">
          <div class="card p-3">
            <h1 class="text-center">PHP image upload with validation</h1>


            <form action="script/upload.php" method="post" enctype="multipart/form-data">
              <label for="my_file">Upload Image</label>
              <input required id="my_file" type="file" name="my_file" class="form-control">

              <input type="submit" name="upload_btn" class="form-control btn btn-info mt-3 rounded-0">
            </form>
            <!-- end file upload -->


            <!-- message show div -->

            <?php 
              if(isset($_SESSION['message']) && $_SESSION['message'] != '' ){
                echo '<div class="alert alert-info mt-3">'.$_SESSION['message'] .'</div>';
                $_SESSION['message'] = '';
              }
            ?>
            
            
          </div>
        </div>

        </div>
      </div>
    </div>

  </body>
</html>