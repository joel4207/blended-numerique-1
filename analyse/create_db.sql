CREATE TABLE contacts(
   contact_id INT AUTO_INCREMENT,
   date_contact DATETIME,
   email VARCHAR(250),
   nom VARCHAR(250),
   prenom VARCHAR(250),
   telephone VARCHAR(250),
   adresse VARCHAR(250),
   code_postal VARCHAR(250),
   ville VARCHAR(250),
   contact_message VARCHAR(4096),
   CONSTRAINT PK_contacts PRIMARY KEY(contact_id)
);

CREATE TABLE formations(
   formation_id INT AUTO_INCREMENT,
   formation VARCHAR(250),
   CONSTRAINT PK_formations PRIMARY KEY(formation_id)
);

CREATE TABLE motifs(
   motif_id INT AUTO_INCREMENT,
   motif VARCHAR(250),
   CONSTRAINT PK_motifs PRIMARY KEY(motif_id)
);

CREATE TABLE contact_formations(
   contact_id INT,
   formation_id INT,
   CONSTRAINT PK_contact_formations PRIMARY KEY(contact_id, formation_id),
   CONSTRAINT FK_contact_formations_contacts FOREIGN KEY(contact_id) REFERENCES contacts(contact_id),
   CONSTRAINT FK_contact_formations_formations FOREIGN KEY(formation_id) REFERENCES formations(formation_id)
);

CREATE TABLE contact_motifs(
   contact_id INT,
   motif_id INT,
   CONSTRAINT PK_contact_motifs PRIMARY KEY(contact_id, motif_id),
   CONSTRAINT FK_contact_motifs_contacts FOREIGN KEY(contact_id) REFERENCES contacts(contact_id),
   CONSTRAINT FK_contact_motifs_motifs FOREIGN KEY(motif_id) REFERENCES motifs(motif_id)
);
