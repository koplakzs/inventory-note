$(document).ready(function () {
    let userId, nim, username, phone;

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
        username = tr.find("#username").attr("data-id");
        phone = tr.find("#phone").attr("data-id");

        $("#form-nim").val(nim);
        $("#form-username").val(username);
        $("#form-phone").val(phone);
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
