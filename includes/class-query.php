<?php
    require_once('class-database.php');

    if( !class_exists ('QUERY') ) {
        class QUERY {
            public function all_posts() {
                global $db;
  
                return $db->select(
                    "SELECT * FROM posts"
                  );
            }

            public function post($postid) {
                htmlentities($postid, ENT_QUOTES, "UTF-8");
                global $db;
  
                return $db->select(
                    "SELECT * FROM posts
                     WHERE ID = $postid"
                  );
            }

            public function all_images() {
                global $db;
  
                return $db->select(
                    "SELECT * FROM images"
                  );
            }

            public function image($imageid) {
                htmlentities($imageid, ENT_QUOTES, "UTF-8");
                global $db;
  
                return $db->select(
                    "SELECT * FROM images
                     WHERE ID = $imageid"
                  );
            }
        }
    }

    $query = new QUERY;
?>