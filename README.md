# Advanced Warehouse Management System

A comprehensive solution for product receiving, tracking, and inventory management.

## Highlights

- 🚚 **Receiving Process:** Products are received and counted at the dock before being palletized.  
- 📦 **Palletizing:** Products are wrapped, labeled with QR codes for tracking, and prepared for storage.  
- 🔄 **First In, First Out (FIFO):** The system ensures older products are picked before newer ones, maintaining freshness.  
- 📊 **Cycle Counts:** Users can easily adjust inventory counts based on physical checks, streamlining inventory management.  
- 🗂️ **Section Mapping:** The warehouse is divided into sections, allowing precise tracking of products across different environments.  
- 🚛 **Route Return Function:** This feature helps manage returns from deliveries, reducing waste and improving efficiency.  
- 🔍 **Real-Time Tracking:** The system provides real-time visibility of inventory, enhancing operational decision-making.  

## Key Insights

- 🏭 **Efficiency in Operations:** The ability to scan and track products at every stage enhances workflow efficiency and minimizes errors.  
- 📈 **Inventory Accuracy:** Real-time visibility and cycle counting enable better inventory accuracy and reduce discrepancies.  
- 🔗 **Seamless Integration:** The warehouse management system integrates with accounting, providing a cohesive overview of inventory and finances.  
- 📦 **Space Optimization:** The flexibility to map any area in the warehouse allows for maximum space utilization and organization.  
- 🔄 **Loss Prevention:** The route return function significantly mitigates losses due to damage or theft, protecting profit margins.  
- 🏷️ **Detailed Tracking:** Lot number tracking and expiration management ensure compliance and product safety.  
- 🌐 **Scalability:** The system is adaptable for businesses of various sizes, making it a versatile choice for future growth.  


# Models and Their Responsibilities

## User
**Purpose:** Handles authentication, roles, and permissions.  
**Fields:** 
- `id`
- `name`
- `email`
- `password`
- `role` (e.g., admin, staff)  

**Relationships:**  
- One-to-Many with `Activities` (to track user actions).  
- Polymorphic relationship for managing logins or activity logs.  

---

## Product
**Purpose:** Represents an item stored in the warehouse.  
**Fields:** 
- `id`
- `name`
- `sku`
- `lot_number`
- `expiration_date`
- `quantity`
- `section_id`  

**Relationships:**  
- Belongs to `Section`.  

---

## Section
**Purpose:** Represents a mapped area in the warehouse.  
**Fields:** 
- `id`
- `name`
- `location`
- `environment` (e.g., cold, dry)  

**Relationships:**  
- Has Many `Products`.  

---

## Pallet
**Purpose:** Represents palletized products for easy tracking.  
**Fields:** 
- `id`
- `label`
- `qr_code`
- `status` (e.g., stored, in-transit)
- `section_id`  

**Relationships:**  
- Belongs to `Section`.  
- Has Many `Products` (many-to-many).  

---

## CycleCount
**Purpose:** Tracks inventory audits.  
**Fields:** 
- `id`
- `product_id`
- `expected_quantity`
- `actual_quantity`
- `user_id`
- `counted_at`  

**Relationships:**  
- Belongs to `Product`.  
- Belongs to `User`.  

---

## Return
**Purpose:** Logs returned items.  
**Fields:** 
- `id`
- `product_id`
- `quantity`
- `condition` (e.g., damaged, resellable)
- `processed_at`  

**Relationships:**  
- Belongs to `Product`.  

---

## Activity
**Purpose:** Tracks user actions for auditing purposes.  
**Fields:** 
- `id`
- `user_id`
- `description`
- `created_at`  

**Relationships:**  
- Belongs to `User`.  



# Relationships Summery

- **Product <-> Section:**  
  - One product belongs to one section.  
  - One section has many products.  

- **Product <-> Pallet:**  
  - Many-to-Many: A product can belong to multiple pallets, and a pallet can contain multiple products.  

- **CycleCount <-> Product:**  
  - A cycle count belongs to one product.  
  - A product can have many cycle counts.  

- **Return <-> Product:**  
  - A return belongs to one product.  
  - A product can have many returns.  

- **Activity <-> User:**  
  - An activity belongs to one user.  
  - A user can have many activities.  
