<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('layouts/admin/head') ?>
</head>

<body class="g-sidenav-show   bg-gray-100">

        <!-- Sidebar -->
        <?= $this->include('layouts/admin/sidebar') ?>
        <!-- End of Sidebar -->

            <!-- Main Content -->
            <main class="main-content position-relative border-radius-lg ">
                <!-- Topbar -->
                <?= $this->include('layouts/admin/navbar') ?>
                <!-- End of Topbar -->

                    <!-- DataTales Example -->
                    <?= $this->renderSection('content') ?>

            <!-- End of Main Content -->

            <!-- Footer -->
            <?= $this->include('layouts/admin/footer') ?>

            </main>

        <!-- End of Content Wrapper -->

    <!-- End of Page Wrapper -->
    <?= $this->renderSection('scripts') ?>
    <!-- Logout Modal-->
    <?= $this->include('layouts/admin/scripts') ?>

</body>

</html>