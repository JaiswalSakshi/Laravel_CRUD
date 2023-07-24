## Project Overview

- create new project 
- setup db configuration 
- integrate jquery, botstrap [latest version] 
- create layout

## step 2

1. Categories - CRUD - [DBTableFields - id, title, created_at, updated_at]

2. Products - CRUD -  [DBTableFields - id, category_id, name, price, image, description, sku, manufactured_date, expiry_date, created_at, updated_at]

3. [User - Role] [Many to Many relationship]
[Roles - DBTableFields - id, title, created_at, updated_at]
[Users - DBTableFields - id, name, email, username, password, avatar, birthdate, address, gender, hobbies, created_at, updated_at]
[role_user - pivot table - user_id, role_id]

<hr>

## Points

- Registration Form - [/register]
form field list - name, email, password, confirm password 

- Login [/login] 
form field list - email/username, password

- Update User Profile [/user/{id}]
form field list - name, email, password, avatar, birthdate, address, gender, hobbies

- User Management [CRUD]

- Role Management [CRUD]

<hr>

## Notes:

1. One category can have one or more products 
2. User can not delete the category - which have any products available 
3. If user not logged in then all module should redirect to login page. 
4. Role can not be deleted having any user available