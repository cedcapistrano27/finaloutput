<?php    

session_start();

     if (!isset($_SESSION["admin"]) &&  $_SESSION["admin"] !== TRUE) {
          header("location: index.php");
          exit();
     }


     if (!isset($_SESSION["admin"])) {
               header("location: index.php");
               exit();   
          }

     if (isset($_SESSION["username"])) {
               header("location: welcome.php");
               exit();   
          }

  


 function fetch_data()    
 {    
      $output = '';    
      $conn = mysqli_connect("localhost", "root", "", "account");    
      $sql = "SELECT * FROM users";    
      $result = mysqli_query($conn, $sql);    
      while($row = mysqli_fetch_assoc($result))    
      {         
      $output .= '<tr>    
                          <td>'.$row["user_id"].'</td>    
                          <td>'.$row["username"].'</td>     
                          <td>'.$row["email"].'</td>
                          <td>'.$row["question"].'</td>
                          <td>'.$row["answer"].'</td>   
                     </tr>    
                          ';    
      }    
      return $output;    
 }    
 if(isset($_POST["generate_pdf"]))    
 {    
      require_once('tcpdf/tcpdf.php');    
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
      $obj_pdf->SetCreator(PDF_CREATOR);    
      $obj_pdf->SetTitle("Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP");    
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);    
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));    
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));    
      $obj_pdf->SetDefaultMonospacedFont('helvetica');    
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);    
      $obj_pdf->setPrintHeader(false);    
      $obj_pdf->setPrintFooter(false);    
      $obj_pdf->SetAutoPageBreak(TRUE, 10);    
      $obj_pdf->SetFont('helvetica', '', 11);    
      $obj_pdf->AddPage();    
      $content = '';    
      $content .= '    
      <h4 align="center">Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP</h4><br />   
      <table border="1" cellspacing="0" cellpadding="3">    
           <tr>    
                <th width="5%">Id</th>    
                <th width="15%">Userame</th>       
                <th width="50%">Email</th>
                <th width="15%">Question</th>
                <th width="10%">Answer</th>     
           </tr>    
      ';    
      $content .= fetch_data();    
      $content .= '</table>';    
      $obj_pdf->writeHTML($content);    
      $obj_pdf->Output('file.pdf', 'I');    
 }    
 ?>    
 <!DOCTYPE html>    
 <html>    
      <head>    
           <title>Admin Area | Database : User Account Table</title>    
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />              
      </head>    
      <body>    
           <br />  
           <div class="container">    
                <h4 align="center">Database : User Account Table</h4><br />    
                <div class="table-responsive">    
                    <div class="col-md-12" align="right">  
                     <form method="post">    
                          <input type="submit" name="generate_pdf" class="btn btn-success" value="Generate PDF" />    
                     </form>  
                     

                     
                     </div>  
                     <br>  
                     <br>  
                     <table class="table table-bordered">    
                          <tr>    
                               <th width="5%">Id</th>    
                               <th width="15%">Userame</th>       
                               <th width="50%">Email</th>
                               <th width="15%">Question</th>
                               <th width="10%">Answer</th>  
                          </tr>    
                     <?php    
                     echo fetch_data();    
                     ?>    
                     </table>    
                </div>    
           </div>  
           <center>
           <a href="adminpage.php" style="height: 35px; width: 150; margin-right: auto; margin-left: auto; text-align: center; background: #131313; color: #A7F5A3; border-radius: 3px; cursor: pointer; text-decoration: none; line-height: 2.3; padding: 10px;">Admin Page</a> </center>
      </body>    
</html>    