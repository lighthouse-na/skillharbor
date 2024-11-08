CREATE TABLE IF NOT EXISTS "migrations"(
  "id" integer primary key autoincrement not null,
  "migration" varchar not null,
  "batch" integer not null
);
CREATE TABLE IF NOT EXISTS "users"(
  "id" integer primary key autoincrement not null,
  "department_id" integer,
  "supervisor_id" integer default '1',
  "first_name" varchar not null,
  "last_name" varchar not null,
  "salary_ref_number" integer,
  "gender" varchar,
  "dob" date,
  "role" varchar,
  "competency_rating" integer not null default '0',
  "email" varchar not null,
  "email_verified_at" datetime,
  "password" varchar not null,
  "remember_token" varchar,
  "current_team_id" integer,
  "profile_photo_path" varchar,
  "created_at" datetime,
  "updated_at" datetime,
  "two_factor_secret" text,
  "two_factor_recovery_codes" text,
  "two_factor_confirmed_at" datetime
);
CREATE UNIQUE INDEX "users_email_unique" on "users"("email");
CREATE TABLE IF NOT EXISTS "password_reset_tokens"(
  "email" varchar not null,
  "token" varchar not null,
  "created_at" datetime,
  primary key("email")
);
CREATE TABLE IF NOT EXISTS "sessions"(
  "id" varchar not null,
  "user_id" integer,
  "ip_address" varchar,
  "user_agent" text,
  "payload" text not null,
  "last_activity" integer not null,
  primary key("id")
);
CREATE INDEX "sessions_user_id_index" on "sessions"("user_id");
CREATE INDEX "sessions_last_activity_index" on "sessions"("last_activity");
CREATE TABLE IF NOT EXISTS "cache"(
  "key" varchar not null,
  "value" text not null,
  "expiration" integer not null,
  primary key("key")
);
CREATE TABLE IF NOT EXISTS "cache_locks"(
  "key" varchar not null,
  "owner" varchar not null,
  "expiration" integer not null,
  primary key("key")
);
CREATE TABLE IF NOT EXISTS "jobs"(
  "id" integer primary key autoincrement not null,
  "queue" varchar not null,
  "payload" text not null,
  "attempts" integer not null,
  "reserved_at" integer,
  "available_at" integer not null,
  "created_at" integer not null
);
CREATE INDEX "jobs_queue_index" on "jobs"("queue");
CREATE TABLE IF NOT EXISTS "job_batches"(
  "id" varchar not null,
  "name" varchar not null,
  "total_jobs" integer not null,
  "pending_jobs" integer not null,
  "failed_jobs" integer not null,
  "failed_job_ids" text not null,
  "options" text,
  "cancelled_at" integer,
  "created_at" integer not null,
  "finished_at" integer,
  primary key("id")
);
CREATE TABLE IF NOT EXISTS "failed_jobs"(
  "id" integer primary key autoincrement not null,
  "uuid" varchar not null,
  "connection" text not null,
  "queue" text not null,
  "payload" text not null,
  "exception" text not null,
  "failed_at" datetime not null default CURRENT_TIMESTAMP
);
CREATE UNIQUE INDEX "failed_jobs_uuid_unique" on "failed_jobs"("uuid");
CREATE TABLE IF NOT EXISTS "personal_access_tokens"(
  "id" integer primary key autoincrement not null,
  "tokenable_type" varchar not null,
  "tokenable_id" integer not null,
  "name" varchar not null,
  "token" varchar not null,
  "abilities" text,
  "last_used_at" datetime,
  "expires_at" datetime,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE INDEX "personal_access_tokens_tokenable_type_tokenable_id_index" on "personal_access_tokens"(
  "tokenable_type",
  "tokenable_id"
);
CREATE UNIQUE INDEX "personal_access_tokens_token_unique" on "personal_access_tokens"(
  "token"
);
CREATE TABLE IF NOT EXISTS "assessments"(
  "id" integer primary key autoincrement not null,
  "assessment_title" varchar not null,
  "closing_date" datetime,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE TABLE IF NOT EXISTS "jcps"(
  "id" integer primary key autoincrement not null,
  "user_id" integer not null,
  "position_title" varchar not null,
  "job_grade" varchar not null,
  "duty_station" varchar not null,
  "job_purpose" varchar not null,
  "is_active" integer not null default '1',
  "created_at" datetime,
  "updated_at" datetime,
  foreign key("user_id") references "users"("id") on delete cascade
);
CREATE TABLE IF NOT EXISTS "skills"(
  "id" integer primary key autoincrement not null,
  "skill_category_id" integer not null,
  "skill_title" varchar not null,
  "skill_description" varchar not null,
  "created_at" datetime,
  "updated_at" datetime,
  foreign key("skill_category_id") references "categories"("id") on delete cascade
);
CREATE TABLE IF NOT EXISTS "categories"(
  "id" integer primary key autoincrement not null,
  "category_title" varchar not null,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE TABLE IF NOT EXISTS "enrollments"(
  "id" integer primary key autoincrement not null,
  "user_id" integer not null,
  "assessment_id" integer not null,
  "user_status" integer not null default '0',
  "supervisor_status" integer not null default '0',
  "created_at" datetime,
  "updated_at" datetime,
  foreign key("user_id") references "users"("id") on delete cascade,
  foreign key("assessment_id") references "assessments"("id") on delete cascade
);
CREATE TABLE IF NOT EXISTS "qualifications"(
  "id" integer primary key autoincrement not null,
  "qualification_title" varchar not null,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE TABLE IF NOT EXISTS "qualification_user"(
  "id" integer primary key autoincrement not null,
  "qualification_id" integer not null,
  "user_id" integer not null,
  "created_at" datetime,
  "updated_at" datetime,
  foreign key("qualification_id") references "qualifications"("id") on delete cascade,
  foreign key("user_id") references "users"("id") on delete cascade
);
CREATE TABLE IF NOT EXISTS "jcp_qualification"(
  "id" integer primary key autoincrement not null,
  "jcp_id" integer not null,
  "qualification_id" integer not null,
  "created_at" datetime,
  "updated_at" datetime,
  foreign key("jcp_id") references "jcps"("id") on delete cascade,
  foreign key("qualification_id") references "qualifications"("id") on delete cascade
);
CREATE TABLE IF NOT EXISTS "prerequisites"(
  "id" integer primary key autoincrement not null,
  "prerequisite_title" varchar not null,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE TABLE IF NOT EXISTS "jcp_prerequisites"(
  "id" integer primary key autoincrement not null,
  "jcp_id" integer not null,
  "prerequisite_id" integer not null,
  "created_at" datetime,
  "updated_at" datetime,
  foreign key("jcp_id") references "jcps"("id") on delete cascade,
  foreign key("prerequisite_id") references "prerequisites"("id") on delete cascade
);
CREATE TABLE IF NOT EXISTS "departments"(
  "id" integer primary key autoincrement not null,
  "department_name" varchar not null,
  "division_id" integer not null,
  "created_at" datetime,
  "updated_at" datetime,
  foreign key("division_id") references "divisions"("id") on delete cascade
);
CREATE TABLE IF NOT EXISTS "divisions"(
  "id" integer primary key autoincrement not null,
  "division_name" varchar not null,
  "created_at" datetime,
  "updated_at" datetime
);
CREATE TABLE IF NOT EXISTS "jcp_skill"(
  "jcp_id" integer not null,
  "skill_id" integer not null,
  "required_level" integer,
  "supervisor_rating" integer not null default '0',
  "user_rating" integer not null default '0',
  "created_at" datetime,
  "updated_at" datetime,
  foreign key("jcp_id") references "jcps"("id") on delete cascade,
  foreign key("skill_id") references "skills"("id") on delete cascade
);

INSERT INTO migrations VALUES(1,'0001_01_01_000000_create_users_table',1);
INSERT INTO migrations VALUES(2,'0001_01_01_000001_create_cache_table',1);
INSERT INTO migrations VALUES(3,'0001_01_01_000002_create_jobs_table',1);
INSERT INTO migrations VALUES(4,'2024_03_19_161253_add_two_factor_columns_to_users_table',1);
INSERT INTO migrations VALUES(5,'2024_03_19_161340_create_personal_access_tokens_table',1);
INSERT INTO migrations VALUES(6,'2024_03_22_094525_create_assessments_table',1);
INSERT INTO migrations VALUES(7,'2024_03_22_094647_create_jcps_table',1);
INSERT INTO migrations VALUES(8,'2024_03_22_095415_create_skills_table',1);
INSERT INTO migrations VALUES(9,'2024_03_22_095613_create_categories_table',1);
INSERT INTO migrations VALUES(10,'2024_03_22_095808_create_enrollments_table',1);
INSERT INTO migrations VALUES(11,'2024_03_22_095937_create_qualifications_table',1);
INSERT INTO migrations VALUES(12,'2024_03_22_101320_create_qualification_user_table',1);
INSERT INTO migrations VALUES(13,'2024_03_22_101341_create_jcp_qualification_table',1);
INSERT INTO migrations VALUES(14,'2024_04_18_140048_create_prerequisites_table',1);
INSERT INTO migrations VALUES(15,'2024_04_18_140248_create_jcp_prerequisite_table',1);
INSERT INTO migrations VALUES(16,'2024_06_19_134522_create_departments_table',1);
INSERT INTO migrations VALUES(17,'2024_06_19_134528_create_divisions_table',1);
INSERT INTO migrations VALUES(18,'2024_10_24_141737_create_jcp_skill_table',1);
