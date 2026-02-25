# TEMPESTAD - Diario Digital

Este es un clon del front-end de un diario digital moderno, construido con React, Vite y Tailwind CSS.

## Despliegue en Vercel

Para desplegar este proyecto en Vercel, sigue estos pasos:

1. **Sube el código a GitHub**: Crea un nuevo repositorio en GitHub y sube todos los archivos de este proyecto.
2. **Conecta con Vercel**:
   - Ve a [Vercel](https://vercel.com/) e inicia sesión.
   - Haz clic en "Add New..." -> "Project".
   - Importa tu repositorio de GitHub.
3. **Configura las Variables de Entorno**:
   - Durante el paso de configuración en Vercel, busca la sección "Environment Variables".
   - Añade una nueva variable:
     - **Key**: `GEMINI_API_KEY`
     - **Value**: Tu clave de API de Google Gemini (si planeas usar funciones de IA).
4. **Despliega**: Haz clic en "Deploy". Vercel detectará automáticamente que es un proyecto de Vite y usará los comandos correctos (`npm run build`).

## Configuración Local

1. Instala las dependencias:
   ```bash
   npm install
   ```
2. Inicia el servidor de desarrollo:
   ```bash
   npm run dev
   ```

## Despliegue en WordPress

Para utilizar este diseño como un tema de WordPress:

1. **Genera la construcción de React**:
   ```bash
   npm run build
   ```
2. **Prepara la carpeta del tema**:
   - Localiza la carpeta `wordpress-theme` en este proyecto.
   - Copia la carpeta `dist` (generada en el paso anterior) dentro de `wordpress-theme`.
3. **Instala el tema**:
   - Comprime la carpeta `wordpress-theme` en un archivo `.zip`.
   - En tu panel de WordPress, ve a **Apariencia > Temas > Añadir nuevo > Subir tema**.
   - Sube el archivo `.zip` y actívalo.

El tema cargará automáticamente los archivos de React y renderizará la aplicación dentro de WordPress.

## Despliegue en Google Sites

Google Sites permite insertar contenido externo de dos maneras. Debido a que esta es una aplicación de React completa, la mejor forma de utilizarla es:

### Opción 1: Insertar mediante URL (Recomendado)
1. Despliega la aplicación en **Vercel** o **GitHub Pages** siguiendo las instrucciones anteriores.
2. En tu Google Site, ve a **Insertar > Insertar**.
3. Selecciona la pestaña **Mediante URL**.
4. Pega la URL de tu aplicación desplegada (ej. `https://tu-proyecto.vercel.app`).
5. Google Sites mostrará una vista previa; haz clic en **Insertar**.

### Opción 2: Insertar mediante Código (Embed Code)
Si prefieres usar el código directamente, ten en cuenta que Google Sites ejecuta el código en un iframe con restricciones. Puedes intentar lo siguiente:
1. Genera la construcción: `npm run build`.
2. Sube los archivos de la carpeta `dist` a un hosting que permita acceso directo a archivos (como Firebase Hosting o GitHub Pages).
3. Usa el siguiente código en el bloque de "Insertar código" de Google Sites:
   ```html
   <iframe 
     src="TU_URL_DESPLEGADA" 
     style="width:100%; height:100vh; border:none;" 
     allow="autoplay; encrypted-media; fullscreen;" 
     allowfullscreen>
   </iframe>
   ```

**Nota:** Google Sites no permite subir archivos `.js` o `.css` directamente a su plataforma, por lo que el alojamiento externo es obligatorio.
