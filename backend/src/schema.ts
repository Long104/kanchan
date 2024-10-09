import {
  datetime,
  decimal,
  int,
  mysqlTable,
  varchar,
  timestamp,
} from "drizzle-orm/mysql-core";
// import { decimal } from '../node_modules/drizzle-orm/mysql-core/index';

export const users = mysqlTable("users", {
  id: int("id", { mode: "number" }).primaryKey().autoincrement(),
  username: varchar("username", { length: 256 }),
  email: varchar("email", { length: 256 }),
  password: varchar("password", { length: 256 }),
  // datetime: datetime("datetime"),
  datetime: timestamp("timestamp").defaultNow(),
});

export const products = mysqlTable("products", {
  id: int("id", { mode: "number" }).primaryKey().autoincrement(),
  name: varchar("name", { length: 256 }).notNull(),
  price: decimal("price", { precision: 10, scale: 2 }).notNull(),
  image: varchar("image", { length: 256 }).notNull(),
});


export const UserCart = mysqlTable("user_cart", {
  id: int("id", { mode: "number" }).primaryKey().autoincrement(),
  name: varchar("name", { length: 256 }).notNull(),
  price: decimal("price", { precision: 10, scale: 2 }).notNull(),
  image: varchar("image", { length: 256 }).notNull(),
  product_id: int("product_id", { mode: "number" })
    .references(() => products.id, { onDelete: "cascade" })
    .notNull(),
});


export const purchases = mysqlTable("purchases", {
  id: int("id", { mode: "number" }).primaryKey().autoincrement(),
  user_id: int("user_id", { mode: "number" })
    .references(() => users.id, { onDelete: "cascade" })
    .notNull(),
  product_id: int("product_id", { mode: "number" })
    .references(() => products.id, { onDelete: "cascade" })
    .notNull(),
  // name: varchar("name", { length: 256 }).notNull(),
  // price: decimal("price", { precision: 10, scale: 2 }).notNull(),
  // image: varchar("image", { length: 256 }).notNull(),
  datetime: timestamp("timestamp").defaultNow(),
});


