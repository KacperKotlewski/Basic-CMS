<?php
    require_once('includes/class-query.php');

    if(!empty($_GET)) {
        $post = @$_GET['p'];
        $cat = @$_GET['c'];
    }

    if(empty($post) && empty($cat)) {
        $post_array = array_reverse($query->all_posts());
        $title = 'Home';
    } 
    elseif(!empty($post)) {
        $post_array = $query->post( $post );
        $title = 'post name';
    }
    elseif(!empty($cat)) {
        echo 'category = '.$cat;
        $title = 'categoty: '.$cat;
    }
    else {
        echo '404';
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php echo '<title>'.$title.'</title>' ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <style>
        .post{
            width: 300px;
        }
        .post > img{
            width: 300px;
            height: 150px;
        }
        .image > img{
            width: 200px;
            height: 100px;
        }
    </style>
</head>
<body>
    <?php
        foreach( $post_array as $post):
            $link = '?p='.$post->ID;
            echo '<div class="post">';
            echo '<a href="'.$link.'"><h2>'.$post->post_title.'</h2></a>';

            if($post->imageID!=0){
                $img_array = $query->image( $post->imageID );
                foreach( $img_array as $img):
                    echo '<img src="data:image;base64,'.$img->image.'"></img>';
                endforeach;
            }

            $content = $post->post_content;
            if(empty(@$_GET['p']) && strlen($content)>75){
                $content = substr( $content , 0 , 65 ).' . . . ';
            }
            echo '<p>'.$content.'</p>';
            echo '</div>';
        endforeach;
    ?>
</body>
</html>
