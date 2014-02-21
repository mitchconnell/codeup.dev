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
        <form method="POST" action="">
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
        <form>
            <p>Multiple Choice Test</p>
            <p>Are you awake?</p>
        <label for="q1a">
            <input type="radio" id="q1a" name="q1" value="yes">
    
        </label>
        <label for="q1b">
            <input type="radio" id="q1b" name="q1" value="no">
    
            </label>
        <label for="q1c">
            <input type="radio" id="q1c" name="q1" value="maybe">
            <p>Are you tired?</p>
        <label for="q2a">
            <input type="radio" id="q2a" name="q2" value="yes">
    
        </label>
            <label for="q2b">
        <input type="radio" id="q2b" name="q2" value="no">
    
            </label>
        <label for="q2c">

            <input type="radio" id="q2c" name="q2" value="maybe">
            </form>
          <form> 
        </label>
        <p>
        <label for="gs">What guitar systems have you used? </label>
            <select id="gs" name="gs[]" multiple>
            <option value="line6">Line 6</option>
            <option value="fractal">Fractal</option>
            <option value="guitarrig">Guitar Rig</option>
            </select>
         </p>
         <p>
            <input type="submit" value="Do it!">
          </p>     




        </form>  
        <form>
            <h1>Select Testing</h1>
            <form method="POST" action="">
        <label for="q">Are you healthy? </label>

            <select id="q" name="q[]" multiple>
            <option value="1">yes</option>
            <option value="0">no</option>
            </select>
         
        <p>
            <input type="submit" value="Here">               
        </p>
        </form>
    </body>   
</html>




