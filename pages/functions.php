<?php
//Configuration of Database
include_once("config.php");
session_start();
//Start of Functions
if($_POST["procedure"]=="saveUser")
{
  
    try {
        $ajaxResponse = array();
        $firstname = $_POST['firstname'];  
        $middlename = $_POST['middlename']; 
        $lastname = $_POST['lastname']; 

        $suffix = $_POST['suffix'];  
        $username = $_POST['username']; 
        $password = $_POST['password']; 
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $email = $_POST['email']; 
        $ipAddress = $_POST['ipAddress'];
 
        $sthandler = $dbConn->prepare("SELECT username FROM login_tbl WHERE username = :username");
        $sthandler->bindParam(':username', $username);
        $sthandler->execute();

        if($sthandler->rowCount() > 0){
            $ajaxResponse["status"]	= 	"Existing";
        } else {

            if (!empty($_POST)) {

                $sql = "INSERT INTO login_tbl(firstName, middleName, lastName,suffix,username,password,email,ipAddress,status) 
                VALUES(:firstname, :middlename, :lastname,:suffix,:username,:password,:email,:ipAddress, 1)";
                $query = $dbConn->prepare($sql);
                $query->bindparam(':firstname', $firstname);
                $query->bindparam(':middlename', $middlename);
                $query->bindparam(':lastname', $lastname);
                $query->bindparam(':suffix', $suffix);
                $query->bindparam(':username', $username);
                $query->bindparam(':password', $hash);
                $query->bindparam(':email', $email);
                $query->bindparam(':ipAddress', $ipAddress);
                $query->execute();

                $ajaxResponse["status"]	= 	"Success";
            }

        }
    
    } catch(PDOException $error) {
        $ajaxResponse["status"]	= 	"Failed";
        echo $sql . "<br>" . $error->getMessage();
    }
        echo json_encode($ajaxResponse);

}else if($_POST["procedure"]=="loginUser"){

    try {
        $ajaxResponse = array();

        $username = $_POST['username']; 
        $password = $_POST['password']; 

            $sql = "SELECT * FROM login_tbl WHERE username =:username LIMIT 1";
            $query = $dbConn->prepare( $sql );
            $query->execute(array(':username'=>$username));
            $results = $query->fetchAll( PDO::FETCH_ASSOC ); 
            
            foreach( $results as $row ){ 
                if(password_verify($_POST['password'], $row['password'])){
                    $ajaxResponse["status"]	= 	"Success";
                    $_SESSION['userId'] = $row['userId'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['lastName'] = $row['lastName'];
                    $_SESSION['firstName'] = $row['firstName'];
                }
                else
                {
                    $ajaxResponse["status"]	= 	"Invalid";
                }
           }
            
    
    } catch(PDOException $error) {
        $ajaxResponse["status"]	= 	"Failed";
        echo $sql . "<br>" . $error->getMessage();
    }
        echo json_encode($ajaxResponse);

}else if($_POST["procedure"]=="saveOrder"){
  
    try {
        $ajaxResponse = array();
        $referenceNo = $_POST['referenceNo'];  
        $address = $_POST['address']; 
        $paymentType = $_POST['paymentType'];
        $creditCardNo = $_POST['creditCardNo']; 
        $expirationDate = $_POST['expirationDate'];  
        $cvvNo = $_POST['cvvNo']; 
        $userId = $_POST['userId']; 
        $status = 0; 
        $finalTotal = 0;

        foreach($_SESSION['item_cart'] as $key => $value)
        {
    
            // $finalTotal=array();
            $finalTotal += $value['product_quantity'] * $value['product_price'];
            $status = 0;
            $orderSummary[] =  $value['product_name'];
        
        }
    
        $orders = implode(',', $orderSummary);

 
        if (!empty($_POST)) {

            $sql = "INSERT into order_tbl(referenceNo,userId,paymentType,address,orderSummary,creditCardNo,expirationDate,total,cvvNumber,status) 
            VALUES(:referenceNo, :userId, :paymentType, :address,:orderSummary, :creditCardNo,:expirationDate,:total,:cvvNumber,:status)";
            $query = $dbConn->prepare($sql);
            $query->bindparam(':referenceNo', $referenceNo);
            $query->bindparam(':userId', $userId);
            $query->bindparam(':paymentType', $paymentType);
            $query->bindparam(':address', $address);
            $query->bindparam(':orderSummary', $orders);
            $query->bindparam(':creditCardNo', $creditCardNo);
            $query->bindparam(':expirationDate', $expirationDate);
            $query->bindparam(':total', $finalTotal);
            $query->bindparam(':cvvNumber', $cvvNo);
            $query->bindparam(':status', $status);
            $query->execute();

            
            $sql = "UPDATE login_tbl SET address=:address WHERE userId=:userId";
            $query = $dbConn->prepare($sql);
            $query->bindparam(':address', $address);
            $query->bindparam(':userId', $userId);
            $query->execute();


            if( $query ){
                $ajaxResponse["status"]	= 	"Success";
                foreach($_SESSION['item_cart'] as $key => $value)
                {
                        
                         $product_price =  $value['product_price'];
                         $product_id =  $value['product_id'];
                         $product_quantity =  $value['product_quantity'];
                         $product_name =  $value['product_name'];
                         $product_price =  $value['product_price'];
                        
                         $subTotal = $value['product_price'] * $value['product_quantity'];
                         $status = 0;

                         $sql = "INSERT INTO products_transactions_tbl(product_id,referenceNo,product_name,product_quantity,product_price,total,status) 
                         VALUES(:product_id, :referenceNo, :product_name,:product_quantity, :product_price,:total,:status)";
                         $query = $dbConn->prepare($sql);
                         $query->bindparam(':product_id', $product_id);
                         $query->bindparam(':referenceNo', $referenceNo);
                         $query->bindparam(':product_name', $product_name);
                         $query->bindparam(':product_quantity', $product_quantity);
                         $query->bindparam(':product_price', $product_price);
                         $query->bindparam(':total', $subTotal);
                         $query->bindparam(':status', $status);
                         $query->execute();
                       
                } 
               
            }else{
                $ajaxResponse["status"]	= 	"Invalid";    
            }

            unset ($_SESSION["item_cart"]);
         

          
        }

    
    } catch(PDOException $error) {
        $ajaxResponse["status"]	= 	"Failed";
        echo $sql . "<br>" . $error->getMessage();
    }
        echo json_encode($ajaxResponse);

}else if($_POST["procedure"]=="loginAdmin"){

    try {
        $ajaxResponse = array();

        $username = $_POST['username']; 
        $password = $_POST['password']; 

            $sql = "SELECT * FROM tbl_admin WHERE username =:username AND password=:password";
            $query = $dbConn->prepare( $sql );
            $query->bindParam("username", $username);
            $query->bindParam("password", $password);
            $query->execute();

            if ($query->rowCount() > 0) {
                $_SESSION['adminId'] = $_POST['username']; 
                $ajaxResponse["status"]	= 	"Success";
            } else {
                $ajaxResponse["status"]	= 	"Invalid";
            }
           
    
    } catch(PDOException $error) {
        $ajaxResponse["status"]	= 	"Failed";
        echo $sql . "<br>" . $error->getMessage();
    }
        echo json_encode($ajaxResponse);

}
?>