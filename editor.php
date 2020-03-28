<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de editor</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>

</head>
<body>
<div id="editor">This is some sample content.</div>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ),{
            toolbar:['heading','|','bold','italic','bulletedList','numberedList','blockQuote','undo','redo','fontsize']
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
</body>
</html>