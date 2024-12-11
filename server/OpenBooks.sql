-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 11, 2024 at 09:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `OpenBooks`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `available_copies` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `description`, `photo`, `available_copies`, `category_id`) VALUES
(100, 'Pride and Prejudice', 'Elizabeth Bennet navigates the rigid social structures of Regency England, clashing with the enigmatic Mr. Darcy in a story of misunderstandings, personal growth, and a profound critique of societal norms. This timeless romance explores themes of pride, prejudice, and the transformative power of love.', '14348537.jpg', 5, 5),
(101, 'Emma', 'Emma Woodhouse, a wealthy and independent young woman, takes delight in matchmaking among her friends, often misjudging their true feelings. Through comedic misadventures, she learns about humility, self-awareness, and the complexities of human relationships.', '9278312.jpg', 5, 5),
(102, 'Wuthering Heights', 'Set in the desolate Yorkshire moors, this haunting tale of passion and revenge chronicles the turbulent relationship between Heathcliff and Catherine Earnshaw. Their love, marred by pride and cruelty, reverberates through generations in a saga of obsession and tragedy.', '12818862.jpg', 5, 5),
(103, 'Sense and Sensibility', 'The contrasting lives of the Dashwood sisters, Elinor and Marianne, highlight the balance between logic and emotion in matters of love and life. Against the backdrop of Regency society, they navigate financial hardship, heartbreak, and eventual self-discovery.', '9278292.jpg', 5, 5),
(104, 'Little Women', 'Following the lives of the March sisters?Jo, Meg, Beth, and Amy?this novel captures their struggles and triumphs as they grow from childhood into adulthood. Themes of family, love, and individual aspirations are interwoven with the challenges of 19th-century American life.', '8775559.jpg', 5, 5),
(105, 'Northanger Abbey', 'Catherine Morland\'s naive fascination with Gothic novels leads her into a journey of self-realization. As she navigates love and social intricacies, she learns to distinguish between fiction and reality in this witty satire of the Gothic genre.', '12567961.jpg', 5, 5),
(106, 'Ethan Frome', 'In a bleak New England town, Ethan Frome\'s life is a study in despair and unfulfilled desires. Torn between duty to his ailing wife and his love for another, his choices lead to a tragic and irreversible climax.', '8303480.jpg', 5, 5),
(107, 'Anna Karenina', 'Amidst the opulent society of 19th-century Russia, Anna Karenina\'s passionate affair with Count Vronsky challenges social norms, leading to her downfall. This epic tale examines themes of love, fidelity, and the societal constraints of the time.', '2560652.jpg', 5, 5),
(108, 'Le Comte de Monte Cristo', 'A tale of betrayal and revenge, Edmond Dant?s rises from wrongful imprisonment to exact justice on those who wronged him. This epic story of vengeance, love, and redemption is set against the backdrop of post-Napoleonic France.', '14566393.jpg', 5, 5),
(109, 'Uncle Tom\'s Cabin', 'A poignant depiction of slavery in America, this novel follows the struggles of Uncle Tom and others, highlighting the human cost of systemic oppression. Harriet Beecher Stowe\'s work ignited national debates and contributed to the abolitionist movement.', '12728198.jpg', 5, 5),
(110, 'Alice\'s Adventures in Wonderland', 'Alice\'s whimsical journey through a surreal world of talking animals, peculiar characters, and absurd logic offers a playful yet profound exploration of curiosity and imagination. Lewis Carroll\'s timeless tale continues to captivate readers of all ages.', '10527843.jpg', 5, 1),
(111, 'Treasure Island', 'Young Jim Hawkins embarks on a high-seas adventure filled with pirates, treasure maps, and mutiny. This gripping tale of courage and betrayal has become a quintessential classic of adventure literature.', '13859660.jpg', 5, 1),
(112, 'Gulliver\'s Travels', 'Jonathan Swift\'s satirical masterpiece follows Lemuel Gulliver\'s voyages to fantastical lands, each serving as a mirror to human folly, societal norms, and political absurdities. The novel combines adventure with sharp social commentary.', '12717083.jpg', 5, 1),
(114, 'Through the Looking-Glass', 'In this sequel to \'Alice\'s Adventures in Wonderland,\' Alice steps through a mirror into a world governed by the rules of chess. Her journey introduces her to a host of eccentric characters and a whimsical exploration of time and identity.', '11272464.jpg', 5, 1),
(115, 'The Wonderful Wizard of Oz', 'Dorothy\'s journey through the magical land of Oz, accompanied by the Scarecrow, Tin Man, and Cowardly Lion, is a tale of self-discovery, friendship, and the search for home. L. Frank Baum\'s classic story remains an enduring symbol of hope and resilience.', '552443.jpg', 4, 1),
(116, 'Five Children and It', 'Edith Nesbit\'s tale of five siblings who discover a magical creature, the Psammead, that grants them wishes. Their adventures, filled with unintended consequences, explore themes of family, imagination, and the complexity of human desires.', '28174.jpg', 4, 1),
(117, 'The Lost World', 'Arthur Conan Doyle\'s thrilling novel follows Professor Challenger and his team as they discover a prehistoric world filled with dinosaurs. This adventure story blends scientific curiosity with timeless excitement and danger.', '8231444.jpg', 5, 2),
(118, 'A Midsummer Night\'s Dream', 'Shakespeare\'s comedic masterpiece interweaves love, mischief, and magic in a forest where fairies meddle with the lives of mortals. The play explores the whimsical and transformative power of love and imagination.', '7205924.jpg', 5, 1),
(119, 'The Story of the Amulet', 'In this continuation of \'Five Children and It,\' the siblings reunite with the Psammead and embark on time-traveling adventures to find a magical amulet. The novel blends history, fantasy, and the enduring theme of family bonds.', '13241470.jpg', 5, 1),
(120, 'Alice\'s Adventures in Wonderland', 'Alice\'s Adventures in Wonderland by Lewis Carroll follows the curious Alice as she tumbles down a rabbit hole into a fantastical world filled with strange creatures and bizarre happenings. As Alice navigates through Wonderland, she encounters characters like the White Rabbit, the Cheshire Cat, and the Queen of Hearts, all while questioning the nature of reality and identity in a whimsical, dreamlike adventure.', '10527843.jpg', 5, 2),
(121, 'Frankenstein or The Modern Prometheus', 'Mary Shelley\'s groundbreaking novel tells the story of Victor Frankenstein, whose quest to create life results in a tragic and misunderstood creature. A profound exploration of ambition, ethics, and the consequences of playing god.', '12356249.jpg', 5, 2),
(122, 'The Time Machine', 'H.G. Wells\'s pioneering science fiction tale follows an unnamed Time Traveller as he journeys to a distant future. Encountering the Eloi and the Morlocks, the story examines societal evolution, decay, and humanity\'s ultimate fate.', '9009316.jpg', 5, 2),
(123, 'The Wonderful Wizard of Oz', 'The Wonderful Wizard of Oz by L. Frank Baum tells the story of Dorothy, a young girl who is swept away by a tornado to the magical land of Oz. In her journey to meet the Wizard who can help her return home, she befriends the Scarecrow, Tinman, and Cowardly Lion. Together, they face challenges and learn that they already possess the qualities they seek, discovering the importance of self-reliance and friendship.', '552443.jpg', 5, 2),
(124, 'The Lost World', 'The Lost World by Arthur Conan Doyle follows a group of adventurers led by Professor Challenger as they travel to a remote plateau in South America where prehistoric creatures still exist. Amidst danger and discovery, the explorers confront dinosaurs, strange landscapes, and their own fears, ultimately finding that the world holds mysteries beyond their imagination, challenging their understanding of evolution and science.', '8231444.jpg', 5, 2),
(125, 'Dracula', 'Bram Stoker\'s gothic classic follows Jonathan Harker and his companions as they confront Count Dracula, a vampire who seeks to spread his undead curse from Transylvania to England. This tale of terror, resilience, and sacrifice explores themes of fear, seduction, and the clash between modernity and superstition.', '12216503.jpg', 3, 2),
(126, 'The Iron Heel', 'Jack London\'s dystopian novel depicts the rise of an oppressive oligarchic regime and the struggles of a socialist revolutionary. Blending elements of science fiction and political commentary, it serves as a stark warning against unchecked capitalism and authoritarianism.', '8243314.jpg', 5, 2),
(127, 'Flatland', 'Edwin A. Abbott\'s novella explores life in a two-dimensional world, offering a satirical critique of Victorian society. Through the experiences of its protagonist, the book delves into dimensions, perspectives, and the limits of human understanding.', '10069547.jpg', 5, 2),
(128, 'Brave New World', 'Aldous Huxley\'s dystopian vision portrays a technologically advanced but dehumanized society where individuality and emotions are suppressed. The story examines the cost of artificial happiness, control, and the dangers of losing humanity in the pursuit of utopia.', '8231823.jpg', 5, 2),
(129, 'Nineteen Eighty-Four', 'George Orwell\'s chilling dystopia imagines a totalitarian regime where surveillance, propaganda, and thought control dominate. Following Winston Smith\'s rebellion against the Party, the novel serves as a powerful cautionary tale about the erosion of freedom and truth.', '9267242.jpg', 5, 2),
(130, 'The Art of War', 'Sun Tzu\'s ancient treatise on strategy and warfare offers timeless insights into conflict, leadership, and decision-making. Its principles have been applied far beyond the battlefield, influencing business, politics, and personal growth.', '4849549.jpg', 5, 3),
(133, 'Leaves of Grass', 'Walt Whitman\'s poetic collection celebrates the individual, nature, and the democratic spirit. Through vivid imagery and free verse, it captures the essence of American identity, spirituality, and humanity\'s interconnectedness.', '9000447.jpg', 3, 3),
(135, 'De rerum natura', 'Lucretius\'s ancient Roman poem explores Epicurean philosophy, the nature of the universe, and the pursuit of happiness. It combines poetic beauty with scientific inquiry, offering timeless reflections on existence and the cosmos.', '566208.jpg', 5, 3),
(136, 'La Poetica', 'Aristotle\'s seminal work outlines the principles of dramatic and literary theory, including the structure of tragedy and the elements of effective storytelling. It has profoundly influenced Western literature and criticism.', '129771.jpg', 5, 3),
(137, 'Walden', 'Henry David Thoreau\'s reflections on simple living and self-reliance are set against the backdrop of Walden Pond. This philosophical work advocates for harmony with nature, introspection, and the rejection of materialism.', '11248037.jpg', 5, 3),
(138, 'On Liberty', 'John Stuart Mill\'s philosophical essay defends individual freedom and the limits of societal authority. It explores themes of free speech, autonomy, and the balance between liberty and social order.', '966821.jpg', 5, 3),
(139, 'Mr. Wizard\'s 400 Easy Experiments in Science', 'Don Herbert\'s collection offers engaging, hands-on science experiments for young learners. It combines fun and education, fostering curiosity and a love for discovery in the natural world.', '10155906.jpg', 5, 4),
(140, 'Machine Blacksmithing', 'This practical guide explores traditional blacksmithing techniques and the integration of machines in forging metalwork. It serves as a valuable resource for craftsmen seeking to balance art and efficiency.', '5766036.jpg', 5, 4),
(141, 'Mr. Wizard\'s Science Secrets', 'A treasure trove of fascinating experiments and demonstrations from Don Herbert, showcasing scientific principles in everyday life. It inspires curiosity and a deeper understanding of the world through hands-on exploration.', '6661452.jpg', 5, 4),
(142, 'Robot Builder\'s Sourcebook', 'A comprehensive guide for aspiring and experienced roboticists, featuring resources, components, and techniques for building robots. This reference book empowers innovation and creativity in robotics.', '58305.jpg', 4, 4),
(143, 'A French Restoration', 'This historical account details the restoration of a significant French landmark or cultural institution, blending architecture, history, and artistry. It offers insights into the preservation of heritage and the challenges of renewal.', '2033446.jpg', 5, 4),
(144, 'Tiling complete', 'A practical manual for tile installation and design, covering tools, materials, and techniques. It provides step-by-step guidance for creating durable and aesthetically pleasing surfaces in various settings.', '2913045.jpg', 5, 4),
(145, 'You Can With Beakman & Jax', 'Based on the educational TV show, this book offers experiments and activities that make science fun and accessible for children. It encourages hands-on learning and a playful approach to understanding scientific concepts.', '636658.jpg', 5, 4),
(146, 'Mr. Wizard\'s Experiments for Young Scientists', 'Don Herbert presents simple yet engaging experiments designed for young minds. These activities demonstrate basic scientific principles in an enjoyable and approachable way.', '6688652.jpg', 5, 4),
(147, 'Mr. Wizard\'s Supermarket Science', 'Highlighting the science behind everyday items found in a supermarket, this book makes learning relatable and exciting. It transforms mundane objects into tools for discovery and education.', '10156309.jpg', 4, 4),
(148, 'Wood projects you will like', 'A practical guide for woodworking enthusiasts, featuring projects ranging from beginner to advanced. It emphasizes creativity, skill-building, and the satisfaction of crafting functional and decorative pieces.', '8595545.jpg', 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_book`
--

CREATE TABLE `borrowed_book` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `borrow_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `borrowed_book`
--

INSERT INTO `borrowed_book` (`id`, `user_id`, `book_id`, `borrow_date`, `return_date`, `status`) VALUES
(42, 37, 139, '2024-12-11', '2024-12-11', 'returned'),
(44, 33, 142, '2024-11-11', NULL, 'borrowed'),
(45, 33, 145, '2024-12-11', '2024-12-11', 'returned'),
(46, 33, 111, '2024-12-11', '2024-12-11', 'returned'),
(47, 33, 125, '2024-12-07', NULL, 'borrowed'),
(48, 33, 136, '2024-12-11', '2024-12-11', 'returned'),
(49, 37, 125, '2024-12-03', NULL, 'borrowed'),
(50, 37, 133, '2024-12-11', NULL, 'borrowed'),
(51, 36, 116, '2024-12-11', NULL, 'borrowed'),
(52, 36, 115, '2024-12-01', NULL, 'borrowed'),
(53, 36, 137, '2024-12-11', '2024-12-11', 'returned'),
(54, 36, 133, '2024-12-11', NULL, 'borrowed'),
(55, 36, 125, '2024-12-11', '2024-12-11', 'returned');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(4, 'DIY'),
(1, 'Fantasy'),
(3, 'Philosophy'),
(5, 'Romance'),
(2, 'Science-Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` between 1 and 5),
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `comment`, `rating`, `user_id`, `book_id`) VALUES
(27, 'Good read', 5, 33, 145),
(28, 'pas mal', 2, 33, 136),
(29, 'excellent book. you should read', 5, 33, 111),
(30, '', 1, 37, 139),
(31, 'tres bien', 4, 36, 137),
(32, '', 2, 36, 125);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `photo`, `email`, `password`, `role`) VALUES
(33, 'Oyinlola Ojelere', '33.jpeg', 'ojelere.oyinlola@gmail.com', '34cf370570b6d57323de16c38ff619c4', 'admin'),
(36, 'John Doe', '36.jpg', 'jd@gmail.com', '7f5672a17fa1df7927bd7949ab2aa288', 'standard'),
(37, 'Mary Jane', '37.jpg', 'mj@gmail.com', 'cdd01392af134bfbbcfcc85d37926f55', 'standard');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `borrowed_book`
--
ALTER TABLE `borrowed_book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `borrowed_book`
--
ALTER TABLE `borrowed_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `borrowed_book`
--
ALTER TABLE `borrowed_book`
  ADD CONSTRAINT `borrowed_book_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `borrowed_book_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favourite`
--
ALTER TABLE `favourite`
  ADD CONSTRAINT `favourite_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favourite_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
