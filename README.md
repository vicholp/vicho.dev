# Laravel ecommerce template

This repository contains a Laravel template for ecommerce. It should be use as a starting point for any ecommerce project. It contains the most common features, a basic frontend, and the logic to manage products, orders, customers, etc.

## Technologies

- Laravel 10
- Vue 3 with Vite
- Tailwind CSS

## Features

- Products with variations
- Orders
- Clients
- Cart management
- Checkout

## Feature flags

Inside `app/Features` there are multiple files that contain the logic for when the feature should be enabled or not. This is useful when you want to disable a feature for a specific project.

You should note that this is only setted inside php. To the frontend, each one of these must be passed to  `js/components/features.vue`, where a global variable is set to use inside each component.

This component is called inside each `template/main.blade.php`.

This gives you the flexibility to disable a feature in the backend and the frontend, and for users or admins.

### Product Variations

You can set this in the `app/Features/ProductVariationsFeature.php` file.

This will allow the admin to set variations for each product. For example, if you are selling t-shirts, you can set the size and color as variations.

Also, it will show the option for the user to select the variation when adding the product to the cart.

