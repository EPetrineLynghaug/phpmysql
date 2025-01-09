# Lecture Notes: PHP and MySQL

PHP emerged in 1995, around the same time as JavaScript. While they approached programming differently, they shared the same vision of solving web development challenges. Over the years, various frameworks and languages like ColdFusion, .NET, Django, Ruby on Rails, Flask, Angular, and Next.js have come and gone. Yet, PHP remains a vital part of web development. Its simplicity makes it widely used, though it also leads to a significant amount of unsafe and poorly written code.

## PHP and MySQL: Overview
<details> <summary><strong>Click to read more</strong></summary>

PHP integrates seamlessly with MySQL, making it a preferred choice for dynamic, database-driven applications. Using phpMyAdmin, you can create tables, define relationships, and manage data efficiently.

    Database Structure:
        Define strongly typed columns.
        Use VARCHAR for text fields, setting a maximum length (e.g., 255).
        Enable AUTO_INCREMENT (A_I) for primary keys.
        Allow NULL for optional fields.

Example Table: customers

```sql 
CREATE TABLE `customers` (
    CustomerId INT NOT NULL AUTO_INCREMENT,
    FirstName VARCHAR(255) NOT NULL,
    LastName VARCHAR(255),
    Address TEXT,
    Zip VARCHAR(10),
    City VARCHAR(100),
    PRIMARY KEY (CustomerId)
);
```
You can preview SQL in phpMyAdmin to ensure the table structure is correct.
</details>

## Inserting Data
<details> <summary><strong>Click to read more</strong></summary>

Insert data into the database using SQL:
```sql 
INSERT INTO `customers` (LastName, FirstName, Address, Zip, City)
VALUES ('Olsen', 'Ole', 'Oppveien 12', '1234', 'Stedet');
```
* Auto-Incremented ID: CustomerId is automatically generated.
* Use forms in PHP to dynamically insert data:

```php 
$firstName = htmlspecialchars(trim($_POST['FirstName']));
$sql = "INSERT INTO customers (FirstName) VALUES ('$firstName')";
$conn->query($sql);
```
</details>

GPT Icon
Lecture Notes: PHP and MySQL

PHP emerged in 1995, around the same time as JavaScript. While they approached programming differently, they shared the same vision of solving web development challenges. Over the years, various frameworks and languages like ColdFusion, .NET, Django, Ruby on Rails, Flask, Angular, and Next.js have come and gone. Yet, PHP remains a vital part of web development. Its simplicity makes it widely used, though it also leads to a significant amount of unsafe and poorly written code.
PHP and MySQL: Overview
<details> <summary><strong>Click to read more</strong></summary>

PHP integrates seamlessly with MySQL, making it a preferred choice for dynamic, database-driven applications. Using phpMyAdmin, you can create tables, define relationships, and manage data efficiently.

    Database Structure:
        Define strongly typed columns.
        Use VARCHAR for text fields, setting a maximum length (e.g., 255).
        Enable AUTO_INCREMENT (A_I) for primary keys.
        Allow NULL for optional fields.

Example Table: customers

CREATE TABLE `customers` (
    CustomerId INT NOT NULL AUTO_INCREMENT,
    FirstName VARCHAR(255) NOT NULL,
    LastName VARCHAR(255),
    Address TEXT,
    Zip VARCHAR(10),
    City VARCHAR(100),
    PRIMARY KEY (CustomerId)
);

You can preview SQL in phpMyAdmin to ensure the table structure is correct.
</details>

## Inserting Data
<details> <summary><strong>Click to read more</strong></summary>

Insert data into the database using SQL:

```sql
INSERT INTO `customers` (LastName, FirstName, Address, Zip, City)
VALUES ('Olsen', 'Ole', 'Oppveien 12', '1234', 'Stedet');
```
* Auto-Incremented ID: CustomerId is automatically generated.
*  Use forms in PHP to dynamically insert data:

```php
$firstName = htmlspecialchars(trim($_POST['FirstName']));
$sql = "INSERT INTO customers (FirstName) VALUES ('$firstName')";
$conn->query($sql);
```

</details>

## Querying Data
<details> <summary><strong>Click to read more</strong></summary>

Retrieve specific data using SQL queries:

```sql
SELECT * FROM `customers` WHERE FirstName = 'Ole';
SELECT * FROM `customers` WHERE CustomerId = 7;
SELECT * FROM `customers` WHERE Zip BETWEEN 5000 AND 5999;
```
* Pattern Matching:
```sql
SELECT * FROM `customers` WHERE LastName LIKE '%sen';
```

Use % for partial matches, e.g., all last names ending in sen.

* Combine with ORDER BY for sorting:
```sql
SELECT * FROM customers ORDER BY LastName ASC;
```
</details>

## Updating Data
<details> <summary><strong>Click to read more</strong></summary>

Update existing records in the database:
```sql
UPDATE `customers`
SET FirstName = "Lars Erik"
WHERE CustomerId = 3;
```

* Update multiple fields at once:
```sql
UPDATE `customers`
SET FirstName = "Lars", LastName = "Eriksen"
WHERE CustomerId = 3;
```
</details>

GPT Icon
Lecture Notes: PHP and MySQL

PHP emerged in 1995, around the same time as JavaScript. While they approached programming differently, they shared the same vision of solving web development challenges. Over the years, various frameworks and languages like ColdFusion, .NET, Django, Ruby on Rails, Flask, Angular, and Next.js have come and gone. Yet, PHP remains a vital part of web development. Its simplicity makes it widely used, though it also leads to a significant amount of unsafe and poorly written code.
PHP and MySQL: Overview
<details> <summary><strong>Click to read more</strong></summary>

PHP integrates seamlessly with MySQL, making it a preferred choice for dynamic, database-driven applications. Using phpMyAdmin, you can create tables, define relationships, and manage data efficiently.

Database Structure:
        Define strongly typed columns.
        Use VARCHAR for text fields, setting a maximum length (e.g., 255).
        Enable AUTO_INCREMENT (A_I) for primary keys.
        Allow NULL for optional fields.

Example Table: customers

CREATE TABLE `customers` (
    CustomerId INT NOT NULL AUTO_INCREMENT,
    FirstName VARCHAR(255) NOT NULL,
    LastName VARCHAR(255),
    Address TEXT,
    Zip VARCHAR(10),
    City VARCHAR(100),
    PRIMARY KEY (CustomerId)
);

You can preview SQL in phpMyAdmin to ensure the table structure is correct.
</details>
Inserting Data
<details> <summary><strong>Click to read more</strong></summary>

Insert data into the database using SQL:

INSERT INTO `customers` (LastName, FirstName, Address, Zip, City)
VALUES ('Olsen', 'Ole', 'Oppveien 12', '1234', 'Stedet');

    Auto-Incremented ID: CustomerId is automatically generated.
    Use forms in PHP to dynamically insert data:

$firstName = htmlspecialchars(trim($_POST['FirstName']));
$sql = "INSERT INTO customers (FirstName) VALUES ('$firstName')";
$conn->query($sql);

</details>
Querying Data
<details> <summary><strong>Click to read more</strong></summary>

Retrieve specific data using SQL queries:

SELECT * FROM `customers` WHERE FirstName = 'Ole';
SELECT * FROM `customers` WHERE CustomerId = 7;
SELECT * FROM `customers` WHERE Zip BETWEEN 5000 AND 5999;

    Pattern Matching:

SELECT * FROM `customers` WHERE LastName LIKE '%sen';

Use % for partial matches, e.g., all last names ending in sen.
Combine with ORDER BY for sorting:

    SELECT * FROM customers ORDER BY LastName ASC;

</details>
Updating Data
<details> <summary><strong>Click to read more</strong></summary>

Update existing records in the database:

UPDATE `customers`
SET FirstName = "Lars Erik"
WHERE CustomerId = 3;

    Update multiple fields at once:

    UPDATE `customers`
    SET FirstName = "Lars", LastName = "Eriksen"
    WHERE CustomerId = 3;

</details>

## Relationships and Joins
<details> <summary><strong>Click to read more</strong></summary>

Define relationships between tables. For example:

```sql
CREATE TABLE `orders` (
    OrderId INT NOT NULL AUTO_INCREMENT,
    CustomerId INT,
    OrderDate DATE,
    PRIMARY KEY (OrderId),
    FOREIGN KEY (CustomerId) REFERENCES customers(CustomerId)
);
```
Fetch related data using JOIN:
```sql
SELECT orders.OrderId, customers.FirstName, customers.LastName
FROM orders
INNER JOIN customers ON orders.CustomerId = customers.CustomerId;
```
Types of Joins:

* INNER JOIN: Fetch matching rows from both tables.
* LEFT JOIN: Include all rows from the left table, even without matches.
* RIGHT JOIN: Include all rows from the right table.
* CROSS JOIN: Combine every row from one table with every row from another.

</details>

## Debugging and Output
<details> <summary><strong>Click to read more</strong></summary>

* Use PHP debugging tools to troubleshoot database queries:
```php 
    var_dump(): Displays variable types and values.
    print_r(): Outputs human-readable information about arrays and objects.
```
If a query returns no results, troubleshoot with:
```php 

$sql = "SELECT * FROM customers WHERE CustomerId = 12";
$result = $conn->query($sql);
if ($result->num_rows === 0) {
    echo "No customer with ID 12.";
}
```
</details>

## Security Best Practices
<details> <summary><strong>Click to read more</strong></summary>

1. Sanitize Input: Prevent harmful inputs using htmlspecialchars() and trim():
```php 
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$firstName = sanitize($_POST['FirstName']);
```
2. Use Prepared Statements: Prevent SQL injection:
```php
$stmt = $conn->prepare("SELECT * FROM customers WHERE FirstName = ?");
$stmt->bind_param("s", $firstName);
$stmt->execute();
```
</details>

Conclusion
<details> <summary><strong>Click to read more</strong></summary>

PHP remains a powerful and versatile tool for building web applications. Combined with MySQL, it provides a robust platform for dynamic, data-driven websites. Mastering SQL queries, understanding relationships, and implementing security best practices are essential skills for any developer working with PHP and MySQL.
</details>