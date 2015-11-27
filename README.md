## Tipsy Blog Example

You will need MySQL and Apache/Nginx installed for this example.

#### Deploying on Heroku

The **Procfile** contains what you need to switch between Apache or Nginx. Nginx is set by default.

[![Deploy to Heroku](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy)


#### Deploying on your own environment

1. Edit your **config/db.ini** file with your user, host, and database.
2. Open **install/db.sql** and load that data into your database.
3. Copy this directory somewhere so **www** is readable by apache/nginx.
4. Open the **web** directory in your browser.


See [Tipsy Documentation](https://github.com/arzynik/Tipsy/wiki) for more information.
