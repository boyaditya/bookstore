# 📚 Bookstore Application

## 📖 Description
Bookstore is a web-based application that allows users to explore, search, and purchase books online. The application includes features such as book CRUD, book search, detailed book views, login, register, shopping cart, and checkout process.

This application is built using the CodeIgniter 3 framework and NoSQL MongoDB database.

---

## ✨ Key Features

1. **Book Management (CRUD)**
   - Add new books
   - View book list
   - Update book information
   - Delete books

2. **Book Search**
   - Search books by title, author, or ISBN

3. **Book Details**
   - View complete book information, including description, price, and stock

4. **User Authentication**
   - Login for registered users
   - Register new users

5. **Shopping Cart**
   - Add books to the shopping cart
   - View and edit cart contents

6. **Checkout**
   - Complete the purchase process
   - Users must be logged in to proceed with checkout

---

## 🛠️ Technologies Used

- **Framework:** CodeIgniter 3
- **Database:** MongoDB
- **Programming Languages:** PHP, JavaScript
- **Additional Libraries:**
  - Bootstrap for user interface design
  - jQuery for interactivity

---

## 🚀 Installation

Follow these steps to run the application locally:

1. Clone this repository:
   ```bash
   git clone https://github.com/arulzkash/bookstore.git
   ```

2. Navigate to the project directory:
   ```bash
   cd bookstore
   ```

3. Configure MongoDB database:
   - Ensure MongoDB is installed and running on your system.
   - Set up the database connection in the `application/config/mongo_db.php` file.

4. Set up the base URL in `application/config/config.php`:
   ```php
   $config['base_url'] = 'http://localhost/bookstore/';
   ```

5. Run a local server:
   - If using XAMPP or WAMP, move the project folder to the `htdocs` directory.
   - Access the application via browser at `http://localhost/bookstore`.

---

## 🛒 Usage

1. **Users:**
   - Register a new account.
   - Log in to add books to the cart and proceed to checkout.
   - Only logged-in users can complete the checkout process.

---

## 📂 Project Structure

```
bookstore/
├── application/
│   ├── config/         # Application configuration
│   ├── controllers/    # Main controllers for the application
│   ├── models/         # Models for CRUD and database interactions
│   ├── views/          # Views for the user interface
│
├── assets/             # CSS, JS, and image files
├── system/             # CodeIgniter core files
├── index.php           # Application entry point
```

---

## 📷 Screenshots

1. **Home Page**
   

2. **Book List**
   ![Book List](screenshots/book_list.png)

3. **Book Details**
   ![Book Details](screenshots/book_details.png)

4. **Shopping Cart**
   ![Shopping Cart](screenshots/shopping_cart.png)

5. **Checkout**
   ![Checkout](screenshots/checkout.png)

---

## 🤝 Contribution

Contributions are welcome! If you have ideas to improve this application, feel free to fork this repository and submit a pull request.

---

## 📝 License

This project is licensed under the [MIT License](LICENSE).

---

## 👤 Author

- @boyaditya
- @arulzkash
- @harismln22
- @ridhonaufaldyy
- Muhamad Irfan
