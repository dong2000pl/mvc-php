<div class="list">
    <div class="header">
            <h3>Quản lí thành viên</h3>
            <a href="index.php?action=add" class="list-btn">Thêm thành viên</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Năm sinh</th>
                <th>Quê quán</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $stt = 1;
                foreach($datas as $value){

                
            ?>
            <tr>
                <td><?php echo $stt ?></td>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['born']; ?></td>
                <td><?php echo $value['address']; ?></td>
                <td>
                    <a href="index.php?action=edit&id=<?php echo $value['id']; ?>">Edit</a>
                    <a href="index.php?action=delete&id=<?php echo $value['id']; ?>" title="Delete"
                    onclick="return confirm('Xóa thành viên <?php echo $value['name']; ?>?')">delete</a>
                </td>
            </tr>

            <?php
                $stt++;
                }
            ?>
        </tbody>
    </table>
</div>