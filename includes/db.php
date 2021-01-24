<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "herblandStore";

$conn = mysqli_connect($servername,$username,$password,$dbName);
if(!$conn)
{
  die("Connection failed".mysqli_connect_error());
}

function insert_item_Data()
{
    if(isset($_POST['submitBtn']))
    {
        global $conn;
        $itemname = $_POST['itemName'];
        $itemType = $_POST['itemType'];
        $itemPrice = $_POST['itemPrice'];
        $itemDesc = $_POST['itemDesc'];
      
        $filename = $_FILES["itemImg"]["name"];
        $tempname = $_FILES["itemImg"]["tmp_name"];
        $folder = "uploads/".$filename;   
        
        $imgExt_tmp = explode('.',$filename);
        $imgExt = strtolower(end($imgExt_tmp));
        $allowedExt = array('jpg','jpeg','png');

        if(in_array($imgExt,$allowedExt))
        {
        if (move_uploaded_file($tempname,$folder))
        {
            $stmt = $conn->prepare("INSERT INTO itemStore(itemName,itemPrice,itemType,itemDesc,itemPic) VALUES (?,?,?,?,?);");
            $stmt -> bind_param("sssss",$itemname,$itemPrice,$itemType,$itemDesc,$filename);
            $stmt -> execute();
            $stmt -> close();
            $conn->close();
        }
    }

        else
        {
            echo "jpg,jpeg and png only are allowed";
        }
         
}

}

function createUser()
{
    if(isset($_POST['userRegister']))
    {
        global $conn;
        $firstname = $_POST['firstName'];
        $lastname = $_POST['lastName'];
        $userEmail = $_POST['userEmail'];
        $userPassword = $_POST['userPassword'];
        $rePassword = $_POST['rePassword'];
        if($userPassword === $rePassword)
        {
            try {
                $stmt = $conn->prepare("INSERT INTO users (firstName,lastName,userEmail,userPassword) VALUES (?,?,?,?);");
                $stmt -> bind_param("ssss",$firstname,$lastname,$userEmail,$userPassword);
                $stmt->execute();
                $stmt->close();
                $conn ->close();                
            }catch(Exception $e)
            {
                echo "Error";
            }       

           
        }

        else
        {
            echo "No Match";
        }
    }
}


function login()
{
    global $conn;
    if(isset($_POST['user_submit']))
    {

  
    $inputEmail = $_POST['Usremail'];
    $inputPassword = $_POST['Usrpassword'];
        try {
            $stmt = "SELECT userEmail,userPassword from users where userEmail = '$inputEmail';";
            $result = mysqli_query($conn,$stmt);
            if(mysqli_num_rows($result)>0)
            {
                while($row = mysqli_fetch_array($result))
                     {
                         $userEmail = $row['userEmail'];
                         $userPassword = $row['userPassword'];
                     }
                    mysqli_close($conn);   
        
                    echo $userEmail,$userPassword;

                    if($userEmail == $inputEmail & $userPassword == $inputPassword)
                    {
                        $_POST['UserEmail'] = $userEmail;
                        $_POST['userPassword'] = $userPassword;
                        // header("Location:")
                    }
            }
           
        }
        catch (Exception $e)
        {
            echo "Error",$e;
        }

    }

    
}

function getItems()
{
    global $conn;
    $stmt = "SELECT * from itemStore LIMIT 10;";
    $result = mysqli_query($conn,$stmt);
    if(mysqli_num_rows($result)>0)
    {  
        return $result;
    }
    
}

function get_items_details($itemId)
{
    global $conn;
    $stmt = "SELECT * FROM itemStore where itemId = '$itemId' ;";
    $result = mysqli_query($conn,$stmt);
    if(mysqli_num_rows($result))
    {
        return $result;
    }
}

?>