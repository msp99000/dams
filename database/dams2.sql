CREATE TABLE `admins` (
    admin_id INT AUTO_INCREMENT  PRIMARY KEY,
    username VARCHAR(255) ,
    first_name VARCHAR(255) , 
    last_name VARCHAR(255) , 
    email VARCHAR(255) ,
    gender ENUM('Male', 'Female') ,
    password VARCHAR(255) ,
    phone BIGINT ,
    dob DATE
);

CREATE TABLE `students` (
    student_id INT AUTO_INCREMENT  PRIMARY KEY,
    username VARCHAR(255) ,
    first_name VARCHAR(255) ,
    last_name VARCHAR(255) ,
    email VARCHAR(255)  ,
    phone BIGINT ,
    dob DATE,
    password VARCHAR(255)
);

CREATE TABLE `instructors` (
    instructor_id INT AUTO_INCREMENT PRIMARY KEY ,
    username VARCHAR(255) ,
    first_name VARCHAR(255) ,
    last_name VARCHAR(255) ,
    email VARCHAR(255),
    phone BIGINT,
    dob DATE,
    password VARCHAR(255)
);

CREATE TABLE `sessions` (
    session_id INT AUTO_INCREMENT PRIMARY KEY,
    session_name VARCHAR(255) ,
    year VARCHAR(4) ,
    start_date DATE ,
    end_date DATE 
);

CREATE TABLE `courses` (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(255) ,
    course_code VARCHAR(50)
);

CREATE TABLE `classes` (
    class_id INT AUTO_INCREMENT PRIMARY KEY,
    section VARCHAR(255) ,
    course_id INT ,
    FOREIGN KEY (course_id) REFERENCES courses(course_id)
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


INSERT INTO `admins` (`admin_id`, `username`, `first_name`, `last_name`, `email`, `gender`, `password`, `phone`, `dob`) VALUES 
(101, 'admin', 'Admin', 'One', 'admin@mail.com', 'Male', '827ccb0eea8a706c4c34a16891f84e7b', 17345478924, '1989-03-01');


INSERT INTO `students` (`student_id`, `username`, `first_name`, `last_name`, `email`, `phone`, `dob`, `password`) VALUES 
(201, 'student', 'Student', 'One', 'student@mail.com', 13447118819, '2006-02-07', '827ccb0eea8a706c4c34a16891f84e7b'),
(202, 'travis', 'Travis', 'Hopkins', 'travis@mail.com', 19045052911, '2006-02-13', '827ccb0eea8a706c4c34a16891f84e7b'),
(203, 'lilly', 'Lilly', 'Jenn', 'lilly@mail.com', 14445461939, '2005-07-21', '827ccb0eea8a706c4c34a16891f84e7b'),
(204, 'chow', 'Chow', 'Ding', 'chow@mail.com', 12005058821, '2007-09-02', '827ccb0eea8a706c4c34a16891f84e7b');


INSERT INTO `instructors` (`instructor_id`, `username`, `first_name`, `last_name`, `email`, `phone`, `dob`, `password`) VALUES 
(301, 'instructor', 'Instructor', 'One', 'instructor@mail.com', 15646471226, '1996-10-03', '827ccb0eea8a706c4c34a16891f84e7b'),
(302, 'hunter', 'Hunter', 'Adams', 'hunter@mail.com', 14375878626, '1995-04-11', '827ccb0eea8a706c4c34a16891f84e7b'),
(303, 'dan', 'Dan', 'Blitz', 'danny@mail.com', 13555471922, '1992-02-09', '827ccb0eea8a706c4c34a16891f84e7b'),
(304, 'tim', 'Tim', 'Ruscia', 'tim@mail.com', 14446478330, '1991-12-17', '827ccb0eea8a706c4c34a16891f84e7b');


INSERT INTO `sessions` (`session_id`, `session_name`, `year`, `start_date`, `end_date`) VALUES 
(1001, 'Fall', '2023', '2023-09-01', '2023-10-30'),
(1002, 'Spring', '2023', '2023-11-01', '2023-12-15'),
(1003, 'Summer', '2024', '2024-01-15', '2024-03-30');


INSERT INTO `courses` (`course_id`, `course_name`, `course_code`) VALUES 
(501, 'Fundamentals of Data Analytics', 'DTSC 5501'),
(502, 'Principles and Techniques for Data Science', 'DTSC 5502'),
(503, 'Applied Machine Learning for Data Scientists', 'INFO 5505'),
(505, 'Enterprise Applications of Business Intelligence', 'DSCI 5330'),
(506, 'Predictive Analytics and Business Forecasting', 'DSCI 5340'),
(507, 'Information Behavior', 'INFO 5040'),
(508, 'Information Behavior', 'INFO 5206');


INSERT INTO `classes` (`class_id`, `section`, `course_id`) VALUES 
(601, 'Section 001', 501),
(602, 'Section 002', 502),
(603, 'Section 003', 503);

INSERT INTO `leaves` (`leave_request_id`, `student_id`, `instructor_id`, `request_date`, `status`, `reason`, `response_date`) VALUES 
(0001, 202, 303, '2023-08-10', 'Approved', 'Health issues', '2023-09-10');

INSERT INTO `attendance` (`attendance_id`, `course_id`, `instructor_id`, `student_id`, `date`, `status`) VALUES 
(70001, 501, 303, 202, '2023-03-02', 'Present');

INSERT INTO `schedules` (`schedule_id`, `class_id`, `instructor_id`, `course_id`, `schedule`, `status`) VALUES 
(701, 601, 302, 501, '2020-09-01 11:00:00', 'Active'),
(702, 603, 303, 503, '2020-09-02 11:30:00', 'Active');