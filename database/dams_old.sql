CREATE TABLE `users` (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) ,
    first_name VARCHAR(255) , 
    last_name VARCHAR(255) , 
    email VARCHAR(255) ,
    gender ENUM('Male', 'Female') ,
    password VARCHAR(255) ,
    phone BIGINT ,
    dob DATE ,
    role ENUM('Administrator', 'Instructor', 'Student') 
);

CREATE TABLE `students` (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) ,
    last_name VARCHAR(255) ,
    email VARCHAR(255) ,
    phone BIGINT ,
    dob DATE 
);

CREATE TABLE `instructors` (
    instructor_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) ,
    last_name VARCHAR(255) ,
    email VARCHAR(255) ,
    phone BIGINT ,
    dob DATE 
);

CREATE TABLE `terms` (
    term_id INT AUTO_INCREMENT PRIMARY KEY,
    term_name VARCHAR(255) ,
    start_date DATE ,
    end_date DATE 
);

CREATE TABLE `sessions` (
    session_id INT AUTO_INCREMENT PRIMARY KEY,
    session_name VARCHAR(255) ,
    year VARCHAR(4) ,
    term_id INT ,
    start_date DATE ,
    end_date DATE ,
    FOREIGN KEY (term_id) REFERENCES terms(term_id)
);

CREATE TABLE `courses` (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(255) ,
    course_code VARCHAR(50) ,
    term_id INT ,
    FOREIGN KEY (term_id) REFERENCES terms(term_id)
);

CREATE TABLE `classes` (
    class_id INT AUTO_INCREMENT PRIMARY KEY,
    instructor_id INT ,
    section VARCHAR(255) ,
    course_id INT ,
    FOREIGN KEY (course_id) REFERENCES courses(course_id),
    FOREIGN KEY (instructor_id) REFERENCES instructors(instructor_id)
);

CREATE TABLE `schedules` (
    schedule_id INT AUTO_INCREMENT PRIMARY KEY,
    class_id INT ,
    instructor_id INT ,
    course_id INT ,
    schedule DATETIME ,
    status ENUM('Active', 'Expired'),
    FOREIGN KEY (class_id) REFERENCES classes(class_id),
    FOREIGN KEY (instructor_id) REFERENCES instructors(instructor_id),
    FOREIGN KEY (course_id) REFERENCES courses(course_id)
);

CREATE TABLE `attendance` (
    attendance_id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT ,
    instructor_id INT ,
    student_id INT ,
    date DATE ,
    status ENUM('Present', 'Absent') ,
    FOREIGN KEY (course_id) REFERENCES courses(course_id),
    FOREIGN KEY (instructor_id) REFERENCES instructors(instructor_id),
    FOREIGN KEY (student_id) REFERENCES students(student_id)
);

CREATE TABLE `leaves` (
    leave_request_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT ,
    instructor_id INT ,
    request_date DATE ,
    status ENUM('Pending', 'Approved', 'Denied') ,
    reason TEXT,
    response_date DATE,
    FOREIGN KEY (student_id) REFERENCES students(student_id),
    FOREIGN KEY (instructor_id) REFERENCES instructors(instructor_id)
);


INSERT INTO `users` (`user_id`, `username`, `first_name`, `last_name`, `email`, `gender`, `password`, `phone`, `dob`, `role`) VALUES 
(101, 'admin', 'Admin', 'One', 'admin@mail.com', 'Male', '827ccb0eea8a706c4c34a16891f84e7b', 17345478924, '1989-03-01', 'Administrator'),
(102, 'instructor', 'Instructor', 'One', 'instructor@mail.com', 'Male', '827ccb0eea8a706c4c34a16891f84e7b', 17345478924, '1989-03-01', 'Instructor'),
(103, 'student', 'Student', 'One', 'student@mail.com', 'Male', '827ccb0eea8a706c4c34a16891f84e7b', 17345478924, '1989-03-01', 'Student'),
(104, 'hunter', 'Hunter', 'Adams', 'hunter@mail.com', 'Male', '827ccb0eea8a706c4c34a16891f84e7b', 14375878626, '1995-04-11', 'Instructor'),
(105, 'dan', 'Dan', 'Blitz', 'danny@mail.com', 'Male', '827ccb0eea8a706c4c34a16891f84e7b', 13555471922, '1992-02-09', 'Instructor'),
(106, 'tim', 'Tim', 'Ruscia', 'tim@mail.com', 'Male', '827ccb0eea8a706c4c34a16891f84e7b', 14446478330, '1991-12-17', 'Instructor'),
(107, 'travis', 'Travis', 'Hopkins', 'travis@mail.com', 'Male', '827ccb0eea8a706c4c34a16891f84e7b', 19045052911, '2006-02-13', 'Student'),
(108, 'lilly', 'Lilly', 'Jen', 'lilly@mail.com', 'Female', '827ccb0eea8a706c4c34a16891f84e7b', 14445461939, '2005-07-21', 'Student'),
(109, 'chow', 'Chow', 'Ding', 'chow@mail.com', 'Male', '827ccb0eea8a706c4c34a16891f84e7b', 12005058821, '2007-09-02', 'Student');


INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `email`, `phone`, `dob`) VALUES 
(201, 'Travis', 'Hopkins', 'travis@mail.com', 19045052911, '2006-02-13'),
(202, 'Lilly', 'Jenn', 'lilly@mail.com', 14445461939, '2005-07-21'),
(203, 'Chow', 'Ding', 'chow@mail.com', 12005058821, '2007-09-02');


INSERT INTO `instructors` (`instructor_id`, `first_name`, `last_name`, `email`, `phone`, `dob`) VALUES 
(301, 'Hunter', 'Adams', 'hunter@mail.com', 14375878626, '1995-04-11'),
(302, 'Dan', 'Blitz', 'danny@mail.com', 13555471922, '1992-02-09'),
(303, 'Tim', 'Ruscia', 'tim@mail.com', 14446478330, '1991-12-17');


INSERT INTO `terms` (`term_id`, `term_name`, `start_date`, `end_date`) VALUES 
(401, '2020/2021', '2020-08-11', '2021-06-01'),
(402, '2021/2022', '2021-08-01', '2022-06-02'),
(403, '2022/2023', '2022-08-09', '2023-06-10'),
(404, '2022/2023', '2023-08-03', '2024-06-05');

INSERT INTO sessions (`session_name`, `year`, `term_id`, `start_date`, `end_date`) VALUES 
('Fall', '2023', 401, '2023-09-01', '2023-10-30'),
('Spring', '2023', 401, '2023-11-01', '2023-12-15'),
('Summer', '2024', 402, '2024-01-15', '2024-03-30');


INSERT INTO `courses` (`course_id`, `course_name`, `course_code`, `term_id`) VALUES 
(501, 'Fundamentals of Data Analytics', 'DTSC 5501', 403),
(502, 'Principles and Techniques for Data Science', 'DTSC 5502', 401),
(503, 'Applied Machine Learning for Data Scientists', 'INFO 5505', 402),
(505, 'Enterprise Applications of Business Intelligence', 'DSCI 5330', 402),
(506, 'Predictive Analytics and Business Forecasting', 'DSCI 5340', 403),
(507, 'Information Behavior', 'INFO 5040', 404),
(508, 'Information Behavior', 'INFO 5206', 401);


INSERT INTO `classes` (`class_id`, `instructor_id`, `section`, `course_id`) VALUES 
(601, 302, 'Section 001', 501),
(602, 302, 'Section 002', 502),
(603, 303, 'Section 003', 503);


INSERT INTO `schedules` (`schedule_id`, `class_id`, `instructor_id`, `course_id`, `schedule`, `status`) VALUES 
(701, 601, 302, 501, '2020-09-01 11:00:00', 'Active'),
(702, 603, 303, 503, '2020-09-02 11:30:00', 'Active');