## Описание
Мини-проект, позволяющий создавать и управлять товарами (изменять и удалять).

По созданному товару можно оформить заказ, указав количество товара, для расчета стоимости заказа.

## Стек
Laravel, MySQL, Docker Compose, Blade, Vite

## Модель данных

```mermaid
erDiagram
    CATEGORY ||--o{ PRODUCT : places
    PRODUCT o|--o{ ORDER : places
    PRODUCT {
        int id PK
        int category_id FK
        string name
        string description
        double price
        datetime created_at
        datetime updated_at
    }
    ORDER {
        int id PK
        int product_id FK
        string full_name
        string comment
        double amount
        double total_price
        datetime created_at
        datetime updated_at
        string product_name
        string product_price
        string product_category
    }
    CATEGORY {
        int id PK
        string name
        datetime created_at
        datetime updated_at
    }
```

## Деплой
### Локально
Для локального запуска и разработки выполнить:
1. Сделать файл make-env.sh исполняемым:
```shell
chmod +x make-env.sh
```
2. Сформировать .env файл:
```shell
./make-env.sh local
```
3. Запустить проект:
```shell
docker compose up -d
#or
docker compose up --watch #для разработки
```
Приложение, развернутое локально, доступно по http://localhost:8080/