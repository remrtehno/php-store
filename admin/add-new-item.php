<?php



include('../DB.php');



/**
* Simple autoloader, so we don't need Composer just for this.
*/
class Autoloader
{
    public static function register()
    {
        spl_autoload_register(function ($class) {
            $file = str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
            if (file_exists($file)) {
                require $file;
                return true;
            }
            return false;
        });
    }
}
Autoloader::register();

use Intervention\Image\ImageManagerStatic as Image;




if($_POST['query'] == 'users') {
	$user_id = $_POST['user_id'];
	$name = $_POST['name'];
	$login = $_POST['login'];
	$pass = $_POST['pass'];
	
	$res = mysql_query("INSERT users (name,login,pass) VALUES ('$name', '$login', $pass)");
	
	
	header("location: all_user.php");
}

if($_POST['query'] == 'categories') {

	$name = $_POST['name'];

	
	$res = mysql_query("INSERT categories (name) VALUES ('$name')");
	
	header("location: edit-category-products.php");
}

if($_POST['query'] == 'commetns') {
	$id = $_POST['id'];
	$author = $_POST['name'];
	$text = $_POST['text'];

	
	$res = mysql_query("UPDATE commetns SET author='$author', text='$text' WHERE id=$id");
	
	header("location: all_cmnt.php");
}

if($_POST['query'] == 'product_items') {
	$id = $_POST['id'];
	$cat_id = $_POST['cat_id'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$img_slug = $_POST['img_slug'];
	$in_stock = $_POST['in_stock'];
	$model = $_POST['model'];
	$description = $_POST['description'];
	$brand = $_POST['brand'];
	
	
	//print_r($_FILES['img_slug']);
	/*
	$uploaddir = '/';
	$uploadfile = $uploaddir . basename($_FILES['img_slug']['name']);

	if (move_uploaded_file($_FILES['img_slug']['tmp_name'], $uploadfile)) {
	    echo "File is valid, and was successfully uploaded.\n";
	} else {
	    echo "Possible file upload attack!\n";
	}
	*/
	
	
	$nameImg = $_FILES['img_slug']['name'];
	$img = Image::make($_FILES['img_slug']["tmp_name"])->resize(200, 150)->save('../uploads/img/' .$nameImg. '.jpg');
	$img_slug = '../uploads/img/' .$nameImg. '.jpg';
	


	

	$res = mysql_query("INSERT product_items 
		   (cat_id,name,price, img_slug, in_stock, model, description, brand) 
	VALUES ($cat_id,'$name',$price, '$img_slug', '$in_stock' ,'$model', '$description', '$brand')");
	
	header("location: edit-products.php");
}



?>