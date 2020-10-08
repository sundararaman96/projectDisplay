<?php
session_start();
if($_SESSION!=)
if(isset($_SESSION['username']==$username)){
?>

<!DOCTYPE html>
    <html>
    <style>
      body {
        background-image: linear-gradient(white, green);
      }

      table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
        margin-top: 30px;
      }

      th,
      td {
        text-align: left;
        padding: 16px;
      }

      tr:nth-child(even) {
        background-color: #7B9F35;
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
      p {
        font-size: larger;
        float: right;
        background: #7B9F35;
      }
</style>
    <body>
	
<a href="add_data.php">Add data</a>
<a href="search_data.php">Seacrh data</a>
<a href="logout.php">Logout</a>  
<?php 
 echo "<p class='logInUser'> Logged in user is ".$_SESSION['username'];
?>
	<div>
    <table>
    <thead>
      <tr>
        <th>Employee ID</th>	 
        <th>Email</th>
        <th>Last Name</th>
        <th>First Name</th>
      </tr>
    </thead>
      <?php
        $myfile = fopen("data.xml", "r") or die("File cannot be read!");
        $data = fread($myfile,filesize("data.xml"));
        fclose($myfile);
        $xml=simplexml_load_string($data) or die("Error: XML object cannot be created");
        $xml = (array)$xml;
        foreach ($xml['employee'] as $employee) 
        {
            $employee = (array)$employee;
            echo "<tr>";
            echo "<td>";
            echo $employee['employee_id'];
            echo "</td>";
            echo "<td>";
            echo $employee['email'];
            echo "</td>";
            echo "<td>";
            echo $employee['firstname'];
            echo "</td>";
            echo "<td>";
            echo $employee['lastname'];
            echo "</td>";
            echo "</tr>";
        }
        ?>
          </table>
    </div>
    </body>
    </html>
<?php
	
}else{
	echo "please login first";
}
	?>