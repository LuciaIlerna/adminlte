# Segunda Entrega - CRM Sistema Veterinario en Laravel

Aquí encontrarás toda la información sobre las funcionalidades que se han implementado en la segunda entrega.

### **Sistema de Roles y Permisos** 

Ahora el sistema distingue entre dos tipos de usuario, cada uno con diferentes permisos:

#### **Admin**
- Ver todos los registros
- Crear nuevos registros
- Editar cualquier registro
- **Eliminar registros** 

#### **Usuario Estándar**
- Ver todos los registros
- Crear nuevos registros
- Editar registros
- NO puede eliminar 

**Usuarios de prueba creados automáticamente:**
Admin:     admin@example.com    (password)
Usuario:   test@example.com     (password)

### **DataTables** 

Las tablas de listado ahora son inteligentes y te permiten:

- **Buscar en tiempo real**  Mientras escribes encuentra lo que buscas
- **Ordenar columnas**  Click en el encabezado para ordenar
- **Rendimiento**  Carga rápida incluso con muchos registros

Todo esto se instaló con:
```bash
npm install datatables.net datatables.net-bs5 jszip pdfmake
```

### **Paginación** 

Implementamos paginación:

- **10 registros por página** - Perfecto para no saturar la pantalla
- **Navegación fácil** - Botones para ir de página en página

### **Subida de Imágenes** 

Ahora todos los módulos principales soportan subida de imágenes:

#### **Clientes** - Foto de perfil
- Sube JPG, PNG, GIF (máx 2MB)
- Se guarda en `storage/clientes/`
- Ves la foto en la lista y en los formularios
- Se elimina automáticamente si editas o borras

#### **Productos** - Imagen del producto
- Sube JPG, PNG, GIF (máx 2MB)
- Se guarda en `storage/productos/`
- Visible en la lista
- Con eliminación automática

#### **Mascotas** - Foto de la mascota
- Sube JPG, PNG, GIF (máx 2MB)
- Se guarda en `storage/mascotas/`
- **Vista en la tabla de mascotas** ✨
- Preview en el formulario de edición

#### **Empleados** - Foto de perfil
- Sube JPG, PNG, GIF (máx 2MB)
- Se guarda en `storage/empleados/`
- **Visible en la tabla de empleados** ✨
- Preview en el formulario de edición

### **Archivos PDF** 
Los productos pueden tener fichas técnicas en PDF:

- Sube PDFs (máx 5MB)
- Se guardan en `storage/productos/pdfs/`

Para que funcione correctamente, ejecuta este comando una sola vez:
```bash
php artisan storage:link
```

### 1. Descargar dependencias

```bash
cd c:\xampp\htdocs\adminlte
composer install
npm install
```

### 2. Preparar la base de datos

```bash
php artisan migrate:refresh --seed
```
Esto crea todas las tablas con los datos de prueba.

### 3. Crear el enlace para imágenes

```bash
php artisan storage:link
```

### 4. Iniciar el servidor
```bash
php artisan serve
```

### 5. Acceder
Abre tu navegador y ve a `http://localhost:8000`

### Controllers 

**ClientesController** Maneja clientes y fotos
**ProductoController** Maneja productos, imágenes y PDFs
**MascotasController** Maneja mascotas e imágenes
**CitasController** Maneja citas 
**EmpleadosController** Maneja empleados e imágenes

### Vistas 
- Todas las listas con búsqueda DataTables
- Formularios con carga de archivos
- Previsualizaciones de imágenes
- Botones que cambian según permisos
- Paginación 

### Base de Datos (Las migraciones)

create_roles_table
add_role_id_to_users_table  
add_foto_to_clientes_table
add_imagen_and_archivo_to_productos_table
add_imagen_to_mascotas_table
add_imagen_to_empleados_table

## Si algo no funciona:

1. Asegúrate de ejecutar `php artisan storage:link`
2. Verifica que `npm install` se ejecutó sin errores
3. Comprueba que estás usando las credenciales correctas
4. Mira la consola del navegador (F12) para ver errores