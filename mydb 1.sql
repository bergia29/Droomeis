
UPDATE users
SET Status = IF(TIMESTAMPDIFF(MINUTE, LastActive, NOW()) < 5, 'en ligne', 'hors connexion');
ALTER TABLE users
ADD COLUMN Status VARCHAR(50) DEFAULT 'hors connexion', 
ADD COLUMN LastActive DATETIME, 
ADD COLUMN Email VARCHAR(255), 
ADD COLUMN Password VARCHAR(255); 

CREATE TABLE IF NOT EXISTS messages (
  ID INT AUTO_INCREMENT PRIMARY KEY,       
  SenderID INT NOT NULL,                    
  ReceiverID INT NOT NULL,                  
  Text TEXT NOT NULL,                        
  Timestamp DATETIME DEFAULT CURRENT_TIMESTAMP, 
  IsRead BOOLEAN DEFAULT FALSE,             
  FOREIGN KEY (SenderID) REFERENCES users(ID) ON DELETE CASCADE,
  FOREIGN KEY (ReceiverID) REFERENCES users(ID) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS conversations (
  ID INT AUTO_INCREMENT PRIMARY KEY,        
  User1ID INT NOT NULL,                     
  User2ID INT NOT NULL,                     
  LastMessage TEXT,                         
  LastTimestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (User1ID) REFERENCES users(ID) ON DELETE CASCADE,
  FOREIGN KEY (User2ID) REFERENCES users(ID) ON DELETE CASCADE
);

INSERT INTO users (Name, Status, LastActive, Email, Password)
VALUES 
('Mr A', 'en ligne', NOW(), 'mr_a@example.com', 'password1'),
('Mr B', 'hors connexion', '2025-01-17 15:00:00', 'mr_b@example.com', 'password2'),
('Mr C', 'en ligne', NOW(), 'mr_c@example.com', 'password3');
INSERT INTO messages (SenderID, ReceiverID, Text, Timestamp, IsRead)
VALUES
(1, 2, 'Bonjour, comment ça va ?', '2025-01-17 15:05:00', TRUE),
(2, 1, 'Bien, merci. Et toi ?', '2025-01-17 15:10:00', TRUE),
(1, 2, 'Très bien. Merci pour votre retour.', '2025-01-17 15:15:00', FALSE);

INSERT INTO conversations (User1ID, User2ID, LastMessage, LastTimestamp)
VALUES
(1, 2, 'Très bien. Merci pour votre retour.', '2025-01-17 15:15:00'),
(1, 3, 'Salut, ça va ?', '2025-01-17 14:50:00'),
(2, 3, 'Hello, long time no see!', '2025-01-17 15:05:00');

SELECT * FROM users
WHERE Name LIKE '%search_query%' OR Email LIKE '%search_query%';

UPDATE users 
SET Status = IF(TIMESTAMPDIFF(MINUTE, LastActive, NOW()) < 5, 'en ligne', 'hors connexion');
