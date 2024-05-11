<?php include('header.view.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="./css/normalizer.css">
    <link rel="stylesheet" href="./css/styleJaz.css">

    <title>CRUD</title>
    <style>
        
    </style>
</head>
<body>
    <br>
    <div class="grid-container div container">
        <div class="first-column">
            <img src="images/Trofeo.png" alt="" class="my-image">
        </div>
       <div class="animate__animated animate__slideInRight" id="GenerarReporte">
    
       <span class="spani">Nombre:</span><span class="animate__animated animate__slideInRight"><?php echo htmlspecialchars($resultadoEmpleado['nombre'] ?? 'No disponible'); ?></span><br>
    <span class="spani">Nombre de usuario:</span><span class="animate__animated animate__slideInLeft"><?php echo htmlspecialchars($resultadoEmpleado['usuario'] ?? 'No disponible'); ?></span><br>
    <span class="spani">Carros lavados:</span><span class="animate__animated animate__slideInLeft"><?php echo htmlspecialchars($resultadoEmpleado['carros'] ?? 'No disponible'); ?></span><br>
    <span class="spani">Correo:</span><span class="animate__animated animate__slideInLeft"><?php echo htmlspecialchars($resultadoEmpleado['correo'] ?? 'No disponible'); ?></span><br> 
    <br><button id="btnGenerarReporte" class="btni" style="background-color: #5783BC;" >Reporte PDF</button></td>
        </div> 
    </div>
    <div class="div container" >
        <span>Responsable</span>
        <div class="search-container">
            <input type="text" name="search" id="search"  placeholder="Buscar responsable..." >
            <img src="images/ImgBuscar.png" alt="Buscar" class="search-icon">
        </div>
    </div>
    <br>
    <div class="div" id="GenerarPdf">
    <?php echo $resultadoTareas; ?>
      
    </div>
    <br>
    <div class="div container">
    <button  class="btni" style="background-color: #5783BC;" id="btnGenerarPDF">Reporte</button>
    </div>
   <script type="text/javascript" src="jspdf.min.js"></script>
   <script type="text/javascript">

document.getElementById('btnGenerarPDF').addEventListener('click', function() {
    var doc = new jsPDF();
    
    let content = document.getElementById('GenerarPdf').innerHTML;
   
    // Opcional: eliminar cualquier tag script que pueda haber sido inyectado
    content = content.replace(/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi, "");

    doc.fromHTML(content, 15, 15, {
        'width': 177, // ajustar al ancho de tu PDF
    });
    doc.save('Informacion.pdf');
});
    </script>
    <script type="text/javascript">

document.getElementById('btnGenerarReporte').addEventListener('click', function() {
    var doc = new jsPDF();
    
    let content = document.getElementById('GenerarReporte').innerHTML;
   
    // Opcional: eliminar cualquier tag script que pueda haber sido inyectado
    content = content.replace(/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi, "");

    doc.fromHTML(content, 15, 15, {
        'width': 177, // ajustar al ancho de tu PDF
    });
    doc.save('Informacion.pdf');
});
    </script>
    <script>
        function search() {
            var searchValue = document.getElementById('search').value;
            // Realizar búsqueda con searchValue
            console.log('Buscar:', searchValue);
        }
      

    </script>
</body>
</html>
