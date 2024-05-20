<?php 


include('connection.php');


function global_select($table_name, $str_select, $str_where=false, $str_order=false, $str_limit=false, $debug_mode=false) {
    global $db;
    
    //if($str_order === false) { $str_order = "sortnumber ASC"; } 
    
    $str = "
        SELECT ".$str_select." 
        FROM ".$table_name."
        ".($str_where ? "WHERE ".$str_where : "")."
        ".($str_order ? "ORDER BY ".$str_order : "")."
        ".($str_limit ? "LIMIT ".$str_limit : "")."
    ";

    if($debug_mode) { echo $str; exit; }

    $result = $db->query($str);
    
    if($result->num_rows > 0) { 
        $arr_return_data = array();
        while($row = $result->fetch_assoc()) {
            array_push($arr_return_data, $row);
        }
        return $arr_return_data;
    }

    return false;
}


function global_select_field($table_name, $str_field_name, $str_where=false, $str_order=false, $str_limit=false, $debug_mode=false) { 
    global $db;

    $str = "
        SELECT ".$str_field_name." 
        FROM ".$table_name."
        ".($str_where ? "WHERE ".$str_where : "")."
        ".($str_order ? "ORDER BY ".$str_order : "")."
        ".($str_limit ? "LIMIT ".$str_limit : "")."
    ";
    if($debug_mode) { echo $str; exit; }

    $result = $db->query($str);

    if($result->num_rows > 0) { 
        $row = $result->fetch_assoc();
        return $row[$str_field_name];
    }
    
    return false;
}

function global_select_single($table_name, $str_select, $str_where=false, $str_order=false, $str_limit=false, $debug_mode=false) { 
    global $db;

    $str = "
        SELECT ".$str_select." 
        FROM ".$table_name."
        ".($str_where ? "WHERE ".$str_where : "")."
        ".($str_order ? "ORDER BY ".$str_order : "")."
        ".($str_limit ? "LIMIT ".$str_limit : "")."
    ";
    if($debug_mode) { echo $str; exit; }

    $result = $db->query($str) or die($db->error);
    if($result->num_rows > 0) { 
        $row = $result->fetch_assoc();
        return $row;
    }
    
    return false;
}

function global_insert($table_name, $arr_data, $debug=false) {
    global $db;
    $str_column = "";
    $str_values = "";
    foreach($arr_data AS $key => $val) {
        $str_column .= ($str_column == "" ? "":", ")."`".$key."`";
        $str_values .= ($str_values == "" ? "":", ")."'".$val."'";
    }

    $str = "INSERT INTO `".$table_name."`(".$str_column.") VALUES(".$str_values.")";
    if($debug) { echo $str; exit; }

    $result = $db->query($str) or die($db->error);
    
    if($result)

        return $db->insert_id;

    return false;
}

function global_update($table_name, $arr_data, $str_where, $debug=false) {
    global $db;

    $str_set = "";
    
    foreach($arr_data AS $key => $val) {
        $str_set .= ($str_set == "" ? "":", ")."`".$key."` = '".$val."'";
    }

    $str = "
        UPDATE `".$table_name."` 
        SET ".$str_set."
        WHERE ".$str_where."
    ";

    if($debug) { echo $str; exit; }
    
    $result = $db->query($str) or die($db->error);

    if($result)
        return true;

    return false;
}

function response($data, $message){
    
  $data = [
    'success' => true,
    'data'    => $data,
    'message' => $message,
  ];
  // Encode the data as JSON
  $jsonData = json_encode($data);

  // Output the JSON string
  echo $jsonData;
  exit();
}

function responseError($data, $message){
    
  $data = [
    'success' => false,
    'data'    => $data,
    'message' => $message,
  ];
  // Encode the data as JSON
  $jsonData = json_encode($data);

  // Output the JSON string
  echo $jsonData;
  exit();
}

function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}
?>