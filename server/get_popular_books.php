<?php

include_once 'connection.php';

$stmt = "SELECT 
              b.id,
              b.title,
              b.description,
              b.photo,
              b.available_copies,
              b.category_id,
              COALESCE(rv.average_rating, 0) AS average_rating
          FROM 
              book b
          LEFT JOIN 
              borrowed_book bb ON b.id = bb.book_id
          LEFT JOIN 
              (SELECT 
                  r.book_id, 
                  CAST(AVG(r.rating) AS INT) AS average_rating
              FROM 
                  review r
              GROUP BY 
                  r.book_id) rv ON b.id = rv.book_id
          GROUP BY 
              b.id
          ORDER BY 
              COUNT(bb.book_id) DESC
          LIMIT 3";

$ps = $conn->prepare($stmt);

$ps->execute();
