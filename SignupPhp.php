<?php
    
    // include "dbcon.php";
    
        if(isset($_POST['submit'])){
            $username = mysqli_real_escape_string($con,$_POST['username']);
            $email = mysqli_real_escape_string($con,$_POST['email']);
            $password = mysqli_real_escape_string($con,$_POST['password']);
            $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);
            
            
            
            if(empty($username) && empty($email) && empty($password) && empty($cpassword)){
                header("Location: SignupPage.php?&username=empty&email=empty&password=empty&cpassword=empty");
            }else{
                if(user($username)){

                    if(checkemail($email)){

                        $email_query = "select * from signupdata where email='$email'";

                        $query = mysqli_query($con,$email_query);

                        $emailcount = mysqli_num_rows($query);

                        if($emailcount>0){
                            header("Location: SignupPage.php?&email=exist");
                            ?>
                                        <script>
                                            console.log("Email already exists");
                                        </script>
                            <?php

                        }else{
                            
                            if(strlen($password)>=1 && strlen($password)<=8){
                                if(strlen($cpassword)>=1 && strlen($cpassword)<=8){
                                    if($password === $cpassword){

                                        $insertquery = "INSERT INTO signupdata(username, email, password, cpassword) VALUES ('$username', '$email', '$password', '$cpassword')";
                
                                        $iquery = mysqli_query($con,$insertquery);
    
                                        if($iquery){
    
                                            header("Location: LoginPage.php");

                                            ?>
                                                <script>
                                                    console.log("Insert Successfull");
                                                </script>
                                            <?php
    
                                        }else{
                                            // header("Location: Signup.php?&password=incorrect");
                                            ?>
                                                <script>
                                                    console.log("Not Inserted");
                                                </script>
                                            <?php
    
                                        }
                                    }
                                    else{
                                        header("Location: SignupPage.php?&password=dnmatch&cpassword=dnmatch");
                                        // ?>
                                        //     <script>
                                        //         console.log("Password does not match");
                                        //     </script>
                                        // <?php
                
                                     }
                                }else{
                                    header("Location: SignupPage.php?&password=tbpdchar8"); 
                                    ?>
                                            <script>
                                                console.log("table_password should contain 8 characters");
                                            </script>
                                        <?php

                                    //table_password should contain 8 characters
                                }
                            }else{
                                header("Location: SignupPage.php?&password=pdchar8");
                                ?>
                                            <script>
                                                console.log("password should contain 8 characters");
                                            </script>
                                <?php
                                //password should contain 8 characters
                            }
                         }
                        
                    }
                    else{
                        header("Location: SignupPage.php?&email=wrongemailsign");
                        // ?>
                        //     <script>
                        //         console.log("Not a valid email address....");
                        //     </script>
                        // <?php

                    }
                }else{
                    header("Location: SignupPage.php?&username=userspnum");
                    // ?>
                    //     <script>
                    //         console.log("username should not contain any special characters and numbers");
                    //     </script>
                    // <?php

                }
            }
        }

        /*--------------------------------------------------
        Functions
        --------------------------------------------------*/
        function checkemail($str) {
            return (preg_match("/(\W|^)[\w.+\-|(0-9)]*@(gmail\.com|yahoo\.in|hotmail\.to)(\W|$)/i", $str)) ? TRUE :FALSE;
      }

      function user($str){
          return (preg_match("/^[a-zA-Z\s]*$/",$str)) ? TRUE:FALSE;
      }


    // function pass($str){
    //     return (preg_match("/^[0-9]*$/",$str)) ? TRUE:FALSE;
    // }
    
    // function confpass($str){
    //     return (preg_match("/^[0-9]*$/",$str)) ? TRUE:FALSE;
    // }
    ?>