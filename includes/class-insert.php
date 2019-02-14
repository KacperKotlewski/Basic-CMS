<?php
    require_once('class-database.php');
    if(!class_exists('INSERT')){
        class INSERT {
            public function post($post_title, $post_content, $post_category, $imageID) {
                global $db;

                $post_title = htmlentities($post_title, ENT_QUOTES, "UTF-8");
                $post_content = htmlentities($post_content, ENT_QUOTES, "UTF-8");
                $post_category = serialize($post_category);
                $post_category = htmlentities($post_category, ENT_QUOTES, "UTF-8");
                $imageID = htmlentities($imageID, ENT_QUOTES, "UTF-8");

                $query =    "
                                INSERT INTO posts (post_title, post_content, post_category, imageID)
                                VALUES ('$post_title', '$post_content', '$post_category', $imageID)
                            ";
                
                return $db->insert($query);
            }


            public function image($pull_Image) {
                global $db;
                
                $image = addslashes($pull_Image['tmp_name']);
                $name = addslashes($pull_Image['name']);
                $image = file_get_contents($image);
                $image = base64_encode($image);

                $name = htmlentities($name, ENT_QUOTES, "UTF-8");
                $image = htmlentities($image, ENT_QUOTES, "UTF-8");

                $query =    "
                                INSERT INTO images (name, image)
                                VALUES ('$name', '$image')
                            ";
                
                $db->insert($query);
                $result = $db->lastID();
                return intval($result);
            }
        }
    }

    $insert = new INSERT
?>