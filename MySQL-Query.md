# MYSQL database
---
## SQL COMMANDS
---
SQL (Structured Query Language) is a powerful domain-specific language used for managing and manipulating relational databases. Here are some of the most important SQL commands:

1. **SELECT**: Used to retrieve data from one or more tables. You can specify which columns to retrieve and filter rows using various conditions.

   ```sql
   SELECT column1, column2
   FROM table_name
   WHERE condition;
   ```

2. **INSERT**: Adds new rows to a table.

   ```sql
   INSERT INTO table_name (column1, column2)
   VALUES (value1, value2);
   ```

3. **UPDATE**: Modifies existing records in a table.

   ```sql
   UPDATE table_name
   SET column1 = value1, column2 = value2
   WHERE condition;
   ```

4. **DELETE**: Removes rows from a table based on a specified condition.

   ```sql
   DELETE FROM table_name
   WHERE condition;
   ```

5. **CREATE TABLE**: Creates a new table with specified columns and data types.

   ```sql
   CREATE TABLE table_name (
       column1 datatype,
       column2 datatype,
       ...
   );
   ```

6. **ALTER TABLE**: Modifies an existing table, such as adding, modifying, or deleting columns.

   ```sql
   ALTER TABLE table_name
   ADD column_name datatype;

   ALTER TABLE table_name
   MODIFY column_name new_datatype;

   ALTER TABLE table_name
   DROP COLUMN column_name;
   ```

7. **DROP TABLE**: Deletes an existing table and all its data.

   ```sql
   DROP TABLE table_name;
   ```

8. **CREATE INDEX**: Creates an index on one or more columns to improve query performance.

   ```sql
   CREATE INDEX index_name
   ON table_name (column1, column2, ...);
   ```

9. **ALTER INDEX**: Modifies an existing index.

   ```sql
   ALTER INDEX index_name
   RENAME TO new_index_name;
   ```

10. **TRUNCATE TABLE**: Removes all rows from a table but retains the table structure.

    ```sql
    TRUNCATE TABLE table_name;
    ```

11. **GRANT and REVOKE**: These commands are used to grant or revoke specific privileges (like SELECT, INSERT, UPDATE, DELETE) to or from users and roles.
the *GRANT* and *REVOKE* statements are used to manage permissions and privileges for database objects such as tables, views, and procedures. These statements control who can perform specific actions (e.g., SELECT, INSERT, UPDATE, DELETE) on these objects. 

    ```sql
    GRANT privilege(s) ON object TO user;
    REVOKE privilege(s) ON object FROM user;
    GRANT SELECT, INSERT, UPDATE ON orders TO sales_role;
    REVOKE DELETE ON products FROM bob;
    ```
  **Note** :**GRANT** This grants the sales_role the permissions to perform SELECT, INSERT, and UPDATE operations on the orders table.
  **Revoke** This revokes Bob's permission to perform DELETE operations on the products table.

12. **COMMIT and ROLLBACK**: Used in transactions to either save changes (COMMIT) or discard them (ROLLBACK).

    In SQL, `COMMIT` and `ROLLBACK` are commands used to manage transactions within a relational database. A transaction is a sequence of one or more SQL statements that are executed as a single unit of work. Transactions are essential for maintaining data integrity and consistency within the database. Let's explore `COMMIT` and `ROLLBACK` with examples and explanations:

**COMMIT**:

The `COMMIT` command is used to permanently save all the changes made during a transaction to the database. If the transaction is successful (i.e., all statements within the transaction execute without errors), the changes are committed and become permanent. If there are any errors during the transaction, the changes are rolled back, and nothing is saved to the database.

```sql
BEGIN TRANSACTION; -- Start a transaction

-- SQL statements within the transaction
INSERT INTO employees (employee_id, first_name, last_name) VALUES (101, 'John', 'Doe');
UPDATE accounts SET balance = balance - 100 WHERE account_id = 123;
DELETE FROM temp_orders WHERE order_date < '2023-01-01';

COMMIT; -- Save changes to the database
```

In this example, a transaction is started with `BEGIN TRANSACTION`. The transaction includes multiple SQL statements to insert, update, and delete records. If all statements execute without errors, the `COMMIT` command is used to permanently save these changes to the database.

**ROLLBACK**:

The `ROLLBACK` command is used to undo all changes made during a transaction and return the database to its state before the transaction started. It is typically used when an error occurs within the transaction, and you want to discard the changes.

```sql
BEGIN TRANSACTION; -- Start a transaction

-- SQL statements within the transaction
INSERT INTO employees (employee_id, first_name, last_name) VALUES (101, 'John', 'Doe');
UPDATE accounts SET balance = balance - 100 WHERE account_id = 123;
-- An error occurs here
ROLLBACK; -- Undo changes and discard the transaction
```

In this example, if an error occurs during the transaction (e.g., a constraint violation, division by zero, etc.), the `ROLLBACK` command is executed to undo all changes made within the transaction, ensuring that the database remains in a consistent state.


## MySQL SELECT Statement
---
Certainly! Below are some advanced MySQL `SELECT` statements with various conditions and multiple tables. These queries demonstrate complex scenarios that advanced-level developers might encounter:

**1. Inner Join with Multiple Tables:**

   Suppose you have three tables: `orders`, `order_items`, and `products`. You want to retrieve order details along with the product information for each item in the order.

   ```sql
   SELECT orders.order_id, orders.order_date, products.product_name, order_items.quantity
   FROM orders
   INNER JOIN order_items ON orders.order_id = order_items.order_id
   INNER JOIN products ON order_items.product_id = products.product_id
   WHERE orders.order_date >= '2023-01-01';
   ```

   This query uses multiple `INNER JOIN` clauses to combine data from three tables and applies a condition to filter orders placed on or after January 1, 2023.

**2. LEFT JOIN (or LEFT OUTER JOIN):**
   - Retrieve all records from the left table and the matched records from the right table.
   
   ```sql
   SELECT products.product_name, order_details.quantity
   FROM products
   LEFT JOIN order_details ON products.product_id = order_details.product_id;
   ```

**3. RIGHT JOIN (or RIGHT OUTER JOIN):**
   - Retrieve all records from the right table and the matched records from the left table.
   
   ```sql
   SELECT employees.employee_name, sales.sales_amount
   FROM employees
   RIGHT JOIN sales ON employees.employee_id = sales.employee_id;
   ```

**4. FULL OUTER JOIN:**
   - Retrieve all records when there is a match in either the left or right table.
   
   ```sql
   SELECT customers.customer_name, orders.order_date
   FROM customers
   FULL OUTER JOIN orders ON customers.customer_id = orders.customer_id;
   ```

**5. SELF JOIN:**
   - Join a table with itself to retrieve related data.
   
   ```sql
   SELECT e1.employee_name, e2.manager_name
   FROM employees e1
   LEFT JOIN employees e2 ON e1.manager_id = e2.employee_id;
   ```

**6. CROSS JOIN:**
   - Generate all possible combinations of rows from two tables (Cartesian product).
   
   ```sql
   SELECT colors.color_name, sizes.size_name
   FROM colors
   CROSS JOIN sizes;
   ```

**7. Subquery with EXISTS:**
   - Use a subquery to check for the existence of related data.
   
   ```sql
   SELECT customer_name
   FROM customers
   WHERE EXISTS (
       SELECT 1
       FROM orders
       WHERE customers.customer_id = orders.customer_id
   );
   ```

**8. Subquery with IN:**
   - Use a subquery to filter results based on a list of values.
   
   ```sql
   SELECT product_name
   FROM products
   WHERE product_id IN (
       SELECT product_id
       FROM order_details
       WHERE quantity > 10
   );
   ```
   You want to find customers who have placed orders with a total order value greater than the average order value.

   ```sql
   SELECT customer_id, first_name, last_name
   FROM customers
   WHERE customer_id IN (
       SELECT customer_id
       FROM orders
       GROUP BY customer_id
       HAVING SUM(order_total) > (SELECT AVG(order_total) FROM orders)
   );
   ```
**9. Subquery with JOIN:**
   - Combine subqueries with joins for complex filtering.
   
   ```sql
   SELECT customers.customer_name, orders.order_date
   FROM customers
   JOIN (
       SELECT order_id, order_date
       FROM orders
       WHERE order_total > 1000
   ) AS orders ON customers.customer_id = orders.customer_id;
   ```


   This query performs a self-join to connect employees with their managers.

**4. Conditional Aggregation:**

   You want to calculate the total sales for each product category but exclude products with a specific status.

   ```sql
   SELECT categories.category_name, SUM(CASE WHEN products.status != 'inactive' THEN order_items.quantity * products.unit_price ELSE 0 END) AS total_sales
   FROM categories
   INNER JOIN products ON categories.category_id = products.category_id
   INNER JOIN order_items ON products.product_id = order_items.product_id
   GROUP BY categories.category_name;
   ```

   This query uses conditional aggregation to sum the sales of products with a specific status.

**5. Common Table Expression (CTE):**

   Suppose you have a table `sales` that records monthly sales data, and you want to calculate the cumulative sales for each month.

   ```sql
   WITH cte_sales AS (
       SELECT month, SUM(sales_amount) AS monthly_sales
       FROM sales
       GROUP BY month
   )
   SELECT month, monthly_sales, SUM(monthly_sales) OVER (ORDER BY month) AS cumulative_sales
   FROM cte_sales;
   ```
Certainly! Here are some advanced MySQL `SELECT` statements with various conditions, multiple tables, and different types of joins:

**1. INNER JOIN:**
   - Retrieve data from two tables based on a common column.
   
   ```sql
   SELECT customers.customer_name, orders.order_date
   FROM customers
   INNER JOIN orders ON customers.customer_id = orders.customer_id;
   ```





###  To create Database.
```bash
CREATE DATABASE Database_name;
```
###  To create Table in Database.

```bash
    CREATE TABLE worker_info (
    id INT NOT NULL PRIMARY KEY AUTO_INCREAMENT,
    name VARCHAR(50) ,
    birth_date DATE CHECK(birth_date <= '200-02-30'), // This field must be above the check time.
    phone VARCHAR(15), 
    gender VARCHAR(1),
    description text
);
```
* to Create a new Column--
```bash
ALTER TABLE worker_info ADD salay varchar(20)
```
* To Insert Record in row of every column--
```bash
INSERT INTO worker_info(age,name,description,joining_date,salay) VALUES (30,"Bahauddin","Product packaging","2015-10-09",12000), (40,"Abbas","dalivery product to home","2017-05-12",11500), (28,"Kalimuddin","Product checking","2013-11-19",15500), (34,"Salimuddin","supervising the show-room","2019-10-23",21500);
// Remember that if id is auto_increament , then not mandatory record fill of id.
```
* To Update an inserted value to a column--
Update can be used null or recorded row.
```bash
UPDATE product SET selling_date = "1993-12-10" WHERE id = 7;
UPDATE product SET selling_date = "2013-05-05" WHERE name = "T_Shirt";
```

To Query by SQL Command
* AND ,OR, NOT , IN , NOT IN , BETWEEN, NOT BETWEEN, LIKE and Wilcards,
```bash
1. SELECT id, name FROM `worker_info` ORDER BY id DESC.
2. SELECT id, name,price, catagory_id, Quantity FROM `product` WHERE (catagory_id != 1 AND Quantity >  10 AND price > 500)
3. SELECT name, price,Quantity FROM product WHERE Quantity IN(15,25,12,10);
4. SELECT name, price,Quantity FROM product WHERE name not IN("orange","banana","panjabi");
5. SELECT name, price,Quantity FROM product WHERE Quantity BETWEEN 15 AND 25
6. SELECT name, price,Quantity FROM product WHERE price NOT BETWEEN 700 AND 1500
7. SELECT name, price,Quantity FROM product WHERE name LIKE "ma%___";
8. SELECT name, price,Quantity FROM product WHERE price NOT LIKE "%5%0";
9. SELECT name, price,Quantity FROM product WHERE price LIKE "%3%0" // 430,350,380
```
* Regular Expression in SQL Query.
 ^, $, | , ""
```bash
1. SELECT * FROM `product` WHERE name REGEXP "^t|t$" 
and other 

REGEXP "^[st]h" // starting must be s/t with "h"
 "^b[nai]" // starting must be "b" with n/a/i 
"b[nai]$" // finishing must be "b" with n/a/i
"an$" // Ending Must be  with "an"
"^an" // finishing must be with "an"
```
* ORDER BY , DISTINCT, NULL, NOT NULL
```bash
1. SELECT name as "ProductName", price as "Low to High" FROM `product` ORDER BY price // Ascending to Descending
2. SELECT name as "ProductName", price as "High to low" FROM `product` ORDER BY price DESC // descending order.
3. SELECT DISTINCT catagory_id, Description FROM product // Distinct use to remove duplicate record.
4. SELECT * FROM `product` WHERE selling_date is NOT null // null record show , not null show record that are not recorded.
```
* LIMIT & OFFSET , COUT, SUM , AVG, MAX, MIN , UPDATE, DELETE
```bash
1. SELECT name,price FROM product WHERE price>500 ORDER BY id LIMIT 5, 2 // first number of limit return starting row and the other rerturns the length of result.
2. SELECT Description,catagory_id, SUM(price) as "Price" FROM product WHERE catagory_id = 3
3. UPDATE sign_up_data SET Country = "England" WHERE Id IN(1,9) // 1 & 9 NO. field will be updated.
4. DELETE FROM sign_up_data WHERE id in(1,3);
5. DELETE FROM sign_up_data WHERE country "Pakistan";
```

* Subquery 
```bash
SELECT ct.name as "Catagory Name", pd.catagory_id as "catagory id",pd.price as "Best selling", pd.Quantity as "Total Quantities"
FROM product pd , catagory ct
WHERE pd.catagory_id = ct.id
AND pd.price = (
 SELECT MAX(p.price) FROM product p
  WHERE  p.catagory_id = ct.id
)
```

### PRIMARY KEY & FOREIGN KEY

* Foreign Key can be added in two ways. and Primary Key, UNIQUE or any constraint can be added by ALTER.

```bash
1.CREATE TABLE temporaray_table( id int not null AUTO_INCREMENT, name varchar(40), PRIMARY KEY(id),  FOREIGN KEY(id) REFERENCES six_result(Six_Id) ).
2. ALTER TABLE class_six ADD FOREIGN KEY REFERENCES student_result(Reg_id);
3. ALTER TABLE class_six ADD PRIMARY KEY(id).
4. ALTER TABLE temporaray_table add UNIQUE(name).
```
### INNER JOIN , LEFT JOIN, RIGHT JOIN, CROSS JOIN, MULTIPLE JOIN
* iNNER JOIN shows the exactly matched result , but not show mismatched result between condition
example :
```bash
1. SELECT st.roll,st.name, st.st_serial, sd.Result , sd.Serial
FROM students st INNER JOIN student_details sd
ON st.st_serial = sd.Serial
* LEFT JOIN show just matched of right join table & others are null.Show all result of left join.
2. SELECT st.name, st.st_serial, sd.Result , sd.Serial
FROM students st LEFT JOIN student_details sd
ON st.st_serial = sd.Serial
* RIGHT JOIN show just matched of left join table & others are null.Show all result of right join.
3. SELECT st.name, st.st_serial, sd.Result , sd.Serial FROM students st RIGHT JOIN student_details sd ON st.st_serial = sd.Serial
4. SELECT * FROM `personal` CROSS JOIN city // cross join is used just to show loop results according to the numbers of values in city table.
5. 
```