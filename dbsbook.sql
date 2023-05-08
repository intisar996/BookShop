-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 17, 2023 at 10:05 AM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbadmin`
--

DROP TABLE IF EXISTS `tbadmin`;
CREATE TABLE IF NOT EXISTS `tbadmin` (
  `aid` int(8) NOT NULL AUTO_INCREMENT,
  `aname` varchar(80) NOT NULL,
  `username` varchar(30) NOT NULL,
  `phone` int(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(20) NOT NULL,
  `seq` text NOT NULL,
  `answer` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=968542 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbadmin`
--

INSERT INTO `tbadmin` (`aid`, `aname`, `username`, `phone`, `email`, `address`, `seq`, `answer`, `password`) VALUES
(968541, 'admin', 'user', 98568741, 'Adminx@hotmail.com', 'Muscat', 'What is the name of your favorite childhood friend...', 'said', 'Ww123456$');

-- --------------------------------------------------------

--
-- Table structure for table `tbbooktype`
--

DROP TABLE IF EXISTS `tbbooktype`;
CREATE TABLE IF NOT EXISTS `tbbooktype` (
  `typ_id` int(8) NOT NULL AUTO_INCREMENT,
  `typ_name` varchar(50) NOT NULL,
  PRIMARY KEY (`typ_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbbooktype`
--

INSERT INTO `tbbooktype` (`typ_id`, `typ_name`) VALUES
(1, 'Fantasy'),
(2, 'Horror'),
(3, 'Romance'),
(4, 'Literary Fiction'),
(5, 'Classics'),
(6, 'Short Stories');

-- --------------------------------------------------------

--
-- Table structure for table `tbcustomer`
--

DROP TABLE IF EXISTS `tbcustomer`;
CREATE TABLE IF NOT EXISTS `tbcustomer` (
  `cid` int(8) NOT NULL AUTO_INCREMENT,
  `cname` varchar(75) NOT NULL,
  `cusername` varchar(30) NOT NULL,
  `cemail` varchar(50) NOT NULL,
  `cphone` int(8) NOT NULL,
  `caddress` varchar(50) NOT NULL,
  `cseq` text NOT NULL,
  `cans` varchar(75) NOT NULL,
  `cpassword` varchar(10) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=3223445 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbcustomer`
--

INSERT INTO `tbcustomer` (`cid`, `cname`, `cusername`, `cemail`, `cphone`, `caddress`, `cseq`, `cans`, `cpassword`) VALUES
(3223439, 'ahmed said  mohamed', 'ahmed@said', 'ahmedsaid91@email.com', 78965414, 'al musnahah', 'What is the name of your favorite childhood friend?', 'hassan', '12345678'),
(3223438, 'fatma', 'fatma@90', 'fatma89@email.com', 98745632, 'muscat', 'In what year was your mother born?', '1970', 'ff123456');

-- --------------------------------------------------------

--
-- Table structure for table `tblbbook`
--

DROP TABLE IF EXISTS `tblbbook`;
CREATE TABLE IF NOT EXISTS `tblbbook` (
  `book_id` int(8) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(75) NOT NULL,
  `book_price` double NOT NULL,
  `book_type` varchar(50) NOT NULL,
  `image` blob NOT NULL,
  `date_post` date NOT NULL,
  `quantity` int(20) NOT NULL,
  `book_desc` text NOT NULL,
  `book_writer` varchar(75) NOT NULL,
  `language` varchar(20) NOT NULL,
  `Delete_B` int(1) NOT NULL COMMENT 'if deleted 1 | 0 Not deleted',
  `aid` int(11) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbbook`
--

INSERT INTO `tblbbook` (`book_id`, `book_name`, `book_price`, `book_type`, `image`, `date_post`, `quantity`, `book_desc`, `book_writer`, `language`, `Delete_B`, `aid`) VALUES
(34, 'The Proposal', 6, 'Classics', 0x5468652050726f706f73616c2e6a7067, '2021-11-16', 12, 'There is so much to relate to and throughout the novel, there is a sharp feminist edge. Loved this one, and you will too. New York Times bestselling author Roxane Gay\r\n\r\nThe New York Times bestselling author of The Wedding Date serves up a novel about what happens when a public proposal doesnt turn into a happy ending, thanks to a woman who knows exactly how to make one on her own.', 'Jasmine Guillory', 'English', 1, 333),
(35, 'This Is How You Lose Her', 10, 'Romance', 0x5468697320497320486f7720596f75204c6f7365204865722e6a7067, '2021-11-16', 12, 'On a beach in the Dominican Republic, a doomed relationship flounders. In a New Jersey laundry room, a woman does her lovers washing and thinks about his wife. In Boston, a man buys his love child, his only son, a first baseball bat and glove. At the heart of these stories is the irrepressible, irresistible Yunior, a young hardhead whose longing for love is equaled only by his recklessness and by the extraordinary women he loves and loses.\r\n\r\nIn prose that is endlessly energetic, inventive, tender, and funny, these stories lay bare the infinite longing and inevitable weakness of the human heart. They remind us that passion always triumphs over experience, and that  the half-life of love is forever.', 'Junot Diaz', 'English', 0, 333),
(36, 'Drown Paperback', 6, 'Short Stories', 0x44726f776e2050617065726261636b2e6a7067, '2021-11-16', 23, 'A coming of age story of unparalleled power, Drown introduced the world to Junot Diaz s exhilarating talents. It also introduced an unforgettable narrator Yunior, the haunted, brilliant young man who tracks his familys precarious journey from the barrios of Santo Domingo to the tenements of industrial New Jersey, and their epic passage from hope to loss to something like love. Here is the soulful, unsparing book that made Diaz a literary sensation.', 'Junot Diaz', 'English', 0, 333),
(32, 'Daring and the Duke', 4, 'Fantasy', 0x446172696e6720616e64207468652044756b652e6a7067, '2023-03-16', 37, 'New York Times bestselling author Sarah MacLean returns with the much anticipated final book in her Bareknuckle Bastards series, featuring a scoundrel duke and the powerful woman who brings him to his knees.\r\n\r\nGrace Condry has spent a lifetime running from her past. Betrayed as a child by her only love and raised on the streets, she now hides in plain sight as queen of Londons darkest corners. Grace has a sharp mind and a powerful right hook and has never met an enemy she could not best. until the man she once loved returns.', 'Sarah MacLean', 'English', 0, 333),
(33, 'Royal Holiday', 5, 'Romance', 0x526f79616c20486f6c696461792e6a7067, '2021-11-16', 48, 'Vivian Forest has been out of the country a grand total of one time, so when she gets the chance to tag along on her daughter Maddies work trip to England to style a royal family member, she cant refuse. Shes excited to spend the holidays taking in the magnificent British sights, but what she doesnt expect is to become instantly attracted to a certain private secretary, his charming accent, and unyielding formality.', 'Jasmine Guillory', 'English', 1, 333),
(30, 'broken wings', 8.5, 'Classics', 0x47696272616e204b68616c696c2047696272616e2e6a7067, '2021-11-16', 80, 'There are many love stories that happen every day and pass on the person in all his states.. Of these stories, what is sad, what is joyful, ends with happiness and joy. This book included a number of sad stories watching that tell about broken wings and the pain that a person suffers.', 'Gibran Khalil Gibran', 'Arabic', 0, 333),
(31, 'Brazen and the Beast', 7.5, 'Romance', 0x4272617a656e20616e64207468652042656173742e6a7067, '2021-11-16', 12, 'New York Times Bestselling Author Sarah MacLean returns with the next book in the Bareknuckle Bastards series about three brothers bound by a secret that they cannot escape and the women who bring them to their knees.\r\n\r\nThe Ladys Plan\r\n\r\nWhen Lady Henrietta Sedley declares her twenty ninth year her own, she has plans to inherit her father s business, to make her own fortune, and to live her own life. But first, she intends to experience a taste of the pleasure sheâ€™ll forgo as a confirmed spinster. Everything is going perfectly.until she discovers the most beautiful man she is ever seen tied up in her carriage and threatening to ruin the Year of Hattie before it is even begun.', 'Sarah MacLean', 'English', 0, 333),
(29, 'Modern Arabic', 10, 'Classics', 0x4d6f6465726e204172616269632e6a7067, '2021-11-16', 80, 'The revised and updated edition of Modern Arabic takes this authoritative concise linguistic description of the structure and use of modern Arabic to an invaluable new level. Clive Holes traces the development of the Arabic language from Classical Arabic  the written language used in the 7th century for the Quran and poetry, through the increasingly symbiotic use of Modern Standard Arabic or MSA the language of writing and formal speech and dialectal Arabic the language of normal conversation. He shows how Arabic has been shaped over the centuries by migration, urbanization, and education giving us  a balanced, dispassionate, and accurate picture of the structures, functions, and varieties of the contemporary Arabic language', 'Clive Holes', 'English', 0, 333),
(26, 'A Tree Grows in Brooklyn', 6, 'Classics', 0x4120547265652047726f777320696e2042726f6f6b6c796e2e6a7067, '2021-11-16', 59, 'A moving coming of age story set in the 1900s  A Tree Grows in Brooklyn follows the lives of 11 year old Francie Nolan  her younger brother Neely  and their parents  Irish immigrants who have settled in the Williamsburg section of Brooklyn. Johnny Nolan is as loving and fanciful as they come  but he is also often drunk and out of work  unable to find his place in the land of opportunity. His wife Katie scrubs floors to put food on the table and clothes on her children s backs  instilling in them the values of being practical and planning ahead.\r\nWhen Johnny dies  leaving Katie pregnant Francie, smart, pensive and hoping for something better, cannot believe that life can carry on as before. But with her own determination, and that of her mother behind her, Francie is able to move toward the future of her dreams, completing her education and heading off to college, always carrying the beloved Brooklyn of her childhood in her heart.', 'Betty Smith', 'English', 0, 333),
(27, 'Our Little Frankish Cousin of Long Ago', 6, 'Classics', 0x4f7572204c6974746c65204672616e6b69736820436f7573696e206f66204c6f6e672041676f2e6a7067, '2021-11-16', 80, 'This is the story of Rainolf, a young lad who by lucky chance becomes the page boy of Charlemagne, King of the Frankish peoples of early Medieval Europe.\r\n\r\nGrowing up in the city of Aachen in the 8th century, Rainolf is very curious about writing despite his illiteracy, trying to understand what the letters upon parchments he sees mean. By sheer luck he and his friends encounter the Kings jester Magalis, a dwarf who is very amiable. After befriending and hearing the stories of Magalis, Rainolf is allowed to stay within the Royal Palace for a time.\r\n\r\nIt is here that Rainolf encounters Alcuin, the Kings scribe, a scholar who poses many questions. This inquiring spirit is what affords the young lad an audience with the King who, impressed by Rainolfs curiosity and keen efforts to learn, promotes him to the role of page. At last, by being a servant boy of the palace, Rainolf has the chance to become literate and enter the tutelage of the literate monks of the Kings court.', 'Evaleen Stein ', 'English', 0, 333),
(28, 'BelAmi by Guy de Maupassant', 6, 'Classics', 0x42656c2d416d6920627920477579206465204d617570617373616e742e6a7067, '2021-11-16', 72, 'is the second novel by French author Guy de Maupassant, published in 1885  an English translation titled Bel Ami, or  The History of a Scoundrel A Novel first appeared in 1903.\r\n\r\nThe story chronicles journalist Georges Duroy s corrupt rise to power from a poor former cavalry NCO in France s African colonies, to one of the most successful men in Paris, most of which he achieves by manipulating a series of powerful, intelligent, and wealthy', 'Guy de Maupassant', 'French', 0, 333),
(25, 'To Kill a Mockingbird', 8.5, 'Classics', 0x546f204b696c6c2061204d6f636b696e67626972642e6a7067, '2021-11-16', 25, 'Voted Americas Best Loved Novel in PBSs The Great American Read\r\n\r\nHarper Lees Pulitzer Prize-winning masterwork of honor and injustice in the deep South and the heroism of one man in the face of blind and violent hatred\r\n\r\nOne of the most cherished stories of all time, To Kill a Mockingbird has been translated into more than forty languages, sold more than forty million copies worldwide, served as the basis for an enormously popular motion picture, and was voted one of the best novels of the twentieth century by librarians across the country. A gripping, heart-wrenching, and wholly remarkable tale of coming-of-age in a South poisoned by virulent prejudice, it views a world of great beauty and savage inequities through the eyes of a young girl, as her father a crusading local lawyer risks everything to defend a black man unjustly accused of a terrible crime.', 'Harper Lee', 'English', 0, 333),
(37, 'How Long til Black Future Month', 6, 'Short Stories', 0x486f77204c6f6e672e6a7067, '2021-11-16', 49, 'Spirits haunt the flooded streets of New Orleans in the aftermath of Hurricane Katrina. In a parallel universe, a utopian society watches our world, trying to learn from our mistakes. A black mother in the Jim Crow South must save her daughter from a fey offering impossible promises. And in the Hugo award nominated short story The City Born Great, a young street kid fights to give birth to an old metropolis is soul.', ' N K Jemisin', 'English', 0, 333),
(38, 'The Haunting of Hill House ', 11, 'Horror', 0x546865204861756e74696e67206f662048696c6c20486f7573652e6a7067, '2021-11-16', 25, 'First published in 1959, Shirley Jackson s The Haunting of Hill House has been hailed as a perfect work of unnerving terror. It is the story of four seekers who arrive at a notoriously unfriendly pile called Hill House  Dr. Montague, an occult scholar looking for solid evidence of a haunting Theodora, his lighthearted assistant Eleanor, a friendless, fragile young woman well acquainted with poltergeists  and Luke, the future heir of Hill House. At first, their stay seems destined to be merely a spooky encounter with inexplicable phenomena. But Hill House is gathering its powers and soon it will choose one of them to make its own.', ' Shirley Jackson', 'English', 0, 333),
(39, 'Carrie Mass Market Paperback', 7.5, 'Horror', 0x436172726965204d617373204d61726b65742050617065726261636b2e6a7067, '2021-11-16', 40, 'Stephen King is legendary debut, about a teenage outcast and the revenge she enacts on her classmates.\r\n \r\nCarrie White may be picked on by her classmates, but she has a gift. She can move things with her mind. Doors lock. Candles fall. This is her power and her problem. Then, an act of kindness, as spontaneous as the vicious taunts of her classmates, offers Carrie a chance to be a normal. until an unexpected cruelty turns her gift into a weapon of horror and destruction that no one will ever forget.', 'Stephen King', 'English', 0, 333),
(40, 'Unspeakable Things', 8.5, 'Horror', 0x556e737065616b61626c65205468696e67732e6a7067, '2021-11-16', 45, 'Cassie McDowell is life in 1980s Minnesota seems perfectly wholesome. She lives on a farm, loves school, and has a crush on the nicest boy in class. Yes, there are her parents  strange parties and their parade of deviant guests, but she is grown accustomed to them.\r\n\r\nAll that changes when someone comes hunting in Lilydale.\r\n\r\nOne by one, local boys go missing. One by one, they return changed violent, moody, and withdrawn. What happened to them becomes the stuff of shocking rumors. The accusations of who is responsible grow just as wild, and dangerous town secrets start to surface. Then Cassie is own sister undergoes the dark change. If she is to survive, Cassie must find her way in an adult world where every sin is justified, and only the truth is unforgivable.', 'Jess Lourey', 'English', 0, 333),
(41, 'Devoted', 6.5, 'Horror', 0x4465766f7465642e6a7067, '2021-11-16', 56, 'Woody Bookman has not spoken a word in his eleven years of life. Not when his father died in a freak accident. Not when his mother, Megan, tells him she loves him. For Megan, keeping her boy safe and happy is what matters. But Woody believes a monstrous evil was behind his fathers death and now threatens him and his mother. And he is not alone in his thoughts. An ally unknown to him is listening.\r\n\r\nA uniquely gifted dog with a heart as golden as his breed, Kipp is devoted beyond reason to people. When he hears the boy who communicates like he does, without speaking, Kipp knows he needs to find him before itâ€™s too late.', 'Dean Koontz', 'English', 0, 333),
(42, 'Where the Crawdads Sing', 3.5, 'Literary Fiction', 0x5768657265207468652043726177646164732053696e672e6a7067, '2021-11-16', 22, 'For years, rumors of the Marsh Girl  have haunted Barkley Cove, a quiet town on the North Carolina coast. So in late 1969, when handsome Chase Andrews is found dead, the locals immediately suspect Kya Clark, the so called Marsh Girl. But Kya is not what they say. Sensitive and intelligent, she has survived for years alone in the marsh that she calls home, finding friends in the gulls and lessons in the sand. Then the time comes when she yearns to be touched and loved. When two young men from town become intrigued by her wild beauty, Kya opens herself to a new life until the unthinkable happens.', 'Delia Owens', 'English', 0, 333),
(43, 'The Last Thing He Told Me', 6.5, 'Literary Fiction', 0x546865204c617374205468696e6720486520546f6c64204d652e6a7067, '2021-11-16', 25, 'Before Owen Michaels disappears, he smuggles a note to his beloved wife of one year  Protect her. Despite her confusion and fear, Hannah Hall knows exactly to whom the note refers Owen s sixteen year old daughter, Bailey. Bailey, who lost her mother tragically as a child. Bailey, who wants absolutely nothing to do with her new stepmother.\r\n\r\nAs Hannah s increasingly desperate calls to Owen go unanswered, as the FBI arrests Owen s boss, as a US marshal and federal agents arrive at her Sausalito home unannounced, Hannah quickly realizes her husband isnt who he said he was. And that Bailey just may hold the key to figuring out Owens true identity and why he really disappeared.', 'Laura Dave', 'English', 0, 333),
(44, 'The Dutch House', 7.5, 'Literary Fiction', 0x762e6a7067, '2021-11-16', 62, 'At the end of the Second World War, Cyril Conroy combines luck and a single canny investment to begin an enormous real estate empire, propelling his family from poverty to enormous wealth. His first order of business is to buy the Dutch House, a lavish estate in the suburbs outside of Philadelphia. Meant as a surprise for his wife, the house sets in motion the undoing of everyone he loves.', 'Ann Patchett', 'English', 0, 333),
(45, 'CIRCE', 14, 'Horror', 0x43495243452e6a7067, '2021-11-16', 50, 'In the house of Helios, god of the sun and mightiest of the Titans, a daughter is born. But Circe is a strange child not powerful, like her father, nor viciously alluring like her mother. Turning to the world of mortals for companionship, she discovers that she does possess power  the power of witchcraft, which can transform rivals into monsters and menace the gods themselves.\r\n\r\nThreatened, Zeus banishes her to a deserted island, where she hones her occult craft, tames wild beasts and crosses paths with many of the most famous figures in all of mythology, including the Minotaur, Daedalus and his doomed son Icarus, the murderous Medea, and, of course, wily Odysseus.', 'Madeline Miller', 'English', 0, 333),
(46, 'Ninth House', 6, 'Horror', 0x4e696e746820486f7573652e6a7067, '2021-11-16', 50, 'Galaxy  Alex  Stern is the most unlikely member of Yale s freshman class. Raised in the Los Angeles hinterlands by a hippie mom, Alex dropped out of school early and into a world of shady drug dealer boyfriends, dead end jobs, and much, much worse. In fact, by age twenty, she is the sole survivor of a horrific, unsolved multiple homicide. Some might say she is thrown her life away. But at her hospital bed, Alex is offered a second chance  to attend one of the world s most prestigious universities on a full ride. What is the catch, and why her?\r\n\r\nStill searching for answers, Alex arrives in New Haven tasked by her mysterious benefactors with monitoring the activities of Yale is secret societies. Their eight windowless tombs  are the well known haunts of the rich and powerful, from high ranking politicos to Wall Street is biggest players. But their occult activities are more sinister and more extraordinary than any paranoid imagination might conceive. They tamper with forbidden magic. They raise the dead. And, sometimes, they prey on the living.', 'Ninth House', 'English', 0, 333),
(47, 'The Water Dancer', 6.5, 'Fantasy', 0x5468652057617465722044616e6365722e6a7067, '2021-11-17', 25, 'Young Hiram Walker was born into bondage. When his mother was sold away, Hiram was robbed of all memory of her but was gifted with a mysterious power. Years later, when Hiram almost drowns in a river, that same power saves his life. This brush with death births an urgency in Hiram and a daring scheme  to escape from the only home he is ever known.\r\n\r\nSo begins an unexpected journey that takes Hiram from the corrupt grandeur of Virginia is proud plantations to desperate guerrilla cells in the wilderness, from the coffin of the Deep South to dangerously idealistic movements in the North. Even as he is enlisted in the underground war between slavers and the enslaved, Hiram is resolve to rescue the family he left behind endures.', 'Ta-Nehisi Coates', 'English', 0, 333),
(49, 'We Were Eight Years in Power', 5, 'Fantasy', 0x5765205765726520456967687420596561727320696e20506f7765722e6a7067, '2021-11-16', 50, 'We Were Eight Years in Power features Coates is iconic essays first published in The Atlantic, including  Fear of a Black President, The Case for Reparations,  and The Black Family in the Age of Mass Incarceration, along with eight fresh essays that revisit each year of the Obama administration through Coates is own experiences, observations, and intellectual development, capped by a bracingly original assessment of the election that fully illuminated the tragedy of the Obama era. We Were Eight Years in Power is a vital account of modern America, from one of the definitive voices of this historic moment.', 'Ta-Nehisi Coates', 'English', 0, 333),
(50, 'The Book Woman of Troublesome Creek', 5, 'Fantasy', 0x54686520426f6f6b20576f6d616e206f662054726f75626c65736f6d6520437265656b2e6a7067, '2021-11-16', 49, 'The bestselling historical fiction from Kim Michele Richardson, this is a novel following Cussy Mary, a packhorse librarian and her quest to bring books to the Appalachian community she loves, perfect for readers of Lee Smith and Lisa Wingate. The perfect addition to your next book club!\r\n\r\nThe hardscrabble folks of Troublesome Creek have to scrap for everything everything except books, that is. Thanks to Roosevelt is Kentucky Pack Horse Library Project, Troublesome is got its very own traveling librarian, Cussy Mary Carter.', 'Kim Michele Richardson', 'English', 0, 333);

-- --------------------------------------------------------

--
-- Table structure for table `tblbill`
--

DROP TABLE IF EXISTS `tblbill`;
CREATE TABLE IF NOT EXISTS `tblbill` (
  `bill_no` int(8) NOT NULL,
  `cusername` varchar(50) NOT NULL,
  `Total_price` double NOT NULL,
  `card_name` varchar(50) NOT NULL COMMENT 'Bank Card Name',
  `Expire_Date` date NOT NULL,
  `OrderDate` date NOT NULL COMMENT 'order date',
  `status_bill` varchar(50) NOT NULL COMMENT 'done or not',
  PRIMARY KEY (`bill_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbill`
--

INSERT INTO `tblbill` (`bill_no`, `cusername`, `Total_price`, `card_name`, `Expire_Date`, `OrderDate`, `status_bill`) VALUES
(818242, 'ahmed@said', 17, 'ss', '2023-03-23', '2023-03-16', 'In Delivery'),
(833085, 'xx', 12, 'ss', '2023-03-31', '2023-03-16', 'Processing'),
(302370, 'ahmed@said', 16.5, 'ahmed', '2023-03-25', '2023-03-17', 'Processing'),
(425692, 'ahmed@said', 6, 'ahmed', '2023-03-24', '2023-03-17', 'Processing');

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

DROP TABLE IF EXISTS `tblcart`;
CREATE TABLE IF NOT EXISTS `tblcart` (
  `cart_id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `book_id` int(11) NOT NULL COMMENT 'Book id',
  `Quantity` int(3) NOT NULL,
  `price` float NOT NULL,
  `Total` float NOT NULL,
  `bill_no` int(8) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcart`
--

INSERT INTO `tblcart` (`cart_id`, `username`, `book_id`, `Quantity`, `price`, `Total`, `bill_no`) VALUES
(17, 'ahmed@said', 30, 3, 8.5, 25.5, 818242),
(34, 'xx', 34, 2, 6, 12, 833085),
(36, 'ahmed@said', 26, 1, 6, 6, 302370),
(37, 'ahmed@said', 42, 3, 3.5, 10.5, 302370),
(38, 'ahmed@said', 26, 1, 6, 6, 425692);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
