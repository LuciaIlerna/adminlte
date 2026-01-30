
# AdminLTE - Guía de Implementación

He creado un Sistema de Gestión de una cuidadora de animales que cuenta con los módulos de Clientes, Mascotas, Empleados, Productos y Citas, que tiene servicios como Peluquería y Veterinaria.
Dentro de cada módulo puedes asignar un nombre, número de teléfono, correo... o en el caso de las mascotas su nombre, su dueño, peso, raza... Puedes elegir fechas y horarios para poder guardar las citas que tienes y Stock, precio en caso de Productos...

## 1. Descarga e Instalación

- Descargué AdminLTE desde el repositorio oficial
- Extraje los archivos en `/C:/xampp/htdocs/adminlte/`
- Verifiqué la estructura de carpetas (css, js, images, etc.)

## 2. Configuración Inicial

- Configuré la conexión local con XAMPP
- Accedí al proyecto mediante `localhost/adminlte/`
- Configurar la conexión a la base de datos en .env
- Instalé dependencias necesarias 

## 3. Personalización

- Usé la plantilla de jeroennoten

## 4. Desarrollo de Funcionalidades

- Creé vistas y controladores
- Conecté base de datos 
- Implementé lógica de negocio

## 5. Testing y Ajustes

- Probé responsividad y compatibilidad
- Realicé ajustes finales
- Optimicé rendimiento

## 6. Resultado Final

Proyecto completado y funcional en `/C:/xampp/htdocs/adminlte/`

## 7. Comandos Utilizados

```bash
# Crea proyecto Laravel
composer create-project laravel/laravel nombre-proyecto
cd nombre_proyecto

# Instala dependencias
composer install

# Instala Bootstrap
Composer require laravel/ui

# Genera vistas
php artisan ui Bootstrap –auth

# Migra base de datos
php artisan migrate

# Instala AdminLTE, un panel administrativo con diseño profesional para Laravel
Composer require jeroennoten/laravel-adminlte

# Instala AdminLTE con todas las vistas, assets, autenticación y configuración completa.
php artisan adminlte:install –type=full

# Crea modelo, migración, controller, factory y seeder
php artisan make:model "Nombre"

# Ejecuta servidor local
php artisan serve

# Instala paquetes npm
npm install

# Compila assets
npm run dev

# Limpiar cache de configuración/vistas/rutas
php artisan config:cache
php artisan route:clear
php artisan view:clear
```
