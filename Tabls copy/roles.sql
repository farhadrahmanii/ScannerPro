CREATE TABLE "roles" ("id" integer primary key autoincrement not null, "name" varchar not null, "guard_name" varchar not null, "created_at" datetime, "updated_at" datetime);

INSERT INTO "roles" ("id", "name", "guard_name", "created_at", "updated_at") VALUES
(1, 'Manager', 'web', '2024-12-16 10:59:18', '2024-12-16 10:59:36'),
(2, 'Developer', 'web', '2024-12-17 11:06:15', '2024-12-17 11:06:15'),
(3, 'Print Slip up', 'web', '2024-12-17 11:06:27', '2024-12-19 06:57:18'),
(6, 'asdfasddddeveve', 'web', '2024-12-22 05:56:00', '2024-12-22 05:56:00'),
(7, 'asdadsfdddd', 'web', '2024-12-22 05:56:05', '2024-12-22 05:56:05'),
(8, 'asdfasdfasdf', 'web', '2024-12-22 05:56:08', '2024-12-22 05:56:08');