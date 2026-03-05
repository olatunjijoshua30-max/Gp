<?php
    session_start();
      session_start();
  ini_set('display_errors', '1');
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;R
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="main">
        <div id="second">
            <div id="right">

                        <form method="post">
                            <fieldset>
                                <legend>
                                    Create an account
                                </legend>
                            <?php
                            // include('db_com.php');
                                error_reporting (E_ALL);
                                if (isset ($_REQUEST["submit"])){
                                    $fullname =trim (addslashes($_REQUEST["fullname"]));
                                    $email =trim (addslashes($_REQUEST["email"]));
                                    $email = $_REQUEST["email"];
                                    $subject = $_REQUEST["subject"];
                        
                                    //  $sql = "INSERT INTO contactus (fullname, email, `subject`) VALUES ('$fullname','$email','$subject')";

                                    // mysqli_query ($conn, $sql) or die (mysqli_error($conn)); 
                                    // $num = mysqli_insert_id($conn);
                                    // if (mysqli_affected_rows($conn)!=1){
                                    //     $message = "error inserting record to database";

                                    //Create instance of PHPMailer
	$mail = new PHPMailer();
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
	$mail->Host = "mail.wetindey.com.ng";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "587";
//Set gmail username
	$mail->Username = "olatunjijoshua@wetindey.com.ng";
//Set gmail password
	$mail->Password = "Josh2009";
//Email subject
	$mail->Subject = "Contact Us";
//Set sender email
	$mail->setFrom("$email");
//Enable HTML
	$mail->isHTML(true);
//Attachment


//Email body
	$mail->Body = "<style>
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            font-family: 'Roboto', sans-serif !important;
            font-size: 14px;
            margin-bottom: 10px;
            line-height: 24px;
            color: #8094ae;
            font-weight: 400;
        }
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            margin: 0;
            padding: 0;
        }
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }
        table table table {
            table-layout: auto;
        }
        a {
            text-decoration: none;
        }
        img {
            -ms-interpolation-mode:bicubic;
        }
    </style>

    <center style='width: 100%; background-color: #f5f6fa;'>
        <table width='100%' border='0' cellpadding='0' cellspacing='0' bgcolor='#f5f6fa'>
            <tr>
               <td style='padding: 40px 0;'>
                    <table style='width:100%;max-width:620px;margin:0 auto;'>
                        <tbody>
                            <tr>
                                <td style='text-align: center; padding-bottom:25px'>
                                    <a href='#'><img style='height: 60px' src='https://wetindey.space/logo.png' alt='logo'></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style='width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;'>
                        <tbody>
                            <tr>
                                <td style='padding: 0 30px 20px; text-align: center;'>
                                    <p style='margin-bottom: 10px;'>Hi,</p>
                                    <p style='margin-bottom: 10px;'>$subject</p>
                          
                                
                                </td>
                            </tr>
                           
                           
                        </tbody>
                    </table>
                    <table style='width:100%;max-width:620px;margin:0 auto;'>
                        <tbody>
                            <tr>
                                <td style='text-align: center; padding:25px 20px 0;'>
                                    <p style='font-size: 13px;'>Copyright © 2026 OLATUNJI. All rights reserved. <br> </p>
                                    
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
               </td>
            </tr>
        </table>
    </center>";
//Add recipient
	$mail->addAddress("$email");
//Finally send email
	if ( $mail->send() ) {


                                        echo "<script>alert('submitted successfully')</script>";
                                    }
                                }
                                
                                
                                

                            ?>


                        
                        



                            <input type="text" name="fullname" id="fullname" required placeholder="Enter your fullname"><br><br>
                            
                            <input type="text" name="email" id="email" required placeholder="Enter your email"><br><br>
                           
                            <input type="text" name="subject" id="add" required placeholder="Enter your message"><br><br>


                           

                            <button type="submit" name="submit" id="check" onclick="return confirm('are you sure to submit this form')">check</button>
                        </fieldset>  
                        </form>
                
            </div>

            <div id="left">

            </div>

        </div> 
    </div>
</body>
</html>