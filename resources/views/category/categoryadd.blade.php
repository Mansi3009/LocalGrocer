<!DOCTYPE html>
<html>
<head>
	<title>Category</title>
</head>
<body>
<form action="{{ route('categoryadd') }}" method="post">
	@csrf
	Category Name : <input type="text" name="c_name"><br>
	Category Image : <input type="file" name="c_image"><br>
	<button type="submit" name="submit">Submit</button> 
</form>
</body>
</html>