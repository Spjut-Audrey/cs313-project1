<!DOCTYPE html>
<html lang="en-us">
    <!-- head here-->
    <head>
        <?php
            include __DIR__ . '/common/head.php';
        ?>  
        <title>Login</title>
    </head>
    <!-- body here -->
    <body>
        <main>
            <h1>Login</h1>

            <?php 
             if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
               }
            ?>
            
            <!-- form here -->
            <form method="post" action="/acme/accounts/">
                <input type="email" name="clientEmail" placeholder="Please enter your email" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";}  ?> required><br>
                
                <span class="smallTxt">Password must be at least 8 characters long and contain at least 1 number, 1 capital letter, and 1 special character</span>
                <input type="password" name="clientPassword" placeholder="Please enter your password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>

                <input type="submit" name="submit" value="login" class="button">
                <input type="hidden" name="action" value="login">
            </form> 

            <a id="registerLink" href='/acme/accounts/index.php?action=register'>No account? Register here!</a>

            <hr>
        </main>
        <!-- footer here -->
        <?php
                include __DIR__ . '/../common/footer.php';
        ?>
    </body>
</html>