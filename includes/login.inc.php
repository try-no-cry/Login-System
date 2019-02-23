<?php

include_once'dbh.inc.php';

if(!isset($_POST['submit'])){
    echo 'Something went wrong';
}
else{
    
$username=$_POST['userName'];
$pwd=$_POST['pwd'];
    
if(empty($username) || empty($pwd)){
    header("Location: ../loginPage.php?login=empty");
                    exit();
}    

//creating template for prepared statement    
$sql="SELECT * FROM users WHERE username=?;"  ;
    
//creating a prepared statement
$stmt=mysqli_stmt_init($conn);
    
//preparing as well as checking prepared statement
    
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo 'Oops! Somthing went wrong';
    }
    else{
        //bind the parameters
        mysqli_stmt_bind_param($stmt,"s",$username);
        
        //execute in database
        mysqli_stmt_execute($stmt);
        
        //get result
        $result=mysqli_stmt_get_result($stmt);
        $flag=0;
        while($row=mysqli_fetch_assoc($result)){
            if($row['username']==$username){
                $flag=1;
               if(password_verify($pwd,$row['pwd'])){
                   
                   header("Location: ../welcomePage.php?login=success");
               }
                else{
                    $flag=-1;
                    header("Location: ../loginPage.php?login=fail");
                    exit();
                }
            }
            
            
            }
        if($flag==0 || $flag==-1){
                header("Location: ../loginPage.php?login=fail");
                    exit();
            
                
        }
    }
}
?>