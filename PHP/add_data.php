<?php
session_start();

if($_SESSION['username'] != 'admin'){
	echo "Logged in user is not an Admin <br>";
}
if(isset($_SESSION['username']) && $_SESSION['username'] == 'admin'){
?>

<!DOCTYPE html>
    <html>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
                  body {
                      background-image: linear-gradient(to right, white, green);
                  }

                  a:link,
                  a:visited {
                      background-color: #226666;
                      color: white;
                      padding: 14px 25px;
                      text-align: center;
                      text-decoration: none;
                      display: inline-block;
                  }

                  a:hover,
                  a:active {
                      background-color: #226666;
                  }

                  input[type=text],
                  select {
                      width: 50%;
                      padding: 12px 20px;
                      margin: 8px 0;
                      display: inline-block;
                      border: 1px solid #ccc;
                      border-radius: 4px;
                      box-sizing: border-box;
                  }

                  input[type=submit] {
                      width: 30%;
                      background-color: #226666;
                      color: white;
                      padding: 14px 20px;
                      margin: 8px 0;
                      border: none;
                      border-radius: 4px;
                      cursor: pointer;
                  }
                  .logInUser {
                      font-size: larger;
                      float: right;
                      background: #7B9F35;
                  }
        </style>
    <body>
<a href="display_data.php"> Home Page</a>
<a href="search_data.php">Search data</a>
<a href="logout.php">Logout</a>  
<?php 
 echo "<p class='logInUser'> Logged in user is ".$_SESSION['username'];
?>
     <div>
        <div>
            <div>
            <h2>Add data</h2>
            </div>

            <form method="POST" action="add_data.php">
            <p>
            <input placeholder="Employee ID" type="text" name="id">
            </p>
            <p>     
            <input  placeholder="Email" type="text" name="email">
          </p>
            <p>
            <input  placeholder="First Name" type="text" name="firstname" >
            </p>
            <p>
            <input  placeholder="Last Name"  type="text" name="lastname">
            </p>
            <p><input type="submit" value="Submit" name="submit"></p>
            </form>
        </div>
    </div>
    </body>
    </html>
    
<?php
       
            if(isset($_REQUEST['submit'])){
                $id = $_REQUEST['id'];
                $email = $_REQUEST['email'];
                $firstname = $_REQUEST['firstname'];
                $lastname = $_REQUEST['lastname'];
                $validator = 0;
                if($id != ''){
                    $validator = 1;
                        
                }else{
                    ?>
                    <p>Please enter the employee Id</p>
                    <?php
                }
                if($email != ''){
                    $validator = 2;
                    
                }else{
                    ?>
                    <p>Please enter the email-Id</p>
                    <?php
                }
                if($firstname != ''){
                    $validator = 3;                        
                }else{
                    ?>
                    <p>Please enter the first name</p>
                    <?php
                }
                if($lastname != ''){
                    $validator = 4;
                }else{
                    ?>
                    <p>Please enter the last name</p>
                    <?php
                }
                if($validator == 4){
                    $myfile = fopen("data.xml", "r") or die("File cannot be read!");
                    $data = fread($myfile,filesize("data.xml"));
                    fclose($myfile);
                    $xml=simplexml_load_string($data) or die("Error: XML object cannot be created");
                    $employee = $xml->addChild('employee');
                    $employee->addChild('employee_id',$id);
                    $employee->addChild('email',$email);
                    $employee->addChild('firstname',$firstname);
                    $employee->addChild('lastname',$lastname);
                    $xml->asXML('data.xml');
                    ?>
                    <div>
                    <div>
                    <span onclick="this.parentElement.style.display='none'">&times;</span>
                    <h3>Success!</h3>
                    <p>Employee entry has been successfully made</p>
                    </div>
                    </div>
                    <?php
                }
            }
}else{
	echo "Please Login as Admin";
}
?>


