<?php
get_header();
?>
<div id="wp_content">
    <?php get_sidebar('login') ?>
    <div class="content">
        <form action="">
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
                    
                            <tr>
                                <td>1</td>
                                <td><?php echo $info_admin['fullname'] ?></td>
                                <td><?php echo $info_admin['username']; ?></td>
                                <td><?php echo $info_admin['password'] ?></td>
                                <td><?php echo $info_admin['email'] ?></td>
                            </tr>
                   

                </tbody>
            </table>
        </form>
    </div>

</div>
<?php
get_footer();
?>