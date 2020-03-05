<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    
    <title>Ingreso de Antecedentes</title>
</head>
<body>
<style>
.table td {
    border-top: none!important;
}

</style>
    <div class="container">
        <h1 class="mt-3">Ingreso de Antecedentes</h1>
        <form action="ingreso_antecedente.php">
        <table class="table table-bordeless container">
        <tbody>
                <tr>
                    <td>Interviene:</td>
                    <td>
                        <div class="form-group d-flex">
                            <select id="inputState" class="form-control">
                                <option selected>Elegir...</option>
                                <option>Juan Carlos A.</option>
                                <option>Claudio Rodriguez</option>
                                <option>Marie León</option>
                            </select>
                        </div>
                    </td>
                </tr>
                        <script type="text/javascript">

                        </script>   
                <tr>
                    <td>Cargo</td>
                    <td><input class="form-control form-control-sm" type="text" placeholder="" readonly></td>
                </tr>
                <tr>
                    <td>Fecha</td>
                    <td><input class="form-control form-control-sm" type="text" placeholder=""></td>
                </tr>
                <tr>
                    <td>Procedimiento</td>
                    <td><input class="form-control form-control-sm" type="text" placeholder="" ></td>
                </tr>
                
                <tr>
                    <td>Registro:</td>
                    <td>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </td>
                 </tr>
                 <form>
  <div class="form-group">
    <label for="exampleFormControlFile1">Example file input</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>
</form>
            </tbody>
            </table>
        </form>
        
    </div>
    
</body>
</html>