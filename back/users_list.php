<?php
include_once "./db/base.php";

$users=all('users',['level'=>1]);
// print_r($users);
?>
<table>
    <thead>
        <td>id</td>
        <td>name</td>
        <td>acc</td>
    </thead>
<?php
foreach($users as $user){

   echo "<tr>";
   echo  "    <td>{$user['id']}</td>";
   echo  "    <td>{$user['name']}</td>";
   echo  "    <td>{$user['acc']}</td>";
   echo  "</tr>";
}
?>
</table>