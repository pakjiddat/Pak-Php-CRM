<h3>Introduction</h3>
<p id="pak-php-crm-screen"><img src="https://pakjiddat.netlify.app/static/79dad2c608e61b0a7f3e2bc51e048830/8c557/pak-php-crm.png" alt="Pak Php CRM"/></p>

<p>Pak Php CRM is a simple web based task management application. It can be used by web developers to keep track of tasks, income, billing, goals and more.</p>

<p>Pak Php CRM is written in Php language and uses MySQL for storing data. It is based on the <a href="https://pakjiddat.netlify.app/posts/pak-php-framework">Pak Php Framework</a>.</p>

<h3>Features</h3>
<p>
The main idea behind the Pak Php CRM is to provide a simple application for managing basic developer tasks such as task mangement, time tracking, project management etc. The application can be easily customized. The idea is to allow developers to create simple applications quickly using form and table widgets.</p>

<ul>
<li>The Pak Php CRM allows time tracking, management of tasks, goals, income, billing, loans, products and services, customers and projects</li>
<li>It allows user management</li>
<li>It can easily be extended with more features</li>
<li>The website frontend is based on <a href="https://www.w3schools.com/w3css/default.asp">WC.CSS</a></li>
<li>The website backend is written in Php</li>
<li>The website is mobile friendly</li>
<li>The website has good browser response time</li>
</ul>

</p>

<h3>Requirements</h3>
<p>The Pak Php CRM is based on Php and MySQL. Installing the website on your own server requires Php 7.2 and above. The website source code is based on the Pak Php Framework. The source code is fully commented and compliant with the PSR-2 coding guidelines. The source code for the website is modular and easy to extend with new features.</p>

<h3>Installation</h3>
<p>The following steps can be used to install the Pak Php CRM application on your own server:</p>

<ul>
<li>Download the <a href="https://github.com/nadirlc/pak-php-crm.git">source code</a> from GitHub</li>
<li>Move the source code to the document root of a virtual host</li>
<li>Create a database and import the contents of the file: <b>crm/data/pak-php-crm.sql</b> to the database. Note down the credentials used for connecting to the database</li>
<li>Enter the database credentials in the file <b>crm/config/RequiredObjects.php</b></li>
<li>In the file: <b>crm/Config.php</b>, on <b>line 41</b> enter the domain names that will be used to access the website
<li>Customize the following variables in the file: <b>crm/config/General.php. $config['app_name'], $config['dev_mode'] and $config['site_url']</b></li>
<li>Set the <b>$config['pear_folder_path']</b> variable in the file: <b>crm/config/Path.php</b>. The variable should be set to the path of the pear installation.</li>
<li>Visit the website in a browser</li>
</ul>
