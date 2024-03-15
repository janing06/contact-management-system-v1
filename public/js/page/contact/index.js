$(function () {
    let this_id;

    let modal = $("#contact-modal");

    let table = $("#contactTable").DataTable({
        autoWidth: false,
        responsive: true,
        processing: true,
        serverSide: true,
        searching: true,
        paging: true,
        ajax: {
            method: "GET",
            url: "/contacts/table",
            dataType: "json",
            error: function (errors) {
                toast.fire({
                    icon: "error",
                    title: "Invalid Data Token.",
                });
            },
        },
        language: {
            searchPlaceholder: "Search Records..",
        },
        columns: [
            { data: "first_name", name: "first_name" },
            { data: "middle_name", name: "middle_name" },
            { data: "last_name", name: "last_name" },
            { data: "email_address", name: "email_address" },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
            },
        ],
    });
    $("#custom-search-field").keyup(function () {
        table.search($(this).val()).draw();
    });

    // custom page length
    $("#custom-page-length")
        .change(function () {
            table.page.len($(this).val()).draw();
        })
        .trigger("change");

    $("body").on("click", ".delete-contact", function () {
        this_id = $(this).attr("data-id");
        modal.modal("show");
    });

    $("body").on("click", "#destroy-contact", function () {
        $.ajax({
            type: "DELETE",
            url: "/contacts/" + this_id,
            dataType: "json",
            beforeSend: function () {
                buttons("destroy-contact", "start");
            },
        })
            .done(function (response) {
                table.ajax.reload();
                toast.fire({
                    icon: "success",
                    title: response.message,
                });
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                toast.fire({
                    icon: "error",
                    title: jqXHR.responseJSON.message,
                });
            })
            .always(function (jqXHROrData, textStatus, jqXHROrErrorThrown) {
                buttons("destroy-contact", "finish");
                modal.modal("hide");
            });
    });
});
