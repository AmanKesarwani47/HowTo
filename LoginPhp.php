<?php
    
    // include "dbcon.php";
    
        if(isset($_POST['logsubmit'])){
            $email = mysqli_real_escape_string($con,$_POST['email']);
            $password = mysqli_real_escape_string($con,$_POST['password']);

            if(empty($email) && empty($password)){
                header("Location: LoginPage.php?&email=empty&password=empty");
            }
            else{
                if(checkemail($email)){
                    $email_query = "select * from signupdata where email='$email'";
                    $query = mysqli_query($con,$email_query);
                    $emailcount = mysqli_num_rows($query);
                    if($emailcount){
                        $email_pass = mysqli_fetch_assoc($query);
                        $table_pass = $email_pass["password"];
                        $_SESSION['username'] = $email_pass["username"];

                        if(strlen($password)>=1 && strlen($password)<=8){
                            
                            if($password === $table_pass){
                                ?>
                                <script>
                                    location.replace("Home.php");
                                </script>
                                <?php
                            }else{
                                header("Location: LoginPage.php?&password=incorrect");
                            }
                        }else{
                            header("Location: LoginPage.php?&password=pd_char8");
                            //password should contain 8 characters
                        }

                        
                    }else{
                        header("Location: LoginPage.php?&email=notfound");
                    }
                    
                }
                else{
                    header("Location: LoginPage.php?&email=wrongemail");
                }
            }
            
            
        }
        function checkemail($str) {
            return (preg_match("/(\W|^)[\w.+\-|(0-9)]*@(gmail\.com|yahoo\.in|hotmail\.to)(\W|$)/i", $str)) ? TRUE :FALSE;
      }
    ?>