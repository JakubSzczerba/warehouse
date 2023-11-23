# Warehouse
> App for warehouse data management

## Technologies
* PHP - version 8.1
* Symfony - version 6.3
* PostgresSQL - version 13.2-1

## Local Setup
```
docker compose up -d
```
```
docker compose exec php bin/console doctrine:migrations:migrate
```
> Add Products.csv, Inventory.csv and Prices.csv to /src/Data/Input

## Tests
```
docker compose exec php /var/www/warehouse/vendor/bin/phpunit
```

## Contact
* [GitHub](https://github.com/JakubSzczerba)
* [LinkedIn](https://www.linkedin.com/in/jakub-szczerba-3492751b4/)
