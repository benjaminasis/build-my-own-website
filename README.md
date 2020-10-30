# build-my-own-website
you can check with website: [asisexpressonline.com](https://asisexpressonline.com "Asis Express Online")
Here are the step-by-step procedure when I built my own website:
1. Get a domain name
   for this one, I bought a domain from godadday worth PHP259
2. Get a web hosting
    since I have existing free-tier account on AWS, I used it for my web hosting.
3. Create an EC2 instance in AWS and choose ubuntu
4. Connect to the instance using SSH or Instance Connect
5. Once connected, install LAMP (Linux, Apache, MySQL, PHP) stack.
    A. Since I already using Linux, I just need to ensure the OS was updated by running this command:
    `sudo apt update -y`
    B. Then install apache
    `sudo apt install apache2 -y`
    C. Install Mariadb (open-source version of MySQL)
    `sudo apt install mariadb-server mariadb-client`
    D. Configure Mariadb database
        1. First, start the service of mariadb
        `sudo systemctl start mariadb`
        2. Check status
        `sudo systemctl status mariadb`
        3. configure database
          a. `sudo mysql_secure_installation`
          it will prompt the following:
          >"Enter current password for root (enter for none):" just press enter
          >"Set root password? [y/n]" just enter y and enter new password
          >"Remove anonymous users? [y/n]" just enter y
          >"Disallow root login remoterly? [y/n]" just enter y
          >"Remove test database and access to it? [y/n]" just enter y
          >"Reload privilege tables now? [y/n]" just enter y
          b. **DONE**
     E. Install PHP
      `sudo apt install php`
  6. Download WordPress
     a. First, install wget
     `sudo apt install wget -y`
     b. Open Google chrome and go to wordpress.org/download/ and right click on "Download WordPress 5.5.x" and select copy link address
     c. Go to back to CLI and run this command:
     `wget <paste link adrress here>`
     d. check if file was downloaded. The file is named "latest.zip"
      `ls`
     e. Since the file is .zip, need to unzip it. 
          1. download unzip
            `sudo apt install unzip -y`
          2. then unzip the file
            `unzip  latest.zip`
          3. check the files
            `ls`
      f. copy the files to **/var/www/html**
        `sudo cp -r * /var/www/html`
      g. go to html directory
        `cd /var/www/html`
       h. remove index.html
        `sudo rm -rf index.html`
  7. Install PHP modules to integrate PHP to database
  `sudo apt install php-mysql php-cgi php-cli php-gd -y` 
  8. Restart apache
  `sudo systemctl restart apache2`
  9. Change ownership of files under /var/www/
  `sudo chown -R www-data:www-data /var/www/`
  
  
  
  
  
     
     
  
        
        
        
   
