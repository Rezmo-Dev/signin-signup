## Signin & Signup:
> This is my school project 🦖.<br/>This project has a registration and login page, both of which are connected to the database.

## Perview:
##### Signin
![signin picture](https://github.com/Rezmo-Dev/signin-signup/blob/main/screenshots/signin.png)
##### Signup
![signin picture](https://github.com/Rezmo-Dev/signin-signup/blob/main/screenshots/signup.png)

## How to use:
1. Install the webserver
2. Create the database with name `shop_db`

```mysql
CREATE DATABASE `shop_db`
```
4. Create the `user` tabel

```mysql
CREATE TABLE `shop_db`.`user`
(`user_fullname` VARCHAR(20) NOT NULL ,
 `user_name` INT NOT NULL ,
 `user_code` INT NOT NULL ,
 `user_password` INT NOT NULL ,
 `user_email` INT NOT NULL ,
 `user_address` INT NOT NULL ,
 PRIMARY KEY (`user_name`)) ENGINE = MyISAM;
```
5. And open the project and insert the user information in the database
--- 
