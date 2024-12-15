<?php

include_once 'connection.php';

// Retrieve filter and book_id from GET request
$filter = $_GET['similar_filter'];
$book_id = $_GET['filter_book_id'];

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
          INNER JOIN 
              category c ON c.id = b.category_id
          LEFT JOIN 
              (SELECT 
                  r.book_id, 
                  CAST(AVG(r.rating) AS INT) AS average_rating
              FROM 
                  review r
              GROUP BY 
                  r.book_id) rv ON b.id = rv.book_id
          WHERE 
              c.name = '$filter' AND b.id != '$book_id'
          GROUP BY 
              b.id
          ORDER BY 
              RAND() 
          LIMIT 3";

$ps = $conn->prepare($stmt);

$ps->execute();
