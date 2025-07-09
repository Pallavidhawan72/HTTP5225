-- Creating the clients table to store client information
CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_name VARCHAR(100),
    industry VARCHAR(100),
    contact_email VARCHAR(100)
);
-- Inserting sample clients into the clients table
INSERT INTO clients (id, client_name, industry, contact_email) VALUES
(1, 'BrewTime Coffee Co.', 'Food & Beverage', 'contact@brewtime.com'),
(2, 'FitTrack App', 'Health & Fitness', 'info@fittrack.com'),
(3, 'City Art Fest', 'Events', 'hello@cityartfest.org'),
(4, 'Herbal Glow', 'Wellness Products', 'support@herbalglow.com'),
(5, 'Pallavi Dhawan Portfolio', 'Freelance', 'hello@pallavid.com');

-- Creating the project_types table to store types of projects
CREATE TABLE project_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type_name VARCHAR(50)
);
-- Inserting sample project types into the project_types table
INSERT INTO project_types (id, type_name) VALUES 
(1, 'Logo Design'),
(2, 'UI/UX Design'),
(3, 'Poster Design'),
(4, 'Packaging'),
(5, 'Web Design');

-- Creating the design_projects table to store project details
CREATE TABLE design_projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    type_id INT,
    software VARCHAR(100),
    date_completed DATE,
    image VARCHAR(255),
    description TEXT,
    client_id INT,
    FOREIGN KEY (type_id) REFERENCES project_types(id),
    FOREIGN KEY (client_id) REFERENCES clients(id)
);
-- Inserting sample projects into the design_projects table
INSERT INTO design_projects (title, type_id, software, date_completed, image, description, client_id) VALUES
('Minimal Logo for BrewTime', 1, 'Adobe Illustrator', '2024-10-12', 'brewtime_logo.jpg', 'A clean logo for a new cafe brand.', 1),
('UI Redesign for FitTrack', 2, 'Figma, Adobe XD', '2025-01-15', 'fittrack_ui.jpg', 'Modern UI screens for a fitness tracking app.', 2),
('City Art Festival Poster', 3, 'Photoshop, Illustrator', '2023-11-03', 'artfest_poster.jpg', 'Event poster featuring abstract illustrations.', 3),
('Organic Tea Packaging', 4, 'Illustrator, InDesign', '2024-04-18', 'tea_packaging.jpg', 'Eco-friendly packaging for wellness teas.', 4),
('Personal Portfolio Website', 5, 'Figma, HTML, CSS', '2025-03-09', 'portfolio_mockup.jpg', 'Responsive web design concept.', 5);
