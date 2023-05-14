<?php
include("db.php") ;
    $sql = "SELECT * FROM basic_data ORDER BY employee_id DESC";
    $statement = $conn->prepare($sql);
    $statement->execute();



$result=$statement->setFetchMode(PDO::FETCH_ASSOC);
//ASSOC表示關聯式陣列