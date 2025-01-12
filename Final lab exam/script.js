$(document).ready(function () {
    // Load all employees on page load
    loadEmployees();

    // Register Employee
    $("#registerBtn").click(function () {
        const data = {
            action: 'register',
            name: $("#name").val(),
            contact_no: $("#contact_no").val(),
            username: $("#username").val(),
            password: $("#password").val()
        };

        $.post('employee.php', data, function (response) {
            alert(response);
            loadEmployees(); // Refresh the employee list
        });
    });

    // Search Employee
    $("#searchBtn").click(function () {
        const keyword = $("#keyword").val();

        $.post('employee.php', { action: 'search', keyword: keyword }, function (response) {
            renderEmployees(JSON.parse(response));
        });
    });

    // Load all employees
    function loadEmployees() {
        $.post('employee.php', { action: 'search', keyword: '' }, function (response) {
            renderEmployees(JSON.parse(response));
        });
    }

    // Render employees in the list
    function renderEmployees(employees) {
        let html = "<ul>";
        employees.forEach(emp => {
            html += `
                <li>
                    <strong>${emp.name}</strong> - ${emp.contact_no}
                    <button class="updateBtn" data-id="${emp.id}" data-name="${emp.name}" data-contact="${emp.contact_no}">update</button>
                    <button class="deleteBtn" data-id="${emp.id}">Delete</button>
                </li>`;
        });
        html += "</ul>";
        $("#employeeList").html(html);

        // Attach event handlers for Edit and Delete buttons
        attachEventHandlers();
    }

    // Attach event handlers
    function attachEventHandlers() {
        // Edit Employee
        $(".editBtn").click(function () {
            const id = $(this).data('id');
            const name = $(this).data('name');
            const contact = $(this).data('contact');

            // Show prompt for editing
            const newName = prompt("Enter new name:", name);
            const newContact = prompt("Enter new contact number:", contact);

            if (newName && newContact) {
                const data = {
                    action: 'update',
                    id: id,
                    name: newName,
                    contact_no: newContact
                };

                $.post('employee.php', data, function (response) {
                    alert(response);
                    loadEmployees(); // Refresh the employee list
                });
            }
        });

        // Delete Employee
        $(".deleteBtn").click(function () {
            const id = $(this).data('id');

            if (confirm("Are you sure you want to delete this employee?")) {
                $.post('employee.php', { action: 'delete', id: id }, function (response) {
                    alert(response);
                    loadEmployees(); // Refresh the employee list
                });
            }
        });
    }
});
