<?php
function getName($conn, $table, $id_field, $name_field, $id){
    if(empty($id)) return 'N/A';
    $sql = "SELECT $name_field FROM $table WHERE $id_field = $id LIMIT 1";
    $res = mysqli_query($conn, $sql);
    if($res && mysqli_num_rows($res) > 0){
        $row = mysqli_fetch_assoc($res);
        return $row[$name_field];
    }
    return 'N/A';
}

function formatDate($date){
    return date("d-m-Y h:i A", strtotime($date));
}
?>
