<?php
require("./assets/config.php");

if(isset($_REQUEST['upload_prophoto'])){
    $imageId = "CPS".time();
    $title = mysqli_escape_string($con,$_POST['title']);
    $ptype = mysqli_escape_string($con,$_POST['ptype']);
    $pmaker = mysqli_escape_string($con,$_POST['pmaker']);
    $price = mysqli_escape_string($con,$_POST['price']);
    $dprice= (empty($_POST['dprice']))? $price:mysqli_escape_string($con,$_POST['dprice']);

    // $dprice = mysqli_escape_string($con,$_POST['dprice']);
    $desc = mysqli_escape_string($con,$_POST['desc']);
    $category = mysqli_escape_string($con,$_POST['category']);
    $BT = mysqli_escape_string($con,$_POST['BannerText']);

	$tmpFilePath = $_FILES['fileuplaod']['tmp_name'];
	$tmpFilePath2 = $_FILES['fileuplaod2']['tmp_name'];
	if(!empty($tmpFilePath) && !empty($tmpFilePath2)){
		$temporary = explode(".", $_FILES['fileuplaod']['name']);
        $file_extension = end($temporary);

		$temporary2 = explode(".", $_FILES['fileuplaod2']['name']);
		$file_extension2 = end($temporary2);

		$validextensions = array("jpeg", "jpg", "png", "JPEG", "JPG", "PNG");
		if(in_array($file_extension, $validextensions)&& in_array($file_extension2, $validextensions)){
			$shortname = "$title"."_img_1"."-".time().".".$file_extension;
			$shortname2 = "$title"."_img_2"."-".time().".".$file_extension2;
			$filePath = "../assets/img/products/".$shortname;
			$filePath1 = "./assets/img/products/".$shortname;
			$filePath2 = "../assets/img/products/".$shortname2;
			$filePath2a = "./assets/img/products/".$shortname2;
			// $query = mysqli_query($con,"SELECT * FROM users WHERE Refnum = '$refnum'");
			// $rows = mysqli_fetch_assoc($query);
			// $photo = $rows['photo'];
			// if(!empty($photo) ){
			// 	unlink("../profile_photo/".$photo);//delete file if it exist
            // }
            //  chmod("../display/images/uploads/",0755);
			if(move_uploaded_file($tmpFilePath, $filePath) && move_uploaded_file($tmpFilePath2, $filePath2)){
        $stmt = mysqli_query($con, "INSERT IGNORE INTO products(imageid,title,imagedesc,ptype,pmaker,price,dprice,category,bannertext,imagepath,imagepath2) VALUES('$imageId','$title','$desc','$ptype','$pmaker','$price','$dprice','$category','$BT','$filePath1','$filePath2a')");

				echo $stmt?"success":"failed";
			}
		}
		else{
			echo "invalid";
		}		
	}
	else{
		echo "nofile";
	}
}

if(isset($_REQUEST['Newcat'])){
    $imageId = "MAD".time();
    $texty = mysqli_escape_string($con,$_POST['texty']);

	$tmpFilePath = $_FILES['catlogo']['tmp_name'];
	if(!empty($tmpFilePath)){
		$temporary = explode(".", $_FILES['catlogo']['name']);
		$file_extension = end($temporary);
		$validextensions = array("jpeg", "jpg", "png", "JPEG", "JPG", "PNG");
		if(in_array($file_extension, $validextensions)){
			$shortname = $texty."_logo"."-".date('His').".".$file_extension;
			$filePath = "../assets/img/categories/".$shortname;
			$filePathS = "assets/img/categories/".$shortname;
			// $query = mysqli_query($con,"SELECT * FROM users WHERE Refnum = '$refnum'");
			// $rows = mysqli_fetch_assoc($query);
			// $photo = $rows['photo'];
			// if(!empty($photo) ){
			// 	unlink("../profile_photo/".$photo);//delete file if it exist
            // }
            //  chmod("../display/images/uploads/",0755);
			if(move_uploaded_file($tmpFilePath, $filePath)){
        $stmt = mysqli_query($con, "INSERT IGNORE INTO categories(texty,logo) VALUES('$texty','$filePathS')");

				echo $stmt?"success":"failed";
			}
		}
		else{
			echo "invalid";
		}		
	}
	else{
		echo "nofile";
	}
}

if(isset($_POST['deleteImage'])){
    // $imageId = "MAD".time();
    $id = mysqli_escape_string($con,$_POST['deleteImage']);

			$query = mysqli_query($con,"SELECT * FROM products WHERE id = '$id'");
			$rows = mysqli_fetch_assoc($query);
			$imagepath = $rows['imagepath'];
			if(!empty($imagepath) ){
                unlink($imagepath);//delete file if it exist
                unlink($imagepath2);//delete file if it exist
                $query = mysqli_query($con,"DELETE  FROM products WHERE id = '$id'");
                
            }
		}
if(isset($_POST['deleteLogo'])){
    // $imageId = "MAD".time();
    $id = mysqli_escape_string($con,$_POST['deleteLogo']);

			$query = mysqli_query($con,"SELECT * FROM categories WHERE id = '$id'");
			$rows = mysqli_fetch_assoc($query);
			$imagepath = $rows['logo'];
			if(!empty($imagepath) ){
                unlink("../".$imagepath);//delete file if it exist
                $query = mysqli_query($con,"DELETE  FROM categories WHERE id = '$id'");
                
            }
		}
    
        if(isset($_POST['makeBanner'])){	
            $twek = $_POST['makeBanner'];
        
            $GetImage = mysqli_query($con,"SELECT * FROM products WHERE id ='$twek'");
            $image = mysqli_fetch_assoc($GetImage);
            $banner = $image['banner'];
            // $lname = $User['lname'];
            // $email = $User['email'];
            // $fullname="$fname $lname";
 if ($banner=="yes") {
 $revert="no";    
 }       else {
     $revert="yes";
 }
            $Delsql = mysqli_query($con, "UPDATE products SET banner ='$revert' WHERE id = '$twek'");
        
            if ($Delsql) {
echo "success";  } else {
    echo "failed";
}
        }
        
        if(isset($_POST['makeBestSelling'])){	
            $twek = $_POST['makeBestSelling'];
        
            $GetImage = mysqli_query($con,"SELECT * FROM products WHERE id ='$twek'");
            $image = mysqli_fetch_assoc($GetImage);
            $featured = $image['featured'];
            // $lname = $User['lname'];
            // $email = $User['email'];
            // $fullname="$fname $lname";
 if ($featured=="yes") {
 $revert="no";    
 }       else {
     $revert="yes";
 }
            $Delsql = mysqli_query($con, "UPDATE products SET featured ='$revert' WHERE id = '$twek'");
        
            if ($Delsql) {
echo "success";  } else {
    echo "failed";
}
        }

        if(isset($_REQUEST['NewArrival'])){	
            $twek = $_POST['makeNewArrival'];
        
            $GetImage = mysqli_query($con,"SELECT * FROM products WHERE id ='$twek'");
            $image = mysqli_fetch_assoc($GetImage);
            $isnew = $image['isnew'];
            // $lname = $User['lname'];
            // $email = $User['email'];
            // $fullname="$fname $lname";
 if ($isnew=="yes") {
 $revert="no";    
 }       else {
     $revert="yes";
 }
            $Actioner = mysqli_query($con, "UPDATE products SET isnew ='$revert' WHERE id = '$twek'");
        
            if ($Actioner) {
echo "success";  } else {
    echo "failed";
}
        }
 

        if(isset($_POST['makeThumbnail'])){	
            $twek = $_POST['makeThumbnail'];
        
            $GetImage = mysqli_query($con,"SELECT * FROM products WHERE id ='$twek'");
            $image = mysqli_fetch_assoc($GetImage);
            $thumbnail = $image['thumbnail'];
            // $lname = $User['lname'];
            // $email = $User['email'];
            // $fullname="$fname $lname";
 if ($thumbnail=="yes") {
 $revert="no";    
 }       else {
     $revert="yes";
 }
            $Delsql = mysqli_query($con, "UPDATE products SET thumbnail ='$revert' WHERE id = '$twek'");
        
            if ($Delsql) {
echo "success";  } else {
    echo "failed";
}
        }
 
        
        
        if(isset($_REQUEST['EditPhoto'])){
            $id = mysqli_escape_string($con,$_POST['imageId']);
            $title = mysqli_escape_string($con,$_POST['editTitle']);
            $price = mysqli_escape_string($con,$_POST['editPrice']);
            $dprice = mysqli_escape_string($con,$_POST['editDPrice']);
            $ptype = mysqli_escape_string($con,$_POST['editType']);
            $pmaker = mysqli_escape_string($con,$_POST['editMaker']);
            $desc = mysqli_escape_string($con,$_POST['editDesc']);
            $BT = mysqli_escape_string($con,$_POST['editBannerText']);
            $category = mysqli_escape_string($con,$_POST['editCat']);
        
                $stmt = mysqli_query($con, "UPDATE products SET title ='$title',imagedesc= '$desc',bannertext= '$BT',category = '$category' ,price = '$price' ,ptype = '$ptype',pmaker = '$pmaker' ,dprice = '$dprice'  WHERE id = '$id'");
        
                        echo $stmt?"success":"failed";
                }
        
?>