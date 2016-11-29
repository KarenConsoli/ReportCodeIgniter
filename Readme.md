README FILE METGE REPORTING SYSTEM

What Is This?
-------------

This Web Page is intended to provide a pathology lab reporting system.  
The Web Page strive to be simple, well documented and modification friendly, in order
to help evaluators quickly look to my work.

These tasks are meant to show you about my code-level development for PHP Software Engineer.
The template used is: "Metge a Medical Category Flat Bootstrap Responsive Web Template" (https://w3layouts.com/metge-a-medical-category-flat-bootstrap-responsive-web-template/)
Was downloaded from https://w3layouts.com/.


Functions
-----------------------
.Operator users should be able to log in to the system 
.Patients cannot access these pages.
.Reports CRUD (Multiple tests and results in each report)
.Patients CRUD (including pass code)Lab sends a text message to the patient with a pass code to log in (out of scope). 
.Patient user could log in using his name (auto complete field) and pass code sent to him.
.Display list of his reports.
.Display a report details as a page. 
.Export a report as PDF Mail a report as PDF

How To Install The Project
--------------------------

1. Download Xampp from https://www.apachefriends.org/xampp-files/5.5.37/xampp-win32-5.5.37-0-VC11-installer.exe

2. Install Xampp Server

3. Go to "C:\xampp\apache\conf\extra\httpd-xampp.conf" 

4. Edit the Archive

5. Go to Line 98, or search "<Directory "C:/xampp/webalizer">"

6. Change that Directory tag with: 

line 98    <Directory "C:/xampp/webalizer">
line 99         <IfModule php5_module>
line 100     		<Files "webalizer.php">
line 101     			php_admin_flag safe_mode off
line 102    		</Files>
line 103        </IfModule>
line 104         AllowOverride AuthConfig
line 105         Require local
line 106     </Directory>

7. Start Xampp Server

8. Go to http://localhost/phpmyadmin/ in your Browser

9. Create a new Database with the name "reports"

10. Descompress the "Karen Consoli - Software Engineer - PHP.zip" file 

11. Select the new database in the phpmyadmin page and go to the tab "import"

12.Select "Metge.sql" from the descompressed directory "\Source\Metge.sql"

13. Download Codeigniter from https://github.com/bcit-ci/CodeIgniter/archive/3.0.6.zip

14. Copy the files to "C:\xampp\htdocs\blog_s"

15. Copy the "\Source\blog_s" carpet from the descompressed directory and paste it in "C:\xampp\htdocs"

16.Replace the files

17.Go to  "C:\xampp\htdocs\blog_s\application\config\database.php" and edit it changing your mysql username and password 

18.Finally, Go to your web browser and write "localhost/blog_s"

11.The Web Application is running!!

How To Access like and Admin Operator
----------------------------------------

.Email: admin@admin.com
.Password: admin123

Finally
----------------------------------------
Now you can read the code and its comments and see the result, experiment with
it, and hopefully quickly grasp how things work.

If you find a problem, incorrect comment, obsolete or improper code or such,
please contact with me from http://www.kbcon.com.ar
Thank you, 

Karen B. Consoli
www.kbcon.com.ar

#   p h p - r e p o r t i n g- s y s t e m  
 
 
