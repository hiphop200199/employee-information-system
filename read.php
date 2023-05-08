<?php
include("db.php") ;
if(isset($_GET['sort'])){
    $sort_type=$_GET['sort'];
    switch ($sort_type) {
        case '依名稱排序':
            $sql = "SELECT * FROM basic_data ORDER BY employee_name DESC";
            break;
            case '依年齡排序':
                $sql = "SELECT * FROM basic_data ORDER BY employee_age DESC";
                break;    
        default:
            break;
    }
    $statement = $conn->prepare($sql);
    $statement->execute();
}else{
    $sql = "SELECT * FROM basic_data ORDER BY employee_id DESC";
    $statement = $conn->prepare($sql);
    $statement->execute();
}


$result=$statement->setFetchMode(PDO::FETCH_ASSOC);
//ASSOC表示關聯式陣列