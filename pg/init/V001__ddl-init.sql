CREATE SCHEMA IF NOT EXISTS site;

CREATE TABLE site.user
(
    id       SERIAL PRIMARY KEY,
    login    VARCHAR NOT NULL UNIQUE,
    password VARCHAR NOT NULL
);

CREATE TABLE site.order
(
    id         SERIAL PRIMARY KEY,
    user_id    INTEGER NOT NULL REFERENCES site.user (id),
    name       VARCHAR NOT NULL,
    surname    VARCHAR NOT NULL,
    patronymic VARCHAR NOT NULL,
    address    TEXT    NOT NULL,
    number     VARCHAR NOT NULL,
    email      VARCHAR NOT NULL,
    comment    TEXT
);

CREATE TABLE site.good
(
    id             SERIAL PRIMARY KEY,
    name           VARCHAR NOT NULL UNIQUE,
    localized_name VARCHAR
);

CREATE TABLE site.order_to_good
(
    order_id INTEGER NOT NULL REFERENCES site.order (id),
    good_id  INTEGER NOT NULL REFERENCES site.good (id)
);

CREATE INDEX good_name_index ON site.good(name);
CREATE INDEX user_login_index ON site.user(login);

