-- Adminer 4.8.1 MySQL 8.0.30 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `title` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` varchar(700) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `categoryId` int NOT NULL,
  `publishDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `article` (`title`, `content`, `categoryId`, `publishDate`) VALUES
('Nepal moves up corruption index, slightly   ',	'Nepal has made a slight improvement in reducing corruption but the country’s overall corruption score continues to remain poor.\r\nAccording to the Corruption Perceptions Index (CPI) 2022, an annual flagship publication of Transparency International, a global anti-corruption group based in Berlin, made public on Tuesday, Nepal has been ranked 110th among 180 countries and territories surveyed.\r\n\r\n',	2,	'2023-02-01'),
('Failure to deploy full flaps may have caused Yeti crash  ',	'The pilots of the Yeti Airlines ATR that crashed in Pokhara may have failed to fully deploy wing flaps while coming in to land, leading to a stall, early reports said. Aircraft coming to land have the flaps at the back of the wings fully down to provide more control at low speed, and prevent stalling.\r\n\r\n',	2,	'2023-02-01'),
('India stealing a march on China on rail connectivity with Nepal? ',	'As a Chinese technical team started a feasibility study for the proposed Kerung-Kathmandu cross-border railway, India has almost completed a detailed feasibility study for the Raxaul-Kathmandu Railway project, officials at the Department of Railways said.The two projects highlight the geopolitical rivalry between the two neighbouring giants who are competing for influence in Nepal\r\n\r\n\r\n\r\n',	2,	'2023-02-01'),
('Airlines face hurdles at Pokhara airport  ',	'The buildup to the opening of Pokhara International Airport in the Himalayan foothills had got hopes way up. Even the Chinese Embassy had joined in, tweeting on inauguration day on January 1, “Pokhara International Airport has been the dream of the people of Pokhara for 50 years. The airport is designed and built according to Chinese standards, which reflects the high quality of Chinese engineering, and symbolises the national honour of Nepal.”\r\n\r\n\r\n',	2,	'2023-02-01'),
('Newcastle enters final',	'Leading 1-0 from the first leg of their semi-final at St Marys as he notched an early double set them firmly on course for their first major final since the 1999 FA Cup, their first trip to the new Wembley, and their first League Cup final since 1976.',	3,	'2023-02-01'),
('Arsenal sign midfielder from Chelsea in deal worth £12m on Deadline Day',	'The 31-year-old Italy midfielder has signed an 18-month contract, with an option to extend for a further year. jorginho was into the final six months of his Chelsea contract, with the Blues trying to land a British record transfer for Benfica central midfielder Enzo Fernandez.',	3,	'2023-02-01'),
(' Tottenham sign right-back from Sporting Lisbon on £5m loan with £39m obligation to buy in summer',	'Spurs have paid an initial loan fee of around £5m to sign the 23-year-old on Deadline Day.Porro, who has been a key performer for Sporting this season having scored three goals and provided 11 assists in 26 appearances in all competitions, will wear the number 23 shirt at Spurs.',	3,	'2023-02-01'),
('Fighting Wagner is like a ‘zombie movie’ says Ukrainian soldier',	'Southwest of the city of Bakhmut, Ukrainian soldiers Andriy and Borisych live in a candle-lit bunker cut into the frozen earth. For several weeks they have been confronting hundreds of fighters belonging to the Russian private military contractor Wagner throwing themselves against Ukrainian defenses.\r\nDisguised in a balaclava, Andriy recounts one seemingly endless firefight when they came under attack by a flood of Wagner fighters.',	1,	'2023-02-02'),
('Paris Saint-Germain claim Chelsea document gaffe scuppered loan move for winger',	'PSG lodged an appeal to the Professional Football League (LFP)s legal committee, alleging that the Stamford Bridge side had initially sent through the incorrect paperwork after the terms of an agreement had been finalised.',	3,	'2023-02-02'),
('Iranian couple handed prison sentence for dancing in the streets',	'In a video shared widely on social media, Astiyazh Haghighi, 21, is seen dancing without a headscarf with her fiancé Amir Mohammad Ahmadi, 22, in Azadi Square. The couple posted the video themselves.\r\n\r\nEach was charged with “spreading corruption and vice,” and “assembly and collusion with the intention of disrupting national security,” receiving sentences of ten and a half years, according to activist group Human Rights Activists News Agency (HRANA).',	1,	'2023-02-02'),
('Canadian national held with 9 kg gold from Tribhuvan Airport ',	'According to the Airport Customs Office, Mohammad Kamal Mohgob, a Canadian citizen of UAE origin, who arrived from Dubai, was arrested by the customs officials on Wednesday night.\r\n\r\nYamraj Pandey, the spokesperson at the airport customs office, said that Mohammad was arrested in possession of 9.135 kg of illegal gold.\r\nAccording to Pandey, the Canadian had made false buttons on his waist to smuggle eight bars of the precious yellow metal each weighing over 1 kg.',	2,	'2023-02-02'),
('What we learned from the latest charges in plot to kill Haitian president',	'But the four indictments laid out in federal court in Miami on Wednesday tell the very real story of a presidential assassination that has thrown Haiti into chaos for nearly two years, leaving the Haitian people with a feeble government and deadly challenges—gang rule, cholera and hunger chief among them, just miles from American shores.',	1,	'2023-02-02');

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `category` (`id`, `name`) VALUES
(1,	'Interantional'),
(2,	'National'),
(3,	'Sports');

DROP TABLE IF EXISTS `registers`;
CREATE TABLE `registers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `registers` (`id`, `name`, `email`, `password`) VALUES
(1,	'ashim',	'ashim@gmail.com',	'ashim'),
(3,	'chaks',	'chaks',	'chaks'),
(4,	'kothi',	'kothi',	'kothi'),
(5,	'hello',	'hello',	'hello'),
(6,	'kaliya',	'kaliya',	'kaliya'),
(7,	'admin',	'admin',	'admin'),
(8,	'roshan',	'roshan@gmail.com',	'roshan');

-- 2023-02-02 10:30:22