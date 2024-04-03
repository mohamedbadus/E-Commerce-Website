# E-Commerce Website

Simple PHP/MySQL Fashion e-commerce website with Admin Panel made with XAMPP. With very minimal CSS. Beginner friendly. (Online payment not implemented.)

DEFAULT DATABASE NAME: **celebrity**

## Quick Start:

-   Clone the git, then move the whole project folder into your WebServer directory. (`www` or `htdocs`)
-   CREATE a new database CALLED "`celebrity`" inside MySQL.
-   THEN, import to the DB the file `celebrity.sql` found inside the folder `database`.
-   Change connection settings in `/connections/localhost.php` to edit your MySQL credentials.
-   Done. Browse to http://localhost/celebrity to view the website.

### FOR ADMIN PANEL

**Defaults:**

-   These are hardcoded. Can be changed in `/admin/adminlogin.php` OR stored in database* (RECOMMENDED) in _Admin_ table
-   ADMIN USERNAME: `admin`
-   ADMIN PASS WORD: `admin123`
-   Login admin panel at `{yourProjectURL}/admin/adminlogin.php` to upload new products.
-   Sample product images included in folder `/uploads`
