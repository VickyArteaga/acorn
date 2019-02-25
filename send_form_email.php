<?php
if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "artepvictoria@gmail.com";
    $email_subject = "Your email subject line";

    function died($error) {
        // your error code can go here
        //echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        //echo "These errors appear below.<br /><br />";
        //echo $error."<br /><br />";
        //echo "Please go back and fix these errors.<br /><br />";
        header('Location: contact-required.html'); exit();

        die();
    }


    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        
        died('We are sorry, but there appears to be a problem with the form you submitted.');     
    }


    $first_name = $_POST['first_name']; // required' '
    $last_name = $_POST['last_name']; // required' '
    $email_from = $_POST['email']; // required' '
    $telephone = $_POST['telephone']; // not required' '
    $comments = $_POST['comments']; // required' '

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }

  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }

  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }

    $email_message = "Form details below.\n\n";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";

// create email headers' '
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($email_to, $email_subject, $email_message, $headers);  
?>

<!-- include your own success html here -->


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="shortcut icon" type="image" href="assets/fabicon.png"/>

  <title>Acorn Consultants</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <link href="css/modern-responsive.css" rel="stylesheet">

</head>

<body>

  <header>
    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.html">
          <!--<img src="./assets/acorns.jpg" alt="Logo" style="width:75px ; height:75px" class="rounded-circle">-->
          &nbsp; Acorn Consultants
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"
          aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="accounts.html"><span class="text-uppercase">Accounts</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="payroll.html"><span class="text-uppercase">Payroll</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="specialist.html"><span class="text-uppercase">Specialist</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="stocktaking.html"><span class="text-uppercase">Stocktaking</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="technology.html"><span class="text-uppercase">Technology</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="contact.html"><span class="text-uppercase">Contact us</span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>



    <!-- Page Content -->
      <!-- div de los parrafos -->
<div class="container-fluid color-bloque ">
  <!-- parrafo 1 -->
   <div class="align-items-left ml-5">
    <div class="row pt-5">
      <div class="my-5"> 
        <div class="py-2">
          <h1 class="text-white text-wrap mt-5 py-4">
            <span class="line-asset">
              Contact Us
            </span>   
          </h1>
          <p class=" parrafo-contact text-wrap text-secondary parraf-limit">
            Want to learn more?
            <br>
            Contact us today, and one of our specialists will be in touch. 
           </p>          
        </div>
      </div>
    </div>
  </div>
  <div class="row">
      <div class="container-fluid"> 
        <div class="col-md-4 offset-md-4">
          <p class="sucess-form">Thank you for contacting us. We will be in touch with you very soon.</p>
        </div>
      </div>
    </div>
  <div class="row">
    <div class="col-md-12">
        <form name="myForm" method="post" action="send_form_email.php" id="myForm" novalidate class="color-bloque mb-5 pb-5">

          <div class="container color-bloque">  
            <div class="row ml-5 mr-5">
      
                <div class="col-md-6 mb-4">
                  <div class="control-group form-group">
                    <div class="controls">
                      <label for="first_name">First Name</label>
                      <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name." name="first_name">
                      <p class="help-block"></p>
                    </div>
                  </div>
                  <div class="control-group form-group">
                    <div class="controls">
                      <label for="last_name">Last Name</label>
                      <input type="text" class="form-control" id="name"  name="last_name" required data-validation-required-message="Please enter your name.">
                      <p class="help-block"></p>
                    </div>
                  </div>
                  <div class="control-group form-group">
                    <div class="controls">
                      <label for="telephone">Phone</label>
                      <input type="tel" class="form-control" name="telephone" id="phone" required data-validation-required-message="Please enter your phone number.">
                    </div>
                  </div>
                </div>  

                <div class="col-md-6 mb-4">
                  <div class="control-group form-group">
                    <div class="controls">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" required data-validation-required-message="Please enter your email address.">
                    </div>
                  </div>
                  <div class="control-group form-group">
                    <div class="controls">
                      <label for="comments">Your text</label>
                      <textarea rows="6" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" name="comments" style="resize:none"></textarea>
                    </div>
                  </div>
                </div>  

                <div class="col-md-12 mb-4">
                  <div id="success"></div>
                  <!-- For success/fail messages -->
                  <button type="submit" value="Submit" class="btn btn-light" id="sendMessageButton" onclick="validateForm()">Send</button>
                </div>  


              
            </div><!-- /.row -->
          </div><!-- /.container -->
      </form>
    </div>
  </div>
</div> 

      <!-- Content Row -->


      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->

<!-- Footer -->
<footer class="page-footer font-small pt-4 px-5">
  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left text-light">
    <!-- Grid row -->
    <div class="row">
      <!-- Grid column -->
      <div class="col-md-4 footer-col">
        <!-- Content -->
        <p class="word">
          Acorn Consultants<br>
          Moor View<br>
          23 Paradise Park<br>
          Whitstone<br>
          Cornwall<br>
          EX22 6TQ
        </p>
      </div>
      <!-- Grid column -->
      <!-- <hr class="clearfix w-100 d-md-none pb-3"> -->
      <!-- Grid column -->
      <div class="col-md-1"></div>
      <div class="col-md-5  footer-col">
        <!-- Content -->   
        <ul>
          <li class="listFooter pl-2 ">              
            <a href="tel:07525917319" class="decoration"><img class="" src="assets/mobile-footer.svg"/> 
            <span class="pl-2 word">
              07525 917319
            </span>
            </a>             
          </li>
          <li class="listFooter pt-4 footer-col">             
            <a href="mailto:E.info@acornconsultants.co.uk" class="decoration"><img class="" src="assets/mail-footer.svg" />
              <span class="pl-2 word mobile-smaller">info@acornconsultants.co.uk</span>
            </a>
          </li>
        </ul></div>
      <!-- Grid column -->
      <div class="col-md-2">
        <!-- Content -->
        <p class="word">
          Acorn Holdings (UK) Ltd<br>
          Company No. 07877641<br>
          VAT No. 170 4029 38<br>
        </p>
      </div>
      <!-- Grid column -->
    </div>
    <!-- Grid row -->
  </div>
  <!-- Footer Links -->
  <!-- Copyright -->
  <div class="footer-copyright text-center py-3 word">© 2019 Copyright:
    <a class="decoration word" target="_blank" rel="noopener noreferrer" href="https://www.inspired-performance-solutions.com/">Inspired Performance Solutions</a>
  </div>
  <!-- Copyright -->
</footer>

<script type="text/javascript">
 
  function validateForm() {
    var x = document.forms["myForm"]["first_name"].value;
    var a = document.forms["myForm"]["last_name"].value;
    var b = document.forms["myForm"]["telephone"].value;
    var c = document.forms["myForm"]["email"].value;
    var d = document.forms["myForm"]["comments"].value;

    if (x == "") {
      alert("Name must be filled out");
      return false;
    }
    if (a == "") {
      alert("Name must be filled out");
      return false;
    }
    if (b == "") {
      alert("Name must be filled out");
      return false;
    }
    if (c == "") {
      alert("Name must be filled out");
      return false;
    }
    if (d == "") {
      alert("Name must be filled out");
      return false;
    }
  }
 
</script>
<!-- Footer -->

<!---prueba--->


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
      $(document).on('click', 'form button[type=submit]', function(e) {
          var isValid = $(e.target).parents('form').isValid();
          if(!isValid) {
            e.preventDefault(); //prevent the default action
          }
      });
    </script>

    <!-- Contact form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <!--<script src="js/jqBootstrapValidation.js"></script>-->
   <!--  <script src="js/contact_me.js"></script> -->
    <script type="text/javascript" src="vendor/js/main.js"></script>

  </body>

</html>





<?php

}
?>