-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2022 at 05:24 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `ad_id` varchar(255) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `ad_id`, `pass`, `name`) VALUES
(2, '6297906377', 'abcd', 'Anirban'),
(3, '8670945022', 'babulal@dash', 'Babulal Dash');

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `Cat_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`Cat_id`, `Name`) VALUES
(1, 'Java'),
(2, 'C'),
(3, 'C++'),
(4, 'Python'),
(11, 'Javascrpit');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `us_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `file_name`, `us_id`) VALUES
(13, 'vue-color-avatar.png', 12),
(14, 'User-Profile.png', 13),
(15, 'Pranav.jpg', 14);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `op_id` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `q_id` int(11) DEFAULT NULL,
  `op_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`op_id`, `answer`, `q_id`, `op_no`) VALUES
(5, '6', 2, 1),
(6, '7', 2, 2),
(7, '8', 2, 3),
(8, '9', 2, 4),
(9, 'Byte to int', 3, 1),
(10, 'Int to Long', 3, 2),
(11, 'Long to int', 3, 3),
(12, 'Short to Int', 3, 4),
(13, 'Wick van Rossum', 4, 1),
(14, 'Rasmus Lerdorf', 4, 2),
(15, 'Guido van Rossum', 4, 3),
(16, 'Niene Stom', 4, 4),
(29, ' int $main;', 8, 1),
(30, 'int number;', 8, 2),
(31, 'float rate;', 8, 3),
(32, 'int variable_count;', 8, 4),
(33, ' true', 9, 1),
(34, 'false', 9, 2),
(35, 'depends on the compiler', 9, 3),
(36, 'depends on the standard', 9, 4),
(37, 'Internal', 10, 1),
(38, 'External', 10, 2),
(39, 'Both Internal and External', 10, 3),
(40, 'External and Internal are not valid terms for functions', 10, 4),
(41, '2', 11, 1),
(42, 'True', 11, 2),
(43, '1', 11, 3),
(44, '0', 11, 4),
(45, 'stdlib. h', 12, 1),
(46, 'ctype. h', 12, 2),
(47, 'stdio. h', 12, 3),
(48, 'stdarg. h', 12, 4),
(49, ',', 13, 1),
(50, 'sizeof()', 13, 2),
(51, '`', 13, 3),
(52, 'None of the mentioned', 13, 4),
(53, '1 bit', 14, 1),
(54, '2 bits', 14, 2),
(55, '1 Byte', 14, 3),
(56, '2 Bytes', 14, 4),
(57, ' int', 15, 1),
(58, 'char *', 15, 2),
(59, 'struct', 15, 3),
(60, 'None of the mentioned', 15, 4),
(61, 'Standard input', 16, 1),
(62, 'Standard output', 16, 2),
(63, 'Standard error', 16, 3),
(64, 'All of the mentioned', 16, 4),
(65, 'stdio.h ', 17, 1),
(66, 'stdlib.h', 17, 2),
(67, 'math.h', 17, 3),
(68, 'stdarg.h', 17, 4),
(69, 'char *', 18, 1),
(70, 'struct', 18, 2),
(71, 'void', 18, 3),
(72, 'none of the mentioned', 18, 4),
(73, 'Jagged Array', 19, 1),
(74, 'Rectangular Array', 19, 2),
(75, 'Cuboidal Array', 19, 3),
(76, 'Multidimensional Array', 19, 4),
(77, '7', 20, 1),
(78, '127', 20, 2),
(79, '255', 20, 3),
(80, 'No limits', 20, 4),
(81, 'When former is used, current directory is searched and when latter is used, standard directory is searched', 21, 1),
(82, ' When former is used, standard directory is searched and when latter is used, current directory is searched', 21, 2),
(83, 'When former is used, search is done in implementation defined manner and when latter is used, current directory is searched', 21, 3),
(84, 'For both, search for ‘somelibrary’ is done in implementation-defined places', 21, 4),
(85, '#', 22, 1),
(86, '$', 22, 2),
(87, '', 22, 3),
(88, '&', 22, 4),
(89, '.js', 23, 1),
(90, '.txt', 23, 2),
(91, '.class', 23, 3),
(92, '.java', 23, 4),
(93, 'Polymorphism', 24, 1),
(94, 'Inheritance', 24, 2),
(95, 'Compilation', 24, 3),
(96, 'Encapsulation', 24, 4),
(97, 'Referring to the instance variable when a local variable has the same name', 25, 1),
(98, 'Passing itself to the method of the same class', 25, 2),
(99, 'Passing itself to another method', 25, 3),
(100, 'Calling another constructor in constructor chaining', 25, 4),
(101, ' Multiple polymorphism', 26, 1),
(102, 'Compile time polymorphism', 26, 2),
(103, 'Multilevel polymorphism', 26, 3),
(104, ' Execution time polymorphism', 26, 4),
(105, 'Floating-point value assigned to a Floating type', 27, 1),
(106, 'Floating-point value assigned to an integer type', 27, 2),
(107, 'Integer value assigned to floating type', 27, 3),
(108, 'Integer value assigned to floating type', 27, 4),
(109, '.txt', 28, 1),
(110, '.java', 28, 2),
(111, '.js', 28, 3),
(112, '.class', 28, 4),
(113, 'MemoryError', 29, 1),
(114, 'OutOfMemoryError', 29, 2),
(115, 'MemoryOutOfBoundsException', 29, 3),
(116, 'MemoryFullException', 29, 4),
(117, ' break', 30, 1),
(118, 'continue', 30, 2),
(119, 'for()', 30, 3),
(120, 'if()', 30, 4),
(121, 'intf', 31, 1),
(122, 'intface', 31, 2),
(123, 'Interface', 31, 3),
(124, 'interface', 31, 4),
(125, 'ArrayList', 32, 1),
(126, 'Abstract class', 32, 2),
(127, 'Object class', 32, 3),
(128, 'String', 32, 4),
(129, ' JProfiler', 33, 1),
(130, 'Eclipse Profiler', 33, 2),
(131, 'JVM', 33, 3),
(132, 'JConsole', 33, 4),
(133, 'java.io', 34, 1),
(134, ' java.system', 34, 2),
(135, 'java.lang', 34, 3),
(136, 'java.util', 34, 4),
(137, 'start() method is used to begin execution of the thread', 35, 1),
(138, 'run() method is used to begin execution of a thread before start() method in special cases', 35, 2),
(139, 'A thread can be formed by implementing Runnable interface only', 35, 3),
(140, ' A thread can be formed by a class that extends Thread class', 35, 4),
(141, 'Protected', 36, 1),
(142, 'Void', 36, 2),
(143, 'Public', 36, 3),
(144, 'Private', 36, 4),
(145, '0 to 256', 37, 1),
(146, ' -128 to 127', 37, 2),
(147, '0 to 65535', 37, 3),
(148, '0 to 32767', 37, 4),
(149, 'Servlets can use the full functionality of the Java class libraries', 38, 1),
(150, 'Servlets execute within the address space of web server, platform independent and uses the functionality of java class libraries', 38, 2),
(151, 'Servlets execute within the address space of web server', 38, 3),
(152, 'Servlets are platform-independent because they are written in java', 38, 4),
(153, ' At run time', 39, 1),
(154, 'At compile time', 39, 2),
(155, 'At coding time', 39, 3),
(156, 'At execution time', 39, 4),
(157, 'Compile time polymorphism', 40, 1),
(158, 'Execution time polymorphism', 40, 2),
(159, 'Multiple polymorphism', 40, 3),
(160, 'Multilevel polymorphism', 40, 4),
(321, '\'/*This comment has more than one line*/\'', 81, 1),
(322, '\'<!--This comment has more than one line-->\'', 81, 2),
(323, '\'//This comment has more than one line//\'', 81, 3),
(324, '\'null\'', 81, 4),
(325, '\'/*This comment has more than one line*/\'', 82, 1),
(326, '\'<!--This comment has more than one line-->\'', 82, 2),
(327, '\'//This comment has more than one line//\'', 82, 3),
(328, '\'null\'', 82, 4),
(329, '\'//This is a comment\'', 83, 1),
(330, '\'\'This is a comment\'', 83, 2),
(331, '\'<!--This is a comment-->\'', 83, 3),
(332, '\'null\'', 83, 4),
(333, '\'var colors = 1 = (\"red\"), 2 = (\"green\"), 3 = (\"blue\")\'', 84, 1),
(334, '\'var colors = \"red\", \"green\", \"blue\"\'', 84, 2),
(335, '\'var colors = [\"red\", \"green\", \"blue\"]\'', 84, 3),
(336, '\'var colors = (1:\"red\", 2:\"green\", 3:\"blue\")\'', 84, 4),
(337, '\'if (i != 5)\'', 85, 1),
(338, '\'if (i <> 5)\'', 85, 2),
(339, '\'if i =! 5 then\'', 85, 3),
(340, '\'if i <> 5\'', 85, 4),
(341, '\'browser.name\'', 86, 1),
(342, '\'navigator.appName\'', 86, 2),
(343, '\'client.navName\'', 86, 3),
(344, '\'null\'', 86, 4),
(345, '\'<javascript>\'', 87, 1),
(346, '\'<script>\'', 87, 2),
(347, '\'<js>\'', 87, 3),
(348, '\'<scripting>\'', 87, 4),
(349, '\'v carName;\'', 88, 1),
(350, '\'variable carName;\'', 88, 2),
(351, '\'var carName;\'', 88, 3),
(352, '\'null\'', 88, 4),
(353, '\'Math.round(7.25)\'', 89, 1),
(354, '\'round(7.25)\'', 89, 2),
(355, '\'rnd(7.25)\'', 89, 3),
(356, '\'Math.rnd(7.25)\'', 89, 4),
(357, '\'The <head> section\'', 90, 1),
(358, '\'The <body> section\'', 90, 2),
(359, '\'The <footer>\'', 90, 3),
(360, '\'Both the <head> section and the <body> section are correct\'', 90, 4),
(361, '\'x\'', 91, 1),
(362, '\'-\'', 91, 2),
(363, '\'=\'', 91, 3),
(364, '\'*\'', 91, 4),
(365, '\'while (i <= 10)\'', 92, 1),
(366, '\'while i = 1 to 10\'', 92, 2),
(367, '\'while (i <= 10; i  )\'', 92, 3),
(368, '\'null\'', 92, 4),
(369, '\'if i = 5 then\'', 93, 1),
(370, '\'if i = 5\'', 93, 2),
(371, '\'if i == 5 then\'', 93, 3),
(372, '\'if (i == 5)\'', 93, 4),
(373, '\'for i = 1 to 5\'', 94, 1),
(374, '\'for (i = 0; i <= 5; i  )\'', 94, 2),
(375, '\'for (i <= 5; i  )\'', 94, 3),
(376, '\'for (i = 0; i <= 5)\'', 94, 4),
(377, '\'onchange\'', 95, 1),
(378, '\'onmouseclick\'', 95, 2),
(379, '\'onmouseover\'', 95, 3),
(380, '\'onclick\'', 95, 4),
(381, '\'w2 = window.new(', 96, 1),
(382, '\'w2 = window.open(', 96, 2),
(383, '\'null\'', 96, 3),
(384, '\'null\'', 96, 4),
(385, '\'<script name=\"xxx.js\">\'', 97, 1),
(386, '\'<script src=\"xxx.js\">\'', 97, 2),
(387, '\'<script href=\"xxx.js\">\'', 97, 3),
(388, '\'<script declare=\"xxx.js\">\'', 97, 4),
(389, '\'myFunction()\'', 98, 1),
(390, '\'call myFunction()\'', 98, 2),
(391, '\'call function myFunction()\'', 98, 3),
(392, '\'null\'', 98, 4),
(393, '\'False\'', 99, 1),
(394, '\'True\'', 99, 2),
(395, '\'null\'', 99, 3),
(396, '\'null\'', 99, 4),
(397, '\'ceil(x, y)\'', 100, 1),
(398, '\'Math.ceil(x, y)\'', 100, 2),
(399, '\'Math.max(x, y)\'', 100, 3),
(400, '\'top(x, y)\'', 100, 4),
(401, '\'True\'', 101, 1),
(402, '\'False\'', 101, 2),
(403, '\'null\'', 101, 3),
(404, '\'null\'', 101, 4),
(405, 'Throws an error', 102, 1),
(406, 'Ignores the statement', 102, 2),
(407, 'Gives a warning', 102, 3),
(408, 'None of these', 102, 4),
(409, 'abcd', 103, 1),
(410, 'dcba', 103, 2),
(411, 'cbad', 103, 3),
(412, 'cabd', 103, 4),
(417, '3', 105, 1),
(418, '26', 105, 2),
(419, '10', 105, 3),
(420, '21', 105, 4),
(421, 'multiple variables having the same memory location', 106, 1),
(422, 'multiple variables having the same value', 106, 2),
(423, 'multiple variables having the same identifier', 106, 3),
(424, 'multiple uses of the same variable', 106, 4),
(425, ' Do not differ', 107, 1),
(426, 'Differ in the presence of loops', 107, 2),
(427, 'Differ in all cases', 107, 3),
(428, 'May differ in the presence of exceptions', 107, 4),
(429, 'A context free language', 108, 1),
(430, 'A context sensitive language', 108, 2),
(431, 'A regular language', 108, 3),
(432, ' Parsable fully only by a Turing machine', 108, 4),
(433, 'C++ is an object oriented programming language', 109, 1),
(434, ' C++ is a procedural programming language', 109, 2),
(435, 'C++ supports both procedural and object oriented programming language', 109, 3),
(436, 'C++ is a functional programming language', 109, 4),
(437, 'hg', 110, 1),
(438, 'cp', 110, 2),
(439, 'cpp', 110, 3),
(440, 'c', 110, 4),
(441, 'VAR_1234', 111, 1),
(442, '$var_name', 111, 2),
(443, '7VARNAME', 111, 3),
(444, '7VAR_NAME', 111, 4),
(445, 'Default constructor', 112, 1),
(446, 'Parameterized constructor', 112, 2),
(447, 'Copy constructor', 112, 3),
(448, 'Friend constructor', 112, 4),
(449, 'Left-right', 113, 1),
(450, 'Right-left', 113, 2),
(451, 'Bottom-up', 113, 3),
(452, 'Top-down', 113, 4),
(453, 'double', 114, 1),
(454, ' float', 114, 2),
(455, 'int', 114, 3),
(456, 'bool', 114, 4),
(457, 'Binary', 115, 1),
(458, 'VTC', 115, 2),
(459, 'Text', 115, 3),
(460, 'ISCII', 115, 4),
(461, 'array{10};', 116, 1),
(462, 'array array[10];', 116, 2),
(463, 'int array;', 116, 3),
(464, 'int array[10];', 116, 4),
(465, 'Based on the number of bits in the system', 117, 1),
(466, '2 or 4', 117, 2),
(467, '4', 117, 3),
(468, '2', 117, 4),
(469, ' r distinguishes between comments and inner data', 118, 1),
(470, 'distinguishes between comments and outer data', 118, 2),
(471, 'distinguishes between comments and code', 118, 3),
(472, ' r distinguishes between comments and outer data', 118, 4),
(473, 'Capitalized', 119, 1),
(474, 'lower case', 119, 2),
(475, 'UPPER CASE', 119, 3),
(476, 'None of the mentioned', 119, 4),
(477, 'Indentation', 120, 1),
(478, 'Key', 120, 2),
(479, 'Brackets', 120, 3),
(480, 'All of the mentioned', 120, 4),
(481, 'Function', 121, 1),
(482, 'Def', 121, 2),
(483, 'Fun', 121, 3),
(484, 'Define', 121, 4),
(485, '#', 122, 1),
(486, '!', 122, 2),
(487, '//', 122, 3),
(488, '!*', 122, 4),
(489, 'pi', 123, 1),
(490, 'anonymous', 123, 2),
(491, 'lambda', 123, 3),
(492, 'none of the mentioned', 123, 4),
(493, 'Exponential, Parentheses, Multiplication, Division, Addition, Subtraction', 124, 1),
(494, 'Exponential, Parentheses, Division, Multiplication, Addition, Subtraction', 124, 2),
(495, 'Parentheses, Exponential, Multiplication, Division, Subtraction, Addition', 124, 3),
(496, 'Parentheses, Exponential, Multiplication, Division, Addition, Subtraction', 124, 4),
(497, '4', 125, 1),
(498, '2', 125, 2),
(499, '1', 125, 3),
(500, '8', 125, 4),
(501, '512, 64, 512', 126, 1),
(502, '512, 512, 512', 126, 2),
(503, '64, 512, 64', 126, 3),
(504, '64, 64, 64', 126, 4),
(505, '|', 127, 1),
(506, '/', 127, 2),
(507, '//', 127, 3),
(508, '%', 127, 4),
(509, 'Global variable', 128, 1),
(510, 'The local element', 128, 2),
(511, 'The two of the above', 128, 3),
(512, 'None of the above', 128, 4),
(513, 'Preprocessor', 129, 1),
(514, 'Triggering Event', 129, 2),
(515, 'RMI', 129, 3),
(516, 'Function/Method', 129, 4);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `catagory` varchar(255) DEFAULT NULL,
  `correct` int(11) DEFAULT NULL,
  `sets` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `title`, `catagory`, `correct`, `sets`) VALUES
(2, 'Number of primitive data types in Java are?', '1', 3, 1),
(3, ' Automatic type conversion is possible in which of the possible cases?', '1', 2, 1),
(4, 'Who developed Python Programming Language?', '4', 3, 1),
(8, 'Which of the following is not a valid C variable name?', '2', 1, 1),
(9, 'Functions can return enumeration constants in C?', '2', 1, 1),
(10, 'Functions in C Language are always _________', '2', 2, 1),
(11, 'What is the output :  (x = foo())!= 1 considering foo() returns 2', '2', 1, 1),
(12, ' scanf() is a predefined function in______header file.', '2', 3, 1),
(13, 'Which of the following is not an operator in C?', '2', 4, 1),
(14, 'What is the sizeof(char) in a 32-bit C compiler?', '2', 3, 1),
(15, 'In C language, FILE is of which data type?', '2', 3, 1),
(16, 'When a C program is started, O.S environment is responsible for opening file and providing pointer for that file?', '2', 4, 1),
(17, 'The standard header _______ is used for variable list arguments (…) in C.', '2', 4, 1),
(18, 'Which of the following return-type cannot be used for a function in C?', '2', 4, 4),
(19, 'Which of the following is not possible statically in C language?', '2', 1, 4),
(20, 'How many number of pointer (*) does C have against a pointer variable declaration?', '2', 4, 4),
(21, 'How is search done in #include and #include “somelibrary.h” according to C standard?', '2', 4, 4),
(22, ' The C-preprocessors are specified with _________ symbol.', '2', 1, 4),
(23, 'What is the extension of java code files?', '1', 4, 1),
(24, 'Which of the following is not an OOPS concept in Java', '1', 3, 1),
(25, 'What is not the use of “this” keyword in Java?', '1', 2, 1),
(26, ' Which of the following is a type of polymorphism in Java Programming?', '1', 2, 1),
(27, 'What is Truncation in Java?', '1', 2, 1),
(28, 'What is the extension of compiled java classes?', '1', 4, 1),
(29, 'Which exception is thrown when java is out of memory?', '1', 2, 1),
(30, ' Which of these are selection statements in Java?', '1', 4, 1),
(31, 'Which of these keywords is used to define interfaces in Java?', '1', 4, 4),
(32, 'Which of the following is a superclass of every class in Java?', '1', 3, 4),
(33, ' Which of the below is not a Java Profiler?', '1', 3, 4),
(34, 'Which of these packages contains the exception Stack Overflow in Java?', '1', 3, 4),
(35, 'Which of these statements is incorrect about Thread?', '1', 2, 4),
(36, 'Which one of the following is not an access modifier?', '1', 2, 4),
(37, 'What is the numerical range of a char data type in Java?', '1', 3, 4),
(38, 'Which of the following is true about servlets?', '1', 2, 4),
(39, 'When does method overloading is determined?', '1', 2, 4),
(40, 'Which of the following is a type of polymorphism in Java?', '1', 1, 4),
(82, '\'How to insert a comment that has more than one line?\'', '11', 1, 1),
(84, '\'What is the correct way to write a JavaScript array?\'', '11', 3, 1),
(85, '\'How to write an IF statement for executing some code if \"i\" is NOT equal to 5?\'', '11', 1, 1),
(86, '\'How can you detect the client\'s browser name?\'', '11', 2, 1),
(88, '\'How do you declare a JavaScript variable?\'', '11', 3, 1),
(89, '\'How do you round the number 7.25, to the nearest integer?\'', '11', 1, 1),
(90, '\'Where is the correct place to insert a JavaScript?\'', '11', 4, 1),
(91, '\'Which operator is used to assign a value to a variable?\'', '11', 3, 1),
(92, '\'How does a WHILE loop start?\'', '11', 1, 1),
(93, '\'How to write an IF statement in JavaScript?\'', '11', 4, 1),
(94, '\'How does a FOR loop start?\'', '11', 2, 4),
(95, '\'Which event occurs when the user clicks on an HTML element?\'', '11', 4, 4),
(96, '\'What is the correct JavaScript syntax for opening a new window called ', '11', 2, 4),
(98, '\'How do you call a function named ', '11', 1, 4),
(99, '\'JavaScript is the same as Java.\'', '11', 1, 4),
(100, '\'How do you find the number with the highest value of x and y?\'', '11', 3, 4),
(101, '\'Is JavaScript case-sensitive?\'', '11', 1, 4),
(102, 'Upon encountering empty statements, what does the Javascript Interpreter do?', '11', 2, 4),
(103, 'A program attempts to generate as many permutations as possible of the string, \'abcd\' by pushing the characters a, b, c, d in the same order onto a stack, but it may pop off the top character at any time. Which one of the following strings CANNOT be gener', '2', 4, 4),
(105, 'printf(', '2', 3, 4),
(106, 'Aliasing in the context of programming languages refers to', '2', 1, 4),
(107, 'The- results returned by functions under value-result and reference parameter passing conventions', '2', 4, 4),
(108, 'The C language is', '2', 2, 4),
(109, 'What is C++?', '3', 3, 1),
(110, 'Which of the following user-defined header file extension used in c++?', '3', 3, 1),
(111, 'Which of the following is a correct identifier in C++?', '3', 1, 1),
(112, 'Which of the following is not a type of Constructor in C++?', '3', 4, 1),
(113, 'Which of the following approach is used by C++?', '3', 3, 1),
(114, 'Which of the following type is provided by C++ but not C?', '3', 4, 1),
(115, 'By default, all the files in C++ are opened in _________ mode.', '3', 3, 1),
(116, ' Which of the following correctly declares an array in C++?', '3', 4, 1),
(117, 'What is the size of wchar_t in C++?', '3', 1, 1),
(118, 'What is the use of the indentation in c++?', '3', 3, 1),
(119, 'All keywords in Python are in _________', '4', 4, 1),
(120, 'Which of the following is used to define a block of code in Python language?', '4', 1, 1),
(121, 'Which keyword is used for function in Python language?', '4', 2, 1),
(122, 'Which of the following character is used to give single-line comments in Python?', '4', 1, 1),
(123, 'Python supports the creation of anonymous functions at runtime, using a construct called', '4', 3, 1),
(124, 'What is the order of precedence in python?', '4', 4, 1),
(125, 'What will be the output of the following Python code snippet if x=1: x<<2', '4', 1, 1),
(126, 'What are the values of the following Python expressions : 2**(3**2),(2**3)**2,2**3**2', '4', 1, 1),
(127, 'Which of the following is the truncation division operator in Python?', '4', 3, 1),
(128, 'Which of the following variables takes precedence over the others if the names are the same?', '11', 2, 4),
(129, 'Which one of the following is the correct way for calling the JavaScript code?', '11', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sample_op`
--

CREATE TABLE `sample_op` (
  `op_id` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `q_id` varchar(255) DEFAULT NULL,
  `op_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sample_op`
--

INSERT INTO `sample_op` (`op_id`, `answer`, `q_id`, `op_no`) VALUES
(1, 'Object Reference', '1', 1),
(2, 'Objects', '1', 2),
(3, 'Primitive Datatype', '1', 3),
(4, 'None', '1', 4),
(5, 'Wick van Rossum', '2', 1),
(6, 'Rasmus Lerdorf', '2', 2),
(7, 'Guido van Rossum', '2', 3),
(8, 'Niene Stom', '2', 4),
(9, 'object-oriented programming', '3', 1),
(10, 'structured programming', '3', 2),
(11, 'functional programming', '3', 3),
(12, 'all of the mentioned', '3', 4),
(13, ' .python', '4', 1),
(14, ' .pl', '4', 2),
(15, '.py', '4', 3),
(16, '.p', '4', 4),
(17, 'Steve Jobs', '5', 1),
(18, 'James Gosling', '5', 2),
(19, 'Dennis Ritchie', '5', 3),
(20, 'Rasmus Lerdorf', '5', 4),
(21, 'int number;', '6', 1),
(22, 'float rate;', '6', 2),
(23, 'int variable_count;', '6', 3),
(24, 'int $main;', '6', 4),
(25, 'LowerCase letters', '7', 1),
(26, 'UpperCase letters', '7', 2),
(27, 'CamelCase letters', '7', 3),
(28, 'None of the mentioned', '7', 4),
(29, 'Dennis Ritchie', '8', 1),
(30, 'Ken Thompson', '8', 2),
(31, 'Brian Kernighan', '8', 3),
(32, 'Bjarne Stroustrup', '8', 4),
(33, '#include [userdefined]', '9', 1),
(34, '#include “userdefined”', '9', 2),
(35, '#include <userdefined.h>', '9', 3),
(36, '#include <userdefined>', '9', 4),
(37, '/* comment */', '10', 1),
(38, '// comment */', '10', 2),
(39, '// comment', '10', 3),
(40, 'both // comment or /* comment */', '10', 4),
(41, ' JRE', '11', 1),
(42, 'JIT', '11', 2),
(43, 'JDK', '11', 3),
(44, 'JVM', '11', 4),
(45, 'Object-oriented', '12', 1),
(46, 'Use of pointers', '12', 2),
(47, 'Portable', '12', 3),
(48, 'Dynamic and Extensible', '12', 4),
(49, 'JavaScript variable names must begin with a letter or the underscore character.', '13', 1),
(50, ' JavaScript variable names are case sensitive.', '13', 2),
(51, 'Both of the above.', '13', 3),
(52, 'None of the above.', '13', 4),
(53, 'Using args.length property', '14', 1),
(54, 'Using arguments.length property', '14', 2),
(55, 'Both of the above.', '14', 3),
(56, 'None of the above.', '14', 4),
(57, 'getIndex()', '15', 1),
(58, ' location()', '15', 2),
(59, 'indexOf()', '15', 3),
(60, 'None of the above.', '15', 4),
(61, 'changeOrder(order)', '16', 1),
(62, 'order()', '16', 2),
(63, 'sort()', '16', 3),
(64, 'None of the above.', '16', 4),
(65, 'Methods', '17', 1),
(66, 'Variables', '17', 2),
(67, 'Interfaces', '17', 3),
(68, 'All the above', '17', 4),
(69, '16', '18', 1),
(70, '32', '18', 2),
(71, '64', '18', 3),
(72, 'None of these above', '18', 4),
(73, 'C compiler', '19', 1),
(74, 'Interactive debugger', '19', 2),
(75, 'Analyzing tool', '19', 3),
(76, 'C interpreter', '19', 4),
(77, 'Pure Object oriented', '20', 1),
(78, 'Not Object oriented', '20', 2),
(79, 'Semi Object-oriented or Partial Object-oriented', '20', 3),
(80, 'None of the above', '20', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sample_ques`
--

CREATE TABLE `sample_ques` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `catagory` varchar(255) DEFAULT NULL,
  `correct` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sample_ques`
--

INSERT INTO `sample_ques` (`id`, `title`, `catagory`, `correct`) VALUES
(1, ' Arrays in java are-', '1', 2),
(2, 'Who developed Python Programming Language?', '4', 3),
(3, 'Which type of Programming does Python support?', '4', 4),
(4, 'Which of the following is the correct extension of the Python file?', '4', 3),
(5, 'Who is the father of C language?', '2', 3),
(6, 'Which of the following is not a valid C variable name?', '2', 4),
(7, 'All keywords in C are in ____________', '2', 1),
(8, 'Who invented C++?', '3', 4),
(9, 'Which of the following is the correct syntax of including a user defined header files in C++?', '3', 2),
(10, 'Which of the following is used for comments in C++?', '3', 4),
(11, ' Which component is used to compile, debug and execute the java programs?', '1', 3),
(12, ' Which one of the following is not a Java feature?', '1', 2),
(13, 'Which of the following is true about variable naming conventions in JavaScript?', '11', 3),
(14, 'How can you get the total number of arguments passed to a function?', '11', 2),
(15, 'Which built-in method returns the index within the calling String object of the first occurrence of the specified value?', '11', 3),
(16, 'Which built-in method sorts the elements of an array?', '11', 3),
(17, 'Properties are implemented using ___ in Java.', '1', 2),
(18, 'What is the maximum possible length of an identifier?', '4', 4),
(19, 'What is a lint?', '2', 3),
(20, 'The C++ language is ______ object-oriented language.', '3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sets`
--

CREATE TABLE `sets` (
  `s_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `minute` int(11) DEFAULT NULL,
  `second` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sets`
--

INSERT INTO `sets` (`s_id`, `name`, `minute`, `second`) VALUES
(1, 'A', 5, 0),
(4, 'B', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `skill1` varchar(255) NOT NULL,
  `skill2` varchar(255) NOT NULL,
  `skill3` varchar(255) NOT NULL,
  `level` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `Gender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_ans`
--

CREATE TABLE `user_ans` (
  `ua_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `u_op` int(11) DEFAULT NULL,
  `corr_op` int(11) DEFAULT NULL,
  `u_id` int(11) NOT NULL,
  `set_id` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_catagory`
--

CREATE TABLE `user_catagory` (
  `uc_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `set_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_score`
--

CREATE TABLE `user_score` (
  `score_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `set_id` int(11) DEFAULT NULL,
  `attmpt` int(11) DEFAULT NULL,
  `corr` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `score` int(255) DEFAULT NULL,
  `dete` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `v_id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  `dates` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`v_id`, `mail`, `name`, `msg`, `dates`) VALUES
(4, 'anirbandash.cse.2019@nist.edu', 'Anirban Dash', 'Hello yaar..', '21/02/2022'),
(5, 'dashanirban275@gmail.com', 'Anirban Dash', 'I want to join', '21/02/2022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`Cat_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`op_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sample_op`
--
ALTER TABLE `sample_op`
  ADD PRIMARY KEY (`op_id`);

--
-- Indexes for table `sample_ques`
--
ALTER TABLE `sample_ques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sets`
--
ALTER TABLE `sets`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `user_ans`
--
ALTER TABLE `user_ans`
  ADD PRIMARY KEY (`ua_id`);

--
-- Indexes for table `user_catagory`
--
ALTER TABLE `user_catagory`
  ADD PRIMARY KEY (`uc_id`);

--
-- Indexes for table `user_score`
--
ALTER TABLE `user_score`
  ADD PRIMARY KEY (`score_id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `Cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=517;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `sample_op`
--
ALTER TABLE `sample_op`
  MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `sample_ques`
--
ALTER TABLE `sample_ques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sets`
--
ALTER TABLE `sets`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_ans`
--
ALTER TABLE `user_ans`
  MODIFY `ua_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `user_catagory`
--
ALTER TABLE `user_catagory`
  MODIFY `uc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user_score`
--
ALTER TABLE `user_score`
  MODIFY `score_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
