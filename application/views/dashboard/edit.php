<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <section class="col-lg-5 connectedSortable">
                    <h1>Edit User</h1>

                    <p><span class="error">* required field</span></p>

                    <form method="POST" action="<?= base_url() . 'welcome/edit/' . $user['id'] ?>">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name *</label>
                            <input type="text" name="name" value="<?= set_value('name', $user['pname']) ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <?=
                            form_error('name')
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" name="email" value="<?= set_value('email', $user['email']) ?>" class="form-control" id="exampleInputPassword1">
                            <?= form_error('email') ?>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">PhoneNumber *</label>
                            <input type="text" name="phoneNumber" value="<?= set_value('phoneNumber', $user['phoneNumber']) ?>" class="form-control" id="exampleInputPassword1">
                            <?= form_error('phoneNumber') ?>
                        </div>

                        <button type="submit" name="update" value="edit" class="btn btn-primary">Update</button>
                        <a href="<?= base_url() . 'welcome/insert' ?>" class="btn btn-dark">Cancel</a>

                    </form>
                </section>

                <section class="col-md-7 col-sm-12 connectedSortable">

                    <div class="row d-flex align-items-center">
                        <div>
                            <h1>List User</h1>
                            <input class="form-control mb-3 h-25 col-md-12" id="myInput" type="search" placeholder="Search Record...">
                        </div>
                    </div>

                    <div class="table-responsive table-responsive-sm">
                        <table class="table border">
                            <tr class="bg-info">
                                <th class="text-center text-dark">Name</th>
                                <th class="text-center text-dark">Email</th>
                                <th class="text-center text-dark">PhoneNumber</th>
                                <th class="text-center text-dark">Actions</th>

                            </tr>
                            <?php
                            if (!empty($users)) {
                                foreach ($users as $val) {
                            ?>
                                    <tbody id="myTable">

                                        <tr>
                                            <td class="p-1"><?= $val['pname'] ?></td>
                                            <td class="p-1"><?= $val['email'] ?></td>
                                            <td class="p-1"><?= $val['phoneNumber'] ?></td>
                                            <td class="d-flex flex-row justify-content-center p-1">
                                                <a class="btn btn-sm btn-warning mr-1" href="<?php echo base_url() . 'welcome/show/' . $val['id'] ?>">Show</a>

                                                <a onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-sm btn-danger mr-1" href="<?php echo base_url() . 'welcome/delete/' . $val['id'] ?>">Delete </a>

                                                <a class="btn btn-info btn-sm" href="<?php echo base_url() . 'welcome/edit/' . $val['id'] ?>">Edit</a>
                                            </td>
                                        </tr>
                                    </tbody>

                                <?Php }
                            } else {
                                ?>
                                <tr>
                                    <td>Records Not Found</td>
                                <tr>
                                <?php
                            }
                                ?>
                        </table>
                    </div>


                    <?php echo $this->pagination->create_links(); ?>



                </section>


            </div>
        </div>
    </section>

</div>