<?php
    foreach ($member_list as $key => $member) {
?>
<tr>
    <td><?php echo $member['name']; ?></td>
    <td><?php echo $member['unit_title']; ?></td>
    <td><?php echo $member['login_times']; ?></td>
    <td>
        <a href="<?= base_url()?>admin/edit_member/<?= $member['m_id']?>" class="btn btn-default">編輯</a>
    </td>
    <td>
        <button name="btn_reset" data-id="<?= $member['m_id']?>" class="btn btn-info">重設密碼</button>
    </td>
    <td>
        <a href="<?= base_url()?>admin/view_record/<?= $member['m_id']?>" class="btn btn-primary">查看表現</a>
    </td>
    <td>
        <button name="btnDel" data-id="<?= $member["m_id"];?>" class="btn btn-danger">刪除</button>
    </td>
</tr>
<?php
    }
?>