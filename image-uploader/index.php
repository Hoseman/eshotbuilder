<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">

    <!-- Display the add padding section -->
    <label>Padding:</label>
    <br>
    <input type="text" name="padding_1" value="0" class="input-1">
    <input type="text" name="padding_2" value="0" class="input-1">
    <input type="text" name="padding_3" value="0" class="input-1">
    <input type="text" name="padding_4" value="0" class="input-1">
    <br>
    <!-- Display the add padding section -->

    <br>

    <!-- banner link -->
    <div class="column-edit-section">
        <label>Banner Link:</label>
        <span><input type="text" name="href" placeholder="http://" value=""></span>
    </div>
    <!-- banner link -->

    <br>

    <!-- Alt Value-->
    <div class="column-edit-section">
        <label>ALT value:</label>
        <input type="text" name="alt_value" value="">
    </div>
    <!-- Alt Value-->

    <br>

    <!-- Upload an image -->
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="submit" name="submit">
    <!-- Upload an image -->

</form>

</body>
</html>
