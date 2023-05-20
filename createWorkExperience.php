<?php
include("db.php") ;
  $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

  
   
    $content = trim(file_get_contents("php://input"));
  
    $decoded = json_decode($content, true);
    $data = $decoded['dataArray'];
   

   
     $sql = "INSERT INTO work_experience(employee_id,company_name,start_from,ended_at,job_title,salary,reason_for_leaving)  VALUES (?,?,?,?,?,?,?)";
      $statement = $conn->prepare($sql);
      try {
        $conn->beginTransaction();
        foreach ($data as $d)
        {
          $statement->execute($d);
        }
        $conn->commit();
    }catch (Exception $e){
        $conn->rollback();
        throw $e;
    }
    
 
   echo "success.";