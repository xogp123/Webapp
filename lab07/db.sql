CREATE TABLE student (
  student_id int not null,
  name char(10) not null,
  year smallint not null default '1',
  dept_no int not null,
  major char(20),
  primary key(student_id)
);
CREATE TABLE department (
  dept_no int not null auto_increment,
  dept_name char(20) not null unique,
  office char(20) not null,
  office_tel char(13),
  primary key(dept_no)
);

ALTER student CHANGE COLUMN major char(30);
ALTER student ADD COLUMN gender char(10) not null;

ALTER student DROP COLUMN gender;
INSERT INTO student VALUES (
(20070002, 'Jane Smith', 3, 4, 'Business Administration'),
(20060001, 'Ashley Jackson', 4, 4, 'Business Administration'),
(20030001, 'Liam Johnson', 4, 2, 'Electrical Engineering'),
(20040003, 'Jacob Lee', 3, 2, 'Electrical Engineering'),
(20060002, 'Noah Kim', 3, 1, 'Computer Science'),
(20100002, 'Ava Lim', 3, 4, 'Business Administration'),
(20110001, 'Emma Watson', 2, 1, 'Computer Science'),
(20080003, 'Lisa Maria', 4, 3, 'Law'),
(20040002, 'Jacob William', 4, 5, 'Law'),
(20070001, 'Emily Rose', 4, 4, 'Business Administration'),
(20100001, 'Ethan Hunt', 3, 4, 'Business Administration'),
(20110002, 'Jason Mraz' 2, 1, 'Electrical Engineering'),
(20030002, 'John Smith', 5, 1, 'Computer Science'),
(20070003, 'Sophia Park', 4, 3, 'Law'),
(20070007, 'James Michael', 2, 4, 'Business Administration'),
(20100003, 'James Bond', 3, 1, 'Computer Science'),
(20070005, 'Olivia Madison', 2, 5, 'English Language and Literature'),
);

INSERT INTO department VALUES (
('Computer Science', 'Science Building 101', '02-3290-0123'),
('Electrical Engineering', 'Engineering Building 401', '02-3290-2345'),
('Law', 'Law Building 201', '02-3290-7896'),
( 'Business Administration', 'Business Building 104', '02-3290-1112'),
('English Language and Literature', 'Language Building 303', '02-3290-4412')
);

UPDATE department SET dept_name = 'Electrical and Electronics Engineering' WHERE dept_name = 'Electrical Engineering';
INSERT INTO department VALUES (
  ('Special Education', 'Education Building 4030', '02-3290-2347')
);
UPDATE student SET major = 'Special Education' WHERE name = 'Emma Watson';
DELETE FROM student where name = 'Jason Marz';
DELETE FROM student where name = 'John Smith';


SELECT * FROM student WHERE dept_name = 'Computer Science';
SELECT student_id, year, major FROM student;
SELECT * FROM student WHERE year = 3;
SELECT * FROM student WHERE year = 1 and year = 2;
SELECT * FROM student JOIN department on d.dept_no = s.dept_no WHERE d.dept_no = 4;

SELECT * FROM student WHERE student_id LIKE '2007%';
SELECT * FROM student ORDER BY student_id;
SELECT * FROM student GROUP BY major HAVING avg(year) > 3;
SELECT * FROM student WHERE major = 'Business Administration' and student_id LIKE '2007%' LIMIT 2;



SELECT r.role FROM roles r JOIN movies m ON r.movie_id = m.id WHERE m.name = 'Pi';

SELECT a.first_name, a.last_name FROM actors a
JOIN roles r ON a.id = r.actor_id
JOIN movies m ON r.movie_id = m.id
WHERE m.name = 'Pi';

SELECT a.first_name, a.last_name FROM actors a
JOIN roles r ON a.id = r.actor_id
JOIN movies m ON r.movie_id = m.id
WHERE 
