<?php

echo "<p>GET:</p>";
var_dump($_POST);


echo "<p>POST:</p>";
var_dump($_POST);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>My First HTML Form</title>
    </head>
    <body>
        <form method="GET" action="">
        <p>
            <label for="username" >Username</label>
            <input id="username" placeholder="Enter your username" name="username" type="text">
        </p>
        <p>
            <label for="password" >Password</label>
            <input id="password" placeholder="Enter your password"name="password" type="password">
        </p>

        <label for= "comments">Comments</label>
        <textarea id= "comments" name= "comments"></textarea>

        <p>
            <button type="submit">Login by clicking here</button>
        </p>   
        <p>
        <p>
            <label for="email_body">Compose an Email</label>
        </p>    
        <p>    
            <textarea id="email_body" rows="5" cols="40" name="email_body">Content Here</textarea>
        </p>
        <p>
            <input type="checkbox" value="yes" checked> Save a copy to your sent folder?</input>           
    </form>
</body>   
</html>