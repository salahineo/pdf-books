<h2 align="center">E-Books Store</h2>

<p align="center">
  <img src="Mockup.jpg" alt="Responsive Mockup">
</p>

### 🎯 Goal

E-Book Store offers a curated selection of free Arabic PDF books. The project provides a seamless browsing experience for readers, emphasizing accessibility and ease of use.

---

### 💻 Stack

- HTML
- CSS
- JavaScript
- jQuery
- Bootstrap
- PHP
- MySQL

> The project is fully responsive, ensuring it works across all devices.

---

### 🏗️ Installation

Follow these steps to set up and run the project using XAMPP.

#### Step 1: Install XAMPP

- Download XAMPP: Go to the [XAMPP download page](https://www.apachefriends.org/download.html) and download the installer for your operating system.
- Run the Installer: Open the downloaded installer and follow the prompts to install XAMPP. Choose the default options for a smooth setup.
- Verify Installation: After installation, open the XAMPP control panel to ensure XAMPP is installed correctly.

#### Step 2: Prepare the Project Files

- Fork the repository by clicking the `Fork` button at the top-right of the repository page.
- Clone your forked repository locally
```bash
git clone https://github.com/your-username/repo-name.git
```
- Navigate to the project directory
```bash
cd repo-name
```
- Move Project to XAMPP: Copy the `repo-name` directory to the `htdocs` directory, typically found at `C:\xampp\htdocs` on Windows or `/opt/lampp/htdocs` on Linux.

#### Step 3: Start the XAMPP Apache Server

- Open XAMPP Control Panel: Start the XAMPP control panel application.
- Start Apache: In the control panel, locate the Apache service and click "Start" to start the web server. Ensure that Apache is running (its status should be "Running" in green).

#### Step 4: Set Up a Virtual Host (Optional but Recommended)

- Edit the vhosts file `C:\xampp\apache\conf\extra\httpd-vhosts.conf` (Windows) or `/opt/lampp/etc/extra/httpd-vhosts.conf` (Linux).
- Add the following lines at the bottom of the file:

```apache
<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/repo-name"
    ServerName repo-name.local
    DirectoryIndex index.html index.php

    <Directory "C:/xampp/htdocs/repo-name">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

> Adjust the file paths if your XAMPP is installed in a different directory.

- Add an entry for `repo-name.local` in your system’s `hosts` file:
  - On Windows, open `C:\Windows\System32\drivers\etc\hosts` in a text editor with administrator privileges.
  - On Linux, edit `/etc/hosts` with root privileges.
- Add the following line, `127.0.0.1 repo-name.local`
- Restart Apache: After saving these changes, go back to the XAMPP control panel and restart Apache to apply the new virtual host configuration.

#### Step 5: Import Database Using phpMyAdmin

- Start MySQL Server: In the XAMPP control panel, click "Start" next to MySQL to start the MySQL database server.
- Open phpMyAdmin: In your browser, go to [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
- Click on the Databases tab at the top.
- Enter a name for the database (e.g., `repo-name`) and select `utf8_general_ci` as the collation. Click Create.
- Select the newly created database from the left sidebar.
- Click on the Import tab at the top.
- Under File to Import, click Choose File and select the SQL file provided with the project.
- Ensure the format is set to SQL, then click Go to start the import.
- Once the import completes, you should see a success message. Verify that the tables have been created by browsing the database.

> You can find the SQL file in the `sql` directory of the project.

> Change the DB name and credentials in the `dashboard/include/connection.php` file.

#### Step 6: Access the Application

- Open a Web Browser: Launch your preferred web browser.
- Visit the Application: Go to `http://repo-name.local` (or `http://localhost/repo-name` if you didn’t set up a virtual host).
- Verify the Setup: The homepage of the application should now load, indicating the application is ready to use.
- To access the dashboard, navigate to `http://repo-name.local/dashboard` (or `http://localhost/repo-name/dashboard` if you didn’t set up a virtual host).

> Default credentials for the dashboard: Username: `admin`, Password: `admin`

---

### ⚓ Contributing

Contributions are welcome and greatly appreciated! If you'd like to contribute to this project, please follow these steps:

- Fork the repository by clicking the `Fork` button at the top-right of the repository page.
- Clone your forked repository locally
```bash
git clone https://github.com/your-username/repo-name.git
```
- Create a new branch for your contribution
```bash
git checkout -b feature/your-feature-name
```
- Make your changes and ensure your code is clean and properly formatted.
- Commit your changes
```bash
git commit -m "feat: your feature description"
```
- Push your branch to your forked repository
```bash
git push origin feature/your-feature-name
```
- Submit a Pull Request (PR) by going to the original repository and clicking the "New Pull Request" button.

---

### 📋 Contribution Guidelines

- Ensure your changes are well-tested and documented.
- Adhere to the existing code style and project structure.
- Provide clear descriptions in your PR regarding the changes and enhancements.
- Be open to feedback and discussion in the PR review process.

---

### ✉️ Contact

[![LinkTree](https://img.shields.io/badge/-Checkout%20My%20LinkTree-404040?style=flat&logo=linktree&logoColor=ffffff)](https://linktree.salahineo.com)

---

### 🔓 License

[![License: GPL v3](https://img.shields.io/badge/License-GPLv3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)

---

**If you find my work good, consider giving it a ⭐ or fork-ing to show some ❤️. It helps me stay on track and be motivated.**


### Credentials

If you navigate to `http://localhost/pdfbooks/dashboard`, you will be asked for username or email, and password. Use the credentials below:

- Username: `admin`
- Password: `admin`
- Email: `admin@pdfbooks.com`

> You can change these credentials from the dashboard

### Technologies

- HTML
- CSS
- JavaScript
- jQuery
- Bootstrap
- PHP
- MySQL

> This project is fully responsive

### Contact

<a href="https://github.com/salahineo"><img src="https://img.shields.io/badge/-GitHub-181717?style=flat&logo=github&logoColor=ffffff"/></a>
<a href="https://linkedin.com/in/salahineo"><img src="https://img.shields.io/badge/-LinkedIn-0A66C2?style=flat&logo=linkedin&logoColor=ffffff"/></a>
<a href="https://facebook.com/salahineo"><img src="https://img.shields.io/badge/-Facebook-1877F2?style=flat&logo=facebook&logoColor=ffffff"/></a>
<a href="https://twitter.com/salahineo"><img src="https://img.shields.io/badge/-Twitter-1DA1F2?style=flat&logo=twitter&logoColor=ffffff"/></a>
<a href="https://salahineo.github.io/salahineo/"><img src="https://img.shields.io/badge/-Website-0563BB?style=flat&logo=data:image/png;base64,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&logoColor=ffffff"/></a>
<a href="mailto:salahineo.work@gmail.com"><img src="https://img.shields.io/badge/-Email-2b3752?style=flat&logo=data:image/png;base64,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&logoColor=ffffff"/></a>

### Copyright and license

[![License: GPL v3](https://img.shields.io/badge/License-GPLv3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)
![License: GPL v3](https://img.shields.io/badge/%C2%A9_2021-Mohamed%20Salah-065AAA)

---

**If you find my work good, consider giving it a :star: or fork-ing to show some :heart:. It helps me stay on track and be motivated.**

> **Explore all of my projects from [Here](https://github.com/salahineo/Projects-Reference)**

