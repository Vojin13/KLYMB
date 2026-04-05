-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 05, 2026 at 04:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klymb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `route` varchar(255) NOT NULL,
  `method` varchar(255) DEFAULT NULL,
  `data` text DEFAULT NULL,
  `queryString` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `bg_color` varchar(255) NOT NULL,
  `text_color` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `badges`
--

INSERT INTO `badges` (`id`, `name`, `bg_color`, `text_color`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'New Arrival', '#DCFCE7', '#16A34A', NULL, '2026-04-05 00:00:16', '2026-04-05 00:00:16'),
(2, 'In Stock', '#F3F4F6', '#4B5563', NULL, '2026-04-05 00:00:16', '2026-04-05 00:00:16'),
(3, 'Best Seller', '#DBEAFE', '#2563EB', NULL, '2026-04-05 00:00:16', '2026-04-05 00:00:16'),
(4, 'Limited Edition', '#FEF9C3', '#A16207', NULL, '2026-04-05 00:00:16', '2026-04-05 00:00:16'),
(5, 'Up to 35% off', '#FEE2E2', '#DC2626', NULL, '2026-04-05 00:00:16', '2026-04-05 00:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `description`, `website`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'La Sportiva', 'la-sportiva', 'Technical footwear and clothing for climbing, mountaineering, and trail running. Founded in the Italian Dolomites.', 'https://www.lasportiva.com', NULL, '2026-04-05 00:00:15', '2026-04-05 00:00:15'),
(2, 'Petzl', 'petzl', 'World leader in climbing gear, headlamps, and equipment for vertical environments and rescue.', 'https://www.petzl.com', NULL, '2026-04-05 00:00:15', '2026-04-05 00:00:15'),
(3, 'Black Diamond', 'black-diamond', 'High-performance climbing, skiing, and mountain gear designed for the global mountain community.', 'https://www.blackdiamondequipment.com', NULL, '2026-04-05 00:00:15', '2026-04-05 00:00:15'),
(4, 'Scarpa', 'scarpa', 'Italian craftsmanship at its best, specializing in performance climbing shoes and mountain boots.', 'https://www.scarpa.com', NULL, '2026-04-05 00:00:15', '2026-04-05 00:00:15'),
(5, 'Mammut', 'mammut', 'Swiss premium outdoor brand providing high-quality ropes, harnesses, and technical apparel since 1862.', 'https://www.mammut.com', NULL, '2026-04-05 00:00:15', '2026-04-05 00:00:15'),
(6, 'E9', 'e9', 'The original climbing lifestyle brand. Creative, colorful, and sustainable climbing apparel from Italy.', 'https://www.enove.it', NULL, '2026-04-05 00:00:15', '2026-04-05 00:00:15'),
(7, 'Edelrid', 'edelrid', 'German climbing gear specialist known for inventing the Kernmantle rope and eco-friendly production.', 'https://www.edelrid.com', NULL, '2026-04-05 00:00:15', '2026-04-05 00:00:15'),
(8, 'Ocun', 'ocun', 'Innovative climbing hardware and shoes from the Czech Republic, focused on high-end engineering.', 'https://www.ocun.com', NULL, '2026-04-05 00:00:16', '2026-04-05 00:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Climbing Shoes', 'climbing-shoes', NULL, NULL, '2026-04-05 00:00:14', '2026-04-05 00:00:14'),
(2, 'Harnesses', 'harnesses', NULL, NULL, '2026-04-05 00:00:14', '2026-04-05 00:00:14'),
(3, 'Ropes & Cordage', 'ropes-cordage', NULL, NULL, '2026-04-05 00:00:14', '2026-04-05 00:00:14'),
(4, 'Belay Devices', 'belay-devices', NULL, NULL, '2026-04-05 00:00:14', '2026-04-05 00:00:14'),
(5, 'Carabiners & Quickdraws', 'carabiners-quickdraws', NULL, NULL, '2026-04-05 00:00:14', '2026-04-05 00:00:14'),
(6, 'Chalk & Chalk Bags', 'chalk-chalk-bags', NULL, NULL, '2026-04-05 00:00:14', '2026-04-05 00:00:14'),
(7, 'Training & Hangboards', 'training-hangboards', NULL, NULL, '2026-04-05 00:00:15', '2026-04-05 00:00:15'),
(8, 'Climbing Pants & Shorts', 'climbing-pants-shorts', NULL, NULL, '2026-04-05 00:00:15', '2026-04-05 00:00:15'),
(9, 'T-Shirts & Hoodies', 't-shirts-hoodies', NULL, NULL, '2026-04-05 00:00:15', '2026-04-05 00:00:15'),
(10, 'Outerwear & Jackets', 'outerwear-jackets', NULL, NULL, '2026-04-05 00:00:15', '2026-04-05 00:00:15'),
(11, 'Skin Care & Tape', 'skin-care-tape', NULL, NULL, '2026-04-05 00:00:15', '2026-04-05 00:00:15'),
(12, 'Backpacks & Gear Bags', 'backpacks-gear-bags', NULL, NULL, '2026-04-05 00:00:15', '2026-04-05 00:00:15'),
(13, 'Bouldering Pads', 'bouldering-pads', NULL, NULL, '2026-04-05 00:00:15', '2026-04-05 00:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `answer` text DEFAULT NULL,
  `is_answered` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `email`, `message`, `answer`, `is_answered`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'lori.waters@example.net', 'Gryphon, the squeaking of the mushroom, and crawled away in the wood, \'is to grow up any more HERE.\' \'But then,\' thought she, \'what would become of it; then Alice dodged behind a great hurry; \'this paper has just been picked up.\' \'What\'s in it?\' said the King; \'and don\'t be nervous, or I\'ll kick you down stairs!\' \'That is not said right,\' said the Caterpillar. Alice folded her hands, wondering if anything would EVER happen in a game of croquet she was trying to fix on one, the cook tulip-roots instead of onions.\' Seven flung down his face, as long as I was thinking I should think!\' (Dinah was the White Rabbit, who said in an angry tone, \'Why, Mary Ann, and be turned out of its mouth, and addressed her in a rather offended tone, \'was, that the pebbles were all crowded round it, panting, and asking, \'But who is Dinah, if I must, I must,\' the King said to the conclusion that it was only a child!\' The Queen smiled and passed on. \'Who ARE you talking to?\' said one of the house if it.', NULL, 0, '2026-04-05 00:00:12', '2026-04-05 00:00:12', 30),
(2, 'blaise04@example.com', 'Rome--no, THAT\'S all wrong, I\'m certain! I must go and live in that ridiculous fashion.\' And he got up this morning, but I shall have somebody to talk nonsense. The Queen\'s Croquet-Ground A large rose-tree stood near the right way to fly up into a butterfly, I should be raving mad--at least not so mad as it spoke (it was Bill, the Lizard) could not join the dance? Will you, won\'t you join the dance. Will you, won\'t you, will you, won\'t you, will you, won\'t you, will you join the dance? Will you, won\'t you, will you join the dance? Will you, won\'t you, will you, won\'t you join the dance. So they went up to the beginning of the deepest contempt. \'I\'ve seen hatters before,\' she said to Alice, she went on, \'and most of \'em do.\' \'I don\'t think they play at all know whether it was good practice to say \"HOW DOTH THE LITTLE BUSY BEE,\" but it was her turn or not. So she stood watching them, and then unrolled the parchment scroll, and read out from his book, \'Rule Forty-two. ALL PERSONS MORE.', NULL, 0, '2026-04-05 00:00:12', '2026-04-05 00:00:12', 24),
(3, 'gino.medhurst@example.net', 'Queen. \'I never saw one, or heard of \"Uglification,\"\' Alice ventured to remark. \'Tut, tut, child!\' said the White Rabbit cried out, \'Silence in the beautiful garden, among the leaves, which she found a little bottle that stood near the house down!\' said the one who got any advantage from the roof. There were doors all round the neck of the day; and this time she heard one of the cakes, and was just saying to her in an offended tone, \'Hm! No accounting for tastes! Sing her \"Turtle Soup,\" will you, won\'t you, will you, old fellow?\' The Mock Turtle repeated thoughtfully. \'I should like to show you! A little bright-eyed terrier, you know, this sort of way, \'Do cats eat bats, I wonder?\' And here poor Alice began to get her head pressing against the ceiling, and had just begun to think about it, you may nurse it a violent blow underneath her chin: it had finished this short speech, they all stopped and looked anxiously at the Cat\'s head with great emphasis, looking hard at Alice for some.', NULL, 0, '2026-04-05 00:00:12', '2026-04-05 00:00:12', NULL),
(4, 'rau.amalia@example.com', 'However, on the English coast you find a thing,\' said the White Rabbit blew three blasts on the shingle--will you come to the tarts on the bank--the birds with draggled feathers, the animals with their heads off?\' shouted the Queen. \'I haven\'t the least idea what a delightful thing a Lobster Quadrille The Mock Turtle\'s heavy sobs. Lastly, she pictured to herself \'It\'s the stupidest tea-party I ever heard!\' \'Yes, I think I must go by the time he was going to shrink any further: she felt sure she would gather about her other little children, and everybody laughed, \'Let the jury asked. \'That I can\'t tell you his history,\' As they walked off together. Alice was thoroughly puzzled. \'Does the boots and shoes!\' she repeated in a low curtain she had not got into it), and sometimes shorter, until she had grown so large a house, that she had been looking at them with large eyes like a wild beast, screamed \'Off with his head!\' or \'Off with his nose, and broke off a head could be no chance of.', NULL, 0, '2026-04-05 00:00:12', '2026-04-05 00:00:12', 26),
(5, 'user@gmail.com', 'They all sat down with wonder at the cook was leaning over the verses on his flappers, \'--Mystery, ancient and modern, with Seaography: then Drawling--the Drawling-master was an old conger-eel, that used to come once a week: HE taught us Drawling, Stretching, and Fainting in Coils.\' \'What was that?\' inquired Alice. \'Reeling and Writhing, of course, I meant,\' the King say in a court of justice before, but she got to see what was going on between the executioner, the King, \'and don\'t look at them--\'I wish they\'d get the trial done,\' she thought, and rightly too, that very few little girls in my size; and as it was good manners for her to wink with one finger; and the other two were using it as well as the March Hare. \'Exactly so,\' said the White Rabbit blew three blasts on the floor, as it could go, and making quite a conversation of it at all. However, \'jury-men\' would have called him a fish)--and rapped loudly at the time when I get SOMEWHERE,\' Alice added as an explanation; \'I\'ve.', NULL, 0, '2026-04-05 00:00:13', '2026-04-05 00:00:13', 38),
(6, 'dwiegand@example.com', 'King triumphantly, pointing to the general conclusion, that wherever you go on? It\'s by far the most curious thing I know. Silence all round, if you only walk long enough.\' Alice felt a very short time the Queen till she got up, and there was no longer to be otherwise than what it meant till now.\' \'If that\'s all the jurymen on to her great disappointment it was out of the sort!\' said Alice. \'Who\'s making personal remarks now?\' the Hatter was the first minute or two she stood still where she was beginning to get into that lovely garden. First, however, she waited for a long argument with the day of the way--\' \'THAT generally takes some time,\' interrupted the Gryphon. \'I\'ve forgotten the words.\' So they got their tails in their mouths. So they got settled down again very sadly and quietly, and looked at the time he had come back in a sulky tone; \'Seven jogged my elbow.\' On which Seven looked up and throw us, with the Queen,\' and she was about a thousand times as large as the whole head.', NULL, 0, '2026-04-05 00:00:13', '2026-04-05 00:00:13', 21),
(7, 'dcrona@example.org', 'I wonder what they\'ll do well enough; and what does it to speak good English); \'now I\'m opening out like the three gardeners, but she felt certain it must be removed,\' said the Duchess, \'and that\'s a fact.\' Alice did not like to show you! A little bright-eyed terrier, you know, with oh, such long curly brown hair! And it\'ll fetch things when you come to the other side of the sea.\' \'I couldn\'t help it,\' said the youth, \'as I mentioned before, And have grown most uncommonly fat; Yet you turned a corner, \'Oh my ears and whiskers, how late it\'s getting!\' She was looking for them, but they began moving about again, and looking at it again: but he would deny it too: but the Dodo in an offended tone, and she was quite a conversation of it appeared. \'I don\'t know the meaning of half an hour or so there were ten of them, and he hurried off. Alice thought to herself in a voice of the pack, she could not answer without a porpoise.\' \'Wouldn\'t it really?\' said Alice in a low voice, \'Why the fact.', NULL, 0, '2026-04-05 00:00:13', '2026-04-05 00:00:13', 8),
(8, 'dubuque.delta@example.org', 'Shall I try the whole cause, and condemn you to sit down without being seen, when she had a head could be beheaded, and that in about half no time! Take your choice!\' The Duchess took no notice of them hit her in the house, and found quite a conversation of it at last, and they can\'t prove I did: there\'s no room to grow larger again, and Alice looked all round her, calling out in a very respectful tone, but frowning and making quite a new pair of white kid gloves and the blades of grass, but she ran with all her riper years, the simple rules their friends had taught them: such as, that a moment\'s delay would cost them their lives. All the time they were nowhere to be no sort of present!\' thought Alice. \'I\'m glad I\'ve seen that done,\' thought Alice. \'I\'m glad they\'ve begun asking riddles.--I believe I can listen all day to day.\' This was such a capital one for catching mice you can\'t think! And oh, I wish I hadn\'t drunk quite so much!\' said Alice, who felt ready to ask help of any.', NULL, 0, '2026-04-05 00:00:13', '2026-04-05 00:00:13', 11),
(9, 'reichert.ernestine@example.org', 'And mentioned me to introduce it.\' \'I don\'t see any wine,\' she remarked. \'There isn\'t any,\' said the King. The White Rabbit blew three blasts on the trumpet, and then all the players, except the Lizard, who seemed to have lessons to learn! No, I\'ve made up my mind about it; if I\'m Mabel, I\'ll stay down here with me! There are no mice in the trial one way of keeping up the fan and gloves. \'How queer it seems,\' Alice said nothing: she had not attended to this mouse? Everything is so out-of-the-way down here, that I should have liked teaching it tricks very much, if--if I\'d only been the whiting,\' said Alice, rather alarmed at the mushroom for a little queer, won\'t you?\' \'Not a bit,\' said the March Hare interrupted, yawning. \'I\'m getting tired of this. I vote the young Crab, a little snappishly. \'You\'re enough to look down and make out that it ought to be done, I wonder?\' Alice guessed in a natural way again. \'I wonder what they WILL do next! As for pulling me out of its voice. \'Back to.', NULL, 0, '2026-04-05 00:00:13', '2026-04-05 00:00:13', 29),
(10, 'markus96@example.net', 'Eaglet. \'I don\'t think it\'s at all what had become of me?\' Luckily for Alice, the little door about fifteen inches high: she tried the effect of lying down on their backs was the White Rabbit cried out, \'Silence in the newspapers, at the bottom of a well?\' \'Take some more of the earth. At last the Dodo in an undertone, \'important--unimportant--unimportant--important--\' as if it had been, it suddenly appeared again. \'By-the-bye, what became of the jurors had a door leading right into it. \'That\'s very important,\' the King in a low voice, \'Why the fact is, you know. But do cats eat bats?\' and sometimes, \'Do bats eat cats?\' for, you see, because some of them at last, with a melancholy air, and, after folding his arms and legs in all directions, \'just like a snout than a rat-hole: she knelt down and cried. \'Come, there\'s half my plan done now! How puzzling all these strange Adventures of hers that you couldn\'t cut off a head could be beheaded, and that is enough,\' Said his father; \'don\'t.', NULL, 0, '2026-04-05 00:00:13', '2026-04-05 00:00:13', 12),
(11, 'dubuque.delta@example.org', 'King repeated angrily, \'or I\'ll have you executed on the OUTSIDE.\' He unfolded the paper as he spoke, and added with a cart-horse, and expecting every moment to be afraid of interrupting him,) \'I\'ll give him sixpence. _I_ don\'t believe it,\' said the Caterpillar seemed to have wondered at this, that she did not dare to laugh; and, as a partner!\' cried the Mock Turtle to the Classics master, though. He was looking about for some time without hearing anything more: at last it unfolded its arms, took the watch and looked at Alice, and she was playing against herself, for this curious child was very likely it can talk: at any rate: go and get ready for your interesting story,\' but she felt that it would be QUITE as much right,\' said the Mouse. \'--I proceed. \"Edwin and Morcar, the earls of Mercia and Northumbria--\"\' \'Ugh!\' said the King, the Queen, and Alice looked at her, and said, without even looking round. \'I\'ll fetch the executioner myself,\' said the Mouse replied rather impatiently.', NULL, 0, '2026-04-05 00:00:13', '2026-04-05 00:00:13', 11),
(12, 'jermey22@example.com', 'Alice; \'you needn\'t be afraid of interrupting him,) \'I\'ll give him sixpence. _I_ don\'t believe you do lessons?\' said Alice, and she felt unhappy. \'It was much pleasanter at home,\' thought poor Alice, that she had put on one knee as he spoke. \'UNimportant, of course, to begin at HIS time of life. The King\'s argument was, that her idea of having nothing to what I see\"!\' \'You might just as well go in at the top of her voice. Nobody moved. \'Who cares for you?\' said Alice, whose thoughts were still running on the table. \'Nothing can be clearer than THAT. Then again--\"BEFORE SHE HAD THIS FIT--\" you never even introduced to a mouse: she had someone to listen to her, though, as they would call after her: the last few minutes to see if he wasn\'t one?\' Alice asked. \'We called him a fish)--and rapped loudly at the March Hare interrupted, yawning. \'I\'m getting tired of being such a new idea to Alice, and she grew no larger: still it had struck her foot! She was looking down at her with large.', NULL, 0, '2026-04-05 00:00:13', '2026-04-05 00:00:13', 20),
(13, 'stephan.bosco@example.org', 'Cheshire Cat,\' said Alice: \'she\'s so extremely--\' Just then she looked up, but it puzzled her very much to-night, I should frighten them out again. That\'s all.\' \'Thank you,\' said the Mouse with an anxious look at the top of her voice. Nobody moved. \'Who cares for fish, Game, or any other dish? Who would not join the dance?\"\' \'Thank you, it\'s a set of verses.\' \'Are they in the direction it pointed to, without trying to put it in a large cauldron which seemed to listen, the whole place around her became alive with the other: he came trotting along in a low trembling voice, \'Let us get to the executioner: \'fetch her here.\' And the moral of THAT is--\"Take care of themselves.\"\' \'How fond she is of yours.\"\' \'Oh, I know!\' exclaimed Alice, who had been of late much accustomed to usurpation and conquest. Edwin and Morcar, the earls of Mercia and Northumbria, declared for him: and even Stigand, the patriotic archbishop of Canterbury, found it very nice, (it had, in fact, a sort of way to hear.', NULL, 0, '2026-04-05 00:00:13', '2026-04-05 00:00:13', NULL),
(14, 'johnathon24@example.net', 'By the use of a good deal frightened by this time?\' she said these words her foot as far down the chimney, has he?\' said Alice doubtfully: \'it means--to--make--anything--prettier.\' \'Well, then,\' the Cat in a melancholy way, being quite unable to move. She soon got it out into the air. \'--as far out to her great delight it fitted! Alice opened the door and found in it about four inches deep and reaching half down the bottle, saying to herself \'Now I can say.\' This was quite out of the birds and beasts, as well say that \"I see what I could not think of nothing else to do, so Alice went on, very much at first, the two sides of the Nile On every golden scale! \'How cheerfully he seems to grin, How neatly spread his claws, And welcome little fishes in With gently smiling jaws!\' \'I\'m sure those are not the same, the next witness. It quite makes my forehead ache!\' Alice watched the White Rabbit, trotting slowly back again, and Alice looked all round the table, but it was quite out of his.', NULL, 0, '2026-04-05 00:00:13', '2026-04-05 00:00:13', NULL),
(15, 'constance00@example.org', 'This is the same year for such dainties would not stoop? Soup of the crowd below, and there was mouth enough for it was sneezing on the back. At last the Mouse, who was gently brushing away some dead leaves that lay far below her. \'What CAN all that stuff,\' the Mock Turtle angrily: \'really you are painting those roses?\' Five and Seven said nothing, but looked at the Hatter, with an anxious look at them--\'I wish they\'d get the trial one way up as the door with his nose, and broke off a head could be beheaded, and that in about half no time! Take your choice!\' The Duchess took her choice, and was suppressed. \'Come, that finished the guinea-pigs!\' thought Alice. \'I\'m a--I\'m a--\' \'Well! WHAT are you?\' And then a great deal too flustered to tell its age, there was a good deal frightened by this time, sat down at them, and it\'ll sit up and down looking for them, and just as if his heart would break. She pitied him deeply. \'What is his sorrow?\' she asked the Mock Turtle, \'but if they do.', NULL, 0, '2026-04-05 00:00:13', '2026-04-05 00:00:13', NULL),
(16, 'dalton93@example.net', 'Alice, who was sitting on a summer day: The Knave shook his head mournfully. \'Not I!\' said the Gryphon. \'--you advance twice--\' \'Each with a round face, and was suppressed. \'Come, that finished the goose, with the glass table and the baby with some severity; \'it\'s very easy to take the place of the table, but there was generally a ridge or furrow in the house if it wasn\'t very civil of you to get in?\' she repeated, aloud. \'I must be Mabel after all, and I could let you out, you know.\' Alice had no idea how confusing it is right?\' \'In my youth,\' Father William replied to his ear. Alice considered a little, \'From the Queen. An invitation from the shock of being all alone here!\' As she said aloud. \'I shall sit here,\' he said, turning to Alice, flinging the baby joined):-- \'Wow! wow! wow!\' \'Here! you may nurse it a violent shake at the stick, running a very small cake, on which the March Hare, \'that \"I like what I say--that\'s the same age as herself, to see it trying in a languid, sleepy.', NULL, 0, '2026-04-05 00:00:14', '2026-04-05 00:00:14', 34),
(17, 'hildegard05@example.org', 'Dinah my dear! I wish you could draw treacle out of the trial.\' \'Stupid things!\' Alice began in a wondering tone. \'Why, what are YOUR shoes done with?\' said the Hatter: \'it\'s very rude.\' The Hatter looked at her, and the Hatter grumbled: \'you shouldn\'t have put it to be executed for having missed their turns, and she set to work very carefully, remarking, \'I really must be getting somewhere near the entrance of the baby?\' said the young lady tells us a story!\' said the Pigeon. \'I\'m NOT a serpent, I tell you, you coward!\' and at last turned sulky, and would only say, \'I am older than you, and listen to her. The Cat seemed to be otherwise.\"\' \'I think I can guess that,\' she added in a tone of great dismay, and began smoking again. This time there were a Duck and a large plate came skimming out, straight at the proposal. \'Then the eleventh day must have been ill.\' \'So they were,\' said the Gryphon repeated impatiently: \'it begins \"I passed by his garden, and I never understood what it was.', NULL, 0, '2026-04-05 00:00:14', '2026-04-05 00:00:14', 17),
(18, 'leann62@example.org', 'I hadn\'t to bring but one; Bill\'s got the other--Bill! fetch it back!\' \'And who is to France-- Then turn not pale, beloved snail, but come and join the dance? Will you, won\'t you, won\'t you, won\'t you, will you, won\'t you, will you join the dance? \"You can really have no sort of present!\' thought Alice. \'I\'m glad they\'ve begun asking riddles.--I believe I can creep under the sea,\' the Gryphon in an impatient tone: \'explanations take such a noise inside, no one listening, this time, sat down again into its face to see the Mock Turtle; \'but it sounds uncommon nonsense.\' Alice said very humbly; \'I won\'t have any rules in particular; at least, if there are, nobody attends to them--and you\'ve no idea how confusing it is I hate cats and dogs.\' It was all ridges and furrows; the balls were live hedgehogs, the mallets live flamingoes, and the pair of boots every Christmas.\' And she began very cautiously: \'But I don\'t want YOU with us!\"\' \'They were learning to draw, you know--\' She had.', NULL, 0, '2026-04-05 00:00:14', '2026-04-05 00:00:14', 35),
(19, 'zritchie@example.com', 'Alice in a dreamy sort of idea that they must be a person of authority among them, called out, \'First witness!\' The first question of course you don\'t!\' the Hatter replied. \'Of course twinkling begins with an M?\' said Alice. \'Exactly so,\' said the Mock Turtle, who looked at poor Alice, who always took a minute or two, she made it out again, and put it in with a sigh: \'it\'s always tea-time, and we\'ve no time she\'d have everybody executed, all round. (It was this last remark, \'it\'s a vegetable. It doesn\'t look like one, but it puzzled her a good deal until she had succeeded in bringing herself down to her daughter \'Ah, my dear! I wish you were never even introduced to a lobster--\' (Alice began to cry again. \'You ought to tell him. \'A nice muddle their slates\'ll be in before the end of every line: \'Speak roughly to your places!\' shouted the Queen. \'It proves nothing of tumbling down stairs! How brave they\'ll all think me for asking! No, it\'ll never do to come upon them THIS size: why, I.', NULL, 0, '2026-04-05 00:00:14', '2026-04-05 00:00:14', 15),
(20, 'eerdman@example.org', 'I suppose I ought to be listening, so she began thinking over all she could see it pop down a very melancholy voice. \'Repeat, \"YOU ARE OLD, FATHER WILLIAM,\"\' said the Dormouse, who seemed too much overcome to do next, when suddenly a footman in livery, with a little three-legged table, all made of solid glass; there was enough of it appeared. \'I don\'t think they play at all for any of them. \'I\'m sure those are not the smallest notice of her or of anything else. CHAPTER V. Advice from a bottle marked \'poison,\' it is to give the hedgehog to, and, as the Caterpillar took the hookah into its face in her life before, and she very good-naturedly began hunting about for some time with one finger for the next question is, what?\' The great question is, what?\' The great question certainly was, what? Alice looked all round her, about the games now.\' CHAPTER X. The Lobster Quadrille is!\' \'No, indeed,\' said Alice. \'Did you speak?\' \'Not I!\' said the Mock Turtle repeated thoughtfully. \'I should.', NULL, 0, '2026-04-05 00:00:14', '2026-04-05 00:00:14', 2);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_03_09_140935_create_roles_table', 1),
(5, '2026_03_09_141625_add_role_id_to_users_table', 1),
(6, '2026_03_10_163155_create_contact_messages_table', 1),
(7, '2026_03_11_185923_create_user_avatars_table', 1),
(8, '2026_03_18_003052_create_brands_table', 1),
(9, '2026_03_18_003059_create_categories_table', 1),
(10, '2026_03_18_003137_create_badges_table', 1),
(11, '2026_03_18_003321_create_products_table', 1),
(12, '2026_03_18_003625_create_prices_table', 1),
(13, '2026_03_18_003948_create_product_images_table', 1),
(14, '2026_03_27_215356_create_activity_logs_table', 1),
(15, '2026_04_02_214514_create_carts_table', 1),
(16, '2026_04_02_214734_create_orders_table', 1),
(17, '2026_04_02_214740_create_order_items_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(12,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `valid_from` date NOT NULL,
  `valid_to` date DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `price`, `valid_from`, `valid_to`, `is_active`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 107.08, '2026-03-29', NULL, 1, 1, '2026-04-05 00:00:25', '2026-04-05 00:00:25'),
(2, 264.47, '2026-03-24', '2026-03-29', 0, 1, '2026-04-05 00:00:25', '2026-04-05 00:00:25'),
(3, 57.73, '2026-03-29', NULL, 1, 2, '2026-04-05 00:00:25', '2026-04-05 00:00:25'),
(4, 56.01, '2026-03-28', '2026-03-29', 0, 2, '2026-04-05 00:00:26', '2026-04-05 00:00:26'),
(5, 242.26, '2026-03-29', NULL, 1, 3, '2026-04-05 00:00:26', '2026-04-05 00:00:26'),
(6, 155.71, '2026-03-26', '2026-03-29', 0, 3, '2026-04-05 00:00:26', '2026-04-05 00:00:26'),
(7, 129.32, '2026-03-29', NULL, 1, 4, '2026-04-05 00:00:26', '2026-04-05 00:00:26'),
(8, 51.74, '2026-03-23', '2026-03-29', 0, 4, '2026-04-05 00:00:26', '2026-04-05 00:00:26'),
(9, 236.12, '2026-03-29', NULL, 1, 5, '2026-04-05 00:00:26', '2026-04-05 00:00:26'),
(10, 177.56, '2026-03-27', '2026-03-29', 0, 5, '2026-04-05 00:00:26', '2026-04-05 00:00:26'),
(11, 33.63, '2026-03-29', NULL, 1, 6, '2026-04-05 00:00:27', '2026-04-05 00:00:27'),
(12, 225.30, '2026-03-22', '2026-03-29', 0, 6, '2026-04-05 00:00:27', '2026-04-05 00:00:27'),
(13, 298.66, '2026-03-29', NULL, 1, 7, '2026-04-05 00:00:27', '2026-04-05 00:00:27'),
(14, 297.64, '2026-03-24', '2026-03-29', 0, 7, '2026-04-05 00:00:27', '2026-04-05 00:00:27'),
(15, 237.88, '2026-03-29', NULL, 1, 8, '2026-04-05 00:00:27', '2026-04-05 00:00:27'),
(16, 232.36, '2026-03-23', '2026-03-29', 0, 8, '2026-04-05 00:00:27', '2026-04-05 00:00:27'),
(17, 15.64, '2026-03-29', NULL, 1, 9, '2026-04-05 00:00:27', '2026-04-05 00:00:27'),
(18, 208.19, '2026-03-25', '2026-03-29', 0, 9, '2026-04-05 00:00:28', '2026-04-05 00:00:28'),
(19, 40.80, '2026-03-29', NULL, 1, 10, '2026-04-05 00:00:28', '2026-04-05 00:00:28'),
(20, 79.65, '2026-03-22', '2026-03-29', 0, 10, '2026-04-05 00:00:28', '2026-04-05 00:00:28'),
(21, 16.31, '2026-03-29', NULL, 1, 11, '2026-04-05 00:00:28', '2026-04-05 00:00:28'),
(22, 172.78, '2026-03-25', '2026-03-29', 0, 11, '2026-04-05 00:00:28', '2026-04-05 00:00:28'),
(23, 37.02, '2026-03-29', NULL, 1, 12, '2026-04-05 00:00:28', '2026-04-05 00:00:28'),
(24, 113.32, '2026-03-23', '2026-03-29', 0, 12, '2026-04-05 00:00:28', '2026-04-05 00:00:28'),
(25, 189.81, '2026-03-29', NULL, 1, 13, '2026-04-05 00:00:29', '2026-04-05 00:00:29'),
(26, 241.82, '2026-03-28', '2026-03-29', 0, 13, '2026-04-05 00:00:29', '2026-04-05 00:00:29'),
(27, 259.82, '2026-03-29', NULL, 1, 14, '2026-04-05 00:00:30', '2026-04-05 00:00:30'),
(28, 170.04, '2026-03-25', '2026-03-29', 0, 14, '2026-04-05 00:00:30', '2026-04-05 00:00:30'),
(29, 64.86, '2026-03-29', NULL, 1, 15, '2026-04-05 00:00:30', '2026-04-05 00:00:30'),
(30, 205.77, '2026-03-25', '2026-03-29', 0, 15, '2026-04-05 00:00:30', '2026-04-05 00:00:30'),
(31, 29.37, '2026-03-29', NULL, 1, 16, '2026-04-05 00:00:30', '2026-04-05 00:00:30'),
(32, 71.80, '2026-03-28', '2026-03-29', 0, 16, '2026-04-05 00:00:30', '2026-04-05 00:00:30'),
(33, 71.34, '2026-03-29', NULL, 1, 17, '2026-04-05 00:00:30', '2026-04-05 00:00:30'),
(34, 233.00, '2026-03-27', '2026-03-29', 0, 17, '2026-04-05 00:00:31', '2026-04-05 00:00:31'),
(35, 195.99, '2026-03-29', NULL, 1, 18, '2026-04-05 00:00:31', '2026-04-05 00:00:31'),
(36, 31.90, '2026-03-26', '2026-03-29', 0, 18, '2026-04-05 00:00:31', '2026-04-05 00:00:31'),
(37, 89.67, '2026-03-29', NULL, 1, 19, '2026-04-05 00:00:31', '2026-04-05 00:00:31'),
(38, 247.49, '2026-03-28', '2026-03-29', 0, 19, '2026-04-05 00:00:31', '2026-04-05 00:00:31'),
(39, 221.40, '2026-03-29', NULL, 1, 20, '2026-04-05 00:00:31', '2026-04-05 00:00:31'),
(40, 161.08, '2026-03-28', '2026-03-29', 0, 20, '2026-04-05 00:00:31', '2026-04-05 00:00:31'),
(41, 263.65, '2026-03-29', NULL, 1, 21, '2026-04-05 00:00:32', '2026-04-05 00:00:32'),
(42, 151.08, '2026-03-22', '2026-03-29', 0, 21, '2026-04-05 00:00:32', '2026-04-05 00:00:32'),
(43, 76.40, '2026-03-29', NULL, 1, 22, '2026-04-05 00:00:32', '2026-04-05 00:00:32'),
(44, 287.48, '2026-03-27', '2026-03-29', 0, 22, '2026-04-05 00:00:32', '2026-04-05 00:00:32'),
(45, 228.47, '2026-03-29', NULL, 1, 23, '2026-04-05 00:00:32', '2026-04-05 00:00:32'),
(46, 222.99, '2026-03-23', '2026-03-29', 0, 23, '2026-04-05 00:00:32', '2026-04-05 00:00:32'),
(47, 143.04, '2026-03-29', NULL, 1, 24, '2026-04-05 00:00:32', '2026-04-05 00:00:32'),
(48, 202.65, '2026-03-25', '2026-03-29', 0, 24, '2026-04-05 00:00:32', '2026-04-05 00:00:32'),
(49, 180.69, '2026-03-29', NULL, 1, 25, '2026-04-05 00:00:33', '2026-04-05 00:00:33'),
(50, 275.32, '2026-03-24', '2026-03-29', 0, 25, '2026-04-05 00:00:33', '2026-04-05 00:00:33'),
(51, 217.44, '2026-03-29', NULL, 1, 26, '2026-04-05 00:00:33', '2026-04-05 00:00:33'),
(52, 163.38, '2026-03-21', '2026-03-29', 0, 26, '2026-04-05 00:00:33', '2026-04-05 00:00:33'),
(53, 254.90, '2026-03-29', NULL, 1, 27, '2026-04-05 00:00:33', '2026-04-05 00:00:33'),
(54, 227.77, '2026-03-22', '2026-03-29', 0, 27, '2026-04-05 00:00:33', '2026-04-05 00:00:33'),
(55, 68.21, '2026-03-29', NULL, 1, 28, '2026-04-05 00:00:33', '2026-04-05 00:00:33'),
(56, 76.75, '2026-03-26', '2026-03-29', 0, 28, '2026-04-05 00:00:33', '2026-04-05 00:00:33'),
(57, 132.42, '2026-03-29', NULL, 1, 29, '2026-04-05 00:00:34', '2026-04-05 00:00:34'),
(58, 279.68, '2026-03-28', '2026-03-29', 0, 29, '2026-04-05 00:00:34', '2026-04-05 00:00:34'),
(59, 176.70, '2026-03-29', NULL, 1, 30, '2026-04-05 00:00:34', '2026-04-05 00:00:34'),
(60, 216.74, '2026-03-23', '2026-03-29', 0, 30, '2026-04-05 00:00:34', '2026-04-05 00:00:34'),
(61, 173.41, '2026-03-29', NULL, 1, 31, '2026-04-05 00:00:35', '2026-04-05 00:00:35'),
(62, 155.06, '2026-03-27', '2026-03-29', 0, 31, '2026-04-05 00:00:35', '2026-04-05 00:00:35'),
(63, 126.85, '2026-03-29', NULL, 1, 32, '2026-04-05 00:00:35', '2026-04-05 00:00:35'),
(64, 122.90, '2026-03-27', '2026-03-29', 0, 32, '2026-04-05 00:00:35', '2026-04-05 00:00:35'),
(65, 52.25, '2026-03-29', NULL, 1, 33, '2026-04-05 00:00:35', '2026-04-05 00:00:35'),
(66, 216.79, '2026-03-26', '2026-03-29', 0, 33, '2026-04-05 00:00:35', '2026-04-05 00:00:35'),
(67, 174.35, '2026-03-29', NULL, 1, 34, '2026-04-05 00:00:35', '2026-04-05 00:00:35'),
(68, 194.01, '2026-03-24', '2026-03-29', 0, 34, '2026-04-05 00:00:36', '2026-04-05 00:00:36'),
(69, 39.44, '2026-03-29', NULL, 1, 35, '2026-04-05 00:00:36', '2026-04-05 00:00:36'),
(70, 29.21, '2026-03-21', '2026-03-29', 0, 35, '2026-04-05 00:00:36', '2026-04-05 00:00:36'),
(71, 65.21, '2026-03-29', NULL, 1, 36, '2026-04-05 00:00:36', '2026-04-05 00:00:36'),
(72, 149.04, '2026-03-24', '2026-03-29', 0, 36, '2026-04-05 00:00:36', '2026-04-05 00:00:36'),
(73, 114.80, '2026-03-29', NULL, 1, 37, '2026-04-05 00:00:37', '2026-04-05 00:00:37'),
(74, 93.02, '2026-03-27', '2026-03-29', 0, 37, '2026-04-05 00:00:37', '2026-04-05 00:00:37'),
(75, 207.77, '2026-03-29', NULL, 1, 38, '2026-04-05 00:00:37', '2026-04-05 00:00:37'),
(76, 281.76, '2026-03-24', '2026-03-29', 0, 38, '2026-04-05 00:00:37', '2026-04-05 00:00:37'),
(77, 50.93, '2026-03-29', NULL, 1, 39, '2026-04-05 00:00:37', '2026-04-05 00:00:37'),
(78, 234.34, '2026-03-22', '2026-03-29', 0, 39, '2026-04-05 00:00:37', '2026-04-05 00:00:37'),
(79, 154.68, '2026-03-29', NULL, 1, 40, '2026-04-05 00:00:37', '2026-04-05 00:00:37'),
(80, 264.30, '2026-03-24', '2026-03-29', 0, 40, '2026-04-05 00:00:38', '2026-04-05 00:00:38'),
(81, 239.24, '2026-03-29', NULL, 1, 41, '2026-04-05 00:00:38', '2026-04-05 00:00:38'),
(82, 265.28, '2026-03-22', '2026-03-29', 0, 41, '2026-04-05 00:00:38', '2026-04-05 00:00:38'),
(83, 138.00, '2026-03-29', NULL, 1, 42, '2026-04-05 00:00:38', '2026-04-05 00:00:38'),
(84, 271.77, '2026-03-23', '2026-03-29', 0, 42, '2026-04-05 00:00:39', '2026-04-05 00:00:39'),
(85, 112.94, '2026-03-29', NULL, 1, 43, '2026-04-05 00:00:40', '2026-04-05 00:00:40'),
(86, 273.52, '2026-03-23', '2026-03-29', 0, 43, '2026-04-05 00:00:40', '2026-04-05 00:00:40'),
(87, 281.96, '2026-03-29', NULL, 1, 44, '2026-04-05 00:00:40', '2026-04-05 00:00:40'),
(88, 16.23, '2026-03-24', '2026-03-29', 0, 44, '2026-04-05 00:00:40', '2026-04-05 00:00:40'),
(89, 27.76, '2026-03-29', NULL, 1, 45, '2026-04-05 00:00:41', '2026-04-05 00:00:41'),
(90, 124.38, '2026-03-28', '2026-03-29', 0, 45, '2026-04-05 00:00:41', '2026-04-05 00:00:41'),
(91, 27.05, '2026-03-29', NULL, 1, 46, '2026-04-05 00:00:42', '2026-04-05 00:00:42'),
(92, 94.73, '2026-03-26', '2026-03-29', 0, 46, '2026-04-05 00:00:42', '2026-04-05 00:00:42'),
(93, 90.19, '2026-03-29', NULL, 1, 47, '2026-04-05 00:00:43', '2026-04-05 00:00:43'),
(94, 296.34, '2026-03-24', '2026-03-29', 0, 47, '2026-04-05 00:00:43', '2026-04-05 00:00:43'),
(95, 124.35, '2026-03-29', NULL, 1, 48, '2026-04-05 00:00:43', '2026-04-05 00:00:43'),
(96, 124.20, '2026-03-28', '2026-03-29', 0, 48, '2026-04-05 00:00:43', '2026-04-05 00:00:43'),
(97, 196.31, '2026-03-29', NULL, 1, 49, '2026-04-05 00:00:43', '2026-04-05 00:00:43'),
(98, 109.07, '2026-03-21', '2026-03-29', 0, 49, '2026-04-05 00:00:43', '2026-04-05 00:00:43'),
(99, 223.58, '2026-03-29', NULL, 1, 50, '2026-04-05 00:00:43', '2026-04-05 00:00:43'),
(100, 149.04, '2026-03-27', '2026-03-29', 0, 50, '2026-04-05 00:00:43', '2026-04-05 00:00:43'),
(101, 287.79, '2026-03-29', NULL, 1, 51, '2026-04-05 00:00:44', '2026-04-05 00:00:44'),
(102, 260.84, '2026-03-27', '2026-03-29', 0, 51, '2026-04-05 00:00:44', '2026-04-05 00:00:44'),
(103, 242.68, '2026-03-29', NULL, 1, 52, '2026-04-05 00:00:44', '2026-04-05 00:00:44'),
(104, 79.36, '2026-03-24', '2026-03-29', 0, 52, '2026-04-05 00:00:44', '2026-04-05 00:00:44'),
(105, 298.83, '2026-03-29', NULL, 1, 53, '2026-04-05 00:00:44', '2026-04-05 00:00:44'),
(106, 152.19, '2026-03-24', '2026-03-29', 0, 53, '2026-04-05 00:00:44', '2026-04-05 00:00:44'),
(107, 155.86, '2026-03-29', NULL, 1, 54, '2026-04-05 00:00:44', '2026-04-05 00:00:44'),
(108, 202.21, '2026-03-26', '2026-03-29', 0, 54, '2026-04-05 00:00:45', '2026-04-05 00:00:45'),
(109, 192.37, '2026-03-29', NULL, 1, 55, '2026-04-05 00:00:45', '2026-04-05 00:00:45'),
(110, 98.10, '2026-03-22', '2026-03-29', 0, 55, '2026-04-05 00:00:45', '2026-04-05 00:00:45'),
(111, 212.08, '2026-03-29', NULL, 1, 56, '2026-04-05 00:00:45', '2026-04-05 00:00:45'),
(112, 214.41, '2026-03-28', '2026-03-29', 0, 56, '2026-04-05 00:00:45', '2026-04-05 00:00:45'),
(113, 47.91, '2026-03-29', NULL, 1, 57, '2026-04-05 00:00:46', '2026-04-05 00:00:46'),
(114, 224.17, '2026-03-27', '2026-03-29', 0, 57, '2026-04-05 00:00:46', '2026-04-05 00:00:46'),
(115, 266.98, '2026-03-29', NULL, 1, 58, '2026-04-05 00:00:46', '2026-04-05 00:00:46'),
(116, 284.88, '2026-03-22', '2026-03-29', 0, 58, '2026-04-05 00:00:46', '2026-04-05 00:00:46'),
(117, 83.51, '2026-03-29', NULL, 1, 59, '2026-04-05 00:00:46', '2026-04-05 00:00:46'),
(118, 39.74, '2026-03-24', '2026-03-29', 0, 59, '2026-04-05 00:00:46', '2026-04-05 00:00:46'),
(119, 228.71, '2026-03-29', NULL, 1, 60, '2026-04-05 00:00:46', '2026-04-05 00:00:46'),
(120, 47.31, '2026-03-26', '2026-03-29', 0, 60, '2026-04-05 00:00:47', '2026-04-05 00:00:47'),
(121, 257.17, '2026-03-29', NULL, 1, 61, '2026-04-05 00:00:47', '2026-04-05 00:00:47'),
(122, 174.88, '2026-03-22', '2026-03-29', 0, 61, '2026-04-05 00:00:47', '2026-04-05 00:00:47'),
(123, 81.10, '2026-03-29', NULL, 1, 62, '2026-04-05 00:00:47', '2026-04-05 00:00:47'),
(124, 180.04, '2026-03-26', '2026-03-29', 0, 62, '2026-04-05 00:00:47', '2026-04-05 00:00:47'),
(125, 233.69, '2026-03-29', NULL, 1, 63, '2026-04-05 00:00:47', '2026-04-05 00:00:47'),
(126, 76.68, '2026-03-26', '2026-03-29', 0, 63, '2026-04-05 00:00:48', '2026-04-05 00:00:48'),
(127, 53.03, '2026-03-29', NULL, 1, 64, '2026-04-05 00:00:48', '2026-04-05 00:00:48'),
(128, 165.18, '2026-03-22', '2026-03-29', 0, 64, '2026-04-05 00:00:48', '2026-04-05 00:00:48'),
(129, 167.73, '2026-03-29', NULL, 1, 65, '2026-04-05 00:00:48', '2026-04-05 00:00:48'),
(130, 222.18, '2026-03-26', '2026-03-29', 0, 65, '2026-04-05 00:00:48', '2026-04-05 00:00:48'),
(131, 115.44, '2026-03-29', NULL, 1, 66, '2026-04-05 00:00:49', '2026-04-05 00:00:49'),
(132, 233.71, '2026-03-23', '2026-03-29', 0, 66, '2026-04-05 00:00:50', '2026-04-05 00:00:50'),
(133, 39.19, '2026-03-29', NULL, 1, 67, '2026-04-05 00:00:50', '2026-04-05 00:00:50'),
(134, 228.46, '2026-03-26', '2026-03-29', 0, 67, '2026-04-05 00:00:50', '2026-04-05 00:00:50'),
(135, 152.66, '2026-03-29', NULL, 1, 68, '2026-04-05 00:00:51', '2026-04-05 00:00:51'),
(136, 248.31, '2026-03-21', '2026-03-29', 0, 68, '2026-04-05 00:00:51', '2026-04-05 00:00:51'),
(137, 220.60, '2026-03-29', NULL, 1, 69, '2026-04-05 00:00:51', '2026-04-05 00:00:51'),
(138, 154.61, '2026-03-28', '2026-03-29', 0, 69, '2026-04-05 00:00:51', '2026-04-05 00:00:51'),
(139, 244.49, '2026-03-29', NULL, 1, 70, '2026-04-05 00:00:51', '2026-04-05 00:00:51'),
(140, 89.90, '2026-03-22', '2026-03-29', 0, 70, '2026-04-05 00:00:51', '2026-04-05 00:00:51'),
(141, 110.89, '2026-03-29', NULL, 1, 71, '2026-04-05 00:00:52', '2026-04-05 00:00:52'),
(142, 199.90, '2026-03-26', '2026-03-29', 0, 71, '2026-04-05 00:00:53', '2026-04-05 00:00:53'),
(143, 40.47, '2026-03-29', NULL, 1, 72, '2026-04-05 00:00:53', '2026-04-05 00:00:53'),
(144, 277.38, '2026-03-24', '2026-03-29', 0, 72, '2026-04-05 00:00:53', '2026-04-05 00:00:53'),
(145, 130.05, '2026-03-29', NULL, 1, 73, '2026-04-05 00:00:53', '2026-04-05 00:00:53'),
(146, 154.98, '2026-03-23', '2026-03-29', 0, 73, '2026-04-05 00:00:53', '2026-04-05 00:00:53'),
(147, 50.47, '2026-03-29', NULL, 1, 74, '2026-04-05 00:00:54', '2026-04-05 00:00:54'),
(148, 111.03, '2026-03-24', '2026-03-29', 0, 74, '2026-04-05 00:00:54', '2026-04-05 00:00:54'),
(149, 265.93, '2026-03-29', NULL, 1, 75, '2026-04-05 00:00:54', '2026-04-05 00:00:54'),
(150, 188.07, '2026-03-23', '2026-03-29', 0, 75, '2026-04-05 00:00:54', '2026-04-05 00:00:54'),
(151, 139.02, '2026-03-29', NULL, 1, 76, '2026-04-05 00:00:55', '2026-04-05 00:00:55'),
(152, 167.80, '2026-03-27', '2026-03-29', 0, 76, '2026-04-05 00:00:55', '2026-04-05 00:00:55'),
(153, 124.56, '2026-03-29', NULL, 1, 77, '2026-04-05 00:00:55', '2026-04-05 00:00:55'),
(154, 173.86, '2026-03-23', '2026-03-29', 0, 77, '2026-04-05 00:00:55', '2026-04-05 00:00:55'),
(155, 224.17, '2026-03-29', NULL, 1, 78, '2026-04-05 00:00:55', '2026-04-05 00:00:55'),
(156, 116.35, '2026-03-27', '2026-03-29', 0, 78, '2026-04-05 00:00:55', '2026-04-05 00:00:55'),
(157, 220.13, '2026-03-29', NULL, 1, 79, '2026-04-05 00:00:55', '2026-04-05 00:00:55'),
(158, 79.23, '2026-03-25', '2026-03-29', 0, 79, '2026-04-05 00:00:55', '2026-04-05 00:00:55'),
(159, 201.02, '2026-03-29', NULL, 1, 80, '2026-04-05 00:00:56', '2026-04-05 00:00:56'),
(160, 161.98, '2026-03-25', '2026-03-29', 0, 80, '2026-04-05 00:00:56', '2026-04-05 00:00:56'),
(161, 256.73, '2026-03-29', NULL, 1, 81, '2026-04-05 00:00:56', '2026-04-05 00:00:56'),
(162, 225.49, '2026-03-22', '2026-03-29', 0, 81, '2026-04-05 00:00:56', '2026-04-05 00:00:56'),
(163, 141.98, '2026-03-29', NULL, 1, 82, '2026-04-05 00:00:56', '2026-04-05 00:00:56'),
(164, 264.82, '2026-03-26', '2026-03-29', 0, 82, '2026-04-05 00:00:56', '2026-04-05 00:00:56'),
(165, 112.47, '2026-03-29', NULL, 1, 83, '2026-04-05 00:00:57', '2026-04-05 00:00:57'),
(166, 122.67, '2026-03-27', '2026-03-29', 0, 83, '2026-04-05 00:00:57', '2026-04-05 00:00:57'),
(167, 281.64, '2026-03-29', NULL, 1, 84, '2026-04-05 00:00:57', '2026-04-05 00:00:57'),
(168, 127.22, '2026-03-25', '2026-03-29', 0, 84, '2026-04-05 00:00:57', '2026-04-05 00:00:57'),
(169, 231.05, '2026-03-29', NULL, 1, 85, '2026-04-05 00:00:58', '2026-04-05 00:00:58'),
(170, 104.43, '2026-03-21', '2026-03-29', 0, 85, '2026-04-05 00:00:58', '2026-04-05 00:00:58'),
(171, 272.85, '2026-03-29', NULL, 1, 86, '2026-04-05 00:00:58', '2026-04-05 00:00:58'),
(172, 58.39, '2026-03-27', '2026-03-29', 0, 86, '2026-04-05 00:00:58', '2026-04-05 00:00:58'),
(173, 120.19, '2026-03-29', NULL, 1, 87, '2026-04-05 00:00:59', '2026-04-05 00:00:59'),
(174, 139.68, '2026-03-21', '2026-03-29', 0, 87, '2026-04-05 00:00:59', '2026-04-05 00:00:59'),
(175, 55.06, '2026-03-29', NULL, 1, 88, '2026-04-05 00:00:59', '2026-04-05 00:00:59'),
(176, 123.20, '2026-03-22', '2026-03-29', 0, 88, '2026-04-05 00:00:59', '2026-04-05 00:00:59'),
(177, 134.63, '2026-03-29', NULL, 1, 89, '2026-04-05 00:00:59', '2026-04-05 00:00:59'),
(178, 266.50, '2026-03-27', '2026-03-29', 0, 89, '2026-04-05 00:00:59', '2026-04-05 00:00:59'),
(179, 137.65, '2026-03-29', NULL, 1, 90, '2026-04-05 00:00:59', '2026-04-05 00:00:59'),
(180, 135.19, '2026-03-26', '2026-03-29', 0, 90, '2026-04-05 00:00:59', '2026-04-05 00:00:59'),
(181, 272.94, '2026-03-29', NULL, 1, 91, '2026-04-05 00:00:59', '2026-04-05 00:00:59'),
(182, 230.00, '2026-03-24', '2026-03-29', 0, 91, '2026-04-05 00:01:00', '2026-04-05 00:01:00'),
(183, 190.58, '2026-03-29', NULL, 1, 92, '2026-04-05 00:01:00', '2026-04-05 00:01:00'),
(184, 62.83, '2026-03-21', '2026-03-29', 0, 92, '2026-04-05 00:01:00', '2026-04-05 00:01:00'),
(185, 266.23, '2026-03-29', NULL, 1, 93, '2026-04-05 00:01:00', '2026-04-05 00:01:00'),
(186, 191.14, '2026-03-26', '2026-03-29', 0, 93, '2026-04-05 00:01:00', '2026-04-05 00:01:00'),
(187, 136.63, '2026-03-29', NULL, 1, 94, '2026-04-05 00:01:00', '2026-04-05 00:01:00'),
(188, 186.70, '2026-03-27', '2026-03-29', 0, 94, '2026-04-05 00:01:00', '2026-04-05 00:01:00'),
(189, 251.29, '2026-03-29', NULL, 1, 95, '2026-04-05 00:01:01', '2026-04-05 00:01:01'),
(190, 140.89, '2026-03-28', '2026-03-29', 0, 95, '2026-04-05 00:01:01', '2026-04-05 00:01:01'),
(191, 149.58, '2026-03-29', NULL, 1, 96, '2026-04-05 00:01:01', '2026-04-05 00:01:01'),
(192, 159.25, '2026-03-27', '2026-03-29', 0, 96, '2026-04-05 00:01:01', '2026-04-05 00:01:01'),
(193, 247.40, '2026-03-29', NULL, 1, 97, '2026-04-05 00:01:01', '2026-04-05 00:01:01'),
(194, 161.00, '2026-03-26', '2026-03-29', 0, 97, '2026-04-05 00:01:01', '2026-04-05 00:01:01'),
(195, 180.34, '2026-03-29', NULL, 1, 98, '2026-04-05 00:01:02', '2026-04-05 00:01:02'),
(196, 55.03, '2026-03-28', '2026-03-29', 0, 98, '2026-04-05 00:01:02', '2026-04-05 00:01:02'),
(197, 158.48, '2026-03-29', NULL, 1, 99, '2026-04-05 00:01:02', '2026-04-05 00:01:02'),
(198, 202.04, '2026-03-21', '2026-03-29', 0, 99, '2026-04-05 00:01:02', '2026-04-05 00:01:02'),
(199, 222.50, '2026-03-29', NULL, 1, 100, '2026-04-05 00:01:02', '2026-04-05 00:01:02'),
(200, 194.49, '2026-03-26', '2026-03-29', 0, 100, '2026-04-05 00:01:02', '2026-04-05 00:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `badge_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `category_id`, `brand_id`, `badge_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ipsum rerum omnis', 'Illum ullam qui officiis est et aliquid corporis laboriosam atque sed deleniti tenetur provident id.', 12, 8, 1, NULL, '2026-04-05 00:00:16', '2026-04-05 00:00:16'),
(2, 'qui consectetur aut', 'Autem accusamus corrupti ut aspernatur doloribus aspernatur facere et dolorem quis maxime accusamus est.', 4, 7, 1, NULL, '2026-04-05 00:00:17', '2026-04-05 00:00:17'),
(3, 'dolores quod voluptatum', 'Magnam omnis modi velit suscipit aut quia natus magni distinctio velit et voluptatum sed id fugiat distinctio et.', 1, 6, 5, NULL, '2026-04-05 00:00:17', '2026-04-05 00:00:17'),
(4, 'optio qui sapiente', 'Ea fuga quis adipisci maiores qui sit nam magnam ratione earum soluta iusto.', 10, 2, 4, NULL, '2026-04-05 00:00:17', '2026-04-05 00:00:17'),
(5, 'quod voluptas autem', 'Qui hic sit nobis et voluptas voluptatibus magni explicabo dicta.', 12, 8, 3, NULL, '2026-04-05 00:00:17', '2026-04-05 00:00:17'),
(6, 'neque voluptate exercitationem', 'Velit aut molestiae eum labore sed aspernatur officia aut qui.', 8, 4, 3, NULL, '2026-04-05 00:00:17', '2026-04-05 00:00:17'),
(7, 'non odio totam', 'Esse sint in labore autem doloremque ab maiores quidem non illo.', 12, 4, 1, NULL, '2026-04-05 00:00:17', '2026-04-05 00:00:17'),
(8, 'deleniti quia velit', 'Recusandae dignissimos ea rerum cupiditate molestiae aut molestiae laborum dolores quo dolore perspiciatis ex labore soluta optio ea blanditiis.', 2, 5, 5, NULL, '2026-04-05 00:00:17', '2026-04-05 00:00:17'),
(9, 'consequatur iure assumenda', 'Corporis beatae ad ut suscipit praesentium dolores distinctio ex assumenda labore quibusdam perspiciatis nisi corrupti occaecati maiores quia.', 4, 1, 4, NULL, '2026-04-05 00:00:17', '2026-04-05 00:00:17'),
(10, 'ducimus voluptas sequi', 'Dignissimos ut corporis omnis quae consequatur necessitatibus aut quam dolor tenetur vero nihil labore quam perferendis ut.', 1, 5, 5, NULL, '2026-04-05 00:00:17', '2026-04-05 00:00:17'),
(11, 'eveniet ea excepturi', 'Nihil mollitia voluptas possimus velit quisquam quidem ex debitis similique labore consequatur omnis cumque.', 7, 3, 1, NULL, '2026-04-05 00:00:17', '2026-04-05 00:00:17'),
(12, 'laborum neque ipsum', 'Commodi ut excepturi omnis doloremque ullam provident pariatur quod similique rerum a ea.', 11, 8, 5, NULL, '2026-04-05 00:00:17', '2026-04-05 00:00:17'),
(13, 'modi sit adipisci', 'Impedit laboriosam cumque aperiam beatae odio in nulla et laboriosam non et facilis ab voluptatem dolores quisquam perferendis modi molestias soluta.', 13, 3, 5, NULL, '2026-04-05 00:00:17', '2026-04-05 00:00:17'),
(14, 'saepe ab aut', 'Voluptatem consectetur dolorem recusandae animi quod voluptatem laudantium quia blanditiis quia ratione eum unde dolor enim reiciendis est tempore voluptatibus.', 10, 2, 2, NULL, '2026-04-05 00:00:17', '2026-04-05 00:00:17'),
(15, 'magnam aut sit', 'Amet incidunt perspiciatis et error labore eos voluptates veritatis voluptatem esse iusto ipsam unde sequi et temporibus sunt.', 7, 2, 1, NULL, '2026-04-05 00:00:17', '2026-04-05 00:00:17'),
(16, 'laudantium ipsum recusandae', 'Nostrum cum illo culpa voluptatum et nisi voluptatem a odio iste beatae.', 8, 1, 3, NULL, '2026-04-05 00:00:18', '2026-04-05 00:00:18'),
(17, 'enim officia alias', 'Eius velit ullam commodi sit ab quaerat eos ipsa atque.', 10, 2, 5, NULL, '2026-04-05 00:00:18', '2026-04-05 00:00:18'),
(18, 'quia quas eum', 'Voluptatem tempora facilis iusto provident amet sequi tempora accusantium et sed ut.', 10, 6, 1, NULL, '2026-04-05 00:00:18', '2026-04-05 00:00:18'),
(19, 'in quam commodi', 'Ex rem sint ipsa qui dolores ut quidem iure aperiam voluptas repudiandae sapiente earum.', 12, 4, 2, NULL, '2026-04-05 00:00:18', '2026-04-05 00:00:18'),
(20, 'inventore natus voluptatem', 'Eaque sit ut et laborum ut voluptatem rerum dolor quia reprehenderit doloremque ut sit doloremque rerum dicta quia dolor tempore.', 8, 4, 1, NULL, '2026-04-05 00:00:18', '2026-04-05 00:00:18'),
(21, 'repellat magni eos', 'Inventore eum qui rerum dolor deleniti laboriosam natus sit sit nesciunt.', 6, 3, 5, NULL, '2026-04-05 00:00:18', '2026-04-05 00:00:18'),
(22, 'natus ratione eveniet', 'Quasi consequatur occaecati et distinctio vel dolor ut ipsum amet ut dolorem nulla consequatur ea consequuntur aut consequuntur et quis.', 1, 7, 5, NULL, '2026-04-05 00:00:18', '2026-04-05 00:00:18'),
(23, 'in aspernatur repellat', 'Et illo debitis molestiae ducimus voluptatum necessitatibus facilis sit esse est aliquid.', 11, 5, 2, NULL, '2026-04-05 00:00:18', '2026-04-05 00:00:18'),
(24, 'vitae quia inventore', 'Atque delectus earum magni inventore repellendus magnam voluptates quasi recusandae nihil qui recusandae illo quibusdam nihil.', 13, 3, 5, NULL, '2026-04-05 00:00:18', '2026-04-05 00:00:18'),
(25, 'modi repudiandae incidunt', 'Blanditiis tenetur dolorum amet corporis et sed eaque occaecati voluptates quas odit et quidem.', 2, 2, 1, NULL, '2026-04-05 00:00:18', '2026-04-05 00:00:18'),
(26, 'error corporis saepe', 'Voluptas est est dolor sequi sunt illum perspiciatis recusandae quasi natus est corporis nemo aut qui et.', 4, 1, 2, NULL, '2026-04-05 00:00:18', '2026-04-05 00:00:18'),
(27, 'sit perferendis totam', 'Et quia non consequatur praesentium voluptatum cumque ducimus libero ipsam facere quisquam consectetur ut ut ut fugit.', 6, 2, 4, NULL, '2026-04-05 00:00:18', '2026-04-05 00:00:18'),
(28, 'laborum voluptatem libero', 'Aspernatur quam doloribus sed doloribus animi maiores voluptatem exercitationem autem et esse quaerat.', 12, 3, 5, NULL, '2026-04-05 00:00:19', '2026-04-05 00:00:19'),
(29, 'praesentium sapiente ullam', 'Voluptatum aperiam dolores neque tempore et soluta iste ut et porro eius hic.', 6, 4, 2, NULL, '2026-04-05 00:00:19', '2026-04-05 00:00:19'),
(30, 'hic tempore voluptatibus', 'Odit natus odio suscipit quo reprehenderit repellendus sit commodi qui.', 12, 1, 5, NULL, '2026-04-05 00:00:19', '2026-04-05 00:00:19'),
(31, 'et dolore qui', 'Minima dolore facere aut vel et voluptatem maiores velit pariatur quibusdam repellendus.', 12, 3, 3, NULL, '2026-04-05 00:00:19', '2026-04-05 00:00:19'),
(32, 'veniam maxime deserunt', 'Ipsum dolor molestias in natus aut reiciendis voluptatum dolores laborum placeat id sapiente laborum eligendi ut porro ullam excepturi et.', 5, 1, 4, NULL, '2026-04-05 00:00:19', '2026-04-05 00:00:19'),
(33, 'voluptatum fugiat voluptatem', 'Et amet in perferendis laboriosam ut animi voluptatibus et est cum doloribus.', 3, 2, 5, NULL, '2026-04-05 00:00:20', '2026-04-05 00:00:20'),
(34, 'rem nemo soluta', 'Aut harum ut assumenda saepe ipsam impedit sint cupiditate sint aut fugiat ut aliquid alias.', 8, 7, 2, NULL, '2026-04-05 00:00:20', '2026-04-05 00:00:20'),
(35, 'quaerat laudantium nisi', 'Sed recusandae dignissimos veritatis deleniti sed ratione quasi adipisci harum odit quaerat illum sunt.', 5, 3, 2, NULL, '2026-04-05 00:00:20', '2026-04-05 00:00:20'),
(36, 'error voluptas provident', 'Dolorem rerum sint tempora repudiandae facilis quam veniam eum alias voluptatum tenetur in possimus.', 5, 1, 5, NULL, '2026-04-05 00:00:20', '2026-04-05 00:00:20'),
(37, 'recusandae non perferendis', 'Omnis aliquam sequi qui ea blanditiis minima sint sed et aut.', 2, 1, 5, NULL, '2026-04-05 00:00:20', '2026-04-05 00:00:20'),
(38, 'eius soluta corrupti', 'Nesciunt omnis omnis nihil debitis et consequatur placeat et consequatur.', 7, 8, 5, NULL, '2026-04-05 00:00:20', '2026-04-05 00:00:20'),
(39, 'optio laudantium doloribus', 'Minus quia et quos et quia ex rerum eos quos sit ea omnis molestiae dicta esse cupiditate voluptatem odio qui delectus.', 1, 1, 3, NULL, '2026-04-05 00:00:20', '2026-04-05 00:00:20'),
(40, 'recusandae laborum iusto', 'Expedita numquam impedit natus eveniet veniam exercitationem dolorum labore ullam labore accusamus nostrum nostrum quia qui.', 4, 2, 4, NULL, '2026-04-05 00:00:20', '2026-04-05 00:00:20'),
(41, 'neque non eum', 'Fugiat quia temporibus voluptatem quae adipisci est omnis est in officia consequatur placeat ut veniam eos minima aliquid culpa.', 7, 7, 2, NULL, '2026-04-05 00:00:20', '2026-04-05 00:00:20'),
(42, 'consequatur consequatur voluptatem', 'Doloremque qui eum a quia cupiditate eos natus est quasi rerum sit velit voluptate eveniet et modi consequatur provident voluptatum.', 9, 2, 1, NULL, '2026-04-05 00:00:20', '2026-04-05 00:00:20'),
(43, 'nam quis voluptates', 'Earum explicabo necessitatibus voluptates quidem eveniet et ut ad in labore dolores dolores consequatur laboriosam.', 11, 6, 4, NULL, '2026-04-05 00:00:20', '2026-04-05 00:00:20'),
(44, 'reiciendis provident molestias', 'Sint a blanditiis minus blanditiis magni ea consequuntur ratione ut dicta doloremque laborum amet quisquam eum officia rerum accusantium nam.', 11, 6, 1, NULL, '2026-04-05 00:00:20', '2026-04-05 00:00:20'),
(45, 'deleniti at sit', 'Mollitia amet vero ab voluptatem excepturi reprehenderit qui aut sit sed velit qui mollitia sequi est earum.', 7, 3, 1, NULL, '2026-04-05 00:00:20', '2026-04-05 00:00:20'),
(46, 'numquam voluptatem eaque', 'Mollitia officiis ut voluptatibus hic vel sit assumenda et animi qui hic quae rerum aliquam.', 9, 7, 1, NULL, '2026-04-05 00:00:20', '2026-04-05 00:00:20'),
(47, 'similique maxime aliquam', 'Itaque voluptatibus nemo aut quia sed id molestias sed veritatis recusandae est nisi dolorem iste aut.', 1, 7, 1, NULL, '2026-04-05 00:00:21', '2026-04-05 00:00:21'),
(48, 'qui harum est', 'Dicta sequi enim aliquam vero fuga est sint consequatur consequatur qui corrupti provident et.', 9, 2, 2, NULL, '2026-04-05 00:00:21', '2026-04-05 00:00:21'),
(49, 'ut sapiente autem', 'Similique consequatur vel dignissimos quia reiciendis voluptates cum odit ut possimus id.', 12, 5, 5, NULL, '2026-04-05 00:00:21', '2026-04-05 00:00:21'),
(50, 'ipsum officia nihil', 'Velit dolores sit similique beatae esse rerum non et voluptatum.', 7, 7, 2, NULL, '2026-04-05 00:00:21', '2026-04-05 00:00:21'),
(51, 'explicabo qui quo', 'Facere aut illo eveniet ut nam architecto nostrum et explicabo illum ea id sed quisquam illo velit quia aut.', 4, 1, 2, NULL, '2026-04-05 00:00:21', '2026-04-05 00:00:21'),
(52, 'necessitatibus tempore corporis', 'Unde ut corrupti est voluptatem id explicabo est molestiae exercitationem nulla saepe molestias sit dignissimos consequuntur.', 10, 6, 2, NULL, '2026-04-05 00:00:21', '2026-04-05 00:00:21'),
(53, 'qui et voluptatem', 'Dicta fuga nostrum sed aut sunt rerum hic voluptas quas minus qui voluptas doloribus aut facere qui quaerat ab qui laborum.', 8, 3, 5, NULL, '2026-04-05 00:00:21', '2026-04-05 00:00:21'),
(54, 'doloremque eos esse', 'Repellendus enim consequatur nesciunt rerum voluptatem sequi suscipit a qui quis alias delectus.', 4, 2, 3, NULL, '2026-04-05 00:00:21', '2026-04-05 00:00:21'),
(55, 'voluptatem itaque explicabo', 'Nesciunt quas soluta nobis reprehenderit ut alias laudantium quasi expedita.', 6, 2, 5, NULL, '2026-04-05 00:00:21', '2026-04-05 00:00:21'),
(56, 'a quia doloribus', 'Eius iste eligendi voluptas atque ullam placeat labore neque nihil quis sit tempora molestiae vitae voluptas sed vel.', 8, 1, 5, NULL, '2026-04-05 00:00:21', '2026-04-05 00:00:21'),
(57, 'quia placeat molestiae', 'Voluptate accusantium similique ipsa maxime sed saepe et sit ratione est quis iure nemo.', 7, 3, 1, NULL, '2026-04-05 00:00:21', '2026-04-05 00:00:21'),
(58, 'quod assumenda cumque', 'Fuga est sint recusandae qui quibusdam distinctio porro quisquam et voluptas temporibus.', 13, 8, 2, NULL, '2026-04-05 00:00:21', '2026-04-05 00:00:21'),
(59, 'sit repellat facere', 'Amet voluptates nostrum minus sit aut qui eligendi aliquid officia dignissimos autem consectetur nisi assumenda facere autem quaerat excepturi magni ea dolores.', 4, 7, 1, NULL, '2026-04-05 00:00:21', '2026-04-05 00:00:21'),
(60, 'id cumque dolores', 'Dolores autem qui ducimus consequatur aut ipsum et cupiditate et eaque nulla hic minus qui et dolorem totam.', 11, 6, 1, NULL, '2026-04-05 00:00:21', '2026-04-05 00:00:21'),
(61, 'cum odit nihil', 'Quia qui rerum rerum et eaque molestiae voluptates ducimus expedita quia recusandae quas numquam officiis nulla.', 9, 6, 5, NULL, '2026-04-05 00:00:21', '2026-04-05 00:00:21'),
(62, 'consequuntur vero magni', 'Nostrum ut nesciunt unde ut ad suscipit eius in ad animi quo qui nihil atque.', 1, 6, 1, NULL, '2026-04-05 00:00:21', '2026-04-05 00:00:21'),
(63, 'et dolores beatae', 'Suscipit quia voluptatem ipsum veniam enim ut ea ratione pariatur odio earum magni consequatur officiis corporis porro neque a.', 13, 2, 5, NULL, '2026-04-05 00:00:21', '2026-04-05 00:00:21'),
(64, 'molestiae nihil odio', 'Repellat ut dolores et voluptatem non dolor cumque est esse soluta est voluptatem iusto placeat.', 2, 2, 3, NULL, '2026-04-05 00:00:21', '2026-04-05 00:00:21'),
(65, 'corporis corporis id', 'Magnam illo magni distinctio dolor quia ut fugit voluptas corporis perspiciatis.', 4, 3, 3, NULL, '2026-04-05 00:00:21', '2026-04-05 00:00:21'),
(66, 'voluptates voluptatibus vero', 'Delectus saepe et beatae ea eveniet sit tenetur suscipit nihil et ab id vero.', 11, 5, 5, NULL, '2026-04-05 00:00:21', '2026-04-05 00:00:21'),
(67, 'repellat aut minus', 'Dolore praesentium qui necessitatibus sunt voluptatem ipsum dolores quibusdam doloremque vero sed dolorem explicabo voluptas distinctio qui sed tempore animi.', 2, 6, 2, NULL, '2026-04-05 00:00:21', '2026-04-05 00:00:21'),
(68, 'debitis ipsa dolor', 'Possimus quia optio deleniti et praesentium ipsam magnam magni fugiat sunt quasi odio repellat blanditiis fugit.', 5, 3, 2, NULL, '2026-04-05 00:00:22', '2026-04-05 00:00:22'),
(69, 'eos rerum minus', 'Eaque non iste perspiciatis explicabo molestiae beatae reprehenderit ut pariatur ea autem earum ex nesciunt soluta eius numquam.', 11, 2, 3, NULL, '2026-04-05 00:00:22', '2026-04-05 00:00:22'),
(70, 'quia libero at', 'Esse ratione est praesentium adipisci explicabo ratione nesciunt quod esse aspernatur aperiam voluptate tempora hic aut magnam maiores tempore ab consequuntur aspernatur.', 8, 6, 1, NULL, '2026-04-05 00:00:22', '2026-04-05 00:00:22'),
(71, 'facere occaecati quia', 'Sed ad recusandae molestias et fuga possimus ipsum consequatur incidunt consectetur tenetur est ut.', 5, 7, 3, NULL, '2026-04-05 00:00:22', '2026-04-05 00:00:22'),
(72, 'dolor repellendus velit', 'Voluptas porro labore ex odio voluptas minima fuga non rerum expedita omnis provident aliquam voluptatem dolorum maxime.', 6, 8, 4, NULL, '2026-04-05 00:00:22', '2026-04-05 00:00:22'),
(73, 'corrupti cum enim', 'Fuga nemo omnis tempore voluptas id inventore aperiam ipsam laudantium velit ab quis.', 4, 3, 5, NULL, '2026-04-05 00:00:22', '2026-04-05 00:00:22'),
(74, 'in et quo', 'Non et nostrum ut nam sapiente incidunt ut et quidem laboriosam et.', 2, 1, 4, NULL, '2026-04-05 00:00:22', '2026-04-05 00:00:22'),
(75, 'aut ullam et', 'Voluptas et odit quia quod dolor aut animi culpa eum repellendus rerum provident voluptatem similique sed officia.', 5, 3, 2, NULL, '2026-04-05 00:00:22', '2026-04-05 00:00:22'),
(76, 'repellendus aliquid fuga', 'Qui quod est ea neque debitis dolor praesentium distinctio vero et dolore ratione.', 3, 1, 3, NULL, '2026-04-05 00:00:22', '2026-04-05 00:00:22'),
(77, 'laborum fuga dolore', 'Ut et rerum dicta qui amet aut exercitationem non et in adipisci ratione non ut tenetur aut.', 13, 2, 5, NULL, '2026-04-05 00:00:23', '2026-04-05 00:00:23'),
(78, 'fugit commodi nobis', 'Quis velit earum distinctio officiis voluptatem sunt excepturi fugiat quia.', 1, 2, 4, NULL, '2026-04-05 00:00:23', '2026-04-05 00:00:23'),
(79, 'eum natus non', 'Sint aliquam similique repellat voluptatem in tempore repellendus sapiente rerum cupiditate consequuntur accusamus nesciunt.', 7, 1, 5, NULL, '2026-04-05 00:00:23', '2026-04-05 00:00:23'),
(80, 'omnis quibusdam rerum', 'Dolore ducimus maiores nisi earum nihil maxime autem voluptatem exercitationem dolor non voluptatibus nisi fugit et quasi magnam est id ut.', 12, 8, 5, NULL, '2026-04-05 00:00:23', '2026-04-05 00:00:23'),
(81, 'nam laboriosam eum', 'Explicabo vel nam sed suscipit exercitationem non quos id voluptas est quis est maxime voluptatem debitis voluptatem aut.', 9, 8, 1, NULL, '2026-04-05 00:00:23', '2026-04-05 00:00:23'),
(82, 'omnis corrupti error', 'Qui et quaerat hic laboriosam eum explicabo sit sed eius est eos dignissimos dolorum repellat necessitatibus incidunt dolorem distinctio.', 2, 2, 5, NULL, '2026-04-05 00:00:23', '2026-04-05 00:00:23'),
(83, 'fugiat et nihil', 'Corporis harum iste in ullam sint exercitationem saepe temporibus ipsum occaecati aut.', 9, 8, 3, NULL, '2026-04-05 00:00:23', '2026-04-05 00:00:23'),
(84, 'consequatur numquam inventore', 'Ipsum assumenda incidunt cumque atque aspernatur provident excepturi sit id distinctio eaque voluptate accusamus modi itaque quibusdam accusantium saepe.', 3, 8, 3, NULL, '2026-04-05 00:00:23', '2026-04-05 00:00:23'),
(85, 'officiis quis reiciendis', 'Explicabo error eum non eum dolores aut amet nobis omnis cumque tempora ratione similique eligendi et eligendi magnam.', 7, 1, 3, NULL, '2026-04-05 00:00:24', '2026-04-05 00:00:24'),
(86, 'numquam consequatur architecto', 'Quo qui soluta aut et velit ab eos facilis cumque numquam excepturi quasi laudantium a quia a animi autem.', 1, 1, 3, NULL, '2026-04-05 00:00:24', '2026-04-05 00:00:24'),
(87, 'quae quia et', 'Laboriosam cupiditate eum et doloremque provident cumque laboriosam quia iure accusantium laborum omnis aut esse deserunt a aperiam dolorem doloremque sequi.', 3, 8, 5, NULL, '2026-04-05 00:00:24', '2026-04-05 00:00:24'),
(88, 'nobis libero nihil', 'Fuga itaque aut unde maxime omnis tempora dolore ipsam nisi necessitatibus vel qui qui ratione voluptatem deserunt.', 8, 4, 1, NULL, '2026-04-05 00:00:24', '2026-04-05 00:00:24'),
(89, 'possimus dolores ad', 'Facere dolores maiores ut itaque saepe necessitatibus culpa maxime sunt qui cupiditate voluptate maxime inventore inventore ut.', 12, 2, 3, NULL, '2026-04-05 00:00:24', '2026-04-05 00:00:24'),
(90, 'sint quas consequatur', 'Est perferendis voluptas labore reprehenderit vel odio ea qui enim illum hic libero.', 1, 1, 5, NULL, '2026-04-05 00:00:24', '2026-04-05 00:00:24'),
(91, 'quisquam autem earum', 'Quia sed reprehenderit suscipit laborum officia et molestias ratione explicabo ut eos nam est iusto aliquid a sit molestias dignissimos inventore temporibus.', 3, 2, 1, NULL, '2026-04-05 00:00:24', '2026-04-05 00:00:24'),
(92, 'nesciunt iure hic', 'Quaerat occaecati maxime et qui architecto sunt veritatis magnam non.', 13, 2, 4, NULL, '2026-04-05 00:00:24', '2026-04-05 00:00:24'),
(93, 'autem quisquam aut', 'Harum nam aut aut neque eum velit quis animi consequuntur voluptatem.', 6, 7, 3, NULL, '2026-04-05 00:00:24', '2026-04-05 00:00:24'),
(94, 'eum similique quibusdam', 'Alias quo fugiat accusantium quisquam molestiae quod aliquid tempora illum aut tenetur eos quidem consequuntur harum harum illo.', 8, 4, 3, NULL, '2026-04-05 00:00:24', '2026-04-05 00:00:24'),
(95, 'temporibus autem atque', 'Rerum neque quam vel amet non officia adipisci sint voluptate autem.', 2, 2, 2, NULL, '2026-04-05 00:00:25', '2026-04-05 00:00:25'),
(96, 'culpa sint pariatur', 'Beatae aut qui et aut ea laudantium sit beatae repellendus vero dolorum quo neque repellendus vel autem.', 2, 4, 5, NULL, '2026-04-05 00:00:25', '2026-04-05 00:00:25'),
(97, 'est nihil rem', 'Odit numquam voluptatem qui sit quia dolore sed est ab labore et neque veritatis repudiandae nam.', 10, 1, 5, NULL, '2026-04-05 00:00:25', '2026-04-05 00:00:25'),
(98, 'possimus voluptas unde', 'Odio dolorem dolor unde aliquid voluptatem quisquam voluptates error dignissimos omnis sunt optio nobis et ex porro voluptas sit cumque.', 10, 5, 2, NULL, '2026-04-05 00:00:25', '2026-04-05 00:00:25'),
(99, 'laudantium vel repellendus', 'Facilis quo id aut eos fuga voluptatem magni voluptas aperiam qui repellat laboriosam ut odit similique.', 4, 4, 5, NULL, '2026-04-05 00:00:25', '2026-04-05 00:00:25'),
(100, 'et fuga soluta', 'Et ut doloremque tempora sunt laudantium commodi praesentium velit voluptatem aut qui inventore voluptatem maiores delectus nobis ea.', 3, 1, 5, NULL, '2026-04-05 00:00:25', '2026-04-05 00:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) NOT NULL,
  `is_primary` tinyint(1) NOT NULL DEFAULT 0,
  `position` int(11) NOT NULL DEFAULT 0,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `path`, `is_primary`, `position`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'products/image2.png', 1, 1, 1, '2026-04-05 00:00:25', '2026-04-05 00:00:25'),
(2, 'products/image7.png', 0, 2, 1, '2026-04-05 00:00:25', '2026-04-05 00:00:25'),
(3, 'products/image3.png', 1, 1, 2, '2026-04-05 00:00:26', '2026-04-05 00:00:26'),
(4, 'products/image2.png', 0, 2, 2, '2026-04-05 00:00:26', '2026-04-05 00:00:26'),
(5, 'products/image4.png', 1, 1, 3, '2026-04-05 00:00:26', '2026-04-05 00:00:26'),
(6, 'products/image7.png', 0, 2, 3, '2026-04-05 00:00:26', '2026-04-05 00:00:26'),
(7, 'products/image1.png', 1, 1, 4, '2026-04-05 00:00:26', '2026-04-05 00:00:26'),
(8, 'products/image7.png', 0, 2, 4, '2026-04-05 00:00:26', '2026-04-05 00:00:26'),
(9, 'products/image4.png', 1, 1, 5, '2026-04-05 00:00:26', '2026-04-05 00:00:26'),
(10, 'products/image5.png', 0, 2, 5, '2026-04-05 00:00:27', '2026-04-05 00:00:27'),
(11, 'products/image2.png', 1, 1, 6, '2026-04-05 00:00:27', '2026-04-05 00:00:27'),
(12, 'products/image1.png', 0, 2, 6, '2026-04-05 00:00:27', '2026-04-05 00:00:27'),
(13, 'products/image8.png', 1, 1, 7, '2026-04-05 00:00:27', '2026-04-05 00:00:27'),
(14, 'products/image1.png', 0, 2, 7, '2026-04-05 00:00:27', '2026-04-05 00:00:27'),
(15, 'products/image1.png', 1, 1, 8, '2026-04-05 00:00:27', '2026-04-05 00:00:27'),
(16, 'products/image1.png', 0, 2, 8, '2026-04-05 00:00:27', '2026-04-05 00:00:27'),
(17, 'products/image6.png', 1, 1, 9, '2026-04-05 00:00:28', '2026-04-05 00:00:28'),
(18, 'products/image4.png', 0, 2, 9, '2026-04-05 00:00:28', '2026-04-05 00:00:28'),
(19, 'products/image6.png', 1, 1, 10, '2026-04-05 00:00:28', '2026-04-05 00:00:28'),
(20, 'products/image5.png', 0, 2, 10, '2026-04-05 00:00:28', '2026-04-05 00:00:28'),
(21, 'products/image6.png', 1, 1, 11, '2026-04-05 00:00:28', '2026-04-05 00:00:28'),
(22, 'products/image4.png', 0, 2, 11, '2026-04-05 00:00:28', '2026-04-05 00:00:28'),
(23, 'products/image6.png', 1, 1, 12, '2026-04-05 00:00:29', '2026-04-05 00:00:29'),
(24, 'products/image5.png', 0, 2, 12, '2026-04-05 00:00:29', '2026-04-05 00:00:29'),
(25, 'products/image7.png', 1, 1, 13, '2026-04-05 00:00:29', '2026-04-05 00:00:29'),
(26, 'products/image1.png', 0, 2, 13, '2026-04-05 00:00:30', '2026-04-05 00:00:30'),
(27, 'products/image7.png', 1, 1, 14, '2026-04-05 00:00:30', '2026-04-05 00:00:30'),
(28, 'products/image2.png', 0, 2, 14, '2026-04-05 00:00:30', '2026-04-05 00:00:30'),
(29, 'products/image1.png', 1, 1, 15, '2026-04-05 00:00:30', '2026-04-05 00:00:30'),
(30, 'products/image2.png', 0, 2, 15, '2026-04-05 00:00:30', '2026-04-05 00:00:30'),
(31, 'products/image4.png', 1, 1, 16, '2026-04-05 00:00:30', '2026-04-05 00:00:30'),
(32, 'products/image6.png', 0, 2, 16, '2026-04-05 00:00:30', '2026-04-05 00:00:30'),
(33, 'products/image1.png', 1, 1, 17, '2026-04-05 00:00:31', '2026-04-05 00:00:31'),
(34, 'products/image3.png', 0, 2, 17, '2026-04-05 00:00:31', '2026-04-05 00:00:31'),
(35, 'products/image2.png', 1, 1, 18, '2026-04-05 00:00:31', '2026-04-05 00:00:31'),
(36, 'products/image5.png', 0, 2, 18, '2026-04-05 00:00:31', '2026-04-05 00:00:31'),
(37, 'products/image2.png', 1, 1, 19, '2026-04-05 00:00:31', '2026-04-05 00:00:31'),
(38, 'products/image1.png', 0, 2, 19, '2026-04-05 00:00:31', '2026-04-05 00:00:31'),
(39, 'products/image4.png', 1, 1, 20, '2026-04-05 00:00:31', '2026-04-05 00:00:31'),
(40, 'products/image6.png', 0, 2, 20, '2026-04-05 00:00:32', '2026-04-05 00:00:32'),
(41, 'products/image7.png', 1, 1, 21, '2026-04-05 00:00:32', '2026-04-05 00:00:32'),
(42, 'products/image1.png', 0, 2, 21, '2026-04-05 00:00:32', '2026-04-05 00:00:32'),
(43, 'products/image8.png', 1, 1, 22, '2026-04-05 00:00:32', '2026-04-05 00:00:32'),
(44, 'products/image8.png', 0, 2, 22, '2026-04-05 00:00:32', '2026-04-05 00:00:32'),
(45, 'products/image6.png', 1, 1, 23, '2026-04-05 00:00:32', '2026-04-05 00:00:32'),
(46, 'products/image7.png', 0, 2, 23, '2026-04-05 00:00:32', '2026-04-05 00:00:32'),
(47, 'products/image4.png', 1, 1, 24, '2026-04-05 00:00:32', '2026-04-05 00:00:32'),
(48, 'products/image3.png', 0, 2, 24, '2026-04-05 00:00:33', '2026-04-05 00:00:33'),
(49, 'products/image2.png', 1, 1, 25, '2026-04-05 00:00:33', '2026-04-05 00:00:33'),
(50, 'products/image5.png', 0, 2, 25, '2026-04-05 00:00:33', '2026-04-05 00:00:33'),
(51, 'products/image7.png', 1, 1, 26, '2026-04-05 00:00:33', '2026-04-05 00:00:33'),
(52, 'products/image4.png', 0, 2, 26, '2026-04-05 00:00:33', '2026-04-05 00:00:33'),
(53, 'products/image1.png', 1, 1, 27, '2026-04-05 00:00:33', '2026-04-05 00:00:33'),
(54, 'products/image8.png', 0, 2, 27, '2026-04-05 00:00:33', '2026-04-05 00:00:33'),
(55, 'products/image6.png', 1, 1, 28, '2026-04-05 00:00:34', '2026-04-05 00:00:34'),
(56, 'products/image8.png', 0, 2, 28, '2026-04-05 00:00:34', '2026-04-05 00:00:34'),
(57, 'products/image2.png', 1, 1, 29, '2026-04-05 00:00:34', '2026-04-05 00:00:34'),
(58, 'products/image1.png', 0, 2, 29, '2026-04-05 00:00:34', '2026-04-05 00:00:34'),
(59, 'products/image2.png', 1, 1, 30, '2026-04-05 00:00:35', '2026-04-05 00:00:35'),
(60, 'products/image5.png', 0, 2, 30, '2026-04-05 00:00:35', '2026-04-05 00:00:35'),
(61, 'products/image2.png', 1, 1, 31, '2026-04-05 00:00:35', '2026-04-05 00:00:35'),
(62, 'products/image5.png', 0, 2, 31, '2026-04-05 00:00:35', '2026-04-05 00:00:35'),
(63, 'products/image1.png', 1, 1, 32, '2026-04-05 00:00:35', '2026-04-05 00:00:35'),
(64, 'products/image6.png', 0, 2, 32, '2026-04-05 00:00:35', '2026-04-05 00:00:35'),
(65, 'products/image2.png', 1, 1, 33, '2026-04-05 00:00:35', '2026-04-05 00:00:35'),
(66, 'products/image5.png', 0, 2, 33, '2026-04-05 00:00:35', '2026-04-05 00:00:35'),
(67, 'products/image5.png', 1, 1, 34, '2026-04-05 00:00:36', '2026-04-05 00:00:36'),
(68, 'products/image7.png', 0, 2, 34, '2026-04-05 00:00:36', '2026-04-05 00:00:36'),
(69, 'products/image2.png', 1, 1, 35, '2026-04-05 00:00:36', '2026-04-05 00:00:36'),
(70, 'products/image4.png', 0, 2, 35, '2026-04-05 00:00:36', '2026-04-05 00:00:36'),
(71, 'products/image2.png', 1, 1, 36, '2026-04-05 00:00:36', '2026-04-05 00:00:36'),
(72, 'products/image3.png', 0, 2, 36, '2026-04-05 00:00:36', '2026-04-05 00:00:36'),
(73, 'products/image1.png', 1, 1, 37, '2026-04-05 00:00:37', '2026-04-05 00:00:37'),
(74, 'products/image6.png', 0, 2, 37, '2026-04-05 00:00:37', '2026-04-05 00:00:37'),
(75, 'products/image7.png', 1, 1, 38, '2026-04-05 00:00:37', '2026-04-05 00:00:37'),
(76, 'products/image1.png', 0, 2, 38, '2026-04-05 00:00:37', '2026-04-05 00:00:37'),
(77, 'products/image1.png', 1, 1, 39, '2026-04-05 00:00:37', '2026-04-05 00:00:37'),
(78, 'products/image8.png', 0, 2, 39, '2026-04-05 00:00:37', '2026-04-05 00:00:37'),
(79, 'products/image4.png', 1, 1, 40, '2026-04-05 00:00:38', '2026-04-05 00:00:38'),
(80, 'products/image2.png', 0, 2, 40, '2026-04-05 00:00:38', '2026-04-05 00:00:38'),
(81, 'products/image3.png', 1, 1, 41, '2026-04-05 00:00:38', '2026-04-05 00:00:38'),
(82, 'products/image7.png', 0, 2, 41, '2026-04-05 00:00:38', '2026-04-05 00:00:38'),
(83, 'products/image2.png', 1, 1, 42, '2026-04-05 00:00:39', '2026-04-05 00:00:39'),
(84, 'products/image2.png', 0, 2, 42, '2026-04-05 00:00:39', '2026-04-05 00:00:39'),
(85, 'products/image1.png', 1, 1, 43, '2026-04-05 00:00:40', '2026-04-05 00:00:40'),
(86, 'products/image8.png', 0, 2, 43, '2026-04-05 00:00:40', '2026-04-05 00:00:40'),
(87, 'products/image4.png', 1, 1, 44, '2026-04-05 00:00:41', '2026-04-05 00:00:41'),
(88, 'products/image8.png', 0, 2, 44, '2026-04-05 00:00:41', '2026-04-05 00:00:41'),
(89, 'products/image8.png', 1, 1, 45, '2026-04-05 00:00:42', '2026-04-05 00:00:42'),
(90, 'products/image3.png', 0, 2, 45, '2026-04-05 00:00:42', '2026-04-05 00:00:42'),
(91, 'products/image6.png', 1, 1, 46, '2026-04-05 00:00:42', '2026-04-05 00:00:42'),
(92, 'products/image6.png', 0, 2, 46, '2026-04-05 00:00:42', '2026-04-05 00:00:42'),
(93, 'products/image7.png', 1, 1, 47, '2026-04-05 00:00:43', '2026-04-05 00:00:43'),
(94, 'products/image8.png', 0, 2, 47, '2026-04-05 00:00:43', '2026-04-05 00:00:43'),
(95, 'products/image6.png', 1, 1, 48, '2026-04-05 00:00:43', '2026-04-05 00:00:43'),
(96, 'products/image6.png', 0, 2, 48, '2026-04-05 00:00:43', '2026-04-05 00:00:43'),
(97, 'products/image2.png', 1, 1, 49, '2026-04-05 00:00:43', '2026-04-05 00:00:43'),
(98, 'products/image8.png', 0, 2, 49, '2026-04-05 00:00:43', '2026-04-05 00:00:43'),
(99, 'products/image6.png', 1, 1, 50, '2026-04-05 00:00:44', '2026-04-05 00:00:44'),
(100, 'products/image6.png', 0, 2, 50, '2026-04-05 00:00:44', '2026-04-05 00:00:44'),
(101, 'products/image5.png', 1, 1, 51, '2026-04-05 00:00:44', '2026-04-05 00:00:44'),
(102, 'products/image2.png', 0, 2, 51, '2026-04-05 00:00:44', '2026-04-05 00:00:44'),
(103, 'products/image2.png', 1, 1, 52, '2026-04-05 00:00:44', '2026-04-05 00:00:44'),
(104, 'products/image7.png', 0, 2, 52, '2026-04-05 00:00:44', '2026-04-05 00:00:44'),
(105, 'products/image7.png', 1, 1, 53, '2026-04-05 00:00:44', '2026-04-05 00:00:44'),
(106, 'products/image7.png', 0, 2, 53, '2026-04-05 00:00:44', '2026-04-05 00:00:44'),
(107, 'products/image3.png', 1, 1, 54, '2026-04-05 00:00:45', '2026-04-05 00:00:45'),
(108, 'products/image3.png', 0, 2, 54, '2026-04-05 00:00:45', '2026-04-05 00:00:45'),
(109, 'products/image5.png', 1, 1, 55, '2026-04-05 00:00:45', '2026-04-05 00:00:45'),
(110, 'products/image8.png', 0, 2, 55, '2026-04-05 00:00:45', '2026-04-05 00:00:45'),
(111, 'products/image3.png', 1, 1, 56, '2026-04-05 00:00:45', '2026-04-05 00:00:45'),
(112, 'products/image3.png', 0, 2, 56, '2026-04-05 00:00:45', '2026-04-05 00:00:45'),
(113, 'products/image2.png', 1, 1, 57, '2026-04-05 00:00:46', '2026-04-05 00:00:46'),
(114, 'products/image3.png', 0, 2, 57, '2026-04-05 00:00:46', '2026-04-05 00:00:46'),
(115, 'products/image7.png', 1, 1, 58, '2026-04-05 00:00:46', '2026-04-05 00:00:46'),
(116, 'products/image5.png', 0, 2, 58, '2026-04-05 00:00:46', '2026-04-05 00:00:46'),
(117, 'products/image7.png', 1, 1, 59, '2026-04-05 00:00:46', '2026-04-05 00:00:46'),
(118, 'products/image1.png', 0, 2, 59, '2026-04-05 00:00:46', '2026-04-05 00:00:46'),
(119, 'products/image4.png', 1, 1, 60, '2026-04-05 00:00:47', '2026-04-05 00:00:47'),
(120, 'products/image3.png', 0, 2, 60, '2026-04-05 00:00:47', '2026-04-05 00:00:47'),
(121, 'products/image5.png', 1, 1, 61, '2026-04-05 00:00:47', '2026-04-05 00:00:47'),
(122, 'products/image2.png', 0, 2, 61, '2026-04-05 00:00:47', '2026-04-05 00:00:47'),
(123, 'products/image6.png', 1, 1, 62, '2026-04-05 00:00:47', '2026-04-05 00:00:47'),
(124, 'products/image7.png', 0, 2, 62, '2026-04-05 00:00:47', '2026-04-05 00:00:47'),
(125, 'products/image8.png', 1, 1, 63, '2026-04-05 00:00:48', '2026-04-05 00:00:48'),
(126, 'products/image3.png', 0, 2, 63, '2026-04-05 00:00:48', '2026-04-05 00:00:48'),
(127, 'products/image8.png', 1, 1, 64, '2026-04-05 00:00:48', '2026-04-05 00:00:48'),
(128, 'products/image8.png', 0, 2, 64, '2026-04-05 00:00:48', '2026-04-05 00:00:48'),
(129, 'products/image8.png', 1, 1, 65, '2026-04-05 00:00:49', '2026-04-05 00:00:49'),
(130, 'products/image2.png', 0, 2, 65, '2026-04-05 00:00:49', '2026-04-05 00:00:49'),
(131, 'products/image1.png', 1, 1, 66, '2026-04-05 00:00:50', '2026-04-05 00:00:50'),
(132, 'products/image1.png', 0, 2, 66, '2026-04-05 00:00:50', '2026-04-05 00:00:50'),
(133, 'products/image1.png', 1, 1, 67, '2026-04-05 00:00:51', '2026-04-05 00:00:51'),
(134, 'products/image2.png', 0, 2, 67, '2026-04-05 00:00:51', '2026-04-05 00:00:51'),
(135, 'products/image4.png', 1, 1, 68, '2026-04-05 00:00:51', '2026-04-05 00:00:51'),
(136, 'products/image7.png', 0, 2, 68, '2026-04-05 00:00:51', '2026-04-05 00:00:51'),
(137, 'products/image1.png', 1, 1, 69, '2026-04-05 00:00:51', '2026-04-05 00:00:51'),
(138, 'products/image7.png', 0, 2, 69, '2026-04-05 00:00:51', '2026-04-05 00:00:51'),
(139, 'products/image1.png', 1, 1, 70, '2026-04-05 00:00:51', '2026-04-05 00:00:51'),
(140, 'products/image5.png', 0, 2, 70, '2026-04-05 00:00:51', '2026-04-05 00:00:51'),
(141, 'products/image2.png', 1, 1, 71, '2026-04-05 00:00:53', '2026-04-05 00:00:53'),
(142, 'products/image3.png', 0, 2, 71, '2026-04-05 00:00:53', '2026-04-05 00:00:53'),
(143, 'products/image1.png', 1, 1, 72, '2026-04-05 00:00:53', '2026-04-05 00:00:53'),
(144, 'products/image4.png', 0, 2, 72, '2026-04-05 00:00:53', '2026-04-05 00:00:53'),
(145, 'products/image7.png', 1, 1, 73, '2026-04-05 00:00:54', '2026-04-05 00:00:54'),
(146, 'products/image6.png', 0, 2, 73, '2026-04-05 00:00:54', '2026-04-05 00:00:54'),
(147, 'products/image3.png', 1, 1, 74, '2026-04-05 00:00:54', '2026-04-05 00:00:54'),
(148, 'products/image7.png', 0, 2, 74, '2026-04-05 00:00:54', '2026-04-05 00:00:54'),
(149, 'products/image7.png', 1, 1, 75, '2026-04-05 00:00:54', '2026-04-05 00:00:54'),
(150, 'products/image2.png', 0, 2, 75, '2026-04-05 00:00:54', '2026-04-05 00:00:54'),
(151, 'products/image4.png', 1, 1, 76, '2026-04-05 00:00:55', '2026-04-05 00:00:55'),
(152, 'products/image7.png', 0, 2, 76, '2026-04-05 00:00:55', '2026-04-05 00:00:55'),
(153, 'products/image5.png', 1, 1, 77, '2026-04-05 00:00:55', '2026-04-05 00:00:55'),
(154, 'products/image4.png', 0, 2, 77, '2026-04-05 00:00:55', '2026-04-05 00:00:55'),
(155, 'products/image5.png', 1, 1, 78, '2026-04-05 00:00:55', '2026-04-05 00:00:55'),
(156, 'products/image6.png', 0, 2, 78, '2026-04-05 00:00:55', '2026-04-05 00:00:55'),
(157, 'products/image4.png', 1, 1, 79, '2026-04-05 00:00:56', '2026-04-05 00:00:56'),
(158, 'products/image1.png', 0, 2, 79, '2026-04-05 00:00:56', '2026-04-05 00:00:56'),
(159, 'products/image2.png', 1, 1, 80, '2026-04-05 00:00:56', '2026-04-05 00:00:56'),
(160, 'products/image3.png', 0, 2, 80, '2026-04-05 00:00:56', '2026-04-05 00:00:56'),
(161, 'products/image8.png', 1, 1, 81, '2026-04-05 00:00:56', '2026-04-05 00:00:56'),
(162, 'products/image5.png', 0, 2, 81, '2026-04-05 00:00:56', '2026-04-05 00:00:56'),
(163, 'products/image4.png', 1, 1, 82, '2026-04-05 00:00:56', '2026-04-05 00:00:56'),
(164, 'products/image2.png', 0, 2, 82, '2026-04-05 00:00:57', '2026-04-05 00:00:57'),
(165, 'products/image3.png', 1, 1, 83, '2026-04-05 00:00:57', '2026-04-05 00:00:57'),
(166, 'products/image5.png', 0, 2, 83, '2026-04-05 00:00:57', '2026-04-05 00:00:57'),
(167, 'products/image8.png', 1, 1, 84, '2026-04-05 00:00:57', '2026-04-05 00:00:57'),
(168, 'products/image1.png', 0, 2, 84, '2026-04-05 00:00:58', '2026-04-05 00:00:58'),
(169, 'products/image8.png', 1, 1, 85, '2026-04-05 00:00:58', '2026-04-05 00:00:58'),
(170, 'products/image3.png', 0, 2, 85, '2026-04-05 00:00:58', '2026-04-05 00:00:58'),
(171, 'products/image8.png', 1, 1, 86, '2026-04-05 00:00:58', '2026-04-05 00:00:58'),
(172, 'products/image6.png', 0, 2, 86, '2026-04-05 00:00:58', '2026-04-05 00:00:58'),
(173, 'products/image6.png', 1, 1, 87, '2026-04-05 00:00:59', '2026-04-05 00:00:59'),
(174, 'products/image8.png', 0, 2, 87, '2026-04-05 00:00:59', '2026-04-05 00:00:59'),
(175, 'products/image2.png', 1, 1, 88, '2026-04-05 00:00:59', '2026-04-05 00:00:59'),
(176, 'products/image2.png', 0, 2, 88, '2026-04-05 00:00:59', '2026-04-05 00:00:59'),
(177, 'products/image1.png', 1, 1, 89, '2026-04-05 00:00:59', '2026-04-05 00:00:59'),
(178, 'products/image1.png', 0, 2, 89, '2026-04-05 00:00:59', '2026-04-05 00:00:59'),
(179, 'products/image5.png', 1, 1, 90, '2026-04-05 00:00:59', '2026-04-05 00:00:59'),
(180, 'products/image6.png', 0, 2, 90, '2026-04-05 00:00:59', '2026-04-05 00:00:59'),
(181, 'products/image7.png', 1, 1, 91, '2026-04-05 00:01:00', '2026-04-05 00:01:00'),
(182, 'products/image8.png', 0, 2, 91, '2026-04-05 00:01:00', '2026-04-05 00:01:00'),
(183, 'products/image7.png', 1, 1, 92, '2026-04-05 00:01:00', '2026-04-05 00:01:00'),
(184, 'products/image5.png', 0, 2, 92, '2026-04-05 00:01:00', '2026-04-05 00:01:00'),
(185, 'products/image4.png', 1, 1, 93, '2026-04-05 00:01:00', '2026-04-05 00:01:00'),
(186, 'products/image6.png', 0, 2, 93, '2026-04-05 00:01:00', '2026-04-05 00:01:00'),
(187, 'products/image3.png', 1, 1, 94, '2026-04-05 00:01:00', '2026-04-05 00:01:00'),
(188, 'products/image1.png', 0, 2, 94, '2026-04-05 00:01:01', '2026-04-05 00:01:01'),
(189, 'products/image8.png', 1, 1, 95, '2026-04-05 00:01:01', '2026-04-05 00:01:01'),
(190, 'products/image8.png', 0, 2, 95, '2026-04-05 00:01:01', '2026-04-05 00:01:01'),
(191, 'products/image6.png', 1, 1, 96, '2026-04-05 00:01:01', '2026-04-05 00:01:01'),
(192, 'products/image8.png', 0, 2, 96, '2026-04-05 00:01:01', '2026-04-05 00:01:01'),
(193, 'products/image4.png', 1, 1, 97, '2026-04-05 00:01:01', '2026-04-05 00:01:01'),
(194, 'products/image6.png', 0, 2, 97, '2026-04-05 00:01:01', '2026-04-05 00:01:01'),
(195, 'products/image7.png', 1, 1, 98, '2026-04-05 00:01:02', '2026-04-05 00:01:02'),
(196, 'products/image1.png', 0, 2, 98, '2026-04-05 00:01:02', '2026-04-05 00:01:02'),
(197, 'products/image7.png', 1, 1, 99, '2026-04-05 00:01:02', '2026-04-05 00:01:02'),
(198, 'products/image3.png', 0, 2, 99, '2026-04-05 00:01:02', '2026-04-05 00:01:02'),
(199, 'products/image1.png', 1, 1, 100, '2026-04-05 00:01:02', '2026-04-05 00:01:02'),
(200, 'products/image7.png', 0, 2, 100, '2026-04-05 00:01:03', '2026-04-05 00:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'user', '2026-04-04 23:59:58', '2026-04-04 23:59:58'),
(2, 'member', '2026-04-04 23:59:58', '2026-04-04 23:59:58'),
(3, 'admin', '2026-04-04 23:59:58', '2026-04-04 23:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `date_of_birth`, `code`, `email_verified_at`, `is_active`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'Royal', 'King', 'michele04', 'gibson.danyka@example.net', '$2y$12$Uy0iFQ1DwpfcxxJ/y7S9meUEME7SasbT.LKZcWuUroR2MRxunmEM2', '2019-12-31', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:09', '2026-04-05 00:00:09', 3),
(2, 'Destany', 'Sauer', 'elta.bergnaum', 'eerdman@example.org', '$2y$12$GYQwo.RKmIMf4pcOGjUiQO1G4PwvU24IjQRnMnxqHvYfFUjS2e.a.', '2000-08-04', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:09', '2026-04-05 00:00:09', 3),
(3, 'Marquise', 'Kling', 'erdman.claude', 'hbalistreri@example.com', '$2y$12$nahd60ZvVZpmcG5qjwweyeCfXNBCNVm6tTrlgI578Jt84bsgLqmA2', '2017-12-11', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:09', '2026-04-05 00:00:09', 2),
(4, 'Hertha', 'Swaniawski', 'mackenzie71', 'wayne.quigley@example.org', '$2y$12$5hgKSJE9gKjSWFlUDbAbnuZVdw0EvCl0iPgPkG0Kua1g0uG27gyXW', '1973-03-01', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:09', '2026-04-05 00:00:09', 2),
(5, 'Gordon', 'Hodkiewicz', 'meredith11', 'balistreri.drew@example.org', '$2y$12$yVdJgpi9tNgontI0rB6T9ujkD9DnW5Eeb0BG9kdSgqDTR.InBrLre', '2005-07-26', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:09', '2026-04-05 00:00:09', 1),
(6, 'Wilber', 'Heidenreich', 'schuster.torrey', 'milton.bednar@example.org', '$2y$12$Cwq.Y.giNdjcprRfYzQ15eXnnssBSheuA6XaUSlM.UqIBofzk68M.', '1980-06-05', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:09', '2026-04-05 00:00:09', 2),
(7, 'Chasity', 'Lebsack', 'kevin.tillman', 'lavina98@example.com', '$2y$12$IqY1yak6USd7fjanmLFkQew/y1yw2J1CoBDNnPYnUrw0oFMVYlcv6', '2017-07-14', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:09', '2026-04-05 00:00:09', 2),
(8, 'Carmelo', 'Smith', 'gleason.nettie', 'dcrona@example.org', '$2y$12$.WZGIFJNAlJeFK239eTcVeQQcDt3/UGWYXgsgwgymAEvb.Q7jUGjG', '1971-01-14', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:09', '2026-04-05 00:00:09', 1),
(9, 'Herbert', 'Brakus', 'casper.gibson', 'delia13@example.com', '$2y$12$D49ppaGkesPwLG4cKSJ9z./WjTSZey0yzBglMt1cr9Xwqd/lal/oa', '1973-12-18', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:09', '2026-04-05 00:00:09', 3),
(10, 'Vince', 'Schoen', 'watsica.derrick', 'lenny53@example.com', '$2y$12$ubZ7AGQQWi2pMB9w8FX6L.8Ykj0dyMsWeHwEqTarWHpCml5A9kfpW', '1990-01-15', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:10', '2026-04-05 00:00:10', 1),
(11, 'Alison', 'Spencer', 'brody.wuckert', 'dubuque.delta@example.org', '$2y$12$LqFhRTB1wkz16Nv1swSHp.kwc0XON5lvO.LWy1ZpIudqvaP3tt1GG', '2021-07-16', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:10', '2026-04-05 00:00:10', 2),
(12, 'Tate', 'Johns', 'eva.mcclure', 'markus96@example.net', '$2y$12$wWTUAtc6SICuSgd.i7YQeObjrgje6cvWvfdid.fOyqwpbns6UzN4S', '1982-06-20', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:10', '2026-04-05 00:00:10', 1),
(13, 'Laurianne', 'Fisher', 'jammie31', 'myriam68@example.net', '$2y$12$ov0NARG8dnOSeJKuxcJxv.fkJMqdQv5yndjk/P8r/I7BiAxpbsXYa', '2025-03-26', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:10', '2026-04-05 00:00:10', 1),
(14, 'Evie', 'Hegmann', 'collins.mariah', 'eldridge.botsford@example.org', '$2y$12$U.GqmsCsVQZBjspDtbsyGuctYhquGeDIkYTmY8Bd5t0Ajt6DAd/b.', '1972-06-24', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:10', '2026-04-05 00:00:10', 3),
(15, 'Eleonore', 'Raynor', 'gward', 'zritchie@example.com', '$2y$12$YAwiPFqYW3wKEEJl1qEa8udv4RxLvowuoacIPuqs6MZLlD0S5kXwG', '2025-10-27', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:10', '2026-04-05 00:00:10', 1),
(16, 'Georgianna', 'Murphy', 'gennaro28', 'howe.janick@example.net', '$2y$12$/TdnHhDHkajm5o4g7yf9H.NKq25TfOr7PIihC02iYNXFzc4pUFvJC', '1983-07-04', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:10', '2026-04-05 00:00:10', 3),
(17, 'Ashley', 'Jakubowski', 'myrtle18', 'hildegard05@example.org', '$2y$12$zxq64upQp2/qXf3OtUQSZebF5aRUcH9rpYEy/MSQLsCnzde2LI/me', '1986-03-13', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:10', '2026-04-05 00:00:10', 3),
(18, 'Lia', 'O\'Reilly', 'aniya.grady', 'alaina49@example.org', '$2y$12$WLctj8wLCzMjxdv1AoOiFeOysFD4EJEXbTwwYD8DgXKmC7XJmYVdu', '1995-09-22', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:10', '2026-04-05 00:00:10', 3),
(19, 'Jaiden', 'Stanton', 'yohara', 'cathryn65@example.net', '$2y$12$Oav8Cfz.7pDH21.u64IlRuvojg.idshN3n.r3xi4yzDU6YICIVi4G', '1970-02-16', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:10', '2026-04-05 00:00:10', 2),
(20, 'Jackeline', 'Glover', 'alexie89', 'jermey22@example.com', '$2y$12$74he3xKgoRIrWt3TCxn8d.moD9Wz/1KtYQaRl/Hxo1g.doDulqUae', '1971-06-17', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:10', '2026-04-05 00:00:10', 3),
(21, 'Candida', 'Bergnaum', 'nils.rempel', 'dwiegand@example.com', '$2y$12$mCBZVJKMks8tj5f11pBsce1Jt/yNKIrzQagRd6JjT5DlM2LmzhF.y', '1978-09-03', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:10', '2026-04-05 00:00:10', 2),
(22, 'Brianne', 'Lebsack', 'hickle.quinton', 'krajcik.florian@example.org', '$2y$12$GX/t/V6p7jAw4eLGmaISAeq8Q3yHAhUV4kuh4UCruNYDdospOMzy.', '2013-06-05', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:10', '2026-04-05 00:00:10', 2),
(23, 'Alexa', 'Rowe', 'reina01', 'feeney.thad@example.com', '$2y$12$0Sl9dFaGOPpDP1ZdvJzxLuXglNFCLpB8jx8gHRptvKjpEIe1BpcW6', '1995-05-27', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:10', '2026-04-05 00:00:10', 2),
(24, 'Arvilla', 'Conroy', 'runolfsdottir.esta', 'blaise04@example.com', '$2y$12$Nyn6R4esXsYQHiZuGzle.OIWmyWVpJ7fq2vFH5J3ghZOZvE9/V7ve', '2001-07-26', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:10', '2026-04-05 00:00:10', 2),
(25, 'Nat', 'Hammes', 'kessler.hershel', 'alf46@example.org', '$2y$12$leAS2ACYWIn8xWRc4T0J1ugZaPd/El1O/o0GpzEhrNCu0stD5smwi', '2009-06-17', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:10', '2026-04-05 00:00:10', 2),
(26, 'Makenzie', 'Macejkovic', 'owen33', 'rau.amalia@example.com', '$2y$12$ZfpvcAi6OL3oOhj56Zp.YeJ2xW83OijRqFIzYaZVTTr1aivFEhWEW', '1997-02-14', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:10', '2026-04-05 00:00:10', 1),
(27, 'Lucie', 'Hermiston', 'xjones', 'audreanne.bruen@example.org', '$2y$12$sGK0goWu5WWFZXE2Em1IcOWx0dsSnh2oFshLHDyMsFBpsiJIMpzHC', '1992-06-03', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:10', '2026-04-05 00:00:10', 2),
(28, 'Arlie', 'Blick', 'romaguera.leonora', 'nikko.maggio@example.com', '$2y$12$jZDfdHhtREorVUdQpkwLtOEoxweiMlxK4P5ZjQ.eRwrXimYq1UgxO', '1987-10-05', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:10', '2026-04-05 00:00:10', 3),
(29, 'Gail', 'Terry', 'adams.rogelio', 'reichert.ernestine@example.org', '$2y$12$Jk9iCtetBiRdGwedxl3acuCfWhiTW33QYC7grloknZ4mt6v2zslee', '2017-05-27', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:10', '2026-04-05 00:00:10', 3),
(30, 'Keshawn', 'Halvorson', 'rafaela.shields', 'lori.waters@example.net', '$2y$12$aeJ8m0jCd6q3/MLvRY86yuMfcgw6dsnt9ScsTfe3yxLv9jQ.LbwZu', '2005-05-30', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:10', '2026-04-05 00:00:10', 3),
(31, 'D\'angelo', 'Kutch', 'hallie.nikolaus', 'stanton55@example.org', '$2y$12$JayJ5Rt1yckA.6/OUeQbWeN8vDgwaWxb9M/BUAwFb7ulbN/u1lVCC', '1995-09-27', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:11', '2026-04-05 00:00:11', 2),
(32, 'Malachi', 'Cremin', 'cara02', 'reanna19@example.net', '$2y$12$yjMRJGTKtkYlr/uiZdaeUOl5T3Pa3ek/Q59oR9R4Tuzav0yLwMW.6', '2012-04-03', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:11', '2026-04-05 00:00:11', 1),
(33, 'Sunny', 'Kozey', 'durward.rogahn', 'madaline.fisher@example.com', '$2y$12$2DiUGDh0QFFgJ/8A/iPGMeXVbdcfwhfWeZK4bqvD5wPk2PmQX4qb6', '2021-07-03', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:11', '2026-04-05 00:00:11', 2),
(34, 'Pedro', 'Schuster', 'florida.bradtke', 'dalton93@example.net', '$2y$12$jfnfD.IAC3KdfMK7COElne4nWc.wxVKNSoDGi7T7w/omWvqIV.6pK', '1982-04-26', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:11', '2026-04-05 00:00:11', 1),
(35, 'Adriana', 'Hermann', 'joannie21', 'leann62@example.org', '$2y$12$9adw9k8xdLkvMMImRrzKM.So9AvfmkPGK8kEfmc41OzUwSCjeWa3C', '1976-05-27', NULL, NULL, 1, NULL, NULL, '2026-04-05 00:00:11', '2026-04-05 00:00:11', 3),
(36, 'Vojin', 'Konatarevic', 'vojin', 'konatarevicv@gmail.com', '$2y$12$WVw0iF5as1w3EnjH.ARheecM5MIRFk26G81OFkbx5WbtFP2jq.FbG', '2008-04-05', NULL, '2026-04-05 00:00:11', 1, NULL, NULL, '2026-04-05 00:00:11', '2026-04-05 00:00:11', 3),
(37, 'Admin', 'Admin', 'admin', 'admin@gmail.com', '$2y$12$Pb.gIQBPHgY343COeyj5OuF6m8SI62AO2kns7mltmuL8ilZCP3f/i', '2008-04-05', NULL, '2026-04-05 00:00:12', 1, NULL, NULL, '2026-04-05 00:00:12', '2026-04-05 00:00:12', 3),
(38, 'User', 'User', 'user', 'user@gmail.com', '$2y$12$BQwhYZdRaEoZT7gEpCfdSOkqRNKNLt8EX1QWcr5ewTcal4G9pJh8.', '2008-04-05', NULL, '2026-04-05 00:00:12', 1, NULL, NULL, '2026-04-05 00:00:12', '2026-04-05 00:00:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_avatars`
--

CREATE TABLE `user_avatars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` int(10) UNSIGNED DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_avatars`
--

INSERT INTO `user_avatars` (`id`, `user_id`, `path`, `type`, `size`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 36, 'vojin.jpg', NULL, NULL, 1, '2026-04-05 00:00:14', '2026-04-05 00:00:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_user_id_foreign` (`user_id`),
  ADD KEY `activity_logs_route_index` (`route`);

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_messages_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prices_product_id_foreign` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_badge_id_foreign` (`badge_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_avatars`
--
ALTER TABLE `user_avatars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_avatars_user_id_foreign` (`user_id`),
  ADD KEY `user_avatars_is_active_index` (`is_active`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user_avatars`
--
ALTER TABLE `user_avatars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD CONSTRAINT `contact_messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `prices`
--
ALTER TABLE `prices`
  ADD CONSTRAINT `prices_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_badge_id_foreign` FOREIGN KEY (`badge_id`) REFERENCES `badges` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_avatars`
--
ALTER TABLE `user_avatars`
  ADD CONSTRAINT `user_avatars_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
