create table user(
    idUser int primary key auto_increment,
    nom varchar(20),
    prenom varchar(20),
    date_naissance date,
    email varchar(30),
    mdp varchar(20)
);

create table admin(
    idAdmin int primary key auto_increment,
    nom varchar(20),
    prenom varchar(20),
    date_naissance date,
    email varchar(30),
    mdp varchar(20)
);

create table categorie(
    idCategorie int primary key auto_increment,
    nomCategorie varchar(20),
    idImage int,
    FOREIGN KEY(idImage) REFERENCES image(idImage)
);

-- modifie
create table objet(
    idObjet int primary key auto_increment,
    idCategorie int,
    idProprietaire int,
    nomObjet varchar(20),
    description varchar(30),
    prix_Estimatif double,
    FOREIGN KEY(idProprietaire) REFERENCES user(idUser),
    FOREIGN KEY(idCategorie) REFERENCES categorie(idCategorie)
);

-- A modifier
create table proposition(
    idProposition int primary key auto_increment,
    idObjet_demande int,
    idObjet_en_echange int,
    idProprietaire_demande int,
    idProprietaire_objet_en_echange int,
    etat varchar(10),
    FOREIGN KEY(idObjet_demande) REFERENCES objet(idObjet),
    FOREIGN KEY(idObjet_en_echange) REFERENCES objet(idObjet),
    FOREIGN KEY(idProprietaire_demande) REFERENCES user(idUser),
    FOREIGN KEY(idProprietaire_objet_en_echange) REFERENCES user(idUser)
);


create table image(
    idImage int primary key auto_increment,
    path varchar(50)
);

create table image_objet(
    idImage int,
    idObjet int,
    FOREIGN KEY(idObjet) REFERENCES objet(idObjet),
    FOREIGN KEY(idImage) REFERENCES image(idImage)
);


-- creation vue proposition sy ny olona nanao proposition

create or replace view proposition_objet_en_echange as (
    select * from proposition 
    join objet
    on objet.idObjet = proposition.idObjet_en_echange
);

create or replace view proposition_propositionneur as (
    select * from proposition_objet_en_echange 
    join  user
    on user.idUser = proposition_objet_en_echange.idObjet_en_echange
);

-- creation vue proposition sy ny olona nanao proposition

create or replace view proposition_objet_demande as (
    select * from proposition 
    join objet
    on objet.idObjet = proposition.idObjet_demande
);

create or replace view proposition_objet_demande as (
    select * from proposition_objet_demande 
    join  user
    on user.idUser = proposition_objet_demande.idObjet_demande
);