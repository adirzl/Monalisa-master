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

 Date: 07/04/2020 22:05:21
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
-- Records of migrations
-- ----------------------------
INSERT INTO "public"."migrations" VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO "public"."migrations" VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO "public"."migrations" VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO "public"."migrations" VALUES (4, '2020_01_13_065200_create_master_tables', 1);
INSERT INTO "public"."migrations" VALUES (5, '2020_01_13_081233_create_permission_tables', 1);
INSERT INTO "public"."migrations" VALUES (6, '2020_03_22_021417_create_master_app', 1);
INSERT INTO "public"."migrations" VALUES (7, '2020_03_23_051817_create_temp_table_1', 2);

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
-- Records of model_has_roles
-- ----------------------------
INSERT INTO "public"."model_has_roles" VALUES (1, 'App\Models\User', 'c3039b26-7853-47fc-a657-cf7c364e9d10');

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
-- Records of opt_groups
-- ----------------------------
INSERT INTO "public"."opt_groups" VALUES ('6b1f10cd-99a6-45de-b817-55ae467e92b8', 'location', 'app', 1, '2020-03-23 07:53:44', '2020-03-23 07:53:44', NULL);
INSERT INTO "public"."opt_groups" VALUES ('1e902707-9615-4046-a338-d11c1c686f8e', 'task_status', 'app', 1, '2020-03-26 16:16:54', '2020-03-26 16:16:54', NULL);
INSERT INTO "public"."opt_groups" VALUES ('f6f519f2-cda6-4c75-ba55-7878af3df122', 'story_status', 'app', 1, '2020-04-02 10:55:39', '2020-04-02 10:55:39', NULL);
INSERT INTO "public"."opt_groups" VALUES ('c4f0ea32-f412-42ce-9f1e-445b291d82eb', 'report_type', 'app', 1, '2020-04-04 08:15:26', '2020-04-04 08:15:26', NULL);

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
-- Records of opt_values
-- ----------------------------
INSERT INTO "public"."opt_values" VALUES ('9df13ed6-6270-4d8b-96ec-db85361f4f67', '6b1f10cd-99a6-45de-b817-55ae467e92b8', '1', 'Work From Office', '2020-03-23 08:02:24', '2020-03-23 08:02:24', NULL);
INSERT INTO "public"."opt_values" VALUES ('a20add94-c64d-4ac3-95e5-ee0341c9f534', '6b1f10cd-99a6-45de-b817-55ae467e92b8', '2', 'Work From Home', '2020-03-23 08:02:44', '2020-03-23 08:02:44', NULL);
INSERT INTO "public"."opt_values" VALUES ('94872a74-1a59-4df9-b862-0ec635a9acb5', '1e902707-9615-4046-a338-d11c1c686f8e', '1', 'On Progres', '2020-03-26 16:18:35', '2020-03-26 16:18:35', NULL);
INSERT INTO "public"."opt_values" VALUES ('134f748b-2186-4aef-b451-607aa9cb860a', '1e902707-9615-4046-a338-d11c1c686f8e', '2', 'Done', '2020-03-26 16:18:49', '2020-03-26 16:18:49', NULL);
INSERT INTO "public"."opt_values" VALUES ('3349524e-e049-453a-bd11-f040aa00f35a', 'f6f519f2-cda6-4c75-ba55-7878af3df122', '1', 'Active', '2020-04-03 13:57:29', '2020-04-03 13:57:29', NULL);
INSERT INTO "public"."opt_values" VALUES ('c1f1412f-0013-440c-9132-05db2f7ce37f', 'f6f519f2-cda6-4c75-ba55-7878af3df122', '2', 'Inactive', '2020-04-03 13:57:48', '2020-04-03 13:57:48', NULL);
INSERT INTO "public"."opt_values" VALUES ('be34675f-a206-4ec9-8b94-0d4fa96d8642', 'c4f0ea32-f412-42ce-9f1e-445b291d82eb', '1', 'By User', '2020-04-04 08:16:41', '2020-04-04 08:16:41', NULL);
INSERT INTO "public"."opt_values" VALUES ('8b17e7b7-faa1-46c9-9be5-3013f0652d58', 'c4f0ea32-f412-42ce-9f1e-445b291d82eb', '2', 'by Date', '2020-04-04 08:16:57', '2020-04-04 08:16:57', NULL);

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
-- Records of pages
-- ----------------------------
INSERT INTO "public"."pages" VALUES ('1134fa3f-2b48-44ad-8306-e9272a135f64', 'Dashboard', 'dashboard', 'home', NULL, 't', '1', '2020-03-22 03:44:26', '2020-03-22 03:44:26', NULL);
INSERT INTO "public"."pages" VALUES ('41543eaa-5b79-4633-aec7-79092692d222', 'Access Control', 'javascript:void(0);', 'apps', NULL, 't', '2', '2020-03-22 03:44:26', '2020-03-22 03:44:26', NULL);
INSERT INTO "public"."pages" VALUES ('23feee78-b247-49b2-8401-58376c541eea', 'Page', 'page', 'radio_button_unchecked', '41543eaa-5b79-4633-aec7-79092692d222', 't', '2.1', '2020-03-22 03:44:26', '2020-03-22 03:44:26', NULL);
INSERT INTO "public"."pages" VALUES ('dc855703-7eb3-488a-b536-153e8433a2ab', 'Permission', 'permission', 'radio_button_unchecked', '41543eaa-5b79-4633-aec7-79092692d222', 't', '2.2', '2020-03-22 03:44:26', '2020-03-22 03:44:26', NULL);
INSERT INTO "public"."pages" VALUES ('8ab10056-879e-481b-a508-66d57b70f555', 'Story', 'story', NULL, NULL, 't', '10', '2020-03-22 04:09:51', '2020-03-22 04:09:51', NULL);
INSERT INTO "public"."pages" VALUES ('7632c1f7-f8a9-43c8-8735-83550301cb94', 'Option Group', 'optgroup', NULL, '86b77824-5366-4e67-889c-b24ad14b12fd', 't', '9.1', '2020-03-23 05:23:19', '2020-03-23 05:23:19', NULL);
INSERT INTO "public"."pages" VALUES ('50a7be22-87ae-4857-a1b3-614bc3963567', 'Option Value', 'optvalue', NULL, '86b77824-5366-4e67-889c-b24ad14b12fd', 't', '9.2', '2020-03-23 05:23:53', '2020-03-23 05:23:53', NULL);
INSERT INTO "public"."pages" VALUES ('86b77824-5366-4e67-889c-b24ad14b12fd', 'Parameter', 'javascript:void(0);', NULL, NULL, 't', '9', '2020-03-23 05:22:23', '2020-03-23 05:22:23', NULL);
INSERT INTO "public"."pages" VALUES ('dda8d0d6-d623-41a1-a677-f195ed0d2298', 'tes', 'tes', NULL, NULL, 't', '100', '2020-03-29 09:34:33', '2020-03-29 09:34:33', NULL);
INSERT INTO "public"."pages" VALUES ('a095cce1-42ef-4d63-bee2-cccd98127dc8', 'tes1', 'tes1', NULL, NULL, 't', '101', '2020-03-29 10:13:35', '2020-03-29 10:13:35', NULL);
INSERT INTO "public"."pages" VALUES ('e8107e8e-87c9-43bc-838e-5c088483670d', 'Report', 'report', NULL, NULL, 't', '110', '2020-04-04 05:47:00', '2020-04-04 05:47:00', NULL);

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
-- Records of permissions
-- ----------------------------
INSERT INTO "public"."permissions" VALUES (1, 'delete_all log-application', 'web', '2020-03-22 03:44:26', '2020-03-22 03:44:26');
INSERT INTO "public"."permissions" VALUES (2, 'clean log-application', 'web', '2020-03-22 03:44:26', '2020-03-22 03:44:26');
INSERT INTO "public"."permissions" VALUES (3, 'delete log-application', 'web', '2020-03-22 03:44:26', '2020-03-22 03:44:26');
INSERT INTO "public"."permissions" VALUES (4, 'register', 'web', '2020-03-22 03:44:26', '2020-03-22 03:44:26');
INSERT INTO "public"."permissions" VALUES (5, 'request password', 'web', '2020-03-22 03:44:26', '2020-03-22 03:44:26');
INSERT INTO "public"."permissions" VALUES (6, 'reset password', 'web', '2020-03-22 03:44:26', '2020-03-22 03:44:26');
INSERT INTO "public"."permissions" VALUES (7, 'confirm password', 'web', '2020-03-22 03:44:26', '2020-03-22 03:44:26');
INSERT INTO "public"."permissions" VALUES (8, 'notice verification', 'web', '2020-03-22 03:44:26', '2020-03-22 03:44:26');
INSERT INTO "public"."permissions" VALUES (9, 'verify verification', 'web', '2020-03-22 03:44:26', '2020-03-22 03:44:26');
INSERT INTO "public"."permissions" VALUES (10, 'dashboard', 'web', '2020-03-22 03:44:26', '2020-03-22 03:44:26');
INSERT INTO "public"."permissions" VALUES (11, 'registration', 'web', '2020-03-22 03:44:26', '2020-03-22 03:44:26');
INSERT INTO "public"."permissions" VALUES (12, 'create page', 'web', '2020-03-22 03:44:26', '2020-03-22 03:44:26');
INSERT INTO "public"."permissions" VALUES (13, 'edit page', 'web', '2020-03-22 03:44:26', '2020-03-22 03:44:26');
INSERT INTO "public"."permissions" VALUES (14, 'wizard page', 'web', '2020-03-22 03:44:26', '2020-03-22 03:44:26');
INSERT INTO "public"."permissions" VALUES (15, 'configuration page', 'web', '2020-03-22 03:44:26', '2020-03-22 03:44:26');
INSERT INTO "public"."permissions" VALUES (16, 'create page', 'web', '2020-03-22 03:44:26', '2020-03-22 03:44:26');
INSERT INTO "public"."permissions" VALUES (17, 'show page', 'web', '2020-03-22 03:44:26', '2020-03-22 03:44:26');
INSERT INTO "public"."permissions" VALUES (18, 'edit page', 'web', '2020-03-22 03:44:26', '2020-03-22 03:44:26');
INSERT INTO "public"."permissions" VALUES (19, 'delete page', 'web', '2020-03-22 03:44:26', '2020-03-22 03:44:26');

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
-- Records of role_has_pages
-- ----------------------------
INSERT INTO "public"."role_has_pages" VALUES ('1134fa3f-2b48-44ad-8306-e9272a135f64', 1);
INSERT INTO "public"."role_has_pages" VALUES ('41543eaa-5b79-4633-aec7-79092692d222', 1);
INSERT INTO "public"."role_has_pages" VALUES ('23feee78-b247-49b2-8401-58376c541eea', 1);
INSERT INTO "public"."role_has_pages" VALUES ('dc855703-7eb3-488a-b536-153e8433a2ab', 1);
INSERT INTO "public"."role_has_pages" VALUES ('8ab10056-879e-481b-a508-66d57b70f555', 1);
INSERT INTO "public"."role_has_pages" VALUES ('86b77824-5366-4e67-889c-b24ad14b12fd', 1);
INSERT INTO "public"."role_has_pages" VALUES ('7632c1f7-f8a9-43c8-8735-83550301cb94', 1);
INSERT INTO "public"."role_has_pages" VALUES ('50a7be22-87ae-4857-a1b3-614bc3963567', 1);
INSERT INTO "public"."role_has_pages" VALUES ('e8107e8e-87c9-43bc-838e-5c088483670d', 1);

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
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO "public"."role_has_permissions" VALUES (1, 1);
INSERT INTO "public"."role_has_permissions" VALUES (2, 1);
INSERT INTO "public"."role_has_permissions" VALUES (3, 1);
INSERT INTO "public"."role_has_permissions" VALUES (4, 1);
INSERT INTO "public"."role_has_permissions" VALUES (5, 1);
INSERT INTO "public"."role_has_permissions" VALUES (6, 1);
INSERT INTO "public"."role_has_permissions" VALUES (7, 1);
INSERT INTO "public"."role_has_permissions" VALUES (8, 1);
INSERT INTO "public"."role_has_permissions" VALUES (9, 1);
INSERT INTO "public"."role_has_permissions" VALUES (10, 1);
INSERT INTO "public"."role_has_permissions" VALUES (11, 1);
INSERT INTO "public"."role_has_permissions" VALUES (12, 1);
INSERT INTO "public"."role_has_permissions" VALUES (13, 1);
INSERT INTO "public"."role_has_permissions" VALUES (14, 1);
INSERT INTO "public"."role_has_permissions" VALUES (15, 1);
INSERT INTO "public"."role_has_permissions" VALUES (17, 1);
INSERT INTO "public"."role_has_permissions" VALUES (19, 1);

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
-- Records of roles
-- ----------------------------
INSERT INTO "public"."roles" VALUES (1, 'Super Admin', 'web', '2020-03-22 03:44:26', '2020-03-22 03:44:26');

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
-- Records of story_details
-- ----------------------------
INSERT INTO "public"."story_details" VALUES ('b4a7147c-8f91-4947-a7c8-f9a9d10313af', 'e1c3f1d5-d673-424e-ae47-79556af5172a', 't1', '1', 'd1', '2020-03-23 20:24:48', '2020-03-23 20:24:48', NULL);
INSERT INTO "public"."story_details" VALUES ('8b988e27-fa48-4e8b-8e49-2197c4a7687e', 'e1c3f1d5-d673-424e-ae47-79556af5172a', 't2', '1', 'd2', '2020-03-23 20:24:48', '2020-03-23 20:24:48', NULL);
INSERT INTO "public"."story_details" VALUES ('af430e86-5ca4-49eb-acb9-e823b7a8e15b', '8676ad03-1cd2-422b-82dc-3811a4cf7ba8', 't1', '1', 'd1', '2020-03-25 05:14:13', '2020-03-25 05:14:13', NULL);
INSERT INTO "public"."story_details" VALUES ('25a71fd9-0d1f-4a3b-9bcb-6af32018c58e', '7f3df03f-cce9-4c2f-bb2e-f37ccd8445ad', 't1', '1', 'd1', '2020-03-25 05:16:20', '2020-03-25 05:16:20', NULL);
INSERT INTO "public"."story_details" VALUES ('6beb692d-5668-4753-9221-d197ed70e0ae', '507b37d6-e17d-4780-9875-a7492fc93021', 't1', '1', 'd1', '2020-03-25 05:17:50', '2020-03-25 05:17:50', NULL);
INSERT INTO "public"."story_details" VALUES ('2898e850-4ba6-492a-b38a-01d26988e010', '1daa1697-8258-4eda-a8a6-bbda81e5f371', 't1', '1', 'd1', '2020-03-25 05:19:37', '2020-03-25 05:19:37', NULL);
INSERT INTO "public"."story_details" VALUES ('d33d2d05-e0d9-4311-9ed0-88244f5b62ea', 'ce34a0c7-9c09-4f21-a09b-441c211c6b99', 't1', '1', 'd1', '2020-03-25 05:21:48', '2020-03-25 05:21:48', NULL);
INSERT INTO "public"."story_details" VALUES ('0dbda04d-412e-4ee3-b455-16a5dbe3b8b6', 'eaa9fd0f-d805-4335-bf40-19aeaece009d', 't1', '1', 'd1', '2020-03-25 05:22:54', '2020-03-25 05:22:54', NULL);
INSERT INTO "public"."story_details" VALUES ('f363ac71-56ed-4779-96fb-d3744d321f0b', '0b614c63-9709-49e4-98d8-b5a1a6d39e99', 't1', '1', 'd1', '2020-03-25 05:58:29', '2020-03-25 05:58:29', NULL);
INSERT INTO "public"."story_details" VALUES ('942bca3b-55bf-408b-9f22-3fbc7a10cf08', '6b996953-1c57-4fc5-8be5-fc53dba92b74', 't1', '1', 'd1', '2020-03-25 06:10:28', '2020-03-25 06:10:28', NULL);
INSERT INTO "public"."story_details" VALUES ('c44e5379-c5e5-4b60-a858-8b1da8781560', '45d69258-fe13-4e21-9090-219fff1c5160', 't1', '1', 'd1', '2020-03-25 06:11:17', '2020-03-25 06:11:17', NULL);
INSERT INTO "public"."story_details" VALUES ('12882846-d8d4-48e4-9146-2ebdab16a4a0', 'b653f6e3-df0e-4580-b16b-02240a419de1', 't1', '1', 'd1', '2020-03-25 06:44:29', '2020-03-25 06:44:29', NULL);
INSERT INTO "public"."story_details" VALUES ('831036f5-15df-403d-bda8-e8faf067ff17', '67db4975-58d4-4048-92a9-bb87df5ebc58', 't1', '1', 'd1', '2020-03-25 09:40:27', '2020-03-25 09:40:27', NULL);
INSERT INTO "public"."story_details" VALUES ('bd5cb75c-8c29-44d8-99ef-4bb041deba46', '0d7fe945-59cd-4f0b-90c5-02969b3c3ab7', 't1', '1', 'd1', '2020-03-25 09:41:39', '2020-03-25 09:41:39', NULL);
INSERT INTO "public"."story_details" VALUES ('9e1cabf8-f75f-4f13-b218-fbe468b0d0bc', 'be2d9e58-05ce-48af-b08a-8f6167aa9921', 't1', '1', 'd1', '2020-03-25 09:44:12', '2020-03-25 09:44:12', NULL);
INSERT INTO "public"."story_details" VALUES ('99bda893-3a85-4be9-bf8f-deb3328b22b2', '16d6fe0c-041b-4d25-b8ea-237614a6d084', 't1', '1', 'd1', '2020-03-25 09:44:54', '2020-03-25 09:44:54', NULL);
INSERT INTO "public"."story_details" VALUES ('ac00728a-4e2b-4d7d-a551-19eda1e4aa49', '9a8febfc-ec44-4af3-8dcd-0f07fa075717', 't1', '1', 'd1', '2020-03-25 09:46:29', '2020-03-25 09:46:29', NULL);
INSERT INTO "public"."story_details" VALUES ('ac93271a-9d06-428a-ab8e-a92e7df62f89', '1b64304c-8f3b-4a63-ae6a-627fd61cf925', 't1', '1', 'd1', '2020-03-25 09:54:54', '2020-03-25 09:54:54', NULL);
INSERT INTO "public"."story_details" VALUES ('62ab9950-1ada-4c4d-a6fb-9657dba5b4fb', '54df7bb4-728a-4424-b652-96ca052ac47d', 't1', '1', 'd1', '2020-03-25 19:53:49', '2020-03-25 19:53:49', NULL);
INSERT INTO "public"."story_details" VALUES ('2951d2c3-4e9b-4de9-aa6d-6b3494a74148', '430c0737-3e39-4456-a9e4-daa729fd52a7', 't1', '1', 'd1', '2020-03-25 19:54:37', '2020-03-25 19:54:37', NULL);
INSERT INTO "public"."story_details" VALUES ('df981d1a-a1aa-4d36-bb23-ecf825246480', '95c20700-f893-4ef0-9a67-075e4cc2cb70', 't1', '1', 'd1', '2020-03-25 19:59:48', '2020-03-25 19:59:48', NULL);
INSERT INTO "public"."story_details" VALUES ('89403287-1562-4c11-af21-8f0c82395d52', '295013e5-31bf-4cb0-aebf-a55c8fd409a5', 't1', '1', 'd1', '2020-03-25 20:01:09', '2020-03-25 20:01:09', NULL);
INSERT INTO "public"."story_details" VALUES ('75557b85-dcd4-4ed7-b7bc-424400e43987', 'e00fc1a7-56fc-4725-8dd2-401742b36163', 't1', '1', 'd1', '2020-03-25 20:04:22', '2020-03-25 20:04:22', NULL);
INSERT INTO "public"."story_details" VALUES ('c77477b1-07cf-4ca5-9fe8-fedd1d0862b3', '87842de3-d887-415b-8f3d-2e0e476845eb', 'kerja 1', '1', 'des ker 1', '2020-04-01 19:22:12', '2020-04-01 19:22:12', NULL);
INSERT INTO "public"."story_details" VALUES ('98c34017-67c7-47f3-bcd9-e4fbdee2439e', '87842de3-d887-415b-8f3d-2e0e476845eb', 'ker 2', '2', 'dess ker 2', '2020-04-01 19:22:12', '2020-04-01 19:54:44', NULL);
INSERT INTO "public"."story_details" VALUES ('43cb5a14-e307-42d8-8149-0a5bb26830ce', '4536f808-c657-4725-b8cf-e5fc36537c93', 't1', '1', 'd1', '2020-04-01 19:55:56', '2020-04-01 19:55:56', NULL);
INSERT INTO "public"."story_details" VALUES ('0ef927c8-e26f-4158-8596-d3257305b525', '4536f808-c657-4725-b8cf-e5fc36537c93', 't2', '2', 'd2', '2020-04-01 19:55:56', '2020-04-01 19:55:56', NULL);

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
-- Records of storys
-- ----------------------------
INSERT INTO "public"."storys" VALUES ('e1c3f1d5-d673-424e-ae47-79556af5172a', '2020-03-24', '02:15:00', '03:16:00', '1', 'c3039b26-7853-47fc-a657-cf7c364e9d10', '1', '2020-03-23 20:24:48', '2020-03-23 20:24:48', NULL);
INSERT INTO "public"."storys" VALUES ('8676ad03-1cd2-422b-82dc-3811a4cf7ba8', '2020-03-25', '12:13:00', '15:13:00', '2', 'c3039b26-7853-47fc-a657-cf7c364e9d10', '1', '2020-03-25 05:14:13', '2020-03-25 05:14:13', NULL);
INSERT INTO "public"."storys" VALUES ('7f3df03f-cce9-4c2f-bb2e-f37ccd8445ad', '2020-03-29', '12:15:00', '18:15:00', '2', 'c3039b26-7853-47fc-a657-cf7c364e9d10', '1', '2020-03-25 05:16:20', '2020-03-25 05:16:20', NULL);
INSERT INTO "public"."storys" VALUES ('507b37d6-e17d-4780-9875-a7492fc93021', '2020-03-25', '12:17:00', '19:17:00', '2', 'c3039b26-7853-47fc-a657-cf7c364e9d10', '1', '2020-03-25 05:17:50', '2020-03-25 05:17:50', NULL);
INSERT INTO "public"."storys" VALUES ('1daa1697-8258-4eda-a8a6-bbda81e5f371', '2020-03-25', '12:19:00', '12:19:00', '2', 'c3039b26-7853-47fc-a657-cf7c364e9d10', '1', '2020-03-25 05:19:37', '2020-03-25 05:19:37', NULL);
INSERT INTO "public"."storys" VALUES ('ce34a0c7-9c09-4f21-a09b-441c211c6b99', '2020-03-25', '12:21:00', '12:21:00', '1', 'c3039b26-7853-47fc-a657-cf7c364e9d10', '1', '2020-03-25 05:21:48', '2020-03-25 05:21:48', NULL);
INSERT INTO "public"."storys" VALUES ('eaa9fd0f-d805-4335-bf40-19aeaece009d', '2020-03-25', '12:22:00', '12:22:00', '2', 'c3039b26-7853-47fc-a657-cf7c364e9d10', '1', '2020-03-25 05:22:54', '2020-03-25 05:22:54', NULL);
INSERT INTO "public"."storys" VALUES ('0b614c63-9709-49e4-98d8-b5a1a6d39e99', '2020-03-25', '12:58:00', '12:58:00', '2', 'c3039b26-7853-47fc-a657-cf7c364e9d10', '1', '2020-03-25 05:58:29', '2020-03-25 05:58:29', NULL);
INSERT INTO "public"."storys" VALUES ('6b996953-1c57-4fc5-8be5-fc53dba92b74', '2020-03-25', '13:10:00', '13:10:00', '2', 'c3039b26-7853-47fc-a657-cf7c364e9d10', '1', '2020-03-25 06:10:28', '2020-03-25 06:10:28', NULL);
INSERT INTO "public"."storys" VALUES ('45d69258-fe13-4e21-9090-219fff1c5160', '2020-03-25', '13:11:00', '13:11:00', '1', 'c3039b26-7853-47fc-a657-cf7c364e9d10', '1', '2020-03-25 06:11:17', '2020-03-25 06:11:17', NULL);
INSERT INTO "public"."storys" VALUES ('b653f6e3-df0e-4580-b16b-02240a419de1', '2020-03-25', '13:44:00', '13:44:00', '2', 'c3039b26-7853-47fc-a657-cf7c364e9d10', '1', '2020-03-25 06:44:29', '2020-03-25 06:44:29', NULL);
INSERT INTO "public"."storys" VALUES ('67db4975-58d4-4048-92a9-bb87df5ebc58', '2020-03-31', '16:40:00', '16:40:00', '2', 'c3039b26-7853-47fc-a657-cf7c364e9d10', '1', '2020-03-25 09:40:27', '2020-03-25 09:40:27', NULL);
INSERT INTO "public"."storys" VALUES ('0d7fe945-59cd-4f0b-90c5-02969b3c3ab7', '2020-03-31', '16:41:00', '16:41:00', '2', 'c3039b26-7853-47fc-a657-cf7c364e9d10', '1', '2020-03-25 09:41:39', '2020-03-25 09:41:39', NULL);
INSERT INTO "public"."storys" VALUES ('be2d9e58-05ce-48af-b08a-8f6167aa9921', '2020-03-31', '16:43:00', '16:43:00', '2', 'c3039b26-7853-47fc-a657-cf7c364e9d10', '1', '2020-03-25 09:44:12', '2020-03-25 09:44:12', NULL);
INSERT INTO "public"."storys" VALUES ('16d6fe0c-041b-4d25-b8ea-237614a6d084', '2020-03-31', '16:44:00', '16:44:00', '2', 'c3039b26-7853-47fc-a657-cf7c364e9d10', '1', '2020-03-25 09:44:54', '2020-03-25 09:44:54', NULL);
INSERT INTO "public"."storys" VALUES ('9a8febfc-ec44-4af3-8dcd-0f07fa075717', '2020-03-31', '16:46:00', '16:46:00', '2', 'c3039b26-7853-47fc-a657-cf7c364e9d10', '1', '2020-03-25 09:46:29', '2020-03-25 09:46:29', NULL);
INSERT INTO "public"."storys" VALUES ('1b64304c-8f3b-4a63-ae6a-627fd61cf925', '2020-03-25', '16:54:00', '16:54:00', '2', 'c3039b26-7853-47fc-a657-cf7c364e9d10', '1', '2020-03-25 09:54:54', '2020-03-25 09:54:54', NULL);
INSERT INTO "public"."storys" VALUES ('0ad01416-6a43-4d0a-bd40-b6ec85cf147d', '2020-03-25', '17:32:00', '17:32:00', '2', 'c3039b26-7853-47fc-a657-cf7c364e9d10', '1', '2020-03-25 10:32:40', '2020-03-25 10:32:40', NULL);
INSERT INTO "public"."storys" VALUES ('54df7bb4-728a-4424-b652-96ca052ac47d', '2020-03-26', '02:53:00', '02:53:00', '2', 'c3039b26-7853-47fc-a657-cf7c364e9d10', '1', '2020-03-25 19:53:49', '2020-03-25 19:53:49', NULL);
INSERT INTO "public"."storys" VALUES ('430c0737-3e39-4456-a9e4-daa729fd52a7', '2020-03-26', '02:54:00', '02:54:00', '1', 'c3039b26-7853-47fc-a657-cf7c364e9d10', '1', '2020-03-25 19:54:37', '2020-03-25 19:54:37', NULL);
INSERT INTO "public"."storys" VALUES ('95c20700-f893-4ef0-9a67-075e4cc2cb70', '2020-03-26', '02:59:00', '02:59:00', '1', 'c3039b26-7853-47fc-a657-cf7c364e9d10', '1', '2020-03-25 19:59:48', '2020-03-25 19:59:48', NULL);
INSERT INTO "public"."storys" VALUES ('295013e5-31bf-4cb0-aebf-a55c8fd409a5', '2020-03-26', '03:00:00', '03:00:00', '1', 'c3039b26-7853-47fc-a657-cf7c364e9d10', '1', '2020-03-25 20:01:09', '2020-03-25 20:01:09', NULL);
INSERT INTO "public"."storys" VALUES ('e00fc1a7-56fc-4725-8dd2-401742b36163', '2020-03-26', '03:04:00', '03:04:00', '2', 'c3039b26-7853-47fc-a657-cf7c364e9d10', '1', '2020-03-25 20:04:22', '2020-03-25 20:04:22', NULL);
INSERT INTO "public"."storys" VALUES ('87842de3-d887-415b-8f3d-2e0e476845eb', '2020-04-02', '02:21:00', '02:21:00', '1', 'c3039b26-7853-47fc-a657-cf7c364e9d10', '1', '2020-04-01 19:22:12', '2020-04-02 10:08:27', '2020-04-02 10:08:27');
INSERT INTO "public"."storys" VALUES ('4536f808-c657-4725-b8cf-e5fc36537c93', '2020-04-01', '02:55:00', '02:55:00', '2', 'c3039b26-7853-47fc-a657-cf7c364e9d10', '1', '2020-04-01 19:55:56', '2020-04-03 20:14:28', '2020-04-03 20:14:28');

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
-- Records of users
-- ----------------------------
INSERT INTO "public"."users" VALUES ('c3039b26-7853-47fc-a657-cf7c364e9d10', 'sa', 'Super Admin', 'sa@mail.com', '2020-03-22 03:44:26', '$2y$10$xbpl40T8DIMuiYng3U9ZUeTneTQNx2p5HMsjeNU2MlmJV2unHQ3wC', NULL, '2020-03-22 03:44:26', '2020-03-22 03:44:26');

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
