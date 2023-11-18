-- Create tables
CREATE TABLE `admins` (
  `admin_id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) DEFAULT NULL,
  `first_name` VARCHAR(255) DEFAULT NULL,
  `last_name` VARCHAR(255) DEFAULT NULL,
  `email` VARCHAR(255) DEFAULT NULL,
  `gender` ENUM('Male','Female') DEFAULT NULL,
  `password` VARCHAR(255) DEFAULT NULL,
  `phone` BIGINT(20) DEFAULT NULL,
  `dob` DATE DEFAULT NULL
);

CREATE TABLE `instructors` (
  `instructor_id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) DEFAULT NULL,
  `first_name` VARCHAR(255) DEFAULT NULL,
  `last_name` VARCHAR(255) DEFAULT NULL,
  `email` VARCHAR(255) DEFAULT NULL,
  `phone` BIGINT(20) DEFAULT NULL,
  `dob` DATE DEFAULT NULL,
  `password` VARCHAR(255) DEFAULT NULL
);

CREATE TABLE `students` (
  `student_id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) DEFAULT NULL,
  `first_name` VARCHAR(255) DEFAULT NULL,
  `last_name` VARCHAR(255) DEFAULT NULL,
  `email` VARCHAR(255) DEFAULT NULL,
  `phone` BIGINT(20) DEFAULT NULL,
  `dob` DATE DEFAULT NULL,
  `password` VARCHAR(255) DEFAULT NULL
);

CREATE TABLE `sessions` (
  `session_id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `session_name` VARCHAR(255) DEFAULT NULL,
  `year` VARCHAR(4) DEFAULT NULL,
  `start_date` DATE DEFAULT NULL,
  `end_date` DATE DEFAULT NULL
);

CREATE TABLE `courses` (
  `course_id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `course_name` VARCHAR(255) DEFAULT NULL,
  `course_code` VARCHAR(50) DEFAULT NULL
);

CREATE TABLE `classes` (
  `class_id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `section` VARCHAR(255) DEFAULT NULL,
  `course_id` INT(11) DEFAULT NULL,
  `session_id` INT(11) DEFAULT NULL,
  FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  FOREIGN KEY (`session_id`) REFERENCES `sessions` (`session_id`)
);

CREATE TABLE `schedules` (
  `schedule_id` INT(11) NOT NULL,
  `class_id` INT(11) DEFAULT NULL,
  `instructor_id` INT(11) DEFAULT NULL,
  `student_id` INT(11) DEFAULT NULL,
  `schedule` DATETIME DEFAULT NULL,
  `status` ENUM('Active','Expired') DEFAULT NULL,
  FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`),
  FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`instructor_id`),
  FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`)
);

CREATE TABLE `attendance` (
  `attendance_id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `class_id` INT(11) DEFAULT NULL,
  `instructor_id` INT(11) DEFAULT NULL,
  `student_id` INT(11) DEFAULT NULL,
  `course_id` INT(11) DEFAULT NULL,
  `date` DATE DEFAULT NULL,
  `status` ENUM('Present','Absent') DEFAULT NULL,
  FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`),
  FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`instructor_id`),
  FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`)
);

CREATE TABLE `leaves` (
  `leave_request_id` INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `student_id` INT(11) DEFAULT NULL,
  `instructor_id` INT(11) DEFAULT NULL,
  `class_id` INT(11) DEFAULT NULL,
  `request_date` DATE DEFAULT NULL,
  `status` ENUM('Pending','Approved','Denied') DEFAULT NULL,
  `reason` TEXT DEFAULT NULL,
  `response_date` DATE DEFAULT NULL,
  FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`instructor_id`),
  FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`)
);

-- Insert data
INSERT INTO `admins` (`admin_id`, `username`, `first_name`, `last_name`, `email`, `gender`, `password`, `phone`, `dob`) VALUES
(101, 'admin', 'Admin', 'One', 'admin@mail.com', 'Male', '827ccb0eea8a706c4c34a16891f84e7b', 17345478924, '1989-03-01');

INSERT INTO `instructors` (`instructor_id`, `username`, `first_name`, `last_name`, `email`, `phone`, `dob`, `password`) VALUES
(1135500, 'john', 'John', 'Doe', 'john@mail.com', 15646471226, '1996-10-03', '827ccb0eea8a706c4c34a16891f84e7b'),
(2437508, 'hunter', 'Hunter', 'Adams', 'hunter@mail.com', 14375878626, '1995-04-11', '827ccb0eea8a706c4c34a16891f84e7b'),
(1790009, 'dan', 'Dan', 'Blitz', 'danny@mail.com', 13555471922, '1992-02-09', '827ccb0eea8a706c4c34a16891f84e7b'),
(1008412, 'tim', 'Tim', 'Ruscia', 'tim@mail.com', 14446478330, '1991-12-17', '827ccb0eea8a706c4c34a16891f84e7b'),
(1122565, 'deepa', 'Deepa', 'G', 'deepa@gmail.com', 9402252236, '2023-10-09', '29987ce14a9c7b9137f616843eca049b');

INSERT INTO `students` (`student_id`, `username`, `first_name`, `last_name`, `email`, `phone`, `dob`, `password`) VALUES
(1100432, 'student', 'Student', 'One', 'student@mail.com', 13447118819, '2006-02-07', '827ccb0eea8a706c4c34a16891f84e7b'),
(1003421, 'travis', 'Travis', 'Hopkins', 'travis@mail.com', 19045052911, '2006-02-13', '827ccb0eea8a706c4c34a16891f84e7b'),
(1004576, 'chow', 'Chow', 'Ding', 'chow@mail.com', 12005058821, '2007-09-02', '7a53bde2dde88f0a9c39794f6567cdf5'),
(1103261, 'raj', 'Raj', 'kc', 'raj@student.com', 9842025566, '2023-07-05', '65a1223dae83b8092c4edba0823a793c'),
(1185665, 'brb', 'BRB', 'brb', 'brb@student.com', 9402256656, '2023-10-10', 'b992bdb865efa8b3b7333d0458323f4e'),
(1425366, 'dhreej', 'Dhreej', 'Dhreej', 'dhreej@student.com', 94253665222, '2023-10-10', 'b850ec547891bb8665dede6deda28a6e');

INSERT INTO `sessions` (`session_id`, `session_name`, `year`, `start_date`, `end_date`) VALUES 
(1001, 'Summer 2018', '2018', '2018-01-15', '2018-03-30'),
(1002,'Fall 2019', '2019', '2019-09-01', '2019-10-30'),
(1003,'Spring 2019', '2019', '2019-11-01', '2019-12-15'),
(1004,'Summer 2019', '2019', '2019-01-15', '2019-03-30'),
(1005,'Fall 2020', '2020', '2020-09-01', '2020-10-30'),
(1006,'Spring 2020', '2020', '2020-11-01', '2020-12-15'),
(1007,'Summer 2020', '2020', '2020-01-15', '2020-03-30'),
(1008,'Fall 2021', '2021', '2021-09-01', '2021-10-30'),
(1009,'Spring 2021', '2021', '2021-11-01', '2021-12-15'),
(1010,'Summer 2021', '2021', '2021-01-15', '2021-03-30'),
(1011,'Fall 2022', '2022', '2022-09-01', '2022-10-30'),
(1012,'Spring 2022', '2022', '2022-11-01', '2022-12-15'),
(1013,'Summer 2022', '2022', '2022-01-15', '2022-03-30'),
(1014,'Fall 2023', '2023', '2023-09-01', '2023-10-30'),
(1015,'Spring 2023', '2023', '2023-11-01', '2023-12-15'),
(1016,'Summer 2023', '2023', '2023-01-15', '2023-03-30'),
(1017,'Fall 2024', '2024', '2024-09-01', '2024-10-30'),
(1018,'Spring 2024', '2024', '2024-11-01', '2024-12-15'),
(1019,'Summer 2024', '2024', '2024-01-15', '2024-03-30'),
(1020,'Fall 2025', '2025', '2025-09-01', '2025-10-30'),
(1021,'Spring 2025', '2025', '2025-11-01', '2025-12-15');

INSERT INTO `courses` (`course_id`, `course_name`, `course_code`) VALUES 
(501, 'Fundamentals of Data Analytics', 'DTSC 5501'),
(502, 'Principles and Techniques for Data Science', 'DTSC 5502'),
(503, 'Applied Machine Learning for Data Scientists', 'INFO 5505'),
(505, 'Enterprise Applications of Business Intelligence', 'DSCI 5330'),
(506, 'Predictive Analytics and Business Forecasting', 'DSCI 5340'),
(507, 'Information Behavior', 'INFO 5040'),
(508, 'Information Ethics', 'INFO 5206'),
(509, 'Data Mining and Knowledge Discovery', 'DTSC 5503'),
(510, 'Big Data Analytics', 'DTSC 5504'),
(511, 'Natural Language Processing', 'INFO 5506'),
(512, 'Deep Learning for Data Science', 'DTSC 5507'),
(513, 'Data Visualization and Communication', 'DSCI 5331'),
(514, 'Time Series Analysis', 'DSCI 5341'),
(515, 'Statistical Methods in Data Science', 'DSCI 5332'),
(516, 'Data Science Capstone Project', 'DTSC 5599'),
(517, 'Machine Learning for Business Applications', 'DSCI 5333'),
(518, 'Text Analytics', 'INFO 5507'),
(519, 'Data Warehousing and Business Intelligence', 'DSCI 5334'),
(520, 'Data Governance and Ethics', 'DTSC 5508'),
(521, 'Advanced Data Visualization', 'DSCI 5335'),
(522, 'Big Data Technologies', 'DTSC 5509'),
(523, 'Machine Learning for Healthcare', 'DTSC 5510');

INSERT INTO `classes` (`class_id`, `section`, `course_id`, `session_id`) VALUES
(601, 'Section 001', 501, 1001),
(602, 'Section 002', 502, 1001);

INSERT INTO `schedules` (`schedule_id`, `class_id`, `instructor_id`, `student_id`, `schedule`, `status`) VALUES
(701, 601, 1135500, 1425366, '2018-01-16 11:00:00', 'Active'),
(701, 601, 1135500, 1185665, '2018-01-16 11:00:00', 'Active'),
(701, 601, 1135500, 1103261, '2018-01-16 11:00:00', 'Active'),
(702, 602, 2437508, 1004576, '2018-01-16 11:00:00', 'Active'),
(702, 602, 2437508, 1003421, '2018-01-16 11:00:00', 'Active'),
(702, 602, 2437508, 1100432, '2018-01-16 11:00:00', 'Active');

INSERT INTO `leaves` (`leave_request_id`, `student_id`, `instructor_id`, `class_id`, `request_date`, `status`, `reason`, `response_date`) VALUES
(1, 1100432, 2437508, 602, '2023-10-21', 'Pending', 'Sick leave', NULL);

INSERT INTO `attendance` (`attendance_id`, `class_id`, `instructor_id`, `student_id`, `course_id`, `date`, `status`) VALUES
(1, 602, 2437508, 1100432, 501, '2023-10-21', 'Present');