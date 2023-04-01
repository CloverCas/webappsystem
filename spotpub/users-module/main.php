<table id="data-list">
      <tr>
        <th>#</th>
        <th>Code</th>
        <th>Name</th>
        <th>Position</th>
      </tr>
<?php //It is assumed that the code surrounding this block includes PHP or JavaScript code to populate the table with actual data.
$count = 1;
$count = 1;
if($user->list_users() != false){
foreach($user->list_users() as $value){
   extract($value);
?>
      <tr>
      <td><?php echo $count;?></td>
        <td><?php echo $user_id;?></td>
        <td><a href="index.php?page=users&action=profile&id=<?php echo $user_id;?>"><?php echo $user_lastname.', '.$user_firstname;?></a></td>
        <td><?php echo $user_access;?></td>
      </tr>
      <tr>
<?php
 $count++;
}
}else{
  echo "No Record Found.";
}
?>
    </table>
