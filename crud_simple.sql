CREATE TABLE college_student (
  student_id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) NOT NULL,
  majors VARCHAR(40) NOT NULL,
  gender ENUM('Male', 'Female') NOT NULL,
  address TEXT NOT NULL,
  PRIMARY KEY (student_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO college_student (name, majors, gender, address) VALUES
('John Doe', 'Computer Science', 'Male', '123 Main St'),
('Jane Smith', 'Mathematics', 'Female', '456 Elm St');

COMMIT;
