<?php

include_once 'connection.php';

$stmt = "SELECT 
            b.id,
            b.title,
            b.description,
            b.photo,
            b.available_copies,
            b.category_id,
            COALESCE(CAST(AVG(r.rating) AS INT), 0) AS average_rating
          FROM 
            `book` AS b
          LEFT JOIN 
            `review` AS r ON b.id = r.book_id
          LEFT JOIN 
            `borrowed_book` AS bb ON b.id = bb.book_id
          GROUP BY 
            b.id
          ORDER BY 
            COUNT(bb.book_id) DESC
          LIMIT 3";

$ps = $conn->prepare($stmt);

$ps->execute();
