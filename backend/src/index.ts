import * as schema from './schema';
import { drizzle } from 'drizzle-orm/...';
import {db} from './db';
// import {users} from './schema';
import {products} from './schema';

// const db = drizzle(client, { schema });

// const result = await db.query.users.findMany({});
// console.log(result);

await db.insert(products).values({ name : 'long',price :10.10, image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHRx88ymTr-g2dAqZF821_-nTaiNt60JJHnw&s" });

