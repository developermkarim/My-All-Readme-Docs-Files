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
In MySQL, the `GRANT` and `REVOKE` statements are used to control user privileges and permissions on database objects, such as tables, views, and stored procedures. These statements are essential for managing the security and access control of your MySQL database.

Here's how to use the `GRANT` and `REVOKE` statements with examples:

**GRANT Statement:**

The `GRANT` statement is used to give specific privileges to a MySQL user or role. It can be used to grant privileges at different levels, including global, database, table, and column levels. The basic syntax is as follows:

```sql
GRANT privilege(s)
ON database_name.table_name
TO 'username'@'hostname';
```

- `privilege(s)`: The specific privilege(s) you want to grant, such as SELECT, INSERT, UPDATE, DELETE, etc.
- `database_name.table_name`: The database object (e.g., table) on which you want to grant the privilege(s).
- `'username'@'hostname'`: The MySQL user account and host to which you want to grant the privilege(s).

**Example:**
Grant SELECT and INSERT privileges on the `employees` table in the `company` database to a user named 'john' from localhost:

```sql
GRANT SELECT, INSERT ON company.employees TO 'john'@'localhost';
```

**REVOKE Statement:**

The `REVOKE` statement is used to revoke previously granted privileges from a user or role. The basic syntax is as follows:

```sql
REVOKE privilege(s)
ON database_name.table_name
FROM 'username'@'hostname';
```

- `privilege(s)`: The specific privilege(s) you want to revoke.
- `database_name.table_name`: The database object from which you want to revoke the privilege(s).
- `'username'@'hostname'`: The MySQL user account and host from which you want to revoke the privilege(s).

**Example:**
Revoke the SELECT privilege on the `employees` table in the `company` database from the user 'john' from localhost:

```sql
REVOKE SELECT ON company.employees FROM 'john'@'localhost';
```

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

**10. Conditional Aggregation:**

   You want to calculate the total sales for each product category but exclude products with a specific status.

   ```sql
   SELECT categories.category_name, SUM(CASE WHEN products.status != 'inactive' THEN order_items.quantity * products.unit_price ELSE 0 END) AS total_sales
   FROM categories
   INNER JOIN products ON categories.category_id = products.category_id
   INNER JOIN order_items ON products.product_id = order_items.product_id
   GROUP BY categories.category_name;
   ```

   This query uses conditional aggregation to sum the sales of products with a specific status.

**11. Common Table Expression (CTE):**

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
 ## MYSQL JOINING SHOW IN IMAGE
 ---
 ![altimg](https://i.ibb.co/nswLhzq/0-r-FMCh-X4-SAm-Q9-Rz-F9.webp)

* With Query
---
 ![altimg](https://i.ibb.co/Ph4wccT/sql-joins-guide-and-syntax.jpg)

 ## MYSQL TABLE DATA IN JOINING
 ---
 To demonstrate various SQL joins and display the resulting data in a table format, let's assume we have two tables: `employees` and `departments`. We will use these tables to showcase different types of joins and how the data appears when joined. Below are the sample tables and their data:

**Employees Table:**

| emp_id | emp_name | department_id |
|--------|----------|---------------|
| 1      | Alice    | 101           |
| 2      | Bob      | 102           |
| 3      | Carol    | 101           |
| 4      | Dave     | 103           |

**Departments Table:**

| department_id | department_name |
|---------------|-----------------|
| 101           | HR              |
| 102           | Sales           |
| 103           | IT              |

Now, let's perform various SQL joins and display the results:

**1. INNER JOIN:**

```sql
SELECT employees.emp_id, employees.emp_name, departments.department_name
FROM employees
INNER JOIN departments ON employees.department_id = departments.department_id;
```

**Result:**

| emp_id | emp_name | department_name |
|--------|----------|-----------------|
| 1      | Alice    | HR              |
| 2      | Bob      | Sales           |
| 3      | Carol    | HR              |
| 4      | Dave     | IT              |

**2. LEFT JOIN (LEFT OUTER JOIN):**

```sql
SELECT employees.emp_id, employees.emp_name, departments.department_name
FROM employees
LEFT JOIN departments ON employees.department_id = departments.department_id;
```

**Result:**

| emp_id | emp_name | department_name |
|--------|----------|-----------------|
| 1      | Alice    | HR              |
| 2      | Bob      | Sales           |
| 3      | Carol    | HR              |
| 4      | Dave     | IT              |
| NULL   | NULL     | NULL            |

In a LEFT JOIN, all rows from the left table (`employees`) are returned, and matching rows from the right table (`departments`) are included. If there's no match, NULL values are shown for the columns from the right table.

**3. RIGHT JOIN (RIGHT OUTER JOIN):**

```sql
SELECT employees.emp_id, employees.emp_name, departments.department_name
FROM employees
RIGHT JOIN departments ON employees.department_id = departments.department_id;
```

**Result:**

| emp_id | emp_name | department_name |
|--------|----------|-----------------|
| 1      | Alice    | HR              |
| 2      | Bob      | Sales           |
| 3      | Carol    | HR              |
| 4      | Dave     | IT              |
| NULL   | NULL     | Finance         |

In a RIGHT JOIN, all rows from the right table (`departments`) are returned, and matching rows from the left table (`employees`) are included. If there's no match, NULL values are shown for the columns from the left table.

**4. FULL JOIN (FULL OUTER JOIN):** // It is for raw SQL(MS SQL SERVER) .But Not For MYSQL

```sql
# It is for raw SQL(MS SQL SERVER) .But Not For MYSQL
SELECT employees.emp_id, employees.emp_name, departments.department_name
FROM employees
FULL JOIN departments ON employees.department_id = departments.department_id;
```

**Result:**

| emp_id | emp_name | department_name |
|--------|----------|-----------------|
| 1      | Alice    | HR              |
| 2      | Bob      | Sales           |
| 3      | Carol    | HR              |
| 4      | Dave     | IT              |
| NULL   | NULL     | Finance         |

A FULL JOIN returns all rows when there is a match in either the left table or the right table. If there's no match, NULL values are shown for missing values on both sides.

These examples demonstrate the different types of SQL joins and how the data appears when joined in a tabular format.

To demonstrate how different types of joins work in MySQL and display the resulting data in a table format, I'll provide an example using two hypothetical tables: `orders` and `customers`. We'll use sample data to illustrate each join type and display the output.

Assuming the structure of the tables and some sample data as follows:

**Table: orders**

| order_id | customer_id | order_date |
|----------|-------------|------------|
| 1        | 101         | 2023-09-01 |
| 2        | 102         | 2023-09-02 |
| 3        | 103         | 2023-09-03 |

**Table: customers**

| customer_id | customer_name |
|-------------|---------------|
| 101         | John          |
| 102         | Alice         |
| 104         | Bob           |

Now, let's demonstrate the different types of joins and display the resulting data:

**1. INNER JOIN:**
An INNER JOIN returns rows where there is a match in both tables.

```sql
SELECT orders.order_id, customers.customer_name
FROM orders
INNER JOIN customers ON orders.customer_id = customers.customer_id;
```

**Result:**

| order_id | customer_name |
|----------|---------------|
| 1        | John          |
| 2        | Alice         |

**2. LEFT JOIN (LEFT OUTER JOIN):**
A LEFT JOIN returns all rows from the left table (orders) and matched rows from the right table (customers). If there's no match, NULL values are displayed for the right table.

```sql
SELECT orders.order_id, customers.customer_name
FROM orders
LEFT JOIN customers ON orders.customer_id = customers.customer_id;
```

**Result:**

| order_id | customer_name |
|----------|---------------|
| 1        | John          |
| 2        | Alice         |
| 3        | NULL          |

**3. RIGHT JOIN (RIGHT OUTER JOIN):**
A RIGHT JOIN returns all rows from the right table (customers) and matched rows from the left table (orders). If there's no match, NULL values are displayed for the left table.

```sql
SELECT orders.order_id, customers.customer_name
FROM orders
RIGHT JOIN customers ON orders.customer_id = customers.customer_id;
```

**Result:**

| order_id | customer_name |
|----------|---------------|
| 1        | John          |
| 2        | Alice         |
| NULL     | Bob           |

**4. FULL JOIN (FULL OUTER JOIN):**

MySQL does not support FULL OUTER JOIN directly. However, you can emulate a FULL OUTER JOIN by combining a LEFT JOIN and a RIGHT JOIN and using the UNION operator to merge the results. Here's an example:

Suppose you have two tables, `employees` and `departments`, and you want to perform a FULL OUTER JOIN to retrieve a list of all employees and their corresponding department names. Here's how you can do it:

```sql
-- Create sample tables
CREATE TABLE employees (
    emp_id INT PRIMARY KEY,
    emp_name VARCHAR(255),
    dept_id INT
);

CREATE TABLE departments (
    dept_id INT PRIMARY KEY,
    dept_name VARCHAR(255)
);

-- Insert sample data
INSERT INTO employees (emp_id, emp_name, dept_id) VALUES
(1, 'John', 101),
(2, 'Alice', 102),
(3, 'Bob', NULL);

INSERT INTO departments (dept_id, dept_name) VALUES
(101, 'HR'),
(102, 'Finance'),
(103, 'Marketing');

-- Perform a FULL OUTER JOIN using UNION
SELECT e.emp_name, d.dept_name
FROM employees e
LEFT JOIN departments d ON e.dept_id = d.dept_id
UNION
SELECT e.emp_name, d.dept_name
FROM employees e
RIGHT JOIN departments d ON e.dept_id = d.dept_id;
```

This query combines the results of a LEFT JOIN (employees on departments) and a RIGHT JOIN (departments on employees) using the UNION operator. It retrieves a list of all employees and their corresponding department names, including cases where there might be no matching department or employee.

The result would look like this:

| emp_name | dept_name |
|----------|-----------|
| John     | HR        |
| Alice    | Finance   |
| Bob      | NULL      |
| NULL     | Marketing |

In this result, John and Alice have corresponding departments (HR and Finance), Bob has no assigned department, and there's a department (Marketing) with no assigned employees. This simulates the effect of a FULL OUTER JOIN in MySQL.

**5. CROSS JOIN:**
A CROSS JOIN is a type of join that combines each row from one table with every row from another table. It results in a Cartesian product of the two tables, meaning all possible combinations of rows are included in the result set.

Suppose we have two tables: `products` and `categories`. A CROSS JOIN between these tables would give us all possible combinations of products and categories:

```sql
SELECT products.product_name, categories.category_name
FROM products
CROSS JOIN categories;
```

Result:

| product_name | category_name |
|--------------|---------------|
| Laptop       | Electronics   |
| Tablet       | Electronics   |
| Printer      | Electronics   |
| Laptop       | Office        |
| Tablet       | Office        |
| Printer      | Office        |
| Laptop       | Clothing      |
| Tablet       | Clothing      |
| Printer      | Clothing      |

In this example, each product is combined with every category, resulting in all possible combinations.

**5. SELF JOIN:**

A SELF JOIN, on the other hand, is a type of join where a table is joined with itself. This is often used when you want to combine rows from the same table based on a relationship within that table.

Suppose we have a single table called `employees` with a self-referencing relationship for managers and their subordinates. We can use a SELF JOIN to retrieve information about the manager and their respective subordinates:

```sql
SELECT e1.employee_name AS employee, e2.employee_name AS manager
FROM employees AS e1
LEFT JOIN employees AS e2 ON e1.manager_id = e2.employee_id;
```

Result:

| employee    | manager     |
|-------------|-------------|
| John        | NULL        |
| Alice       | John        |
| Bob         | John        |
| Carol       | Alice       |
| David       | Alice       |

In this example, we're using a LEFT JOIN to create a self-join on the `employees` table to show the employees and their respective managers. The `e1` and `e2` aliases represent two instances of the same table, allowing us to join employees with their managers within the same table.



## MYSQL : INSERT QUERY
Certainly! Here are some common MySQL INSERT queries for various levels of projects and database development, along with code examples:

1. **Basic Insertion**:
   - Inserts a single row of data into a table.
   ```sql
   INSERT INTO users (username, email, age) VALUES ('john_doe', 'john@example.com', 30);
   ```

2. **Insert Multiple Rows**:
   - Inserts multiple rows into a table in a single query.
   ```sql
   INSERT INTO products (name, price) VALUES
   ('Product A', 19.99),
   ('Product B', 24.99),
   ('Product C', 14.99);
   ```

3. **Insert with Subquery**:
   - Inserts data into a table using a subquery.
   ```sql
   INSERT INTO orders (user_id, product_id, quantity)
   SELECT user_id, product_id, 3
   FROM cart
   WHERE user_id = 123;
   ```

4. **Insert with Default Values**:
   - Inserts a row with default values for unspecified columns.
   ```sql
   INSERT INTO employees (first_name, last_name) VALUES ('Alice', 'Smith');
   ```

5. **Insert with Auto-increment Primary Key**:
   - Inserts a row, and MySQL assigns an auto-incremented primary key.
   ```sql
   INSERT INTO customers (name, email) VALUES ('Customer A', 'customerA@example.com');
   ```

6. **Insert Data into a Specific Column**:
   - Inserts data into specific columns, leaving others as default.
   ```sql
   INSERT INTO students (student_id, first_name, last_name) VALUES (101, 'Jane', 'Doe');
   ```

7. **Insert from Another Table**:
   - Inserts data from one table into another.
   ```sql
   INSERT INTO backup_orders (order_id, order_date)
   SELECT order_id, order_date FROM live_orders;
   ```

8. **Insert Conditional Data**:
   - Inserts data based on a condition.
   ```sql
   INSERT INTO premium_members (user_id, membership_type)
   SELECT user_id, 'Gold'
   FROM users
   WHERE total_purchase >= 1000;
   ```

9. **Insert JSON Data**:
   - Inserts data in JSON format into a JSON column.
   ```sql
   INSERT INTO products (name, attributes)
   VALUES ('Product X', '{"color": "blue", "size": "medium"}');
   ```

10. **Insert Binary Data**:
    - Inserts binary data, such as images, into a table.
    ```sql
    INSERT INTO images (image_data, description)
    VALUES (LOAD_FILE('/path/to/image.jpg'), 'A beautiful landscape');
    ```

These examples cover a range of scenarios you might encounter when working with MySQL databases. Always be cautious about SQL injection and ensure data validation and sanitation in real projects.

## MYSQL : UPDATE QUERY 
---

1. **Basic Update Query:**
   This query updates a specific record in a table.

   ```sql
   UPDATE table_name
   SET column1 = value1, column2 = value2
   WHERE some_column = some_value;
   ```

2. **Update Multiple Records:**
   You can update multiple records at once.

   ```sql
   UPDATE table_name
   SET column1 = value1
   WHERE some_column = some_value;
   ```

3. **Increment a Numeric Column:**
   To increment the value of a numeric column.

   ```sql
   UPDATE table_name
   SET numeric_column = numeric_column + 1
   WHERE some_column = some_value;
   ```

4. **Conditional Update:**
   Update records based on a condition.

   ```sql
   UPDATE table_name
   SET column1 = value1
   WHERE condition;
   ```

5. **Update from Another Table:**
   You can use a subquery to update records from another table.

   ```sql
   UPDATE table1
   SET column1 = (SELECT column2 FROM table2 WHERE table2.some_column = table1.some_column)
   WHERE condition;
   ```

6. **Update with a JOIN:**
   Update records using a JOIN operation.

   ```sql
   UPDATE table1
   JOIN table2 ON table1.column = table2.column
   SET table1.column_to_update = table2.new_value
   WHERE condition;
   ```

7. **Update with a LIMIT:**
   Limit the number of records to update.

   ```sql
   UPDATE table_name
   SET column1 = value1
   WHERE condition
   LIMIT 10;
   ```

8. **Update with ORDER BY:**
   Update records based on an ordered result set.

   ```sql
   UPDATE table_name
   SET column1 = value1
   WHERE condition
   ORDER BY some_column
   LIMIT 10;
   ```

These are some common UPDATE queries in MySQL. Developers can adapt and modify these queries based on their project requirements. Please replace `table_name`, `column1`, `value1`, `some_column`, `some_value`, and `condition` with your actual table and column names, values, and conditions.


## MYSQL : DELETE QUERY 
---

1. **Delete a Single Record:**
   
   ```sql
   DELETE FROM table_name WHERE condition;
   ```

   Example:
   
   ```sql
   DELETE FROM employees WHERE employee_id = 101;
   ```

2. **Delete All Records:**
   
   ```sql
   DELETE FROM table_name;
   ```

   Example:
   
   ```sql
   DELETE FROM logs;
   ```

3. **Delete Records from Multiple Tables Using a JOIN:**
   
   ```sql
   DELETE t1, t2 FROM table1 t1
   JOIN table2 t2 ON t1.id = t2.id
   WHERE condition;
   ```

   Example:
   
   ```sql
   DELETE orders, order_details FROM orders
   JOIN order_details ON orders.order_id = order_details.order_id
   WHERE orders.status = 'cancelled';
   ```

4. **Delete Records with a Subquery:**
   
   ```sql
   DELETE FROM table_name WHERE column_name IN (SELECT column_name FROM another_table WHERE condition);
   ```

   Example:
   
   ```sql
   DELETE FROM products WHERE category_id IN (SELECT category_id FROM categories WHERE category_name = 'Obsolete');
   ```

Remember to replace `table_name` with your actual table name, and `condition` with the specific conditions you want to use for deleting records. These are basic examples, and the complexity of DELETE queries can vary significantly depending on the project's requirements.


## MYSQL : OPERATORS QUERY 
---

**1. Arithmetic Operators:**
   - `+` Addition
   - `-` Subtraction
   - `*` Multiplication
   - `/` Division
   - `%` Modulus

```sql
-- Addition
SELECT price + discount FROM products;

-- Subtraction
SELECT price - discount FROM products;

-- Multiplication
SELECT price * quantity FROM products;

-- Division
SELECT price / 2 FROM products;
```


**2. Comparison Operators:**
   - `=` Equal to
   - `!=` or `<>` Not equal to
   - `>` Greater than
   - `<` Less than
   - `>=` Greater than or equal to
   - `<=` Less than or equal to

```sql
-- Equal to
SELECT * FROM products WHERE price = 100;

-- Not equal to
SELECT * FROM products WHERE price <> 100;

-- Greater than
SELECT * FROM products WHERE price > 50;

-- Less than
SELECT * FROM products WHERE price < 50;

-- Greater than or equal to
SELECT * FROM products WHERE price >= 100;

-- Less than or equal to
SELECT * FROM products WHERE price <= 100;
```

**3. Logical Operators:**
   - `AND` Logical AND
   - `OR` Logical OR
   - `NOT` Logical NOT

```sql
-- AND
SELECT * FROM products WHERE category = 'Electronics' AND price < 500;

-- OR
SELECT * FROM products WHERE category = 'Electronics' OR category = 'Clothing';

-- NOT
SELECT * FROM products WHERE NOT category = 'Furniture';
```

**4. LIKE Operator:**
   - `LIKE` Pattern matching with wildcard characters (`%` for any number of characters, `_` for a single character)

-- Using wildcard (%)
```sql
-- Example: Retrieve products with names containing "Widget."
SELECT product_name FROM products WHERE product_name LIKE '%Widget%';
```

**5. IN Operator:**
   - `IN` Checks if a value is within a list of values

```sql
-- Example: Retrieve products in the categories "Electronics" or "Clothing."
SELECT product_name FROM products WHERE category IN ('Electronics', 'Clothing');
```

**6. BETWEEN Operator:**
   - `BETWEEN` Checks if a value is within a range

```sql
-- Example: Retrieve products with a price between $20 and $50.
SELECT product_name FROM products WHERE price BETWEEN 20 AND 50;
```

**7. IS NULL Operator:**
   - `IS NULL` Checks if a value is NULL

```sql
-- Example: Retrieve products with no supplier information.
SELECT product_name FROM products WHERE supplier_id IS NULL;
```

**8. EXISTS Operator:**
   - `EXISTS` Checks for the existence of rows in a subquery

```sql
-- Example: Retrieve products that have at least one review.
SELECT product_name FROM products WHERE EXISTS (SELECT * FROM product_reviews WHERE product_id = products.id);
```

**9. UNION Operator:**
   - `UNION` Combines the result sets of two or more SELECT statements

```sql
-- Example: Retrieve a list of product names from two tables.
SELECT product_name FROM products
UNION
SELECT product_name FROM archived_products;
```

**10. ORDER BY Operator:**
   - `ORDER BY` Sorts the result set

```sql
-- Example: Retrieve products sorted by price in descending order.
SELECT product_name, price FROM products ORDER BY price DESC;
```
**11. Concatenation Operator:**

```sql
-- Combine columns
SELECT CONCAT(product_name, ' - $', price) AS description FROM products;
```
**12. ANY/SOME and ALL Operators (Subquery):**

```sql
-- ANY/SOME: Returns true if any subquery value matches
SELECT * FROM products WHERE price > ANY (SELECT price FROM discounts);

-- ALL: Returns true if all subquery values match
SELECT * FROM products WHERE price > ALL (SELECT price FROM discounts);
```
## MYSQL : ANY,ALL,CASE OPERATORS QUERY 
---
Assuming we have a "products" table with columns: `product_id`, `product_name`, and `product_price`.

1. **ANY Operator:**
   - The `ANY` operator is used with subqueries and returns true if any of the subquery values meet the condition.

```sql
SELECT product_name, product_price
FROM products
WHERE product_price > ANY (SELECT product_price FROM products WHERE product_name = 'Widget');
```

2. **ALL Operator:**
   - The `ALL` operator is used with subqueries and returns true if all the subquery values meet the condition.

```sql
SELECT product_name, product_price
FROM products
WHERE product_price > ALL (SELECT product_price FROM products WHERE product_name = 'Widget');
```

3. **CASE Operator:**
   - The `CASE` operator is used for conditional logic in SQL queries.

```sql
SELECT product_name,
       CASE
           WHEN product_price < 10 THEN 'Low Price'
           WHEN product_price >= 10 AND product_price <= 50 THEN 'Moderate Price'
           ELSE 'High Price'
       END AS price_category
FROM products;
```

## MYSQL : LIKE AND WILDCARD QUERY 
---
In MySQL, the `LIKE` operator is used for pattern matching in string columns. It allows you to search for data based on a specified pattern using wildcards. There are two common wildcards used with the `LIKE` operator: `%` and `_`. Here are examples of how to use them:

1. `%` Wildcard:
   - `%` represents zero or more characters.

   Example 1: Finding products whose names start with "App"
   ```sql
   SELECT * FROM products WHERE name LIKE 'App%';
   ```

   Example 2: Finding products whose names end with "Book"
   ```sql
   SELECT * FROM products WHERE name LIKE '%Book';
   ```

   Example 3: Finding products containing "Phone" anywhere in the name
   ```sql
   SELECT * FROM products WHERE name LIKE '%Phone%';
   ```

2. `_` Wildcard:
   - `_` represents a single character.

   Example 1: Finding products with names of exactly 5 characters
   ```sql
   SELECT * FROM products WHERE name LIKE '_____';
   ```

   Example 2: Finding products with names starting with "A" followed by any 2 characters, and then "e"
   ```sql
   SELECT * FROM products WHERE name LIKE 'A__e';
   ```

3. Combining Wildcards:
   - You can also combine wildcards in more complex patterns.

   Example: Finding products whose names start with "i" or "I" and end with "Phone"
   ```sql
   SELECT * FROM products WHERE name LIKE 'i%Phone' OR name LIKE 'I%Phone';
   ```

4. Using Escape Character:
   - If you need to search for data that contains the wildcard characters themselves ( `%` or `_`), you can escape them using the backslash `\`.

   Example: Finding products with names containing "% Discount"
   ```sql
   SELECT * FROM products WHERE name LIKE '%\% Discount%';
   ```

   In this example, we escape the `%` character using `\`.


## MYSQL : Aggregate Function 
---

Assume we have a product table named `products` with the following structure:

```sql
CREATE TABLE products (
    product_id INT PRIMARY KEY,
    product_name VARCHAR(255),
    category VARCHAR(255),
    price DECIMAL(10, 2),
    quantity INT
);
```

We'll use this table to demonstrate the aggregate functions.

### Easy Math with Aggregate Functions:

#### 1. COUNT() - Counting Products in Each Category

```sql
SELECT category, COUNT(*) as product_count
FROM products
GROUP BY category;
```

In this example, we count the number of products in each category.

#### 2. SUM() - Calculating Total Revenue

```sql
SELECT SUM(price * quantity) as total_revenue
FROM products;
```

Here, we calculate the total revenue by multiplying the price and quantity for each product and then summing up the results.

### Medium Math with Aggregate Functions:

#### 3. AVG() - Finding Average Product Price

```sql
SELECT AVG(price) as average_price
FROM products;
SELECT AVG(rating) AS average_rating FROM product_reviews;
```

We find the average price of all products in the table.

#### 4. MAX() and MIN() - Finding the Most and Least Expensive Products

```sql
SELECT MAX(price) as max_price, MIN(price) as min_price
FROM products;
```

This query identifies the most expensive and least expensive products in the table.

### Complex Math with Aggregate Functions:

#### 5. GROUP_CONCAT() - Listing Products in Each Category

```sql
SELECT category, GROUP_CONCAT(product_name ORDER BY price ASC SEPARATOR ', ') as products_in_category
FROM products
GROUP BY category;
```

This query lists the products in each category, sorted by price, and separated by commas.

#### 6. STDDEV() - Calculating the Standard Deviation of Product Prices

```sql
SELECT STDDEV(price) as price_standard_deviation
FROM products;
```

Here, we calculate the standard deviation of product prices, which measures the dispersion of prices around the mean.

#### 7. Using Aggregate Functions in a JOIN

```sql
SELECT o.customer_id, SUM(p.price * o.quantity) as total_spent
FROM orders o
JOIN products p ON o.product_id = p.product_id
GROUP BY o.customer_id;
```

In this example, we join the `orders` and `products` tables to calculate the total amount spent by each customer on their orders.

### Real-Life Example
```sql
-- Calculate the total revenue for each category of products
SELECT category, 
       COUNT(*) AS num_products,
       AVG(price) AS avg_price,
       SUM(quantity) AS total_quantity,
       SUM(price * quantity) AS total_revenue,
       MIN(price) AS min_price,
       MAX(price) AS max_price
FROM products
GROUP BY category
HAVING total_revenue > 5000;

```
n this example, we calculate various statistics for each product category, including the count of products, average price, total quantity in stock, total revenue, minimum price, and maximum price. We also use the HAVING clause to filter out categories with total revenue less than $5,000.

## MYSQL : All The Constraints QUERY 
---
MySQL is a popular relational database management system that provides various constraints to maintain data integrity and enforce rules on the data stored in tables. Constraints can help solve easy, medium, and hard math problems in real-life scenarios. Below, I'll explain different constraints and provide real-life examples using a product table.

**Constraints in MySQL:**

1. **Primary Key Constraint:**
   - Ensures the uniqueness of a column or a combination of columns.
   - Used to identify each row in a table uniquely.

   ```sql
   CREATE TABLE products (
       product_id INT PRIMARY KEY,
       product_name VARCHAR(255),
       price DECIMAL(10, 2)
   );
   ```

2. **Foreign Key Constraint:**
   - Enforces referential integrity by linking a column to a primary key in another table.
   - Ensures that values in the referencing column match values in the referenced table.

   ```sql
   CREATE TABLE orders (
       order_id INT PRIMARY KEY,
       customer_id INT,
       order_date DATE,
       FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
   );
   ```

3. **Unique Constraint:**
   - Ensures that values in a column are unique across all rows.
   - Unlike primary keys, multiple columns can have unique constraints.

   ```sql
   CREATE TABLE customers (
       customer_id INT PRIMARY KEY,
       email VARCHAR(255) UNIQUE,
       phone_number VARCHAR(15) UNIQUE
   );
   ```

4. **Check Constraint:**
   - Defines conditions that must be met for data to be inserted or updated.
   - Useful for validating data.

   ```sql
   CREATE TABLE employees (
       employee_id INT PRIMARY KEY,
       age INT CHECK (age >= 18),
       salary DECIMAL(10, 2) CHECK (salary >= 0)
   );
   ```

5. **Not Null Constraint:**
   - Ensures that a column cannot have NULL values.
   - Useful for mandatory data fields.

   ```sql
   CREATE TABLE addresses (
       address_id INT PRIMARY KEY,
       street VARCHAR(255) NOT NULL,
       city VARCHAR(100) NOT NULL,
       postal_code VARCHAR(10) NOT NULL
   );
   ```
**6. Hard Problem - Ensuring Data Completeness and Referential Integrity:**

**Constraints: NOT NULL Constraint & CASCADE DELETE**

Ensure that all required fields are filled and maintain referential integrity when deleting records.

```sql
CREATE TABLE categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(255) NOT NULL
);

CREATE TABLE suppliers (
    supplier_id INT AUTO_INCREMENT PRIMARY KEY,
    supplier_name VARCHAR(255) NOT NULL
);

CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) UNIQUE,
    price DECIMAL(10, 2) CHECK (price >= 0) NOT NULL,
    stock_quantity INT CHECK (stock_quantity >= 0) NOT NULL,
    category_id INT NOT NULL,
    supplier_id INT NOT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(category_id) ON DELETE CASCADE,
    FOREIGN KEY (supplier_id) REFERENCES suppliers(supplier_id) ON DELETE CASCADE
);
```
**7. Real-Life Examples:**

Let's consider a product table and demonstrate how these constraints can be used:

```sql
CREATE TABLE categories (
category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(255)
);

CREATE TABLE suppliers (
    supplier_id INT AUTO_INCREMENT PRIMARY KEY,
    supplier_name VARCHAR(255)
);

CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) UNIQUE,
    price DECIMAL(10, 2) CHECK (price >= 0),
    stock_quantity INT CHECK (stock_quantity >= 0),
    category_id INT,
    supplier_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(category_id),
    FOREIGN KEY (supplier_id) REFERENCES suppliers(supplier_id)
);

```

- **Primary Key Constraint**: Ensures each product has a unique ID.

- **Foreign Key Constraint**: Ensures that the `category_id` in the `products` table references a valid `category_id` in the `categories` table.

- **Unique Constraint**: You can add a unique constraint on `product_name` to ensure product names are unique.

- **Check Constraint**: Ensures that the `price` column contains non-negative values.




## MYSQL : QUERY WITH ALTER TABLE Statement 
---
**1. Adding a New Column:**

You can add a new column to an existing table using the `ADD` clause.

```sql
ALTER TABLE table_name
ADD column_name data_type;
```

Example:

```sql
ALTER TABLE employees
ADD birthdate DATE;
```

This adds a new column named `birthdate` of data type `DATE` to the `employees` table.

**2. Modifying an Existing Column:**

You can modify an existing column's data type or properties using the `MODIFY` clause.

```sql
ALTER TABLE table_name
MODIFY column_name new_data_type;
```

Example:

```sql
ALTER TABLE products
MODIFY price DECIMAL(10, 2);
```

This changes the data type of the `price` column in the `products` table to `DECIMAL(10, 2)`.

**3. Renaming a Column:**

You can rename an existing column using the `CHANGE` clause.

```sql
ALTER TABLE table_name
CHANGE old_column_name new_column_name data_type;
```

Example:

```sql
ALTER TABLE customers
CHANGE phone_number contact_number VARCHAR(20);
```

This renames the `phone_number` column in the `customers` table to `contact_number` and changes its data type to `VARCHAR(20)`.

**4. Deleting a Column:**

You can remove an existing column from a table using the `DROP` clause.

```sql
ALTER TABLE table_name
DROP column_name;
```

Example:

```sql
ALTER TABLE orders
DROP order_status;
```

This deletes the `order_status` column from the `orders` table.

**5. Adding a Constraint:**

You can add constraints like `PRIMARY KEY`, `FOREIGN KEY`, `UNIQUE`, or `CHECK` to a table using the `ADD` clause.

Example:

```sql
ALTER TABLE employees
ADD CONSTRAINT pk_employee_id PRIMARY KEY (employee_id);
```

This adds a primary key constraint to the `employee_id` column in the `employees` table.

**6. Removing a Constraint:**

You can remove constraints from a table using the `DROP` clause.

Example:

```sql
ALTER TABLE products
DROP INDEX idx_product_name;
```

This removes an index named `idx_product_name` from the `products` table.

**7. Adding or Removing Default Values:**

You can add or remove default values for columns using the `ALTER TABLE` statement.

Example:

```sql
ALTER TABLE customers
ALTER COLUMN registration_date SET DEFAULT '2023-01-01';
```

This sets a default value for the `registration_date` column in the `customers` table.

**8. Reordering Columns:**

You can change the order of columns in a table using the `MODIFY` clause to specify the desired column position.

Example:

```sql
ALTER TABLE employees
MODIFY first_name VARCHAR(50) AFTER last_name;
```

## MYSQL : QUERY WITH Date Datatype
---
MySQL provides various date data types to handle date and time-related information efficiently. These data types help ensure data accuracy, consistency, and proper storage for date and time values. Here are the commonly used MySQL date data types:

1. **DATE**: Stores a date in the format 'YYYY-MM-DD.' It does not store time information.

2. **TIME**: Stores a time value in the format 'HH:MM:SS.' It does not store date information.

3. **DATETIME**: Stores both date and time information in the format 'YYYY-MM-DD HH:MM:SS.'

4. **TIMESTAMP**: Also stores both date and time information in the format 'YYYY-MM-DD HH:MM:SS.' However, it has a range from 1970-2038 and is stored in UTC.

5. **YEAR**: Stores a year value in 2-digit or 4-digit format (e.g., 'YY' or 'YYYY').

Now, let's create a MySQL table using these date data types and insert some data into it:

```sql
CREATE TABLE events (
    event_id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(255),
    event_date DATE,
    event_time TIME,
    event_datetime DATETIME,
    event_timestamp TIMESTAMP,
    event_year YEAR
);

-- Inserting data into the table:
INSERT INTO events (event_name, event_date, event_time, event_datetime, event_timestamp, event_year)
VALUES
    ('Meeting', '2023-09-17', '15:30:00', '2023-09-17 15:30:00', CURRENT_TIMESTAMP(), 2023),
    ('Birthday Party', '2023-10-05', '18:00:00', '2023-10-05 18:00:00', CURRENT_TIMESTAMP(), 2023),
    ('Conference', '2024-03-20', '09:00:00', '2024-03-20 09:00:00', CURRENT_TIMESTAMP(), 2024);

```
## MYSQL : ALL NUMERIC DATA TYPES
---
MySQL provides various numeric data types to store numeric values with different lengths and precision levels. Here are some commonly used numeric data types in MySQL:

1. **TINYINT**
   - Length: 1 byte
   - Range: -128 to 127 (signed) or 0 to 255 (unsigned)
   - Commonly used for storing small integers or boolean values (0 or 1).

2. **SMALLINT**
   - Length: 2 bytes
   - Range: -32,768 to 32,767 (signed) or 0 to 65,535 (unsigned)
   - Suitable for small to medium-sized integers.

3. **MEDIUMINT**
   - Length: 3 bytes
   - Range: -8,388,608 to 8,388,607 (signed) or 0 to 16,777,215 (unsigned)
   - Used for medium-sized integers.

4. **INT (INTEGER)**
   - Length: 4 bytes
   - Range: -2,147,483,648 to 2,147,483,647 (signed) or 0 to 4,294,967,295 (unsigned)
   - Commonly used for most integer values.

5. **BIGINT**
   - Length: 8 bytes
   - Range: -9,223,372,036,854,775,808 to 9,223,372,036,854,775,807 (signed) or 0 to 18,446,744,073,709,551,615 (unsigned)
   - Used for large integer values.

6. **DECIMAL (also NUMERIC)**
   - Variable length
   - Suitable for fixed-point numbers with a specified precision and scale.
   - Example: `DECIMAL(10, 2)` can store a number with 10 total digits and 2 decimal places.

7. **FLOAT**
   - Length: 4 bytes
   - Range: Approximately -3.4E38 to 3.4E38
   - Used for single-precision floating-point numbers.

8. **DOUBLE (also REAL)**
   - Length: 8 bytes
   - Range: Approximately -1.8E308 to 1.8E308
   - Used for double-precision floating-point numbers.

Now, let's write a query to create a table with all these numeric data types and insert sample data:

```sql
CREATE TABLE numeric_types (
    tinyint_col TINYINT,
    smallint_col SMALLINT,
    mediumint_col MEDIUMINT,
    int_col INT,
    bigint_col BIGINT,
    decimal_col DECIMAL(10, 2),
    float_col FLOAT,
    double_col DOUBLE
);

INSERT INTO numeric_types
VALUES
    (1, 100, 10000, 1000000, 1000000000, 123.45, 123.45, 123.45),
    (-1, -100, -10000, -1000000, -1000000000, -123.45, -123.45, -123.45);
```

This query creates a table named `numeric_types` with columns for each numeric data type and inserts two rows of sample data. You can then perform various SQL operations and queries on this table to work with numeric data in MySQL.


## MYSQL : ALL NUMERIC DATA TYPES
---

1. **CHAR:** Fixed-length character string.
   - Maximum Length: 255 characters.
   - Example: Storing a fixed-length product code.

2. **VARCHAR:** Variable-length character string.
   - Maximum Length: Up to 65,535 bytes (varies with character set).
   - Example: Storing variable-length text data like product names.

3. **TINYTEXT:** Very small variable-length text.
   - Maximum Length: 255 characters.
   - Example: Storing short textual descriptions.

4. **TEXT:** Medium-sized variable-length text.
   - Maximum Length: Up to 65,535 bytes (varies with character set).
   - Example: Storing blog post content.

5. **MEDIUMTEXT:** Medium to large variable-length text.
   - Maximum Length: Up to 16,777,215 bytes (varies with character set).
   - Example: Storing articles or long textual content.

6. **LONGTEXT:** Large variable-length text.
   - Maximum Length: Up to 4,294,967,295 bytes (varies with character set).
   - Example: Storing very long textual data, like books or legal documents.

Now, let's create a sample table with all these string data types and insert data using a single query:

```sql
CREATE TABLE string_data (
    char_col CHAR(10),
    varchar_col VARCHAR(255),
    tinytext_col TINYTEXT,
    text_col TEXT,
    mediumtext_col MEDIUMTEXT,
    longtext_col LONGTEXT
);

INSERT INTO string_data (char_col, varchar_col, tinytext_col, text_col, mediumtext_col, longtext_col)
VALUES 
    ('Fixed', 'Variable', 'Tiny Text', 'Medium Text', 'Medium to Large Text', 'Very Large Text');
```

In this example, we've created a table called `string_data` with columns representing each of the MySQL string data types. We've then inserted data into these columns in a single query. The data lengths match the respective maximum lengths for each data type.

Please note that the actual maximum length of a VARCHAR or TEXT column may be affected by factors like character set and storage engine settings. It's essential to choose the appropriate data type based on your specific use case and data requirements.


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
