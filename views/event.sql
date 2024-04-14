
-- Table: Users
CREATE TABLE students (
  User_id INT AUTO_INCREMENT PRIMARY KEY,
  FirstName VARCHAR(50) NOT NULL,
  LastName VARCHAR(50) NOT NULL,
  Major VARCHAR(10),
  Email VARCHAR(100) NOT NULL,
  PhoneNumber VARCHAR(15) NOT NULL,
  psw VARCHAR(15) NOT NULL
);



CREATE TABLE admins (
  admin_id INT AUTO_INCREMENT PRIMARY KEY,
  FirstName VARCHAR(50) NOT NULL,
  LastName VARCHAR(50) NOT NULL,
  department VARCHAR(10),
  Email VARCHAR(100) NOT NULL,
  PhoneNumber VARCHAR(15) NOT NULL,
  psw VARCHAR(15) NOT NULL

);

-- Table: Events
CREATE TABLE Events (
  EventID INT AUTO_INCREMENT PRIMARY KEY,
  Title VARCHAR(100) NOT NULL,
  CreatedBy INT NOT NULL,
  Description TEXT NOT NULL,
  Speaker VARCHAR(100),
  Date DATE NOT NULL,
  Time TIME NOT NULL,
  Location VARCHAR(100) NOT NULL,
  FOREIGN KEY (CreatedBy) REFERENCES admins(admin_id)
);

-- Table: Categories
CREATE TABLE Categories (
  CategoryID INT AUTO_INCREMENT PRIMARY KEY,
  Name VARCHAR(50) NOT NULL
);

-- Table: EventCategories (Many-to-Many relationship between Events and Categories)
CREATE TABLE EventCategories (
  EventID INT,
  CategoryID INT,
  PRIMARY KEY (EventID, CategoryID),
  FOREIGN KEY (EventID) REFERENCES Events(EventID),
  FOREIGN KEY (CategoryID) REFERENCES Categories(CategoryID)
);

-- Table: Registrations
CREATE TABLE Registrations (
  RegistrationID INT AUTO_INCREMENT PRIMARY KEY,
  User_id INT,
  EventID INT,
  RegistrationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  Status ENUM('Confirmed', 'Waitlisted') NOT NULL,
  FOREIGN KEY ( User_id) REFERENCES students( User_id),
  FOREIGN KEY (EventID) REFERENCES Events(EventID)
);

-- Table: Notifications
CREATE TABLE Notifications (
  NotificationID INT AUTO_INCREMENT PRIMARY KEY,
  User_id INT,
  Message TEXT NOT NULL,
  Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  ReadStatus BOOLEAN DEFAULT FALSE,
  FOREIGN KEY ( User_id) REFERENCES students( User_id)
);


-- Table: Jobs
CREATE TABLE Jobs (
  JobID INT AUTO_INCREMENT PRIMARY KEY,
  Title VARCHAR(100) NOT NULL,
  Department VARCHAR(100) NOT NULL,
  Description TEXT NOT NULL,
  Status ENUM('Open', 'Closed') NOT NULL
);



-- Table: Departments
CREATE TABLE Departments (
  DepartmentID INT AUTO_INCREMENT PRIMARY KEY,
  Name VARCHAR(100) NOT NULL,
  Description TEXT
);



-- Table: EventAttachments (Attachments related to events)
CREATE TABLE EventAttachments (
  AttachmentID INT AUTO_INCREMENT PRIMARY KEY,
  EventID INT,
  Filename VARCHAR(255) NOT NULL,
  Filepath VARCHAR(255) NOT NULL,
  ContentType VARCHAR(50),
  FOREIGN KEY (EventID) REFERENCES Events(EventID)
);


-- Table: EventComments
CREATE TABLE EventComments (
  CommentID INT AUTO_INCREMENT PRIMARY KEY,
  UserID INT,
  EventID INT,
  Comment TEXT NOT NULL,
  CommentDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (UserID) REFERENCES Users(UserID),
  FOREIGN KEY (EventID) REFERENCES Events(EventID)
);

-- Table: EventLikes
CREATE TABLE EventLikes (
  LikeID INT AUTO_INCREMENT PRIMARY KEY,
  UserID INT,
  EventID INT,
  FOREIGN KEY (UserID) REFERENCES Users(UserID),
  FOREIGN KEY (EventID) REFERENCES Events(EventID)
);

-- Table: EventShares
CREATE TABLE EventShares (
  ShareID INT AUTO_INCREMENT PRIMARY KEY,
  UserID INT,
  EventID INT,
  ShareDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (UserID) REFERENCES Users(UserID),
  FOREIGN KEY (EventID) REFERENCES Events(EventID)
);








