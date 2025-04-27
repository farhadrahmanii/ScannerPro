# 📄 **Truck Scanner Project**

## 🚀 **Overview**
The **Truck Scanner Project** is an advanced and efficient scanning solution designed to monitor and manage trucks entering and exiting Afghanistan. Built with cutting-edge technologies, this project ensures accurate and high-performance scanning, providing robust functionality for both security and logistics management.

## 🎯 **Features**
- 🚛 **Truck Scanning:** Accurately scan trucks entering and exiting the border.
- 📑 **Document Verification:** Ensure proper documentation for each truck.
- 🔄 **Batch Scanning:** Supports scanning multiple trucks in a single session.
- 🗂️ **Data Management:** Organize, store, and retrieve scanned truck records effortlessly.
- 🌐 **Cross-Platform Support:** Runs smoothly on multiple operating systems.
- 🔒 **Secure Data Handling:** Ensures data privacy and encryption.

## 🛠️ **Technologies Used**
- **Backend:** Laravel 11
- **Frontend:** FilamentPHP
- **Database:** MySQL
- **Authentication:** OTP Authentication with `afsakar/filament-otp-login`
- **Localization:** Multi-language support (Pashto included)

## 📦 **Installation**
1. Clone the repository:
   ```bash
   git clone https://github.com/your-repo/truck-scanner-project.git
   ```
2. Navigate to the project directory:
   ```bash
   cd truck-scanner-project
   ```
3. Install dependencies:
   ```bash
   composer install
   npm install
   ```
4. Set up the environment:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
5. Run migrations:
   ```bash
   php artisan migrate
   ```
6. Start the development server:
   ```bash
   php artisan serve
   ```

## 📊 **Usage**
1. Access the application via the configured URL.
2. Authenticate using OTP login.
3. Navigate to the truck scanning interface.
4. Configure scanner settings and start scanning trucks.

## 🌍 **Localization Support**
- **Pashto** (پښتو)
- **English**
- **Other languages as configured**

## 🧩 **Integration**
- OTP Authentication (`afsakar/filament-otp-login`)
- File Upload and Preview (`FileUpload` component in FilamentPHP)

## 🛡️ **Security**
- Secure authentication and authorization.
- Encrypted storage of sensitive data.
- OTP-based login for added security.

## 🤝 **Contributing**
1. Fork the repository.
2. Create a new branch:
   ```bash
   git checkout -b feature/your-feature
   ```
3. Make your changes and commit:
   ```bash
   git commit -m "Add new feature"
   ```
4. Push to the branch:
   ```bash
   git push origin feature/your-feature
   ```
5. Open a Pull Request.

## 📝 **License**
This project is licensed under the **MIT License**.

## 📬 **Contact**
- **Developer:** Farhad Rahmani
- **Email:** [info@farhad.in](mailto:info@farhad.in)
- **Phone:** +93 728063532

## ⭐ **Acknowledgments**
- Thanks to the open-source community.
- Special gratitude to all contributors and supporters.

---
> *"Ensuring secure and efficient truck movement across Afghanistan's borders."*

**Happy Scanning! 📸**

