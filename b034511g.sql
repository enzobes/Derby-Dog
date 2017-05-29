-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 29 Mai 2017 à 15:58
-- Version du serveur :  5.5.8
-- Version de PHP :  5.6.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `b034511g`
--

-- --------------------------------------------------------

--
-- Structure de la table `colour`
--

CREATE TABLE IF NOT EXISTS `colour` (
  `colour_id` int(11) NOT NULL,
  `description_color` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Contenu de la table `colour`
--

INSERT INTO `colour` (`colour_id`, `description_color`) VALUES
(1, 'brown'),
(2, 'beige'),
(3, 'white'),
(4, 'grey'),
(5, 'black');

-- --------------------------------------------------------

--
-- Structure de la table `dog`
--

CREATE TABLE IF NOT EXISTS `dog` (
  `dog_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(2) NOT NULL,
  `breed` int(11) NOT NULL,
  `colour` int(11) NOT NULL,
  `picture_url` varchar(100) NOT NULL,
  `gender` char(1) NOT NULL,
  `likes_other_dog` char(1) NOT NULL,
  `likes_to_play` char(1) NOT NULL,
  `description_dog` text NOT NULL,
  `adopted` char(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Contenu de la table `dog`
--

INSERT INTO `dog` (`dog_id`, `name`, `age`, `breed`, `colour`, `picture_url`, `gender`, `likes_other_dog`, `likes_to_play`, `description_dog`, `adopted`) VALUES
(1, 'Ronnie', 4, 5, 5, 'http://enzobescvy.cluster021.hosting.ovh.net/dog/bull-terrier.jpg', 'M', 'N', 'Y', 'Hello Everyone, my name is Ronnie and I am a 1 year old Staffy cross. I am fun-loving young boy who loves to be around people and other dogs.\n\nI am playful and love to run around with soft', 'N'),
(2, 'Leo', 3, 1, 3, 'http://enzobescvy.cluster021.hosting.ovh.net/dog/labrador-retriver.jpg', 'M', 'N', 'Y', 'Hey there, I''m Leo.\nMy pal and I are hopefully going to be rehomed together if anyone out there can find it in their heart to take on two dog instead of one.\n\nWe do love each other and struggle alone but we know it might be difficult to find a home.', 'N'),
(3, 'Buddy', 3, 5, 3, 'http://enzobescvy.cluster021.hosting.ovh.net/dog/brown-staff.jpg', 'M', 'Y', 'Y', 'My life has been up and down really and I am desperately looking for a new home as I am very stressed in kennels. I''ve spent over half my life in a kennel because no one has wanted to rehome me. Love Buddy', 'Y'),
(4, 'Colin', 1, 1, 5, 'http://enzobescvy.cluster021.hosting.ovh.net/dog/labrador-black.jpg', 'F', 'Y', 'N', 'I''m Colin a sweet-natured, quiet young lady looking for a new home as I wasn''t suitable for the racing industry. I am looking forward to finding out all about a new home as I have never been in one before, especially a sofa.', 'Y'),
(5, 'Leslie', 4, 2, 1, 'http://enzobescvy.cluster021.hosting.ovh.net/dog/german.jpg', 'F', 'N', 'Y', 'I''m Leslie and I''m looking for a new home with owners who are around for the majority of the day so that I have the company I crave. I am very high energy and need someone to be able to fulfil. Love Leslie', 'N'),
(6, 'Max', 7, 4, 3, 'http://enzobescvy.cluster021.hosting.ovh.net/dog/jack-russell.jpg', 'M', 'Y', 'Y', 'My name is Max\nI am really looking forward to finding a new home but first my behaviour needs to be assessed so Blue Cross know more about the families that would suit me.', 'N'),
(7, 'Dexter', 5, 1, 2, 'http://enzobescvy.cluster021.hosting.ovh.net/dog/beige-labrador.jpg', 'M', 'Y', 'Y', 'Hello, my name is Dexter and I am a 5 year old Labrador cross.Currently I am staying at the Blue Cross Rehoming Centre in Tiverton while I look for my new furrever home!I also like long walks and spending time with my doggy pals.', 'N'),
(8, 'Marley', 4, 4, 1, 'http://enzobescvy.cluster021.hosting.ovh.net/dog/brown-jack.jpg', 'M', 'Y', 'Y', 'I am an active and playful guy! My favourite things are woodland walks, to splash around in rivers, sticking my nose out of the window in the car, and playing with other sociable dogs.I also like long walks ', 'N'),
(9, 'Leandra', 3, 3, 1, 'http://enzobescvy.cluster021.hosting.ovh.net/dog/border-terrier.jpeg', 'F', 'Y', 'Y', 'I am an active young girl looking for new owners who are going to give me all the time and training that I love! I love to walk, play and snuggle with humans!I also like long walks and spending time with my doggy pals.<br/> Love', 'N'),
(10, 'Bambi', 5, 5, 4, 'http://enzobescvy.cluster021.hosting.ovh.net/dog/staff-grey.jpg', 'F', 'N', 'N', 'My name is Bambi and I am a 5 years old Staffordshire Bull Terrier cross. I am currently residing at the Tiverton Rehoming Centre whilst I wait for my forever home.I love spending time with my carers at the Centre.', 'Y');

-- --------------------------------------------------------

--
-- Structure de la table `dog_breed`
--

CREATE TABLE IF NOT EXISTS `dog_breed` (
  `dog_breed_id` int(11) NOT NULL,
  `description_breed` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `dog_breed`
--

INSERT INTO `dog_breed` (`dog_breed_id`, `description_breed`) VALUES
(1, 'Labrador Retriever'),
(2, 'German Shepherd'),
(3, 'Border Terrier'),
(4, 'Jack Russell Terrier'),
(5, 'Staffordshire Bull Terrier');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL,
  `picture_url` varchar(100) NOT NULL,
  `news_headline` varchar(80) NOT NULL,
  `date_of_publication` date NOT NULL,
  `brief_news_text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`news_id`, `picture_url`, `news_headline`, `date_of_publication`, `brief_news_text`) VALUES
(1, 'http://enzobescvy.cluster021.hosting.ovh.net/news/rescue-dog.jpg', 'My rescue dogs rescued me\n', '2017-04-28', 'A Telford man who suffers from depression and anxiety says he doubts he would be alive if it wasn’t for the love and companionship of his rescue dogs.\n\nNick Murdoch, who has adopted two dogs from Dogs Trust Shrewsbury, believes his beloved dogs helped him get through the most difficult periods in his life.\n\nNow, as Jack Russell Terrier Nacho settles on Nick’s knee for a cuddle in the lounge of his Telford home, Nick says he is feeling optimistic about the future thanks to his latest four-legged friend.\n'),
(2, 'http://enzobescvy.cluster021.hosting.ovh.net/news/buddy-news', 'Your buddy is looking for you\n', '2017-04-25', 'Canine carers at Dogs Trust Darlington are calling on potential dog owners looking for a "Best Buddy" to share their life with as it''s rehoming centre in Sadberge currently has three dogs named Buddy who are all waiting to meet their special someone.\n'),
(3, 'http://enzobescvy.cluster021.hosting.ovh.net/news/peanut-dog', 'Rescue dog saves life of three-year-old girl found in a ditch\n', '2017-03-22', 'A dog that was rescued from an abusive owner has been hailed a hero after saving a young girl’s life.\n\nPeanut, arrived at the Delta Animal Shelter in Escanaba, Michigan with two broken legs and cracked ribs, last year.\n\nAfter she was nursed back to health, she was taken in by a new owner, who has now credited the dog with becoming a saviour herself.  '),
(4, 'http://enzobescvy.cluster021.hosting.ovh.net/news/dog-breed.jpg', 'The evolution of dog breeds now mapped\n', '2017-04-24', 'When people migrate, Canis familiaris travels with them. Piecing together the details of those migrations has proved difficult because the clues are scattered across the genomes of hundreds of dog breeds. However, in a new report, researchers have used gene sequences from 161 modern breeds to assemble an evolutionary tree of dogs. '),
(5, 'http://enzobescvy.cluster021.hosting.ovh.net/news/dog-learning.jpg', 'How dogs interact with others plays a role in decision-making', '2017-04-24', 'Dynamics between familiar dogs may influence their likelihood of learning from each other, new research shows. How dogs interact with others plays a big role in how they respond under conditions that require quick thinking.'),
(6, 'http://enzobescvy.cluster021.hosting.ovh.net/news/dog-weight.jpg', 'Does Neutering Cause Weight Gain In Dogs?\n', '2008-09-02', 'The decision to have your dog spayed or castrated is an entirely personal one. But if you do choose to have you dog undergo this surgery it’s important to be aware that following it, you’ll need to make changes to their diet.\n\nThis is because spayed and castrated dogs are at an increased risk of being overweight or obese compared to intact dogs. And as with humans, dogs who are overweight or obese are at an increased risk of developing a number of health problems including diabetes.');

-- --------------------------------------------------------

--
-- Structure de la table `sponsored_dog`
--

CREATE TABLE IF NOT EXISTS `sponsored_dog` (
  `sponsor_dog_id` int(11) NOT NULL,
  `dog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_sponsored` date NOT NULL,
  `paid_per_month` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sponsored_dog`
--

INSERT INTO `sponsored_dog` (`sponsor_dog_id`, `dog_id`, `user_id`, `date_sponsored`, `paid_per_month`) VALUES
(3, 7, 2, '2017-04-30', 15),
(4, 8, 3, '2017-05-25', 12),
(6, 8, 5, '2017-04-13', 25),
(7, 8, 3, '2017-04-09', 30),
(8, 10, 3, '2015-08-12', 11),
(10, 9, 2, '2017-04-16', 19),
(11, 9, 1, '2017-05-10', 12);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_last_paid` date NOT NULL,
  `address_line_1` varchar(80) NOT NULL,
  `address_line_2` varchar(100) NOT NULL,
  `postcode` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `date_last_paid`, `address_line_1`, `address_line_2`, `postcode`) VALUES
(1, 'Aidan', 'Smith', '2012-09-09', '7355 Tellus Road', 'Spode', 'W54 7HL'),
(2, 'Dieter', 'Guthrie', '2013-05-23', '9234 Quam, Street', 'Spode', 'MN76 8OX'),
(3, 'Amethyst', 'Terry', '2011-07-17', '4572 Et, Rd.', 'Coalport', 'AR8E 8OU'),
(4, 'Francis', 'Medina', '2012-01-28', 'P.O. Box 912, 3122 Nisi. Rd.', 'Manchester', 'YO9 9GA'),
(5, 'Tamekah', 'Brown', '2013-12-12', '5947 Luctus St.', 'Walles', 'GZ38 6XP');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `colour`
--
ALTER TABLE `colour`
  ADD PRIMARY KEY (`colour_id`);

--
-- Index pour la table `dog`
--
ALTER TABLE `dog`
  ADD PRIMARY KEY (`dog_id`),
  ADD KEY `fk_colour` (`colour`),
  ADD KEY `fk_breed` (`breed`);

--
-- Index pour la table `dog_breed`
--
ALTER TABLE `dog_breed`
  ADD PRIMARY KEY (`dog_breed_id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Index pour la table `sponsored_dog`
--
ALTER TABLE `sponsored_dog`
  ADD PRIMARY KEY (`sponsor_dog_id`),
  ADD KEY `fk_dog_id` (`dog_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `colour`
--
ALTER TABLE `colour`
  MODIFY `colour_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `dog`
--
ALTER TABLE `dog`
  MODIFY `dog_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `dog_breed`
--
ALTER TABLE `dog_breed`
  MODIFY `dog_breed_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `sponsored_dog`
--
ALTER TABLE `sponsored_dog`
  MODIFY `sponsor_dog_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `dog`
--
ALTER TABLE `dog`
  ADD CONSTRAINT `fk_breed` FOREIGN KEY (`breed`) REFERENCES `dog_breed` (`dog_breed_id`),
  ADD CONSTRAINT `fk_colour` FOREIGN KEY (`colour`) REFERENCES `colour` (`colour_id`);

--
-- Contraintes pour la table `sponsored_dog`
--
ALTER TABLE `sponsored_dog`
  ADD CONSTRAINT `fk_dog_id` FOREIGN KEY (`dog_id`) REFERENCES `dog` (`dog_id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
