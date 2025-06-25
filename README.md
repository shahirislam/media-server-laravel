# Media Server

A simple Laravel-based media server with a single API endpoint for file uploads.

## Features

-   Single POST API endpoint for file uploads.
-   File validation for images.
-   Publicly accessible URLs for uploaded files.
-   Secure and scalable architecture.

## Installation

1.  Clone the repository:
    ```bash
    git clone https://github.com/[YOUR_USERNAME]/media-server.git
    ```
2.  Install dependencies:
    ```bash
    composer install
    ```
3.  Create a copy of the `.env.example` file and name it `.env`:
    ```bash
    cp .env.example .env
    ```
4.  Generate an application key:
    ```bash
    php artisan key:generate
    ```
5.  Create a symbolic link for the storage directory:
    ```bash
    php artisan storage:link
    ```
6.  Start the development server:
    ```bash
    php artisan serve
    ```

## API Usage

### Upload a File

-   **URL:** `/api/upload`
-   **Method:** `POST`
-   **Body:**
    -   `directory` (string, required): The directory to store the file in.
    -   `file` (file, required): The image file to upload.

#### Example `curl` Request

```bash
curl -X POST -F "file=@/path/to/your/image.jpg" -F "directory=images" http://localhost:8000/api/upload
```

#### Example Response

```json
{
    "message": "Upload successfully",
    "url": "http://localhost:8000/storage/images/your-file-name.jpg"
}
