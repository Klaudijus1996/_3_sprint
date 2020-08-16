# 3.nd Sprint project :: 
#### CMS
To test mini CMS please open your MySQL workbench, make a connection for:<br>
username: root<br>
password: mysql
### Admin login: 
username: admin<br>
password: password<br>
Create a new database called cms and add some data:
```sql
CREATE DATABASE cms;
	CREATE TABLE cms.pages (
        page_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        page_title varchar(255),
        page_content LONGTEXT
        );
	CREATE TABLE cms.users (
        user_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
        username varchar(255),
        userpassword varchar(255)
        );
		INSERT INTO cms.pages VALUES (1,'Home','This is Home page!'),
		(2,'News','This is News page!'),
		(3,'Contact Us','This is Contact Us page!'),
		(4,'About Us','This is About Us page!'),
		(5,'Services','This is Services page!');
		INSERT INTO cms.users VALUES (1,'admin','password');
```
You might need to execute a few lines in GIT bash (also might need to edit composer.json file to edit your directory).<br>
Open GIT Bash in project directory and paste this line -> vendor/bin/doctrine orm:schema-tool:update --force --dump-sql<br>
If succeslful execute the following -> php composer.phar dump-autoload<br>

