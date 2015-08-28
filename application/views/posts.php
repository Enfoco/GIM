<html>
<head>
<title><?php echo $title; ?></title>
</head>
<body>
<div align="center">
<?php  foreach($results as $result) {
    
       echo '<h3>'.$result->title.'</h3>';
       echo anchor('blog/post_category?id='.$result->id, 'Categoria(as)', 'title="'.$result->title.'"');
              

         }       
?>        
</div>
</body>
</html>