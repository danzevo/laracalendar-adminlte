/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : PostgreSQL
 Source Server Version : 110003
 Source Host           : localhost:5432
 Source Catalog        : calendar
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 110003
 File Encoding         : 65001

 Date: 07/08/2022 19:07:32
*/


-- ----------------------------
-- Table structure for event_details
-- ----------------------------
DROP TABLE IF EXISTS "public"."event_details";
CREATE TABLE "public"."event_details" (
  "id" int8 NOT NULL DEFAULT nextval('event_details_id_seq'::regclass),
  "event_id" int8 NOT NULL,
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "from_date" date NOT NULL,
  "to_date" date NOT NULL,
  "status" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0),
  "month" int2
)
;

-- ----------------------------
-- Records of event_details
-- ----------------------------
INSERT INTO "public"."event_details" VALUES (4, 2, 'detail4', '2022-01-01', '2022-01-05', 'berlangsung', NULL, '2022-08-07 10:33:16', '2022-08-07 10:33:16', 1);
INSERT INTO "public"."event_details" VALUES (5, 2, 'detail5', '2022-01-02', '2022-01-05', 'berlangsung', NULL, '2022-08-07 10:33:16', '2022-08-07 10:33:16', 1);
INSERT INTO "public"."event_details" VALUES (6, 2, 'detail6', '2022-01-07', '2022-01-09', 'berlangsung', NULL, '2022-08-07 10:33:16', '2022-08-07 10:33:16', 1);
INSERT INTO "public"."event_details" VALUES (16, 2, 'detail4', '2022-02-01', '2022-02-05', 'berlangsung', NULL, '2022-08-07 10:33:16', '2022-08-07 10:33:16', 2);
INSERT INTO "public"."event_details" VALUES (17, 2, 'detail5', '2022-02-02', '2022-02-05', 'berlangsung', NULL, '2022-08-07 10:33:16', '2022-08-07 10:33:16', 2);
INSERT INTO "public"."event_details" VALUES (18, 2, 'detail6', '2022-02-07', '2022-02-09', 'berlangsung', NULL, '2022-08-07 10:33:16', '2022-08-07 10:33:16', 2);
INSERT INTO "public"."event_details" VALUES (1, 1, 'detail1', '2022-01-01', '2022-01-05', 'berlangsung', NULL, '2022-08-07 10:33:22', '2022-08-07 10:33:22', 1);
INSERT INTO "public"."event_details" VALUES (2, 1, 'detail2', '2022-01-02', '2022-01-05', 'berlangsung', NULL, '2022-08-07 10:33:22', '2022-08-07 10:33:22', 1);
INSERT INTO "public"."event_details" VALUES (3, 1, 'detail3', '2022-01-07', '2022-01-09', 'berlangsung', NULL, '2022-08-07 10:33:22', '2022-08-07 10:33:22', 1);
INSERT INTO "public"."event_details" VALUES (13, 1, 'detail1', '2022-02-01', '2022-02-05', 'berlangsung', NULL, '2022-08-07 10:33:22', '2022-08-07 10:33:22', 2);
INSERT INTO "public"."event_details" VALUES (14, 1, 'detail2', '2022-02-02', '2022-02-05', 'berlangsung', NULL, '2022-08-07 10:33:22', '2022-08-07 10:33:22', 2);
INSERT INTO "public"."event_details" VALUES (15, 1, 'detail3', '2022-02-07', '2022-02-09', 'berlangsung', NULL, '2022-08-07 10:33:22', '2022-08-07 10:33:22', 2);
INSERT INTO "public"."event_details" VALUES (32, 20, 'test', '2022-02-01', '2022-02-16', 'Berlangsung', '2022-08-07 10:50:28', '2022-08-07 10:50:28', NULL, 2);
INSERT INTO "public"."event_details" VALUES (33, 19, 'testFeb', '2022-02-01', '2022-02-21', 'Berlangsung', '2022-08-07 11:38:29', '2022-08-07 11:38:29', NULL, 2);
INSERT INTO "public"."event_details" VALUES (31, 19, 'testMar', '2022-01-06', '2022-01-11', 'Berlangsung', '2022-08-07 10:33:41', '2022-08-07 11:51:50', NULL, 1);
INSERT INTO "public"."event_details" VALUES (34, 19, 'testMar', '2022-03-01', '2022-01-04', 'Berlangsung', '2022-08-07 11:52:29', '2022-08-07 11:52:29', NULL, 3);
INSERT INTO "public"."event_details" VALUES (26, 12, 'TESTETSETSET3', '2022-02-10', '2022-02-15', 'Akan Datang', '2022-08-07 08:22:15', '2022-08-07 09:11:04', '2022-08-07 09:11:04', 2);
INSERT INTO "public"."event_details" VALUES (25, 11, 'TESTETSETSET', '2022-01-10', '2022-01-15', 'Berlangsung', '2022-08-07 08:21:20', '2022-08-07 09:12:42', '2022-08-07 09:12:42', 1);
INSERT INTO "public"."event_details" VALUES (35, 20, 'testMei', '2022-05-01', '2022-05-10', 'Berlangsung', '2022-08-07 11:52:58', '2022-08-07 11:52:58', NULL, 5);
INSERT INTO "public"."event_details" VALUES (36, 21, 'test 3', '2022-06-01', '2022-06-08', 'Berlangsung', '2022-08-07 11:55:16', '2022-08-07 11:55:16', NULL, 6);
INSERT INTO "public"."event_details" VALUES (30, 18, 'test', '2022-01-01', '2022-01-31', 'Berlangsung', '2022-08-07 10:30:45', '2022-08-07 10:31:42', '2022-08-07 10:31:42', 1);
INSERT INTO "public"."event_details" VALUES (29, 16, 'test', '2022-01-01', '1970-01-01', 'Berlangsung', '2022-08-07 10:27:55', '2022-08-07 10:31:48', '2022-08-07 10:31:48', 1);
INSERT INTO "public"."event_details" VALUES (28, 14, 'testos', '2022-12-01', '1970-01-01', 'Berlangsung', '2022-08-07 10:25:29', '2022-08-07 10:31:53', '2022-08-07 10:31:53', 12);
INSERT INTO "public"."event_details" VALUES (27, 13, 'test11', '2022-03-10', '2022-03-15', 'Akan Datang', '2022-08-07 09:14:03', '2022-08-07 10:31:58', '2022-08-07 10:31:58', 3);
INSERT INTO "public"."event_details" VALUES (12, 6, 'detail6', '2022-01-07', '2022-01-09', 'berlangsung', NULL, '2022-08-07 10:32:52', '2022-08-07 10:32:52', 1);
INSERT INTO "public"."event_details" VALUES (11, 6, 'detail5', '2022-01-02', '2022-01-05', 'berlangsung', NULL, '2022-08-07 10:32:52', '2022-08-07 10:32:52', 1);
INSERT INTO "public"."event_details" VALUES (22, 6, 'detail4', '2022-03-01', '2022-03-05', 'berlangsung', NULL, '2022-08-07 10:32:52', '2022-08-07 10:32:52', 3);
INSERT INTO "public"."event_details" VALUES (23, 6, 'detail5', '2022-03-02', '2022-03-05', 'berlangsung', NULL, '2022-08-07 10:32:52', '2022-08-07 10:32:52', 3);
INSERT INTO "public"."event_details" VALUES (24, 6, 'detail6', '2022-03-07', '2022-03-09', 'berlangsung', NULL, '2022-08-07 10:32:52', '2022-08-07 10:32:52', 3);
INSERT INTO "public"."event_details" VALUES (7, 5, 'detail1', '2022-01-01', '2022-01-05', 'berlangsung', NULL, '2022-08-07 10:32:58', '2022-08-07 10:32:58', 1);
INSERT INTO "public"."event_details" VALUES (8, 5, 'detail2', '2022-01-02', '2022-01-05', 'berlangsung', NULL, '2022-08-07 10:32:58', '2022-08-07 10:32:58', 1);
INSERT INTO "public"."event_details" VALUES (9, 5, 'detail3', '2022-01-07', '2022-01-09', 'berlangsung', NULL, '2022-08-07 10:32:58', '2022-08-07 10:32:58', 1);
INSERT INTO "public"."event_details" VALUES (10, 5, 'detail4', '2022-01-01', '2022-01-05', 'berlangsung', NULL, '2022-08-07 10:32:58', '2022-08-07 10:32:58', 1);
INSERT INTO "public"."event_details" VALUES (21, 5, 'detail3', '2022-03-07', '2022-03-09', 'berlangsung', NULL, '2022-08-07 10:32:58', '2022-08-07 10:32:58', 3);
INSERT INTO "public"."event_details" VALUES (19, 5, 'detail1', '2022-03-01', '2022-03-05', 'berlangsung', NULL, '2022-08-07 10:32:58', '2022-08-07 10:32:58', 3);
INSERT INTO "public"."event_details" VALUES (20, 5, 'detail2', '2022-03-02', '2022-03-05', 'berlangsung', NULL, '2022-08-07 10:32:58', '2022-08-07 10:32:58', 3);
INSERT INTO "public"."event_details" VALUES (37, 21, 'testMar', '2022-03-01', '2022-03-05', 'Berlangsung', '2022-08-07 11:55:52', '2022-08-07 11:55:52', NULL, 3);
INSERT INTO "public"."event_details" VALUES (38, 22, 'test 4', '2022-02-01', '2022-02-09', 'Berlangsung', '2022-08-07 11:58:24', '2022-08-07 11:58:24', NULL, 2);

-- ----------------------------
-- Table structure for events
-- ----------------------------
DROP TABLE IF EXISTS "public"."events";
CREATE TABLE "public"."events" (
  "id" int8 NOT NULL DEFAULT nextval('events_id_seq'::regclass),
  "method" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "deleted_at" timestamp(0)
)
;

-- ----------------------------
-- Records of events
-- ----------------------------
INSERT INTO "public"."events" VALUES (12, 'TESTO3', '2022-08-07 08:22:15', '2022-08-07 09:11:04', '2022-08-07 09:11:04');
INSERT INTO "public"."events" VALUES (11, 'TESTOS', '2022-08-07 08:21:20', '2022-08-07 09:12:42', '2022-08-07 09:12:42');
INSERT INTO "public"."events" VALUES (18, 'test', '2022-08-07 10:30:45', '2022-08-07 10:31:42', '2022-08-07 10:31:42');
INSERT INTO "public"."events" VALUES (16, 'test', '2022-08-07 10:27:55', '2022-08-07 10:31:48', '2022-08-07 10:31:48');
INSERT INTO "public"."events" VALUES (14, 'testos', '2022-08-07 10:25:29', '2022-08-07 10:31:53', '2022-08-07 10:31:53');
INSERT INTO "public"."events" VALUES (13, 'test11', '2022-08-07 09:14:03', '2022-08-07 10:31:58', '2022-08-07 10:31:58');
INSERT INTO "public"."events" VALUES (9, 'test3', NULL, '2022-08-07 10:32:04', '2022-08-07 10:32:04');
INSERT INTO "public"."events" VALUES (8, 'test2', NULL, '2022-08-07 10:32:11', '2022-08-07 10:32:11');
INSERT INTO "public"."events" VALUES (7, 'test', NULL, '2022-08-07 10:32:20', '2022-08-07 10:32:20');
INSERT INTO "public"."events" VALUES (6, 'test2', NULL, '2022-08-07 10:32:52', '2022-08-07 10:32:52');
INSERT INTO "public"."events" VALUES (5, 'test2', NULL, '2022-08-07 10:32:58', '2022-08-07 10:32:58');
INSERT INTO "public"."events" VALUES (4, 'test', NULL, '2022-08-07 10:33:04', '2022-08-07 10:33:04');
INSERT INTO "public"."events" VALUES (3, 'test', NULL, '2022-08-07 10:33:10', '2022-08-07 10:33:10');
INSERT INTO "public"."events" VALUES (2, 'test', NULL, '2022-08-07 10:33:16', '2022-08-07 10:33:16');
INSERT INTO "public"."events" VALUES (1, 'test', NULL, '2022-08-07 10:33:22', '2022-08-07 10:33:22');
INSERT INTO "public"."events" VALUES (19, 'test2', '2022-08-07 10:33:41', '2022-08-07 10:34:12', NULL);
INSERT INTO "public"."events" VALUES (20, 'test', '2022-08-07 10:50:28', '2022-08-07 10:50:28', NULL);
INSERT INTO "public"."events" VALUES (21, 'test 3', '2022-08-07 11:55:16', '2022-08-07 11:55:16', NULL);
INSERT INTO "public"."events" VALUES (22, 'test 4', '2022-08-07 11:58:24', '2022-08-07 11:58:24', NULL);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS "public"."failed_jobs";
CREATE TABLE "public"."failed_jobs" (
  "id" int8 NOT NULL DEFAULT nextval('failed_jobs_id_seq'::regclass),
  "uuid" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
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
DROP TABLE IF EXISTS "public"."migrations";
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
INSERT INTO "public"."migrations" VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO "public"."migrations" VALUES (5, '2021_09_17_031241_create_country_table', 1);
INSERT INTO "public"."migrations" VALUES (6, '2021_09_17_031834_create_city_table', 1);
INSERT INTO "public"."migrations" VALUES (13, '2022_08_05_073921_create_events_table', 2);
INSERT INTO "public"."migrations" VALUES (14, '2022_08_05_074524_create_event_details_table', 2);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS "public"."password_resets";
CREATE TABLE "public"."password_resets" (
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "token" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0)
)
;

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS "public"."personal_access_tokens";
CREATE TABLE "public"."personal_access_tokens" (
  "id" int8 NOT NULL DEFAULT nextval('personal_access_tokens_id_seq'::regclass),
  "tokenable_type" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "tokenable_id" int8 NOT NULL,
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "token" varchar(64) COLLATE "pg_catalog"."default" NOT NULL,
  "abilities" text COLLATE "pg_catalog"."default",
  "last_used_at" timestamp(0),
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "id" int8 NOT NULL DEFAULT nextval('users_id_seq'::regclass),
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
INSERT INTO "public"."users" VALUES (1, 'dani', 'dani@example.com', NULL, '$2y$10$iXV/y7nqznAjjXgM4vrvsONxYUjAX..Kj/ibz5bSlPGnxnoDusQn2', NULL, '2022-08-05 06:44:01', '2022-08-05 06:44:01');

-- ----------------------------
-- Primary Key structure for table event_details
-- ----------------------------
ALTER TABLE "public"."event_details" ADD CONSTRAINT "event_details_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table events
-- ----------------------------
ALTER TABLE "public"."events" ADD CONSTRAINT "events_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table failed_jobs
-- ----------------------------
ALTER TABLE "public"."failed_jobs" ADD CONSTRAINT "failed_jobs_uuid_unique" UNIQUE ("uuid");

-- ----------------------------
-- Primary Key structure for table failed_jobs
-- ----------------------------
ALTER TABLE "public"."failed_jobs" ADD CONSTRAINT "failed_jobs_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table migrations
-- ----------------------------
ALTER TABLE "public"."migrations" ADD CONSTRAINT "migrations_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table password_resets
-- ----------------------------
CREATE INDEX "password_resets_email_index" ON "public"."password_resets" USING btree (
  "email" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Indexes structure for table personal_access_tokens
-- ----------------------------
CREATE INDEX "personal_access_tokens_tokenable_type_tokenable_id_index" ON "public"."personal_access_tokens" USING btree (
  "tokenable_type" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST,
  "tokenable_id" "pg_catalog"."int8_ops" ASC NULLS LAST
);

-- ----------------------------
-- Uniques structure for table personal_access_tokens
-- ----------------------------
ALTER TABLE "public"."personal_access_tokens" ADD CONSTRAINT "personal_access_tokens_token_unique" UNIQUE ("token");

-- ----------------------------
-- Primary Key structure for table personal_access_tokens
-- ----------------------------
ALTER TABLE "public"."personal_access_tokens" ADD CONSTRAINT "personal_access_tokens_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_email_unique" UNIQUE ("email");

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table event_details
-- ----------------------------
ALTER TABLE "public"."event_details" ADD CONSTRAINT "event_details_event_id_foreign" FOREIGN KEY ("event_id") REFERENCES "public"."events" ("id") ON DELETE CASCADE ON UPDATE CASCADE;
