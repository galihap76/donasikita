window.addEventListener("DOMContentLoaded", (event) => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById("datatablesSimple");
    const supplierDataTablesSimple = document.querySelector(
        ".supplierDataTablesSimple"
    );
    const categoryDataTablesSimple = document.querySelector(
        ".categoryDataTablesSimple"
    );

    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }

    if (supplierDataTablesSimple) {
        new simpleDatatables.DataTable(supplierDataTablesSimple);
    }

    if (categoryDataTablesSimple) {
        new simpleDatatables.DataTable(categoryDataTablesSimple);
    }
});
