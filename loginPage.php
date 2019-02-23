   <html>
    <head>
        <title>Login-Page</title>
        <link href="css/styleLogin.css" rel="stylesheet" type="text/css">
    </head>
    
    <body>
        <div>
            
            <header>
                <h2>Login</h2>
            </header>
            
            <main>
                <form action="includes/login.inc.php" method="POST">
                    <input type="text" name="userName" placeholder="User Name" id="uname" class="inputs">
                    <br>
                    <input type="password" name="pwd" placeholder="Password" id="pwd" class="inputs">
                    <br>
                    <button type="submit" name="submit" value="submit">Submit</button>
                    
                </form>
                
                <?php
                
                if(!isset($_GET['login'])){
                    
                }
                else{
                   $res=$_GET['login'];
                    
                    if($res=="fail"){
                        echo '<p>Username or Password is wrong!</p>';
                    }
                    elseif($res="empty"){
                        echo '<p>Empty Field!</p>';
                    }
                }
                
                ?>
                
                <a href="SignUp.php">Signup here</a>
                <br><br>
            </main>
            
        </div>
    </body>
</html>