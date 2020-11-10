<?php
    
    $username = "";
    $email    = "";
    $errors = array(); 
    
    // connect to the database
    $con = mysqli_connect('localhost', 'root', '', 'register');
    if(!$con)
    {
        echo 'Not connected to Server';
    }
    if(!mysqli_select_db($con,'register'))
    {
        echo 'Database Not Selected';

    }
    if (isset($_POST['submit'])) 
    {
    $Name=$_POST['textname'];
    $Fathername=$_POST['fathername'];
    $Postaladdress=$_POST['paddress'];
    $Sex=$_POST['sex'];
    $Blind=$_POST['blind'];
    $City=$_POST['City'];
    $Course=$_POST['Course'];
    $District=$_POST['District'];
    $State=$_POST['State'];
    $Pincode=$_POST['pincode'];
    $Email=$_POST['emailid'];
    $Dob=$_POST['dob'];
    $Mobileno=$_POST['mobileno'];

    $user_check_query = "SELECT * FROM users WHERE textname='$Name' OR emailid='$Email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['textname'] === $Name) {
      array_push($errors, "User already exists.Please enter full name.");
    }

    if ($user['emailid'] === $Email) {
      array_push($errors, "Email already exists");
    }
  }

    $sql="INSERT INTO users (Name,FatherName,PostalAddress,Sex,Blind,City,Course,District,State,PinCode,EmailId,DateofBirth,MobileNumber) VALUES ('$Name','$Fathername','$Postaladdress','$Sex','$Blind','$City','$Course','$District','$State','$Pincode','$Email','$Dob','$Mobileno')";
    
    if(!mysqli_query($con,$sql))
    {
        echo 'Registration Unsuccessful';
    }
    else
    {
        echo 'Registration Succesfull';

    }
    header("refresh:5;url=page1.html");
    }
?>