<?php

if (isset($_POST['contact_submit'])) {
    $fullname = $_POST['fullname'];
    $organization = $_POST['organization'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

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
                            <b>Full Name: </b><br>".$fullname."
                        </td>
                    </tr>
                    <tr>
                        <td id='organization'>
                            <b>Organization: </b><br>".$organization."
                        </td>
                    </tr>
                    <tr>
                        <td id='email'>
                            <b>Email: </b><br>".$email."
                        </td>
                    </tr>
                    <tr>
                        <td id='phone'>
                            <b> Phone Number: </b><br>".$phone.'
                        </td>
                    </tr>
                </tbody>
            </table>
            ';
    $headers = 'MIME-Version: 1.0'."\r\n";
    $headers .= 'From:'. $email. "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
    mail('publisher@emrepublishing.com', 'Contact Us', $msg, $headers);
    mail('dev@emrepublishing.com', 'Contact Us ', $msg, $headers);
    mail('jamesmusgrave2122@att.net', 'Contact Us ', $msg, $headers);
    echo'
        <script>
            alert("Successfully Sent!");
            window.history.back();
        </script>
    ';
    
} elseif (isset($_POST['subscribe_submit'])) {
    $email = $_POST['email'];
    $msg = "
            <table class='tabledefault'>
                <tbody>
                   
                    <tr>
                        <td id='title'>
                            <b>Building Your Digital Marketing Platform</b><br>
                        </td>
                    </tr>
                    </tr>
                   
                    <tr>
                        <td id='email'>
                            <b>Email: </b><br>".$email.'
                        </td>
                    </tr>
                  
                </tbody>
            </table>
            ';
    $headers = 'MIME-Version: 1.0'."\r\n";
    $headers .= 'From:'. $email. "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
    mail('publisher@emrepublishing.com', 'Contact Us', $msg, $headers);
    mail('dev@emrepublishing.com', 'Contact Us ', $msg, $headers);
    mail('jamesmusgrave2122@att.net', 'Contact Us ', $msg, $headers);

    echo'
        <script>
            alert("Successfully Sent!");
            window.history.back();
        </script>
    ';
} else {
    echo '  
    <script>
        alert("Invalid Access.");
        window.history.back();
    </script>';
}
