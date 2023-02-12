DROP DATABASE IF EXISTS qasystem;
create database qasystem;
use qasystem;

Create table Users(
	id INT NOT NULL primary key AUTO_INCREMENT,
    User_id varchar(6) unique,
    email varchar(30) ,
    first_name varchar(20),
    last_name varchar(20),
    upassword varchar(255) not null,
    uprofile text ,
    city varchar(30),
    state varchar(30),
    country varchar(30),
    ustatus varchar(30),
    points int
);

create table Questions(
	Q_id INT NOT NULL primary key AUTO_INCREMENT,
    Q_user_id varchar(6) not null,
    title text not null,
    q_body text not null,
    topic_name varchar(20) not null,
    q_timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
    resolved varchar(4),
    fulltext (title),
    fulltext (q_body)
);

create table Answers(
	Q_id int,
    A_id INT NOT NULL primary key AUTO_INCREMENT,
    A_user_id varchar(6) not null,
    A_body longtext not null,
    likes int,
    a_timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
    fulltext(A_body)
);

create table topics(
	topic_name varchar(20) primary key,
    parent_topic_name varchar(20) not null
);

create table best_answer(
	Q_id int primary key,
    A_id int
);

ALTER TABLE questions add FOREIGN KEY(topic_name) references topics(topic_name);
ALTER TABLE questions add FOREIGN KEY(q_user_id) references Users(user_id);
ALTER TABLE answers add FOREIGN KEY(Q_id) references Questions(Q_id);
ALTER TABLE answers add FOREIGN KEY(a_user_id) references Users(user_id);

ALTER TABLE best_answer add FOREIGN KEY(Q_id) references Questions(Q_id);
ALTER TABLE best_answer add FOREIGN KEY(A_id) references Answers(A_id);

INSERT INTO Users values(1,'ua1', 'tiffany@hotmail.com', 'Tiffany',' Hadish', 'pass123', 'Algos developer passionate about python and open-source!', 'Austin' ,'Texas','USA','Beginner',0);
INSERT INTO Users values(2,'ua2','jim@gmail.com', 'Jimmy','Fallon', 'mangosoda', 'Networks Engineer working at Cisco' ,'New York City', 'New York', 'USA', 'Beginner', 0);
INSERT INTO Users values(3,'ua3', 'pamela@gmail.com', 'Pamela', 'Anderson', 'yolo12', 'I share thoughts on Scalability daily' ,'Benagluru', 'Karnatka', 'India', 'Beginner', 0);
INSERT INTO Users values(4,'ua4', 'simran@gmail.com', 'Simran', 'Pandey', 'magnific', 'Research student focussing on building trustworthy applications', 'Atlanta' ,'Georgia', 'USA', 'Beginner', 0);
INSERT INTO Users values(5,'ua5', 'anisha@hotmail.com', 'Anisha', 'Mohan', 'paris434' ,'I love all things Data Science!', 'Dallas', 'Texas', 'USA', 'Beginner' ,0);
INSERT INTO Users values(6,'ua6', 'yogi@gmail.com', 'Yogi', 'Adiyanath', 'sierra123' ,'Reach out to me for advice on cloud platforms' ,'Delhi' ,'Delhi' ,'India', 'Beginner' ,0);
INSERT INTO Users values(7,'ua7', 'abhi@gmail.com', 'Abhishek', 'Mani', 'lalal7833' ,'A proponent of the benefits of SQL in data science!' ,'Chennai' ,'Tamil Nadu' ,'India' ,'Beginner' ,0);
INSERT INTO Users values(8,'ua8', 'claire@hotmail.com', 'Claire', 'Dunphy', 'Tyuwe12', 'I like creating simple solutions for complex problems!' ,'Pune' ,'Maharashtra' ,'India' ,'Beginner' ,0);

INSERT INTO Topics values ('sql',	'database systems');
INSERT INTO Topics values ('php',	'database systems');
INSERT INTO Topics values ('wired',	'computer networks');
INSERT INTO Topics values ('wireless',	'computer networks');
INSERT INTO Topics values ('sorting',	'algorithms');
INSERT INTO Topics values ('searching',	'algorithms');

INSERT INTO Questions values(1,'ua1','group by clause','what does the group by clause do in sql?','sql','2022-04-01 7:30:00', 'yes' );
INSERT INTO Questions values(2,'ua2', 'disadvantages of php', 'what are some of the disadvantages of php?', 'php', '2022-04-04 5:00:00' ,'yes' );
INSERT INTO Questions values(3,'ua3', 'ethernet', 'What is ethernet?','wired','2022-04-04 6:12:00' ,'no');
INSERT INTO Questions values(4,'ua4', 'hidden terminal', 'What is the hidden terminal issue in wireless networks?', 'wireless' ,'2022-04-06 8:00:00' ,'yes' );
INSERT INTO Questions values(5,'ua5', 'bubble sort vs merge sort', "I'm confused about the time complexities between bubble sort and merge sort. Can anyone elaborate? Whats the logic behind the time complexity?",'sorting', '2022-04-08 3:00:00','yes');
INSERT INTO Questions values(6 ,'ua6', 'binary search tree','what is a binary search tree? ','searching', '2022-04-12 6:30:00','yes');
INSERT INTO Questions values(7 ,'ua2', 'sorting techniques','which is the most efficient sorting algorithm among bubble merge, insertion and quick sort?', 'sorting','2022-04-10 9:00:00','yes');
INSERT INTO Questions values(8 ,'ua3', 'in place sorting', 'What is in place sorting? which sorting techniques are in place?', 'sorting' ,'2022-04-03 10:00:00' ,'yes') ;
INSERT INTO Questions values(9 ,'ua7', 'alter table command','What is the command to alter table and add a foreign key in mySQL', 'sql' ,'2022-04-02 13:30:00' ,'yes' );
INSERT INTO Questions values(10,'ua8', 'delete table command','what is the command to delete a table in mySQL','sql','2022-03-28 11:45:00','yes' );
INSERT INTO Questions values(11,'ua3',	'create table command',	'What is an example of a create table command in MySQL ?',	'sql'	,'2022-03-27 12:34:00',	'yes' );

INSERT INTO Answers VALUES(1, 1, 'ua3', 'The GROUP BY Statement in SQL is used to arrange identical data into groups with the help of some functions. i.e if a particular column has same values in different rows then it will arrange these rows in a group. Important Points: GROUP BY clause is used with the SELECT statement.',3, '2022-04-03 9:00:00'); 
INSERT INTO Answers VALUES(2,2	,'ua6', 'PHP is not suitable for giant content-based web applications. Since it is open-source, it is not secure. Because ASCII text files are easily available. PHP features a poor quality of handling errors. PHP lacks debugging tools, which are needed to look for warnings and errors. It has only a few debugging tools in comparison to other programming languages.', 4, '2022-04-08 8:00:00');
INSERT INTO Answers VALUES(2,3,'ua1', 'PHP doesn’t allow change or modification in core behavior of online applications.', 2, '2022-04-05 5:00:00');
INSERT INTO Answers VALUES(2, 4, 'ua7','It is widely believed by the developers that PHP features a poor quality of handling errors. PHP lacks debugging tools, which are needed to look for errors and warnings. PHP has less number of debugging tools in comparison to other programming languages.',2,'2022-04-06 2:30:00');
INSERT INTO Answers VALUES(3,5	,'ua4','Ethernet is a family of wired computer networking technologies commonly used in local area networks, metropolitan area networks and wide area networks.',2,'2022-04-06 6:45:00');
INSERT INTO Answers VALUES(4,6,'ua8','In wireless LANs ( wireless local area networks), the hidden terminal problem is a transmission problem that arises when two or more stations who are out of range of each other transmit simultaneously to a common recipient. This is prevalent in decentralised systems where there aren’t any entity for controlling transmissions.',3,'2022-04-11 8:40:00');
INSERT INTO Answers VALUES(5, 7,'ua2','At best, with smaller data sets, bubble sort has O(n), and worst case scenario, it has O(n²) time complexity (which is pretty bad). On the other hand, merge sort performs pretty consistently, with a time complexity of O(n log(n)). The time complexity of our helper functions for merge sort make this possible.',4,'2022-04-10 6:23:00');
INSERT INTO Answers VALUES(5,8,'ua1', 'bubble sort - O(n^2), merge sort - O(n logn)',2, '2022-04-08 22:00:00');
INSERT INTO Answers VALUES(6, 9,'ua8', 'Binary Search Tree is a node-based binary tree data structure which has the following properties: 1) The left subtree of a node contains only nodes with keys lesser than the node’s key. 2) The right subtree of a node contains only nodes with keys greater than the node’s key.3) The left and right subtree each must also be a binary search tree.',4,'2022-04-13 12:00:00');
INSERT INTO Answers VALUES(7,10, 'ua1', 'Bubble sort and insertion sort have an average time complexity of O(n^2). Merge sort and quick sort have an average time complexity of O(nlogn). However, Merge sort is more efficient and works faster than quick sort in case of larger array size or datasets. Quick sort is more efficient and works faster than merge sort in case of smaller array size or datasets. Quick sort has a worst case time complexity of O(n^2) while merge sort is O(nlogn)', 3,'2022-04-11 15:45:00');
INSERT INTO Answers VALUES(7,11, 'ua5', 'Merge sort would be the best sorting technique',1,'2022-04-11 12:30:00');
INSERT INTO Answers VALUES(8,12, 'ua7','An in-place sorting algorithm uses constant space for producing the output (modifies the given array only). It sorts the list only by modifying the order of the elements within the list. Insertion Sort and Selection Sorts are in-place sorting algorithms as they do not use any additional space for sorting the list.',2,'2022-04-04 10:00:00');
INSERT INTO Answers VALUES(8,13,'ua6','A sort algorithm in which the sorted items occupy the same storage as the original ones. These algorithms may use o(n) additional memory for bookkeeping, but at most a constant number of items are kept in auxiliary memory at any time. Also known as sort in place.',2,'2022-04-04 9:00:00');
INSERT INTO Answers VALUES(9	,14	,'ua1','Here is the command: ALTER TABLE table_name ADD CONSTRAINT constraint_name FOREIGN KEY (foreign_key_name,...) REFERENCES parent_table(column_name,...);',1,'2022-04-03 11:45:01');
INSERT INTO Answers VALUES(10,	15,	'ua1',	'DROP TABLE table_name ;',	2	,'2022-03-29 12:30:00');
INSERT INTO Answers VALUES(11	,16	,'ua1',	"CREATE TABLE table_name (
    column1 datatype,
    column2 datatype,
    column3 datatype,
   ....
); Example:  CREATE TABLE Persons (
    PersonID int,
    LastName varchar(255),
    FirstName varchar(255),
    Address varchar(255),
    City varchar(255)
);",	2,	'2022-03-28 2:30:00');


INSERT INTO Best_Answer values (1,	1);
INSERT INTO Best_Answer values (2, 2);
INSERT INTO Best_Answer values (4, 6);
INSERT INTO Best_Answer values (5, 7);
INSERT INTO Best_Answer values (6, 9);
INSERT INTO Best_Answer values (7, 10);
INSERT INTO Best_Answer values (8, 12);
INSERT INTO Best_Answer values (9, 14);
INSERT INTO Best_Answer values (10, 15);
INSERT INTO Best_Answer values (11, 16);