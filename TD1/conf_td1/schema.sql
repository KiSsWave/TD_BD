

DROP TABLE IF EXISTS "article";
CREATE TABLE "public"."article" (
                                    "id" integer NOT NULL,
                                    "nom" character varying(48),
                                    "descr" character varying(256),
                                    "tarif" numeric(10,2),
                                    "id_categ" integer,
                                    CONSTRAINT "article_pkey" PRIMARY KEY ("id")
) WITH (oids = false);


DROP TABLE IF EXISTS "categorie";
CREATE TABLE "public"."categorie" (
                                      "id" integer NOT NULL,
                                      "nom" character varying(32) NOT NULL,
                                      "descr" text,
                                      CONSTRAINT "categorie_pkey" PRIMARY KEY ("id")
) WITH (oids = false);

