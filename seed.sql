USE klaxon;

INSERT INTO agence (nom) VALUES
('Paris'),
('Lyon'),
('Marseille'),
('Toulouse'),
('Nice'),
('Nantes'),
('Strasbourg'),
('Montpellier'),
('Bordeaux'),
('Lille'),
('Rennes'),
('Reims');
INSERT INTO utilisateur (nom, prenom, email, telephone, mot_de_passe, est_admin) VALUES
('Martin', 'Alexandre', 'alexandre.martin@email.fr', '0612345678', '$2y$10$DXERIvnJkLhzxz/Y1pb5WeDBa5XAfoaodiQknycMpBP5ZSn2aaraq', FALSE),
('Dubois', 'Sophie', 'sophie.dubois@email.fr', '0698765432', '$2y$10$DXERIvnJkLhzxz/Y1pb5WeDBa5XAfoaodiQknycMpBP5ZSn2aaraq', FALSE),
('Bernard', 'Julien', 'julien.bernard@email.fr', '0622446688', '$2y$10$DXERIvnJkLhzxz/Y1pb5WeDBa5XAfoaodiQknycMpBP5ZSn2aaraq', FALSE),
('Moreau', 'Camille', 'camille.moreau@email.fr', '0611223344', '$2y$10$DXERIvnJkLhzxz/Y1pb5WeDBa5XAfoaodiQknycMpBP5ZSn2aaraq', FALSE),
('Lefèvre', 'Lucie', 'lucie.lefevre@email.fr', '0777889900', '$2y$10$DXERIvnJkLhzxz/Y1pb5WeDBa5XAfoaodiQknycMpBP5ZSn2aaraq', FALSE),
('Leroy', 'Thomas', 'thomas.leroy@email.fr', '0655443322', '$2y$10$DXERIvnJkLhzxz/Y1pb5WeDBa5XAfoaodiQknycMpBP5ZSn2aaraq', FALSE),
('Roux', 'Chloé', 'chloe.roux@email.fr', '0633221199', '$2y$10$DXERIvnJkLhzxz/Y1pb5WeDBa5XAfoaodiQknycMpBP5ZSn2aaraq', FALSE),
('Petit', 'Maxime', 'maxime.petit@email.fr', '0766778899', '$2y$10$DXERIvnJkLhzxz/Y1pb5WeDBa5XAfoaodiQknycMpBP5ZSn2aaraq', FALSE),
('Garnier', 'Laura', 'laura.garnier@email.fr', '0688776655', '$2y$10$DXERIvnJkLhzxz/Y1pb5WeDBa5XAfoaodiQknycMpBP5ZSn2aaraq', FALSE),
('Dupuis', 'Antoine', 'antoine.dupuis@email.fr', '0744556677', '$2y$10$DXERIvnJkLhzxz/Y1pb5WeDBa5XAfoaodiQknycMpBP5ZSn2aaraq', FALSE),
('Lefebvre', 'Emma', 'emma.lefebvre@email.fr', '0699887766', '$2y$10$DXERIvnJkLhzxz/Y1pb5WeDBa5XAfoaodiQknycMpBP5ZSn2aaraq', FALSE),
('Fontaine', 'Louis', 'louis.fontaine@email.fr', '0655667788', '$2y$10$DXERIvnJkLhzxz/Y1pb5WeDBa5XAfoaodiQknycMpBP5ZSn2aaraq', FALSE),
('Chevalier', 'Clara', 'clara.chevalier@email.fr', '0788990011', '$2y$10$DXERIvnJkLhzxz/Y1pb5WeDBa5XAfoaodiQknycMpBP5ZSn2aaraq', FALSE),
('Robin', 'Nicolas', 'nicolas.robin@email.fr', '0644332211', '$2y$10$DXERIvnJkLhzxz/Y1pb5WeDBa5XAfoaodiQknycMpBP5ZSn2aaraq', FALSE),
('Gauthier', 'Marine', 'marine.gauthier@email.fr', '0677889922', '$2y$10$DXERIvnJkLhzxz/Y1pb5WeDBa5XAfoaodiQknycMpBP5ZSn2aaraq', FALSE),
('Fournier', 'Pierre', 'pierre.fournier@email.fr', '0722334455', '$2y$10$DXERIvnJkLhzxz/Y1pb5WeDBa5XAfoaodiQknycMpBP5ZSn2aaraq', FALSE),
('Girard', 'Sarah', 'sarah.girard@email.fr', '0688665544', '$2y$10$DXERIvnJkLhzxz/Y1pb5WeDBa5XAfoaodiQknycMpBP5ZSn2aaraq', FALSE),
('Lambert', 'Hugo', 'hugo.lambert@email.fr', '0611223366', '$2y$10$DXERIvnJkLhzxz/Y1pb5WeDBa5XAfoaodiQknycMpBP5ZSn2aaraq', FALSE),
('Masson', 'Julie', 'julie.masson@email.fr', '0733445566', '$2y$10$DXERIvnJkLhzxz/Y1pb5WeDBa5XAfoaodiQknycMpBP5ZSn2aaraq', FALSE),
('Henry', 'Arthur', 'arthur.henry@email.fr', '0666554433', '$2y$10$DXERIvnJkLhzxz/Y1pb5WeDBa5XAfoaodiQknycMpBP5ZSn2aaraq', FALSE),
('Admin', 'Super', 'admin@klaxon.fr', '0600000000', '$2y$10$DXERIvnJkLhzxz/Y1pb5WeDBa5XAfoaodiQknycMpBP5ZSn2aaraq', TRUE);

INSERT INTO trajet (agence_depart_id, agence_arrivee_id, utilisateur_id, gdh_depart, gdh_arrivee, places_total, places_dispo) VALUES
(1, 2, 1, '2026-04-25 08:00:00', '2026-04-25 10:00:00', 4, 3),
(3, 4, 2, '2026-04-26 09:00:00', '2026-04-26 11:30:00', 3, 2),
(5, 6, 3, '2026-04-27 07:30:00', '2026-04-27 09:30:00', 5, 4);