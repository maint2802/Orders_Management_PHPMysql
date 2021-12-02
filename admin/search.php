<?php 
    include 'config.php';
    $result = $_POST["data"];
    $sql = "SELECT * FROM donhang WHERE name LIKE '%$result%'";
    $qr = mysqli_query($conn, $sql);
    if(mysqli_num_rows($qr)>0){
        $idrt = 0;
        while($row = mysqli_fetch_array($qr)){
            $idrt = $idrt + 1;
?>
        <tr>
            <td class="text-center"><?php echo $idrt?></td>
            <td class="text-center"><?php echo $row["idOrder"]?></td>
            <td class="text-center"><img src="<?php echo $row["pic"]?>" alt=""></td>
            <td class="text-left m-td-capi" ><?php echo $row["name"]?></td>
            <td class="text-left m-td-capi"><?php echo $row["type"]?></td>
            <td class="text-right" style="padding-right: 100px;"><?php echo number_format($row["receipt"], 0, '', '.'); ?>đ</td> 
            <td class="text-left"><a href="../order_item.html"  class="btn btn-lg btn-success"><?php echo $row["status"]?></a></td>
            <td>
                <a href="edit.php?id=<?php echo $row["id"]?>" class="btn m-btn btn-lg">Sửa</a>
                <a onclick="return Del()" href="delete.php?id=<?php echo $row["id"]?>"  class="btn m-btn btn-lg">Xóa</a>
            </td>
        </tr>

<?php 
    }
}?>