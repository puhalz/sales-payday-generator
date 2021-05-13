# Sales Payroll - Pay Day Generator

## Running the, csv generate command

```bin/console app:sales:payday <YEAR>```

```Ex: bin/console app:sales:payday 2020```

Note: Enter 4 digits of a year.

A csv file will be generated in the var/ folder 


## Run tests

```bin/phpspec run```

## Running with docker

``docker-compose up -d``

``docker exec -it sales-payday-generator_sales-app_1 composer i``

``docker exec -it sales-payday-generator_sales-app_1 bin/console app:sales:payday 2020``

Test it 1
Test it 2
