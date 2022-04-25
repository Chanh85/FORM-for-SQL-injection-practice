injection code for hacking :  ' or '1' = '1   ,copy this to password section

Note: some of the codes that are commented in "authController.php" are the codes that can avoid SQL Injection attack.
You can remove all the comment marks "/**/ ; //" to see the difference, after that, comment the lines 
from 109 to 117 because these lines are the one that can not avoid the attack. Also, make sure to 
comment the line 88. Further instructions are presented in the demo video.

In order to run, you must create a database named "user_verfication". The database contains only a table named "users".
In the table, you will have to create the following fields: id(INT), username(VARCHAR), email(VARCHAR), password(VARCHAR).
The "id" field is an auto increment field, and also is a primary key with the length of 11. "username" and "password" has the length
of 100, or you can leave it a different length but must be greater than 5. "email" must be unique and it may have different length
depending on your needs.


