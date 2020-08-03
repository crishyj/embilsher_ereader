<?php
    require('embellisher-ereader/api/config.php');

    if (isset($_POST['company_register'])) {
        $fullname = $_POST['fullname'];
        $job = $_POST['job'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $category = 'Corporate';         
        if($password != $confirm_password){
            echo"
                <script>
                    alert('Please confirm your password again!');
                    window.history.back();
                </script>
            ";
        }
        elseif(strlen($_POST["confirm_password"]) < 4 || strlen($_POST["password"]) < 4)
        {
            echo"
                <script>
                    alert('Please fill in a password with a minimum size of 4.');
                    window.history.back();
                </script>
            ";               
        }
        else{      
            $storeid = "0";
            $type = "Reader";
            $password = $_POST["password"] ;
            $name = $DB->real_escape_string( $_POST["fullname"] );
            $email = $DB->real_escape_string( $_POST["email"] );          
            
            $SQL = "SELECT * FROM user WHERE email='$email'";
            $RES = $DB->query($SQL);
            if ($user = $RES->fetch_assoc()){
                echo"
                    <script>
                        alert('This User already Exist!');
                        window.history.back();
                    </script>
                ";     
            }else{
                $pass = $DB->real_escape_string(md5($password));
                $SQL = "INSERT INTO user (name,type,email,password,storeid, admin, category, job) VALUES ('$name','$type', '$email','$pass','$storeid', '-1','$category', '$job')";
                $RES = $DB->query($SQL);

                $msg = "
                    <table class='tabledefault'>
                        <tbody>
                            <tr>
                                <td id='title'>
                                    <b>Building Your Digital Marketing Platform</b><br>
                                </td>
                            </tr>
                            <tr>
                                <td id='name'>
                                    <b>Full Name: </b><br>".$name."
                                </td>
                            </tr>
                            <tr>
                                <td id='organization'>
                                    <b>Organization: </b><br>".$category."
                                </td>
                            </tr>
                            <tr>
                                <td id='email'>
                                    <b>Email: </b><br>".$email."
                                </td>
                            </tr>
                            <tr>
                                <td id='job_description'>
                                    <b>Job Description: </b><br>".$job."
                                </td>
                            </tr>
                            
                            
                        </tbody>
                    </table>
                    ";
            $headers = 'MIME-Version: 1.0'."\r\n";
            $headers .= 'From:'. $email. "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
            mail('publisher@emrepublishing.com', 'Contact Us', $msg, $headers);
            mail('dev@emrepublishing.com', 'Contact Us ', $msg, $headers);
            mail('jamesmusgrave2122@att.net', 'Contact Us ', $msg, $headers);
            mail('corporate@emrepublishing.com', 'Contact Us ', $msg, $headers);
            echo"
                <script>
                    alert('Successfully Registered!');
                </script>
            ";
            header('Location: ./Multimedia-Stream-for/corporate.php');
            exit;    
            }
        }
    }elseif(isset($_POST['education_register'])) {
        $fullname = $_POST['fullname'];
        $job = $_POST['job'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $category = 'Education';         
        if($password != $confirm_password){
            echo"
                <script>
                    alert('Please confirm your password again!');
                    window.history.back();
                </script>
            ";
        }
        elseif(strlen($_POST["confirm_password"]) < 4|| strlen($_POST["password"]) < 4)
        {
            echo"
                <script>
                    alert('Please fill in a password with a minimum size of 4.');
                    window.history.back();
                </script>
            ";               
        }
        else{      
            $storeid = "0";
            $type = "Reader";
            $password = $_POST["password"] ;
            $name = $DB->real_escape_string( $_POST["fullname"] );
            $email = $DB->real_escape_string( $_POST["email"] );          
            
            $SQL = "SELECT * FROM user WHERE email='$email'";
            $RES = $DB->query($SQL);
            if ($user = $RES->fetch_assoc()){
                echo"
                    <script>
                        alert('This User already Exist!');
                        window.history.back();
                    </script>
                ";     
            }else{
                $pass = $DB->real_escape_string(md5($password));
                $SQL = "INSERT INTO user (name,type,email,password,storeid, admin, category, job) VALUES ('$name','$type', '$email','$pass','$storeid', '-1','$category', '$job')";
                $RES = $DB->query($SQL);

                $msg = "
                    <table class='tabledefault'>
                        <tbody>
                            <tr>
                                <td id='title'>
                                    <b>Building Your Digital Marketing Platform</b><br>
                                </td>
                            </tr>
                            <tr>
                                <td id='name'>
                                    <b>Full Name: </b><br>".$name."
                                </td>
                            </tr>
                            <tr>
                                <td id='organization'>
                                    <b>Organization: </b><br>".$category."
                                </td>
                            </tr>
                            <tr>
                                <td id='email'>
                                    <b>Email: </b><br>".$email."
                                </td>
                            </tr>
                            <tr>
                                <td id='job_description'>
                                    <b>Job Description: </b><br>".$job."
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                    ";
            $headers = 'MIME-Version: 1.0'."\r\n";
            $headers .= 'From:'. $email. "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
            mail('publisher@emrepublishing.com', 'Contact Us', $msg, $headers);
            mail('dev@emrepublishing.com', 'Contact Us ', $msg, $headers);
            mail('jamesmusgrave2122@att.net', 'Contact Us ', $msg, $headers);
            mail('education@emrepublishing.com', 'Contact Us ', $msg, $headers);
            echo"
                <script>
                    alert('Successfully Registered!');
                </script>
            ";
            header('Location: ./Multimedia-Stream-for/education.php');
            exit;      

            
            }
        }
    }elseif(isset($_POST['faith_register'])) {
        $fullname = $_POST['fullname'];
        $job = $_POST['job'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $category = 'Faith-Based';         
        if($password != $confirm_password){
            echo"
                <script>
                    alert('Please confirm your password again!');
                    window.history.back();
                </script>
            ";
        }
        elseif(strlen($_POST["confirm_password"]) < 4|| strlen($_POST["password"]) < 4)
        {
            echo"
                <script>
                    alert('Please fill in a password with a minimum size of 4.');
                    window.history.back();
                </script>
            ";               
        }
        else{      
            $storeid = "0";
            $type = "Reader";
            $password = $_POST["password"] ;
            $name = $DB->real_escape_string( $_POST["fullname"] );
            $email = $DB->real_escape_string( $_POST["email"] );          
            
            $SQL = "SELECT * FROM user WHERE email='$email'";
            $RES = $DB->query($SQL);
            if ($user = $RES->fetch_assoc()){
                echo"
                    <script>
                        alert('This User already Exist!');
                        window.history.back();
                    </script>
                ";     
            }else{
                $pass = $DB->real_escape_string(md5($password));
                $SQL = "INSERT INTO user (name,type,email,password,storeid, admin, category, job) VALUES ('$name','$type', '$email','$pass','$storeid', '-1','$category', '$job')";
                $RES = $DB->query($SQL);

                $msg = "
                    <table class='tabledefault'>
                        <tbody>
                            <tr>
                                <td id='title'>
                                    <b>Building Your Digital Marketing Platform</b><br>
                                </td>
                            </tr>
                            <tr>
                                <td id='name'>
                                    <b>Full Name: </b><br>".$name."
                                </td>
                            </tr>
                            <tr>
                                <td id='organization'>
                                    <b>Organization: </b><br>".$category."
                                </td>
                            </tr>
                            <tr>
                                <td id='email'>
                                    <b>Email: </b><br>".$email."
                                </td>
                            </tr>
                            <tr>
                                <td id='job_description'>
                                    <b>Job Description: </b><br>".$job."
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                    ";
            $headers = 'MIME-Version: 1.0'."\r\n";
            $headers .= 'From:'. $email. "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
            mail('publisher@emrepublishing.com', 'Contact Us', $msg, $headers);
            mail('dev@emrepublishing.com', 'Contact Us ', $msg, $headers);
            mail('jamesmusgrave2122@att.net', 'Contact Us ', $msg, $headers);
            mail('faithbased@emrepublishing.com', 'Contact Us ', $msg, $headers);
            echo"
                <script>
                    alert('Successfully Registered!');
                </script>
            ";
            header('Location: ./Multimedia-Stream-for/faith-based.php');
            exit;  
            }
        }
    }elseif(isset($_POST['government_register'])) {
        $fullname = $_POST['fullname'];
        $job = $_POST['job'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $category = 'Government';         
        if($password != $confirm_password){
            echo"
                <script>
                    alert('Please confirm your password again!');
                    window.history.back();
                </script>
            ";
        }
        elseif(strlen($_POST["confirm_password"]) < 4|| strlen($_POST["password"]) < 4)
        {
            echo"
                <script>
                    alert('Please fill in a password with a minimum size of 4.');
                    window.history.back();
                </script>
            ";               
        }
        else{      
            $storeid = "0";
            $type = "Reader";
            $password = $_POST["password"] ;
            $name = $DB->real_escape_string( $_POST["fullname"] );
            $email = $DB->real_escape_string( $_POST["email"] );          
            
            $SQL = "SELECT * FROM user WHERE email='$email'";
            $RES = $DB->query($SQL);
            if ($user = $RES->fetch_assoc()){
                echo"
                    <script>
                        alert('This User already Exist!');
                        window.history.back();
                    </script>
                ";     
            }else{
                $pass = $DB->real_escape_string(md5($password));
                $SQL = "INSERT INTO user (name,type,email,password,storeid, admin, category, job) VALUES ('$name','$type', '$email','$pass','$storeid', '-1','$category', '$job')";
                $RES = $DB->query($SQL);

                $msg = "
                    <table class='tabledefault'>
                        <tbody>
                            <tr>
                                <td id='title'>
                                    <b>Building Your Digital Marketing Platform</b><br>
                                </td>
                            </tr>
                            <tr>
                                <td id='name'>
                                    <b>Full Name: </b><br>".$name."
                                </td>
                            </tr>
                            <tr>
                                <td id='organization'>
                                    <b>Organization: </b><br>".$category."
                                </td>
                            </tr>
                            <tr>
                                <td id='email'>
                                    <b>Email: </b><br>".$email."
                                </td>
                            </tr>
                            <tr>
                                <td id='job_description'>
                                    <b>Job Description: </b><br>".$job."
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                    ";
            $headers = 'MIME-Version: 1.0'."\r\n";
            $headers .= 'From:'. $email. "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
            mail('publisher@emrepublishing.com', 'Contact Us', $msg, $headers);
            mail('dev@emrepublishing.com', 'Contact Us ', $msg, $headers);
            mail('jamesmusgrave2122@att.net', 'Contact Us ', $msg, $headers);
            mail('government@emrepublishing.com', 'Contact Us ', $msg, $headers);
            echo"
                <script>
                    alert('Successfully Registered!');                  
                </script>
            ";
            header('Location: ./Multimedia-Stream-for/government.php');
            exit;  
            
            }
        }
    }elseif(isset($_POST['healthcare_register'])) {
        $fullname = $_POST['fullname'];
        $job = $_POST['job'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $category = 'Healthcare';         
        if($password != $confirm_password){
            echo"
                <script>
                    alert('Please confirm your password again!');
                    window.history.back();
                </script>
            ";
        }
        elseif(strlen($_POST["confirm_password"]) < 4|| strlen($_POST["password"]) < 4)
        {
            echo"
                <script>
                    alert('Please fill in a password with a minimum size of 4.');
                    window.history.back();
                </script>
            ";               
        }
        else{      
            $storeid = "0";
            $type = "Reader";
            $password = $_POST["password"] ;
            $name = $DB->real_escape_string( $_POST["fullname"] );
            $email = $DB->real_escape_string( $_POST["email"] );          
            
            $SQL = "SELECT * FROM user WHERE email='$email'";
            $RES = $DB->query($SQL);
            if ($user = $RES->fetch_assoc()){
                echo"
                    <script>
                        alert('This User already Exist!');
                        window.history.back();
                    </script>
                ";     
            }else{
                $pass = $DB->real_escape_string(md5($password));
                $SQL = "INSERT INTO user (name,type,email,password,storeid, admin, category, job) VALUES ('$name','$type', '$email','$pass','$storeid', '-1','$category', '$job')";
                $RES = $DB->query($SQL);

                $msg = "
                    <table class='tabledefault'>
                        <tbody>
                            <tr>
                                <td id='title'>
                                    <b>Building Your Digital Marketing Platform</b><br>
                                </td>
                            </tr>
                            <tr>
                                <td id='name'>
                                    <b>Full Name: </b><br>".$name."
                                </td>
                            </tr>
                            <tr>
                                <td id='organization'>
                                    <b>Organization: </b><br>".$category."
                                </td>
                            </tr>
                            <tr>
                                <td id='email'>
                                    <b>Email: </b><br>".$email."
                                </td>
                            </tr>
                            <tr>
                                <td id='job_description'>
                                    <b>Job Description: </b><br>".$job."
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                    ";
            $headers = 'MIME-Version: 1.0'."\r\n";
            $headers .= 'From:'. $email. "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
            mail('publisher@emrepublishing.com', 'Contact Us', $msg, $headers);
            mail('dev@emrepublishing.com', 'Contact Us ', $msg, $headers);
            mail('jamesmusgrave2122@att.net', 'Contact Us ', $msg, $headers);
            mail('healthcare@emrepublishing.com', 'Contact Us ', $msg, $headers);
            echo"
                <script>
                    alert('Successfully Registered!');
                </script>
            ";
            header('Location: ./Multimedia-Stream-for/healthcare.php');
            exit;  
            }
        }
    }else{
        echo"
            <script>
                    alert('Invaloid Access');
                    window.history.back();
                </script>
            ";
    }