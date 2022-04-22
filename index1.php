<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./ckeditor/ckeditor.js"></script>
    <script src="./ckfinder/ckfinder.js"></script>
</head>

<body>
    <textarea class=" ckeditor" name="" id="editor1" cols="30" rows="10"></textarea>
    <script>
        var editor = CKEDITOR.replace('editor1');
        // CKFinder.setupCKEditor(editor);
    </script>
    <input type="number" id="fname" name="fname" maxlength="3" min="0" max="20" oninvalid="this.setCustomValidity('Enter User Name Here')"><br><br>
</body>

</html>