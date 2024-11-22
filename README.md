# Super River for Elgg

<p align="center">
  
<img src="https://raw.githubusercontent.com/rjcalifornia/super-river/refs/heads/master/assets/preview.png" width="562">

<br>
</p>

### Requirements
* PHP 8.2.24
* Composer 2.7.2
* NodeJS 22.6.0
* NPM
* elgg 6.x

## Installation | Elgg
- Download from the elgg repository
- Unzip in the mod folder
- Place at the bottom of the list and activate it

## Installation | Dev
- Clone this repository
- Run ``` composer install ``` to install the required PHP dependencies
- Run ``` npm install ``` to install BootStrap Icons and Tailwindcss

## Customizing with Tailwind CSS
- Run  ``` npx tailwindcss -i ./src/input.css -o ./dist/output.css --watch ``` 
- Add the desired Tailwind CSS classes to the ``` index.html ``` file in the ``` src ``` folder

## Dependencies

- [Twig 3.14](https://twig.symfony.com/) - Twig is a modern template engine for PHP
- [BootStrap Icons](https://icons.getbootstrap.com/) - Free, high quality, open source icon library with over 2,000 icons.
- [Tailwind CSS](https://tailwindcss.com/) - A utility-first CSS framework packed with classes to build any design, directly in your markup.
- [Preline](https://preline.co/index.html) - Preline UI is an open-source Tailwind CSS components library for any needs.
- [ViewerJS](https://viewerjs.org/) - Preview PDF files easily.