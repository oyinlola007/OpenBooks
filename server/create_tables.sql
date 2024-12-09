CREATE TABLE `user` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(100) NOT NULL,
    `photo` VARCHAR(255),
    `email` VARCHAR(150) UNIQUE NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `role` VARCHAR(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `category` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `book` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `photo` VARCHAR(255),
    `available_copies` INT NOT NULL DEFAULT 0,
    `category_id` INT,
    FOREIGN KEY (`category_id`) REFERENCES `category`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `borrowed_book` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `book_id` INT NOT NULL,
    `borrow_date` DATE NOT NULL,
    `return_date` DATE,
    `status` VARCHAR(10) NOT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`book_id`) REFERENCES `book`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `favourite` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `book_id` INT NOT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`book_id`) REFERENCES `book`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `review` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `comment` TEXT,
    `rating` INT NOT NULL CHECK (`rating` BETWEEN 1 AND 5),
    `user_id` INT NOT NULL,
    `book_id` INT NOT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`book_id`) REFERENCES `book`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `category` (`name`) VALUES
('Fiction'),
('Non-Fiction'),
('Science'),
('History'),
('Fantasy'),
('Biography'),
('Technology'),
('Romance'),
('Mystery'),
('Self-Help');


INSERT INTO `book` (`title`, `description`, `photo`, `available_copies`, `category_id`) VALUES
('To Kill a Mockingbird', 'A novel about racial injustice in the Deep South.', 'book1.jpg', 5, 1),
('1984', 'A dystopian novel about totalitarianism.', 'book2.jpg', 5, 1),
('The Great Gatsby', 'A novel about the American Dream.', 'book3.jpg', 5, 1),
('Sapiens', 'A brief history of humankind.', 'book1.jpg', 5, 2),
('Brief Answers to the Big Questions', 'Insights into science and humanity.', 'book2.jpg', 5, 3),
('A Brief History of Time', 'An exploration of the universe.', 'book3.jpg', 5, 3),
('The Lean Startup', 'How today’s entrepreneurs use continuous innovation.', 'book1.jpg', 5, 7),
('Steve Jobs', 'The biography of Apple co-founder Steve Jobs.', 'book2.jpg', 5, 6),
('Becoming', 'The memoir of former First Lady Michelle Obama.', 'book3.jpg', 5, 6),
('Harry Potter and the Philosopher’s Stone', 'The first book in the Harry Potter series.', 'book1.jpg', 5, 5),
('The Hobbit', 'A fantasy adventure about a hobbit named Bilbo.', 'book2.jpg', 5, 5),
('The Catcher in the Rye', 'A novel about teenage alienation.', 'book3.jpg', 5, 1),
('The Fault in Our Stars', 'A story about love and loss.', 'book1.jpg', 5, 8),
('Pride and Prejudice', 'A classic romance novel by Jane Austen.', 'book2.jpg', 5, 8),
('Gone Girl', 'A thrilling mystery about a missing wife.', 'book3.jpg', 5, 9),
('Sherlock Holmes: The Complete Novels', 'Mysteries solved by the legendary detective.', 'book1.jpg', 5, 9),
('Atomic Habits', 'A guide to building good habits and breaking bad ones.', 'book2.jpg', 5, 10),
('Think and Grow Rich', 'A classic book on wealth and success.', 'book3.jpg', 5, 10),
('The Art of War', 'An ancient Chinese military treatise.', 'book1.jpg', 5, 4),
('The History of the Ancient World', 'A narrative history of the early world.', 'book2.jpg', 5, 4);
