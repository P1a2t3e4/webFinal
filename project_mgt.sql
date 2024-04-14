
-- Table: Users
CREATE TABLE Users (
  UserID INT AUTO_INCREMENT PRIMARY KEY,
  Username VARCHAR(50) NOT NULL,
  Password VARCHAR(100) NOT NULL, -- Original password field (to be updated)
  Email VARCHAR(100) NOT NULL,
  UserType ENUM('Student', 'Staff', 'Admin') NOT NULL,
  RegistrationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PasswordHash VARCHAR(255) NOT NULL -- New field for hashed passwords
);

-- Table: Events
CREATE TABLE Events (
  EventID INT AUTO_INCREMENT PRIMARY KEY,
  Title VARCHAR(100) NOT NULL,
  Description TEXT NOT NULL,
  Speaker VARCHAR(100),
  Date DATE NOT NULL,
  Time TIME NOT NULL,
  Location VARCHAR(100) NOT NULL,
  RegistrationDeadline DATE NOT NULL,
  MaxCapacity INT NOT NULL,
  CreatedBy INT,
  CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Event creation timestamp
  UpdatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, -- Event modification timestamp
  FOREIGN KEY (CreatedBy) REFERENCES Users(UserID)
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
  UserID INT,
  EventID INT,
  RegistrationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  Status ENUM('Confirmed', 'Waitlisted') NOT NULL,
  FOREIGN KEY (UserID) REFERENCES Users(UserID),
  FOREIGN KEY (EventID) REFERENCES Events(EventID)
);

-- Table: Notifications
CREATE TABLE Notifications (
  NotificationID INT AUTO_INCREMENT PRIMARY KEY,
  UserID INT,
  Message TEXT NOT NULL,
  Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  ReadStatus BOOLEAN DEFAULT FALSE,
  FOREIGN KEY (UserID) REFERENCES Users(UserID)
);

-- Table: Resources
CREATE TABLE Resources (
  ResourceID INT AUTO_INCREMENT PRIMARY KEY,
  Name VARCHAR(100) NOT NULL,
  Type VARCHAR(50) NOT NULL,
  Availability INT NOT NULL
);

-- Table: OverdueResources
CREATE TABLE OverdueResources (
  OverdueID INT AUTO_INCREMENT PRIMARY KEY,
  UserID INT,
  ResourceID INT,
  DueDate DATE NOT NULL,
  Returned BOOLEAN DEFAULT FALSE,
  FOREIGN KEY (UserID) REFERENCES Users(UserID),
  FOREIGN KEY (ResourceID) REFERENCES Resources(ResourceID)
);

-- Table: Jobs
CREATE TABLE Jobs (
  JobID INT AUTO_INCREMENT PRIMARY KEY,
  Title VARCHAR(100) NOT NULL,
  Department VARCHAR(100) NOT NULL,
  Description TEXT NOT NULL,
  Status ENUM('Open', 'Closed') NOT NULL
);

-- Table: Applications
CREATE TABLE Applications (
  ApplicationID INT AUTO_INCREMENT PRIMARY KEY,
  UserID INT,
  JobID INT,
  ApplicationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  Status ENUM('Pending', 'Accepted', 'Rejected') NOT NULL,
  FOREIGN KEY (UserID) REFERENCES Users(UserID),
  FOREIGN KEY (JobID) REFERENCES Jobs(JobID)
);

-- Table: Departments
CREATE TABLE Departments (
  DepartmentID INT AUTO_INCREMENT PRIMARY KEY,
  Name VARCHAR(100) NOT NULL,
  Description TEXT
);

-- Table: DepartmentStaff (Many-to-Many relationship between Users and Departments)
CREATE TABLE DepartmentStaff (
  DepartmentStaffID INT AUTO_INCREMENT PRIMARY KEY,
  UserID INT,
  DepartmentID INT,
  FOREIGN KEY (UserID) REFERENCES Users(UserID),
  FOREIGN KEY (DepartmentID) REFERENCES Departments(DepartmentID)
);

-- Table: ResourcesCategories (Many-to-Many relationship between Resources and Categories)
CREATE TABLE ResourcesCategories (
  ResourceID INT,
  CategoryID INT,
  PRIMARY KEY (ResourceID, CategoryID),
  FOREIGN KEY (ResourceID) REFERENCES Resources(ResourceID),
  FOREIGN KEY (CategoryID) REFERENCES Categories(CategoryID)
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

-- Table: EventAttachments (Attachments related to events)
CREATE TABLE EventAttachments (
  AttachmentID INT AUTO_INCREMENT PRIMARY KEY,
  EventID INT,
  Filename VARCHAR(255) NOT NULL,
  Filepath VARCHAR(255) NOT NULL,
  ContentType VARCHAR(50),
  FOREIGN KEY (EventID) REFERENCES Events(EventID)
);
