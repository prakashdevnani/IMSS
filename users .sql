-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `users` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `users`;

DROP TABLE IF EXISTS `signup`;
CREATE TABLE `signup` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `signup` (`ID`, `name`, `email`, `phone`, `password`) VALUES
(4,	'Prakash Devnani',	'prakashdevnani4@gmail.com',	2147483647,	'741852');

DROP TABLE IF EXISTS `webdata`;
CREATE TABLE `webdata` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `URL_NAME` varchar(255) NOT NULL,
  `TITLE` varchar(255) NOT NULL,
  `RES_TIME` varchar(255) NOT NULL,
  `LOA_TIME` varchar(255) NOT NULL,
  `SUMMARY` varchar(255) NOT NULL,
  `FEEDBACK` int(30) NOT NULL,
  `SE` int(10) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `URL_NAME` (`URL_NAME`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `webdata` (`ID`, `URL_NAME`, `TITLE`, `RES_TIME`, `LOA_TIME`, `SUMMARY`, `FEEDBACK`, `SE`) VALUES
(1,	'http://www.helloworld.com/',	'Hello World',	'5.383',	'5.393',	'A powerful combination of native technology and marketing strategy allowing \nbrands to create unforgettable interactions, drive consumer demand and \naccelerate growth.',	0,	1),
(2,	'http://helloworldcollection.de/',	'Hello World',	'5.383',	'5.423',	'The largest collection of Hello World programs on the Internet.',	0,	1),
(3,	'http://www.hello-world.com/',	'Hello World',	'5.383',	'5.416',	'Main index for hello-world: links to login and all of the languages.',	0,	1),
(4,	'https://shophelloworld.com/',	'Hello World',	'5.383',	'5.436',	'Hello World . Philadelphia . Home & Lifestyle . Modern Furniture . Decor . Jewelry \n. Chilewich . Gifts.',	0,	1),
(5,	'https://www.youtube.com/watch?v=Yw6u6YkTgQ4',	'Hello World',	'5.383',	'5.398',	'Mar 30, 2018 ... a test of a virtual singer software - http://www.myriad-online.com/en/products/\nvirtualsinger.htm also, soundcloud! https://soundcloud.com/louie-zong/hello-\nworld.',	0,	1),
(6,	'http://hwc.tv/',	'Hello World',	'5.383',	'5.407',	'Hello World - Video & Virtual Reality production company renting latest audio, \nvideo, lighting & virtual reality tools. 7 days a week - Chelsea, New York.',	0,	1),
(7,	'https://en.wikipedia.org/wiki/%22Hello,_World!%22_program',	'Hello World',	'5.383',	'5.383',	'A \"Hello, World!\" program is a computer program that outputs or displays \"Hello, \nWorld!\" to a user. Being a very simple program in most programming languages, \nit is often used to illustrate the basic syntax of a programming language for a \nworking progr',	0,	1),
(8,	'http://www.namesdir.net/s/devnani',	'prakash devnani',	'1.298',	'1.303',	'... Rajeev Devnani 2; Raj Devnani 2; Raja Devnani 2; Rahul Devnani 2; Pushpa \nDevnani 2; Puneet Devnani 2; Priyanka Devnani 2; Priya Devnani 2; Preeti \nDevnani 2; Preet Devnani 2; Pratik Devnani 2; Prateek Devnani 2; Prashant \nDevnani 2; Prashansa Devnani',	0,	1),
(9,	'https://www.naukri.com/prakash-retail-pvt-ltd-recruiters',	'prakash devnani',	'1.298',	'1.308',	'0 Followers. Send Message Â· Prakash Devnani Brand Manager Aref Abdul Sattar \nTextiles Pvt Ltd Hyderabad / Secunderabad. Skills/Roles I hire for : Not Specified. \n0 active jobs | Last active on 20-Jul-2017. Follow 17 Followers. Send Message Â· \nAnkit Gird',	0,	1),
(10,	'http://english.sakshi.com/gallery/2016/12/01/mebaz-felicitates-mr-world-2016-rohit-khandelwal',	'prakash devnani',	'1.298',	'1.3',	'Dec 1, 2016 ... Mebaz felicitated Mr World 2016 Rohit Khandelwal at Mebaz Store, Bangalore on \nWednesday. Prakash Devnani, actors Ramya, Nikitha Narayan, Miss Diva-South \nPhalguni Manhas and other models joined Rohit Khandelwal in showcasing the \nmagnific',	0,	1),
(11,	'https://en.wikipedia.org/wiki/Category:Rajasthani_people',	'prakash devnani',	'1.298',	'1.305',	'Younger Dagar Brothers Â· Aminuddin Dagar Â· Jaidayal Dalmia Â· Ramkrishna \nDalmia Â· Rajendra Darda Â· Purushottam Das Â· Arvind Dave Â· Milind Murli Deora Â· \nMurli Deora Â· Thakur Deshraj Â· Vijaydan Detha Â· Gayatri Devi Â· Vasudev Devnani Â· \nHira La',	0,	1),
(12,	'http://magnifiquetimes.com/?p=2358',	'prakash devnani',	'1.298',	'1.313',	'Nov 30, 2016 ... Prakash Devnani, General Manager, Mebaz, while felicitating Rohit Khandelwal \nfor winning the coveted MR WORLD 2016 title, lauded Rohit Khandelwal for \nmaking the nation proud at an international platform. Accepting the felicitation \nRohi',	0,	1),
(13,	'https://www.youtube.com/watch?v=asHBm655IRM',	'prakash devnani',	'1.298',	'1.31',	'Sep 25, 2015 ... bang, klo cman 1 kartu aja contohnya simpati gg ada sinya tp yg lain ada apa \nmungkin bisa di benerin kyk gtu jgaï»¿. Read more. Show less. Reply 1. Loading... \nView reply. View reply. Hide replies. Prakash Devnani1 year ago. how did you ',	0,	1),
(14,	'http://jiwan.com/portfolio-classic-four/',	'prakash devnani',	'1.298',	'1.318',	'Amitava Saha. Marketing. Kamal Prakash. Director. Vimal Prakash. Director. \nAbhimanyu Prakash. Corporate Administration. Chetan Prakash. Marketing. \nSatyavrat Singh. Corporate Administration ... Marketing. Beethika Biswas. \nMarketing. Ram Dhani Keot. Corp',	0,	1),
(15,	'https://www.youth4work.com/Talent/C-Language/Forum/114363-what-would-be-the-equivalent-pointer-expression-for-referring-the-array-element-aijkl',	'prakash devnani',	'1.298',	'1.32',	'A. ((((a+i)+j)+k)+l) B. *(*(*(*(a+i)+j)+k)+l) C. (((a+i)+j)+k+l) D. ((a+i)+j+k+l)',	0,	1),
(24,	'https://www.facebook.com/public/Prakash-Prakash',	'gmail prakash',	'1.059',	'1.059',	'View the profiles of people named Prakash Prakash. Join Facebook to connect \nwith Prakash Prakash and others you may know. Facebook gives people the \npower...',	0,	1),
(25,	'https://www.westminster.ac.uk/about-us/our-people/directory/prakash-edmond',	'gmail prakash',	'1.059',	'1.061',	'Dr. Edmond Prakash is a Professor and Head of Creative Technologies at the \nUniversity of Westminster. Prior to that he was Professor in Computer Games \nTechnology at the Bournemouth University, United Kingdom and Department of \nComputer Science and Techn',	0,	1),
(26,	'https://dribbble.com/ghodkester',	'gmail prakash',	'1.059',	'1.063',	'Prakash Ghodke Baroda, India. 26. Expertise in creating intuitive design \nexperience for web & mobile. Currently available for hire. Email: pakiaghodkester\n@gmail.com Skype: ghodkester. Pro Â· Message Â· Follow Following Blocked. More\nÂ ...',	0,	1),
(27,	'https://profiles.stanford.edu/manu-prakash',	'gmail prakash',	'1.059',	'1.064',	'Manu Prakash is part of Stanford Profiles, official site for faculty, postdocs, \nstudents and staff information (Expertise, Bio, Research, Publications, and more). \nThe site facilitates research and collaboration in academic endeavors.',	0,	1),
(28,	'https://www.prakashwright.com/',	'gmail prakash',	'1.059',	'1.067',	'... on Prakash Wright and The Kash Wright Trio, when and where we are \nperforming, and how to book me or the trio. Visit the Kash Wright Trio page for \nsamples of what we sound like. You can also follow Kash Wright Trio on \nFacebook. Drop me a line at kas',	0,	1),
(29,	'https://www.artstation.com/subi3d',	'gmail prakash',	'1.059',	'1.068',	'Character Artist | maxmodeler@gmail.com.',	0,	1),
(30,	'https://www.instagram.com/prakashdraws/?hl=en',	'gmail prakash',	'1.059',	'1.071',	'Prakash Khatri Chhetri. Illustrator / Artist Stockholm, Sweden Bookings or art \nrelated inquires: prakashdraws@gmail.com prakashdraws.tictail.com Â· Twin \npeaks inspired gig poster for @svartastuganmusic gig at Copperfields. Had much \nfun with Â· Another ',	0,	1),
(31,	'https://twitter.com/prakashlab?lang=en',	'gmail prakash',	'1.059',	'1.075',	'The latest Tweets from PrakashLab (@PrakashLab): \"Fantastic single author \npaper by @wgilpin0 - Applied Physics graduate student on â€œcryptographic \nhashing in chaotic hydrodynamicsâ€ comes out in PNAS today. https://t.co/\npztB6oxOSt - congratulations W',	0,	1),
(32,	'https://www.jnu.ac.in/content/bprakash',	'gmail prakash',	'1.059',	'1.077',	'Brahma Prakash Singh. Brahma Prakash Singh. Assistant Professor. Centre/\nSchool/Special Centre: School of Arts & Aesthetics. Room No: 07, SAA-I. Off. \nPhone: 011-26708763. Email: bprakash@jnu.ac.in , prakash.brahma@gmail.\ncom. Personal Webpage: http://www',	0,	1);

-- 2018-04-29 14:22:56
