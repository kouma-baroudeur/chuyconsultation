<!DOCTYPE html>
<html lang="fr">

<?php require APPROOT . '/views/includes/header-ui.php'; ?>

<body class="g-sidenav-show  bg-gray-100">
    <?php require APPROOT . '/views/includes/medSideMenu.php'; ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <?php require APPROOT . '/views/includes/medNavbar.php'; ?>

        <div class="container-fluid py-4">
            <input id="msg" value="<?= $data['msg'] ?>" hidden>
            <div class="row mb-8">
                <h6>Aujourd'hui</h6>
                <hr class="horizontal dark my-1" />
                <?php for ($i = 0; $i < 20; $i++) : ?>
                    <div class="col-sm-6 col-lg-4 mt-lg-4 mt-4">
                        <div class="card overflow-hidden">
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape bg-info-soft shadow text-center border-radius-md shadow-none">
                                        <i class="ni ni-bell-55 text-lg text-info text-gradient opacity-10" aria-hidden="true"></i>
                                    </div>
                                    <div class="ms-3">
                                        <p class="text-sm text-capitalize mb-0 font-weight-bold">Nom du Patient</p>
                                        <h5 class="font-weight-bolder text-sm mb-0">
                                            Date de consultation
                                        </h5>
                                    </div>
                                    <div class="progress-wrapper ms-auto w-auto">
                                        <div class="d-flex">
                                            <form class="form-check form-switch ms-auto" id="1" action="validerRdv" method="post">
                                                <input name="idConsultation" value="<?= $rdv->numeroRdv ?>" type="text" hidden>
                                                <button type="button" class=" btn btn-default btn-xs bg-white text-xs text-info font-weight-bold border-radius-md shadow-none" for="statut" onclick="javascript: showAlert('action',1);">action</button>
                                                <!--<button class="text-xs text-info btn btn-default btn-xs bg-white" for="statut" onclick="javascript: showAlert('warning-message-and-confirmation',1);">action</button>-->
                                            </form>
                                            <form name="1" action="supprimmerRdv" method="post" hidden>
                                                <input name="idConsultation" value="<?= $rdv->numeroRdv ?>" type="text" hidden>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
            <?php require APPROOT . '/views/includes/copyright-ui.php'; ?>
        </div>
    </main>
    </div>
    <!--   Core JS Files   -->
    <script src="<?= URLROOT ?>/assets/js/core/bootstrap.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/sweetalert.min.js"></script>
    <!-- Kanban scripts -->
    <script src="<?= URLROOT ?>/assets/js/plugins/multistep-form.js"></script>

    <script>
        window.onload = function() {
            var msg = document.getElementById("msg").value;
            if (msg != null || msg != "") {
                showMessage(msg);
            }
        };

        function showMessage(e) {
            if ("success-message" == e)
                Swal.fire("Confirmation!", "Le rendez-vous a été confirmé", "success");
            else if ("delete-message" == e)
                Swal.fire("Suppression", "La demande a été supprimmer", "error");
        }

        function showAlert(e, id) {
            if ("action" == e) {
                const n = Swal.mixin({
                    customClass: {
                        confirmButton: "btn bg-gradient-success",
                        cancelButton: "btn bg-gradient-danger",
                    },
                    buttonsStyling: !1,
                });
                n.fire({
                    title: "Voulez-vous vraiment annuler le rendez-vous?",
                    text: "Veuillez faire un choix!",
                    type: "info",
                    showCancelButton: !0,
                    confirmButtonText: "Oui, je le veux",
                    cancelButtonText: "Annuler",
                    reverseButtons: !1,
                }).then((e) => {
                    e.value ?
                        document.getElementById(id).submit() :
                        e.dismiss === Swal.DismissReason.cancel;
                });
            }
        }

        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= URLROOT ?>/assets/js/soft-ui-dashboard.min2c70.js?v=1.0.3"></script>
</body>


<!-- Mirrored from demos.creative-tim.com/soft-ui-dashboard-pro/pages/applications/wizard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Jul 2021 01:31:33 GMT -->

</html>