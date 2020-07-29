
# Basic User managent system
##Specification
1. There should be two roles (Admin, Users)
2. Admin and users should be able to login to the system using email and password if their
status is active
3. Users can register in the system with 
    i)Name
    ii)Email (Unique)
    iii)Password
    iv)Confirm Password
    v) Address
4. Admin can view the registered user and give access to the system
5. After login users can edit their profile and can upload image
6. Admin can login to the system view the user listing (User listing needs pagination).
7. Admin can activate or deactivate users.

## Installation

Download dependencies
```
composer install
```
Running Migrations
```
php artisan migrate
```
Running Seeders
```
php artisan db:seed

This will create an admin user
username: admin@gmail.com
password: password
```
## 💻 Developer
Haneeshnadh <haneeshnaadh@gmail.com>
