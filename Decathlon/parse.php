<?php  

 if(!empty($_FILES["attachment"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "test"); 
      if(mysqli_connect_errno())
     {
          echo 'Failed to connect to database'.mysqli_connect_error();
     } 

      $file_array = explode(".", $_FILES["attachment"]["name"]);  
 
           include("Classes/PHPExcel/IOFactory.php");  
           $output = '';  
           $output .= "  
           <label class='text-success'>Data Inserted</label>  
                <table class='table table-bordered'>  
                     <tr>  
                          <th>Article</th>  
                          <th>Price</th>  
                          <th>Count</th>    
                     </tr>  
                     ";  
           $object = PHPExcel_IOFactory::load($_FILES["attachment"]["tmp_name"]);  
           foreach($object->getWorksheetIterator() as $worksheet)  
           {  
                $highestRow = $worksheet->getHighestRow(); 
                for($row=2; $row<=$highestRow; $row++)  
                {  
                     $article = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());  
                     $price = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());  
                     $count = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());  
                     
                     $query = "INSERT INTO `invoice` (`article`, `price`, `count`) 
                     VALUES ('".$article."', '".$price."', '".$count."')";

                    //  mysqli_query($connect, $query); 
                     if(mysqli_query($connect, $query)){
                         echo "<script>console.log('Success');</script>";
                     } else{
                         echo mysqli_error($connect);
                     } 
                     

                     $output .= '  
                     <tr>  
                          <td>'.$article.'</td>  
                          <td>'.$price.'</td>  
                          <td>'.$count.'</td>   
                     </tr>  
                     ';  
                }  
           }  
           $output .= '</table>';  
           echo $output;  
 }  
 ?> 