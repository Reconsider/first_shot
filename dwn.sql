-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 14, 2014 at 01:59 PM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a2215729_reconsd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` VALUES(1, 'a@a.com', 'anurag');

-- --------------------------------------------------------

--
-- Table structure for table `mentors`
--

DROP TABLE IF EXISTS `mentors`;
CREATE TABLE IF NOT EXISTS `mentors` (
  `id` int(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(40) NOT NULL,
  `age` varchar(10) NOT NULL,
  `exp` varchar(15) NOT NULL,
  `aoe` varchar(100) NOT NULL,
  `about` text NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `signup` datetime NOT NULL,
  `lastlogin` datetime NOT NULL,
  `notescheck` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mentors`
--

INSERT INTO `mentors` VALUES(3, 'Ms.', 'POORNIMA', 'Poornima', 'poornima.uniq@gmail.com', 'e815c9aa55712e3e0633e56b6eb5a52a', '22', '0-5', 'Professional Psychologist, Teen &amp; Adult age problems', 'I wish to help people lead happier and more meaningful lives, helping them overcome the common and challenging difficulties they face every day causing mental disturbance and imbalance in their minds. It is also my goal to remove stigma attached with mental disorders in the society. I strongly believe that sharing thoughts and feelings with others is an important form of relieving one’s distress and in most cases helps people automatically find solutions, which they would be unable to find if alone. ', '918113253451.jpg', '2014-02-10 10:49:21', '2014-02-10 10:49:21', '2014-02-10 10:49:21');
INSERT INTO `mentors` VALUES(2, 'Ms.', 'Shilpa K S', 'Shilpa', 'srinath.shilpa@gmail.com', '02a08433d06bdd4161f27179de60584c', '22', '0-5', 'Professional Clinical Psychologist,All teen age problems.  ', 'She believes to make effective contribution to the organization using her skills, leading to organizational as well as professional growth.Person with lot of attachment and care for people.', '677507796371.jpg', '2014-02-10 10:43:23', '2014-02-10 10:43:23', '2014-02-10 10:43:23');
INSERT INTO `mentors` VALUES(1, 'Mr.', 'Anurag Sure', 'Anurag', 'anurag.sure@gmail.com', 'dd9ac6afdde18263b4b7bfe4d9c324a7', '21', '0-5', 'Teen Age problems', 'I am a person, who looks life in a optimistic way. The medicine for all the problems in life is laugh and happiness. caring and sharing is the best gift you can give to anybody ', '175792848551.jpg', '2014-02-10 09:54:18', '2014-02-10 09:54:18', '2014-02-10 09:54:18');
INSERT INTO `mentors` VALUES(4, 'Ms.', 'Samieksha Joshi', 'Samieksha', 'samiekshajoshi@gmail.com', 'f7c17c84856affc79c4e41c7bdaa07c7', '23', '0-5', 'Mental Well being', 'A girl who studied psychology honors from Delhi University. Part of various hospitals as counselling intern and experience for schizophrenic patients as well as people with psychological disorders', '233615299453.jpg', '2014-02-11 12:26:43', '2014-02-11 12:26:43', '2014-02-11 12:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `serial` int(10) NOT NULL,
  `sender` varchar(20) NOT NULL,
  `receiver` varchar(20) NOT NULL,
  `status` varchar(5) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` VALUES(5, 'Siddhartha', 'Anurag', '0', 'he ha..gues this shit is workin ;-)', '2014-02-10 10:18:22');
INSERT INTO `messages` VALUES(2, 'Anurag', 'AnuragBhai', '0', 'i am fine. What about you', '2014-02-10 09:57:53');
INSERT INTO `messages` VALUES(3, 'Siddhartha', 'Anurag', '0', 'hI ASS HOLE', '2014-02-10 10:13:12');
INSERT INTO `messages` VALUES(4, 'Anurag', 'Siddhartha', '0', 'hi dude', '2014-02-10 10:17:16');
INSERT INTO `messages` VALUES(1, 'AnuragBhai', 'Anurag', '0', 'hi sir. How are you. I a perfectly want you to solve my problem.', '2014-02-10 09:57:10');
INSERT INTO `messages` VALUES(6, 'Anurag', 'Siddhartha', '0', 'hi dude.. getting it', '2014-02-10 10:24:53');
INSERT INTO `messages` VALUES(7, 'AnuragBhai', 'Anurag', '0', 'hello sir', '2014-02-10 10:32:48');
INSERT INTO `messages` VALUES(8, 'Anurag', 'AnuragBhai', '0', 'hello', '2014-02-10 10:33:15');
INSERT INTO `messages` VALUES(9, 'Siddhartha', 'Anurag', '0', 'yup getin it', '2014-02-10 10:33:29');
INSERT INTO `messages` VALUES(10, 'VARUN', 'Anurag', '0', 'bhai valentines day ki girl friend ledani badha paduthunna. what should i do??', '2014-02-10 12:12:05');
INSERT INTO `messages` VALUES(11, 'Anurag', 'VARUN', '1', 'Hello Mr Varun your main focus of life is gate.And as we have got the intelligence information that you will be getting top 10 ranks in gate, so do not worry, next valentines day you will be full girl friends and as your expert in scratching, so it will work in your favour', '2014-02-10 12:57:28');
INSERT INTO `messages` VALUES(12, 'Siddhartha', 'Anurag', '1', 'dude who r ths chicks??', '2014-02-10 23:59:55');
INSERT INTO `messages` VALUES(13, 'bhargavganti', 'Anurag', '0', 'I am really proud of you Bhai, and if any day i have a problem i will contact you. Hope your start up goes way higher and successful. And if any help can be done from my side i would love to help you!!\r\n\r\nALL THE BEST to YOU & your TEAM !! cheers !! ', '2014-02-11 02:14:49');
INSERT INTO `messages` VALUES(14, 'Siddhartha', 'Anurag', '1', 'Hi fucker', '2014-02-11 05:16:29');
INSERT INTO `messages` VALUES(15, 'Anurag', 'bhargavganti', '0', 'Thanks a lot anna. You can enjoy our services for free. You can ask any questions to our professionals out there.. And will surely inform you about it', '2014-02-11 09:34:00');
INSERT INTO `messages` VALUES(16, 'AnuragBhai', 'Anurag', '1', 'hi hello how are you', '2014-02-11 09:50:50');
INSERT INTO `messages` VALUES(17, 'Siddhartha', 'Anurag', '1', 'she seems gud :-D ..ur frnd again??', '2014-02-12 00:33:21');
INSERT INTO `messages` VALUES(18, 'bhargavganti', 'Anurag', '1', 'thank u !! :)', '2014-02-12 13:32:21');
INSERT INTO `messages` VALUES(19, 'vikas2014', 'Anurag', '1', 'heloo sir mujhe bhi ek problm hi,,,kya karu...milne pe hi bta sakta hu...', '2014-02-13 12:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(40) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `location` varchar(50) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `signup` datetime NOT NULL,
  `lastlogin` datetime NOT NULL,
  `notescheck` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(8, 'Mr.', 'Nikhila', 'Rayana', 'nikhila_rayana@yahoo.com', '6a2145b8a8b854e469ce5a4d0423de0e', '9642065447', '1992-11-24', 'Hyderabad ', '', '2014-02-10 14:02:00', '2014-02-10 14:02:00', '2014-02-10 14:02:00');
INSERT INTO `users` VALUES(7, 'Ms.', 'Srujana', 'Sure', 'ssure14@pthsd.net', 'dde923baae86f9f26f718958b84ff110', '9733658921', '08/14/1996', 'United States', '', '2014-02-10 13:56:55', '2014-02-10 13:56:55', '2014-02-10 13:56:55');
INSERT INTO `users` VALUES(6, 'Mr.', 'Sarath Santosh', 'Ssntoshsmile', 'santosh.santosh888@gmail.com', '60f7b2acc469737cc41cd317ba346979', '9165718467', '1991-01-21', 'Mumbai', '', '2014-02-10 13:38:16', '2014-02-10 13:38:16', '2014-02-10 13:38:16');
INSERT INTO `users` VALUES(5, 'Mr.', 'Hemanth Gopalakrishna', 'hem77', 'hemanth.krishna1@gmail.com', '1cadd7656e8ba10837d08327ea0f59ff', '8122899437', '1993-09-12', 'Thanjavur', '', '2014-02-10 12:43:48', '2014-02-10 12:43:48', '2014-02-10 12:43:48');
INSERT INTO `users` VALUES(4, 'Ms.', 'anandinivalluri', 'anandini', 'anandiniv@gmail.com', '7c41e50b0af84af769dfa40d5278ebab', '8220239742', '1992-08-21', 'tanjore', '', '2014-02-10 12:31:56', '2014-02-10 12:31:56', '2014-02-10 12:31:56');
INSERT INTO `users` VALUES(3, 'Mr.', 'VARUN GUNDA', 'VARUN', 'varunggupta5@gmail.com', '1e7a9c8fe858c9cea6553519b1a821a1', '9790312733', '1993-06-08', 'Chennai', '', '2014-02-10 12:08:46', '2014-02-10 12:08:46', '2014-02-10 12:08:46');
INSERT INTO `users` VALUES(1, 'Mr.', 'Siddhartha', 'Siddhartha', '6isiddhartha@gmail.com', '3503e63d4f2f99f65aaac89214d2a1f6', '8220977568', '1992-01-15', 'Colombo', '835045652231.JPG', '2014-02-10 09:25:45', '2014-02-10 09:25:45', '2014-02-10 09:25:45');
INSERT INTO `users` VALUES(2, 'Mr.', 'Anurag', 'AnuragBhai', 'anurag.sure@gmail.com', '9298e5223d280566bf681f0bc60e9526', '9789270069', '1992-06-29', 'Hyderabad', '464923829911.JPG', '2014-02-10 09:50:42', '2014-02-10 09:50:42', '2014-02-10 09:50:42');
INSERT INTO `users` VALUES(9, 'Ms.', 'Bhavya Ravinder', 'Bhavya', 'bhavya11.daksh@gmail.com', '54f05445de00a9546210340eb02bcb34', '9952022367', '1993-06-11', 'Thanjavur', '', '2014-02-10 14:04:52', '2014-02-10 14:04:52', '2014-02-10 14:04:52');
INSERT INTO `users` VALUES(10, 'Mr.', 'G KALYAN REDDY', 'kalyan03', 'kalanijanyan@gmail.com', '7d11098cb57e80c2a53c200145a01554', '7845602499', '1993-03-18', 'Tamil Nadu', '', '2014-02-10 22:46:34', '2014-02-10 22:46:34', '2014-02-10 22:46:34');
INSERT INTO `users` VALUES(11, 'Mr.', 'Thinakaran E', 'thinak8', 'thinak8@gmail.com', 'b6b0016a6b6477880fa8f7ecadda661c', '9967327028', '17th September', 'Mumbai', '', '2014-02-10 23:06:57', '2014-02-10 23:06:57', '2014-02-10 23:06:57');
INSERT INTO `users` VALUES(12, 'Mr.', 'Bhargav Ganti', 'bhargavganti', 'bhargav.ganti@gmail.com', 'a77465e4f1198987835d4e8b50154e6d', '9985563321', '1991-11-18', 'Hyderabad', '', '2014-02-11 02:10:28', '2014-02-11 02:10:28', '2014-02-11 02:10:28');
INSERT INTO `users` VALUES(13, '', 'MonaAkkera', 'Mona_Akkera', 'akkeramona@gmail.com', '8ba4260f47598cece4813a294952f7f3', '8125104054', '09-06-1992', 'Hyderabad', '', '2014-02-11 02:57:52', '2014-02-11 02:57:52', '2014-02-11 02:57:52');
INSERT INTO `users` VALUES(14, '', 'RAJTANTRA', 'rajtantra', 'lilhare.rajtantra560@gmail.com', '1d6532a5392f679d42ec106d97a8950a', '9993916545', '1989-09-23', 'Ahmedabad', '796585717005.JPG', '2014-02-11 04:25:40', '2014-02-11 04:25:40', '2014-02-11 04:25:40');
INSERT INTO `users` VALUES(15, '', 'rakhi', 'dahiya', 'dahiyarakhi89@gmail.com', '55021ef8b7dce499ef6be5cdf4d4f944', '9466947285', '1990-08-11', 'delhi', '', '2014-02-11 08:16:41', '2014-02-11 08:16:41', '2014-02-11 08:16:41');
INSERT INTO `users` VALUES(16, '', 'harini', 'harini', 'coolharini@gmail.com', 'b742eb0b908e5b9e34bdb5e59d17bb9e', '9789471042', '02041993', 'Tamil Nadu', '', '2014-02-11 09:23:34', '2014-02-11 09:23:34', '2014-02-11 09:23:34');
INSERT INTO `users` VALUES(17, 'Mr.', 'Shreya Srivastava', 'shreya17', 'shreyasrivastava.557@gmail.com', 'e4699fadc9c07a77601f3ad4d7d1f839', '9654899244', '1992-01-17', 'Noida', '', '2014-02-11 10:27:03', '2014-02-11 10:27:03', '2014-02-11 10:27:03');
INSERT INTO `users` VALUES(18, 'Mr.', 'Tanvi', 'tanvi01', 'baran.tanvi0108@gmail.com', 'fe34b371551b4f83f74c99121d0a8ff4', '8489735186', '1992-08-02', 'Chennai', '', '2014-02-12 02:08:06', '2014-02-12 02:08:06', '2014-02-12 02:08:06');
INSERT INTO `users` VALUES(19, 'Mr.', 'Bharadwaj Bondili', 'thebond009', 'bpb.mech.sastra@gmail.com', '4e8d74a423371a329e8f16da68976c27', '8056039200', '1992-11-27', 'Kandanchavadi', '210333926370.jpg', '2014-02-13 05:58:36', '2014-02-13 05:58:36', '2014-02-13 05:58:36');
INSERT INTO `users` VALUES(20, 'Mr.', 'Sudarshan Sarma', 'sudarshan', 'sudarshan.chanduri@gmail.com', '280488a15fa82f230e0e1f5d968a1aad', '9703578781', '1992-08-19', 'Hyderabad', '', '2014-02-13 09:21:40', '2014-02-13 09:21:40', '2014-02-13 09:21:40');
INSERT INTO `users` VALUES(21, '', 'Karthikeya', 'Koppuravuri', 'koppura.karthik@gmail.com', 'f98c0dcb41f67672957ead8bd48c6536', '7799777025', '19-09-1991', 'Hyderabad', '', '2014-02-13 11:54:11', '2014-02-13 11:54:11', '2014-02-13 11:54:11');
INSERT INTO `users` VALUES(22, '', 'vikas', 'vikas2014', 'vmtb2012@ymail.com', 'cff6102dbb51153ffefb1c2572795cc9', '8524971778', '2014-02-19', 'Varanasi', '340567534416.jpg', '2014-02-13 12:52:31', '2014-02-13 12:52:31', '2014-02-13 12:52:31');
INSERT INTO `users` VALUES(23, '', 'Karthik', 'molluru91', 'mollurukarthik@gmail.com', '434dc4659b102869ab0f279b98e664ae', '9566723511', '1991-09-27', 'Travessera de les Corts', '', '2014-02-13 13:01:00', '2014-02-13 13:01:00', '2014-02-13 13:01:00');
INSERT INTO `users` VALUES(24, 'Mr.', 'Nikhil K', 'nik', 'nikhhilkamineni7@gmail.com', 'e8c6541ee2d505bff033aae26b41947d', '9790269811', '1993-09-21', 'Tirupati', '', '2014-02-13 14:13:15', '2014-02-13 14:13:15', '2014-02-13 14:13:15');
INSERT INTO `users` VALUES(25, '', 'kya', 'kalyan', 'gundarapu.kalyan@gmail.com', '02c75fb22c75b23dc963c7eb91a062cc', '9790312733', '1979-09-30', 'Waranga', '', '2014-02-13 14:17:16', '2014-02-13 14:17:16', '2014-02-13 14:17:16');
