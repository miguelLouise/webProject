<?php

try {
    //code...
} catch (PDOException $e) {
    die("Query failed" . $e->getMessage());
}
