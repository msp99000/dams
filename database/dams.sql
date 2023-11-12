CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `admins` (`admin_id`, `username`, `first_name`, `last_name`, `email`, `gender`, `password`, `phone`, `dob`) VALUES
(101, 'admin', 'Admin', 'One', 'admin@mail.com', 'Male', '827ccb0eea8a706c4c34a16891f84e7b', 17345478924, '1989-03-01'),
(102, 'bhoj', 'Bhoj', 'Bhatt', 'bhoj@admin.com', 'Male', '9db21e050c3d9ff2e6234991d9bff576', 9856665985, '2023-10-04'),
(103, 'shiva', 'Shiva', 'shiva', 'shiva@admin.com', 'Male', '69f404925df883e0e5579d65b7768e7c', 9848723136, '2023-10-01');

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` enum('Present','Absent') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `attendance` (`attendance_id`, `class_id`, `instructor_id`, `student_id`, `date`, `status`) VALUES
(1, 601, 304, 205, '2023-10-21', 'Present'),
(2, 601, 304, 1185665, '2023-10-21', 'Present');

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `section` varchar(255) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `classes` (`class_id`, `section`, `course_id`, `session_id`) VALUES
(601, 'Section 001', 501, 1001),
(602, 'Section 002', 502, 1001),
(603, 'Section 003', 503, 1002);

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `course_code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `courses` (`course_id`, `course_name`, `course_code`) VALUES
(501, 'Fundamentals of Data Analytics', 'DTSC 5501'),
(502, 'Principles and Techniques for Data Science', 'DTSC 5502'),
(503, 'Applied Machine Learning for Data Scientists', 'INFO 5505'),
(505, 'Enterprise Applications of Business Intelligence', 'DSCI 5330'),
(506, 'Predictive Analytics and Business Forecasting', 'DSCI 5340'),
(507, 'Information Behavior', 'INFO 5040'),
(508, 'Information Behavior', 'INFO 5206');

CREATE TABLE `instructors` (
  `instructor_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `instructors` (`instructor_id`, `username`, `first_name`, `last_name`, `email`, `phone`, `dob`, `password`) VALUES
(301, 'instructor', 'Instructor', 'One', 'instructor@mail.com', 15646471226, '1996-10-03', '827ccb0eea8a706c4c34a16891f84e7b'),
(302, 'hunter', 'Hunter', 'Adams', 'hunter@mail.com', 14375878626, '1995-04-11', '827ccb0eea8a706c4c34a16891f84e7b'),
(303, 'dan', 'Dan', 'Blitz', 'danny@mail.com', 13555471922, '1992-02-09', '827ccb0eea8a706c4c34a16891f84e7b'),
(304, 'tim', 'Tim', 'Ruscia', 'tim@mail.com', 14446478330, '1991-12-17', '827ccb0eea8a706c4c34a16891f84e7b'),
(1122565, 'deepa', 'Deepa', 'G', 'deepa@gmail.com', 9402252236, '2023-10-09', '29987ce14a9c7b9137f616843eca049b');

CREATE TABLE `leaves` (
  `leave_request_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `request_date` date DEFAULT NULL,
  `status` enum('Pending','Approved','Denied') DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `response_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `leaves` (`leave_request_id`, `student_id`, `instructor_id`, `class_id`, `request_date`, `status`, `reason`, `response_date`) VALUES
(1, 205, 304, 601, '2023-10-21', 'Pending', 'Sick leave', NULL);

CREATE TABLE `schedules` (
  `schedule_id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `schedule` datetime DEFAULT NULL,
  `status` enum('Active','Expired') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `schedules` (`schedule_id`, `class_id`, `instructor_id`, `student_id`, `schedule`, `status`) VALUES
(701, 601, 302, 205, '2020-09-01 11:00:00', 'Active'),
(702, 603, 304, 205, '2020-09-02 11:30:00', 'Active'),
(703, 601, 304, 204, '2023-10-21 19:21:11', 'Active');

CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL,
  `session_name` varchar(255) DEFAULT NULL,
  `year` varchar(4) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `sessions` (`session_id`, `session_name`, `year`, `start_date`, `end_date`) VALUES
(1001, 'Fall', '2023', '2023-09-01', '2023-10-30'),
(1002, 'Spring', '2023', '2023-11-01', '2023-12-15'),
(1003, 'Summer', '2024', '2024-01-15', '2024-03-30'),
(1004, 'Spring', '2024', '2024-01-15', '2024-05-01');

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `students` (`student_id`, `username`, `first_name`, `last_name`, `email`, `phone`, `dob`, `password`) VALUES
(201, 'student', 'Student', 'One', 'student@mail.com', 13447118819, '2006-02-07', '827ccb0eea8a706c4c34a16891f84e7b'),
(202, 'travis', 'Travis', 'Hopkins', 'travis@mail.com', 19045052911, '2006-02-13', '827ccb0eea8a706c4c34a16891f84e7b'),
(204, 'chow', 'Chow', 'Ding', 'chow@mail.com', 12005058821, '2007-09-02', '7a53bde2dde88f0a9c39794f6567cdf5'),
(205, 'raj', 'Raj', 'kc', 'raj@student.com', 9842025566, '2023-07-05', '65a1223dae83b8092c4edba0823a793c'),
(1185665, 'brb', 'BRB', 'brb', 'brb@student.com', 9402256656, '2023-10-10', 'b992bdb865efa8b3b7333d0458323f4e'),
(14253666, 'dhreej', 'Dhreej', 'Dhreej', 'dhreej@student.com', 94253665222, '2023-10-10', 'b850ec547891bb8665dede6deda28a6e');

ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `course_id` (`class_id`),
  ADD KEY `instructor_id` (`instructor_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`instructor_id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`leave_request_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `instructor_id` (`instructor_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=604;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=509;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45666623;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `leave_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=704;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14253667;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`instructor_id`),
  ADD CONSTRAINT `attendance_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `leaves_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `leaves_ibfk_2` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`instructor_id`);

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`class_id`),
  ADD CONSTRAINT `schedules_ibfk_2` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`instructor_id`),
  ADD CONSTRAINT `schedules_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
