<?php

include_once'dbh.inc.php';

if(isset($_POST['submit'])){
    
    $name=$_POST['name'];
    $surname=$_POST['surName'];
    $email=$_POST['eMail'];
    $uid=$_POST['uid'];
    $pwd=$_POST['pwd'];
    //hashed THE PASSSWOREQEFGWEGWD
    $pwd=password_hash($pwd,PASSWORD_DEFAULT);
    
    
    
    $sql="INSERT INTO users(name,surname,email,username,pwd) 
                      VALUES(?,?,?,?,?);";
    
    //create a prepared statement i.e. initialising the statement
    
    $stmt=mysqli_stmt_init($conn);
    
    
    //preparing the prepared statement
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "yeh wrong hai!";
    }
    else {
        //bind the parameters to the placeholders
        mysqli_stmt_bind_param($stmt,"sssss",$name,$surname,$email,$uid,$pwd);
        //execute i.e. write into database
        mysqli_stmt_execute($stmt);
        
        //get result
//       $ans= mysqli_stmt_get_result($stmt); us ethis only when required to show the data
        
        
    }
//    mysqli_query($conn,$sql);
    
    if(empty($name) ||empty($surname) ||empty($email) ||empty($uid) ||empty($pwd) ){
        
        header("Location: ../SignUp.php?signUp=empty&name=$name&surname=$surname& email=$email&uid=$uid");
        exit();
        
    }
    
    elseif(!preg_match("/^[a-zA-Z]*$/",$name) || !preg_match("/^[a-zA-Z]*$/",$surname)){
        header("Location: ../SignUp.php?signUp=char&uid=$uid&email=$email");
         exit();
    }
    
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header("Location: ../SignUp.php?signUp=invalidemail&name=$name&surname=$surname&uid=$uid");
         exit();
    }
    
    else
      header("Location: ../loginPage.php?signUp=success");

    
   
}
?>