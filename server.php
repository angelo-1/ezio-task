<?php 
header('Access-Control-Allow-Origin:*');
include('db.php');
error_reporting(E_ALL);
$action = isset($_POST['action']) ? $_POST['action'] : '';
$ref = isset($_POST['ref']) ? $_POST['ref'] : '';

if($ref=='angelo')
{
    if($action=='addcat'){
        $catOne = $_POST['categoryOne'];
        $catTwo = $_POST['categoryTwo'];
        
        $s = "SELECT category1 FROM catogory WHERE category1 = '$catOne'";
        $res = mysqli_query($conn, $s);
        if (mysqli_num_rows($res) > 0) {
            $json['status'] = 'failed';
            $json['message'] = 'Category already exists';
        }
        else{
        
        $sql="insert into catogory(category1,category2)values('$catOne','$catTwo')";

        if ($conn->query($sql) === TRUE) {
            $json['status'] = 'success';
            $json['message'] = 'created successfully';
        } else {
            $json['status'] = 'Error';
            $json['message'] = 'Error: ' . $conn->error;
            }
        }
    }
    if($action=='viewcat'){
	{
		$s = "SELECT category1 FROM catogory";
		$res = mysqli_query($conn, $s);
		$num = mysqli_num_rows($res);
		if ($num == 0) 
		{
			$json['status']='failed';
			$json['message']="No Data Found";
		}
		else 
		{

			$carr = array();
			$sqlii = "SELECT category1 FROM catogory";
			$selected = mysqli_query($conn, $sqlii);
			while($row = mysqli_fetch_assoc($selected))
			{
			    $carr[] = $row;
			}
            $json['status'] = 'success';
            $json['data'] = $carr;
		}
    }
}
    echo json_encode($json);
    $conn->close();
}
    
?>