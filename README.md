# to-do-app
This is a To do app made using mysql and php. You can add, edit, delete and view your goals with this app. For frontend I used HTML, CSS and for backend I used PHP and MySQL database.

I included some pictures for reference.


How to open the website:
To host this I used local server XAMPP. I'm not sure about the results if you are using different methods, but if you are using XAMPP than you need to unzip file named "todo-app.zip" and drop it inside of htdocs which is inside of the folder XAMPP. 
Then inside of XAMPP control panel you will need to start Apache and MySQL. 
Then you can go in your browser and type localhost/phpmyadmin. Then create a new database with a name: "todo". 
Inside of "todo" database import: "todo.sql.gz". After that you will need to type localhost/todo-app/public
I hope that these steps help and you will enjoy my website.


There are three pages in this website:
In the main page you can read your tasks and see how long ago they were created. From here you can go to the "edit" and add "new page".
In the edit page you can edit existing tasks and also delete them.
In the add new page you can create new tasks. 
I also included some safety features that should prevent SQL injection and XSS.
