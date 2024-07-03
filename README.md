# Test Who Owns The Zebra

Dit is de readme voor de test van de recepten.

Er zit nog een aparte markdown file in de repository namelijk (analyse.md). Hierin staat alles van analyse vooraf en opmerkingen die ik tijdens het uitvoeren van de test genoteerd heb. Ook zal je zien dat er een timetracking.png bestand inzit. Dit is het bewijs van phpstorm over de effectieve tijd van de test.

## Installation
- git clone
- composer install
- copy .env.example to .env
- change SESSION_LIFETIME to 1440
- npm install
- npm run dev or php artisan serve

### api call
- reachable at: {{projectUrl}}/api/recipes
- if needed query parameters can be added
  - search=stringtosearch
  - categories=category1,category2 
