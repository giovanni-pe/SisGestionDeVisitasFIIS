# **Sistema de Gestión de Visitas**

Sistema web diseñado para gestionar representantes de visitas, visitas asociadas, solicitudes y horarios. Construido con Laravel, este sistema incluye características avanzadas como la gestión de representantes, integración con calendarios y administración de usuarios con roles.

---

## **Características**
- Gestión de representantes de visitas (nombre, correo, identificación, teléfono, etc.).
- Asignación de roles a los usuarios para acceso basado en permisos.
- Gestión completa de representantes y sus visitas asociadas.
- Visualización y programación de visitas en un calendario interactivo.
- Interfaz amigable con acciones como ver detalles, editar y eliminar.

---

## **Requisitos Previos**
- **PHP**: Versión 8.1 o superior
- **Composer**: Para gestionar dependencias de Laravel
- **Node.js** y **npm**: Para compilar activos de frontend
- **MySQL**: Como base de datos

---

## **Instalación**

### Pasos para Configurar el Proyecto

1. **Clonar el Repositorio**:
   ```bash
   git clone https://github.com/giovanni-pe/SisGestionDeVisitasFIIS.git
   cd sistema-gestion-visitas
   ```

2. **Instalar Dependencias**:
   ```bash
   composer install
   npm install
   ```

3. **Configurar el Archivo .env**:
   Copia el archivo de ejemplo .env.example a .env:
   ```bash
   cp .env.example .env
   ```
   Configura tus credenciales de base de datos y otras variables necesarias.

4. **Generar la Clave de la Aplicación**:
   ```bash
   php artisan key:generate
   ```

5. **Ejecutar Migraciones y Semillas**:
   Ejecuta las migraciones para crear las tablas necesarias:
   ```bash
   php artisan migrate
   ```
   Inserta datos de prueba, incluyendo usuarios y roles, ejecutando los seeders:
   ```bash
   php artisan db:seed --class=UserSeeder
   php artisan db:seed --class=RoleSeeder
   ```

6. **Compilar Recursos de Frontend**:
   ```bash
   npm run dev
   ```

7. **Iniciar el Servidor**:
   ```bash
   php artisan serve
   ```
   Accede al proyecto en tu navegador en: http://localhost:8000

---

## **Uso**

### Credenciales Iniciales

#### Cuenta de Administrador:
- **Correo**: admin@admin.com
- **Contraseña**: 123

### Acceso al Dashboard
1. Inicia sesión con las credenciales de administrador.
2. Navega al dashboard para gestionar representantes de visitas, visitas y calendarios.

### Flujo de Trabajo
- **Representantes de Visitas**:
  Agrega, edita o elimina representantes desde la sección correspondiente.
  Cada representante puede estar asociado a un usuario.
- **Visitas**:
  Programa visitas y visualiza horarios en el calendario.
- **Roles y Permisos**:
  Administra usuarios y asigna roles mediante el sistema de roles.

---

## **Estructura del Proyecto**
```
.
├── app
│   ├── Http
│   ├── Models
│   └── ...
├── database
│   ├── migrations
│   ├── seeders
│   └── ...
├── public
├── resources
│   ├── views
│   │   ├── visitor_representatives
│   │   └── ...
│   └── ...
└── routes
    ├── web.php
    └── ...
```

---

## **Contribuciones**
¡Las contribuciones son bienvenidas! Si deseas colaborar:

1. Realiza un fork del repositorio.
2. Crea una nueva rama para tu funcionalidad:
   ```bash
   git checkout -b feature-nueva-funcionalidad
   ```
3. Realiza tus cambios y haz un commit:
   ```bash
   git commit -m "Agregar nueva funcionalidad"
   ```
4. Sube tu rama:
   ```bash
   git push origin feature-nueva-funcionalidad
   ```
5. Abre un Pull Request.

---

## **Licencia**
Este proyecto está licenciado bajo la Licencia MIT.

---

## **Contacto**
Si tienes preguntas o sugerencias, no dudes en contactarnos:

- **Nombre**: Giovanni
- **GitHub**: giovanni-pe
