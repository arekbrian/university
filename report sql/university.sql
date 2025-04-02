-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2022 at 09:17 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_name` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_img` varchar(255) DEFAULT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `admin_type` varchar(255) DEFAULT NULL,
  `admin_contact` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_name`, `admin_password`, `admin_img`, `admin_email`, `admin_type`, `admin_contact`) VALUES
(2, 'admin', 'aman', '21232f297a57a5a743894a0e4a801fc3', 'admin_img.jpg', 'phpdevaman@gmail.com', 'main_admain', '01756007000');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `course_dept_id` int(11) DEFAULT NULL,
  `course_dept_name` varchar(255) NOT NULL,
  `course_batch_type` varchar(255) NOT NULL,
  `course_credits` double NOT NULL,
  `course_prerequisites` varchar(11) DEFAULT NULL,
  `cost_per_credit` int(11) NOT NULL,
  `course_total_cost` int(11) NOT NULL,
  `course_pdf` varchar(255) NOT NULL,
  `course_status` varchar(255) NOT NULL DEFAULT 'Running',
  `course_guiding` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_code`, `course_title`, `course_dept_id`, `course_dept_name`, `course_batch_type`, `course_credits`, `course_prerequisites`, `cost_per_credit`, `course_total_cost`, `course_pdf`, `course_status`, `course_guiding`) VALUES
(12, 'EEE 101', 'Electrical Technology', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, '', 1650, 4950, '', 'Running', 'Electronic charge, Charge and matter, Electric field and field strength, Lines of force, Point charge and dipole in electric field. Flux of electric field.\r\n\r\nPotential and field strength, electric potential energy, Magnetic field and field strength, Magnetic lines of induction, Two parallel conductors, Faradayâ€™s law of induction, Inductance, Energy and magnetic field, Energy density, BH curves, Magnetic force and its utilization, Hystersis and eddy current losses.\r\n \r\n\r\nElectrical units and standards, Electrical networks, Circuit solutions-series, Series-parallel networks, Star-delta and delta star conversion.\r\n\r\n \r\n\r\nBasic principle of generation of Alternating and Direct Current, Introduction to phasor algebra as applied to A.C. Circuit analysis, Solution of A.C. circuits, Series, Parallel and Series-parallel circuit, R.L.C circuits, Series and parallel resonance, Applications of networks theorems to A.C. circuits, Basic principle of transformer, Basic principle of Motor and Generator.'),
(13, 'MAT 101', 'Differential and Integral Calculus', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, '', 1650, 4950, '', 'Running', 'Differential Calculus: Limit, continuity and differentiability, successive differentiation of various types of functions, Leibnitâ€™z theorem, Rolleâ€™s theorem, Mean Value theorem, expansion in finite and infinite forms, Lagrangeâ€™s form of remainder, Cauchyâ€™s form of remainder (expansion of\r\n\r\n \r\n\r\nRemainder), expansions of functions differentiation and integration, indeterminate form, partial\r\n\r\n \r\n\r\nDifferentiation, Eulerâ€™s theorem, tangent and normal, sub tangent and subnormal in Cartesian and polar coordinates, maxima and minima of functions of single variables, curvature, asymptotes.\r\n\r\n \r\n\r\nIntegral Calculus: Definition of integrations, integration by the method of substitution, integration by parts, standard integrals, integration by the method of successive reduction, definite integrals, definite integral properties and its use in summing series, Walliâ€™s formula, improper integrals, Beta function and Gamma function, multiple integral and its application, area, volume of solid of revolution, area under a plane curve in Cartesian and polar coordinates, area of the region enclosed by two curves in Cartesian and polar coordinate, arc lengths of curves in Cartesian and polar Coordinates.'),
(14, 'PHY 101', 'Physics', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, '', 1650, 4950, '', 'Running', 'Heat & Thermodynamics: Principle of temperature measurements: platinum resistance thermometer, thermos-electric thermometer, pyrometer; Kinetic theory of gases: Maxwellâ€™s distribution of molecular speeds, mean free path, equipartition of energy, Brownian motion, Van der Waalâ€™s equation of state, review of the first law of thermodynamics and its application, reversible, and irreversible processes, Second Law of thermodynamics, Carnot cycle; Efficiency of heat engines, Carnots Therom, entropy and disorder, thermodynamic functions, Maxwell relations, Clausius-Clapeyron Equation, Gibbs Phase Rule, Third Law of thermodynamics.\r\n\r\n \r\n\r\nStructure of Matter: Crystalline & non-crystalline solids, single crystal and polycrystal solids, unit cell, crystal systems, co-ordinations number, crystal planes and directions, sodium chloride and CsCl structure, packing factor, Miller indices, relation between inter planar spacing and Miller indices, Braggâ€™s Law, methods of determination of inter planar spacing from diffraction patterns; Defects in solids: point defects, line defects; Bonds in solids, interatomic distances, calculation of cohesive & bounding energy; Introduction to band theory: distinction between metal, semiconductor and insulator.\r\n\r\n \r\n\r\nWaves & Oscillations: Differential equation of a simple harmonic oscillator, total energy and average energy, combination of simple harmonic oscillations, Lissajousâ€™ figures, spring-mass system, calculation of time period of torsional pendulum, damped oscillation, determination of damping co-efficient, forced oscillation, resonance two-body oscillations, Reduced mass, differential equation of a progressive wave, power and intensity of wave motion, stationary wave, group velocity and phase velocity, architectural acoustics, reverberation and Sabineâ€™s formula.\r\n\r\n \r\n\r\nPhysical Optics: Theories of light; Interference of light, Youngâ€™s double slit experiment; Displacements of fringes and its uses; Fresnel Bi-prism, interference at wedge shaped films, Newtonâ€™s rings, interferometers; Diffraction of light: Fresnel and Fraunh offer diffraction, diffraction by single slit, diffraction from a circular aperture, resolving power of optical instruments, diffraction at double slit & N-slit-diffraction grating; Polarization: production and analysis of polarized light, Brewsterâ€™s law, Malus law, Polarization by double refraction, retardation plates, Nicol prism, optical activity, polarimeters, polaroid.'),
(15, 'CSE 453', 'Software Testing & Quality Assurance', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'CSE 327', 1650, 4950, '', 'Running', NULL),
(16, 'MAT 121', 'Linear Algebras and Differential Equations', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'MAT 111', 1650, 4950, '', 'Running', NULL),
(17, 'CSE 407', 'Project Management and Professional Ethics', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 2, '', 1650, 3300, '', 'Running', NULL),
(18, 'CSE 425', 'Microcontroller and Embedded Systems', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'CSE 315', 1650, 4950, '', 'Running', NULL),
(19, 'MAT 111', 'Co-Ordinate Geometry and Vector Calculus', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'MAT 101', 1650, 4950, '', 'Running', 'Coordinate Geometry: Transformation of coordinates, axes and its uses; Equation of conies and its reduction to standard forms; Pair of straight lines; Homogeneous equations of second degree; Angle between the pair of straight lines; Pair of lines joining the origin lo the point of intersection of two given curves, circles; System of circles; Orthogonal circles: Radical axis, radical center, properties of radical axes; Coaxial circles and limiting points: Equations of parabola, ellipse and hyperbola in Cartesian and polar coordinates; Tangents and formals; pair of tangents; Chord of contact; Chord In terms of Its middle points; Pole and polar parametric co-ordinates; Diameters; Conjugate diameters and then- properties; Director circles and asymptotes.\r\n\r\n \r\n\r\nVector Calculus: scalars and vectors, equality of vectors; addition and subtraction of vectors; multiplication of vectors by scalars; position vector of a point; scalar and vector product of two vectors and their geometrical interpretation; triple products and multiple products of vectors; linear dependence and independence of vectors; definition of line, surface and volume integral; gradient, divergence and curl of point functions; Gaussâ€™s theorem, Stokeâ€™s theorem, Greenâ€™s theorem and their applications.'),
(20, 'CSE 121', 'Object Oriented Programming Language', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'CSE 111', 1650, 4950, '', 'Running', NULL),
(21, 'CSE 122', 'Object Oriented Programming Language Lab', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 1.5, 'CSE 111', 1650, 2475, '', 'Running', NULL),
(22, 'ENG 111', 'English Language-II', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'ENG 101', 1650, 4950, '', 'Running', 'Present perfect tense â€“ active and passive: Reading and listening to passages and conversations - understanding the time sequence, introducing structure with examples, identification and doing various exercises, writing and speaking from clues (verbal and visual) and question answer session, forming questions. Phrasal verbs, appropriate preposition, common idioms: supplying list of common expressions and showing their use in sentences.\r\n\r\n \r\n\r\nJoining sentences â€“ using coordinating conjunctions and relative pronouns: showing use in passages and practice using them. Past perfect tense: introducing structure with examples, identification and doing various exercises. Present perfect tense, past simple tense and past perfect tense: practice using them in appropriate situation. Present perfect continuous tense â€“ active and passive: practice using them in appropriate situation. Using correct form of verbs: practice using them in appropriate situation. Conditional sentences and time clauses: understanding the structure and practice using them. Modalsâ€“present and past forms: understanding the structure and practice using them, writing suggestions on given situations. Synonyms and Antonyms: Making list of common synonyms and antonyms and using them in sentence.\r\n\r\nDescriptive paragraph, narrative paragraph, summary and note-taking, writing argumentative essay'),
(23, 'CSE 103', 'Discrete Mathematics', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, '', 1650, 4950, '', 'Running', NULL),
(24, 'CSE 457', 'Web Database Programming', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'CSE 207', 1650, 4950, '', 'Running', NULL),
(25, 'CSE 242', 'Algorithms Lab', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 1.5, 'CSE 231', 1650, 2475, '', 'Running', NULL),
(26, 'ENG 101', 'English Language-I', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, '', 1650, 4950, '', 'Running', 'Basic sentence structure: Giving idea of parts of speech, different tense etc. Present simple and continuous tenseâ€“ active and passive: Reading and listening to passages and conversations - understanding the time sequence, introducing structure with examples, identification and doing various exercises, writing and speaking from clues (verbal and visual) and question answer session, forming questions. Nounâ€“function as subject, object, etc.: Identification. Past simple and continuous tense â€“ active and passive: understanding the difference, introducing structure with examples and giving exercises, writing and speaking from clues (verbal and visual) Question-answer session. State verbs and action verbs: providing list of state verbs, practice making sentences with them. Adjectives and adverbs: identification and making sentences. Use of basic modals â€“ active and passive sentences: reading and listening to passages and conversations - understanding the time sequence Introducing structure with examples and giving exercises, making suggestions, introducing structure, question-answer session. Future simple and continuous â€“ active and passive : Reading and listening to passages and conversations - understanding the time sequence Introducing structure with examples and giving exercises, writing and speaking from clues (verbal and visual). Word formation â€“ functions of words: Showing the changes in the formation of words according to parts of speech, showing the changes of form of some common words, making sentences with them, vocabulary building.\r\nWriting formal letter / application; Situational Writing; Writing assignment â€“ steps; Writing reflexive essay; Comparative paragraph writing;'),
(27, 'CSE 231', 'Data Structures', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'CSE 121', 1650, 4950, '', 'Running', NULL),
(28, 'CSE 315', 'Microprocessor and Interfacing', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'CSE 215', 1650, 4950, '', 'Running', NULL),
(29, 'CSE 241', 'Algorithms', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'CSE 231', 1650, 4950, '', 'Running', NULL),
(30, 'STA 231', 'Statistics', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'MAT 121', 1650, 4950, '', 'Running', NULL),
(31, 'CSE 463', 'Software Design Pattern', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'CSE 327', 1650, 4950, '', 'Running', NULL),
(32, 'MAT 231', 'Complex Variable and Fourier Analysis	', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'MAT 121', 1650, 4950, '', 'Running', NULL),
(33, 'CSE 101', 'Computer and Programming Concepts	', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, '', 1650, 4950, '', 'Running', 'information representations in digital computers; number theory and number conversions; history of computing devices; computers; components of a computer; Hardware: processor, memory, I/O devices; software: Operating system, application software; Architecture of a computer; Information Technology; Computer Networks, Internet.\r\nGenerations of programming languages, algorithms, flowchart and concept of structured programming. Problem solving technique, basic concepts of programming: writing, debugging and running a program related to C programming language.\r\n'),
(34, 'ECO 101', 'Principles of Economics	', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 2, '', 1650, 3300, '', 'Running', NULL),
(35, 'CSE 215', 'Computer Architecture', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'CSE 205', 1650, 4950, '', 'Running', NULL),
(36, 'CSE 111', 'Structured Programming Language', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'CSE 101', 1650, 4950, '', 'Running', 'data types, operators, expressions; control structures; functions and program structure: parameter passing conventions, scope rules and storage classes, recursion; header files; preprocessor; pointers and arrays; strings; multidimensional array; user defined data types: structures, unions, enumerations; input and output: standard input and output, formatted input and output, file access; variable length argument list; command line parameters; error handling; graphics; linking; library functions.'),
(37, 'ACT 201', 'Accounting Fundamentals', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 2, '', 1650, 3300, '', 'Running', NULL),
(38, 'CSE 464', 'Software Design Pattern Lab', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 1.5, 'CSE 327', 1650, 2475, '', 'Running', NULL),
(39, 'EEE 102', 'Electrical Technology Lab', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 1.5, '', 1650, 2475, '', 'Running', 'Laboratory works based on EEE 101'),
(40, 'CSE 200', 'Software Development II', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 0.75, 'CSE 121', 1650, 1238, '', 'Running', NULL),
(41, 'CSE 413', 'Cyber Security and Digital Forensic', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'CSE 319', 1650, 4950, '', 'Running', NULL),
(42, 'CSE 417', 'Distributed Database Management Systems', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'CSE 207', 1650, 4950, '', 'Running', NULL),
(43, 'CSE 324', 'Compiler Design Lab', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 0.75, 'CSE 213', 1650, 1238, '', 'Running', NULL),
(44, 'EEE 211', 'Electronic Devices and Circuits', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'EEE 101', 1650, 4950, '', 'Running', NULL),
(45, 'CSE 451', 'Software Project Management', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'CSE 327', 1650, 4950, '', 'Running', NULL),
(46, 'CSE 205', 'Digital Logic Design', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, '', 1650, 4950, '', 'Running', NULL),
(47, 'CSE 207', 'Database Systems', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'CSE 111', 1650, 4950, '', 'Running', NULL),
(48, 'CSE 341', 'Computer Graphics', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'CSE 241', 1650, 4950, '', 'Running', NULL),
(49, 'CSE 318', 'System Analysis and Design Lab', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 1.5, 'CSE 207', 1650, 2475, '', 'Running', NULL),
(50, 'CSE 352', 'Artificial Intelligence and Expert System Lab	Artificial Intelligence and Expert System Lab', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 1.5, 'CSE 103', 1650, 2475, '', 'Running', NULL),
(51, 'CSE 300', 'Software Development III', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 0.75, 'CSE 207', 1650, 1238, '', 'Running', NULL),
(52, 'CSE 418', 'Distributed Database Management Systems Lab', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 1.5, 'CSE 207', 1650, 2475, '', 'Running', NULL),
(53, 'CSE 100', 'Software Development I', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 0.75, 'CSE 111', 1650, 1238, '', 'Running', NULL),
(54, 'CSE 102', 'Computer and Programming Concepts Lab', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 1.5, '', 1650, 2475, '', 'Running', 'Laboratory works based on CSE 101'),
(55, 'CSE 224', 'Numerical Analysis Lab', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 0.75, '', 1650, 1238, '', 'Running', NULL),
(56, 'CSE 320', 'Computer Network Lab', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 1.5, 'CSE 209', 1650, 2475, '', 'Running', NULL),
(57, 'EEE 212', 'Electronic Devices and Circuits Lab	', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 1.5, 'EEE 101', 1650, 2475, '', 'Running', NULL),
(58, 'CSE 317', 'System Analysis and Design', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'CSE 207', 1650, 4950, '', 'Running', NULL),
(59, 'CSE 351', 'Artificial Intelligence and Expert System', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'CSE 103', 1650, 4950, '', 'Running', NULL),
(60, 'CSE 332', 'Advanced Programming Lab', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 1.5, 'CSE 121', 1650, 2475, '', 'Running', NULL),
(61, 'CSE 310', 'Operating Systems Lab', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 1.5, 'CSE 111', 1650, 2475, '', 'Running', NULL),
(62, 'CSE 426', 'Microcontroller and Embedded Systems Lab', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 1.5, 'CSE 315', 1650, 2475, '', 'Running', NULL),
(63, 'CSE 208', 'Database Systems Lab', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 1.5, 'CSE 111', 1650, 2475, '', 'Running', NULL),
(64, 'CSE 342', 'Computer Graphics Lab', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 0.75, 'CSE 241', 1650, 1238, '', 'Running', NULL),
(65, 'CSE 112', 'Structured Programming Language Lab', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 1.5, 'CSE 101', 1650, 2475, '', 'Running', 'Laboratory works based on CSE 111 using C programming language.'),
(66, 'CSE 331', 'Advanced Programming', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'CSE 121', 1650, 4950, '', 'Running', NULL),
(67, 'CSE 323', 'Compiler Design', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'CSE 213', 1650, 4950, '', 'Running', NULL),
(68, 'CSE 414', 'Cyber Security and Digital Forensic Lab', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 1.5, 'CSE 319', 1650, 2475, '', 'Running', NULL),
(69, 'CSE 328', 'Software Engineering Lab', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 0.75, 'CSE 317', 1650, 1238, '', 'Running', NULL),
(70, 'CSE 458', 'Web Database Programming Lab', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 1.5, 'CSE 207', 1650, 2475, '', 'Running', NULL),
(71, 'CSE 400', 'Software Development IV', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 0.75, 'CSE 300', 1650, 1238, '', 'Running', NULL),
(72, 'CSE 313', 'Mathematical Analysis for Computer Science', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'STA 231', 1650, 4950, '', 'Running', NULL),
(73, 'CSE 209', 'Data Communication', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'CSE 205', 1650, 4950, '', 'Running', NULL),
(74, 'CSE 327', 'Software Engineering', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'CSE 317', 1650, 4950, '', 'Running', NULL),
(75, 'CSE 213', 'Theory of Computing & Automata Theory', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'CSE 103', 1650, 4950, '', 'Running', NULL),
(76, 'CSE 206', 'Digital Logic Design Lab	', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 1.5, '', 1650, 2475, '', 'Running', NULL),
(77, 'CSE 223', 'Numerical Analysis', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, '', 1650, 4950, '', 'Running', NULL),
(78, 'CSE 319', 'Computer Network', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'CSE 209', 1650, 4950, '', 'Running', NULL),
(79, 'CSE 232', 'Data Structures Lab', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 1.5, 'CSE 121', 1650, 2475, '', 'Running', NULL),
(80, 'CSE 316', 'Microprocessor and Interfacing Lab', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 1.5, 'CSE 215', 1650, 2475, '', 'Running', NULL),
(81, 'CSE 309', 'Operating Systems', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 3, 'CSE 111', 1650, 4950, '', 'Running', NULL),
(82, 'CSE 498', 'Capstone Project/Project/Thesis', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'Day', 4, 'CSE 300', 1650, 6600, '', 'Running', NULL),
(84, 'CSE 101', 'Computer fundamentals', 9, 'B.Sc. in Computer Science & Engineering (CSE)', 'Evening', 3, '', 1250, 3750, '', 'Running', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_assign`
--

CREATE TABLE `course_assign` (
  `course_assign_id` int(11) NOT NULL,
  `ca_teacher_id` varchar(255) NOT NULL,
  `ca_course_id` int(11) NOT NULL,
  `ca_dept_id` int(11) NOT NULL,
  `ca_intake_id` int(11) NOT NULL,
  `ca_section_id` int(11) NOT NULL,
  `ca_reg_std_id` text,
  `ca_semester` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_assign`
--

INSERT INTO `course_assign` (`course_assign_id`, `ca_teacher_id`, `ca_course_id`, `ca_dept_id`, `ca_intake_id`, `ca_section_id`, `ca_reg_std_id`, `ca_semester`) VALUES
(16, '2223300001', 33, 8, 1, 4, NULL, 'Spring-2022'),
(17, '2223300003', 14, 8, 1, 4, NULL, 'Spring-2022'),
(18, '2223300004', 26, 8, 1, 4, NULL, 'Spring-2022'),
(19, '2223300005', 13, 8, 1, 4, NULL, 'Spring-2022'),
(20, '2223300001', 54, 8, 1, 4, NULL, 'Spring-2022'),
(21, '2223300002', 36, 8, 1, 4, NULL, 'Fall-2022'),
(22, '2223300002', 65, 8, 1, 4, NULL, 'Fall-2022'),
(23, '2223300005', 19, 8, 1, 4, NULL, 'Fall-2022'),
(24, '2223300003', 12, 8, 1, 4, NULL, 'Fall-2022'),
(25, '2223300003', 39, 8, 1, 4, NULL, 'Fall-2022'),
(26, '2223300004', 22, 8, 1, 4, NULL, 'Fall-2022'),
(27, '2223300001', 33, 8, 2, 6, NULL, 'Fall-2022'),
(28, '2223300001', 54, 8, 2, 6, NULL, 'Fall-2022'),
(29, '2223300003', 14, 8, 2, 6, NULL, 'Fall-2022'),
(30, '2223300004', 26, 8, 2, 6, NULL, 'Fall-2022'),
(31, '2223300005', 13, 8, 2, 6, NULL, 'Fall-2022'),
(32, '2223300002', 36, 8, 2, 6, NULL, 'Summer-2022'),
(33, '2223300002', 65, 8, 2, 6, NULL, 'Summer-2022'),
(34, '2223300005', 19, 8, 2, 6, NULL, 'Summer-2022'),
(35, '2223300003', 12, 8, 2, 6, NULL, 'Summer-2022'),
(36, '2223300003', 39, 8, 2, 6, NULL, 'Summer-2022'),
(37, '2223300004', 22, 8, 2, 6, NULL, 'Summer-2022'),
(38, '2223300001', 20, 8, 1, 4, NULL, 'Summer-2022'),
(39, '2223300001', 21, 8, 1, 4, NULL, 'Summer-2022');

-- --------------------------------------------------------

--
-- Table structure for table `course_registration`
--

CREATE TABLE `course_registration` (
  `course_reg_id` int(11) NOT NULL,
  `cr_student_id` varchar(255) NOT NULL,
  `cr_course_id` int(11) NOT NULL,
  `cr_dept_id` int(11) NOT NULL,
  `cr_intake_id` int(11) NOT NULL,
  `cr_section_id` int(11) NOT NULL,
  `cr_sem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_registration`
--

INSERT INTO `course_registration` (`course_reg_id`, `cr_student_id`, `cr_course_id`, `cr_dept_id`, `cr_intake_id`, `cr_section_id`, `cr_sem`) VALUES
(23, '222330011001', 33, 8, 1, 4, 'Spring-2022'),
(24, '222330011001', 14, 8, 1, 4, 'Spring-2022'),
(25, '222330011001', 26, 8, 1, 4, 'Spring-2022'),
(26, '222330011001', 13, 8, 1, 4, 'Spring-2022'),
(27, '222330011001', 54, 8, 1, 4, 'Spring-2022'),
(28, '222330011002', 33, 8, 1, 4, 'Spring-2022'),
(29, '222330011002', 14, 8, 1, 4, 'Spring-2022'),
(30, '222330011002', 26, 8, 1, 4, 'Spring-2022'),
(31, '222330011002', 13, 8, 1, 4, 'Spring-2022'),
(32, '222330011002', 54, 8, 1, 4, 'Spring-2022'),
(33, '222330011003', 33, 8, 1, 4, 'Spring-2022'),
(34, '222330011003', 14, 8, 1, 4, 'Spring-2022'),
(35, '222330011003', 26, 8, 1, 4, 'Spring-2022'),
(36, '222330011003', 13, 8, 1, 4, 'Spring-2022'),
(37, '222330011003', 54, 8, 1, 4, 'Spring-2022'),
(38, '222330011004', 33, 8, 1, 4, 'Spring-2022'),
(39, '222330011004', 14, 8, 1, 4, 'Spring-2022'),
(40, '222330011004', 26, 8, 1, 4, 'Spring-2022'),
(41, '222330011004', 13, 8, 1, 4, 'Spring-2022'),
(42, '222330011004', 54, 8, 1, 4, 'Spring-2022'),
(43, '222330011005', 33, 8, 1, 4, 'Spring-2022'),
(44, '222330011005', 14, 8, 1, 4, 'Spring-2022'),
(45, '222330011005', 26, 8, 1, 4, 'Spring-2022'),
(46, '222330011005', 13, 8, 1, 4, 'Spring-2022'),
(47, '222330011005', 54, 8, 1, 4, 'Spring-2022'),
(48, '222330011006', 33, 8, 1, 4, 'Spring-2022'),
(49, '222330011006', 14, 8, 1, 4, 'Spring-2022'),
(50, '222330011006', 26, 8, 1, 4, 'Spring-2022'),
(51, '222330011006', 13, 8, 1, 4, 'Spring-2022'),
(52, '222330011006', 54, 8, 1, 4, 'Spring-2022'),
(53, '222330011007', 33, 8, 1, 4, 'Spring-2022'),
(54, '222330011007', 14, 8, 1, 4, 'Spring-2022'),
(55, '222330011007', 26, 8, 1, 4, 'Spring-2022'),
(56, '222330011007', 13, 8, 1, 4, 'Spring-2022'),
(57, '222330011007', 54, 8, 1, 4, 'Spring-2022'),
(58, '222330011008', 33, 8, 1, 4, 'Spring-2022'),
(59, '222330011008', 14, 8, 1, 4, 'Spring-2022'),
(60, '222330011008', 26, 8, 1, 4, 'Spring-2022'),
(61, '222330011008', 13, 8, 1, 4, 'Spring-2022'),
(62, '222330011008', 54, 8, 1, 4, 'Spring-2022'),
(63, '222330011009', 33, 8, 1, 4, 'Spring-2022'),
(64, '222330011009', 14, 8, 1, 4, 'Spring-2022'),
(65, '222330011009', 26, 8, 1, 4, 'Spring-2022'),
(66, '222330011009', 13, 8, 1, 4, 'Spring-2022'),
(67, '222330011009', 54, 8, 1, 4, 'Spring-2022'),
(68, '222330011010', 33, 8, 1, 4, 'Spring-2022'),
(69, '222330011010', 14, 8, 1, 4, 'Spring-2022'),
(70, '222330011010', 26, 8, 1, 4, 'Spring-2022'),
(71, '222330011010', 13, 8, 1, 4, 'Spring-2022'),
(72, '222330011010', 54, 8, 1, 4, 'Spring-2022'),
(73, '222330011011', 33, 8, 1, 4, 'Spring-2022'),
(74, '222330011011', 14, 8, 1, 4, 'Spring-2022'),
(75, '222330011011', 26, 8, 1, 4, 'Spring-2022'),
(76, '222330011011', 13, 8, 1, 4, 'Spring-2022'),
(77, '222330011011', 54, 8, 1, 4, 'Spring-2022'),
(78, '222330011012', 33, 8, 1, 4, 'Spring-2022'),
(79, '222330011012', 14, 8, 1, 4, 'Spring-2022'),
(80, '222330011012', 26, 8, 1, 4, 'Spring-2022'),
(81, '222330011012', 13, 8, 1, 4, 'Spring-2022'),
(82, '222330011012', 54, 8, 1, 4, 'Spring-2022'),
(83, '222330011013', 33, 8, 1, 4, 'Spring-2022'),
(84, '222330011013', 14, 8, 1, 4, 'Spring-2022'),
(85, '222330011013', 26, 8, 1, 4, 'Spring-2022'),
(86, '222330011013', 13, 8, 1, 4, 'Spring-2022'),
(87, '222330011013', 54, 8, 1, 4, 'Spring-2022'),
(88, '222330011014', 33, 8, 1, 4, 'Spring-2022'),
(89, '222330011014', 14, 8, 1, 4, 'Spring-2022'),
(90, '222330011014', 26, 8, 1, 4, 'Spring-2022'),
(91, '222330011014', 13, 8, 1, 4, 'Spring-2022'),
(92, '222330011014', 54, 8, 1, 4, 'Spring-2022'),
(93, '222330011015', 33, 8, 1, 4, 'Spring-2022'),
(94, '222330011015', 14, 8, 1, 4, 'Spring-2022'),
(95, '222330011015', 26, 8, 1, 4, 'Spring-2022'),
(96, '222330011015', 13, 8, 1, 4, 'Spring-2022'),
(97, '222330011015', 54, 8, 1, 4, 'Spring-2022'),
(98, '222330011001', 36, 8, 1, 4, 'Fall-2022'),
(99, '222330011001', 19, 8, 1, 4, 'Fall-2022'),
(100, '222330011001', 39, 8, 1, 4, 'Fall-2022'),
(101, '222330011001', 65, 8, 1, 4, 'Fall-2022'),
(102, '222330011001', 22, 8, 1, 4, 'Fall-2022'),
(103, '222330011001', 12, 8, 1, 4, 'Fall-2022'),
(104, '222330011002', 36, 8, 1, 4, 'Fall-2022'),
(105, '222330011002', 19, 8, 1, 4, 'Fall-2022'),
(106, '222330011002', 39, 8, 1, 4, 'Fall-2022'),
(107, '222330011002', 65, 8, 1, 4, 'Fall-2022'),
(108, '222330011002', 22, 8, 1, 4, 'Fall-2022'),
(109, '222330011002', 12, 8, 1, 4, 'Fall-2022'),
(110, '222330011003', 36, 8, 1, 4, 'Fall-2022'),
(111, '222330011003', 19, 8, 1, 4, 'Fall-2022'),
(112, '222330011003', 39, 8, 1, 4, 'Fall-2022'),
(113, '222330011003', 65, 8, 1, 4, 'Fall-2022'),
(114, '222330011003', 22, 8, 1, 4, 'Fall-2022'),
(115, '222330011003', 12, 8, 1, 4, 'Fall-2022'),
(116, '222330011004', 36, 8, 1, 4, 'Fall-2022'),
(117, '222330011004', 19, 8, 1, 4, 'Fall-2022'),
(118, '222330011004', 39, 8, 1, 4, 'Fall-2022'),
(119, '222330011004', 65, 8, 1, 4, 'Fall-2022'),
(120, '222330011004', 22, 8, 1, 4, 'Fall-2022'),
(121, '222330011004', 12, 8, 1, 4, 'Fall-2022'),
(122, '222330011005', 36, 8, 1, 4, 'Fall-2022'),
(123, '222330011005', 19, 8, 1, 4, 'Fall-2022'),
(124, '222330011005', 39, 8, 1, 4, 'Fall-2022'),
(125, '222330011005', 65, 8, 1, 4, 'Fall-2022'),
(126, '222330011005', 22, 8, 1, 4, 'Fall-2022'),
(127, '222330011005', 12, 8, 1, 4, 'Fall-2022'),
(128, '222330011006', 36, 8, 1, 4, 'Fall-2022'),
(129, '222330011006', 19, 8, 1, 4, 'Fall-2022'),
(130, '222330011006', 39, 8, 1, 4, 'Fall-2022'),
(131, '222330011006', 65, 8, 1, 4, 'Fall-2022'),
(132, '222330011006', 22, 8, 1, 4, 'Fall-2022'),
(133, '222330011006', 12, 8, 1, 4, 'Fall-2022'),
(134, '222330011007', 36, 8, 1, 4, 'Fall-2022'),
(135, '222330011007', 19, 8, 1, 4, 'Fall-2022'),
(136, '222330011007', 39, 8, 1, 4, 'Fall-2022'),
(137, '222330011007', 65, 8, 1, 4, 'Fall-2022'),
(138, '222330011007', 22, 8, 1, 4, 'Fall-2022'),
(139, '222330011007', 12, 8, 1, 4, 'Fall-2022'),
(140, '222330011008', 36, 8, 1, 4, 'Fall-2022'),
(141, '222330011008', 19, 8, 1, 4, 'Fall-2022'),
(142, '222330011008', 39, 8, 1, 4, 'Fall-2022'),
(143, '222330011008', 65, 8, 1, 4, 'Fall-2022'),
(144, '222330011008', 22, 8, 1, 4, 'Fall-2022'),
(145, '222330011008', 12, 8, 1, 4, 'Fall-2022'),
(146, '222330011009', 36, 8, 1, 4, 'Fall-2022'),
(147, '222330011009', 19, 8, 1, 4, 'Fall-2022'),
(148, '222330011009', 39, 8, 1, 4, 'Fall-2022'),
(149, '222330011009', 65, 8, 1, 4, 'Fall-2022'),
(150, '222330011009', 22, 8, 1, 4, 'Fall-2022'),
(151, '222330011009', 12, 8, 1, 4, 'Fall-2022'),
(152, '222330011010', 36, 8, 1, 4, 'Fall-2022'),
(153, '222330011010', 19, 8, 1, 4, 'Fall-2022'),
(154, '222330011010', 39, 8, 1, 4, 'Fall-2022'),
(155, '222330011010', 65, 8, 1, 4, 'Fall-2022'),
(156, '222330011010', 22, 8, 1, 4, 'Fall-2022'),
(157, '222330011010', 12, 8, 1, 4, 'Fall-2022'),
(158, '222330011011', 36, 8, 1, 4, 'Fall-2022'),
(159, '222330011011', 19, 8, 1, 4, 'Fall-2022'),
(160, '222330011011', 39, 8, 1, 4, 'Fall-2022'),
(161, '222330011011', 65, 8, 1, 4, 'Fall-2022'),
(162, '222330011011', 22, 8, 1, 4, 'Fall-2022'),
(163, '222330011011', 12, 8, 1, 4, 'Fall-2022'),
(164, '222330011012', 36, 8, 1, 4, 'Fall-2022'),
(165, '222330011012', 19, 8, 1, 4, 'Fall-2022'),
(166, '222330011012', 39, 8, 1, 4, 'Fall-2022'),
(167, '222330011012', 65, 8, 1, 4, 'Fall-2022'),
(168, '222330011012', 22, 8, 1, 4, 'Fall-2022'),
(169, '222330011012', 12, 8, 1, 4, 'Fall-2022'),
(170, '222330011013', 36, 8, 1, 4, 'Fall-2022'),
(171, '222330011013', 19, 8, 1, 4, 'Fall-2022'),
(172, '222330011013', 39, 8, 1, 4, 'Fall-2022'),
(173, '222330011013', 65, 8, 1, 4, 'Fall-2022'),
(174, '222330011013', 22, 8, 1, 4, 'Fall-2022'),
(175, '222330011013', 12, 8, 1, 4, 'Fall-2022'),
(176, '222330011014', 36, 8, 1, 4, 'Fall-2022'),
(177, '222330011014', 19, 8, 1, 4, 'Fall-2022'),
(178, '222330011014', 39, 8, 1, 4, 'Fall-2022'),
(179, '222330011014', 65, 8, 1, 4, 'Fall-2022'),
(180, '222330011014', 22, 8, 1, 4, 'Fall-2022'),
(181, '222330011014', 12, 8, 1, 4, 'Fall-2022'),
(182, '222330011015', 36, 8, 1, 4, 'Fall-2022'),
(183, '222330011015', 19, 8, 1, 4, 'Fall-2022'),
(184, '222330011015', 39, 8, 1, 4, 'Fall-2022'),
(185, '222330011015', 65, 8, 1, 4, 'Fall-2022'),
(186, '222330011015', 22, 8, 1, 4, 'Fall-2022'),
(187, '222330011015', 12, 8, 1, 4, 'Fall-2022'),
(188, '222330021001', 33, 8, 2, 6, 'Fall-2022'),
(189, '222330021001', 14, 8, 2, 6, 'Fall-2022'),
(190, '222330021001', 26, 8, 2, 6, 'Fall-2022'),
(191, '222330021001', 13, 8, 2, 6, 'Fall-2022'),
(192, '222330021001', 54, 8, 2, 6, 'Fall-2022'),
(193, '222330021002', 33, 8, 2, 6, 'Fall-2022'),
(194, '222330021002', 14, 8, 2, 6, 'Fall-2022'),
(195, '222330021002', 26, 8, 2, 6, 'Fall-2022'),
(196, '222330021002', 13, 8, 2, 6, 'Fall-2022'),
(197, '222330021002', 54, 8, 2, 6, 'Fall-2022'),
(198, '222330021003', 33, 8, 2, 6, 'Fall-2022'),
(199, '222330021003', 14, 8, 2, 6, 'Fall-2022'),
(200, '222330021003', 26, 8, 2, 6, 'Fall-2022'),
(201, '222330021003', 13, 8, 2, 6, 'Fall-2022'),
(202, '222330021003', 54, 8, 2, 6, 'Fall-2022'),
(203, '222330021005', 33, 8, 2, 6, 'Fall-2022'),
(204, '222330021005', 14, 8, 2, 6, 'Fall-2022'),
(205, '222330021005', 26, 8, 2, 6, 'Fall-2022'),
(206, '222330021005', 13, 8, 2, 6, 'Fall-2022'),
(207, '222330021005', 54, 8, 2, 6, 'Fall-2022'),
(208, '222330021004', 33, 8, 2, 6, 'Fall-2022'),
(209, '222330021004', 14, 8, 2, 6, 'Fall-2022'),
(210, '222330021004', 26, 8, 2, 6, 'Fall-2022'),
(211, '222330021004', 13, 8, 2, 6, 'Fall-2022'),
(212, '222330021004', 54, 8, 2, 6, 'Fall-2022'),
(213, '222330021001', 36, 8, 2, 6, 'Summer-2022'),
(214, '222330021001', 19, 8, 2, 6, 'Summer-2022'),
(215, '222330021001', 39, 8, 2, 6, 'Summer-2022'),
(216, '222330021001', 65, 8, 2, 6, 'Summer-2022'),
(217, '222330021001', 22, 8, 2, 6, 'Summer-2022'),
(218, '222330021001', 12, 8, 2, 6, 'Summer-2022'),
(219, '222330021002', 36, 8, 2, 6, 'Summer-2022'),
(220, '222330021002', 19, 8, 2, 6, 'Summer-2022'),
(221, '222330021002', 39, 8, 2, 6, 'Summer-2022'),
(222, '222330021002', 65, 8, 2, 6, 'Summer-2022'),
(223, '222330021002', 22, 8, 2, 6, 'Summer-2022'),
(224, '222330021002', 12, 8, 2, 6, 'Summer-2022'),
(225, '222330021003', 36, 8, 2, 6, 'Summer-2022'),
(226, '222330021003', 19, 8, 2, 6, 'Summer-2022'),
(227, '222330021003', 39, 8, 2, 6, 'Summer-2022'),
(228, '222330021003', 65, 8, 2, 6, 'Summer-2022'),
(229, '222330021003', 22, 8, 2, 6, 'Summer-2022'),
(230, '222330021003', 12, 8, 2, 6, 'Summer-2022'),
(231, '222330021004', 36, 8, 2, 6, 'Summer-2022'),
(232, '222330021004', 19, 8, 2, 6, 'Summer-2022'),
(233, '222330021004', 39, 8, 2, 6, 'Summer-2022'),
(234, '222330021004', 65, 8, 2, 6, 'Summer-2022'),
(235, '222330021004', 22, 8, 2, 6, 'Summer-2022'),
(236, '222330021004', 12, 8, 2, 6, 'Summer-2022'),
(237, '222330021005', 36, 8, 2, 6, 'Summer-2022'),
(238, '222330021005', 19, 8, 2, 6, 'Summer-2022'),
(239, '222330021005', 39, 8, 2, 6, 'Summer-2022'),
(240, '222330021005', 65, 8, 2, 6, 'Summer-2022'),
(241, '222330021005', 22, 8, 2, 6, 'Summer-2022'),
(242, '222330021005', 12, 8, 2, 6, 'Summer-2022'),
(243, '222330011001', 20, 8, 1, 4, 'Summer-2022'),
(244, '222330011001', 21, 8, 1, 4, 'Summer-2022');

-- --------------------------------------------------------

--
-- Table structure for table `current_semester`
--

CREATE TABLE `current_semester` (
  `semester_id` int(11) NOT NULL,
  `semester_name` varchar(255) NOT NULL,
  `semester_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `current_semester`
--

INSERT INTO `current_semester` (`semester_id`, `semester_name`, `semester_year`) VALUES
(1, 'Summer', 22);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_id` int(11) NOT NULL,
  `dept_code` varchar(255) NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `dept_prog_type` varchar(255) NOT NULL,
  `dept_batch_type` varchar(255) NOT NULL,
  `dept_total_cost` double DEFAULT NULL,
  `dept_total_credits` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `dept_code`, `dept_name`, `dept_prog_type`, `dept_batch_type`, `dept_total_cost`, `dept_total_credits`) VALUES
(8, '300', 'B.Sc. in Computer Science & Engineering (CSE)', 'Under Graduate', 'Day', 268954, 163),
(9, '301', 'B.Sc. in Computer Science & Engineering (CSE)', 'Under Graduate', 'Evening', 3750, 3);

-- --------------------------------------------------------

--
-- Table structure for table `intake`
--

CREATE TABLE `intake` (
  `intake_id` int(11) NOT NULL,
  `intake_dept_id` int(11) NOT NULL,
  `intake_no` int(11) NOT NULL,
  `intake_all_course_id` text NOT NULL,
  `intake_offered_course_id` text,
  `intake_previous_offered_course_id` text,
  `inkate_total_credits` double NOT NULL,
  `intake_total_cost` double NOT NULL,
  `intake_starting_date` varchar(255) NOT NULL,
  `intake_ending_date` varchar(255) NOT NULL,
  `intake_status` varchar(255) NOT NULL DEFAULT 'Running'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `intake`
--

INSERT INTO `intake` (`intake_id`, `intake_dept_id`, `intake_no`, `intake_all_course_id`, `intake_offered_course_id`, `intake_previous_offered_course_id`, `inkate_total_credits`, `intake_total_cost`, `intake_starting_date`, `intake_ending_date`, `intake_status`) VALUES
(1, 8, 1, '[\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\",\"80\",\"81\",\"82\"]', '[\"16\",\"21\",\"34\",\"20\",\"23\",\"53\"]', '[\"33\",\"14\",\"26\",\"13\",\"54\",\"36\",\"19\",\"39\",\"65\",\"22\",\"12\"]', 163, 268954, '2022-01-01', '2025-12-31', 'Running'),
(2, 8, 2, '[\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\",\"80\",\"81\",\"82\"]', '[\"36\",\"19\",\"39\",\"65\",\"22\",\"12\"]', '[\"33\",\"14\",\"26\",\"13\",\"54\"]', 163, 268954, '2022-05-01', '2026-04-30', 'Running');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `section_intake_id` int(11) NOT NULL,
  `section_dept_id` int(11) NOT NULL,
  `section_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section_intake_id`, `section_dept_id`, `section_no`) VALUES
(4, 1, 8, 1),
(5, 1, 8, 2),
(6, 2, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students_basic`
--

CREATE TABLE `students_basic` (
  `std_id` varchar(255) NOT NULL,
  `std_edu_year` int(11) NOT NULL,
  `std_name` varchar(255) NOT NULL,
  `std_dept_id` int(11) NOT NULL,
  `std_dept` varchar(255) NOT NULL,
  `std_intake_id` int(11) NOT NULL,
  `std_intake` int(11) NOT NULL,
  `std_section_id` int(11) NOT NULL,
  `std_section_no` int(11) NOT NULL,
  `std_sem` varchar(255) NOT NULL,
  `std_prog_type` varchar(255) NOT NULL,
  `std_shift` varchar(255) NOT NULL,
  `std_email` varchar(255) NOT NULL,
  `std_contact_no` varchar(255) NOT NULL,
  `std_gender` varchar(255) NOT NULL,
  `std_blood_grp` varchar(255) NOT NULL,
  `std_ability_type` varchar(255) NOT NULL,
  `std_image` varchar(255) NOT NULL,
  `std_current_address` varchar(255) NOT NULL,
  `std_permanent_address` varchar(255) NOT NULL,
  `std_birth_id` varchar(255) NOT NULL,
  `std_password` varchar(255) NOT NULL,
  `std_details` varchar(255) NOT NULL,
  `std_total_course` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_basic`
--

INSERT INTO `students_basic` (`std_id`, `std_edu_year`, `std_name`, `std_dept_id`, `std_dept`, `std_intake_id`, `std_intake`, `std_section_id`, `std_section_no`, `std_sem`, `std_prog_type`, `std_shift`, `std_email`, `std_contact_no`, `std_gender`, `std_blood_grp`, `std_ability_type`, `std_image`, `std_current_address`, `std_permanent_address`, `std_birth_id`, `std_password`, `std_details`, `std_total_course`) VALUES
('222330011001', 2223, 'Md Al Mamun', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 1, 1, 4, 1, 'Spring', 'Under Graduate', 'Day', 'mamun@gmail.com', '01775251044', 'male', 'A+', 'Normal', '27788792_220051355220417_6034698119781397849_o.jpg', 'narayaonganj', 'Chapai', '1561515641511818', 'f05799e4dc53b9b56e21c7c0535ea966', 'test', '[\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\",\"80\",\"81\",\"82\"]'),
('222330011002', 2223, 'Tonmoy', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 1, 1, 4, 1, 'Spring', 'Under Graduate', 'Day', 'tonmoy@gmail.com', '01775251044', 'male', 'B+', 'Normal', 'download.png', 'mirpur 2', 'jessore', '1564151541', 'f05799e4dc53b9b56e21c7c0535ea966', 'test', '[\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\",\"80\",\"81\",\"82\"]'),
('222330011014', 2223, 'Rabiul Allam Ashik', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 1, 1, 4, 1, 'Spring', 'Under Graduate', 'Day', 'rabiul@gmail.com', '01775251044', 'male', 'A-', 'Normal', 'download.png', 'mirpur 2', 'Kurigram', '427532863873', 'f05799e4dc53b9b56e21c7c0535ea966', 'test', '[\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\",\"80\",\"81\",\"82\"]'),
('222330011006', 2223, 'Sajib Debnath', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 1, 1, 4, 1, 'Spring', 'Under Graduate', 'Day', 'sajib@gmail.com', '01775251044', 'male', 'AB+', 'Normal', 'download.png', 'mirpur 2', 'comilla', '45242452', 'f05799e4dc53b9b56e21c7c0535ea966', 'test', '[\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\",\"80\",\"81\",\"82\"]'),
('222330021005', 2223, 'Mahbub', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 2, 2, 6, 1, 'Fall', 'Under Graduate', 'Day', 'mahbub@gmail.com', '01775251044', 'male', 'A+', 'Normal', 'download.png', 'Mirpur 2', 'Gopalganj', '45245242452452', 'f05799e4dc53b9b56e21c7c0535ea966', 'test', '[\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\",\"80\",\"81\",\"82\"]'),
('222330021001', 2223, 'Md Angkan', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 2, 2, 6, 1, 'Fall', 'Under Graduate', 'Day', 'angkan@gmail.com', '01775251044', 'male', 'A-', 'Normal', 'download.png', 'Mirpur 2', 'Natore', '45254257572', 'f05799e4dc53b9b56e21c7c0535ea966', 'test', '[\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\",\"80\",\"81\",\"82\"]'),
('222330021002', 2223, 'Hizbul Hasan', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 2, 2, 6, 1, 'Fall', 'Under Graduate', 'Day', 'hizbul@gmail.com', '01775251044', 'male', 'B+', 'Normal', 'download.png', 'Mirpur 2', 'Gopalganj', '452574', 'f05799e4dc53b9b56e21c7c0535ea966', 'test', '[\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\",\"80\",\"81\",\"82\"]'),
('222330011012', 2223, 'Imran Khan', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 1, 1, 4, 1, 'Spring', 'Under Graduate', 'Day', 'imran@gmail.com', '01775251044', 'male', 'A+', 'Normal', 'download.png', 'mirpur 2', 'jessore', '45272727', 'f05799e4dc53b9b56e21c7c0535ea966', 'test', '[\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\",\"80\",\"81\",\"82\"]'),
('222330011013', 2223, 'Dolon Sarkar', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 1, 1, 4, 1, 'Spring', 'Under Graduate', 'Day', 'dolon@gmail.com', '01775251044', 'male', 'A+', 'Normal', 'download.png', 'mirpur 2', 'jessore', '4527275257', 'f05799e4dc53b9b56e21c7c0535ea966', 'test', '[\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\",\"80\",\"81\",\"82\"]'),
('222330011007', 2223, 'SaminSakif', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 1, 1, 4, 1, 'Spring', 'Under Graduate', 'Day', 'samin@gmail.com', '01775251044', 'male', 'A+', 'Normal', 'download.png', 'mirpur 2', 'Jhenaidah', '4527527', 'f05799e4dc53b9b56e21c7c0535ea966', 'test', '[\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\",\"80\",\"81\",\"82\"]'),
('222330011010', 2223, 'Rakibul Rinku', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 1, 1, 4, 1, 'Spring', 'Under Graduate', 'Day', 'rinku@gmail.com', '01775251044', 'male', 'A+', 'Normal', 'download.png', 'mirpur 2', 'comilla', '452786587527', 'f05799e4dc53b9b56e21c7c0535ea966', 'test', '[\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\",\"80\",\"81\",\"82\"]'),
('222330011009', 2223, 'Kresan Sarkar', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 1, 1, 4, 1, 'Spring', 'Under Graduate', 'Day', 'kresan@gmail.com', '01775251044', 'male', 'A+', 'Normal', 'download.png', 'mirpur 2', 'comilla', '4567527575', 'f05799e4dc53b9b56e21c7c0535ea966', 'test', '[\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\",\"80\",\"81\",\"82\"]'),
('222330011011', 2223, 'Sumaiya Nipa', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 1, 1, 4, 1, 'Spring', 'Under Graduate', 'Day', 'nipa@gmail.com', '01775251044', 'male', 'A+', 'Normal', 'download.png', 'mirpur 2', 'Gopalganj', '485783838638', 'f05799e4dc53b9b56e21c7c0535ea966', 'test', '[\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\",\"80\",\"81\",\"82\"]'),
('222330021004', 2223, 'Sujon', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 2, 2, 6, 1, 'Fall', 'Under Graduate', 'Day', 'sujon@gmail.com', '01775251044', 'male', 'AB+', 'Normal', 'download.png', 'Mirpur 2', 'Rangpur', '52156151599', 'f05799e4dc53b9b56e21c7c0535ea966', 'test', '[\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\",\"80\",\"81\",\"82\"]'),
('222330011008', 2223, 'Sabiha Rumpa', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 1, 1, 4, 1, 'Spring', 'Under Graduate', 'Day', 'sabiha@gmail.com', '01775251044', 'Female', 'A+', 'Normal', 'download.png', 'khulna', 'Jhenaidah', '527275275', 'f05799e4dc53b9b56e21c7c0535ea966', 'test', '[\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\",\"80\",\"81\",\"82\"]'),
('222330011015', 2223, 'Jasim Khan', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 1, 1, 4, 1, 'Spring', 'Under Graduate', 'Day', 'mamun@gmail.com', '01775251044', 'male', 'AB+', 'Normal', 'download.png', 'mirpur 2', 'comilla', '542774554', 'f05799e4dc53b9b56e21c7c0535ea966', 'test', '[\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\",\"80\",\"81\",\"82\"]'),
('222330021003', 2223, 'Himel', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 2, 2, 6, 1, 'Fall', 'Under Graduate', 'Day', 'himel@gmail.com', '01775251044', 'male', 'AB-', 'Normal', 'download.png', 'Mirpur 2', 'Rangpur', '562665', 'f05799e4dc53b9b56e21c7c0535ea966', 'test', '[\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\",\"80\",\"81\",\"82\"]'),
('222330011003', 2223, 'Zahid Hasan', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 1, 1, 4, 1, 'Spring', 'Under Graduate', 'Day', 'zahid@gmail.com', '01775251044', 'male', 'AB+', 'Normal', 'download.png', 'mirpur 2', 'comilla', '5637438585', 'f05799e4dc53b9b56e21c7c0535ea966', 'test', '[\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\",\"80\",\"81\",\"82\"]'),
('222330011005', 2223, 'Sadman Israk Abir', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 1, 1, 4, 1, 'Spring', 'Under Graduate', 'Day', 'mamun@gmail.com', '01775251044', 'male', 'AB+', 'Normal', 'download.png', 'mirpur 2', 'Rangpur', '563786387', 'f05799e4dc53b9b56e21c7c0535ea966', 'test', '[\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\",\"80\",\"81\",\"82\"]'),
('222330011004', 2223, 'Atique Hasan', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 1, 1, 4, 1, 'Spring', 'Under Graduate', 'Day', 'atique@gmail.com', '01775251044', 'male', 'AB+', 'Normal', 'download.png', 'mirpur 2', 'Joypurhat', '58638735278', 'f05799e4dc53b9b56e21c7c0535ea966', 'test', '[\"12\",\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"23\",\"24\",\"25\",\"26\",\"27\",\"28\",\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\",\"37\",\"38\",\"39\",\"40\",\"41\",\"42\",\"43\",\"44\",\"45\",\"46\",\"47\",\"48\",\"49\",\"50\",\"51\",\"52\",\"53\",\"54\",\"55\",\"56\",\"57\",\"58\",\"59\",\"60\",\"61\",\"62\",\"63\",\"64\",\"65\",\"66\",\"67\",\"68\",\"69\",\"70\",\"71\",\"72\",\"73\",\"74\",\"75\",\"76\",\"77\",\"78\",\"79\",\"80\",\"81\",\"82\"]');

-- --------------------------------------------------------

--
-- Table structure for table `student_result`
--

CREATE TABLE `student_result` (
  `std_result_id` int(11) NOT NULL,
  `std_id` varchar(255) NOT NULL,
  `std_dept_id` int(11) NOT NULL,
  `std_intake_id` int(11) NOT NULL,
  `std_section_id` int(11) NOT NULL,
  `std_course_id` int(11) NOT NULL,
  `std_course_tchr_id` varchar(255) DEFAULT NULL,
  `std_courese_sem` varchar(255) NOT NULL,
  `std_result_thirty` double DEFAULT NULL,
  `std_result_mid` double DEFAULT NULL,
  `std_result_final` double DEFAULT NULL,
  `std_result_total` double DEFAULT NULL,
  `std_result_grade_latter` varchar(255) DEFAULT NULL,
  `std_result_grade_point` double DEFAULT NULL,
  `std_result_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_result`
--

INSERT INTO `student_result` (`std_result_id`, `std_id`, `std_dept_id`, `std_intake_id`, `std_section_id`, `std_course_id`, `std_course_tchr_id`, `std_courese_sem`, `std_result_thirty`, `std_result_mid`, `std_result_final`, `std_result_total`, `std_result_grade_latter`, `std_result_grade_point`, `std_result_status`) VALUES
(19, '222330011001', 8, 1, 4, 33, '2223300001', 'Spring-2022', 12, 10, 22, 44, 'D', 2, 'Passed'),
(20, '222330011001', 8, 1, 4, 14, '2223300003', 'Spring-2022', 22, 18, 28, 68, 'B+', 3.25, 'Passed'),
(21, '222330011001', 8, 1, 4, 26, '2223300004', 'Spring-2022', 22, 24, 28, 74, 'A-', 3.5, 'Passed'),
(22, '222330011001', 8, 1, 4, 13, '2223300005', 'Spring-2022', 18, 18, 24, 60, 'B', 3, 'Passed'),
(23, '222330011001', 8, 1, 4, 54, '2223300001', 'Spring-2022', 20, 20, 20, 60, 'B', 3, 'Passed'),
(24, '222330011002', 8, 1, 4, 33, '2223300001', 'Spring-2022', 13, 11, 23, 47, 'C', 2.25, 'Passed'),
(25, '222330011002', 8, 1, 4, 14, '2223300003', 'Spring-2022', 23, 21, 30, 74, 'A-', 3.5, 'Passed'),
(26, '222330011002', 8, 1, 4, 26, '2223300004', 'Spring-2022', 23, 22, 24, 69, 'B+', 3.25, 'Passed'),
(27, '222330011002', 8, 1, 4, 13, '2223300005', 'Spring-2022', 16, 20, 22, 58, 'B-', 2.75, 'Passed'),
(28, '222330011002', 8, 1, 4, 54, '2223300001', 'Spring-2022', 20, 22, 22, 64, 'B', 3, 'Passed'),
(29, '222330011003', 8, 1, 4, 33, '2223300001', 'Spring-2022', 15, 13, 24, 52, 'C+', 2.5, 'Passed'),
(30, '222330011003', 8, 1, 4, 14, '2223300003', 'Spring-2022', 20, 19, 24, 63, 'B', 3, 'Passed'),
(31, '222330011003', 8, 1, 4, 26, '2223300004', 'Spring-2022', 25, 23, 28, 76, 'A', 3.75, 'Passed'),
(32, '222330011003', 8, 1, 4, 13, '2223300005', 'Spring-2022', 18, 16, 20, 54, 'C+', 2.5, 'Passed'),
(33, '222330011003', 8, 1, 4, 54, '2223300001', 'Spring-2022', 21, 22, 26, 69, 'B+', 3.25, 'Passed'),
(34, '222330011004', 8, 1, 4, 33, '2223300001', 'Spring-2022', 17, 14, 25, 56, 'B-', 2.75, 'Passed'),
(35, '222330011004', 8, 1, 4, 14, '2223300003', 'Spring-2022', 20, 20, 30, 70, 'A-', 3.5, 'Passed'),
(36, '222330011004', 8, 1, 4, 26, '2223300004', 'Spring-2022', 18, 16, 19, 53, 'C+', 2.5, 'Passed'),
(37, '222330011004', 8, 1, 4, 13, '2223300005', 'Spring-2022', 20, 24, 27, 71, 'A-', 3.5, 'Passed'),
(38, '222330011004', 8, 1, 4, 54, '2223300001', 'Spring-2022', 18, 20, 21, 59, 'B-', 2.75, 'Passed'),
(39, '222330011005', 8, 1, 4, 33, '2223300001', 'Spring-2022', 19, 16, 26, 61, 'B', 3, 'Passed'),
(40, '222330011005', 8, 1, 4, 14, '2223300003', 'Spring-2022', 22, 21, 31, 74, 'A-', 3.5, 'Passed'),
(41, '222330011005', 8, 1, 4, 26, '2223300004', 'Spring-2022', 20, 18, 21, 59, 'B-', 2.75, 'Passed'),
(42, '222330011005', 8, 1, 4, 13, '2223300005', 'Spring-2022', 16, 15, 18, 49, 'C', 2.25, 'Passed'),
(43, '222330011005', 8, 1, 4, 54, '2223300001', 'Spring-2022', 15, 14, 22, 51, 'C+', 2.5, 'Passed'),
(44, '222330011006', 8, 1, 4, 33, '2223300001', 'Spring-2022', 20, 18, 29, 67, 'B+', 3.25, 'Passed'),
(45, '222330011006', 8, 1, 4, 14, '2223300003', 'Spring-2022', 18, 18, 22, 58, 'B-', 2.75, 'Passed'),
(46, '222330011006', 8, 1, 4, 26, '2223300004', 'Spring-2022', 27, 27, 31, 85, 'A+', 4, 'Passed'),
(47, '222330011006', 8, 1, 4, 13, '2223300005', 'Spring-2022', 15, 16, 19, 50, 'C+', 2.5, 'Passed'),
(48, '222330011006', 8, 1, 4, 54, '2223300001', 'Spring-2022', 21, 27, 30, 78, 'A', 3.75, 'Passed'),
(49, '222330011007', 8, 1, 4, 33, '2223300001', 'Spring-2022', 22, 20, 30, 72, 'A-', 3.5, 'Passed'),
(50, '222330011007', 8, 1, 4, 14, '2223300003', 'Spring-2022', 23, 22, 31, 76, 'A', 3.75, 'Passed'),
(51, '222330011007', 8, 1, 4, 26, '2223300004', 'Spring-2022', 24, 22, 28, 74, 'A-', 3.5, 'Passed'),
(52, '222330011007', 8, 1, 4, 13, '2223300005', 'Spring-2022', 23, 22, 32, 77, 'A', 3.75, 'Passed'),
(53, '222330011007', 8, 1, 4, 54, '2223300001', 'Spring-2022', 22, 23, 29, 74, 'A-', 3.5, 'Passed'),
(54, '222330011008', 8, 1, 4, 33, '2223300001', 'Spring-2022', 23, 22, 32, 77, 'A', 3.75, 'Passed'),
(55, '222330011008', 8, 1, 4, 14, '2223300003', 'Spring-2022', 25, 26, 33, 84, 'A+', 4, 'Passed'),
(56, '222330011008', 8, 1, 4, 26, '2223300004', 'Spring-2022', 21, 21, 27, 69, 'B+', 3.25, 'Passed'),
(57, '222330011008', 8, 1, 4, 13, '2223300005', 'Spring-2022', 24, 26, 34, 84, 'A+', 4, 'Passed'),
(58, '222330011008', 8, 1, 4, 54, '2223300001', 'Spring-2022', 25, 24, 31, 80, 'A+', 4, 'Passed'),
(59, '222330011009', 8, 1, 4, 33, '2223300001', 'Spring-2022', 25, 25, 34, 84, 'A+', 4, 'Passed'),
(60, '222330011009', 8, 1, 4, 14, '2223300003', 'Spring-2022', 26, 28, 36, 90, 'A+', 4, 'Passed'),
(61, '222330011009', 8, 1, 4, 26, '2223300004', 'Spring-2022', 22, 23, 29, 74, 'A-', 3.5, 'Passed'),
(62, '222330011009', 8, 1, 4, 13, '2223300005', 'Spring-2022', 18, 20, 18, 56, 'B-', 2.75, 'Passed'),
(63, '222330011009', 8, 1, 4, 54, '2223300001', 'Spring-2022', 24, 21, 26, 71, 'A-', 3.5, 'Passed'),
(64, '222330011010', 8, 1, 4, 33, '2223300001', 'Spring-2022', 20, 17, 26, 63, 'B', 3, 'Passed'),
(65, '222330011010', 8, 1, 4, 14, '2223300003', 'Spring-2022', 24, 23, 22, 69, 'B+', 3.25, 'Passed'),
(66, '222330011010', 8, 1, 4, 26, '2223300004', 'Spring-2022', 15, 14, 18, 47, 'C', 2.25, 'Passed'),
(67, '222330011010', 8, 1, 4, 13, '2223300005', 'Spring-2022', 20, 22, 28, 70, 'A-', 3.5, 'Passed'),
(68, '222330011010', 8, 1, 4, 54, '2223300001', 'Spring-2022', 19, 27, 34, 80, 'A+', 4, 'Passed'),
(69, '222330011011', 8, 1, 4, 33, '2223300001', 'Spring-2022', 20, 18, 27, 65, 'B+', 3.25, 'Passed'),
(70, '222330011011', 8, 1, 4, 14, '2223300003', 'Spring-2022', 20, 14, 20, 54, 'C+', 2.5, 'Passed'),
(71, '222330011011', 8, 1, 4, 26, '2223300004', 'Spring-2022', 16, 12, 16, 44, 'D', 2, 'Passed'),
(72, '222330011011', 8, 1, 4, 13, '2223300005', 'Spring-2022', 21, 23, 30, 74, 'A-', 3.5, 'Passed'),
(73, '222330011011', 8, 1, 4, 54, '2223300001', 'Spring-2022', 10, 15, 18, 43, 'D', 2, 'Passed'),
(74, '222330011012', 8, 1, 4, 33, '2223300001', 'Spring-2022', 20, 20, 26, 66, 'B+', 3.25, 'Passed'),
(75, '222330011012', 8, 1, 4, 14, '2223300003', 'Spring-2022', 18, 16, 18, 52, 'C+', 2.5, 'Passed'),
(76, '222330011012', 8, 1, 4, 26, '2223300004', 'Spring-2022', 21, 25, 26, 72, 'A-', 3.5, 'Passed'),
(77, '222330011012', 8, 1, 4, 13, '2223300005', 'Spring-2022', 19, 18, 22, 59, 'B-', 2.75, 'Passed'),
(78, '222330011012', 8, 1, 4, 54, '2223300001', 'Spring-2022', 17, 18, 23, 58, 'B-', 2.75, 'Passed'),
(79, '222330011013', 8, 1, 4, 33, '2223300001', 'Spring-2022', 20, 22, 28, 70, 'A-', 3.5, 'Passed'),
(80, '222330011013', 8, 1, 4, 14, '2223300003', 'Spring-2022', 16, 12, 17, 45, 'C', 2.25, 'Passed'),
(81, '222330011013', 8, 1, 4, 26, '2223300004', 'Spring-2022', 22, 21, 26, 69, 'B+', 3.25, 'Passed'),
(82, '222330011013', 8, 1, 4, 13, '2223300005', 'Spring-2022', 20, 17, 25, 62, 'B', 3, 'Passed'),
(83, '222330011013', 8, 1, 4, 54, '2223300001', 'Spring-2022', 20, 25, 20, 65, 'B+', 3.25, 'Passed'),
(84, '222330011014', 8, 1, 4, 33, '2223300001', 'Spring-2022', 21, 23, 29, 73, 'A-', 3.5, 'Passed'),
(85, '222330011014', 8, 1, 4, 14, '2223300003', 'Spring-2022', 10, 12, 22, 44, 'D', 2, 'Passed'),
(86, '222330011014', 8, 1, 4, 26, '2223300004', 'Spring-2022', 25, 26, 36, 87, 'A+', 4, 'Passed'),
(87, '222330011014', 8, 1, 4, 13, '2223300005', 'Spring-2022', 22, 19, 20, 61, 'B', 3, 'Passed'),
(88, '222330011014', 8, 1, 4, 54, '2223300001', 'Spring-2022', 22, 28, 34, 84, 'A+', 4, 'Passed'),
(89, '222330011015', 8, 1, 4, 33, '2223300001', 'Spring-2022', 20, 21, 27, 68, 'B+', 3.25, 'Passed'),
(90, '222330011015', 8, 1, 4, 14, '2223300003', 'Spring-2022', 20, 18, 20, 58, 'B-', 2.75, 'Passed'),
(91, '222330011015', 8, 1, 4, 26, '2223300004', 'Spring-2022', 27, 28, 37, 92, 'A+', 4, 'Passed'),
(92, '222330011015', 8, 1, 4, 13, '2223300005', 'Spring-2022', 21, 20, 22, 63, 'B', 3, 'Passed'),
(93, '222330011015', 8, 1, 4, 54, '2223300001', 'Spring-2022', 12, 18, 18, 48, 'C', 2.25, 'Passed'),
(94, '222330011001', 8, 1, 4, 36, '2223300002', 'Fall-2022', 18, 16, 20, 54, 'C+', 2.5, 'Passed'),
(95, '222330011001', 8, 1, 4, 19, '2223300005', 'Fall-2022', 22, 19, 25, 66, 'B+', 3.25, 'Passed'),
(96, '222330011001', 8, 1, 4, 39, '2223300003', 'Fall-2022', 22, 21, 25, 68, 'B+', 3.25, 'Passed'),
(97, '222330011001', 8, 1, 4, 65, '2223300002', 'Fall-2022', 19, 19, 22, 60, 'B', 3, 'Passed'),
(98, '222330011001', 8, 1, 4, 22, '2223300004', 'Fall-2022', 20, 22, 29, 71, 'A-', 3.5, 'Passed'),
(99, '222330011001', 8, 1, 4, 12, '2223300003', 'Fall-2022', 20, 18, 23, 61, 'B', 3, 'Passed'),
(100, '222330011002', 8, 1, 4, 36, '2223300002', 'Fall-2022', 19, 18, 22, 59, 'B-', 2.75, 'Passed'),
(101, '222330011002', 8, 1, 4, 19, '2223300005', 'Fall-2022', 20, 20, 24, 64, 'B', 3, 'Passed'),
(102, '222330011002', 8, 1, 4, 39, '2223300003', 'Fall-2022', 23, 22, 28, 73, 'A-', 3.5, 'Passed'),
(103, '222330011002', 8, 1, 4, 65, '2223300002', 'Fall-2022', 22, 20, 24, 66, 'B+', 3.25, 'Passed'),
(104, '222330011002', 8, 1, 4, 22, '2223300004', 'Fall-2022', 20, 17, 20, 57, 'B-', 2.75, 'Passed'),
(105, '222330011002', 8, 1, 4, 12, '2223300003', 'Fall-2022', 24, 19, 25, 68, 'B+', 3.25, 'Passed'),
(106, '222330011003', 8, 1, 4, 36, '2223300002', 'Fall-2022', 21, 22, 27, 70, 'A-', 3.5, 'Passed'),
(107, '222330011003', 8, 1, 4, 19, '2223300005', 'Fall-2022', 22, 24, 24, 70, 'A-', 3.5, 'Passed'),
(108, '222330011003', 8, 1, 4, 39, '2223300003', 'Fall-2022', 20, 18, 25, 63, 'B', 3, 'Passed'),
(109, '222330011003', 8, 1, 4, 65, '2223300002', 'Fall-2022', 20, 25, 26, 71, 'A-', 3.5, 'Passed'),
(110, '222330011003', 8, 1, 4, 22, '2223300004', 'Fall-2022', 21, 20, 23, 64, 'B', 3, 'Passed'),
(111, '222330011003', 8, 1, 4, 12, '2223300003', 'Fall-2022', 23, 21, 24, 68, 'B+', 3.25, 'Passed'),
(112, '222330011004', 8, 1, 4, 36, '2223300002', 'Fall-2022', 22, 25, 28, 75, 'A', 3.75, 'Passed'),
(113, '222330011004', 8, 1, 4, 19, '2223300005', 'Fall-2022', 19, 23, 28, 70, 'A-', 3.5, 'Passed'),
(114, '222330011004', 8, 1, 4, 39, '2223300003', 'Fall-2022', 21, 20, 27, 68, 'B+', 3.25, 'Passed'),
(115, '222330011004', 8, 1, 4, 65, '2223300002', 'Fall-2022', 18, 18, 21, 57, 'B-', 2.75, 'Passed'),
(116, '222330011004', 8, 1, 4, 22, '2223300004', 'Fall-2022', 18, 22, 29, 69, 'B+', 3.25, 'Passed'),
(117, '222330011004', 8, 1, 4, 12, '2223300003', 'Fall-2022', 24, 22, 25, 71, 'A-', 3.5, 'Passed'),
(118, '222330011005', 8, 1, 4, 36, '2223300002', 'Fall-2022', 25, 26, 32, 83, 'A+', 4, 'Passed'),
(119, '222330011005', 8, 1, 4, 19, '2223300005', 'Fall-2022', 21, 21, 28, 70, 'A-', 3.5, 'Passed'),
(120, '222330011005', 8, 1, 4, 39, '2223300003', 'Fall-2022', 22, 21, 28, 71, 'A-', 3.5, 'Passed'),
(121, '222330011005', 8, 1, 4, 65, '2223300002', 'Fall-2022', 20, 20, 22, 62, 'B', 3, 'Passed'),
(122, '222330011005', 8, 1, 4, 22, '2223300004', 'Fall-2022', 22, 23, 32, 77, 'A', 3.75, 'Passed'),
(123, '222330011005', 8, 1, 4, 12, '2223300003', 'Fall-2022', 25, 24, 26, 75, 'A', 3.75, 'Passed'),
(124, '222330011006', 8, 1, 4, 36, '2223300002', 'Fall-2022', 18, 17, 16, 51, 'C+', 2.5, 'Passed'),
(125, '222330011006', 8, 1, 4, 19, '2223300005', 'Fall-2022', 19, 15, 22, 56, 'B-', 2.75, 'Passed'),
(126, '222330011006', 8, 1, 4, 39, '2223300003', 'Fall-2022', 18, 19, 22, 59, 'B-', 2.75, 'Passed'),
(127, '222330011006', 8, 1, 4, 65, '2223300002', 'Fall-2022', 18, 18, 20, 56, 'B-', 2.75, 'Passed'),
(128, '222330011006', 8, 1, 4, 22, '2223300004', 'Fall-2022', 20, 20, 24, 64, 'B', 3, 'Passed'),
(129, '222330011006', 8, 1, 4, 12, '2223300003', 'Fall-2022', 18, 17, 21, 56, 'B-', 2.75, 'Passed'),
(130, '222330011007', 8, 1, 4, 36, '2223300002', 'Fall-2022', 24, 25, 29, 78, 'A', 3.75, 'Passed'),
(131, '222330011007', 8, 1, 4, 19, '2223300005', 'Fall-2022', 23, 24, 29, 76, 'A', 3.75, 'Passed'),
(132, '222330011007', 8, 1, 4, 39, '2223300003', 'Fall-2022', 25, 25, 32, 82, 'A+', 4, 'Passed'),
(133, '222330011007', 8, 1, 4, 65, '2223300002', 'Fall-2022', 24, 24, 32, 80, 'A+', 4, 'Passed'),
(134, '222330011007', 8, 1, 4, 22, '2223300004', 'Fall-2022', 24, 26, 29, 79, 'A', 3.75, 'Passed'),
(135, '222330011007', 8, 1, 4, 12, '2223300003', 'Fall-2022', 25, 25, 30, 80, 'A+', 4, 'Passed'),
(136, '222330011008', 8, 1, 4, 36, '2223300002', 'Fall-2022', 25, 26, 31, 82, 'A+', 4, 'Passed'),
(137, '222330011008', 8, 1, 4, 19, '2223300005', 'Fall-2022', 24, 25, 32, 81, 'A+', 4, 'Passed'),
(138, '222330011008', 8, 1, 4, 39, '2223300003', 'Fall-2022', 24, 25, 30, 79, 'A', 3.75, 'Passed'),
(139, '222330011008', 8, 1, 4, 65, '2223300002', 'Fall-2022', 25, 22, 30, 77, 'A', 3.75, 'Passed'),
(140, '222330011008', 8, 1, 4, 22, '2223300004', 'Fall-2022', 25, 26, 32, 83, 'A+', 4, 'Passed'),
(141, '222330011008', 8, 1, 4, 12, '2223300003', 'Fall-2022', 24, 26, 32, 82, 'A+', 4, 'Passed'),
(142, '222330011009', 8, 1, 4, 36, '2223300002', 'Fall-2022', 18, 15, 20, 53, 'C+', 2.5, 'Passed'),
(143, '222330011009', 8, 1, 4, 19, '2223300005', 'Fall-2022', 19, 16, 22, 57, 'B-', 2.75, 'Passed'),
(144, '222330011009', 8, 1, 4, 39, '2223300003', 'Fall-2022', 18, 16, 19, 53, 'C+', 2.5, 'Passed'),
(145, '222330011009', 8, 1, 4, 65, '2223300002', 'Fall-2022', 18, 16, 20, 54, 'C+', 2.5, 'Passed'),
(146, '222330011009', 8, 1, 4, 22, '2223300004', 'Fall-2022', 18, 17, 20, 55, 'B-', 2.75, 'Passed'),
(147, '222330011009', 8, 1, 4, 12, '2223300003', 'Fall-2022', 18, 16, 20, 54, 'C+', 2.5, 'Passed'),
(148, '222330011010', 8, 1, 4, 36, '2223300002', 'Fall-2022', 20, 20, 24, 64, 'B', 3, 'Passed'),
(149, '222330011010', 8, 1, 4, 19, '2223300005', 'Fall-2022', 20, 23, 28, 71, 'A-', 3.5, 'Passed'),
(150, '222330011010', 8, 1, 4, 39, '2223300003', 'Fall-2022', 20, 22, 22, 64, 'B', 3, 'Passed'),
(151, '222330011010', 8, 1, 4, 65, '2223300002', 'Fall-2022', 20, 20, 25, 65, 'B+', 3.25, 'Passed'),
(152, '222330011010', 8, 1, 4, 22, '2223300004', 'Fall-2022', 20, 22, 26, 68, 'B+', 3.25, 'Passed'),
(153, '222330011010', 8, 1, 4, 12, '2223300003', 'Fall-2022', 20, 22, 24, 66, 'B+', 3.25, 'Passed'),
(154, '222330011011', 8, 1, 4, 36, '2223300002', 'Fall-2022', 20, 16, 20, 56, 'B-', 2.75, 'Passed'),
(155, '222330011011', 8, 1, 4, 19, '2223300005', 'Fall-2022', 20, 18, 20, 58, 'B-', 2.75, 'Passed'),
(156, '222330011011', 8, 1, 4, 39, '2223300003', 'Fall-2022', 18, 19, 20, 57, 'B-', 2.75, 'Passed'),
(157, '222330011011', 8, 1, 4, 65, '2223300002', 'Fall-2022', 18, 16, 22, 56, 'B-', 2.75, 'Passed'),
(158, '222330011011', 8, 1, 4, 22, '2223300004', 'Fall-2022', 21, 19, 24, 64, 'B', 3, 'Passed'),
(159, '222330011011', 8, 1, 4, 12, '2223300003', 'Fall-2022', 21, 18, 25, 64, 'B', 3, 'Passed'),
(160, '222330011012', 8, 1, 4, 36, '2223300002', 'Fall-2022', 15, 17, 20, 52, 'C+', 2.5, 'Passed'),
(161, '222330011012', 8, 1, 4, 19, '2223300005', 'Fall-2022', 20, 20, 21, 61, 'B', 3, 'Passed'),
(162, '222330011012', 8, 1, 4, 39, '2223300003', 'Fall-2022', 20, 20, 22, 62, 'B', 3, 'Passed'),
(163, '222330011012', 8, 1, 4, 65, '2223300002', 'Fall-2022', 18, 18, 24, 60, 'B', 3, 'Passed'),
(164, '222330011012', 8, 1, 4, 22, '2223300004', 'Fall-2022', 22, 18, 27, 67, 'B+', 3.25, 'Passed'),
(165, '222330011012', 8, 1, 4, 12, '2223300003', 'Fall-2022', 22, 20, 26, 68, 'B+', 3.25, 'Passed'),
(166, '222330011013', 8, 1, 4, 36, '2223300002', 'Fall-2022', 24, 22, 26, 72, 'A-', 3.5, 'Passed'),
(167, '222330011013', 8, 1, 4, 19, '2223300005', 'Fall-2022', 21, 21, 24, 66, 'B+', 3.25, 'Passed'),
(168, '222330011013', 8, 1, 4, 39, '2223300003', 'Fall-2022', 18, 16, 20, 54, 'C+', 2.5, 'Passed'),
(169, '222330011013', 8, 1, 4, 65, '2223300002', 'Fall-2022', 20, 21, 25, 66, 'B+', 3.25, 'Passed'),
(170, '222330011013', 8, 1, 4, 22, '2223300004', 'Fall-2022', 20, 15, 23, 58, 'B-', 2.75, 'Passed'),
(171, '222330011013', 8, 1, 4, 12, '2223300003', 'Fall-2022', 20, 19, 27, 66, 'B+', 3.25, 'Passed'),
(172, '222330011014', 8, 1, 4, 36, '2223300002', 'Fall-2022', 21, 19, 23, 63, 'B', 3, 'Passed'),
(173, '222330011014', 8, 1, 4, 19, '2223300005', 'Fall-2022', 24, 26, 31, 81, 'A+', 4, 'Passed'),
(174, '222330011014', 8, 1, 4, 39, '2223300003', 'Fall-2022', 25, 25, 30, 80, 'A+', 4, 'Passed'),
(175, '222330011014', 8, 1, 4, 65, '2223300002', 'Fall-2022', 24, 21, 25, 70, 'A-', 3.5, 'Passed'),
(176, '222330011014', 8, 1, 4, 22, '2223300004', 'Fall-2022', 22, 22, 28, 72, 'A-', 3.5, 'Passed'),
(177, '222330011014', 8, 1, 4, 12, '2223300003', 'Fall-2022', 25, 25, 32, 82, 'A+', 4, 'Passed'),
(178, '222330011015', 8, 1, 4, 36, '2223300002', 'Fall-2022', 20, 16, 18, 54, 'C+', 2.5, 'Passed'),
(179, '222330011015', 8, 1, 4, 19, '2223300005', 'Fall-2022', 20, 20, 24, 64, 'B', 3, 'Passed'),
(180, '222330011015', 8, 1, 4, 39, '2223300003', 'Fall-2022', 18, 15, 19, 52, 'C+', 2.5, 'Passed'),
(181, '222330011015', 8, 1, 4, 65, '2223300002', 'Fall-2022', 15, 20, 22, 57, 'B-', 2.75, 'Passed'),
(182, '222330011015', 8, 1, 4, 22, '2223300004', 'Fall-2022', 15, 15, 19, 49, 'C', 2.25, 'Passed'),
(183, '222330011015', 8, 1, 4, 12, '2223300003', 'Fall-2022', 18, 17, 19, 54, 'C+', 2.5, 'Passed'),
(184, '222330021001', 8, 2, 6, 33, '2223300001', 'Fall-2022', 18, 16, 19, 53, 'C+', 2.5, 'Passed'),
(185, '222330021001', 8, 2, 6, 14, '2223300003', 'Fall-2022', 20, 14, 18, 52, 'C+', 2.5, 'Passed'),
(186, '222330021001', 8, 2, 6, 26, '2223300004', 'Fall-2022', 18, 15, 20, 53, 'C+', 2.5, 'Passed'),
(187, '222330021001', 8, 2, 6, 13, '2223300005', 'Fall-2022', 20, 14, 20, 54, 'C+', 2.5, 'Passed'),
(188, '222330021001', 8, 2, 6, 54, '2223300001', 'Fall-2022', 20, 20, 22, 62, 'B', 3, 'Passed'),
(189, '222330021002', 8, 2, 6, 33, '2223300001', 'Fall-2022', 20, 21, 26, 67, 'B+', 3.25, 'Passed'),
(190, '222330021002', 8, 2, 6, 14, '2223300003', 'Fall-2022', 22, 19, 27, 68, 'B+', 3.25, 'Passed'),
(191, '222330021002', 8, 2, 6, 26, '2223300004', 'Fall-2022', 21, 20, 25, 66, 'B+', 3.25, 'Passed'),
(192, '222330021002', 8, 2, 6, 13, '2223300005', 'Fall-2022', 19, 20, 27, 66, 'B+', 3.25, 'Passed'),
(193, '222330021002', 8, 2, 6, 54, '2223300001', 'Fall-2022', 22, 23, 24, 69, 'B+', 3.25, 'Passed'),
(194, '222330021003', 8, 2, 6, 33, '2223300001', 'Fall-2022', 21, 22, 25, 68, 'B+', 3.25, 'Passed'),
(195, '222330021003', 8, 2, 6, 14, '2223300003', 'Fall-2022', 20, 15, 21, 56, 'B-', 2.75, 'Passed'),
(196, '222330021003', 8, 2, 6, 26, '2223300004', 'Fall-2022', 19, 19, 20, 58, 'B-', 2.75, 'Passed'),
(197, '222330021003', 8, 2, 6, 13, '2223300005', 'Fall-2022', 18, 19, 21, 58, 'B-', 2.75, 'Passed'),
(198, '222330021003', 8, 2, 6, 54, '2223300001', 'Fall-2022', 24, 21, 18, 63, 'B', 3, 'Passed'),
(199, '222330021005', 8, 2, 6, 33, '2223300001', 'Fall-2022', 25, 23, 27, 75, 'A', 3.75, 'Passed'),
(200, '222330021005', 8, 2, 6, 14, '2223300003', 'Fall-2022', 23, 19, 22, 64, 'B', 3, 'Passed'),
(201, '222330021005', 8, 2, 6, 26, '2223300004', 'Fall-2022', 21, 16, 23, 60, 'B', 3, 'Passed'),
(202, '222330021005', 8, 2, 6, 13, '2223300005', 'Fall-2022', 21, 18, 24, 63, 'B', 3, 'Passed'),
(203, '222330021005', 8, 2, 6, 54, '2223300001', 'Fall-2022', 25, 25, 30, 80, 'A+', 4, 'Passed'),
(204, '222330021004', 8, 2, 6, 33, '2223300001', 'Fall-2022', 24, 21, 24, 69, 'B+', 3.25, 'Passed'),
(205, '222330021004', 8, 2, 6, 14, '2223300003', 'Fall-2022', 25, 22, 28, 75, 'A', 3.75, 'Passed'),
(206, '222330021004', 8, 2, 6, 26, '2223300004', 'Fall-2022', 22, 25, 32, 79, 'A', 3.75, 'Passed'),
(207, '222330021004', 8, 2, 6, 13, '2223300005', 'Fall-2022', 24, 18, 20, 62, 'B', 3, 'Passed'),
(208, '222330021004', 8, 2, 6, 54, '2223300001', 'Fall-2022', 24, 26, 24, 74, 'A-', 3.5, 'Passed'),
(209, '222330021001', 8, 2, 6, 36, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(210, '222330021001', 8, 2, 6, 19, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(211, '222330021001', 8, 2, 6, 39, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(212, '222330021001', 8, 2, 6, 65, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(213, '222330021001', 8, 2, 6, 22, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(214, '222330021001', 8, 2, 6, 12, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(215, '222330021002', 8, 2, 6, 36, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(216, '222330021002', 8, 2, 6, 19, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(217, '222330021002', 8, 2, 6, 39, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(218, '222330021002', 8, 2, 6, 65, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(219, '222330021002', 8, 2, 6, 22, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(220, '222330021002', 8, 2, 6, 12, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(221, '222330021003', 8, 2, 6, 36, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(222, '222330021003', 8, 2, 6, 19, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(223, '222330021003', 8, 2, 6, 39, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(224, '222330021003', 8, 2, 6, 65, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(225, '222330021003', 8, 2, 6, 22, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(226, '222330021003', 8, 2, 6, 12, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(227, '222330021004', 8, 2, 6, 36, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(228, '222330021004', 8, 2, 6, 19, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(229, '222330021004', 8, 2, 6, 39, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(230, '222330021004', 8, 2, 6, 65, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(231, '222330021004', 8, 2, 6, 22, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(232, '222330021004', 8, 2, 6, 12, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(233, '222330021005', 8, 2, 6, 36, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(234, '222330021005', 8, 2, 6, 19, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(235, '222330021005', 8, 2, 6, 39, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(236, '222330021005', 8, 2, 6, 65, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(237, '222330021005', 8, 2, 6, 22, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(238, '222330021005', 8, 2, 6, 12, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(239, '222330011001', 8, 1, 4, 20, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(240, '222330011001', 8, 1, 4, 21, NULL, 'Summer-2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teach_id` varchar(255) NOT NULL,
  `teach_name` varchar(255) NOT NULL,
  `teach_short_code` varchar(255) NOT NULL,
  `teach_password` varchar(255) NOT NULL,
  `teach_room_no` varchar(255) NOT NULL,
  `teach_dept_id` int(11) NOT NULL,
  `teach_dept` varchar(255) NOT NULL,
  `teach_email` varchar(255) NOT NULL,
  `teach_contact_no` varchar(255) NOT NULL,
  `teach_designation` varchar(255) NOT NULL,
  `teach_image` varchar(255) NOT NULL,
  `teach_current_address` varchar(255) NOT NULL,
  `teach_permanent_address` varchar(255) NOT NULL,
  `teach_university` varchar(255) NOT NULL,
  `teach_qualification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teach_id`, `teach_name`, `teach_short_code`, `teach_password`, `teach_room_no`, `teach_dept_id`, `teach_dept`, `teach_email`, `teach_contact_no`, `teach_designation`, `teach_image`, `teach_current_address`, `teach_permanent_address`, `teach_university`, `teach_qualification`) VALUES
('2223300001', 'Arunavo Dey', 'AD', 'e10adc3949ba59abbe56e057f20f883e', '910', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'arko@gmail.com', '01756007000', 'Assistant Professor', 'download.png', 'Mirpur 2', 'Dhanmondi', 'Buet', 'test'),
('2223300002', 'Shamim Reja Sajib', 'SRS', 'e10adc3949ba59abbe56e057f20f883e', '910', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'sajib@gmail.com', '01756007001', 'Assistant Professor', 'DSC_0001.jpg', 'Mirpur 2', 'Savar', 'DU', 'test'),
('2223300003', 'Jahangir Alam', 'JA', 'e10adc3949ba59abbe56e057f20f883e', '318', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'ja@gmail.com', '01756007002', 'Assistant Professor', 'download.png', 'Mirpur 2', 'Jamalpur', 'DU', 'test'),
('2223300004', 'Sumi Khatun', 'SK', 'e10adc3949ba59abbe56e057f20f883e', '318', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'sumi@gmail.com', '01756007003', 'Lecturer', 'download.png', 'Mirpur 2', 'Dhanmondi', 'DU', 'test'),
('2223300005', 'Faisal Badsha', 'FB', 'e10adc3949ba59abbe56e057f20f883e', '910', 8, 'B.Sc. in Computer Science & Engineering (CSE)', 'faisal@gmail.com', '01756007004', 'Assistant Professor', 'download.png', 'Mirpur 2', 'Mirpur 2', 'Buet', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `university_info`
--

CREATE TABLE `university_info` (
  `university_code` varchar(255) NOT NULL,
  `university_name` varchar(255) NOT NULL,
  `university_logo` varchar(255) NOT NULL,
  `university_image` varchar(255) NOT NULL,
  `university_location` varchar(255) NOT NULL,
  `university_approval` varchar(255) NOT NULL,
  `university_type` varchar(255) NOT NULL,
  `university_category` varchar(255) NOT NULL,
  `university_details` varchar(255) NOT NULL,
  `university_email` varchar(255) NOT NULL,
  `university_contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `university_info`
--

INSERT INTO `university_info` (`university_code`, `university_name`, `university_logo`, `university_image`, `university_location`, `university_approval`, `university_type`, `university_category`, `university_details`, `university_email`, `university_contact`) VALUES
('7000', 'BANGLADESH UNIVERSITY OF BUSINESS AND TECHNOLOGY', 'bubt_logo.png', 'uni_lanscape_2_2.jpg', 'Plot # 77-78, Road # 9, Rupnagar R/A Mirpur-2 Dhaka, Dhaka 1216', 'APPROVED', 'PRIVATE', 'ENGINEERING & BBA', 'Bangladesh University of Business and Technology or BUBT is a private university in Bangladesh, located in Mirpur, Dhaka, Bangladesh. The university was established under the Private University Act 1992', 'info@bubt.edu.bd', '01810-033733');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_assign`
--
ALTER TABLE `course_assign`
  ADD PRIMARY KEY (`course_assign_id`);

--
-- Indexes for table `course_registration`
--
ALTER TABLE `course_registration`
  ADD PRIMARY KEY (`course_reg_id`);

--
-- Indexes for table `current_semester`
--
ALTER TABLE `current_semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_id`,`dept_code`);

--
-- Indexes for table `intake`
--
ALTER TABLE `intake`
  ADD PRIMARY KEY (`intake_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `students_basic`
--
ALTER TABLE `students_basic`
  ADD PRIMARY KEY (`std_birth_id`);

--
-- Indexes for table `student_result`
--
ALTER TABLE `student_result`
  ADD PRIMARY KEY (`std_result_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teach_id`);

--
-- Indexes for table `university_info`
--
ALTER TABLE `university_info`
  ADD PRIMARY KEY (`university_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `course_assign`
--
ALTER TABLE `course_assign`
  MODIFY `course_assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `course_registration`
--
ALTER TABLE `course_registration`
  MODIFY `course_reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `current_semester`
--
ALTER TABLE `current_semester`
  MODIFY `semester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `intake`
--
ALTER TABLE `intake`
  MODIFY `intake_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_result`
--
ALTER TABLE `student_result`
  MODIFY `std_result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
