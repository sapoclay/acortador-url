# acortador-url
Esto es un acortador de URL que se puede utilizar en localhost o en un servidor.

![acortador-url](https://user-images.githubusercontent.com/6242827/220885309-0bed0044-75c6-425e-8186-fc6d30a4da4f.png)

Este código es una página web HTML con un poco de código PHP y JavaScript incluido.

Los datos de la conexión a la base de datos están dentro del archivo php/config.php. Entre los archivos se encuentra el .SQL para crear la base de datos necesaria para utilizar con este proyecto. También será necesario modificar el dominio (en caso de querer subirlo a un servidor) que se encuentra en el archivo JS.

Este proyecto incluye varios archivos HTML y CSS para formatear y diseñar la página web. En la web veremos un formulario en la página que permite a los usuarios ingresar una URL larga y acortarla. Al hacer clic en el botón "Acortar", se llama a una función de JavaScript que se encarga de realizar la lógica de acortar la URL y mostrar el resultado al usuario.

Finalmente, hay una ventana emergente en la página que permite a los usuarios editar la URL corta que se ha generado. Al hacer clic en el botón "Guardar", se guarda la URL corta en la base de datos del sitio web y se muestra el listado de direcciones acortadas.
