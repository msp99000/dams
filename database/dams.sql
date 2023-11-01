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

CREATE TABLE `courses` (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(255) ,
    course_code VARCHAR(50)
);

CREATE TABLE `instructors` (
    instructor_id INT AUTO_INCREMENT PRIMARY KEY ,
    course_id INT,
    username VARCHAR(255) ,
    first_name VARCHAR(255) ,
    last_name VARCHAR(255) ,
    gender ENUM ('Male', 'Female'),
    email VARCHAR(255),
    phone BIGINT,
    dob DATE,
    password VARCHAR(255),
    FOREIGN KEY (course_id) REFERENCES courses(course_id)
);

CREATE TABLE `students` (
    student_id INT AUTO_INCREMENT  PRIMARY KEY,
    course_id INT,
    username VARCHAR(255) ,
    first_name VARCHAR(255) ,
    last_name VARCHAR(255) ,
    gender ENUM ('Male', 'Female'),
    email VARCHAR(255)  ,
    phone BIGINT ,
    dob DATE,
    password VARCHAR(255),
    FOREIGN KEY (course_id) REFERENCES courses(course_id)
);

CREATE TABLE `sessions` (
    session_id INT AUTO_INCREMENT PRIMARY KEY,
    session_name VARCHAR(255) ,
    year VARCHAR(4) ,
    start_date DATE ,
    end_date DATE 
);

CREATE TABLE `classes` (
    class_id INT AUTO_INCREMENT PRIMARY KEY,
    section VARCHAR(255),
    course_id INT,
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
    dateTaken DATE ,
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


INSERT INTO `classes` (`class_id`, `section`) VALUES 
(601, 'Section 001'),
(602, 'Section 002'),
(603, 'Section 003');


INSERT INTO `students` (`student_id`, `course_id`, `username`, `first_name`, `last_name`, `email`, `phone`, `dob`, `password`)
VALUES 
(201, 501, 'student', 'Student', 'One', 'student@mail.com', 13447118819, '2006-02-07', '827ccb0eea8a706c4c34a16891f84e7b'),
(202, 502, 'travis', 'Travis', 'Hopkins', 'travis@mail.com', 19045052911, '2006-02-13', '827ccb0eea8a706c4c34a16891f84e7b'),
(203, 503, 'lilly', 'Lilly', 'Jenn', 'lilly@mail.com', 14445461939, '2005-07-21', '827ccb0eea8a706c4c34a16891f84e7b'),
(204, 501, 'chow', 'Chow', 'Ding', 'chow@mail.com', 12005058821, '2007-09-02', '827ccb0eea8a706c4c34a16891f84e7b'),
(205, 502, 'jsmith', 'John', 'Smith', 'john.smith@email.com', 1234567890, '2005-05-10', '827ccb0eea8a706c4c34a16891f84e7b'),
(206, 503, 'ejohnson', 'Emily', 'Johnson', 'emily.johnson@email.com', 9876543210, '2006-08-15', '827ccb0eea8a706c4c34a16891f84e7b'),
(207, 501, 'mbrown', 'Michael', 'Brown', 'michael.brown@email.com', 5555555555, '2004-12-02', '827ccb0eea8a706c4c34a16891f84e7b'),
(208, 502, 'swilliams', 'Sophia', 'Williams', 'sophia.williams@email.com', 8888888888, '2003-06-20', '827ccb0eea8a706c4c34a16891f84e7b'),
(209, 503, 'rjones', 'Robert', 'Jones', 'robert.jones@email.com', 9999999999, '2007-03-25', '827ccb0eea8a706c34a16891f84e7b'),
(210, 501, 'odavis', 'Olivia', 'Davis', 'olivia.davis@email.com', 7777777777, '2005-10', '827ccb0eea8a706c4c34a16891f84e7b'),
(211, 502, 'wwilson', 'William', 'Wilson', 'william.wilson@email.com', 6666666666, '2004-09-30', '827ccb0eea8a706c4c34a16891f84e7b'),
(212, 503, 'athomas', 'Ava', 'Thomas', 'ava.thomas@email.com', 5555555555, '2006-07-14', '827ccb0eea8a706c4c34a16891f84e7b'),
(213, 501, 'jevans', 'James', 'Evans', 'james.evans@email.com', 4444444444, '2003-04-05', '827ccb0eea8a706c4c34a16891f84e7b'),
(214, 502, 'eharris', 'Emma', 'Harris', 'emma.harris@email.com', 3333333333, '2007-01-28', '827ccb0eea8a706c4c34a16891f84e7b'),
(215, 503, 'bclark', 'Benjamin', 'Clark', 'benjamin.clark@email.com', 2222222222, '2004-11-08', '827ccb0eea8a706c4c34a16891f84e7b'),
(216, 501, 'mroberts', 'Mia', 'Roberts', 'mia.roberts@email.com', 1111111111, '2006-06-17', '827ccb0eea8a706c4c34a16891f84e7b'),
(217, 502, 'eadams', 'Elijah', 'Adams', 'elijah.adams@email.com', 9999999999, '2005-02-22', '827ccb0eea8a706c4c34a16891f84e7b'),
(218, 503, 'ascott', 'Amelia', 'Scott', 'amelia.scott@email.com', 8888888888, '2007-09-09', '827ccb0eea8a706c4c34a16891f84e7b'),
(219, 501, 'lturner', 'Lucas', 'Turner', 'lucas.turner@email.com', 7777777777, '2003-12-31', '827ccb0eea8a706c4c34a16891f84e7b'),
(220, 502, 'sbaker', 'Sarah', 'Baker', 'sarah.baker@email.com', 1112223333, '2002-08-15', '827ccb0eea8a706c4c34a16891f84e7b'),
(221, 503, 'jwilson', 'James', 'Wilson', 'james.wilson@email.com', 2223334444, '2001-04-25', '827ccb0eea8a706c4c34a16891f84e7b'),
(222, 501, 'jlucas', 'Jennifer', 'Lucas', 'jennifer.lucas@email.com', 3334445555, '2000-12-11', '827ccb0eea8a706c4c34a16891f84e7b'),
(223, 502, 'mgray', 'Megan', 'Gray', 'megan.gray@email.com', 4445556666, '1999-10-05', '827ccb0eea8a706c4c34a16891f84e7b'),
(224, 503, 'cdavis', 'Christopher', 'Davis', 'christopher.davis@email.com', 5556667777, '1998-07-29', '827ccb0eea8a706c4c34a16891f84e7b'),
(225, 501, 'lsmith', 'Laura', 'Smith', 'laura.smith@email.com', 6667778888, '1997-03-20', '827ccb0eea8a706c4c34a16891f84e7b'),
(226, 502, 'ajones', 'Alexander', 'Jones', 'alexander.jones@email.com', 7778889999, '1996-11-15', '827ccb0eea8a706c4c34a16891f84e7b'),
(227, 503, 'rthomas', 'Rebecca', 'Thomas', 'rebecca.thomas@email.com', 8889990000, '1995-09-10', '827ccb0eea8a706c4c34a16891f84e7b'),
(228, 501, 'pdavis', 'Peter', 'Davis', 'peter.davis@email.com', 9990001111, '1994-05-05', '827ccb0eea8a706c4c34a16891f84e7b'),
(229, 502, 'tmiller', 'Tiffany', 'Miller', 'tiffany.miller@email.com', 1112223333, '1993-01-01', '827ccb0eea8a706c4c34a16891f84e7b'),
(230, 503, 'rwilson', 'Rachel', 'Wilson', 'rachel.wilson@email.com', 2223334444, '1992-08-25', '827ccb0eea8a706c4c34a16891f84e7b'),
(231, 501, 'sgreen', 'Samuel', 'Green', 'samuel.green@email.com', 3334445555, '1991-04-19', '827ccb0eea8a706c4c34a16891f84e7b'),
(232, 502, 'hmartin', 'Hannah', 'Martin', 'hannah.martin@email.com', 4445556666, '1990-12-12', '827ccb0eea8a706c4c34a16891f84e7b'),
(233, 503, 'gturner', 'George', 'Turner', 'george.turner@email.com', 5556667777, '1989-10-06', '827ccb0eea8a706c4c34a16891f84e7b'),
(234, 501, 'lwalker', 'Lillian', 'Walker', 'lillian.walker@email.com', 6667778888, '1988-07-30', '827ccb0eea8a706c4c34a16891f84e7b'),
(235, 502, 'dwilson', 'David', 'Wilson', 'david.wilson@email.com', 7778889999, '1987-03-24', '827ccb0eea8a706c4c34a16891f84e7b'),
(236, 503, 'tscott', 'Theresa', 'Scott', 'theresa.scott@email.com', 8889990000, '1986-11-18', '827ccb0eea8a706c4c34a16891f84e7b'),
(237, 501, 'cmiller', 'Christopher', 'Miller', 'christopher.miller@email.com', 9990001111, '1985-09-13', '827ccb0eea8a706c4c34a16891f84e7b'),
(238, 502, 'jyoung', 'Jessica', 'Young', 'jessica.young@email.com', 1112223333, '1984-05-07', '827ccb0eea8a706c4c34a16891f84e7b'),
(239, 503, 'jclark', 'Jonathan', 'Clark', 'jonathan.clark@email.com', 2223334444, '1983-01-02', '827ccb0eea8a706c4c34a16891f84e7b');


INSERT INTO `instructors` (`instructor_id`, `course_id`, `username`, `first_name`, `last_name`, `email`, `phone`, `dob`, `password`) VALUES 
(301, 501, 'instructor', 'Instructor', 'One', 'instructor@mail.com', 15646471226, '1996-10-03', '827ccb0eea8a706c4c34a16891f84e7b'),
(302, 502, 'hunter', 'Hunter', 'Adams', 'hunter@mail.com', 14375878626, '1995-04-11', '827ccb0eea8a706c4c34a16891f84e7b'),
(303, 503, 'dan', 'Dan', 'Blitz', 'danny@mail.com', 13555471922, '1992-02-09', '827ccb0eea8a706c4c34a16891f84e7b'),
(304, 501, 'tim', 'Tim', 'Ruscia', 'tim@mail.com', 14446478330, '1991-12-17', '827ccb0eea8a706c4c34a16891f84e7b'),
(305, 502, 'janderson', 'John', 'Anderson', 'john.anderson@email.com', 1234567890, '1985-08-10', '827ccb0eea8a706c4c34a16891f84e7b'),
(306, 503, 'sphillips', 'Sarah', 'Phillips', 'sarah.phillips@email.com', 9876543210, '1978-12-05', '827ccb0eea8a706c4c34a16891f84e7b'),
(307, 501, 'mrobertson', 'Mark', 'Robertson', 'mark.robertson@email.com', 5555555555, '1989-03-20', '827ccb0eea8a706c4c34a16891f84e7b'),
(308, 502, 'hclark', 'Helen', 'Clark', 'helen.clark@email.com', 8888888888, '1975-05-15', '827ccb0eea8a706c4c34a16891f84e7b'),
(309, 503, 'bwilliams', 'Brian', 'Williams', 'brian.williams@email.com', 9999999999, '1980-09-30', '827ccb0eea8a706c4c34a16891f84e7b'),
(310, 501, 'lturner', 'Laura', 'Turner', 'laura.turner@email.com', 7777777777, '1987-11-02', '827ccb0eea8a706c4c34a16891f84e7b'),
(311, 502, 'cjohnson', 'Charles', 'Johnson', 'charles.johnson@email.com', 6666666666, '1983-07-14', '827ccb0eea8a706c4c34a16891f84e7b'),
(312, 503, 'kscott', 'Karen', 'Scott', 'karen.scott@email.com', 5555555555, '1990-04-05', '827ccb0eea8a706c4c34a16891f84e7b'),
(313, 501, 'mwillis', 'Matthew', 'Willis', 'matthew.willis@email.com', 4444444444, '1976-01-28', '827ccb0eea8a706c4c34a16891f84e7b'),
(314, 502, 'aross', 'Alice', 'Ross', 'alice.ross@email.com', 3333333333, '1988-06-17', '827ccb0eea8a706c4c34a16891f84e7b'),
(315, 503, 'pcooper', 'Paul', 'Cooper', 'paul.cooper@email.com', 2222222222, '1984-02-22', '827ccb0eea8a706c4c34a16891f84e7b');



INSERT INTO `sessions` (`session_id`, `session_name`, `year`, `start_date`, `end_date`) VALUES 
(1001, 'Fall', '2023', '2023-09-01', '2023-10-30');

INSERT INTO `sessions` (`session_name`, `year`, `start_date`, `end_date`) VALUES 
('Fall 2019', '2019', '2019-09-01', '2019-10-30'),
('Spring 2019', '2019', '2019-11-01', '2019-12-15'),
('Summer 2019', '2019', '2019-01-15', '2019-03-30'),
('Fall 2020', '2020', '2020-09-01', '2020-10-30'),
('Spring 2020', '2020', '2020-11-01', '2020-12-15'),
('Summer 2020', '2020', '2020-01-15', '2020-03-30'),
('Fall 2021', '2021', '2021-09-01', '2021-10-30'),
('Spring 2021', '2021', '2021-11-01', '2021-12-15'),
('Summer 2021', '2021', '2021-01-15', '2021-03-30'),
('Fall 2022', '2022', '2022-09-01', '2022-10-30'),
('Spring 2022', '2022', '2022-11-01', '2022-12-15'),
('Summer 2022', '2022', '2022-01-15', '2022-03-30'),
('Fall 2023', '2023', '2023-09-01', '2023-10-30'),
('Spring 2023', '2023', '2023-11-01', '2023-12-15'),
('Summer 2023', '2023', '2023-01-15', '2023-03-30'),
('Fall 2024', '2024', '2024-09-01', '2024-10-30'),
('Spring 2024', '2024', '2024-11-01', '2024-12-15'),
('Summer 2024', '2024', '2024-01-15', '2024-03-30'),
('Fall 2025', '2025', '2025-09-01', '2025-10-30'),
('Spring 2025', '2025', '2025-11-01', '2025-12-15');


INSERT INTO `leaves` (`leave_request_id`, `student_id`, `instructor_id`, `request_date`, `status`, `reason`, `response_date`) VALUES 
(0001, 202, 303, '2023-08-10', 'Approved', 'Health issues', '2023-09-10');


INSERT INTO `attendance` (`attendance_id`, `course_id`, `instructor_id`, `student_id`, `dateTaken`, `status`) VALUES 
(70001, 501, 303, 202, '2023-03-02', 'Present');


INSERT INTO `schedules` (`schedule_id`, `class_id`, `instructor_id`, `course_id`, `schedule`, `status`) VALUES 
(701, 601, 302, 501, '2020-09-01 11:00:00', 'Active'),
(702, 603, 303, 503, '2020-09-02 11:30:00', 'Active');