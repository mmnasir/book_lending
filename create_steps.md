# book_lending

step1=> install laravel => composer create-project laravel/laravel .

docker steps:
docker-compose up --build -d
(not worked because i did not install docker inside WSL )

step2=> create rhe migrations => Book/Member/Loan
php artisan make:model Book -m
php artisan make:model Member -m
php artisan make:model Loan -m

add the needed columns to the migration files and then:
dev@WIN-MN2:/mnt/d/projects/pri_projects/book_lending$ php artisan migrate

INFO  Running migrations.

2026_02_10_090551_create_books_table ............................................................................................... 383.15ms DONE
2026_02_10_090613_create_members_table .............................................................................................. 63.11ms DONE
2026_02_10_090635_create_loans_table ............................................................................................... 749.62ms DONE

dev@WIN-MN2:/mnt/d/projects/pri_projects/book_lending$

edit the created models files to have the new columns with the relations

create a simple seeder for the books and members and then : pgp artisan db:seed



step000=> create docker file and docker-compose file => 
step000=> move the database to docker => 
