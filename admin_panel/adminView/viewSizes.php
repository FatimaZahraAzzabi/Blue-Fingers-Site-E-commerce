
<div >
  <h3>Messages</h3>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">C.M.</th>
        <th class="text-center">Full name</th>
        <th class="text-center" >email</th>
        <th class="text-center" >message</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from contact";
      $result=$conn-> query($sql);
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$row["id_msg"]?></td>   
      <td><?=$row['full_name']?></td>
      <td><?=$row['email']?></td>
      <td><?=$row['message']?></td>
      </tr>
      <?php
            
          }
        }
      ?>
  </table>

  