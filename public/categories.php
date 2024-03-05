<?php
require 'header.php';
$edtt="";
if (isset($_POST['ed_t'])){
    $edtt=$_POST['ed_t'];
    $edt_data=$Connection->prepare('UPDATE  categories SET category_name = :ne_name where category_id=:id_s');
    $edt_crit=array(
     ':ne_name'=>$edtt,
     ':id_s'=>$id_c
    );
    $edt_data->execute($edt_crit);
}  


if (isset($_POST['del_t'])){
    $dlt_data=$Connection->prepare('DELETE FROM categories WHERE categort_id=:id_s');
    $dlt_crit=array(
        ':id_s'=>$id_c
    );
    $dlt_data->execute($dlt_crit);
    
}    
if (isset($_POST['ad_d'])){
    $add_data=$Connection->prepare('INSERT INTO categories(category_id,category_name)VALUES(:id_s,:nam_s)');
}    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cate.css">
</head>
<body>
    <table class="t_ble">
        <tr class="ro_s">
            <th>Categories</th>
            <th>Eddit</th>
        </tr>
    </table>

</body>
</html>