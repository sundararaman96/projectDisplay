<?php
session_start();
if(isset($_SESSION['username'])){
?>

<!DOCTYPE html>
    <html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
                  body {
                      background-image: linear-gradient(to right, white, green);
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

                  input[type=button] {
                      width: 30%;
                      background-color: #226666;
                      color: white;
                      padding: 14px 20px;
                      margin: 8px 0;
                      border: none;
                      border-radius: 4px;
                      cursor: pointer;
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

                  .logInUser {
                      font-size: larger;
                      float: right;
                      background: #7B9F35;
                  }
        </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>
        /*setSearchButton function Description
        * This function is used to assign values of lastname and firstname to the query string of search_api.php page      
        */
        window.setSearchButton = function(){
            var btnSearch = document.getElementById("btn_Search");
           
                var url="search_api.php?firstName="+document.getElementById("firstName").value+"&lastName="+document.getElementById("lastName").value;
					$("#results").load(url); 
        }
	</script>
    <body>

    <a href="display_data.php"> Home Page</a>
    <a href="add_data.php">Add data</a>
    <a href="logout.php">Logout</a>
    <?php 
        echo "<p class='logInUser'> Logged in user is ".$_SESSION['username'];
    ?>

        <div>
        <div>
            <div>
            <h2>Search Employee</h2>
            </div>

            <form method="post">
           
            <p>
            <input  placeholder="First Name"  type="text" id="firstName" >
            </p>
            <p>
            <input  placeholder="Last Name"type="text" id="lastName">
            </p>
            <p><input  id="btn_Search" type="button" value="Search" name="submit" onclick="setSearchButton()"></p>
            </form>
        </div>
    </div>


    <div id="results"></div>

    </body>
    </html>
    
	<?php
	
}else{
	echo "please login first";
}
	?>