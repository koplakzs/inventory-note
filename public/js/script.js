$(document).ready(function () {
    let userId, nim, name, prodi;

    // Delete button
    $(".delete-btn").click(function (e) {
        e.preventDefault();
        userId = $(this).data("id");
        $("#modal").removeClass("hidden");
    });

    $(".edit-btn").click(function (e) {
        e.preventDefault();
        console.log("test");
        userId = $(this).data("id");
        let tr = $(this).closest("tr");
        nim = tr.find("#nim").attr("data-id");
        name = tr.find("#name").attr("data-id");
        prodi = tr.find("#prodi").attr("data-id");

        $("#form-nim").val(nim);
        $("#form-name").val(name);
        $("#form-prodi").val(prodi);
        $("#modal-edit").removeClass("hidden");
    });

    // Close Modal
    $("#close-modal-btn").click(function () {
        $("#modal").addClass("hidden");
    });
    $("#close-modal-edit-btn").click(function () {
        $("#modal-edit").addClass("hidden");
    });

    // Function CRUD User
    $("#delete-modal-btn").click(function () {
        $("#delete-form").attr("action", `/user/${userId}`);
        // $("#myModal").addClass("hidden");
    });
    $("#edit-modal-btn").click(function () {
        $("#edit-form").attr("action", `/user/${userId}`);
        // $("#modal-edit").addClass("hidden");
    });

    // Function CRUD Inventori
    $("#delete-modal-inv-btn").click(function () {
        $("#delete-inv-form").attr("action", `/${userId}`);
        // $("#myModal").addClass("hidden");
    });
    $("#edit-modal-inv-btn").click(function () {
        $("#edit-inv-form").attr("action", `/${userId}`);
        // $("#modal-edit").addClass("hidden");
    });
});
