# 📚 Berbuku.com (Bookstore Website)

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

2. Navigate to the project directory:
   ```bash
   cd ci3-mongodb-bookstore-web
   ```

3. Configure MongoDB database:
   - Ensure MongoDB is installed and running on your system.
   - Set up the database connection in the `application/config/mongo_db.php` file.


4. Run a local server:
   - If using XAMPP or WAMP, move the project folder to the `htdocs` directory.
   - Access the application via browser at `http://localhost/ci3-mongodb-bookstore-web` (default port).

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
   ![Screenshot 2025-01-16 190704](https://github.com/user-attachments/assets/ddcb6ff8-a6fe-4267-9c63-2de0f57e6c46)
	![image](https://github.com/user-attachments/assets/fce41b2b-6c3a-4874-8c70-3784ade1da76)


2. **Book List**
   ![image](https://github.com/user-attachments/assets/d8d63b41-b383-4301-9896-87216057d75b)


3. **Book Details**
   ![image](https://github.com/user-attachments/assets/4562e647-5c50-4786-97e7-b021fb4f16c6)


4. **Shopping Cart**
   ![image](https://github.com/user-attachments/assets/c4e20c61-afb8-410c-99eb-5b9432b527aa)


5. **Log In & Register**
   ![image](https://github.com/user-attachments/assets/1231bdbc-8c34-461b-89db-71afa6e72f6e)
	![image](https://github.com/user-attachments/assets/f7c26110-5499-4cdc-a437-46263ed3deac)



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
