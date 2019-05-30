# Oglasavanje
This is PHP project that I created through learning. \
Published at https://aleksadj.000webhostapp.com/ . 
## Installation
Configure database parameters in *application/config/database.php*  
``` 
'hostname' => 'localhost',
'username' => 'root',
'password' => '',
'database' => 'oglasavanje',
'dbdriver' => 'mysqli',
``` 
Enter base_url in *application/config/config.php* 
``` 
$config['base_url'] = '' 
``` 
**To use Facebook/Google login functionality:** \
Enter your facebook_app_id and facebook_app_secret in *application/config/facebook.php*, 
``` 
$config[facebook_app_id] = '' 
$config[facebook_app_secret] = ''
``` 
Enter your client_id and client_secret in *application/config/google.php* . 
``` 
$config['client_id'] = '' 
$config['client_secret'] = ''
``` 
**To use Mail functionality** \
Enter your credentials in *application/controllers/Mail.php*
```  
$mail->Username = '........'
$mail->Password = '........'
$mail->addAddress = '......'
```
## Author
Aleksa Djuric \
aleksadjuric23@gmail.com
