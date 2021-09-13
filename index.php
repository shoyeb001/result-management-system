<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        
    <link rel="stylesheet" href="css/style.css">

    <title>Student Result Management System</title>
</head>

<body>
    <?php
    include("header.php")
    ?>
    <div class="main">
        <div class="over">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <h2>Check Result</h2>
                            <form action="" method="POST" id="student_login">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Roll No</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="roll_no">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Date Of Birth</label>
                                    <input type="date" class="form-control" id="exampleFormControlInput1" name="dob">
                                </div>
                                <p id="std_error"></p>
                                <p><button class="btn btn-primary" type="submit" name="submit">Show Result</button></p>

                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <h2>Admin Login</h2>
                            <form action="" method="POST" id="admin">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="exampleFormControlInput1" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="exampleFormControlInput1" required>
                                </div>
                                <P id="error"></P>
                                <p><button class="btn btn-primary" type="submit" name="submit">Login</button></p>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include("footer.php");
    
    ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    jQuery('#admin').on('submit',function(){
                jQuery.ajax({
                    url:"admin_login.php",
                    type:"post",
                    data:jQuery("#admin").serialize(),
                    success:function(result) {
                       if (result == "true") {
                            window.open('admin/index.php','_self');
                        }else{
                           jQuery("#error").html("Please insert correct login information");
                        }

                        //alert(result);
                    }
                });
                event.preventDefault();
            });
            jQuery('#student_login').on('submit',function(){
                jQuery.ajax({
                    url:"student_login.php",
                    type:"post",
                    data:jQuery("#student_login").serialize(),
                    success:function(result) {
                       if(result=="yes"){
                        window.open('result.php','_self');
                       }else{
                        jQuery("#std_error").html("Please insert correct student information");
                       }
                    }
                });
                event.preventDefault();
            });


</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>
<script src="js/script.js"></script>


</body>

</html>