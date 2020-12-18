<?php
    
    // include "dbcon.php";
    
        if(isset($_POST['Change'])){
            $email = mysqli_real_escape_string($con,$_POST['email']);
            $password = mysqli_real_escape_string($con,$_POST['password']);
            $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);

            if(empty($email) || empty($password) || empty($cpassword)){
                header("Location: ForgotPasswordPage.php?&email=empty&password=empty&cpassword=empty");
            }
            else{
                if(checkemail($email)){                    
                        if(strlen($password)>=1 && strlen($password)<=8){
                            if(strlen($cpassword)>=1 && strlen($cpassword)<=8){
                                if($password === $cpassword){
                                    $email_query = "select * from signupdata where email='$email'";
                                    $query = mysqli_query($con,$email_query);
                                    $emailcount = mysqli_num_rows($query);
                                    if($emailcount){
                                        $change_query = "update signupdata set password='$password' where email='$email'";
                                        $change_query2 = "update signupdata set cpassword='$cpassword' where email='$email'";
                                        $query = mysqli_query($con,$change_query);
                                        $query = mysqli_query($con,$change_query2);
                                        ?>
                                        <script>
                                        console.log("Password Updated");
                                            location.replace("Login.php");
                                        </script>
                                        <?php
                                    }else{
                                        header("Location: ForgotPasswordPage.php?&email=notfound");
                                    }
                                }else{
                                    header("Location: ForgotPasswordPage.php?&password=incorrect&cpassword=incorrect");
                                }
                            }else{
                                header("Location: ForgotPasswordPage.php?&cpassword=tbpdchar8"); 
                                ?>
                                        <script>
                                            console.log("table_password should contain 8 characters");
                                        </script>
                                    <?php

                                //table_password should contain 8 characters
                            }
                        }else{
                            header("Location: ForgotPasswordPage.php?&password=pd_char8");
                            //password should contain 8 characters
                        }

                        
                    
                    
                }
                else{
                    header("Location: ForgotPasswordPage.php?&email=wrongemail");
                }
            }
            
            
        }
    ?>