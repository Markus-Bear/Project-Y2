# 🏨 Hotel Management System

This project was developed as part of a **Second Year Computing group project**. The system provides core hotel management functionality with interconnected screens, a shared database, and a full-stack deployment on a **web service rented by the college**.

## 📌 Features

- **User Authentication** with session handling
- **Input Validation** to ensure data integrity
- **CRUD Operations** for staff, guests, rooms, stock, and orders
- **Stock Management** including adding, deleting, amending, and ordering stock
- **Guest & Room Management** for check-in, check-out, and extras
- **Reports** on stock, orders, and guest stays

## 👩‍💻 My Contribution

I was responsible for the **Stock Management module**, implementing:

- **Add Stock Item** – form with validation to insert new stock items
- **Delete Stock Item** – secure deletion workflow with confirmation checks
- **Amend/View Stock Item** – editable two-column layout with validation and update confirmation
- **Place Orders** – order creation workflow allowing multiple items per supplier with calculated totals

These screens interact with shared database tables such as `Stock`, `Orders`, `OrderItems`, and `Suppliers`.

## 🗄️ Tech Stack

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Database:** MySQL
- **Deployment:** Web service rented by the college

## 📂 Project Structure

~~~
Hotel-System/
│── docs/                  # Project Manual & Specification
│── stock/                 # Stock-related screens (my work)
│   ├── addStock.php
│   ├── deleteStock.php
│   ├── amendViewStock.php
│   └── placeOrders.php
│── guests/                # Guest-related screens
│── rooms/                 # Room-related screens
│── staff/                 # Staff-related screens
│── css/                   # Stylesheets
│── js/                    # JavaScript files
│── db.inc.php             # Database connection
│── index.php              # Main entry point
└── README.md
~~~

## 🚀 Getting Started

1. Clone this repository:
   ~~~bash
   git clone https://github.com/your-username/hotel-system.git
   cd hotel-system
   ~~~
2. Import the provided MySQL schema (`hotel.sql`) into your database.
3. Update `db.inc.php` with your database credentials.
4. Deploy to a PHP-compatible server.
5. Access via browser at `http://localhost/hotel-system/`.

## 📖 Documentation

- [Project Manual (PDF)](ProjectY2Manual.pdf)
- [System Specification (DOCX)](Hotel2024.docx)

## 👥 Team Members

- Mark Mukiiza – Stock Management (Add, Delete, Amend/View Stock, Place Orders)
- Hamed Zon – Guest Management
- Mantas Bielevicius – Staff Management
- Szymon Stepniak – Room Management
