<?php

include_once 'connection.php';

// Retrieve filter and book_id from GET request
$filter = isset($_GET['similar_filter']) ? $_GET['similar_filter'] : 'diy';
$book_id = isset($_GET['filter_book_id']) ? intval($_GET['filter_book_id']) : 100;

// Construct the SQL query
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
            `category` AS c ON b.category_id = c.id
          WHERE 
            c.name = '$filter' AND b.id != '$book_id'
          GROUP BY 
            b.id
          ORDER BY 
            RAND() 
          LIMIT 3";

$ps = $conn->prepare($stmt);

$ps->execute();
