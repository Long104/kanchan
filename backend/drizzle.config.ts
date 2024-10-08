import { defineConfig } from 'drizzle-kit';

export default defineConfig({
  schema: './src/schema.ts',
  out: './drizzle',
  dialect: 'mysql', // 'postgresql' | 'mysql' | 'sqlite'
  dbCredentials: {
    host: 'localhost', 
    user: 'myuser',
    password: 'mypassword',
    database: 'mydatabase',
  },
});
