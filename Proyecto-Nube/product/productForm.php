<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Producto - Prueba Nube</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
            <div class="container mt-5">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>Ingrese producto</h1>
                                <form name="submit-form" method="POST">

                                    <input type="hidden" class="form-control mb-3" name="id" value="=ROW() - ROW(B$1) + 1">
                                    <input type="text" class="form-control mb-3" name="name" placeholder="Nombre">
                                    <input type="text" class="form-control mb-3" name="type" placeholder="Tipo">
                                    <input type="number" class="form-control mb-3" name="price" placeholder="Precio">
                                    <input type="number" class="form-control mb-3" name="stock" placeholder="Existencias">
                                    
                                    <input type="submit" class="btn btn-primary">
                                </form>
                        </div>
                        <script>
                            let scriptURL = 'Script';
                            let form = document.forms['submit-form'];

                            form.addEventListener('submit', e => {
                                e.preventDefault();
                                fetch(scriptURL,{
                                    method: 'POST',
                                    body: new FormData(form)
                                })
                                .then((res) => {
                                    console.log(res);
                                    if(res.status === 200){
                                        form.reset();
                                        alert('Datos Guardados');
                                    }
                                })
                                .catch((error) => {
                                    console.error('Error', error.message)
                                });
                            });
                        </script>
                        
                    </div>  
            </div>
    </body>
</html>