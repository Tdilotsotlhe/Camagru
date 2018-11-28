<?php

//echo "TF";

$dbbuild = "CREATE DATABASE IF NOT EXISTS `camagru` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `camagru`; CREATE TABLE `comments` (
  `comms_id` int(255) NOT NULL,
  `friend_id` int(255) NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commtstamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `comimg_id` int(255) NOT NULL
);
INSERT INTO `comments` (`comms_id`, `friend_id`, `comment`, `commtstamp`, `comimg_id`) VALUES
(3, 1, 'asdasd', '2018-11-17 12:01:09.177055', 50),
(4, 1, 'asdasdasfgasg', '2018-11-17 12:01:13.040570', 50),
(6, 1, 'zxvzxv', '2018-11-17 15:48:45.768209', 53);CREATE TABLE `gallery` (
  `img_id` int(255) NOT NULL,
  `img_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` int(255) NOT NULL,
  `uptime` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
);INSERT INTO `gallery` (`img_id`, `img_name`, `users_id`, `uptime`) VALUES
(5, '1\$memes-face-png-2.png', 1, '2018-11-07 08:16:23.678027'),
(6, '1\$Screen Shot 2018-11-03 at 14.06.40.png', 1, '2018-11-07 08:16:29.470490'),
(7, '1\$herpderp.png', 1, '2018-11-07 08:16:41.717686'),
(8, '1\$photo-1533467915241-eac02e856653.jpeg', 1, '2018-11-09 06:11:05.491937'),
(34, '1$252.png', 1, '2018-11-09 07:32:18.585583'),
(36, '1\$cxncn.jpeg', 1, '2018-11-11 12:22:58.579997'),
(38, '1\$qq.jpeg', 1, '2018-11-11 12:24:25.339209'),
(41, '1\$penguin.png', 1, '2018-11-11 13:53:49.198904'),
(42, '1\$fgfgj.jpeg', 1, '2018-11-12 08:33:14.964764'),
(43, '1\$humb3.png', 1, '2018-11-12 08:34:33.738064'),
(44, '1\$qwrrrr.jpeg', 1, '2018-11-12 08:40:20.595940'),
(45, '1\$herpderp.png', 1, '2018-11-12 08:44:00.168454'),
(46, '1$896.png', 1, '2018-11-12 08:58:56.106535'),
(47, '1$796.png', 1, '2018-11-16 12:01:42.482771'),
(48, '1$697.png', 1, '2018-11-16 12:02:52.000300'),
(49, '1$736.png', 1, '2018-11-16 12:21:29.641423'),
(50, '1\$thumb2.png', 1, '2018-11-16 12:48:33.143507'),
(51, '1$7.png', 1, '2018-11-16 12:49:22.567953'),
(52, '1$691.png', 1, '2018-11-16 12:50:21.822799'),
(53, '1$7.png', 1, '2018-11-16 13:30:20.312155'),
(55, '1\$humb3.png', 1, '2018-11-17 12:52:08.704332'),
(57, '1\$free-png-image-39401-991.png', 1, '2018-11-17 12:54:09.930223'),
(60, '18$312.png', 18, '2018-11-17 16:03:33.691215'),
(61, '18$899.png', 18, '2018-11-17 16:03:40.731184'),
(62, '18$155.png', 18, '2018-11-17 16:03:47.904944'),
(63, '18$167.png', 18, '2018-11-17 16:03:54.902728'),
(64, '1$645.png', 1, '2018-11-18 10:36:49.786486'),
(65, '1$942.png', 1, '2018-11-18 10:38:58.657163'),
(66, '1$116.png', 1, '2018-11-18 13:38:35.371691'),
(67, '1\$thumb4.png', 1, '2018-11-18 13:38:44.688669'),
(68, '1\$cxncn.jpeg', 1, '2018-11-19 05:59:06.883976'),
(69, '1$497.png', 1, '2018-11-19 05:59:51.415922'),
(70, '1$587.png', 1, '2018-11-19 06:57:07.466662'),
(71, '1$219.png', 1, '2018-11-23 08:11:04.134048'),
(72, '1\$free-png-image-39401-991.png', 1, '2018-11-23 15:21:29.345616'); CREATE TABLE `likes` (
  `theimg_id` int(255) NOT NULL,
  `likers_id` int(255) NOT NULL,
  `likestatus` int(1) NOT NULL DEFAULT '0'
); INSERT INTO `likes` (`theimg_id`, `likers_id`, `likestatus`) VALUES
(42, 1, 1),
(50, 1, 1),
(52, 1, 0),
(57, 1, 0),
(63, 1, 1),
(68, 1, 1),
(70, 1, 0); CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passw` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(255) NOT NULL DEFAULT '0',
  `notification` int(1) NOT NULL DEFAULT '1',
  `acthash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;INSERT INTO `users` (`user_id`, `username`, `passw`, `email`, `active`, `notification`, `acthash`) VALUES
(1, 'admin', '$2y$10\$SC7z8qoY5h/buRpVljVDtu1ZF1BRkb8/2FLt17SqLJbYwpK6GYRvW', 'zdfvgfd', 0, 0, 'c9892a989183de32e976c6f04e700201'),
(18, 'test4', '$2y$10$0ADLLYjfsMhW1Un1NKocwO9ONKBZmE4XdP97fri2i16bdhnwDyNny', 'tidilotsotlhe@gmail.com', 0, 1, 'd81f9c1be2e08964bf9f24b15f0e4900'),
(19, 'new', '$2y$10\$B3ZSSMje8eagWieyQu7AZ.JI8yOoIo103A3YqdQg4AC9SUsPLS4be', 'phenom92@gmail.comasfasf', 1, 0, '443cb001c138b2561a0d90720d6ce111'),
(20, 'again', '$2y$10$./ML0BpJrI5mBava95Giqe1VmMHO8LSUM6VCcuw61.cX7ssutxMGe', 'phenom92@gmail.asfasf', 1, 0, '11b921ef080f7736089c757404650e40'),
(22, 'qwerty', '$2y$10\$jsvnaQZNXKutppQVCmoFIeSCWAu9YQQ8nnmFCxBGpNZBQ8.RIiAYy', 'phenom92@gmail.com', 1, 0, '85d8ce590ad8981ca2c8286f79f59954');

ALTER TABLE `comments`
  ADD PRIMARY KEY (`comms_id`),
  ADD KEY `comimg_id` (`comimg_id`);ALTER TABLE `gallery`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `users_id` (`users_id`);ALTER TABLE `likes`
  ADD UNIQUE KEY `likesindex` (`theimg_id`,`likers_id`),
  ADD KEY `likelink` (`likers_id`),
  ADD KEY `likedim` (`theimg_id`);ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `ugroup` (`notification`);ALTER TABLE `comments`
  MODIFY `comms_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;ALTER TABLE `gallery`
  MODIFY `img_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;ALTER TABLE `comments`
  ADD CONSTRAINT `comimglink` FOREIGN KEY (`comimg_id`) REFERENCES `gallery` (`img_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
  ALTER TABLE `likes`
  ADD CONSTRAINT `likedim` FOREIGN KEY (`theimg_id`) REFERENCES `gallery` (`img_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likelink` FOREIGN KEY (`likers_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;";



require_once "database.php";

//echo $DB_NAME;
try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASS);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

///////////

///////////

//create DB
try {
    $dbh->query($dbbuild);
 } catch (Exception $e) {
     die("db creation failed!");
 }

 //select DB
 try {
    $dbh->query("USE ".$DB_NAME);
 } catch (Exception $e) {
     die("db creation failed!");
 } 
echo "<script>location.replace('../index.php');</script>";
 //create user table
 /* try {
    $dbh->query("CREATE TABLE `users` (
        `user_id` int(255) NOT NULL,
        `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `passw` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `active` int(255) NOT NULL DEFAULT '0',
        `notification` int(1) NOT NULL DEFAULT '1',
        `acthash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");

 } catch (Exception $e) {
     die("users failed");
 } 

 try {
    $dbh->query("INSERT INTO `users` (`user_id`, `username`, `passw`, `email`, `active`, `notification`, `acthash`) VALUES
    (1, 'admin', '$2y$10\$SC7z8qoY5h/buRpVljVDtu1ZF1BRkb8/2FLt17SqLJbYwpK6GYRvW', 'zdfvgfd', 0, 0, 'c9892a989183de32e976c6f04e700201');
    ");

 } catch (Exception $e) {
     die("users failed");
 } 









//create gallery table
 try {
    $dbh->query("CREATE TABLE `gallery` (
        `img_id` int(255) NOT NULL,
        `img_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `users_id` int(255) NOT NULL,
        `uptime` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
      ");
 } catch (Exception $e) {
     die("galleryfailed!");
 }

 try {
    $dbh->query("INSERT INTO `gallery` (`img_id`, `img_name`, `users_id`, `uptime`) VALUES
    (5, '1\$memes-face-png-2.png', 1, '2018-11-07 08:16:23.678027'),
    (6, '1\$Screen Shot 2018-11-03 at 14.06.40.png', 1, '2018-11-07 08:16:29.470490'),
    (7, '1\$herpderp.png', 1, '2018-11-07 08:16:41.717686'),
    (8, '1\$photo-1533467915241-eac02e856653.jpeg', 1, '2018-11-09 06:11:05.491937'),
    (34, '1$252.png', 1, '2018-11-09 07:32:18.585583'),
    (36, '1\$cxncn.jpeg', 1, '2018-11-11 12:22:58.579997'),
    (38, '1\$qq.jpeg', 1, '2018-11-11 12:24:25.339209'),
    (41, '1\$penguin.png', 1, '2018-11-11 13:53:49.198904'),
    (42, '1\$fgfgj.jpeg', 1, '2018-11-12 08:33:14.964764'),
    (43, '1\$humb3.png', 1, '2018-11-12 08:34:33.738064'),
    (44, '1\$qwrrrr.jpeg', 1, '2018-11-12 08:40:20.595940'),
    (45, '1\$herpderp.png', 1, '2018-11-12 08:44:00.168454'),
    (46, '1$896.png', 1, '2018-11-12 08:58:56.106535'),
    (47, '1$796.png', 1, '2018-11-16 12:01:42.482771'),
    (48, '1$697.png', 1, '2018-11-16 12:02:52.000300'),
    (49, '1$736.png', 1, '2018-11-16 12:21:29.641423'),
    (50, '1\$thumb2.png', 1, '2018-11-16 12:48:33.143507'),
    (51, '1$7.png', 1, '2018-11-16 12:49:22.567953'),
    (52, '1$691.png', 1, '2018-11-16 12:50:21.822799'),
    (53, '1$7.png', 1, '2018-11-16 13:30:20.312155'),
    (55, '1\$humb3.png', 1, '2018-11-17 12:52:08.704332'),
    (57, '1\$free-png-image-39401-991.png', 1, '2018-11-17 12:54:09.930223'),
    (60, '18$312.png', 18, '2018-11-17 16:03:33.691215'),
    (61, '18$899.png', 18, '2018-11-17 16:03:40.731184'),
    (62, '18$155.png', 18, '2018-11-17 16:03:47.904944'),
    (63, '18$167.png', 18, '2018-11-17 16:03:54.902728'),
    (64, '1$645.png', 1, '2018-11-18 10:36:49.786486'),
    (65, '1$942.png', 1, '2018-11-18 10:38:58.657163'),
    (66, '1$116.png', 1, '2018-11-18 13:38:35.371691'),
    (67, '1\$thumb4.png', 1, '2018-11-18 13:38:44.688669'),
    (68, '1\$cxncn.jpeg', 1, '2018-11-19 05:59:06.883976'),
    (69, '1$497.png', 1, '2018-11-19 05:59:51.415922'),
    (70, '1$587.png', 1, '2018-11-19 06:57:07.466662'),
    (71, '1$219.png', 1, '2018-11-23 08:11:04.134048'),
    (72, '1\$free-png-image-39401-991.png', 1, '2018-11-23 15:21:29.345616');");
 } catch (Exception $e) {
     die("galleryfailed!");
 }


 //create comments table
 try {
    $dbh->query("CREATE TABLE `comments` (
        `comms_id` int(255) NOT NULL,
        `friend_id` int(255) NOT NULL,
        `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
        `commtstamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
        `comimg_id` int(255) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");
 } catch (Exception $e) {
     die("comments failed!");
 }

 try {
    $dbh->query("CREATE TABLE `likes` (
        `theimg_id` int(255) NOT NULL,
        `likers_id` int(255) NOT NULL,
        `likestatus` int(1) NOT NULL DEFAULT '0'
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");
 } catch (Exception $e) {
     die("db creation failed!");
 } 

 header("Location: ../index.php");

 //close connection?
 //$dbh = NULL;
//alter tables
 try {
    $dbh->query("CREATE TABLE `likes` (
        `theimg_id` int(255) NOT NULL,
        `likers_id` int(255) NOT NULL,
        `likestatus` int(1) NOT NULL DEFAULT '0'
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");
 } catch (Exception $e) {
     die("db creation failed!");
 } 



/////alters

try {
    $dbh->query("ALTER TABLE `comments`
    ADD PRIMARY KEY (`comms_id`),
    ADD KEY `comimg_id` (`comimg_id`);ALTER TABLE `gallery`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `users_id` (`users_id`);");
 } catch (Exception $e) {
     die("db creation failed!");
 }  */

?>