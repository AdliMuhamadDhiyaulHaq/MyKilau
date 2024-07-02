<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu | Program</title>

    <link rel="stylesheet" href="mazer/assets/css/main/app.css">
    <link rel="stylesheet" href="mazer/assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="mazer/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="mazer/assets/images/logo/favicon.png" type="image/png">

    <link rel="stylesheet" href="mazer/assets/css/shared/iconly.css">

    <link rel="stylesheet" href="mazer/assets/css/pages/fontawesome.css">
    <link rel="stylesheet" href="mazer/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="mazer/assets/css/pages/datatables.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <table>
                            <tr>

                                <td class="text-primary fw-bold" style="font-size:20px; width:30px; height:15px">
                                    App
                                </td>
                                <td class="mb-5" style="margin-left: -20px">
                                    <img src="mazer/assets/images/bg/kilau.jpeg" style="width: 140px; height:50px">
                                </td>
                            </tr>
                        </table>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">

                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0 " type="checkbox" id="toggle-dark">
                                <label class="form-check-label"></label>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                        <li class="sidebar-item  ">
                            <a href="dashboard" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item active ">
                            <a href="program" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Program</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="layout-page">

            <div id="main">
                <header class="mb-3">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </header>
                <div class="page-heading">
                    <h4>Program</h4>
                </div>
                <div class="page-content">
                    <section class="section">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <select id="sumber_dana_filter" class="form-control">
                                                    <option value="">Pilih Sumber Dana</option>
                                                    @foreach ($sumberDanaOptions as $sumberDana)
                                                        <option value="{{ $sumberDana }}">{{ $sumberDana }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select id="keterangan_filter" class="form-control">
                                                    <option value="">Pilih Keterangan</option>
                                                    @foreach ($keteranganOptions as $keterangan)
                                                        <option value="{{ $keterangan }}">{{ $keterangan }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 text-end">
                                        <button type="button" class="btn btn-primary" id="createNewProgram">Tambah
                                            Program</button>
                                    </div>
                                </div>

                                <br>

                                <div id="successAlert"></div>
                                <!-- Alert Error -->
                                <div id="errorAlert"></div>


                                <div class="table-responsive">
                                    <table id="programs-table" class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Sumber Dana</th>
                                                <th>Program</th>
                                                <th>Keterangan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($data))
                                                @foreach ($data as $program)
                                                    <tr>
                                                        <td>{{ $program->id }}</td>
                                                        <td>{{ $program->sumber_dana }}</td>
                                                        <td>{{ $program->program }}</td>
                                                        <td>{{ $program->keterangan }}</td>
                                                        <td>
                                                            <a href="javascript:void(0)"
                                                                class="edit btn btn-warning btn-sm editProgram"
                                                                data-id="{{ $program->id }}"><i
                                                                    class="bi bi-pencil-fill"></i></a>

                                                            <a href="javascript:void(0)"
                                                                class="btn btn-danger btn-sm deleteProgram"
                                                                data-id="{{ $program->id }}"><i
                                                                    class="bi bi-trash-fill"></i></a>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                    </section>


                    <!-- Modal Tambah -->
                    <div class="modal fade" id="ajaxModel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modelHeading">Tambah Program</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div id="formErrorAlert" class="alert alert-danger d-none"></div>
                                    <form id="programForm" name="programForm" class="form-horizontal">
                                        <input type="hidden" name="program_id" id="program_id">
                                        <div class="mb-3">
                                            <label for="sumber_dana" class="col-sm-12 control-label">Sumber
                                                Dana</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="sumber_dana"
                                                    name="sumber_dana" placeholder="Enter Sumber Dana" maxlength="50"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="program" class="col-sm-2 control-label">Program</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="program"
                                                    name="program" placeholder="Enter Program" maxlength="50"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="keterangan"
                                                    name="keterangan" placeholder="Enter Keterangan" maxlength="50"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-sm-offset-2 d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button type="submit" class="btn btn-primary" id="saveBtn"
                                                value="create">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="editProgramModal" tabindex="-1"
                        aria-labelledby="editProgramModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editProgramModalLabel">Edit Program</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div id="editFormErrorAlert" class="alert alert-danger d-none"></div>

                                    <form id="editProgramForm" name="editProgramForm" class="form-horizontal">
                                        <input type="hidden" name="program_id" id="edit_program_id">
                                        <div class="form-group">
                                            <label for="edit_sumber_dana" class="col-sm-4 control-label">Sumber
                                                Dana</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="edit_sumber_dana"
                                                    name="sumber_dana" placeholder="Masukkan Sumber Dana" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_program" class="col-sm-4 control-label">Program</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" id="edit_program"
                                                    name="program" placeholder="Masukkan Program" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_keterangan"
                                                class="col-sm-4 control-label">Keterangan</label>
                                            <div class="col-sm-12">
                                                <textarea id="edit_keterangan" name="keterangan" required placeholder="Masukkan Keterangan" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="button" class="btn btn-primary" id="editSaveBtn">Save
                                                changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Modal Konfirmasi Penghapusan -->
                    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog"
                        aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Penghapusan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus program ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                        aria-label="Close">Batal</button>
                                    <button type="button" class="btn btn-danger"
                                        id="confirmDeleteButton">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>






                </div>
            </div>

            {{-- FOOTER --}}
        </div>
    </div>

    <script src="mazer/assets/js/bootstrap.js"></script>
    <script src="mazer/assets/js/app.js"></script>
    <script src="mazer/assets/extensions/jquery/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="mazer/assets/js/pages/datatables.js"></script>

    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('#programs-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('programs.getPrograms') }}",
                    data: function(d) {
                        if ($('#sumber_dana_filter').val()) {
                            d.sumber_dana = $('#sumber_dana_filter').val();
                        }
                        if ($('#keterangan_filter').val()) {
                            d.keterangan = $('#keterangan_filter').val();
                        }
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'sumber_dana',
                        name: 'sumber_dana'
                    },
                    {
                        data: 'program',
                        name: 'program'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],

            });

            $('#sumber_dana_filter, #keterangan_filter').on('change', function() {
                table.draw();
            });

            $('#createNewProgram').click(function() {
                $('#saveBtn').val("create-program");
                $('#program_id').val('');
                $('#programForm').trigger("reset");
                $('#modelHeading').html("Tambah Program");
                $('#formErrorAlert').addClass('d-none'); // Sembunyikan alert kesalahan jika ada
                $('#ajaxModel').modal('show');
            });

            $(document).on('click', '.editProgram', function() {
                var program_id = $(this).data('id');
                $.get("{{ url('programs') }}" + '/' + program_id + '/edit', function(response) {
                    if (response.success) {
                        var data = response.data;
                        $('#modelHeading').html("Edit Program");
                        $('#editSaveBtn').val("edit-program");
                        $('#edit_program_id').val(data.id);
                        $('#edit_sumber_dana').val(data.sumber_dana);
                        $('#edit_program').val(data.program);
                        $('#edit_keterangan').val(data.keterangan);
                        $('#editProgramModal').modal('show');
                        $('#formErrorAlertEdit').addClass(
                            'd-none'); // Sembunyikan alert kesalahan jika ada
                    } else {
                        $('#errorAlert').html(
                            '<div class="alert alert-danger"><i class="bi bi-x-circle"></i> ' +
                            response.error + '</div>').fadeIn().delay(3000).fadeOut();
                    }
                }).fail(function() {
                    $('#errorAlert').html(
                        '<div class="alert alert-danger"><i class="bi bi-x-circle"></i> Failed to load program data.</div>'
                    ).fadeIn().delay(3000).fadeOut();
                });
            });

            $('#editSaveBtn').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');
                var program_id = $('#edit_program_id').val();

                // Validasi semua kolom
                var sumber_dana = $('#edit_sumber_dana').val();
                var program = $('#edit_program').val();
                var keterangan = $('#edit_keterangan').val();
                if (sumber_dana.trim() === '' || program.trim() === '' || keterangan.trim() === '') {
                    $('#formErrorAlertEdit').removeClass('d-none').html(
                        '<i class="bi bi-x-circle"></i> Semua kolom wajib diisi.'
                    );
                    $(this).html('Save changes');
                    return;
                }

                $.ajax({
                    data: $('#editProgramForm').serialize(),
                    url: "{{ url('programs') }}" + '/' + program_id,
                    type: "PUT",
                    dataType: 'json',
                    success: function(data) {
                        $('#editProgramForm').trigger("reset");
                        $('#editProgramModal').modal('hide');
                        table.draw();
                        $('#successAlert').html(
                            '<div class="alert alert-success"><i class="bi bi-check-circle"></i> ' +
                            data.success + '</div>').fadeIn().delay(3000).fadeOut();
                        $('#editSaveBtn').html('Save changes');
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        $('#editSaveBtn').html('Save changes');
                        $('#errorAlert').html(
                            '<div class="alert alert-danger"><i class="bi bi-x-circle"></i> Gagal menyimpan program.</div>'
                        ).fadeIn().delay(3000).fadeOut();
                    }
                });
            });

            $('#saveBtn').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');

                // Validasi semua kolom
                var sumber_dana = $('#sumber_dana').val();
                var program = $('#program').val();
                var keterangan = $('#keterangan').val();
                if (sumber_dana.trim() === '' || program.trim() === '' || keterangan.trim() === '') {
                    $('#formErrorAlert').removeClass('d-none').html(
                        '<i class="bi bi-x-circle"></i> Semua kolom wajib diisi.'
                    );
                    $(this).html('Save changes');
                    return;
                }

                $.ajax({
                    data: $('#programForm').serialize(),
                    url: "{{ route('programs.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $('#programForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();
                        $('#successAlert').html(
                            '<div class="alert alert-success"><i class="bi bi-check-circle"></i> ' +
                            data.success + '</div>').fadeIn().delay(3000).fadeOut();
                        $('#saveBtn').html('Save changes');
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save changes');
                        $('#errorAlert').html(
                            '<div class="alert alert-danger"><i class="bi bi-x-circle"></i> Gagal menyimpan program.</div>'
                        ).fadeIn().delay(3000).fadeOut();
                    }
                });
            });

            var deleteProgramId;

            $('body').on('click', '.deleteProgram', function() {
                deleteProgramId = $(this).data("id");
                $('#confirmDeleteModal').modal('show');
            });

            $('#confirmDeleteButton').click(function() {
                if (deleteProgramId) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('programs.destroy', ':id') }}".replace(':id',
                            deleteProgramId),
                        success: function(data) {
                            $('#confirmDeleteModal').modal('hide');
                            table.draw();
                            $('#successAlert').html(
                                '<div class="alert alert-success"><i class="bi bi-check-circle"></i> ' +
                                data.success + '</div>').fadeIn().delay(3000).fadeOut();
                        },
                        error: function(data) {
                            console.log('Error:', data);
                            $('#confirmDeleteModal').modal('hide');
                            $('#errorAlert').html(
                                '<div class="alert alert-danger"><i class="bi bi-x-circle"></i> Failed to delete program.</div>'
                            ).fadeIn().delay(3000).fadeOut();
                        }
                    });
                }
            });
        });
    </script>






</body>

</html>
