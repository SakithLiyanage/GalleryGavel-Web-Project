<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new Listing || GallerGavel</title>
    <script src="https://kit.fontawesome.com/42e5148630.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/addnew.css">
    <script>
        function validateForm() {
            var title = document.getElementById("title").value;
            var artist = document.getElementById("artist").value;
            var descrip = document.getElementById("descrip").value;
            var dimensions = document.getElementById("dimensions").value;
            var medium = document.getElementById("medium").value;
            var startingPrice = document.getElementById("startingPrice").value;
            var images = document.getElementById("documents").files;

            if (title == "" || artist == "" || descrip == "" || dimensions == "" || medium == "" || startingPrice == "" || images.length == 0) {
                alert("All fields are required");
                return false;
            }
        }
    </script>
</head>

<body>
    <div class="add-box">
        <form enctype="multipart/form-data" action="add.php" method="POST" onsubmit="return validateForm()">
            Title : <input type="text" id="title" name="title" required><br>
            Artist : <input type="text" id="artist" name="artist" required><br>
            Description : <textarea id="descrip" name="descrip" rows="4" cols="24" required></textarea><br>
            Dimensions : <input type="text" id="dimensions" name="dimensions" required><br>
            Medium : <input type="text" id="medium" name="medium" required><br>
            Starting Price : <input type="number" id="startingPrice" name="startingPrice" required><br>
            Images : <input type="file" id="image" name="image"value="add" accept=".jpg, .jpeg, .png" required>
            <input type="submit" value="Submit" class="submit"><br>
        </form>
    </div>
</body>

</html>