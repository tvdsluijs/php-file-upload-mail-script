# File Upload Script with Email Notifications

This PHP script allows users to upload files (including large files) through a web browser via drag-and-drop or a file input button. Upon successful upload, an email notification is sent with direct download links to the uploaded files.

## Features

- **Drag and Drop File Upload**: Users can drag and drop files into a specified area or use a button to select files for upload.
- **Progress Bar**: A visual progress bar indicates the upload status.
- **Email Notifications**: Upon successful upload, an email notification is sent with download links to the uploaded files.
- **SMTP Configuration**: Configurable SMTP settings for sending emails.

## Requirements

- PHP 7.4 or higher
- Composer
- A web server like Apache or Nginx
- Internet access for sending emails

## Installation

1. **Clone the Repository**

    ```bash
    git clone https://github.com/yourusername/your-repository.git
    cd your-repository
    ```

2. **Install Dependencies**

    This script relies on PHPMailer for sending emails. Install it via Composer:

    ```bash
    composer require phpmailer/phpmailer
    ```

3. **Configuration**

    Open the `upload.php` file and configure the SMTP settings with your credentials:

    ```php
    // SMTP Configuratie
    $smtpHost = "smtp.gmail.com";
    $smtpUsername = "[your_email@gmail.com]";
    $smtpPassword = "[your_email_password]";
    $smtpPort = 587;
    ```

    ```php
    // MAILto Configuratie
    $mailtoEmail = "[your_email]";
    $mailToName = "[your_name]";
    ```

    Set the upload directory where files will be stored:

    ```php
    $uploadDir = "upload/"
    ```

    Additionally, set the base URL where the uploaded files will be accessible:

    ```php
    // Basis URL van de website
    $baseUrl = 'https://[your url]/'.$uploadDir;
    ```

4. **Setup Upload Directory**

    Ensure that the `upload` directory is writable by the web server:

    ```bash
    mkdir upload
    chmod 755 upload
    ```

5. **Deploy to Your Server**

    Upload the entire project to your web server. Ensure that your server is configured to handle file uploads of the size you expect.

6. **Adjust PHP Settings if Necessary**

    You may need to adjust the following settings in your `php.ini` file or `.htaccess` to allow larger file uploads:

    ```ini
    upload_max_filesize = 100M
    post_max_size = 100M
    max_execution_time = 300
    max_input_time = 300
    ```

## Usage

1. **Access the Upload Page**

    Navigate to the URL where you deployed the script. You should see an upload area where you can drag and drop files or click to select files from your device.

2. **Upload Files**

    Drag and drop files into the designated area or click to select files. The upload will begin immediately, and a progress bar will indicate the upload status.

3. **Receive Email Notification**

    After the upload completes, you will receive an email with links to download the uploaded files.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Author

Theo van der Sluijs
[info@itheo.tech](mailto:info@itheo.tech)
[https://itheo.tech](https://itheo.tech)
