CREATE TABLE contacts(
   contact_id INT,
   email VARCHAR(250),
   nom VARCHAR(250),
   prenom VARCHAR(250),
   telephone VARCHAR(250),
   adresse VARCHAR(250),
   code_postal VARCHAR(250),
   ville VARCHAR(250),
   message TEXT,
   CONSTRAINT PK_contacts PRIMARY KEY(contact_id)
);

CREATE TABLE formations(
   formation_id INT,
   formation VARCHAR(250),
   CONSTRAINT PK_formations PRIMARY KEY(formation_id)
);

CREATE TABLE motifs(
   motif_id INT,
   motif VARCHAR(250),
   CONSTRAINT PK_motifs PRIMARY KEY(motif_id)
);

CREATE TABLE contact_formation(
   contact_id INT,
   formation_id INT,
   CONSTRAINT PK_contact_formation PRIMARY KEY(contact_id, formation_id),
   CONSTRAINT FK_contact_formation_contacts FOREIGN KEY(contact_id) REFERENCES contacts(contact_id),
   CONSTRAINT FK_contact_formation_formations FOREIGN KEY(formation_id) REFERENCES formations(formation_id)
);

CREATE TABLE contact_motif(
   contact_id INT,
   motif_id INT,
   CONSTRAINT PK_contact_motif PRIMARY KEY(contact_id, motif_id),
   CONSTRAINT FK_contact_motif_contacts FOREIGN KEY(contact_id) REFERENCES contacts(contact_id),
   CONSTRAINT FK_contact_motif_motifs FOREIGN KEY(motif_id) REFERENCES motifs(motif_id)
);
