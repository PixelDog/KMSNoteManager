KMSNoteManager is a simple note making application built in PHP and using an MVC approach.
Users must be authenticated to view and/or add their notes. There is also a curl service 
where you can request notes in JSON format from any user id, without authentication.

-------------------------------------------------------------------
RECOMMENDED
-------------------------------------------------------------------
PHP ^7.3.3

-------------------------------------------------------------------
SETUP
-------------------------------------------------------------------
1) Clone the repo to your host.

2) Edit Config/_config.php with the appropriate values for your environment.
   Values are as follows:
   
   // host
   
   define('HOST', 'localhost');

   // database user
   
   define('DBUSER', 'root');

   // database password
   
   define('DBPW', 'root99');

   // database name
   
   define('DB', 'kms_notes');

   // app path info
   
   define('APP_PATH', 'http://localhost:8080/KMSNotes/');
   
   Note: If you decide to change the database name, you must also change it in:
   Config/kms_notes.sql, lines 21-26:
   
   -- Database: `kms_notes`
   --

   CREATE DATABASE kms_notes; -- change this here

   use kms_notes; -- change this here
   
3) In the Config folder, from the terminal, run:
   php installDB.php
   
   And there you go! You have a database set up with sample content.


-------------------------------------------------------------------
TESTING / USAGE: 
-------------------------------------------------------------------

From your browser, you can now visit the app. For instance, my location
for the home page is:

http://localhost:8080/KMSNotes/

That will require you to log in using basic http authentication. With the sample
DB installed, the user is:


User Name: joe_cool@cool.com

Password: SoCool

From there, you can see Joe Cool's notes, and add a new note.

If you want to see a JSON output of Joe Cool's notes from the curl service, you can from the browser run
something like: http://localhost:8080/KMSNotes/curl/json?userId=1

Again, it depends on your APP_PATH which is set in Config/_config.php

-------------------------------------------------------------------
@TODO'S: 
-------------------------------------------------------------------
1) Need to add a delete method for notes.
2) Need to add an update method for notes.
3) Add a registration form.
4) Better documentation and doc blocks with return types, etc.
5) p.s. Tha Javascript is ES6, and it is not transpiled, so you will want to use a moder browser to test.

