<!DOCTYPE html>
<html lang="fr">

<?php require APPROOT . '/views/includes/header-ui.php'; ?>

<body class="g-sidenav-show  bg-gray-100">
    <?php require APPROOT . '/views/includes/medSideMenu.php'; ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <?php require APPROOT . '/views/includes/medNavbar.php'; ?>

        <div class="container-fluid py-4">
            <div class="row mt-4">
                <div class="col-lg-8 col-12 mx-auto mb-5">
                    <form action="<?= URLROOT ?>/medecins/modifierPlanning" id="form" method="post">
                        <div class="card">
                            <div class="card-header p-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="mb-0">Renseigner vos Horaires</h6>
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-end align-items-center">
                                        <small>23 - 30 March 2020</small>
                                    </div>
                                </div>
                                <hr class="horizontal dark mb-0">
                            </div>
                            <div class="card-body p-3 pt-0">
                                <ul class="list-group list-group-flush" data-toggle="checklist">
                                    <li class="list-group-item border-0 flex-column align-items-start ps-0 py-0 mb-3">
                                        <div class="checklist-item checklist-item-primary ps-2 ms-3">
                                            <div class="d-flex align-items-center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="LUN" name="jours[]" id="checkLundi" onchange="activeDeactive('Lundi')">
                                                </div>
                                                <h6 class="mb-0 text-dark font-weight-bold text-sm">Lundi</h6>
                                            </div>
                                            <div class="row align-items-center ms-4 mt-3 ps-1">
                                                <div class="col-12 col-md-2">
                                                    <p class="text-xs mb-0 text-secondary font-weight-bold">Nombre RDV</p>
                                                    <input name="nbrRdvLundi" id="nbrRdvLundi" class="text-xs font-weight-bolder form-control" type="number" value="15" min="1" max="15" data-maxlength="2" oninput="this.value=this.value.slice(0,this.dataset.maxlength)" disabled />
                                                </div>
                                                <div class="col-12 col-md-2 ms-auto">
                                                    <p class="text-xs mb-0 text-secondary font-weight-bold">Heure de Debut</p>
                                                    <input name="heureDebutLundi" id="heureDebutLundi" class="text-xs font-weight-bolder form-control" type="time" value="08:00" min="08:00" max="18:00" onchange="javascript:checkHeureDebut('Lundi');" disabled />
                                                    <span id="heureDebutInfoLundi" class="text-xs text-danger"></span>
                                                </div>
                                                <div class="col-12 col-md-2 mx-auto">
                                                    <p class="text-xs mb-0 text-secondary font-weight-bold">Heure de Fin</p>
                                                    <input name="heureFinLundi" id="heureFinLundi" class="text-xs font-weight-bolder form-control" type="time" value="18:00" min="08:00" max="18:00" onchange="javascript:checkHeureFin('Lundi');" disabled />
                                                    <span id="heureFinInfoLundi" class="text-xs text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item border-0 flex-column align-items-start ps-0 py-0 mb-3">
                                        <div class="checklist-item checklist-item-success ps-2 ms-3">
                                            <div class="d-flex align-items-center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="MAR" name="jours[]" id="checkMardi" onchange="activeDeactive('Mardi')">
                                                </div>
                                                <h6 class="mb-0 text-dark font-weight-bold text-sm">Mardi</h6>
                                            </div>
                                            <div class="row align-items-center ms-4 mt-3 ps-1">
                                                <div class="col-12 col-md-2">
                                                    <p class="text-xs mb-0 text-secondary font-weight-bold">Nombre RDV</p>
                                                    <input name="nbrRdvMardi" id="nbrRdvMardi" class="text-xs font-weight-bolder form-control" type="number" value="15" min="1" max="15" data-maxlength="2" oninput="this.value=this.value.slice(0,this.dataset.maxlength)" disabled />
                                                </div>
                                                <div class="col-12 col-md-2 ms-auto">
                                                    <p class="text-xs mb-0 text-secondary font-weight-bold">Heure de Debut</p>
                                                    <input name="heureDebutMardi" id="heureDebutMardi" class="text-xs font-weight-bolder form-control" type="time" value="08:00" min="08:00" max="18:00" onchange="javascript:checkHeureDebut('Mardi');" disabled />
                                                    <span id="heureDebutInfoMardi" class="text-xs text-danger"></span>
                                                </div>
                                                <div class="col-12 col-md-2 mx-auto">
                                                    <p class="text-xs mb-0 text-secondary font-weight-bold">Heure de Fin</p>
                                                    <input name="heureFinMardi" id="heureFinMardi" class="text-xs font-weight-bolder form-control" type="time" value="18:00" min="08:00" max="18:00" onchange="javascript:checkHeureFin('Mardi');" disabled />
                                                    <span id="heureFinInfoMardi" class="text-xs text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item border-0 flex-column align-items-start ps-0 py-0 mb-3">
                                        <div class="checklist-item checklist-item-dark ps-2 ms-3">
                                            <div class="d-flex align-items-center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="MER" name="jours[]" id="checkMercredi" onchange="activeDeactive('Mercredi')">
                                                </div>
                                                <h6 class="mb-0 text-dark font-weight-bold text-sm">Mercredi</h6>
                                            </div>
                                            <div class="row align-items-center ms-4 mt-3 ps-1">
                                                <div class="col-12 col-md-2">
                                                    <p class="text-xs mb-0 text-secondary font-weight-bold">Nombre RDV</p>
                                                    <input name="nbrRdvMercredi" id="nbrRdvMercredi" class="text-xs font-weight-bolder form-control" type="number" value="15" min="1" max="15" data-maxlength="2" oninput="this.value=this.value.slice(0,this.dataset.maxlength)" disabled />
                                                </div>
                                                <div class="col-12 col-md-2 ms-auto">
                                                    <p class="text-xs mb-0 text-secondary font-weight-bold">Heure de Debut</p>
                                                    <input name="heureDebutMercredi" id="heureDebutMercredi" class="text-xs font-weight-bolder form-control" type="time" value="08:00" min="08:00" max="18:00" onchange="javascript:checkHeureDebut('Mercredi');" disabled />
                                                    <span id="heureDebutInfoMercredi" class="text-xs text-danger"></span>
                                                </div>
                                                <div class="col-12 col-md-2 mx-auto">
                                                    <p class="text-xs mb-0 text-secondary font-weight-bold">Heure de Fin</p>
                                                    <input name="heureFinMercredi" id="heureFinMercredi" class="text-xs font-weight-bolder form-control" type="time" value="18:00" min="08:00" max="18:00" onchange="javascript:checkHeureFin('Mercredi');" disabled />
                                                    <span id="heureFinInfoMercredi" class="text-xs text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item border-0 flex-column align-items-start ps-0 py-0 mb-3">
                                        <div class="checklist-item checklist-item-warning ps-2 ms-3">
                                            <div class="d-flex align-items-center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="JEU" name="jours[]" id="checkJeudi" onchange="activeDeactive('Jeudi')">
                                                </div>
                                                <h6 class="mb-0 text-dark font-weight-bold text-sm">Jeudi</h6>
                                            </div>
                                            <div class="row align-items-center ms-4 mt-3 ps-1">
                                                <div class="col-12 col-md-2">
                                                    <p class="text-xs mb-0 text-secondary font-weight-bold">Nombre RDV</p>
                                                    <input name="nbrRdvJeudi" id="nbrRdvJeudi" class="text-xs font-weight-bolder form-control" type="number" value="15" min="1" max="15" data-maxlength="2" oninput="this.value=this.value.slice(0,this.dataset.maxlength)" disabled />
                                                </div>
                                                <div class="col-12 col-md-2 ms-auto">
                                                    <p class="text-xs mb-0 text-secondary font-weight-bold">Heure de Debut</p>
                                                    <input name="heureDebutJeudi" id="heureDebutJeudi" class="text-xs font-weight-bolder form-control" type="time" value="08:00" min="08:00" max="18:00" onchange="javascript:checkHeureDebut('Jeudi');" disabled />
                                                    <span id="heureDebutInfoJeudi" class="text-xs text-danger"></span>
                                                </div>
                                                <div class="col-12 col-md-2 mx-auto">
                                                    <p class="text-xs mb-0 text-secondary font-weight-bold">Heure de Fin</p>
                                                    <input name="heureFinJeudi" id="heureFinJeudi" class="text-xs font-weight-bolder form-control" type="time" value="18:00" min="08:00" max="18:00" onchange="javascript:checkHeureFin('Jeudi');" disabled />
                                                    <span id="heureFinInfoJeudi" class="text-xs text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item border-0 flex-column align-items-start ps-0 py-0 mb-3">
                                        <div class="checklist-item checklist-item-primary ps-2 ms-3">
                                            <div class="d-flex align-items-center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="VEN" name="jours[]" id="checkVendredi" onchange="activeDeactive('Vendredi')">
                                                </div>
                                                <h6 class="mb-0 text-dark font-weight-bold text-sm">Vendredi</h6>
                                            </div>
                                            <div class="row align-items-center ms-4 mt-3 ps-1">
                                                <div class="col-12 col-md-2">
                                                    <p class="text-xs mb-0 text-secondary font-weight-bold">Nombre RDV</p>
                                                    <input name="nbrRdvVendredi" id="nbrRdvVendredi" class="text-xs font-weight-bolder form-control" type="number" value="15" min="1" max="15" data-maxlength="2" oninput="this.value=this.value.slice(0,this.dataset.maxlength)" disabled />
                                                </div>
                                                <div class="col-12 col-md-2 ms-auto">
                                                    <p class="text-xs mb-0 text-secondary font-weight-bold">Heure de Debut</p>
                                                    <input name="heureDebutVendredi" id="heureDebutVendredi" class="text-xs font-weight-bolder form-control" type="time" value="08:00" min="08:00" max="18:00" onchange="javascript:checkHeureDebut('Vendredi');" disabled />
                                                    <span id="heureDebutInfoVendredi" class="text-xs text-danger"></span>
                                                </div>
                                                <div class="col-12 col-md-2 mx-auto">
                                                    <p class="text-xs mb-0 text-secondary font-weight-bold">Heure de Fin</p>
                                                    <input name="heureFinVendredi" id="heureFinVendredi" class="text-xs font-weight-bolder form-control" type="time" value="18:00" min="08:00" max="18:00" onchange="javascript:checkHeureFin('Vendredi');" disabled />
                                                    <span id="heureFinInfoVendredi" class="text-xs text-danger"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="button-row d-flex mt-4">
                                <button type="button" onclick="return check();" class="btn bg-gradient-info ms-auto mb-0 js-btn">
                                    Mettre a Jour
                                </button>
                            </div>
                        </div>
                    </form>
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

        function check() {
            if (document.getElementById('checkLundi').checked || document.getElementById('checkMardi').checked ||
                document.getElementById('checkMercredi').checked || document.getElementById('checkJeudi').checked ||
                document.getElementById('checkVendredi').checked) {
                Swal.fire({
                    title: "Mise à Jour en Cours!",
                    html: "Terminé dans <b></b> millisecondes.",
                    timer: 2e3,
                    timerProgressBar: !1,
                    didOpen: () => {
                        Swal.showLoading(),
                            (e = setInterval(() => {
                                const e = Swal.getHtmlContainer();
                                if (e) {
                                    const t = e.querySelector("b");
                                    t && (t.textContent = Swal.getTimerLeft());
                                }
                            }, 100));
                    },
                    willClose: () => {
                        clearInterval(e);
                    },
                }).then((e) => {
                    e.dismiss, Swal.DismissReason.timer;
                    Swal.fire("Success!", "Votre planning a été mise a jour", "success").then((e) => {
                        document.getElementById("form").submit();
                    });
                });
                //Swal.fire("Success!", "Votre planning a été mise a jour", "success");
            } else {
                Swal.fire("Désolé!", "Veuillez renseigner au moins un jour", "error");
                return false;
            }

        }

        function activeDeactive(jour) {
            document.getElementById("nbrRdv" + jour).toggleAttribute("disabled");
            document.getElementById("heureDebut" + jour).toggleAttribute("disabled");
            document.getElementById("heureFin" + jour).toggleAttribute("disabled");
        }

        function checkHeureDebut(jour) {
            var heureDebut = document.getElementById("heureDebut" + jour).value;
            var heureFin = document.getElementById("heureFin" + jour).value;

            if (!(heureDebut < heureFin)) {
                document.getElementById("heureDebut" + jour).value = "08:00"
                document.getElementById("heureDebutInfo" + jour).innerHTML = "Renseigner une heure valide!";
            } else {
                document.getElementById("heureDebutInfo" + jour).innerHTML = "";
            }
        }

        function checkHeureFin(jour) {
            var heureDebut = document.getElementById("heureDebut" + jour).value;
            var heureFin = document.getElementById("heureFin" + jour).value;

            if (!(heureFin > heureDebut)) {
                document.getElementById("heureFin" + jour).value = "18:00"
                document.getElementById("heureFinInfo" + jour).innerHTML = "Renseigner une heure valide!";
            } else {
                document.getElementById("heureFinInfo" + jour).innerHTML = "";
            }
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