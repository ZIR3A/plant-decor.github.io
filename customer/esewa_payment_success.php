<?php

include("includes/db.php");


        if (isset($_REQUEST['oid']) &&
            isset($_REQUEST['amt']) &&
            isset($_REQUEST['refId'])
         ) {


          
        }
    




    $cust_ord = "select * from customer_order where invoice_no = '".$_REQUEST['oid']."'";
    $result = mysqli_query($con, $cust_ord);

    
   
    if ($result) {
        if (mysqli_num_rows($result)==1) {
            $order = mysqli_fetch_assoc($result);
            $order_status = $order['order_status'];

            if ($order_status =='Complete') {
                echo"
                <script>alert('Your payment has been done already. Thank you for visit.')</script>;
                <script>window.open('my_account.php?my_order','_self')</script>;";
            }else{


            $url = "https://uat.esewa.com.np/epay/transrec";
            $data =[
                'amt'=> $order['due_amount'],
                'rid'=> $_REQUEST['refId'],
                'pid'=> $order['invoice_no'],
                'scd'=> 'EPAYTEST',
            ];

                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($curl);
                $response_code = get_xml_node_value('response_code',$response);
                
                        $update_co = "update customer_order set order_status = 'Complete',
                        payment_method = 'Online Payment' where order_id='".$order['order_id']."'";
    
                       // $update_co = "update customer_order set payment_method = 'Online Payment' where order_id='".$order['order_id']."'";
                            $run_insert = mysqli_query($con,$update_co);
                            echo"
                            <script>alert('Your payment has been successful. Thank you for visit.')</script>;
                            <script>window.open('my_account.php?my_order','_self')</script>;";
        
                    }
                  
    

                
                   
                }
               

}
                

            
        
    

    function get_xml_node_value($node, $xml){

        if($xml == false){
            return false;
        }
        $found = preg_match('#<'.$node.'(?:\s+[^>]+)?>(.*?)'.'</'.$node.'>#s', $xml,$matches);
        if ($found != false){
            return $matches[1];

    }
    return false;
}


?>

