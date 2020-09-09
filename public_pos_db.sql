/*
 Navicat Premium Data Transfer

 Source Server         : [127.0.0.1] PostgreSQL Local
 Source Server Type    : PostgreSQL
 Source Server Version : 100005
 Source Host           : localhost:5432
 Source Catalog        : pos_db
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 100005
 File Encoding         : 65001

 Date: 20/07/2020 14:20:10
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
-- Table structure for carts
-- ----------------------------
--DROP TABLE IF EXISTS "public"."carts";
CREATE TABLE "public"."carts" (
  "id" uuid NOT NULL,
  "user_id" uuid NOT NULL,
  "ordertype" varchar(2) COLLATE "pg_catalog"."default" NOT NULL,
  "status" int2 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0)
)
;

-- ----------------------------
-- Table structure for customers
-- ----------------------------
--DROP TABLE IF EXISTS "public"."customers";
CREATE TABLE "public"."customers" (
  "id" uuid NOT NULL,
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "address" text COLLATE "pg_catalog"."default" NOT NULL,
  "kelurahan" varchar(32) COLLATE "pg_catalog"."default" NOT NULL,
  "kecamatan" varchar(32) COLLATE "pg_catalog"."default" NOT NULL,
  "kabkot" varchar(32) COLLATE "pg_catalog"."default" NOT NULL,
  "province_id" uuid NOT NULL,
  "phone" varchar(32) COLLATE "pg_catalog"."default" NOT NULL,
  "description" text COLLATE "pg_catalog"."default" NOT NULL,
  "status" int2 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0)
)
;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO "public"."customers" VALUES ('4831c8fe-0df1-4520-8e1c-a5c10cff99c2', 'Tantan Suryana', 'jatihandap', 'jati', 'handap', 'bandung', 'd3868727-a5d7-43ec-8961-d0f7a8e39a83', '0987654', 'sdsdf sdfsdf ganti', 1, '2020-07-19 04:17:11', '2020-07-19 05:02:06', NULL);

-- ----------------------------
-- Table structure for detailcarts
-- ----------------------------
--DROP TABLE IF EXISTS "public"."detailcarts";
CREATE TABLE "public"."detailcarts" (
  "id" uuid NOT NULL,
  "user_id" uuid NOT NULL,
  "product_id" uuid NOT NULL,
  "price" numeric(8,2) NOT NULL,
  "qty" int4 NOT NULL,
  "status" int2 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0)
)
;

-- ----------------------------
-- Records of detailcarts
-- ----------------------------
INSERT INTO "public"."detailcarts" VALUES ('3486e761-3b0a-4ef8-bf0d-5a20fb5fe74b', 'd8ef483c-0984-4205-88d8-c160f918a56b', '6325c69c-f29c-4817-a6e9-314f7d1e3e3b', 12000.00, 2, 1, '2020-07-20 03:05:26', '2020-07-20 03:05:26', NULL);
INSERT INTO "public"."detailcarts" VALUES ('bc57a9c7-9907-4cf4-8b1b-5b50214de2fb', 'd8ef483c-0984-4205-88d8-c160f918a56b', '265d6574-8dd0-4522-b00c-f7e041593026', 10000.00, 3, 1, '2020-07-20 03:57:08', '2020-07-20 03:57:08', NULL);
INSERT INTO "public"."detailcarts" VALUES ('61b9bb24-62fb-40ca-b1f3-0c6f512cebef', 'd8ef483c-0984-4205-88d8-c160f918a56b', '6325c69c-f29c-4817-a6e9-314f7d1e3e3b', 12000.00, 1, 1, '2020-07-20 03:57:43', '2020-07-20 03:57:43', NULL);
INSERT INTO "public"."detailcarts" VALUES ('c2135bc2-0870-46db-8b17-03c140ef29aa', 'd8ef483c-0984-4205-88d8-c160f918a56b', '6325c69c-f29c-4817-a6e9-314f7d1e3e3b', 12000.00, 45, 1, '2020-07-20 03:58:05', '2020-07-20 03:58:05', NULL);

-- ----------------------------
-- Table structure for detailorders
-- ----------------------------
--DROP TABLE IF EXISTS "public"."detailorders";
CREATE TABLE "public"."detailorders" (
  "id" uuid NOT NULL,
  "order_id" uuid NOT NULL,
  "product_id" uuid NOT NULL,
  "price" numeric(8,2) NOT NULL,
  "qty" int4 NOT NULL,
  "status" int2 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0)
)
;

-- ----------------------------
-- Table structure for discounts
-- ----------------------------
--DROP TABLE IF EXISTS "public"."discounts";
CREATE TABLE "public"."discounts" (
  "id" uuid NOT NULL,
  "name" varchar(64) COLLATE "pg_catalog"."default" NOT NULL,
  "percentage" int4 NOT NULL,
  "description" text COLLATE "pg_catalog"."default" NOT NULL,
  "status" int2 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0)
)
;

-- ----------------------------
-- Records of discounts
-- ----------------------------
INSERT INTO "public"."discounts" VALUES ('408268db-7968-4ed4-84e8-1e194e6f2dc6', 'diskon akhir tahun', 15, 'diberikan kepada bla bla', 1, '2020-07-19 03:12:49', '2020-07-19 03:12:49', NULL);
INSERT INTO "public"."discounts" VALUES ('9c7ad96e-192a-4d58-9e9a-1f18f0cb7329', 'diskon pelajar', 10, 'sdfas sadfasfd asdfsdfsdafsdf untuk pelajar', 2, '2020-07-19 03:28:00', '2020-07-19 03:30:29', NULL);

-- ----------------------------
-- Table structure for ekspedisis
-- ----------------------------
--DROP TABLE IF EXISTS "public"."ekspedisis";
CREATE TABLE "public"."ekspedisis" (
  "id" uuid NOT NULL,
  "name" varchar(64) COLLATE "pg_catalog"."default" NOT NULL,
  "description" text COLLATE "pg_catalog"."default" NOT NULL,
  "status" int2 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0)
)
;

-- ----------------------------
-- Records of ekspedisis
-- ----------------------------
INSERT INTO "public"."ekspedisis" VALUES ('dd353e14-407b-4ca0-bd57-c942e5760490', 'JNE', 'dfsdf sdfdsfdsf', 1, '2020-07-19 03:51:25', '2020-07-19 03:51:25', NULL);
INSERT INTO "public"."ekspedisis" VALUES ('99a5c989-6031-4221-8de4-40aba007a020', 'TIKI', 'asdf dsf ganti', 1, '2020-07-19 03:55:18', '2020-07-19 04:00:39', NULL);

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
INSERT INTO "public"."migrations" VALUES (8, '2020_03_22_021417_create_master_app', 2);
INSERT INTO "public"."migrations" VALUES (9, '2020_07_16_105212_create_transaction_app', 3);

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
INSERT INTO "public"."model_has_roles" VALUES (1, 'App\Models\User', 'd8ef483c-0984-4205-88d8-c160f918a56b');

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
INSERT INTO "public"."opt_groups" VALUES ('6b1f10cd-99a6-45de-b817-55ae467e92b8', 'status', 'app', 1, '2020-03-23 07:53:44', '2020-03-23 07:53:44', NULL);
INSERT INTO "public"."opt_groups" VALUES ('6b1f10cd-99a6-45de-b817-55ae467e92b9', 'product_category', 'app', 1, '2020-03-23 07:53:44', '2020-03-23 07:53:44', NULL);
INSERT INTO "public"."opt_groups" VALUES ('6b1f10cd-99a6-45de-b817-55ae467e92b0', 'product_unit', 'app', 1, '2020-03-23 07:53:44', '2020-03-23 07:53:44', NULL);
INSERT INTO "public"."opt_groups" VALUES ('6b1f10cd-99a6-45de-b817-55ae467e92b1', 'order_ordertype', 'app', 1, '2020-03-23 07:53:44', '2020-03-23 07:53:44', NULL);
INSERT INTO "public"."opt_groups" VALUES ('6b1f10cd-99a6-45de-b817-55ae467e92b2', 'order_paymenttype', 'app', 1, '2020-03-23 07:53:44', '2020-03-23 07:53:44', NULL);

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
INSERT INTO "public"."opt_values" VALUES ('9df13ed6-6270-4d8b-96ec-db85361f4f67', '6b1f10cd-99a6-45de-b817-55ae467e92b8', '1', 'Aktif', '2020-03-23 08:02:24', '2020-03-23 08:02:24', NULL);
INSERT INTO "public"."opt_values" VALUES ('9df13ed6-6270-4d8b-96ec-db85361f4f68', '6b1f10cd-99a6-45de-b817-55ae467e92b8', '2', 'Non-aktif', '2020-03-23 08:02:24', '2020-03-23 08:02:24', NULL);
INSERT INTO "public"."opt_values" VALUES ('9df13ed6-6270-4d8b-96ec-db85361f4f69', '6b1f10cd-99a6-45de-b817-55ae467e92b9', '1', 'Makanan', '2020-03-23 08:02:24', '2020-03-23 08:02:24', NULL);
INSERT INTO "public"."opt_values" VALUES ('9df13ed6-6270-4d8b-96ec-db85361f4f60', '6b1f10cd-99a6-45de-b817-55ae467e92b0', '1', 'Pcs', '2020-03-23 08:02:24', '2020-03-23 08:02:24', NULL);
INSERT INTO "public"."opt_values" VALUES ('9df13ed6-6270-4d8b-96ec-db85361f4f61', '6b1f10cd-99a6-45de-b817-55ae467e92b1', '1', 'Take Away', '2020-03-23 08:02:24', '2020-03-23 08:02:24', NULL);
INSERT INTO "public"."opt_values" VALUES ('9df13ed6-6270-4d8b-96ec-db85361f4f62', '6b1f10cd-99a6-45de-b817-55ae467e92b2', '1', 'Cash', '2020-03-23 08:02:24', '2020-03-23 08:02:24', NULL);
INSERT INTO "public"."opt_values" VALUES ('9df13ed6-6270-4d8b-96ec-db85361f4f63', '6b1f10cd-99a6-45de-b817-55ae467e92b1', '2', 'Delivery', '2020-03-23 08:02:24', '2020-03-23 08:02:24', NULL);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
--DROP TABLE IF EXISTS "public"."orders";
CREATE TABLE "public"."orders" (
  "id" uuid NOT NULL,
  "user_id" uuid NOT NULL,
  "ordertype" varchar(2) COLLATE "pg_catalog"."default" NOT NULL,
  "paymenttype" varchar(2) COLLATE "pg_catalog"."default" NOT NULL,
  "discount_id" uuid,
  "discount_percentage" int4,
  "status" int2 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0),
  "customer_id" uuid
)
;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO "public"."orders" VALUES ('5ada0c9a-9d75-4d7d-bf86-d53a5c523ae6', 'd8ef483c-0984-4205-88d8-c160f918a56b', '1', '1', NULL, NULL, 1, '2020-07-19 08:24:23', '2020-07-19 08:24:23', NULL, NULL);

-- ----------------------------
-- Table structure for outlets
-- ----------------------------
--DROP TABLE IF EXISTS "public"."outlets";
CREATE TABLE "public"."outlets" (
  "id" uuid NOT NULL,
  "name" varchar(128) COLLATE "pg_catalog"."default" NOT NULL,
  "address" text COLLATE "pg_catalog"."default" NOT NULL,
  "pic" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "phone" varchar(32) COLLATE "pg_catalog"."default" NOT NULL,
  "description" text COLLATE "pg_catalog"."default" NOT NULL,
  "status" int2 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0)
)
;

-- ----------------------------
-- Records of outlets
-- ----------------------------
INSERT INTO "public"."outlets" VALUES ('a8de914f-c16f-4794-963a-cda7a217c87e', 'cicaheum', 'jl cicaheum', 'tantan', '990809', 'kjsdfsdfsdf', 1, '2020-07-16 10:14:04', '2020-07-16 10:21:34', NULL);
INSERT INTO "public"."outlets" VALUES ('eb827143-5441-417f-933b-46410fc00465', 'outlet 1', 'tes1', 'saya', '0987', 'sdfdsf', 1, '2020-07-16 10:40:59', '2020-07-18 04:02:31', NULL);
INSERT INTO "public"."outlets" VALUES ('22d5f3d6-ce64-482f-8b09-191e6545a640', 'Outlet naripan', 'jalan naripan 12-14', 'Tantan suryana', '0891829128', 'outlet ini dikelola oleh aaaa', 1, '2020-07-18 04:31:46', '2020-07-18 04:31:46', NULL);
INSERT INTO "public"."outlets" VALUES ('9f4bf93a-d4be-4c12-9afa-6247bc58b197', 'Outlet Purnawarman', 'Jl. purnawarman no 12', 'Suryana', '081982918', '-', 1, '2020-07-18 05:14:17', '2020-07-18 05:14:17', NULL);
INSERT INTO "public"."outlets" VALUES ('814f3042-4ec9-494f-bf55-866fb34b000c', 'Outlet Pahlawan', 'Jl pahlawan', 'saya', '908908908', 'sdjdkfljskdljf', 1, '2020-07-18 05:15:41', '2020-07-18 05:15:41', NULL);
INSERT INTO "public"."outlets" VALUES ('ebc74bd9-b161-472c-a5a8-32cc62f286fc', 'Outlet Griya Antapani', 'Antapani Raya', 'dia', '090939034', 'lkdjfdskjfsd sdfkjsdlkfjs sdfkjsfkjlsdf', 1, '2020-07-18 05:19:08', '2020-07-18 05:19:08', NULL);
INSERT INTO "public"."outlets" VALUES ('e3799f8a-aa0f-44ca-b5cf-7656a16f6afb', 'Outlet Dago', 'Dago park', 'kami', '34920384 sf', 'sdfsdfs', 1, '2020-07-18 05:38:05', '2020-07-18 05:38:05', NULL);
INSERT INTO "public"."outlets" VALUES ('5a68ec29-e556-4681-8d6f-568d0756ffb9', 'Outlet Sudirman', 'sudirman squaire', 'asdf as', '903sdfdsd', 'sdfsdfdsf', 1, '2020-07-18 05:47:45', '2020-07-18 05:47:45', NULL);
INSERT INTO "public"."outlets" VALUES ('6046e85b-4643-4205-8bd8-37985e236381', 'Outlet 12', 'kjfsdfkj', 'klsdjfsdf', '-0394343', 'sdfsdf', 1, '2020-07-18 05:48:08', '2020-07-18 05:48:08', NULL);
INSERT INTO "public"."outlets" VALUES ('4c9444fe-1348-4b34-a1c1-92b11de7b6b3', 'Outlet 14', 'sfdsfdsf dsfsd', 'kljfsdf', 'sdfdsf', 'klfds', 1, '2020-07-18 05:48:23', '2020-07-18 05:48:23', NULL);
INSERT INTO "public"."outlets" VALUES ('6be5fffc-01c0-4980-87f4-bb9832f4187c', 'Outlet sdfsdf 4', 'ksdjfdskjf', 'sdfsdf', 'sdfsf', 'fsdfdsf', 1, '2020-07-18 05:48:48', '2020-07-18 14:23:28', NULL);

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
INSERT INTO "public"."pages" VALUES ('fc38b4ae-78d4-4330-b8bb-f216ecf756ae', 'Dashboard', 'dashboard', 'home', NULL, 't', '1', '2020-07-16 09:12:47', '2020-07-16 09:12:47', NULL);
INSERT INTO "public"."pages" VALUES ('3371e715-04d5-4dbe-b579-4ca3e72cb3ed', 'Access Control', 'javascript:void(0);', 'apps', NULL, 't', '2', '2020-07-16 09:12:47', '2020-07-16 09:12:47', NULL);
INSERT INTO "public"."pages" VALUES ('3f724ecc-12a2-4bcf-b990-cce57faf0e7f', 'Page', 'page', 'radio_button_unchecked', '3371e715-04d5-4dbe-b579-4ca3e72cb3ed', 't', '2.1', '2020-07-16 09:12:47', '2020-07-16 09:12:47', NULL);
INSERT INTO "public"."pages" VALUES ('a3a27380-b4ba-4ffc-a9ac-0c57b99504a9', 'Permission', 'permission', 'radio_button_unchecked', '3371e715-04d5-4dbe-b579-4ca3e72cb3ed', 't', '2.2', '2020-07-16 09:12:47', '2020-07-16 09:12:47', NULL);
INSERT INTO "public"."pages" VALUES ('6618a1a3-5d60-4e6a-928b-db79748ee275', 'Master Data', 'javascript:void(0);', NULL, NULL, 't', '3', '2020-07-16 10:22:59', '2020-07-16 10:22:59', NULL);
INSERT INTO "public"."pages" VALUES ('cfe715ce-3db8-49e0-8c2e-f589f9bb07a2', 'Outlet', 'outlet', NULL, '6618a1a3-5d60-4e6a-928b-db79748ee275', 't', '3.1', '2020-07-16 10:25:18', '2020-07-16 10:25:18', NULL);
INSERT INTO "public"."pages" VALUES ('b20a4f8f-976c-4126-b5d3-9d93cd5fb7af', 'Provinsi', 'province', NULL, '6618a1a3-5d60-4e6a-928b-db79748ee275', 't', '3.2', '2020-07-16 10:28:17', '2020-07-16 10:28:17', NULL);
INSERT INTO "public"."pages" VALUES ('eba78bdb-5df4-498b-8ecf-46574ecd30ea', 'Harga', 'price', NULL, '6618a1a3-5d60-4e6a-928b-db79748ee275', 't', '3.3', '2020-07-16 10:34:25', '2020-07-16 10:34:25', NULL);
INSERT INTO "public"."pages" VALUES ('bd283c9e-084d-40d6-bf82-8b063881d411', 'Produk', 'product', NULL, '6618a1a3-5d60-4e6a-928b-db79748ee275', 't', '3.4', '2020-07-16 10:35:58', '2020-07-16 10:35:58', NULL);
INSERT INTO "public"."pages" VALUES ('74786217-332e-4253-82ab-579ac812f143', 'Stok', 'stock', NULL, '6618a1a3-5d60-4e6a-928b-db79748ee275', 't', '3.5', '2020-07-16 10:38:56', '2020-07-16 10:38:56', NULL);
INSERT INTO "public"."pages" VALUES ('38c4ae9f-6f22-413c-b45d-6d4f6e23bfcd', 'Customer', 'customer', NULL, '6618a1a3-5d60-4e6a-928b-db79748ee275', 't', '3.6', '2020-07-16 10:43:49', '2020-07-16 10:43:49', NULL);
INSERT INTO "public"."pages" VALUES ('896de8c1-4f07-486e-8b17-e707717de55e', 'Ekspedisi', 'ekspedisi', NULL, '6618a1a3-5d60-4e6a-928b-db79748ee275', 't', '3.6', '2020-07-16 10:49:50', '2020-07-16 10:49:50', NULL);
INSERT INTO "public"."pages" VALUES ('43c1e57c-5c64-4b9d-8f21-89810531f5a1', 'Discount', 'discount', NULL, '6618a1a3-5d60-4e6a-928b-db79748ee275', 't', '3.7', '2020-07-16 11:20:10', '2020-07-16 11:20:10', NULL);
INSERT INTO "public"."pages" VALUES ('f8f050c8-465e-4a5f-92f6-6ac678c70cd1', 'Transaction', 'javascript:void(0);', NULL, NULL, 't', '4', '2020-07-17 07:00:13', '2020-07-17 07:00:13', NULL);
INSERT INTO "public"."pages" VALUES ('ddf24d1f-d1ce-4e4f-bd6a-b4bae58e9784', 'Order', 'order', NULL, 'f8f050c8-465e-4a5f-92f6-6ac678c70cd1', 't', '4.1', '2020-07-17 07:01:05', '2020-07-17 07:01:05', NULL);
INSERT INTO "public"."pages" VALUES ('f87dac73-fbd1-4cca-b096-5427e8906e01', 'Shipment', 'shipment', NULL, 'f8f050c8-465e-4a5f-92f6-6ac678c70cd1', 't', '4.2', '2020-07-17 07:01:25', '2020-07-17 07:01:25', NULL);
INSERT INTO "public"."pages" VALUES ('47ef4cdd-2bf6-4cef-bb27-a3fa73ac8a78', 'Cart', 'cart', NULL, 'f8f050c8-465e-4a5f-92f6-6ac678c70cd1', 't', '5', '2020-07-19 15:32:51', '2020-07-19 15:32:51', NULL);
INSERT INTO "public"."pages" VALUES ('9c8e4907-55e4-4473-8eaf-8c1e2a09968d', 'Detail Cart', 'detailcart', NULL, 'f8f050c8-465e-4a5f-92f6-6ac678c70cd1', 'f', '6', '2020-07-19 15:34:41', '2020-07-19 15:34:41', NULL);

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
INSERT INTO "public"."permissions" VALUES (1, 'delete_all log-application', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (2, 'clean log-application', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (3, 'delete log-application', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (4, 'register', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (5, 'request password', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (6, 'reset password', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (7, 'confirm password', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (8, 'notice verification', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (9, 'verify verification', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (10, 'dashboard', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (11, 'registration', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (12, 'forbiden', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (13, 'create page', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (14, 'edit page', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (15, 'change auth', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (16, 'wizard page', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (17, 'configuration page', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (18, 'create page', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (19, 'show page', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (20, 'edit page', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (21, 'delete page', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (22, 'softdelete page', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (23, 'create story', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (24, 'show story', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (25, 'edit story', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (26, 'delete story', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (27, 'softdelete story', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (28, 'create optgroup', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (29, 'show optgroup', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (30, 'edit optgroup', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (31, 'delete optgroup', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (32, 'softdelete optgroup', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (33, 'create optvalue', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (34, 'show optvalue', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (35, 'edit optvalue', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (36, 'delete optvalue', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (37, 'softdelete optvalue', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (38, 'create attendance', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (39, 'show attendance', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (40, 'edit attendance', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (41, 'delete attendance', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');
INSERT INTO "public"."permissions" VALUES (42, 'softdelete attendance', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');

-- ----------------------------
-- Table structure for prices
-- ----------------------------
--DROP TABLE IF EXISTS "public"."prices";
CREATE TABLE "public"."prices" (
  "id" uuid NOT NULL,
  "outlet_id" uuid NOT NULL,
  "product_id" uuid NOT NULL,
  "price" numeric(8,2) NOT NULL,
  "description" text COLLATE "pg_catalog"."default" NOT NULL,
  "status" int2 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0)
)
;

-- ----------------------------
-- Records of prices
-- ----------------------------
INSERT INTO "public"."prices" VALUES ('bd881013-460d-4c6f-a45f-09e967c9d513', 'a8de914f-c16f-4794-963a-cda7a217c87e', '6325c69c-f29c-4817-a6e9-314f7d1e3e3b', 12000.00, 'sdaf sdfdsf', 1, '2020-07-19 06:01:51', '2020-07-19 06:01:51', NULL);
INSERT INTO "public"."prices" VALUES ('a15b6f18-202a-4180-850b-2bc1978fe901', '22d5f3d6-ce64-482f-8b09-191e6545a640', '6325c69c-f29c-4817-a6e9-314f7d1e3e3b', 20000.00, 'sdfs sdfsdf sfdsdfdsf kep1', 1, '2020-07-19 07:18:34', '2020-07-19 07:54:58', NULL);
INSERT INTO "public"."prices" VALUES ('1b9450ba-e3bc-40ae-a23d-98549ce417da', 'a8de914f-c16f-4794-963a-cda7a217c87e', '265d6574-8dd0-4522-b00c-f7e041593026', 10000.00, 'sdfsdf sdf', 1, '2020-07-20 03:42:16', '2020-07-20 03:42:16', NULL);

-- ----------------------------
-- Table structure for products
-- ----------------------------
--DROP TABLE IF EXISTS "public"."products";
CREATE TABLE "public"."products" (
  "id" uuid NOT NULL,
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "category_id" varchar(2) COLLATE "pg_catalog"."default" NOT NULL,
  "unit_id" varchar(2) COLLATE "pg_catalog"."default" NOT NULL,
  "description" text COLLATE "pg_catalog"."default" NOT NULL,
  "status" int2 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0)
)
;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO "public"."products" VALUES ('6325c69c-f29c-4817-a6e9-314f7d1e3e3b', 'Frozen food', '1', '1', 'dfsdf sdfsdf', 1, '2020-07-19 05:53:52', '2020-07-19 05:53:52', NULL);
INSERT INTO "public"."products" VALUES ('265d6574-8dd0-4522-b00c-f7e041593026', 'Ayam geprek', '1', '1', 'sdfdsf sdf sdf ganti', 1, '2020-07-19 05:44:48', '2020-07-19 05:57:55', NULL);

-- ----------------------------
-- Table structure for provinces
-- ----------------------------
--DROP TABLE IF EXISTS "public"."provinces";
CREATE TABLE "public"."provinces" (
  "id" uuid NOT NULL,
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0)
)
;

-- ----------------------------
-- Records of provinces
-- ----------------------------
INSERT INTO "public"."provinces" VALUES ('d3868727-a5d7-43ec-8961-d0f7a8e39a83', 'Jawa Barat', '2020-07-16 10:32:15', '2020-07-16 10:32:15', NULL);
INSERT INTO "public"."provinces" VALUES ('7705a7c1-e5d9-4592-8fc4-5f84b64e88e4', 'Jawa Timur', '2020-07-16 10:32:48', '2020-07-16 10:33:11', NULL);
INSERT INTO "public"."provinces" VALUES ('385e6689-fc15-46a7-9c08-f29b6c89a97a', 'Jawa Tengah', '2020-07-18 16:31:01', '2020-07-18 16:31:01', NULL);
INSERT INTO "public"."provinces" VALUES ('51de3c94-69ed-4ce0-a25a-55b096e226a2', 'Yogyakarta', '2020-07-18 16:28:52', '2020-07-18 16:43:18', NULL);

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
INSERT INTO "public"."role_has_pages" VALUES ('fc38b4ae-78d4-4330-b8bb-f216ecf756ae', 1);
INSERT INTO "public"."role_has_pages" VALUES ('3371e715-04d5-4dbe-b579-4ca3e72cb3ed', 1);
INSERT INTO "public"."role_has_pages" VALUES ('3f724ecc-12a2-4bcf-b990-cce57faf0e7f', 1);
INSERT INTO "public"."role_has_pages" VALUES ('a3a27380-b4ba-4ffc-a9ac-0c57b99504a9', 1);
INSERT INTO "public"."role_has_pages" VALUES ('6618a1a3-5d60-4e6a-928b-db79748ee275', 1);
INSERT INTO "public"."role_has_pages" VALUES ('cfe715ce-3db8-49e0-8c2e-f589f9bb07a2', 1);
INSERT INTO "public"."role_has_pages" VALUES ('b20a4f8f-976c-4126-b5d3-9d93cd5fb7af', 1);
INSERT INTO "public"."role_has_pages" VALUES ('eba78bdb-5df4-498b-8ecf-46574ecd30ea', 1);
INSERT INTO "public"."role_has_pages" VALUES ('bd283c9e-084d-40d6-bf82-8b063881d411', 1);
INSERT INTO "public"."role_has_pages" VALUES ('74786217-332e-4253-82ab-579ac812f143', 1);
INSERT INTO "public"."role_has_pages" VALUES ('38c4ae9f-6f22-413c-b45d-6d4f6e23bfcd', 1);
INSERT INTO "public"."role_has_pages" VALUES ('896de8c1-4f07-486e-8b17-e707717de55e', 1);
INSERT INTO "public"."role_has_pages" VALUES ('43c1e57c-5c64-4b9d-8f21-89810531f5a1', 1);
INSERT INTO "public"."role_has_pages" VALUES ('f8f050c8-465e-4a5f-92f6-6ac678c70cd1', 1);
INSERT INTO "public"."role_has_pages" VALUES ('f87dac73-fbd1-4cca-b096-5427e8906e01', 1);
INSERT INTO "public"."role_has_pages" VALUES ('ddf24d1f-d1ce-4e4f-bd6a-b4bae58e9784', 1);
INSERT INTO "public"."role_has_pages" VALUES ('47ef4cdd-2bf6-4cef-bb27-a3fa73ac8a78', 1);
INSERT INTO "public"."role_has_pages" VALUES ('9c8e4907-55e4-4473-8eaf-8c1e2a09968d', 1);

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
INSERT INTO "public"."role_has_permissions" VALUES (16, 1);
INSERT INTO "public"."role_has_permissions" VALUES (17, 1);
INSERT INTO "public"."role_has_permissions" VALUES (19, 1);
INSERT INTO "public"."role_has_permissions" VALUES (21, 1);
INSERT INTO "public"."role_has_permissions" VALUES (22, 1);
INSERT INTO "public"."role_has_permissions" VALUES (23, 1);
INSERT INTO "public"."role_has_permissions" VALUES (24, 1);
INSERT INTO "public"."role_has_permissions" VALUES (25, 1);
INSERT INTO "public"."role_has_permissions" VALUES (26, 1);
INSERT INTO "public"."role_has_permissions" VALUES (27, 1);
INSERT INTO "public"."role_has_permissions" VALUES (28, 1);
INSERT INTO "public"."role_has_permissions" VALUES (29, 1);
INSERT INTO "public"."role_has_permissions" VALUES (30, 1);
INSERT INTO "public"."role_has_permissions" VALUES (31, 1);
INSERT INTO "public"."role_has_permissions" VALUES (32, 1);
INSERT INTO "public"."role_has_permissions" VALUES (33, 1);
INSERT INTO "public"."role_has_permissions" VALUES (34, 1);
INSERT INTO "public"."role_has_permissions" VALUES (35, 1);
INSERT INTO "public"."role_has_permissions" VALUES (36, 1);
INSERT INTO "public"."role_has_permissions" VALUES (37, 1);
INSERT INTO "public"."role_has_permissions" VALUES (38, 1);
INSERT INTO "public"."role_has_permissions" VALUES (39, 1);
INSERT INTO "public"."role_has_permissions" VALUES (40, 1);
INSERT INTO "public"."role_has_permissions" VALUES (41, 1);
INSERT INTO "public"."role_has_permissions" VALUES (42, 1);

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
INSERT INTO "public"."roles" VALUES (1, 'Super Admin', 'web', '2020-07-16 09:12:47', '2020-07-16 09:12:47');

-- ----------------------------
-- Table structure for shipments
-- ----------------------------
--DROP TABLE IF EXISTS "public"."shipments";
CREATE TABLE "public"."shipments" (
  "id" uuid NOT NULL,
  "user_id" uuid NOT NULL,
  "order_id" uuid NOT NULL,
  "ekspedisi_id" uuid NOT NULL,
  "shipment_date" date NOT NULL,
  "shipment_id" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "description" text COLLATE "pg_catalog"."default" NOT NULL,
  "status" int2 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0)
)
;

-- ----------------------------
-- Table structure for stocks
-- ----------------------------
--DROP TABLE IF EXISTS "public"."stocks";
CREATE TABLE "public"."stocks" (
  "id" uuid NOT NULL,
  "outlet_id" uuid NOT NULL,
  "product_id" uuid NOT NULL,
  "purchase_price" numeric(8,2) NOT NULL,
  "qty" int4 NOT NULL,
  "description" text COLLATE "pg_catalog"."default" NOT NULL,
  "status" int2 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0)
)
;

-- ----------------------------
-- Records of stocks
-- ----------------------------
INSERT INTO "public"."stocks" VALUES ('79b22741-0428-43e8-bfd6-f4beba23bb49', 'a8de914f-c16f-4794-963a-cda7a217c87e', '6325c69c-f29c-4817-a6e9-314f7d1e3e3b', 12222.00, 12, '2222', 1, '2020-07-19 07:34:05', '2020-07-19 07:34:05', NULL);
INSERT INTO "public"."stocks" VALUES ('b27b2a43-eae8-4214-8e67-80d034d026bc', 'a8de914f-c16f-4794-963a-cda7a217c87e', '6325c69c-f29c-4817-a6e9-314f7d1e3e3b', 120000.00, 12, 'sdf dfsdf 1', 1, '2020-07-19 07:33:42', '2020-07-19 07:55:35', NULL);

-- ----------------------------
-- Table structure for testings
-- ----------------------------
--DROP TABLE IF EXISTS "public"."testings";
CREATE TABLE "public"."testings" (
  "id" int4 NOT NULL,
  "nama" varchar(255) COLLATE "pg_catalog"."default",
  "alamat" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "updated_at" timestamp(6),
  "deleted_at" timestamp(6)
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
-- Records of users
-- ----------------------------
INSERT INTO "public"."users" VALUES ('d8ef483c-0984-4205-88d8-c160f918a56b', 'sa', 'Super Admin', 'sa@mail.com', '2020-07-16 09:12:47', '$2y$10$J92ZjUM6BrJJhgXxvjK91u69n42x2wMuD0rpaxFS2ujVJxE5addWG', NULL, '2020-07-16 09:12:47', '2020-07-16 09:12:47');

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."failed_jobs_id_seq"
OWNED BY "public"."failed_jobs"."id";
SELECT setval('"public"."failed_jobs_id_seq"', 2, false);
ALTER SEQUENCE "public"."migrations_id_seq"
OWNED BY "public"."migrations"."id";
SELECT setval('"public"."migrations_id_seq"', 10, true);
ALTER SEQUENCE "public"."permissions_id_seq"
OWNED BY "public"."permissions"."id";
SELECT setval('"public"."permissions_id_seq"', 43, true);
ALTER SEQUENCE "public"."roles_id_seq"
OWNED BY "public"."roles"."id";
SELECT setval('"public"."roles_id_seq"', 2, false);

-- ----------------------------
-- Indexes structure for table carts
-- ----------------------------
CREATE INDEX "carts_id_index" ON "public"."carts" USING btree (
  "id" "pg_catalog"."uuid_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table carts
-- ----------------------------
ALTER TABLE "public"."carts" ADD CONSTRAINT "carts_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table customers
-- ----------------------------
CREATE INDEX "customers_id_index" ON "public"."customers" USING btree (
  "id" "pg_catalog"."uuid_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table customers
-- ----------------------------
ALTER TABLE "public"."customers" ADD CONSTRAINT "customers_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table detailcarts
-- ----------------------------
CREATE INDEX "detailcarts_id_index" ON "public"."detailcarts" USING btree (
  "id" "pg_catalog"."uuid_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table detailcarts
-- ----------------------------
ALTER TABLE "public"."detailcarts" ADD CONSTRAINT "detailcarts_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table detailorders
-- ----------------------------
CREATE INDEX "detailorders_id_index" ON "public"."detailorders" USING btree (
  "id" "pg_catalog"."uuid_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table detailorders
-- ----------------------------
ALTER TABLE "public"."detailorders" ADD CONSTRAINT "detailorders_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table discounts
-- ----------------------------
CREATE INDEX "discounts_id_index" ON "public"."discounts" USING btree (
  "id" "pg_catalog"."uuid_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table discounts
-- ----------------------------
ALTER TABLE "public"."discounts" ADD CONSTRAINT "discounts_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table ekspedisis
-- ----------------------------
CREATE INDEX "ekspedisis_id_index" ON "public"."ekspedisis" USING btree (
  "id" "pg_catalog"."uuid_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table ekspedisis
-- ----------------------------
ALTER TABLE "public"."ekspedisis" ADD CONSTRAINT "ekspedisis_pkey" PRIMARY KEY ("id");

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
-- Indexes structure for table orders
-- ----------------------------
CREATE INDEX "orders_id_index" ON "public"."orders" USING btree (
  "id" "pg_catalog"."uuid_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table orders
-- ----------------------------
ALTER TABLE "public"."orders" ADD CONSTRAINT "orders_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table outlets
-- ----------------------------
CREATE INDEX "outlets_id_index" ON "public"."outlets" USING btree (
  "id" "pg_catalog"."uuid_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table outlets
-- ----------------------------
ALTER TABLE "public"."outlets" ADD CONSTRAINT "outlets_pkey" PRIMARY KEY ("id");

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
-- Indexes structure for table prices
-- ----------------------------
CREATE INDEX "prices_id_index" ON "public"."prices" USING btree (
  "id" "pg_catalog"."uuid_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table prices
-- ----------------------------
ALTER TABLE "public"."prices" ADD CONSTRAINT "prices_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table products
-- ----------------------------
CREATE INDEX "products_id_index" ON "public"."products" USING btree (
  "id" "pg_catalog"."uuid_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table products
-- ----------------------------
ALTER TABLE "public"."products" ADD CONSTRAINT "products_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table provinces
-- ----------------------------
CREATE INDEX "provinces_id_index" ON "public"."provinces" USING btree (
  "id" "pg_catalog"."uuid_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table provinces
-- ----------------------------
ALTER TABLE "public"."provinces" ADD CONSTRAINT "provinces_pkey" PRIMARY KEY ("id");

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
-- Indexes structure for table shipments
-- ----------------------------
CREATE INDEX "shipments_id_index" ON "public"."shipments" USING btree (
  "id" "pg_catalog"."uuid_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table shipments
-- ----------------------------
ALTER TABLE "public"."shipments" ADD CONSTRAINT "shipments_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table stocks
-- ----------------------------
CREATE INDEX "stocks_id_index" ON "public"."stocks" USING btree (
  "id" "pg_catalog"."uuid_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table stocks
-- ----------------------------
ALTER TABLE "public"."stocks" ADD CONSTRAINT "stocks_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table testings
-- ----------------------------
ALTER TABLE "public"."testings" ADD CONSTRAINT "testings_pkey" PRIMARY KEY ("id");

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
-- Foreign Keys structure for table carts
-- ----------------------------
ALTER TABLE "public"."carts" ADD CONSTRAINT "carts_user_id_foreign" FOREIGN KEY ("user_id") REFERENCES "public"."users" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table customers
-- ----------------------------
ALTER TABLE "public"."customers" ADD CONSTRAINT "customers_province_id_foreign" FOREIGN KEY ("province_id") REFERENCES "public"."provinces" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table detailcarts
-- ----------------------------
ALTER TABLE "public"."detailcarts" ADD CONSTRAINT "detailcarts_product_id_foreign" FOREIGN KEY ("product_id") REFERENCES "public"."products" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "public"."detailcarts" ADD CONSTRAINT "detailcarts_user_id_foreign" FOREIGN KEY ("user_id") REFERENCES "public"."users" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table detailorders
-- ----------------------------
ALTER TABLE "public"."detailorders" ADD CONSTRAINT "detailorders_order_id_foreign" FOREIGN KEY ("order_id") REFERENCES "public"."orders" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "public"."detailorders" ADD CONSTRAINT "detailorders_product_id_foreign" FOREIGN KEY ("product_id") REFERENCES "public"."products" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

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
-- Foreign Keys structure for table orders
-- ----------------------------
ALTER TABLE "public"."orders" ADD CONSTRAINT "orders_customer_id_foreign" FOREIGN KEY ("customer_id") REFERENCES "public"."customers" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "public"."orders" ADD CONSTRAINT "orders_discount_id_foreign" FOREIGN KEY ("discount_id") REFERENCES "public"."discounts" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "public"."orders" ADD CONSTRAINT "orders_user_id_foreign" FOREIGN KEY ("user_id") REFERENCES "public"."users" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table prices
-- ----------------------------
ALTER TABLE "public"."prices" ADD CONSTRAINT "prices_outlet_id_foreign" FOREIGN KEY ("outlet_id") REFERENCES "public"."outlets" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "public"."prices" ADD CONSTRAINT "prices_product_id_foreign" FOREIGN KEY ("product_id") REFERENCES "public"."products" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

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
-- Foreign Keys structure for table shipments
-- ----------------------------
ALTER TABLE "public"."shipments" ADD CONSTRAINT "shipments_ekspedisi_id_foreign" FOREIGN KEY ("ekspedisi_id") REFERENCES "public"."ekspedisis" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "public"."shipments" ADD CONSTRAINT "shipments_order_id_foreign" FOREIGN KEY ("order_id") REFERENCES "public"."orders" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "public"."shipments" ADD CONSTRAINT "shipments_user_id_foreign" FOREIGN KEY ("user_id") REFERENCES "public"."users" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table stocks
-- ----------------------------
ALTER TABLE "public"."stocks" ADD CONSTRAINT "stocks_outlet_id_foreign" FOREIGN KEY ("outlet_id") REFERENCES "public"."outlets" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "public"."stocks" ADD CONSTRAINT "stocks_product_id_foreign" FOREIGN KEY ("product_id") REFERENCES "public"."products" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
