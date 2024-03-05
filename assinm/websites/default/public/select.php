<?php
require 'datacon.php';
?>
<?php
$selectss=$connection->prepare('select * from product where id=:ids');
$criteria=[
    'ids'=>'1',
    ];
    selectss->execute($criteria);
    foreach ($selectss as $key){
        echo '<p>'.$key['id'].','.$key['name'].','.$key['price'].'</p>';
    }
    ?>
    <?php
    $updateQuery = $Connection->prepare('UPDATE product SET price = :newPrice where id=id');
    $criteria=[
        'newprice'=>'25',
        'id'=>'1'
    ];
    $updateQuery->execute($criteria);
    ?>