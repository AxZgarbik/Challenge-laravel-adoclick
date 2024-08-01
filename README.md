# Desafío Técnico Laravel Adoclick

Para ejecutar correctamente el proyecto se debe seguir los siguientes pasos:

1. **Tener una base de datos MySQL**
2. **Cambiar el `.env` para conectarlo con su base de datos**
3. **Realizar las migraciones**
    php artisan migrate
4. **Realizar el seeder de categorias**
    php artisan db:seed --class=CategorySeeder
5. **Realizar el seeder de entidades**
    php artisan db:seed --class=EntitySeeder
6. **Levantar el entorno**
    php artisan serve

**En este momento ya podra ver el json pedido en la ruta  `{SITE_URL}/api/{category}`**

**Puede tambien realizar los test correspondientes**
    php artisan test