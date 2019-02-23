

   <html>
    <head>
        <title>Sign Up -page</title>
        <link href="styleSignUp.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <div>
            
            <header>
                <h2>Sign-Up</h2>
            </header>
            
            <main>
                <form action="includes/signUp.inc.php" method="POST">
                   <?php
                   if((isset($_GET['name']))){
                       
                           $name=$_GET['name'];
                           
                           echo '<input type="text" name="name" placeholder="Name" id="uname" class="inputs" value="'.$name.'">';
                       
                   }
                     else echo '<input type="text" name="name" placeholder="Name" id="uname" class="inputs" >';
                       
                       ?>
                       
                       
                    
                    <br>
                    
                    <?php
                    if((isset($_GET['surname']))){
                       
                           $surname=$_GET['surname'];
                           
                           echo '<input type="text" name="surName" placeholder="Surname" id="sname" class="inputs" value="'.$surname.'">';
                       
                   }
                     else echo '<input type="text" name="surName" placeholder="Surname" id="sname" class="inputs">';
                       
                       ?>
                       
                       
                    
                    <br>
                    
                    <?php
                    if((isset($_GET['email']))){
                       
                           $email=$_GET['email'];
                           
                           echo '<input type="text" name="eMail" placeholder="E-Mail ID" id="eMail" class="inputs" value="'.$email.'">';
                       
                   }
                     else echo '<input type="text" name="eMail" placeholder="E-Mail ID" id="eMail" class="inputs">';
                       
                       ?>
                       
                       
                    
                    <br>
                    
                     <input type="text" name="uid" placeholder="UserName" id="uid" class="inputs">
                    <br>
                    
                    <input type="password" name="pwd" placeholder="Password" id="pwd" class="inputs">
                    <br>
                    <button type="submit" name="submit" >Submit</button>
                    
                    
                    
                </form>
                
                <?php 
                
                if(!isset($_GET['signUp'])){
                    
                    
                }
                
                
                else{
                   $result= $_GET['signUp'];
                
                    
                    if(($result=="empty")){
                        echo "Empty entry in the signUp form!";
                    }
                    else if(($result=="char")){
                        
                        echo "Name or SurName contains invalid characters";
                        
                    }
                    
                    else if(($result=="invalidemail")){
                        
                        echo "Wrong email address!";
                        
                    }
                
                }
             
                
                
                ?>
                
                
                </main>
            
        </div> 
    </body>
</html>