import { drizzle } from "drizzle-orm/mysql2";
import mysql from "mysql2/promise";
import * as schema from "./schema.js";

export const connection = await mysql.createConnection({
  host: "localhost",
  user: "myuser",
  password: "mypassword",
  database: "mydatabase",
  multipleStatements: true,
});

export const db = drizzle(connection, { schema, mode: "default" } as any);
