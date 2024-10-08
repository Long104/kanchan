import * as schema from './schema';
import { drizzle } from 'drizzle-orm/...';
// import {users} from './schema';

// const db = drizzle(client, { schema });

// const result = await db.query.users.findMany({});
// console.log(result);

// await db.insert(products).values({ name : 'long',price :10.10, image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHRx88ymTr-g2dAqZF821_-nTaiNt60JJHnw&s" });


// import { db } from './path_to_your_db_connection'; // Adjust the import according to your project structure
// import {products} from './schema';
import {db} from './db';
import { users, products, UserCart, purchases } from './schema'; // Adjust the import according to your project structure

// Inserting multiple users
// await db.insert(users).values([
  // { username: 'long', email: 'long@gmail.com', password: '1234', datetime: new Date() },
  // { username: 'ming', email: 'ming@gmail.com', password: '1234', datetime: new Date() },
// ]);

// Inserting multiple products
await db.insert(products).values([
  { name: 'Beauty Blenders', price:589 , image: "https://lurellacosmetics.com/cdn/shop/products/Baddielurella.jpg?v=1664818325&width=3840" },
  { name: 'Magnetic Eyelashes', price: 589, image: "https://cdn.shopify.com/s/files/1/0985/3000/products/blending-sponge-2-pack-la-girl-1.jpg?v=1617368580" },
  { name: 'libstick', price:489 , image: "https://www.reneecosmetics.in/cdn/shop/files/renee-stunner-matte-lipstick-4gm-renee-cosmetics-11.jpg?v=1691477163" },
  { name: 'eye', price:389 , image: "https://makeupforever.co.th/cdn/shop/products/I000058201_1_4d7e5701-fc4c-466f-bb4e-e97c65105460.png?v=1676007837" },

]);

                   

// Inserting multiple UserCart items

// await db.insert(UserCart).values([
  // { name: 'Item 1', price: 10.10, image: "https://example.com/cart_item1.jpg" },
  // { name: 'Item 2', price: 20.50, image: "https://example.com/cart_item2.jpg" },
// ]);

// Inserting multiple purchases

// await db.insert(purchases).values([
  // { user_id: 1, product_id: 1, name: 'Product 1', price: 10.10, image: "https://example.com/image1.jpg" },
  // { user_id: 1, product_id: 2, name: 'Product 2', price: 20.50, image: "https://example.com/image2.jpg" },
  // { user_id: 2, product_id: 3, name: 'Product 3', price: 15.75, image: "https://example.com/image3.jpg" },
// ]);

