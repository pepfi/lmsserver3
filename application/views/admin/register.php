<html>
<body>

<form action="<?php echo base_url('/register/register');?>" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="jsonFile" id="file" /> 
<br />
<input type="submit" name="submit" value="Submit" />
</form>

</body>
</html>