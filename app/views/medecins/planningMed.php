<!DOCTYPE html>
<html lang="fr">

<?php require APPROOT . '/views/includes/header-ui.php'; ?>

<body class="g-sidenav-show  bg-gray-100">
    <?php require APPROOT . '/views/includes/medSideMenu.php'; ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <?php require APPROOT . '/views/includes/medNavbar.php'; ?>

        <div class="container-fluid py-4">
            <div class="row mt-4">
                <div class="col-xl-9">
                    <div class="card card-calendar">
                        <div class="card-body p-3">
                            <div class="calendar" data-bs-toggle="calendar" id="calendar"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="row">
                        <div class="col-xl-12 col-md-6 mt-xl-0 mt-4">
                            <div class="card">
                                <div class="card-header p-3 pb-0">
                                    <h6 class="mb-0">Prochains Rendez-vous</h6>
                                </div>
                                <div class="card-body border-radius-lg p-3">
                                    <div class="d-flex">
                                        <div>
                                            <div class="icon icon-shape bg-success-soft shadow text-center border-radius-md shadow-none">
                                                <i class="ni ni-bell-55 text-lg text-success text-gradient opacity-10" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <div class="numbers">
                                                <h6 class="mb-1 text-dark text-sm">Cyber Week</h6>
                                                <span class="text-sm">27 March 2021, at 12:30 PM</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex mt-4">
                                        <div>
                                            <div class="icon icon-shape bg-success-soft shadow text-center border-radius-md shadow-none">
                                                <i class="ni ni-bell-55 text-lg text-success text-gradient opacity-10" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <div class="numbers">
                                                <h6 class="mb-1 text-dark text-sm">Meeting with Marry</h6>
                                                <span class="text-sm">24 March 2021, at 10:00 PM</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex mt-4">
                                        <div>
                                            <div class="icon icon-shape bg-success-soft shadow text-center border-radius-md shadow-none">
                                                <i class="ni ni-bell-55 text-lg text-success text-gradient opacity-10" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <div class="numbers">
                                                <h6 class="mb-1 text-dark text-sm">Book Deposit Hall</h6>
                                                <span class="text-sm">25 March 2021, at 9:30 AM</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex mt-4">
                                        <div>
                                            <div class="icon icon-shape bg-success-soft shadow text-center border-radius-md shadow-none">
                                                <i class="ni ni-bell-55 text-lg text-success text-gradient opacity-10" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <div class="numbers">
                                                <h6 class="mb-1 text-dark text-sm">Shipment Deal UK</h6>
                                                <span class="text-sm">25 March 2021, at 2:00 PM</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex mt-4">
                                        <div>
                                            <div class="icon icon-shape bg-success-soft shadow text-center border-radius-md shadow-none">
                                                <i class="ni ni-bell-55 text-lg text-success text-gradient opacity-10" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="ms-3">
                                            <div class="numbers">
                                                <h6 class="mb-1 text-dark text-sm">Verify Dashboard Color Palette</h6>
                                                <span class="text-sm">26 March 2021, at 9:00 AM</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
            initialDate: '2020-12-01',

            events: [{
                    title: 'Call with Dave',
                    start: '2020-11-18',
                    end: '2020-11-18',
                    className: 'bg-gradient-danger'
                },

                {
                    title: 'Lunch meeting',
                    start: '2020-11-21',
                    end: '2020-11-22',
                    className: 'bg-gradient-warning'
                },

                {
                    title: 'All day conference',
                    start: '2020-11-29',
                    end: '2020-11-29',
                    className: 'bg-gradient-success'
                },

                {
                    title: 'Meeting with Mary',
                    start: '2020-12-01',
                    end: '2020-12-01',
                    className: 'bg-gradient-info'
                },

                {
                    title: 'Winter Hackaton',
                    start: '2020-12-03',
                    end: '2020-12-03',
                    className: 'bg-gradient-danger'
                },

                {
                    title: 'Digital event',
                    start: '2020-12-07',
                    end: '2020-12-09',
                    className: 'bg-gradient-warning'
                },

                {
                    title: 'Digital event',
                    start: '2020-12-07',
                    end: '2020-12-09',
                    className: 'bg-gradient-warning'
                },

                {
                    title: 'Digital event',
                    start: '2020-12-07',
                    end: '2020-12-09',
                    className: 'bg-gradient-warning'
                },

                {
                    title: 'Marketing event',
                    start: '2020-12-10',
                    end: '2020-12-10',
                    className: 'bg-gradient-primary'
                },

                {
                    title: 'Dinner with Family',
                    start: '2020-12-19',
                    end: '2020-12-19',
                    className: 'bg-gradient-danger'
                },

                {
                    title: 'Black Friday',
                    start: '2020-12-23',
                    end: '2020-12-23',
                    className: 'bg-gradient-info'
                },

                {
                    title: 'Cyber Week',
                    start: '2020-12-02',
                    end: '2020-12-02',
                    className: 'bg-gradient-warning'
                },

            ],
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
            dateClick: function(info) {
                showMessage("success-message");
            }
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