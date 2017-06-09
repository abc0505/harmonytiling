<?php

  $params = "?pid=$nextPid";
  
  if(isset($category)) {
    $params .= "&category=$category";
  }
  if(isset($category)) {
    $params .= "&orderby=$orderby";
  }
  if(isset($product_id)) {
    $params .= "&product_id=$product_id";
  }


  // header("Location: index.php".$params);

?>

<script type="text/javascript">
  window.location.replace("index.php<?php echo $params; ?>");
</script>

<?php

// <!DOCTYPE html>
// <html lang="en">
//   <head>
//     <meta charset="utf-8">
//     <meta http-equiv="X-UA-Compatible" content="IE=edge">
//     <meta name="viewport" content="width=device-width, initial-scale=1">

//     <!-- jQuery -->
//     <script src="../components/jquery/dist/jquery.min.js"></script>
    
//     <script type="text/javascript">
//       /* global $ */
//       $(document).ready(function() {
//         $('#frm').submit();
//       });
      
//     </script>
//   </head>
//   <body>
//     <form id="frm" method="post" action="index.php">
//       <input type="hidden" name="pid" value="<-?php echo $nextPid ?->"/>
//     </form>
//   </body>
// </html>

?>