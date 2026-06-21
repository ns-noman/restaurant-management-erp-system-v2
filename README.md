# 🏭 RMS Production ERP System (Laravel)

A full-featured Enterprise Resource Planning (ERP) system built with Laravel designed for managing production-based businesses such as food manufacturing, central kitchens, FMCG production, inventory-heavy operations, and service-integrated enterprises.

This system combines Production, Inventory, HR, Payroll, Sales, Purchasing, and Accounting workflows into a single unified platform.

---

## 🚀 Key Features

### 🍽️ Production Management
- Recipe creation & management
- Production planning system
- Raw material issuance for production
- Production workflow tracking

### 📦 Inventory Management
- Item master data management
- Real-time stock tracking
- Stock history logs
- Units & measurement control
- Supplier & ledger management

### 🛒 Purchase & Procurement
- Purchase requisition system
- Purchase order management
- Supplier management
- Purchase detail tracking

### 🧾 Sales & Order Management
- Order creation & processing
- Order details tracking
- Payment processing
- Collection tracking system

### 👨‍💼 HR & Payroll System
- Employee management
- Attendance tracking & processing
- Leave management system
- Salary processing (temporary & final)
- Loan & installment management
- Employee benefits module

### 🏢 Admin & Access Control
- Role-based access control (RBAC)
- User & admin management
- Dynamic menu system
- API authentication (Sanctum supported)

### ⚙️ System Configuration
- Departments, designations, divisions
- Countries & currency setup
- Weekly holidays & holiday management
- Category & category type system

---

## 🧱 Tech Stack

- Laravel (PHP Framework)
- MySQL Database
- Laravel Sanctum / Session Authentication
- MVC Architecture
- Blade / Bootstrap Frontend
- REST API Support (optional)

---

## 📂 Modules / Tables

users, admins, roles, privileges  
employees, departments, designations  
attendances, attendance_processes, attendance_process_details  
leaves, leave_types  
recipes, recipe_details, production_plans  
items, stock_histories, units  
purchases, purchase_details, purchase_requisitions  
suppliers, supplier_ledgers  
orders, order_details, payments, payment_methods  
loans, loan_installments  
salary_processes, salary_process_temps  
expenses, expense_details, expense_heads  
categories, category_types  
countries, divisions, currency_symbols  
weekly_holidays, holidays  
menus, personal_access_tokens, failed_jobs  

---

## ⚙️ Installation

```bash
git clone https://github.com/your-username/rms-production-erp.git
cd rms-production-erp
composer install
npm install
npm run dev
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan serve
