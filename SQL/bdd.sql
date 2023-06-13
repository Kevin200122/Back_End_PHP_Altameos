CREATE TABLE membres
(
    id int(11) NOT NULL AUTO_INCREMENT,
    pseudo varchar(255) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into membres (pseudo) values ('Aless');
insert into membres (pseudo) values ('Benoit');

create TABLE articles
(
    id int(11) NOT NULL AUTO_INCREMENT,
    titre varchar(255) NOT NULL,
    contenu text NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

alter table membres add email varchar(255) NOT NULL;
alter table membres add pass varchar(255) NOT NULL;
alter table membres add p varchar(255);
alter table membres drop role;
alter table membres add date_inscription datetime NOT NULL;

ALTER TABLE membres ADD COLUMN role ENUM('administrateur', 'contributeur', 'utilisateur') NOT NULL;


ALTER TABLE membres
DROP COLUMN comfirmation_pass;
