import {  int, mysqlTable, varchar,datetime } from 'drizzle-orm/mysql-core';



export const users = mysqlTable('users', {
  id: int('id',{mode:'number'}).primaryKey().autoincrement(),
  username: varchar('username', { length: 256 }),
  email: varchar('email', { length: 256 }),
  password: varchar('password', { length: 256 }),
  datetime: datetime('datetime'),
});
