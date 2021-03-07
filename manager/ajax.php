<?php
require("./assets/config.php");

if(isset($_REQUEST['upload_prophoto'])){
    $imageId = "MAD".time();
    $title = mysqli_escape_string($con,$_POST['title']);
    $desc = mysqli_escape_string($con,$_POST['desc']);
    $category = mysqli_escape_string($con,$_POST['category']);
    $BT = mysqli_escape_string($con,$_POST['BannerText']);

	$tmpFilePath = $_FILES['fileuplaod']['tmp_name'];
	if(!empty($tmpFilePath)){
		$temporary = explode(".", $_FILES['fileuplaod']['name']);
		$file_extension = end($temporary);
		$validextensions = array("jpeg", "jpg", "png", "JPEG", "JPG", "PNG");
		if(in_array($file_extension, $validextensions)){
			$shortname = "upload"."-".date('dmyHis').".".$file_extension;
			$filePath = "../display/images/uploads/".$shortname;
			// $query = mysqli_query($con,"SELECT * FROM users WHERE Refnum = '$refnum'");
			// $rows = mysqli_fetch_assoc($query);
			// $photo = $rows['photo'];
			// if(!empty($photo) ){
			// 	unlink("../profile_photo/".$photo);//delete file if it exist
            // }
            //  chmod("../display/images/uploads/",0755);
			if(move_uploaded_file($tmpFilePath, $filePath)){
        $stmt = mysqli_query($con, "INSERT IGNORE INTO images(imageid,title,imagedesc,category,bannertext,imagepath) VALUES('$imageId','$title','$desc','$category','$BT','$filePath')");

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
			$filePath = "../images/".$shortname;
			$filePathS = "images/".$shortname;
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

			$query = mysqli_query($con,"SELECT * FROM images WHERE id = '$id'");
			$rows = mysqli_fetch_assoc($query);
			$imagepath = $rows['imagepath'];
			if(!empty($imagepath) ){
                unlink($imagepath);//delete file if it exist
                $query = mysqli_query($con,"DELETE  FROM images WHERE id = '$id'");
                
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
        
            $GetImage = mysqli_query($con,"SELECT * FROM images WHERE id ='$twek'");
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
            $Delsql = mysqli_query($con, "UPDATE images SET banner ='$revert' WHERE id = '$twek'");
        
            if ($Delsql) {
echo "success";  } else {
    echo "failed";
}
        }
        
        if(isset($_POST['makeLatest'])){	
            $twek = $_POST['makeLatest'];
        
            $GetImage = mysqli_query($con,"SELECT * FROM images WHERE id ='$twek'");
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
            $Delsql = mysqli_query($con, "UPDATE images SET featured ='$revert' WHERE id = '$twek'");
        
            if ($Delsql) {
echo "success";  } else {
    echo "failed";
}
        }
 
        if(isset($_POST['makeThumbnail'])){	
            $twek = $_POST['makeThumbnail'];
        
            $GetImage = mysqli_query($con,"SELECT * FROM images WHERE id ='$twek'");
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
            $Delsql = mysqli_query($con, "UPDATE images SET thumbnail ='$revert' WHERE id = '$twek'");
        
            if ($Delsql) {
echo "success";  } else {
    echo "failed";
}
        }
 
        
        
        if(isset($_REQUEST['EditPhoto'])){
            $id = mysqli_escape_string($con,$_POST['imageId']);
            $title = mysqli_escape_string($con,$_POST['editTitle']);
            $desc = mysqli_escape_string($con,$_POST['editDesc']);
            $BT = mysqli_escape_string($con,$_POST['editBannerText']);
            $category = mysqli_escape_string($con,$_POST['editCat']);
        
                $stmt = mysqli_query($con, "UPDATE images SET title ='$title',imagedesc= '$desc',bannertext= '$BT',category = '$category' WHERE id = '$id'");
        
                        echo $stmt?"success":"failed";
                }
        
?>