

# 3rd Year Web Development Project [NIT Durgapur] 

## Overview:

A **Student-Admin portal system** wherein student can request for registration with the portal and administrator can review (accept / reject ) his/her request. On acceptance of a request, a student can modify additional details like hobbies,address,phone number etc, anytime as per his/her wish.Student can upload his favorite image as a profile picture and can modify it anytime.

​	Admin has the right to accept/reject a student's request anytime and can inspect students' profile completely but cannot change any details or see their passwords.

## Its Live:

**You can check the site anytime because it is UP and RUNNING just click the link below:**

**http://sayanpandey.000webhostapp.com/classProject **

*To Register yourself follow the instructions:* 

​	**1. Submit a registration request from the Students' portal.**

​	**2. Visit Administrators' Portal; Use *'admin'* as USERNAME and *'admin'* as PASSWORD. **

​	**3.Find your request and click 'Accept'.**

​	**4.Use Students' portal to update/modify your profile details.**

## Languages Used :

The site is built completely from scratch, with no use of templates or bootstrap.The site uses:

* **HTML5**
* **CSS3**
* **JQuery/JavaScript**
* **PHP**
* **MySQL**

There is extensive implementation of **AJAX** and **PRG** and this site is **impervious** to **SQL Injections and Cross Site Scripting (XSS).**

##Database Structure

The MySQL database *classProject* contains three tables namely:

* **admin** : Consists of details of administrators mainly ***username*** and ***password***.
* **students** : Consists of basic ***Registration Request*** Details like ***registration number,roll number*** etc.
* **extradetail** : Consists of all other details that student wishes to add like ***hobbies,Address,Achievements*** etc.

####A sample database is available in *'extras'* folder namely *'classProject.sql'*.

##Screens:

### Index Page:

![Index Image](/extras/index.PNG)

### Students' Portal:

###### Home

![Students' Portal](/extras/student.png)

######Profile

![Profile](/extras/profile.PNG)

###Administrator's Portal

###### Home

![Administrator's Portal](/extras/admin.PNG)

###### Requests

![requests](/extras/request.PNG)









