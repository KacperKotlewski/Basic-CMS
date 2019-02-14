<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    

    if(!empty($_POST)) {
        
        require_once('PHP/includes/class-insert.php');
        $imageid=0;
        if(getimagesize($_FILES['image']['tmp_name']) == TRUE)
            $imageid = $insert->image($_FILES['image']);
            
        if( $insert->post($_POST['post_title'], $_POST['post_content'], $_POST['post_cat'], $imageid) ) {
            echo '<h2 style="color: #00cc00;">SUCCESS!</h2>'; exit();
        }
    }
?>
<DOCTYPE html>
<html>
    <head>
        <title>Insert new post</title>
    </head>
    <body>
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="post_title" placeholder="Title"/>
            <br>
            <textarea name="post_content"></textarea>
            <br>
            <input type="file" name="image" value="xd"/>
            <br>
            <label for="post_cat">
                <input type="checkbox" name="post_cat[first]" value="cat1"/> cat 1
                <input type="checkbox" name="post_cat[second]" value="cat2"/> cat 2
            </label>
            <br>
            <input type="submit" value="create post"/>
        </form>
    </body>
</html>