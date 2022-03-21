# Laravel Passport Oauth Server 


Development steps:


Setting up 
http://laravel-passport-server.test/
in Apache

Using config:

```
<VirtualHost 127.0.0.2:80>
	DocumentRoot "C:/Laravel/Laravel Passport OAuth server and client 03.2022/laravel9-passport-server/public"
	ServerName laravel-passport-server.test
	DirectoryIndex index.php
	ErrorLog "C:/Laravel/Laravel Passport OAuth server and client 03.2022/laravel9-passport-server/apache-error.log"	
    CustomLog "C:/Laravel/Laravel Passport OAuth server and client 03.2022/laravel9-passport-server/access.log" common	
	<Directory "C:/Laravel/Laravel Passport OAuth server and client 03.2022/laravel9-passport-server/public">
		Options Indexes FollowSymLinks MultiViews
		AllowOverride all
		Order Deny,Allow
		Allow from all
		Require all granted
	</Directory>
</VirtualHost>
```

in ```C:\xampp\apache\conf\extra```

and ```Windows host``` file.

- Adding auth scaffolding with Laravel/UI
- Creating view model, migrations, controllers and seeders for Posts

-


