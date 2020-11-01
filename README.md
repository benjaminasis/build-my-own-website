# HOW TO BUILD A WEBSITE
You can check with website: [asisexpressonline.com](https://asisexpressonline.com "Asis Express Online")

Here are the step-by-step procedure when I built my own website:
### 1. Get a domain name
   * For this one, I bought a domain from godadday worth PHP259
### 2. Get a web hosting
* Since I have existing AWS free-tier account, I used it for my web hosting 
### 3. Create an EC2 instance in AWS and choose ubuntu
### 4. Connect to the instance using SSH or Instance Connect
### 5. Once connected, install LAMP (Linux, Apache, MySQL, PHP) stack. 

* Since I already using Linux, I just need to ensure the OS was updated by running this command: <br/>
    `sudo apt update -y`
* Then install apache <br/>
    `sudo apt install apache2 -y`
* Install Mariadb (open-source version of MySQL) <br/>
    `sudo apt install mariadb-server mariadb-client`
* Configure Mariadb database <br/>
    * First, start the service of mariadb <br/>
        `sudo systemctl start mariadb`
    * Check status <br/>
        `sudo systemctl status mariadb`
    * Configure database <br/>
        * `sudo mysql_secure_installation`
          <br> It will prompt the following: <br/>
          > "Enter current password for root (enter for none):" just press enter <br/>
          > "Set root password? [y/n]" just enter **y** and enter new password <br/>
          > "Remove anonymous users? [y/n]" just enter **y** <br/>
          > "Disallow root login remoterly? [y/n]" just enter **y** <br/>
          > "Remove test database and access to it? [y/n]" just enter **y** <br/>
          > "Reload privilege tables now? [y/n]" just enter **y** <br/>
          b. **DONE**
* Install PHP <br/>
      `sudo apt install php`
### 6. Download WordPress
* First, install wget<br/>
     `sudo apt install wget -y`
* Open Google chrome and go to wordpress.org/download/ and right click on "Download WordPress 5.5.x" and select copy link address
* Go to back to CLI and run this command:<br/>
     `wget <paste link adrress here>`
* Check if file was downloaded. The file is named "latest.zip" <br/>
      `ls`
* Since the file is .zip, need to unzip it. 
    * Download unzip<br/>
            `sudo apt install unzip -y`
    * Then unzip the file<br/>
            `unzip  latest.zip`
    * Check the files<br/>
            `ls`
    * Copy the files to **/var/www/html** <br/>
        `sudo cp -r * /var/www/html`
    * Go to html directory<br/>
        `cd /var/www/html`
    * Remove index.html<br/>
        `sudo rm -rf index.html`
### 7. Install PHP modules to integrate PHP to database
  `sudo apt install php-mysql php-cgi php-cli php-gd -y` 
### 8. Restart apache
  `sudo systemctl restart apache2`
### 9. Change ownership of files under /var/www/
  `sudo chown -R www-data:www-data /var/www/`
### 10. Install Wordpress
* copy the Public ip address of EC2 instance and go to google chrome or any web brower and paste it in the address bar and enter. You will be directed to wordpress installation page
* Select language and click continue. In the next page, click **Let's go**.
* Go back to CLI to create a database name and user
    * `sudo mysql -u root -p` then enter your password you've configured on step 5
    * `create database wordpress;`
    * `create user "wordpress"@"%" identied by "password"`
    * `grant all privileges on wordpress.* to "wordpress"@"%"`
* Go back to chrome and enter the following then hit **submit**
> Database name = wordpress <br/>
> Username = wordpress <br/>
> Password = password <br/>
> Database host = local host <br/>
> Table Prefix = wp_<br/>
* Click **Run installation**
* Fill-in the information needed and hit **Install Wordpress**
* Done WordPress installed succesfully
### 11. Map IP address to Domain Name
* Go to AWS and open Route 53
* Select Hosted Zones and click **Created Hosted Zone**
* Enter your domain name (e.g. asisxpressionline.com) and hit **Create**
* Go to Hosted Zones and Select your Domain name
* Click **Create Record Set**
* Do not put anything in Name and ensure Type is *A - IPv4 address*
* Under Value, put your Public IP address of your EC2 instance
