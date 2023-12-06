# CarLog Website

Welcome to the CarLog Website repository! This web application is designed to provide users with a platform to compare various vehicles based on specifications, prices, and user reviews.

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Folder Structure](#folder-structure)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Introduction

The CarLog Website is a web application developed using HTML5, CSS3, PHP, JQuery, JavaScript, and Ajax. It follows the MVC (Model-View-Controller) architecture, allowing users to compare vehicles, read news, explore brands, give reviews, and make informed decisions about purchasing vehicles.

## Features

- **Home Page:**

  - Dynamic slideshow featuring automotive news and advertisements.
  - Horizontal menu with links to different sections.
  - Logos of major vehicle brands linked to brand-specific pages.
  - Comparison form for up to 4 vehicles.
  - Popular 2x2 vehicle comparisons.

- **Comparator Page:**

  - Template similar to the home page.
  - Dynamic comparison of 2 to 4 vehicles on one page.
  - Tabular display of vehicle specifications, important details, and indicative prices.

- **News Page:**

  - Frames with titles, images, and excerpts linking to detailed news pages.

- **Brands Page:**

  - Interface with logos of vehicle brands, each linked to brand-specific information.
  - Brand details, links to main vehicles, and a dropdown list for all vehicles with specifications.

- **Reviews Page:**

  - Interface similar to the "Marques" page, linking to vehicle-specific pages with paginated user reviews.

- **Buyer GuidePage:**

  - Helps users make informed decisions about purchasing vehicles.
  - Allows users to choose a vehicle and navigate to its detailed page.

- **Contact Page:**

  - Displays contact information for the website.

- **Authentication:**

  - Login link opens an authentication form.
  - Registration form with fields for name, surname, gender, date of birth, and password.

- **User Profiles:**

  - Authenticated users can view their favorite vehicles and access vehicle ratings.
  - Authenticated users can add reviews, subject to approval by the administrator.

- **Admin Panel:**
  - Categories for managing vehicles, reviews, news, and users.
  - Vehicle Management: Add, delete, and modify vehicle information.
  - Review Management: View and manage user reviews, including approval and blocking.
  - News Management: Add and manage news articles.
  - User Management: View and manage user registrations, including validation and blocking.
  - Settings: Manage content for the "Guide d’achat" and "Contact" pages, control the slideshow.

## Folder Structure

- **app/**

  - **models/**
    - Contains model files.
  - **views/**
    - Contains view files.
  - **controllers/**
    - Contains controller files.
  - **routers/**
    - Contains router files.

- **public/**

  - Contains images and assets.
  - **styles/**
    - Contains CSS files.
  - **scripts/**
    - Contains JavaScript files.

- **config/**

  - Contains configuration files.

- **index.php**
  - Entry point file for the application.
