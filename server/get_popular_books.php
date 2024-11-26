<?php

include('connection.php');

$sql = "SELECT b.title, b.description, b.photo, b.available_copies, b.category_id " .
       "FROM `book` AS b " .
       "LEFT OUTER JOIN `borrowed_book` AS bb ON b.id = bb.book_id " .
       "GROUP BY b.id " .
       "ORDER BY COUNT(bb.book_id) DESC " .
       "LIMIT 3;";

$stmt = $conn->prepare($sql);

$popular_books = $stmt->execute();

?>