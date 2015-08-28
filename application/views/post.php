<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
</head>
<body>
<div align="center">
<?php 

$num = 0;

if($results){

foreach ($results as $result) {
    
    if($num<1){
            echo '<strong>'.$result->title."</strong><br/><br>";
            echo $result->post."<br/><br>";
    }

    echo '<strong>'.$result->category."</strong><br/>";
    
    $num++;
    
}

}else{

echo "<h3>No tiene Categoria</h3>";

}
?>

</div>
</body>
</html>