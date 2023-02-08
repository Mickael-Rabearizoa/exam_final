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
    idObjet1 int,
    idObjet2 int,
    idUser1 int,
    idUser2 int,
    etat varchar(10),
    FOREIGN KEY(idObjet1) REFERENCES objet(idObjet),
    FOREIGN KEY(idObjet2) REFERENCES objet(idObjet),
    FOREIGN KEY(idUser1) REFERENCES user(idUser),
    FOREIGN KEY(idUser2) REFERENCES user(idUser)
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

create table echange(
    idEchange int,
    date_heure datetime,
    idObjet int,
    idUser int,
    FOREIGN KEY(idObjet) REFERENCES objet(idObjet),
    FOREIGN KEY(idUser) REFERENCES user(idUser)
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