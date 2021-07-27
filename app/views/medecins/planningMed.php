<!DOCTYPE html>
<html lang="fr">

<?php require APPROOT . '/views/includes/header-ui.php'; ?>

<body class="g-sidenav-show  bg-gray-100">
    <?php require APPROOT . '/views/includes/medSideMenu.php'; ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <?php require APPROOT . '/views/includes/medNavbar.php'; ?>

        <div class="container-fluid py-4">
            <div class="row mt-4">
                <div class="col-xl-12">
                    <p class="text-center row p-1 mx-auto"><span class="col-xs-12 col-sm-6 col-lg-2 mt-sm-0 mt-2 p-2 text-xs text-white border-radius-lg bg-gradient-info">En attente</span><span class="col-xs-12 col-sm-6 col-lg-2 mt-md-0 mt-2 p-2 text-xs text-white border-radius-lg bg-gradient-success ms-sm-1">Confirmé</span><span class="col-xs-12 col-sm-6 col-lg-2 mt-md-0 mt-2 p-2 text-xs text-white border-radius-lg bg-warning ms-sm-1">Annulé</span><span class="col-xs-12 col-sm-6 col-lg-2 mt-md-0 mt-2 p-2 text-xs text-white border-radius-lg bg-danger ms-sm-1">Refusé</span></p>
                    <div class="card card-calendar">
                        <div class="card-body p-3">
                            <div class="calendar" data-bs-toggle="calendar" id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require APPROOT . '/views/includes/copyright-ui.php'; ?>
        </div>
    </main>
    </div>
    <!--   Core JS Files   -->
    <script src="<?= URLROOT ?>/assets/js/core/popper.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/core/bootstrap.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/choices.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/quill.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/flatpickr.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/dropzone.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/fullcalendar.min.js"></script>
    <script src="<?= URLROOT ?>/assets/js/plugins/sweetalert.min.js"></script>
    <script>
        const data = <?= json_encode($data) ?>;
        const rdvs = data['plannings'];
        const events = [];

        rdvs.forEach(rdv => {
            var className;
            if (rdv['etatRdv'] == 'Attente' ) {
                className = 'bg-gradient-info';
            }
            if (rdv['etatRdv'] == 'Confirmé' ) {
                className = 'bg-gradient-success';
            }
            if (rdv['etatRdv'] == 'Annulé' ) {
                className = 'bg-warning';
            }
            if (rdv['etatRdv'] == 'refuser' ) {
                className = 'bg-danger';
            }
            events.push({
                title: rdv['nomPatient']+' '+rdv['prenomPatient'],
                start: rdv['dateRdv'],
                end: rdv['dateRdv'],
                className: className
            });
        });

        function showMessage(e) {
            if ("success-message" == e)
                Swal.fire("Annulation!", "Le rendez-vous a été annulé", "success");
            else if ("delete-message" == e)
                Swal.fire("Suppression", "La rendez-vous a été supprimmer", "error");
        }
        var calendar = new FullCalendar.Calendar(document.getElementById("calendar"), {
            contentHeight: 'auto',
            dayMaxEvents: true,
            eventMaxStack: 2,
            initialView: "dayGridMonth",
            headerToolbar: {
                start: 'today prev,next', // will normally be on the left. if RTL, will be on the right
                center: 'title',
                end: 'dayGridMonth,timeGridWeek,timeGridDay' // will normally be on the right. if RTL, will be on the left
            },
            selectable: true,
            editable: true,
            initialDate: new Date(),
            events: events,
            views: {
                month: {
                    titleFormat: {
                        month: "long",
                        year: "numeric"
                    }
                },
                agendaWeek: {
                    titleFormat: {
                        month: "long",
                        year: "numeric",
                        day: "numeric"
                    }
                },
                agendaDay: {
                    titleFormat: {
                        month: "short",
                        year: "numeric",
                        day: "numeric"
                    }
                }
            },
            businessHours: [ // specify an array instead
                {
                    daysOfWeek: [1, 2, 3], // Monday, Tuesday, Wednesday
                    startTime: '08:00', // 8am
                    endTime: '18:00' // 6pm
                },
                {
                    daysOfWeek: [4, 5], // Thursday, Friday
                    startTime: '10:00', // 10am
                    endTime: '16:00' // 4pm
                }
            ],
        });

        calendar.render();

        if (document.querySelector('.datetimepicker')) {
            flatpickr('.datetimepicker', {
                allowInput: true
            }); // flatpickr
        }
    </script>
    <script>
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