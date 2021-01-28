-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 28. Jan 2021 um 22:51
-- Server-Version: 5.7.24
-- PHP-Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `travelblog`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `content_about`
--

CREATE TABLE `content_about` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `content_top` text NOT NULL,
  `content_bottom` text NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `content_about`
--

INSERT INTO `content_about` (`id`, `title`, `subtitle`, `content_top`, `content_bottom`, `updated`) VALUES
(1, 'Who\'s that girl?', 'Dieses und jenes über mich', '&lt;p&gt;Hell&amp;ouml;le. :) Mein Name ist Jasmin, ich bin ein 91er Kind und habe taiwanesische und schweizerische Wurzeln. Zurzeit bin ich sesshaft in Z&amp;uuml;rich und absolviere eine Weiterbildung in Webdesign &amp;amp; Development.&lt;/p&gt;\r\n\r\n&lt;p&gt;Bereits als ich etwa 6 Jahre alt war, habe ich zusammen mit meinen Eltern alle Kontinente bereist, weshalb wohl daher meine Reiselust kommt. Leider mag ich mich an viele L&amp;auml;nder in dieser Zeitspanne nicht mehr genau erinnern, versuche jedoch diese Erinnerungen wieder aufleben zu lassen und/oder neue zu schaffen.&lt;/p&gt;\r\n\r\n&lt;p&gt;Mein &amp;laquo;Ziel&amp;raquo; ist es nicht, m&amp;ouml;glichst viele L&amp;auml;nder (wieder) zu entdecken, sondern jedes einzelne besuchte Land viel bewusster zu geniessen und die sch&amp;ouml;nen Momente in Fotos festzuhalten.&lt;/p&gt;', '&lt;p&gt;Was die meisten sehr erstaunt, ist, dass ich Winter und vor allem Schnee bevorzuge. Ich liebe diese gem&amp;uuml;tliche &amp;laquo;kuschlige&amp;raquo; Atmosph&amp;auml;re, wenn man sich dick mit Schal und einer Bommelm&amp;uuml;tze einpackt und in gem&amp;uuml;tlichen Caf&amp;eacute;s seine Zeit vertreibt oder einen Gl&amp;uuml;hwein in den sonnigen Bergen geniesst.&lt;/p&gt;\r\n\r\n&lt;p&gt;Somit sollte es keinen verwundern, dass ich die Schweizer Berge oder kalte L&amp;auml;nder wie zum Beispiel Island liebe! Zu Strandferien in Spanien oder Mexiko sage ich aber auch nicht nein. ;)&lt;/p&gt;\r\n\r\n&lt;p&gt;Gerne lasse ich euch in diesem Blog an meinen Eindr&amp;uuml;cken teilhaben und hoffe, in euch auch ein bisschen die Reiselust zu wecken. :D&lt;/p&gt;', '2021-01-27 13:11:17');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `content_blog`
--

CREATE TABLE `content_blog` (
  `id` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `content_blogarticle` text NOT NULL,
  `post_date` date NOT NULL,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `content_blog`
--

INSERT INTO `content_blog` (`id`, `country`, `title`, `subtitle`, `content_blogarticle`, `post_date`, `author`) VALUES
(1, 'mexico', 'MEXIKO – Fiestas, Farben und vieles mehr.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi explicabo, at ratione voluptatibus illum saepe facere fugiat illo.', '&lt;p&gt;Dieses Land hat definitiv mehr zu bieten als nur Fiestas, Burritos, Tequila und die sch&amp;ouml;ne Sprache Spanisch. Es gibt auch ruhige und kulturelle Ecken, weshalb wir uns f&amp;uuml;r folgenden 2-Wochen-Ferienplan entschieden haben:&lt;/p&gt;\r\n\r\n&lt;p&gt;Zuerst ging&amp;rsquo;s gem&amp;uuml;tlich f&amp;uuml;r 3 Tage auf die Insel Isla Mujeres, danach f&amp;uuml;r die Kombination Sonne, Strand und Fiesta 1 Woche nach Playa del Carmen und zu guter Letzt f&amp;uuml;r 4 Tage nach Tulum um wieder runterzukommen.&lt;/p&gt;\r\n\r\n&lt;p&gt;Letzteres war jedoch nicht ganz so erholsam wie erhofft, wir hatten in der H&amp;auml;lfte unseres Aufenthaltes eine Schlange im Bungalow! Zum Gl&amp;uuml;ck ist uns aber nichts passiert, denn wir waren noch nie so schnell (weg)gerannt als wir sie gesehen haben. Das Hotelpersonal hat danach nach der Schlange gesucht, aber die war schon l&amp;auml;ngstens wieder verschwunden. Im Nachhinein habe ich gelesen, dass Schlangen im Haus sogar Gl&amp;uuml;ck bringen sollen! :D&lt;/p&gt;\r\n\r\n&lt;p&gt;Nebst dieser kleinen Nervenstrapaze haben wir das unglaublich leckere Essen, die eindr&amp;uuml;cklichen Maya-St&amp;auml;tten Chichen Itza und Tulum sowie das Schwimmen in einem der Cenotes (mit Wasser gef&amp;uuml;llte Grotte) sehr genossen &amp;ndash; te extra&amp;ntilde;o M&amp;eacute;xico!&lt;/p&gt;', '2020-09-01', 'Jasmin'),
(2, 'iceland', 'ISLAND – Kaltes Land, warmes Herz.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus aliquam ex impedit error nam sunt placeat. Autem qui consectetur veritatis.', '&lt;p&gt;Island war schon lange auf meiner unbedingt-wieder-zu-besuchen-Liste. Ich mag mich nur noch an die sehr eisigen Winde und an eine der besten Champignoncremesuppen erinnern! :D&lt;/p&gt;\r\n\r\n&lt;p&gt;Vom Flughafen Keflavik in die Hauptstadt Reykjavik sind wir etwa 45 Minuten mit dem Bus gefahren. Ich war erstaunt, dass es keine Z&amp;uuml;ge in diesem Land gibt. Als Fortbewegungsmittel werden Autos, Busse oder Schiffe verwendet.&lt;/p&gt;\r\n\r\n&lt;p&gt;Die langen Busfahrten von 1 bis 2 Stunden bei den Tagesausfl&amp;uuml;gen machten mir nicht viel aus, da man die meilenweiten menschenleeren Landschaften vollumf&amp;auml;nglich geniessen konnte und es f&amp;uuml;r mich gepaart mit Musik in meinem Ohr so beruhigend war.&lt;/p&gt;\r\n\r\n&lt;p&gt;Reykjavik ist nicht sehr gross, sodass man &amp;uuml;berall ziemlich gut zu Fuss hinkommt und hat doch einiges zu bieten: Tolle Caf&amp;eacute;s, Restaurants mit sehr herzlichem Personal und &amp;auml;sthetische Wandbemalungen, L&amp;auml;den und Geb&amp;auml;ude.&lt;/p&gt;\r\n\r\n&lt;p&gt;Eine der H&amp;ouml;hepunkte waren die Polarlichter, welche wir am zweitletzten Tag vor Abreise gl&amp;uuml;cklicherweise noch zu Gesicht bekommen haben. Da ich diese zum ersten Mal gesehen habe, habe ich bewusst auf Fotoaufnahmen verzichtet und das total &amp;laquo;Magische&amp;raquo; auf mich wirken lassen/genossen.&lt;/p&gt;\r\n\r\n&lt;p&gt;N&amp;auml;chstes Wunsch-Reiseziel: Der schwarze Sandstrand Reynisfjara, welchen wir w&amp;auml;hrend dem einw&amp;ouml;chigen Aufenthalt leider nicht mehr geschafft haben. Ich komme wieder, Island! :D&lt;/p&gt;', '2020-10-12', 'Jasmin'),
(3, 'japan', 'JAPAN – Das Land der aufgehenden Sonne.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi consequatur libero at ipsam fuga repellendus.', '&lt;p&gt;Kaum in einem anderen Land habe ich als ich das erste Mal dort war (soweit ich mich als kleines Kind erinnern mag) einen solchen Kulturschock &amp;ndash; im positiven Sinn! &amp;ndash; erlebt. Angefangen mit den wilden aber auch zuckers&amp;uuml;ssen Prinzessin-Verkleidungen, den beheizten Toiletten oder den lustig verzierten Getr&amp;auml;nkeautomaten &amp;ndash; einfach alles ein bisschen &amp;uuml;bertrieben halt. ;D&lt;/p&gt;\r\n\r\n&lt;p&gt;Andererseits wof&amp;uuml;r Japan bekannt ist, sind die atemberaubenden Landschaften, Tempel, die Kirschbl&amp;uuml;tenzeit sowie das traditionelle Kleidungsst&amp;uuml;ck Kimono, welche auch unter den Touristen sehr beliebt ist. Auch kann man es das Land der Gegens&amp;auml;tze nennen: W&amp;auml;hrend es Roboterhotel gibt, wird an vielen Orten immer noch &amp;laquo;cash only&amp;raquo; akzeptiert.&lt;/p&gt;\r\n\r\n&lt;p&gt;In den letzten 2 Wochen haben wir nebst der immer wieder gern besuchten Stadt Kyoto auch einige Stationen wieder durchgemacht, welche ich nur noch sehr vage in Erinnerung hatte. Insbesondere auf den goldenen Tempel Kinkaku-ji sowie auf die Insel Miyajima, wo die Rehe frei herumlaufen, habe ich mich sehr gefreut.&lt;/p&gt;\r\n\r\n&lt;p&gt;Japan ist ein Land, deren Sch&amp;ouml;nheit mir immer wieder imponiert und ich mich nie satt sehen kann. Zudem f&amp;uuml;hle ich mich durch die sehr zuvorkommenden und freundlichen Japaner supergut aufgehoben. Ein must-seen Land, definitiv!&lt;/p&gt;', '2020-11-08', 'Jasmin');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `images_blog`
--

CREATE TABLE `images_blog` (
  `id` int(11) NOT NULL,
  `img_filename` varchar(255) NOT NULL,
  `img_description` varchar(255) NOT NULL,
  `img_caption` varchar(255) NOT NULL,
  `blogarticle` varchar(255) NOT NULL,
  `coverpic` varchar(255) DEFAULT NULL,
  `uploaded_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `images_blog`
--

INSERT INTO `images_blog` (`id`, `img_filename`, `img_description`, `img_caption`, `blogarticle`, `coverpic`, `uploaded_on`) VALUES
(1, 'mexico_coverpic.jpg', 'me jumping in front of the mayan temple Chichen Itza in Yucatan', 'Chichén Itzá, Yucatán', 'MEXIKO – Fiestas, Farben und vieles mehr.', 'yes', '2021-01-26 23:37:37'),
(2, 'tulum_mexico.jpg', 'mayan temple surrounded by bushes next to the sea, tulum', 'Maya-Stätte Tulum', 'MEXIKO – Fiestas, Farben und vieles mehr.', 'no', '2021-01-26 23:37:37'),
(3, 'bungalow_mexico.jpg', 'bungalow surrounded by palms, tulum', 'Unser Bungalow in Tulum', 'MEXIKO – Fiestas, Farben und vieles mehr.', 'no', '2021-01-26 23:37:37'),
(4, 'valladolid_mexico.jpg', 'colorful city Valladolid, Yucatán', 'Valladolid, Yucatán', 'MEXIKO – Fiestas, Farben und vieles mehr.', 'no', '2021-01-26 23:37:37'),
(5, 'port_mexico.jpg', 'port with turquoise blue sea, cancun', 'Hafen in Cancun', 'MEXIKO – Fiestas, Farben und vieles mehr.', 'no', '2021-01-26 23:37:37'),
(6, 'streetart_iceland.jpg', 'a green house with a symbol of french fries and the Hallgrims Church in yellow, Reykjavik', 'Pommesbude, Reykjavik', 'ISLAND – Kaltes Land, warmes Herz.', 'no', '2021-01-26 23:37:37'),
(7, 'cozy_cafe_iceland.jpg', 'a café with brown vintage chairs, table and a turntable, Reykjavik', 'Gemütliches Café, Reykjavik', 'ISLAND – Kaltes Land, warmes Herz.', 'no', '2021-01-26 23:37:37'),
(8, 'iceland_coverpic.jpg', 'snowy landscape with hot spring, Grindavik', 'Heisse Quelle, Grindavik', 'ISLAND – Kaltes Land, warmes Herz.', 'yes', '2021-01-26 23:37:37'),
(9, 'harpa_iceland.jpg', 'Harpa, a glass concert hall and conference centre in Reykjavik', 'Konzerthaus Harpa, Reykjavik', 'ISLAND – Kaltes Land, warmes Herz.', 'no', '2021-01-26 23:37:37'),
(10, 'bus-view_iceland.jpg', 'view from the bus to a deserted snowy landscape, somewhere out of Reykjavik', 'Aussicht auf die Schneelandschaft', 'ISLAND – Kaltes Land, warmes Herz.', 'no', '2021-01-26 23:37:37'),
(11, 'japan_coverpic.jpg', 'a golden Buddhist temple in Kyoto called Kinkaku-ji (Golden Pavilion)', 'Kinkaku-ji (Goldener Tempel), Kyoto', 'JAPAN – Das Land der aufgehenden Sonne.', 'yes', '2021-01-26 23:37:37'),
(12, 'me_with_deers.jpg', 'me with free running deers on the island Miyajima', 'Freilaufende Rehe auf der Insel Miyajima', 'JAPAN – Das Land der aufgehenden Sonne.', 'no', '2021-01-26 23:37:37'),
(13, 'vending_machine_japan.jpg', 'beverage vending machine covered with the yellow cartoon character Pikachu, Kyoto', 'Pikachu-Getränkeautomat, Kyoto', 'JAPAN – Das Land der aufgehenden Sonne.', 'no', '2021-01-26 23:37:37'),
(14, 'torii_japan.jpg', 'rows of red Torii gates at Fushumi Inari-Taisha, Kyoto', 'Fushimi Inari-Taisha, Kyoto', 'JAPAN – Das Land der aufgehenden Sonne.', 'no', '2021-01-26 23:37:37'),
(15, 'nijo-castle_japan.jpg', 'the gold-decorated karamon main gate to Ninomaru Palace (Nijo Castle), Kyoto', 'Karamon Tor (Nijo Burg), Kyoto', 'JAPAN – Das Land der aufgehenden Sonne.', 'no', '2021-01-26 23:37:37');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`ID`, `username`, `email`, `password`) VALUES
(35, 'boo', 'boo@boo.com', '$2y$10$TJBtpTaswdFePO/iEPYAAuOeZqiQzu9khiGMOZQzjTJcHG4DRsoCu'),
(47, 'Jasmin', 'jasmin.fischli@outlook.com', '$2y$10$69J/RGq4DhzjyZZ5DzCj8uf02cjhw8Q1B2i9a9f/J3hKlBIbvLncy'),
(48, 'afriendofjasmin', 'afriendofjasmin@afriendofjasmin.com', '$2y$10$.1KSa6NmILY7wL2GEkww.u4RrV3pIAcRbRkjjKMGP1X/.sldFnaRe');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `content_about`
--
ALTER TABLE `content_about`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `content_blog`
--
ALTER TABLE `content_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `images_blog`
--
ALTER TABLE `images_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `content_about`
--
ALTER TABLE `content_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `content_blog`
--
ALTER TABLE `content_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT für Tabelle `images_blog`
--
ALTER TABLE `images_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
