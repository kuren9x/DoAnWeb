<?php
get_header();
?>
<div id="wp_content">
    <?php get_sidebar() ?>
    <div class="content">
        <form action="">
            <h1>Danh sách thành viên</h1>
            <table>
                <thead>
                    <tr>
                        <td>STT</td>
                        <td>Tên</td>
                        <td>Tài khoản</td>
                        <td>Password</td>
                        <td>Email</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($list_user)) {
                        $t = $start;
                        foreach ($list_user as $user) {
                            $t++;
                    ?>
                            <tr>
                                <td><?php echo $t; ?></td>
                                <td><?php echo $user['fullname'] ?></td>
                                <td><?php echo $user['username']; ?></td>
                                <td><?php echo $user['password'] ?></td>
                                <td><?php echo $user['email'] ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>

                </tbody>
            </table>
        </form>
        <div class="container_1">
            <p class="count_user"><?php echo 'có ' . $count_user . ' thành viên' ?> </p>
            <!-- <div class="clearfix"></div> -->
            <?php
            //  get_pagging($page, $total_page, $base_url = "?mod=user&controller=index&action=index") 
             ?>
        </div>
    </div>

</div>
<?php
get_footer();
?>