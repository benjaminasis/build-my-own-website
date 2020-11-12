# HOW TO BUILD A WEBSITE
You can check my website: [asisexpressonline.com](https://asisexpressonline.com "Asis Express Online")

Here are the step-by-step procedure on how I built my own website:
### 1. Got a domain name
   * For this one, I bought a domain from godadday worth PHP259
### 2. Got a web hosting
* Since I have existing AWS free-tier account, I used it for my web hosting 
### 3. Created an EC2 instance in AWS and chose ubuntu
### 4. Connected to the instance using SSH or Instance Connect
### 5. Once connected, I've installed LAMP (Linux, Apache, MySQL, PHP) stack. 

* Since I already using Linux, I just need to ensure that my OS was updated by running this command: <br/>
    `sudo apt update -y`
* Then installed apache <br/>
    `sudo apt install apache2 -y`
* Installed Mariadb (open-source version of MySQL) <br/>
    `sudo apt install mariadb-server mariadb-client`
* Configured Mariadb database <br/>
    * First, I've started the service of mariadb <br/>
        `sudo systemctl start mariadb`
    * Checked status <br/>
        `sudo systemctl status mariadb`
    * Configured the database <br/>
        * `sudo mysql_secure_installation`
          <br> It prompted the following: <br/>
          > "Enter current password for root (enter for none):" just press enter <br/>
          > "Set root password? [y/n]" just enter **y** and enter new password <br/>
          > "Remove anonymous users? [y/n]" just enter **y** <br/>
          > "Disallow root login remoterly? [y/n]" just enter **y** <br/>
          > "Remove test database and access to it? [y/n]" just enter **y** <br/>
          > "Reload privilege tables now? [y/n]" just enter **y** <br/>
* Installed PHP <br/>
      `sudo apt install php`
### 6. Downloaded WordPress
* First, I've installed wget<br/>
     `sudo apt install wget -y`
* Open up Google chrome and went to wordpress.org/download/ and right click on "Download WordPress 5.5.x" and selected copy link address
* Went back to CLI and ran this command:<br/>
     `wget <paste link adrress here>`
* Checked if file was downloaded. The file is named "latest.zip" <br/>
      `ls`
* Since the file is .zip, needed to unzip it. 
    * Downloaded unzip<br/>
            `sudo apt install unzip -y`
    * Then unzip the file<br/>
            `unzip  latest.zip`
    * Checked the files<br/>
            `ls`
    * Copied the files to **/var/www/html** <br/>
        `sudo cp -r * /var/www/html`
    * Went to html directory<br/>
        `cd /var/www/html`
    * Removed index.html<br/>
        `sudo rm -rf index.html`
### 7. Installed PHP modules to integrate PHP to database
  `sudo apt install php-mysql php-cgi php-cli php-gd -y` 
### 8. Restarted apache
  `sudo systemctl restart apache2`
### 9. Changed ownership of files under /var/www/
  `sudo chown -R www-data:www-data /var/www/`
### 10. Installed Wordpress
* I've copied the Public ip address of EC2 instance and went to google chrome or any web brower and pasted it in the address bar and entered. I was directed to wordpress installation page
* Select language and click **continue**. In the next page, I've clicked **Let's go**.
* Went back to CLI to create a database name and user
    * `sudo mysql -u root -p` then entered my password I've configured on step 5
    * `create database wordpress;`
    * `create user "wordpress"@"%" identified by "password"`
    * `grant all privileges on wordpress.* to "wordpress"@"%"`
* Went back to chrome and enter the following 
> Database name = wordpress <br/>
> Username = wordpress <br/>
> Password = password <br/>
> Database host = local host <br/>
> Table Prefix = wp_<br/>
* Then hit **submit**
* Click **Run installation**
* Fill-in the information needed and hit **Install Wordpress**
* Done WordPress installed succesfully!
### 11. Mapped IP address to Domain Name
* Went to AWS Web Console and open Route 53
* Selected Hosted Zones and clicked **Created Hosted Zone**
* Entered my domain name (i.e. **asisxpressionline.com<span>**) and hit **Create**
* Went to Hosted Zones and Selected my Domain name
* Clicked **Create Record Set**
* I did not put anything in Name and ensure Type is *A - IPv4 address*
* Under Value, I've put my Public IP address of my EC2 instance

### 12. Installed Elementor Plug-in in WordPress
I've installed Elementor plug-in as my editor in wordpress. I've selected a template and start working on the details of the website. I've watched series of videos to get a hang of *Elementor*.
### 13. Installed SSL certificate
Since my website was using unsecure HTTP, I've installed SSL certificate so all traffic are secured and encrypted and must use HTTPS protocol.<br/> 
Here's what I did:
1. Open certbot.eff.org *(note: certbot.eff.<snap>org is a website which issues free SSL certificate)* and selected **Apache** on Software and **Ubuntu 20.04** on System. Then I followed the instuctions indicated.
1. SSH to my EC2 instance
1. Installed **snapd** <br/>
`sudo install snapd`
1. Ensured that my version is up-to-date<br/>
`sudo snap install core: sudo snap refresh core`
1. Installed Certbot<br/>
`sudo snap install --classic certbot`
1. Ensured that Certbot commands were executed<br/>
`sudo ln -s /snap/bin/certbot /usr/bin/certbot`
1. Installed my SSL certificated<br/>
`sudo certbot --apache` <br/>
I've visited my website to validate SSL. It showed **ht<span>tps://asisexpressonline.com** and there was padlock sign. It means SSL was successfully installed. 
---
---
## Issues encountered and solutions
There were 2 issues encountered when I created and deployed my website. Here are those:
## 1. Website redirected to old web link
Since I am only using AWS Free-tier account, I stop my EC2 instance whenever I am not using it to avoid incurring additional charges and save EC2 instance duration. <br/>
However, when I restarted my EC2 instace and map my new IP address to my domain name in Route 53, I got an error **site cannot be reached** when  I visited my page. <br/>
I found out that I was being redirected to my old website link. To fix this, I did the following
*   Connect to EC2 instance, then open wp-config.php file and added the following
> define('WP_HOME','htt<span>ps://asisexpressonline.com'); <br/>
define('WP_SITEURL','ht<span>tps://asisexperssonline.com');
* Save the file and restart Apache and that fixed the issue<br/>
`sudo systemctl restart apache`

## 2. Unsecure site even SSL was installed successfully
I noticed that the padlock sign in the address bar was not showing and **inspect element** in website showed there were unsecure (http) links in my site. <br/>
The cause of this was some **plug-in** (cannot remember what plug-in it was)that I installed on my wordpress. What I did is I removed that plug-in and it fixed the issue.
