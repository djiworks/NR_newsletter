INSERT INTO `university` (`id_university`, `name`, `address`, `country`, `subscription`, `checking_state`, `comment`) VALUES
(1, 'ESIROI', 'La reunion', 'France', NULL, 0, NULL),
(2, 'Université de Paris III', 'Paris', 'France', NULL, 1, NULL),
(3, 'Université de Bordeaux II', 'Bordeaux', 'France', NULL, 2, NULL),
(4, 'Universidad de Cristobal', 'Madrid', 'Spain', NULL, 3, NULL),
(5, 'Universidad de PortoPaga', 'Millan', 'Italy', NULL, 0, NULL);

INSERT INTO `newsletter` (`id_newsletter`, `type`, `name`, `description`, `path`, `creation_date`, `cover`, `checking_state`, `content`, `comment`) VALUES
(1, 0, 'First Newsletter', 'First newsletter to send to universities', '/92data/marketing/newsletter', '2013-07-22', '/img/toto/cover.jpg', 0, '/92data/marketing/newsletter', NULL),
(2, 0, 'July Newsletter', 'July news', '/92data/marketing/newsletter', '2013-07-22', '/img/toto/cover.jpg', 1, '/92data/marketing/newsletter', NULL),
(3, 1, 'First Intern Newsletter', 'First Intern Newsletter', '/92data/marketing/newsletter', '2013-07-25', '/img/toto/cover.jpg', 0, '/92data/marketing/newsletter', NULL);

INSERT INTO `person` (`id_person`, `first_name`, `last_name`, `phone`, `mail`, `country`, `worked_until`) VALUES
(1, 'Djothi', 'Grondin', '0634859671', 'djothi.grondin@outlook.com', 'France', '2013-08-09'),
(2, 'Bazire', 'Houssin', '0352169800', 'enVoitureSimone@gmail.com', 'France', NULL),
(3, 'Alexis', 'De Marinis', '0635982145', 'alex@terieur.com', 'Spain', '2013-08-27'),
(4, 'Isabelle', 'Touchefeu', '0655321484', 'ducks@couack.co', 'Greece', '2013-10-31');

INSERT INTO `user` (`id_user`, `login`, `password`, `id_role`) VALUES
(1, 'alexis', '$1$IZ2.x1..$pgJ.lDkEay/66ZTZCPCZx.', 2),
(2, 'bazire', '$1$IZ2.x1..$pgJ.lDkEay/66ZTZCPCZx.', 1),
(3, 'djothi', '$1$IZ2.x1..$pgJ.lDkEay/66ZTZCPCZx.', 3),
(4, 'oumnia', '$1$IZ2.x1..$pgJ.lDkEay/66ZTZCPCZx.', 4),
(5, 'vittorio', '$1$IZ2.x1..$pgJ.lDkEay/66ZTZCPCZx.', 5);

INSERT INTO `contact` (`id_contact`, `information`, `id_university`) VALUES
(1, 'International Partnership Manager', 1),
(2, 'International Partnership Manager', 3),
(3, 'International Partnership Manager', 4),
(4, 'Internship Manager', 1),
(5, 'Standard', 2),
(6, 'Standard', 1),
(7, 'Standard', 5);

INSERT INTO `mail` (`id_mail`, `mail`, `id_contact`) VALUES
(1, 'contact6@mail1.com', 6),
(2, 'contact7@mail1.com', 7),
(3, 'contact6@mail2.com', 6),
(4, 'contact2@mail1.com', 2),
(5, 'contact4@mail1.com', 4),
(6, 'contact4@mail2.com', 4);

INSERT INTO `phone` (`id_phone`, `number`, `type`, `id_contact`) VALUES
(1, '1000000301', 0, 3),
(2, '2010000501', 1, 5),
(3, '3000000401', 0, 4),
(4, '4010000101', 1, 1),
(5, '5010000302', 1, 3),
(6, '6000000502', 0, 5);

INSERT INTO `recommended_by` (`id_person`, `id_university`, `is_student`) VALUES
(1, 1, 1),
(1, 2, 0),
(2, 4, 0),
(3, 4, 1),
(3, 5, 0),
(4, 3, 1);

INSERT INTO `sent_newsletter_person` (`id_newsletter`, `id_person`, `sending_date`) VALUES
(3, 2, '2013-07-27 11:33:04'),
(3, 3, '2013-07-19 11:33:01');

INSERT INTO `sent_newsletter_university` (`id_university`, `id_newsletter`, `sending_date`) VALUES
(1, 1, '2013-07-24 11:26:51'),
(1, 2, '2013-07-31 11:27:30'),
(3, 1, '2013-07-10 11:27:54'),
(4, 1, '2013-07-20 11:27:47');



