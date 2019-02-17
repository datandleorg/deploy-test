<?php
include("database/db_conection.php");//make connection here
    // sql to delete a record
//	echo $_GET['so_code'];
    $sql = "DELETE FROM invoices WHERE inv_code='".$_GET['inv_code']."' ";

    if ($dbcon->query($sql) === TRUE) {
      header("Location: listInvoices.php");
    } else {
       echo "Error deleting record: " . $dbcon->error;
    }
    $dbcon->close();
?>