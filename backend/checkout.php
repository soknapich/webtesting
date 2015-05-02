<?php

if(!isset($_POST['name'])){
    return 0;
}

require('./functions.php');

function validation($name,$email,$code,$phone){
    $mes=array();
    
    if($name==''){
        $mes['name']='Name is empty';
    }
    
    /*****validate Email******/
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $mes['email'] = "Invalid email format";
    }
    
    if (strlen($phone)<6 || strlen($phone)>11) {
        // $phone is valid
         $mes['phone']='Invalid phone number';
    }
	
	if ($code=='') {
        // $phone is valid
         $mes['country_cde']='Invalid Country  code';
    }
    return  $mes;
}




$arr=validation($_POST['name'],$_POST['email'],$_POST['code'],$_POST['phone']);

$id=0;
if(count($arr)==0){
	$message="";
	if(checkFiveRecode($_POST['book_id'])<5){
        try
        {
            $executeQuery = db()->prepare("INSERT INTO checkouts (`timestamp`,name,email,phone,book_id)VALUES (:timestamp,:name,:email,:phone,:book_id)");

            $id=$executeQuery->execute(array(':timestamp'=>date('Y-m-d H:i:s'),
					':name'=>$_POST['name'],
					':email'=>$_POST['email'],
					':phone'=>'('.$_POST['code'].')'.$_POST['phone'],
					':book_id'=>$_POST['book_id'])
			);

        }
        catch(PDOException $e)
        {
            echo 'Query failed'.$e->getMessage();
        }
		
		$message='<div class="alert alert-success" role="alert">Successful!</div>';
		
	}else{
				
		$message="<div class='alert alert-danger' role='alert'>This book is checkout more than 5 times !</div>";
    }   
       echo json_encode(array('checkout_id'=>$id,'message'=>$message));
}else{
    
	$error="<div class='alert alert-danger' role='alert'>";
	
	foreach($arr as $k=>$val){
		$error.="<strong>".$k."</strong> : ".$val."<br/>";
	}
	$error.="</div>";
    echo json_encode(array('checkout_id'=>$id,'message'=>$error));

}

?>
