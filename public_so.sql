/*
 Navicat Premium Data Transfer

 Source Server         : [127.0.0.1] PostgreSQL Local
 Source Server Type    : PostgreSQL
 Source Server Version : 100005
 Source Host           : localhost:5432
 Source Catalog        : project_diary
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 100005
 File Encoding         : 65001

 Date: 07/04/2020 22:42:48
*/


-- ----------------------------
-- Sequence structure for failed_jobs_id_seq
-- ----------------------------
--DROP SEQUENCE IF EXISTS "public"."failed_jobs_id_seq";
CREATE SEQUENCE "public"."failed_jobs_id_seq"
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for migrations_id_seq
-- ----------------------------
--DROP SEQUENCE IF EXISTS "public"."migrations_id_seq";
CREATE SEQUENCE "public"."migrations_id_seq"
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for permissions_id_seq
-- ----------------------------
--DROP SEQUENCE IF EXISTS "public"."permissions_id_seq";
CREATE SEQUENCE "public"."permissions_id_seq"
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for roles_id_seq
-- ----------------------------
--DROP SEQUENCE IF EXISTS "public"."roles_id_seq";
CREATE SEQUENCE "public"."roles_id_seq"
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
--DROP TABLE IF EXISTS "public"."failed_jobs";
CREATE TABLE "public"."failed_jobs" (
  "id" int8 NOT NULL DEFAULT nextval('failed_jobs_id_seq'::regclass),
  "connection" text COLLATE "pg_catalog"."default" NOT NULL,
  "queue" text COLLATE "pg_catalog"."default" NOT NULL,
  "payload" text COLLATE "pg_catalog"."default" NOT NULL,
  "exception" text COLLATE "pg_catalog"."default" NOT NULL,
  "failed_at" timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP
)
;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
--DROP TABLE IF EXISTS "public"."migrations";
CREATE TABLE "public"."migrations" (
  "id" int4 NOT NULL DEFAULT nextval('migrations_id_seq'::regclass),
  "migration" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "batch" int4 NOT NULL
)
;

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
--DROP TABLE IF EXISTS "public"."model_has_permissions";
CREATE TABLE "public"."model_has_permissions" (
  "permission_id" int8 NOT NULL,
  "model_type" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "model_id" uuid NOT NULL
)
;

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
--DROP TABLE IF EXISTS "public"."model_has_roles";
CREATE TABLE "public"."model_has_roles" (
  "role_id" int8 NOT NULL,
  "model_type" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "model_id" uuid NOT NULL
)
;

-- ----------------------------
-- Table structure for opt_groups
-- ----------------------------
--DROP TABLE IF EXISTS "public"."opt_groups";
CREATE TABLE "public"."opt_groups" (
  "id" uuid NOT NULL,
  "name" varchar(32) COLLATE "pg_catalog"."default" NOT NULL,
  "group" varchar(4) COLLATE "pg_catalog"."default" NOT NULL,
  "status" int2 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0)
)
;

-- ----------------------------
-- Table structure for opt_values
-- ----------------------------
--DROP TABLE IF EXISTS "public"."opt_values";
CREATE TABLE "public"."opt_values" (
  "id" uuid NOT NULL,
  "opt_group_id" uuid NOT NULL,
  "key" varchar(4) COLLATE "pg_catalog"."default" NOT NULL,
  "value" varchar(128) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0)
)
;

-- ----------------------------
-- Table structure for pages
-- ----------------------------
--DROP TABLE IF EXISTS "public"."pages";
CREATE TABLE "public"."pages" (
  "id" uuid NOT NULL,
  "label" varchar(50) COLLATE "pg_catalog"."default" NOT NULL,
  "uri" varchar(50) COLLATE "pg_catalog"."default" NOT NULL,
  "icon" varchar(50) COLLATE "pg_catalog"."default",
  "parent_id" uuid,
  "visible" bool NOT NULL,
  "sequence" varchar(10) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0)
)
;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
--DROP TABLE IF EXISTS "public"."password_resets";
CREATE TABLE "public"."password_resets" (
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "token" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0)
)
;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
--DROP TABLE IF EXISTS "public"."permissions";
CREATE TABLE "public"."permissions" (
  "id" int8 NOT NULL DEFAULT nextval('permissions_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "guard_name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Table structure for role_has_pages
-- ----------------------------
--DROP TABLE IF EXISTS "public"."role_has_pages";
CREATE TABLE "public"."role_has_pages" (
  "page_id" uuid NOT NULL,
  "role_id" int4 NOT NULL
)
;

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
--DROP TABLE IF EXISTS "public"."role_has_permissions";
CREATE TABLE "public"."role_has_permissions" (
  "permission_id" int8 NOT NULL,
  "role_id" int8 NOT NULL
)
;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
--DROP TABLE IF EXISTS "public"."roles";
CREATE TABLE "public"."roles" (
  "id" int8 NOT NULL DEFAULT nextval('roles_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "guard_name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Table structure for story_details
-- ----------------------------
--DROP TABLE IF EXISTS "public"."story_details";
CREATE TABLE "public"."story_details" (
  "id" uuid NOT NULL,
  "story_id" uuid NOT NULL,
  "task" text COLLATE "pg_catalog"."default" NOT NULL,
  "status" varchar(2) COLLATE "pg_catalog"."default" NOT NULL,
  "description" text COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0)
)
;

-- ----------------------------
-- Table structure for storys
-- ----------------------------
--DROP TABLE IF EXISTS "public"."storys";
CREATE TABLE "public"."storys" (
  "id" uuid NOT NULL,
  "date_story" date NOT NULL,
  "check_in" time(0) NOT NULL,
  "check_out" time(0) NOT NULL,
  "location" varchar(2) COLLATE "pg_catalog"."default" NOT NULL,
  "user_id" uuid NOT NULL,
  "status" varchar(2) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0)
)
;

-- ----------------------------
-- Table structure for users
-- ----------------------------
--DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "id" uuid NOT NULL,
  "username" varchar(32) COLLATE "pg_catalog"."default" NOT NULL,
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "email_verified_at" timestamp(0),
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "remember_token" varchar(100) COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."failed_jobs_id_seq"
OWNED BY "public"."failed_jobs"."id";
SELECT setval('"public"."failed_jobs_id_seq"', 2, false);
ALTER SEQUENCE "public"."migrations_id_seq"
OWNED BY "public"."migrations"."id";
SELECT setval('"public"."migrations_id_seq"', 8, true);
ALTER SEQUENCE "public"."permissions_id_seq"
OWNED BY "public"."permissions"."id";
SELECT setval('"public"."permissions_id_seq"', 20, true);
ALTER SEQUENCE "public"."roles_id_seq"
OWNED BY "public"."roles"."id";
SELECT setval('"public"."roles_id_seq"', 2, false);

-- ----------------------------
-- Primary Key structure for table failed_jobs
-- ----------------------------
ALTER TABLE "public"."failed_jobs" ADD CONSTRAINT "failed_jobs_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table migrations
-- ----------------------------
ALTER TABLE "public"."migrations" ADD CONSTRAINT "migrations_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table model_has_permissions
-- ----------------------------
CREATE INDEX "model_has_permissions_model_id_model_type_index" ON "public"."model_has_permissions" USING btree (
  "model_id" "pg_catalog"."uuid_ops" ASC NULLS LAST,
  "model_type" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table model_has_permissions
-- ----------------------------
ALTER TABLE "public"."model_has_permissions" ADD CONSTRAINT "model_has_permissions_pkey" PRIMARY KEY ("permission_id", "model_id", "model_type");

-- ----------------------------
-- Indexes structure for table model_has_roles
-- ----------------------------
CREATE INDEX "model_has_roles_model_id_model_type_index" ON "public"."model_has_roles" USING btree (
  "model_id" "pg_catalog"."uuid_ops" ASC NULLS LAST,
  "model_type" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table model_has_roles
-- ----------------------------
ALTER TABLE "public"."model_has_roles" ADD CONSTRAINT "model_has_roles_pkey" PRIMARY KEY ("role_id", "model_id", "model_type");

-- ----------------------------
-- Indexes structure for table opt_groups
-- ----------------------------
CREATE INDEX "opt_groups_id_index" ON "public"."opt_groups" USING btree (
  "id" "pg_catalog"."uuid_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table opt_groups
-- ----------------------------
ALTER TABLE "public"."opt_groups" ADD CONSTRAINT "opt_groups_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table opt_values
-- ----------------------------
CREATE INDEX "opt_values_id_index" ON "public"."opt_values" USING btree (
  "id" "pg_catalog"."uuid_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table opt_values
-- ----------------------------
ALTER TABLE "public"."opt_values" ADD CONSTRAINT "opt_values_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table pages
-- ----------------------------
CREATE INDEX "pages_id_index" ON "public"."pages" USING btree (
  "id" "pg_catalog"."uuid_ops" ASC NULLS LAST
);
CREATE INDEX "pages_label_index" ON "public"."pages" USING btree (
  "label" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE INDEX "pages_parent_id_index" ON "public"."pages" USING btree (
  "parent_id" "pg_catalog"."uuid_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table pages
-- ----------------------------
ALTER TABLE "public"."pages" ADD CONSTRAINT "pages_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table password_resets
-- ----------------------------
CREATE INDEX "password_resets_email_index" ON "public"."password_resets" USING btree (
  "email" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table permissions
-- ----------------------------
ALTER TABLE "public"."permissions" ADD CONSTRAINT "permissions_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table role_has_pages
-- ----------------------------
ALTER TABLE "public"."role_has_pages" ADD CONSTRAINT "role_has_pages_pkey" PRIMARY KEY ("page_id", "role_id");

-- ----------------------------
-- Primary Key structure for table role_has_permissions
-- ----------------------------
ALTER TABLE "public"."role_has_permissions" ADD CONSTRAINT "role_has_permissions_pkey" PRIMARY KEY ("permission_id", "role_id");

-- ----------------------------
-- Primary Key structure for table roles
-- ----------------------------
ALTER TABLE "public"."roles" ADD CONSTRAINT "roles_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table story_details
-- ----------------------------
CREATE INDEX "story_details_id_index" ON "public"."story_details" USING btree (
  "id" "pg_catalog"."uuid_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table story_details
-- ----------------------------
ALTER TABLE "public"."story_details" ADD CONSTRAINT "story_details_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table storys
-- ----------------------------
CREATE INDEX "storys_id_index" ON "public"."storys" USING btree (
  "id" "pg_catalog"."uuid_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table storys
-- ----------------------------
ALTER TABLE "public"."storys" ADD CONSTRAINT "storys_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table users
-- ----------------------------
CREATE INDEX "users_id_index" ON "public"."users" USING btree (
  "id" "pg_catalog"."uuid_ops" ASC NULLS LAST
);

-- ----------------------------
-- Uniques structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_username_unique" UNIQUE ("username");
ALTER TABLE "public"."users" ADD CONSTRAINT "users_email_unique" UNIQUE ("email");

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table model_has_permissions
-- ----------------------------
ALTER TABLE "public"."model_has_permissions" ADD CONSTRAINT "model_has_permissions_permission_id_foreign" FOREIGN KEY ("permission_id") REFERENCES "public"."permissions" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table model_has_roles
-- ----------------------------
ALTER TABLE "public"."model_has_roles" ADD CONSTRAINT "model_has_roles_role_id_foreign" FOREIGN KEY ("role_id") REFERENCES "public"."roles" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table opt_values
-- ----------------------------
ALTER TABLE "public"."opt_values" ADD CONSTRAINT "opt_values_opt_group_id_foreign" FOREIGN KEY ("opt_group_id") REFERENCES "public"."opt_groups" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table role_has_pages
-- ----------------------------
ALTER TABLE "public"."role_has_pages" ADD CONSTRAINT "role_has_pages_page_id_foreign" FOREIGN KEY ("page_id") REFERENCES "public"."pages" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "public"."role_has_pages" ADD CONSTRAINT "role_has_pages_role_id_foreign" FOREIGN KEY ("role_id") REFERENCES "public"."roles" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table role_has_permissions
-- ----------------------------
ALTER TABLE "public"."role_has_permissions" ADD CONSTRAINT "role_has_permissions_permission_id_foreign" FOREIGN KEY ("permission_id") REFERENCES "public"."permissions" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "public"."role_has_permissions" ADD CONSTRAINT "role_has_permissions_role_id_foreign" FOREIGN KEY ("role_id") REFERENCES "public"."roles" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table story_details
-- ----------------------------
ALTER TABLE "public"."story_details" ADD CONSTRAINT "story_details_story_id_foreign" FOREIGN KEY ("story_id") REFERENCES "public"."storys" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table storys
-- ----------------------------
ALTER TABLE "public"."storys" ADD CONSTRAINT "storys_user_id_foreign" FOREIGN KEY ("user_id") REFERENCES "public"."users" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
