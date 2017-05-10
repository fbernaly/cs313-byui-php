
DROP TABLE IF EXISTS public.film;
DROP TABLE IF EXISTS public.user;
DROP TABLE IF EXISTS public.role;
DROP TABLE IF EXISTS public.location;

-- 'role' will containt the roles users will have.
-- For example:
--  - patron: default role, they can only search films
--  - admin: they can add, delete and update the 'film' table.
--           admin can grant the same role to other patrons
CREATE TABLE public.role (
    id              SERIAL NOT NULL PRIMARY KEY,
    name            varchar(40) NOT NULL
);

-- 'location' is a table for all posible locations of a film.
-- This is the name of the office.
CREATE TABLE public.location (
    id              SERIAL NOT NULL PRIMARY KEY,
    name            varchar(40) NOT NULL
);

-- 'user' contains the info for users.
CREATE TABLE public.user (
    id              SERIAL NOT NULL PRIMARY KEY,
    firstName       varchar(40) NOT NULL,
    lastName        varchar(40) NOT NULL,
    email           varchar(40) NOT NULL UNIQUE,
    role_id         int NOT NULL REFERENCES public.role(id),
    created_at      date,
    updated_at      date
);

-- 'film' is the table for films.
-- admins can selcet, insert, update and delete
-- patrons can select
CREATE TABLE public.film (
    id              SERIAL NOT NULL PRIMARY KEY,
    number          integer NOT NULL,
    note            text,
    located_at      integer NOT NULL REFERENCES public.location(id),
    created_at      date NOT NULL,
    updated_at      date NOT NULL,
    created_by      integer NOT NULL REFERENCES public.user(id),
    updated_by      integer NOT NULL REFERENCES public.user(id)
);
