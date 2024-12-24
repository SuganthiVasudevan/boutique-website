<?php
$HOSTNAME='localhost';
$USERNAME='root';
$PASSWORD='';
$DATABASE='nathi';

$con=mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);
if($con)
{
    echo("connection successfull");
}
else
{
    die(mysqli_error($con));
}

?>