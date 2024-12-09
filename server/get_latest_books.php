<?php

include_once 'connection.php';

$stmt = "SELECT b.id, b.title, b.description, b.photo, b.available_copies, b.category_id " .
       "FROM `book` AS b " .
       "LEFT OUTER JOIN `borrowed_book` AS bb ON b.id = bb.book_id " .
       "ORDER BY RAND() " .  // Randomly order 
       "LIMIT 3;";

$ps = $conn->prepare($stmt);

$ps->execute();
