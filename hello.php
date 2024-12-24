<?php
echo"hello world"
?>

<?php

$Name = $_POST['Name'];
$Ph_no = $_POST['Ph_no'];
$Street = $_POST['Street'];
$City = $_POST['City'];
$Country = $_POST['Country'];
$Product_Code = $_POST['Product_Code'];

if(!empty($Name) || !empty($Ph_no) || !empty($Street) || !empty($City) || !empty($Country) || !empty($Product_Code))
{
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "nathi";

//create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

if(mysqli_connect_error())
{
    die('Connection Error ('. mysqli_connect_errno(). ')'. mysqli_connect_error());
}

else
{
    $SELECT = "SELECT Ph_no From cod_details Where Ph_no = ? Limit 1";
    $INSERT = "INSERT Into cod_details (Name, Ph_no, Street, City, Country, Product_Code) values (?, ?, ?, ?, ?, ?)";
    
    //prepare statement
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s",$Ph_no);
    $stmt->execute();
    $stmt->bind_result($Ph_no);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if($rnum==0)
    {
        $stmt->close();
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("ssssss", $Name, $Ph_no, $Street, $City, $Country, $Product_Code);
        $stmt->execute();
        echo "new record inserted ";

    }
    else
    {
        echo " some one is registered.";
    }
}
}

else
{
    echo "all field is required";
    die();
}
















<?php

$Name = $_POST['Name'];
$Ph_no = $_POST['Ph_no'];
$Street = $_POST['Street'];
$City = $_POST['City'];
$Country = $_POST['Country'];
$Product_Code = $_POST['Product_Code'];

//Database Connection
$conn = new mysqli('localhost', 'root', '' , 'nathi');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into nathicod (Name, Ph_no, Street, City, Country, Product_Code) values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss",$Name, $Ph_no, $Street, $City, $Country, $Product_Code);
    $stmt->execute();
    echo "successfully";
    $stmt->close();
    $conn->close();
}