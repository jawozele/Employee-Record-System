<?php
    // Connecting to the phpmyadmin database with a database created as emp_records
    require_once("ConnectingDB.php");
    if (isset($_POST["Submit"])) {
        if (!empty($_POST["EName"]) && !empty($_POST["SSN"])) {
            
            // Columns in the database
            
            $EName       = $_POST["EName"];
            $SSN         = $_POST["SSN"];
            $Dept        = $_POST["Dept"];
            $Salary      = $_POST["Salary"];
            $HomeAddress = $_POST["HomeAddress"];
            global $ConnectingDB;
            
            // Insert format for the table
            $sql  = "INSERT INTO emp_records(ename,ssn,dept,salary,homeaddress)
            VALUES(:enamE,:ssN,:depT,:salarY,:homeaddresS)";
            $stmt = $ConnectingDB->prepare($sql);
            $stmt->bindValue(':enamE', $EName);
            $stmt->bindValue(':ssN', $SSN);
            $stmt->bindValue(':depT', $Dept);
            $stmt->bindValue(':salarY', $Salary);
            $stmt->bindValue(':homeaddresS', $HomeAddress);
            $Execute = $stmt->execute();
            if ($Execute) {
                echo '<span class="success"> Record Has been Added Successfully</span>';
            }
        } else {
            echo '<span class="FieldInfoHeading">Please Add atleast Name and Social Security Number</span>';
        }
    }
    
    
    
    ?>
<!DOCTYPE>
<html>
<head>
<title>Employee Record System</title>
<link rel="icon" type="image/icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaOSxjfgV4Y0XJ2goc5o09AmXMjowNgyaKaBjp-QO6qG1M5rx3"/>
<link rel="stylesheet" href="Include/stylejosh.css">
<link href="https://fonts.googleapis.com/css?family=Audiowide&display=swap" rel="stylesheet">
</head>

// CSS for the feel of the portal
<style>
body {background-color: blue;
    font-family: 'Audiowide', cursive;
    font-size: 14px;
color: white;
    
}

h1 {
padding: 30px;
    text-align: center;
color: orange;
}

@media only screen and (min-width: 768px) {

div {width: 500px;
    margin-left: 360px;
    
}
    
}

input[type="text"], textarea{
border: 2px solid dashed;
    background-color: rgb(221,216,212);
width: 480px;
padding: .4em;
    font-size: 2em;
}

.FieldInfoHeading{
color: rgb(251,174, 44);
    font-family: Audiowide;
    
}



</style>
<body>
<h1>Employee Record System</h1>

// Form
<?php
    ?>
<div>
<form class="" action="employee_record_system.php" method="post">
<fieldset>
<span class="FieldInfo">Employee Name:</span>
<br>
<input type="text" name="EName" value="">
<br>
<span class="FieldInfo">Social Security Number:</span>
<br>
<input type="text" name="SSN" value="">
<br>
<span class="FieldInfo">Department:</span>
<br>
<input type="text" name="Dept" value="">
<br>
<span class="FieldInfo">Salary:</span>
<br>
<input type="text" name="Salary" value="">
<br>
<span class="FieldInfo">Home Address:</span>
<br>
<textarea name="HomeAddress" rows="8" cols="80"></textarea>
<br>
<input type="submit" name="Submit" value="Submit your record">
</fieldset>
</form>
</div>

<footer> Created by :::Josh Awozele:::</footer>



</body>
</html>
