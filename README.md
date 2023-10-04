# PChut - Your Ultimate Tech Shopping Destination

🚀 **Built with Vue + Laravel**

<img src="https://github.com/Fosleen/PCHUT/blob/main/frontend/vue/src/assets/logo_new.png" alt="pchut-logo" style="width:350px"/>

Watch <a href="https://youtu.be/Y4T0aCTp1qI" target="_blank">PChut video</a>. 

## PChut documentation

<ul>
  <li><a href="#description">Project description and features</a></li>
  <li><a href="#technologies">Technologies</a></li>
  <li><a href="#installation">Installation</a></li>
  <li><a href="#ui">PChut UI</a></li>
</ul>

## Project description and features
<div id="description">
  
Welcome to **PChut**, your one-stop webshop for all things tech! Whether you're a seasoned PC enthusiast or just getting started, PChut is your go-to destination for all your tech needs. From powerful CPUs and high-performance GPUs to sleek keyboards, mice, and crystal-clear monitors, we've got it all. Here's what you can expect from our cutting-edge webshop:</div>

🛍️ **Browse and Discover**: Explore our extensive catalog of tech items, meticulously categorized for your convenience. Find the latest and greatest PC components and peripherals with ease.

💰 **Unbeatable Deals**: Keep an eye on our action prices and exclusive offers to grab your favorite tech items at the best prices in the market.

🔍 **Smart Search and Filters**: Find exactly what you need by using our powerful search and filtering options. Narrow down your search by manufacturer, model, price range and more.

🛒 **Seamless Shopping**: Add items to your cart effortlessly and create your profile if you're new to PChut. Our streamlined checkout process ensures a hassle-free shopping experience.

💳 **Secure Payments**: Choose your preferred payment method, whether it's a card payment or cash on delivery, to complete your order. Your financial security is our top priority.

🏠 **Customized Addresses**: Store multiple delivery addresses to have your tech treasures delivered wherever you want. No more limitations to just one address.

💻 **Build Your Dream PC**: PChut takes tech shopping to the next level. Use our unique PC builder feature to select compatible components add them to your cart, and create the ultimate custom PC.

📦 **Order Tracking**: Stay informed about your orders with real-time status updates. Know whether your items are still on their way, being delivered, or have safely arrived at your doorstep.

📜 **Order History**: Easily access to all your past orders. Keep track of your tech purchases over time.

🎨 **Modern Design**: Our sleek and intuitive design ensures a visually appealing and user-friendly experience, making your shopping journey enjoyable.


Discover the future of tech shopping with PChut today. Elevate your PC gaming and computing experience with the latest and greatest tech items. Start exploring now and build the tech setup of your dreams!

## Project Technology Stack
<div id="technologies"></div>

This full-stack project technology stack includes:

### Backend
- **Laravel** 💙 - A PHP web application framework
- **Filament** - a content management framework for building an administration interface

### Frontend
- **Vue** 💚 - A progressive JavaScript framework for building user interfaces
- **Vuex** - State management pattern and library for Vue.js applications
- **Axios** - A popular JavaScript library for making HTTP requests
- **Vue-toastification** - A library for displaying toast messages
- **Vue-content-loader** - Customizable loaders library (placeholder loading) 
- **Vue-swiper** - A customizable image swiper/slider library
- **Vue-credit-card-validation** - A Vue library for credit card validation


### Database 
- **MySQL** - A relational database management system

## Installation - how to run the code?
<div id="installation">To start this project on your PC locally, follow these steps:</div>

 + Clone the repository:
`git clone https://github.com/Fosleen/PCHUT`

## Frontend

 + In terminal, navigate to the Vue directory:
`cd frontend/vue`
   
+ Install all dependencies: `npm install`
   
+ Start the application locally on port 5173: `npm run dev`

## Backend

+ Start server on XAMPP (Apache & MySQL services)

+ Optional - in PhpMyAdmin create database with name `pchut` and import our test database from `pchut-test-db.sql` file 
   
+ In new terminal, navigate to the Laravel directory: `cd backend/pc-hut`

+ Start the server locally on port 8000: `php artisan serve`
  
+ Run database migrations: `php artisan migrate`

  ### Admin

  If you want to access admin dashboard, you have to install Laravel Filament.

  + Go in new terminal while your backend is running and run `composer require filament/filament:"^3.0-stable" -W`
  + Then run `php artisan filament:install --panels`

    To access admin dashboard, you need to create a user in terminal: `php artisan make:filament-user`
    On admin dashboard, you can do CRUD operations on database.
    

   
## PChut UI 
<div id="ui"></div>

### Home page
![homepage-light-mode](https://github.com/Fosleen/PCHUT/assets/90924342/baadbd08-5adc-48d5-a607-cc8ec41b676f)

### Product details page
![item-details](https://github.com/Fosleen/PCHUT/assets/90924342/3b7d5460-f05f-4235-add1-46461fd39624)

### All products with filter page
<ul>
  <li>Desktop and mobile filter version</li>
</ul>

![products-filter](https://github.com/Fosleen/PCHUT/assets/90924342/e2412626-0acc-4362-bec7-f08ccb7a0b94)

### PC builder page
![pc-builder](https://github.com/Fosleen/PCHUT/assets/90924342/f4fb13e7-eab7-4b1c-9d0d-9db596217fcf)

### Register page
![registracija](https://github.com/Fosleen/PCHUT/assets/90924342/4b0ba9cd-257f-4de0-8fee-24f04f55d9ae)

### My cart page
<ul >
  <li>Desktop and mobile cart item component version</li>
</ul>

![your-cart](https://github.com/Fosleen/PCHUT/assets/90924342/91722bdd-b04d-4102-91ca-d1ac2a28c4ab)

### My orders page
![my-orders](https://github.com/Fosleen/PCHUT/assets/90924342/aa6c23c4-f546-4c06-b5c0-54389bcbdaa9)

### Payment details page
![pay](https://github.com/Fosleen/PCHUT/assets/90924342/e543772b-02e3-4b62-aba1-6da464ec62b4)

### Custom placeholder loaders
![loader](https://github.com/Fosleen/PCHUT/assets/90924342/b0bdfc45-8f84-4df8-b678-6c8e7e575323)

Designed in Figma. 

View full <a href="https://www.figma.com/file/lA4N5GedLbQclZw7Efdm66/pc-shop?type=design&node-id=316%3A658&mode=design&t=9KewY6DbBizPOCBv-1">Figma file</a> here. Icons are from <a href="https://www.flaticon.com/">Flaticon</a> and <a href="https://phosphoricons.com/">Phosphor Icons</a>.

![figma-pchut](https://github.com/Fosleen/PCHUT/assets/90924342/bc019d82-c58a-4739-97d0-3c729771a574)
