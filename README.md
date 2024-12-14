# Project

# LAMP Stack Setup and Website Hosting with Networking Basics

This README provides a comprehensive guide to setting up a LAMP (Linux, Apache, MySQL, PHP) stack, hosting a PHP-based webpage, integrating database functionality, making the site publicly accessible, and understanding fundamental networking concepts.

## **1. LAMP Stack Setup**

### **Step 1: Install Required Packages**
Run the following commands on a Debian/Ubuntu-based Linux server:

```bash
sudo apt-get update
sudo apt-get install apache2 mysql-server php libapache2-mod-php php-mysql -y
```

### **Step 2: Configure Apache**
1. Ensure Apache serves files from `/var/www/html/`:
   - Verify the configuration in `/etc/apache2/sites-available/000-default.conf`.
   - Restart Apache:
     ```bash
     sudo systemctl restart apache2
     ```
2. Test by creating a simple HTML file:
   ```bash
   echo "<h1>Apache is working!</h1>" | sudo tee /var/www/html/index.html
   ```
   - Access `http://<server-ip>/` in your browser to confirm.

### **Step 3: Create a Simple Website**
Replace `index.html` with a PHP file:
```bash
echo "<?php echo 'Hello World!'; ?>" | sudo tee /var/www/html/index.php
```
- Verify by accessing `http://<server-ip>/`.

### **Step 4: Configure MySQL**
1. Secure MySQL installation:
   ```bash
   sudo mysql_secure_installation
   ```
2. Create a database and user:
   ```bash
   sudo mysql -u root -p
   ```
   Run the following SQL commands:
   ```sql
   CREATE DATABASE web_db;
   CREATE USER 'web_user'@'localhost' IDENTIFIED BY 'StrongPassword123';
   GRANT ALL PRIVILEGES ON web_db.* TO 'web_user'@'localhost';
   FLUSH PRIVILEGES;
   EXIT;
   ```

### **Step 5: Modify the Website to Use the Database**
Create or update `index.php`:

```php
<?php
$servername = "localhost";
$username = "web_user";
$password = "StrongPassword123";
$dbname = "web_db";

// Connect to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Display visitor's IP and current time
$visitor_ip = $_SERVER['REMOTE_ADDR'];
$current_time = date("Y-m-d H:i:s");

echo "Hello! Your IP address is $visitor_ip and the current time is $current_time.";

$conn->close();
?>
```

Verify by accessing `http://<server-ip>/`.

### **Step 6: Testing Locally**
Test the website locally via the server's IP address to ensure it displays the expected output.

### **Step 7: Make the Website Publicly Accessible**
1. Allow HTTP traffic:
   ```bash
   sudo ufw allow 80/tcp
   sudo ufw reload
   ```
2. Use a public IP or domain name:
   - Obtain the public IP from your cloud provider.
   - Update DNS records to point your domain to this IP.

Access the site via `http://your-domain.com` or `http://<server-public-ip>/`.

---

## **2. Git & GitHub Integration**

### **Step 1: Initialize Git Locally**
```bash
cd /path/to/project
git init
```

### **Step 2: Create a .gitignore File**
Create `.gitignore` to exclude sensitive and unnecessary files:
```plaintext
# Ignore database credentials
*.env
config.php

# Ignore OS and editor-specific files
.DS_Store
.vscode/
```

### **Step 3: Commit Documentation & Source Code**
1. Create a `README.md` file detailing the setup steps.
2. Add and commit files:
   ```bash
   git add .
   git commit -m "Initial commit: Add documentation and website files"
   ```

### **Step 4: Create and Push to GitHub Repository**
1. Create a new repository on GitHub.
2. Add the remote and push:
   ```bash
   git remote add origin <your-github-repo-url>
   git branch -M main
   git push -u origin main
   ```

---

## **3. Networking Basics**

### **IP Address**
- **Definition**: A unique numerical identifier for devices in a network.
- **Purpose**: Enables devices to communicate over local and global networks.
- **Types**: IPv4 (e.g., `192.168.1.1`) and IPv6 (e.g., `2001:0db8::1`).

### **MAC Address**
- **Definition**: A hardware identifier assigned to network interfaces.
- **Purpose**: Ensures unique identification within a local network.
- **Difference from IP**: Fixed to hardware, whereas IP addresses are dynamic and assigned by networks.

### **Switches, Routers, and Routing Protocols**
- **Switch**: Connects multiple devices within a network, forwarding data to the correct destination.
- **Router**: Connects different networks and manages traffic between them.
- **Routing Protocols**: Rules used by routers to find the best path for data, e.g., OSPF, BGP.

### **Remote Connection to Cloud Instance**
To connect to your cloud-based Linux instance:
1. Obtain the public IP of the instance.
2. Ensure the SSH server is running.
3. Use the following command:
   ```bash
   ssh username@<server-public-ip>
   ```

---

## **Deliverables**
1. **GitHub Repository**: Contains the source code, configuration files (excluding sensitive data), and documentation.
   - [GitHub Repository Link](#)
2. **Public URL**: Accessible website at `http://your-domain.com` or `http://<server-public-ip>/`.

---

### **Contact**
If you have any questions, feel free to reach out!


