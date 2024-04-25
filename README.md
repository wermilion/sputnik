# Тестовое задание Backend Dev. 2024

### Предварительные требования

- Установленный Docker Desktop
- Установленный Composer

### Шаги для запуска приложения

1. Скачайте и установите Docker Desktop
2. Скачайте и установите Composer
3. Перейдите в директорию sputnik/project
4. Создайте файл .env. Можно скопировать файл .env.example и назвать его .env
5. Сформируйте APP_KEY для Lumen перейдя на сайт [generate](https://generate-random.org/laravel-key-generator)
6. Сформируйте конфигурацию для подключения к БД в том же .env файле

```dotenv
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=lottery
DB_USERNAME=postgres
DB_PASSWORD=password
```

7. Внесите в JWT_SECRET следующую строку

```text
f30c7a7505a1df4de8aabaa850c461ae7864beac2cc74e4e36cd1602cc949281a0911f4eb8a8d85cc543d8d71be3e45c4a045c10c3b9e37e6d764e73ec55433e3efd304e875251e19475e6b52b276a48ebb70671664b8ee9d6808895f9f547974c7fb55e0709c5478e5c777753a04e8754c00cd27151d6549be2ff4c266e023022e3b1fc848cb01fd09373745d908c98c29a9649b271e8993ad17f2aa85d62eb24fbf18ecb4189c11941fa991a775a7844edf3cc5bea889c592d6841acf7fb23eb2a75b109d53f4a607c4348e6463d6dde65c9a6ca39b40517aaaed50f1fea237b94e48baec014877b8a38ceb8ea4bd9af1a15ab776dd289a25da3b06046a485
```

8. Внесите в JWT_ALGO следующее значение

```text
HS256
```

9. Перейдите в директорию sputnik/deploy и введите команду (предварительно скачав docker-desktop)
```bash
docker-compose up --build
```
10. После того как поднимутся все контейнеры, нужно зарегистрировать нового пользователя по пути http://localhost:8080/api/users/register (Запрос есть в коллекции postman)
11. После перейдите к запросу login, в котором получите JWT токен. Его нужно будет использовать в качестве авторизации во время совершения запросов, требующих её
