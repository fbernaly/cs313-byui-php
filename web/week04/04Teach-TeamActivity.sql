DROP TABLE IF EXISTS public.note;

DROP TABLE IF EXISTS public.talk;

DROP TABLE IF EXISTS public.user;

CREATE TABLE public.user (
    id     			SERIAL NOT NULL PRIMARY KEY,
    firstName    	varchar(40) NOT NULL,
    lastName    	varchar(40) NOT NULL,
    email   		varchar(40) NOT NULL UNIQUE
);

DROP TABLE IF EXISTS public.speaker;

CREATE TABLE public.speaker (
    id     			SERIAL NOT NULL PRIMARY KEY,
    firstName    	varchar(40) NOT NULL,
    lastName    	varchar(40) NOT NULL
);

DROP TABLE IF EXISTS public.session;

DROP TABLE IF EXISTS public.month;

CREATE TABLE public.month (
    id     			SERIAL NOT NULL PRIMARY KEY,
    month   		varchar(40) NOT NULL UNIQUE
);

DROP TABLE IF EXISTS public.time;

CREATE TABLE public.time (
    id     			SERIAL NOT NULL PRIMARY KEY,
    time   			varchar(40) NOT NULL UNIQUE
);

CREATE TABLE public.session (
    id     			SERIAL NOT NULL PRIMARY KEY,
    time_id    		integer NOT NULL REFERENCES public.time(id),
    month_id    	integer NOT NULL REFERENCES public.month(id),
    year    		integer NOT NULL,
    UNIQUE (month_id, year)
);

CREATE TABLE public.talk (
    id     			SERIAL NOT NULL PRIMARY KEY,
    speaker_id      integer NOT NULL REFERENCES public.speaker(id),
    session_id   	integer NOT NULL REFERENCES public.session(id),
    name   			text NOT NULL
);

CREATE TABLE public.note (
    id     			SERIAL NOT NULL PRIMARY KEY,
    user_id         integer NOT NULL REFERENCES public.user(id),
    talk_id   		integer NOT NULL REFERENCES public.talk(id),
    note   			text NOT NULL
);


