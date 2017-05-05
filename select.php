<?php
	session_start();
?>
<!DOCTYPE html>
<html>
    
    <head>
	     <title>Simms Online Academy</title>		 
		 
		 <!----------META---------->
		 <meta http-equiv="Content-Type" content="text/html; charset-utf-8">
		 
		 <link href="https://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet">
		 <link rel="stylesheet" href="css/register.css" type="text/css">
		 <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      
      <script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
      <script type="text/javascript" src="js/register.js"></script>
    </head>
    
    <body style="background-image:url(image/bakground.png);background-size:100%;">
        <header>
            <div class="loginheader">
            <a href="index.html"><img  src="image/logo.png" width="115px" ></a>
            </div>
        </header>
        
        <div class="policy">
            <h1>Policy</h1>
            
            <p>In consideration of your use of the Service, you will be required to provide current, accurate identification, contact, and other information as part of the registration process and/or continued use of the services. You agree that if you falsify any information that you are subject to disengagement from Simms Online Academy </p><br><p>

Your privacy is very important to us and we are committed to protecting it. The Privacy Policy and User Agreement (the "Policy") explains what personal data we collect and how we use and disclose personal data collected from you. This Policy applies to the website for Simms Online Academy, a division of Simms Online Academy, Inc., at www.Simms Online Academyinternational.com (the "Site") and any other information collected from you by Simms Online Academy. The Policy does not govern the collection of information through any website other than through the Site; nor does this Policy govern the collection of information by any of our affiliated businesses or by third parties. By visiting or using the Simms Online Academy website, you agree to follow its rules. By visiting the Site or submitting personal data to us, you accept the terms described in this Policy. If you do not agree to this Policy, please do not use the Site and do not submit personal data to us.
</p>

<h2>Personal Data We Collect</h2>
<p>When you request information, enroll in our programs or contact us to become a partner, we collect personally identifying information such as your name, age, gender, postal address, telephone number, e-mail address, educational and employment background and interests, and credit card information ("personal data"). If you are enrolling as a student, we may also collect other personal data, such as information regarding your health so that, if necessary, we can assess your application or make appropriate accommodation for you. In addition, if you send us an e-mail or communicate with us offline, we may collect the personal data that you voluntarily provide us at that time.</p>

<h2>Children</h2>
<p>We collect personal data in the manner described in this privacy policy. However, if you are a minor (under 18 years of age) and want to submit an application to study with us or subscribe to this website, register, sign up for latest offers or newsletters, you must ask your parent or guardian for permission to apply and permission to provide personal information to us necessary to process your application. We will ask your parent or guardian to confirm you have permission to apply and we may ask you to provide an email address, residential address and telephone number for your parent or guardian. We may also carry out checks to verify that the contact details you have provided are form your parent or guardian.</p>

<h2>Use of Personal Data</h2>
<p>We may use the personal data we collect from you in the following ways:</p>
<ul>
    <li>Fulfillment of Requests. Simms Online Academy may use personal data to fulfill the purpose for which such personal data was provided (for example to enroll you in our courses or to respond to a specific inquiry).</li>
    <li>Administrative Communications. We may use personal data to notify you about your enrollment or academic progress, other matters related to your use of our services, important information regarding the Site or changes to our terms, conditions, and policies. Because this information may be important to your use of our services, you may not opt out of receiving such communications.</li>
</ul>

<h2>Other Communications</h2>
<p>	We may use personal data to inform you of special offers and new or existing services that we believe may be of interest to you or to send surveys or questionnaires so that we can learn more about your needs and interests. If you would prefer that we do not send marketing messages to you, please see the "Your Ability to Choose" section below.</p>
<ul>
    <li><h2>Purchases:</h2>When you enroll in our services, we may collect your credit card number or other payment account number (for example, your wireless account number), billing address and other information related to such purchase (collectively, "Payment Information") from you, and may use such Payment Information in order to fulfill your purchase.</li>
    <li><h2>Promotions:</h2>We may operate sweepstakes, contests and similar promotions (collectively, "Promotions"). We may ask you for certain personal data when you enter and, if applicable, win a Promotion. You should carefully review the rules, if any, of each Promotion, as they may contain additional information about Simms Online Academy use of personal data. To the extent that the terms and conditions of such rules conflict with this Policy, the terms and conditions of such rules shall control.</li>
    <li><h2>Internal Business Purposes </h2>We also may use personal data for our internal business purposes, such as to improve the Site, allow us to personalize the content that you and others see based on personal characteristics or preferences, and perform data analysis, audits and so forth.</li>
</ul>

<h2>Collection and Use of Non-Personal Data</h2>
<p>Your visit to our Site may automatically provide us with non-personal data that is not linked to personal data about you, such as your browser type, operating system, domain name, access times, and referring website addresses. We collect non-personal data for statistical analysis regarding the use of the Site and its specific Web pages and how our visitors use and navigate our website on an aggregate basis. Because non-personal data does not personally identify you, we may use or disclose such information for any purpose. If we do combine any non-personal data with personal data, we will treat the combined data as personal data in accordance with this Policy.</p><p>
Some parts of the Site use cookies and other technologies to collect this non-personal data, and for other purposes. You can learn more about these technologies in the section entitled Cookies and Other Technologies.
</p>
<h2>Changes to the Website</h2>
<p>We may make improvements or changes to the information, services, products and other materials on this website, or terminate this website, at any time without notice. We may also modify these Terms and Conditions at any time, and such modification shall be effective immediately upon posting of the modified Terms and Conditions on this website. Accordingly, your continued access or use of this website is deemed to be your acceptance of the modified Terms and Conditions.</p>
        </div>
        
        <div class="policy" style="overflow:auto">
            <h3>I agree to the terms set forth above</h3>
            <div style="width:90px;margin:0 auto">
           <a href="classes/verify.php?id=<?php echo $_SESSION["account"];?>&type=<?php echo $_GET["type"]?>"><button class="loginButton" style="margin:10px 0px">Continue</button></a>
          	</div>
        </div>
    </body>
    
</html>