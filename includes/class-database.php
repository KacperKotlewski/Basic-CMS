<?php
    if( !class_exists ('DB') ) {
        class DB {
            public function __construct() {
                $host = 'localhost';
                $user = 'root';
                $password = '';
                $database = 'cms-first-test';
                $mysqli = new mysqli($host, $user, $password, $database);
            
                if($mysqli->connect_errno) {
                    printf('Connect fail %s\n', $mysqli->connect_error);
                    exit();
                }

                $this->connection = $mysqli;
            }

            public function insert($query) {
                
                $result = $this->connection->query($query);

                return $result;
            }

            public function lastID() {
                return intval( $this->connection->insert_id );
            }

            public function select($query) {
                $result = $this->connection->query($query);

                while( $obj = $result->fetch_object() ) {
                    $results[] = $obj;
                }
                @html_entity_decode($post_category, ENT_QUOTES, "UTF-8");
                return $results;
            }

            public function select_single($query) {
                $result = $this->connection->query($query);
                return $result;
            }
        }
    }

    $db = new DB;
?>