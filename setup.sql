/*
 *  File name:  setup.sql
 *  Function:   to create the initial database schema for the CMPUT 391 project: An Online Image Sharing System
 *              Winter, 2016 ; extended by group to add indexes and extra tables
 *  Author:     Prof. Li-Yan Yuan
 *  Extended By: Hugh Criag, Ismail Mare, Daniel Shin
 */
DROP TABLE images;
DROP TABLE group_lists;
DROP TABLE groups;
DROP TABLE persons;
DROP TABLE users;
DROP TABLE admin;
DROP TABLE image_views;

DROP INDEX subject_index;
DROP INDEX place_index;
DROP INDEX descrip_index;



CREATE TABLE users (
   user_name varchar(24),
   password  varchar(24),
   date_registered date,
   primary key(user_name)
);

CREATE TABLE persons (
   user_name  varchar(24),
   first_name varchar(24),
   last_name  varchar(24),
   address    varchar(128),
   email      varchar(128),
   phone      char(10),
   PRIMARY KEY(user_name),
   UNIQUE (email),
   FOREIGN KEY (user_name) REFERENCES users
);


CREATE TABLE groups (
   group_id   int,
   user_name  varchar(24),
   group_name varchar(24),
   date_created date,
   PRIMARY KEY (group_id),
   UNIQUE (user_name, group_name),
   FOREIGN KEY(user_name) REFERENCES users
);

INSERT INTO groups values(1,null,'public', sysdate);
INSERT INTO groups values(2,null,'private',sysdate);

CREATE TABLE group_lists (
   group_id    int,
   friend_id   varchar(24),
   date_added  date,
   notice      varchar(1024),
   PRIMARY KEY(group_id, friend_id),
   FOREIGN KEY(group_id) REFERENCES groups,
   FOREIGN KEY(friend_id) REFERENCES users
);

CREATE TABLE images (
   photo_id    int,
   owner_name  varchar(24),
   permitted   int,
   subject     varchar(128),
   place       varchar(128),
   timing      date,
   description varchar(2048),
   thumbnail   blob,
   photo       blob,
   PRIMARY KEY(photo_id),
   FOREIGN KEY(owner_name) REFERENCES users,
   FOREIGN KEY(permitted) REFERENCES groups
);

CREATE INDEX descrip_index ON images(description)
INDEXTYPE IS CTXSYS.CONTEXT;
parameters ('sync (on commit)');

CREATE INDEX subject_index ON images(subject)
INDEXTYPE IS CTXSYS.CONTEXT;
parameters ('sync (on commit)');

CREATE INDEX place_index ON images(place)
INDEXTYPE IS CTXSYS.CONTEXT;
parameters ('sync (on commit)');


CREATE TABLE admin(
    user_name varchar(24),
    password  varchar(24),
    date_registered date,
    primary key(user_name)
);

CREATE TABLE image_views(
   image_id int,
   view_count int,
   PRIMARY KEY(image_id),
   FOREIGN KEY(image_id) REFERENCES images
);

commit;