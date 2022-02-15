<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form action="register.php" method="post">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" name="fullname" type="text" placeholder="Enter your full name" required />
                                                        <label for="inputFirstName">Full Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <select name="title" >
                                               <option disabled selected>-- Choose Privilege ID --</option>
                                                <?php
                                           require ("../doctor/dbinfo.php");
                                           // Create connection
                                           $conn = mysqli_connect($Host, $User, $Password, $DBName);
                                           // Check connection
                                           if (!$conn) {
                                                die("Connection failed: " . mysqli_connect_error());
                                                // mysqli_query($conn, "SET names UTF8");
                                           }
                                       $records = mysqli_query($conn, "SELECT privilege_id From privilege");  // Use select query here 

                                      while($data = mysqli_fetch_array($records))
                                      {
                           echo "<option value='". $data['privilege_id'] ."'>" .$data['privilege_id'] ."</option>";  // displaying data in option menu
                                 }	
                               ?>  
                                    </select>
                                                   
                                                        <!-- <label  for="title">Choose Title:</label>
                                                        <select class="form-control" name="title" id="title">
                                                          <option value="volvo">Doctor</option>
                                                          <option value="saab">Patient-Care-Taker</option>
                                                          <option value="opel">Patient</option>
                                                        </select> -->
                                                        <?php mysqli_close($conn);  // close connection ?>
                                                   
                                                </div>
                                            </div>
                                           
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Create a password" required />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirm password" required />
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input class="btn btn-primary btn-block" type="submit" id="submit" value="Create Account"/></div>
                                                <!-- <input class="btn btn-primary btn-block" type="submit" id="submit" value="Create Account" style="height: 34px; margin-left: 15px; width: 105px; padding: 5px; border: 3px double rgb(204, 204, 204);" /> -->
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.html">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
