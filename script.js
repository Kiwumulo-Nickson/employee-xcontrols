document.addEventListener('DOMContentLoaded', () => {
    // Edit Button Handler
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', () => {
            document.getElementById('editId').value = button.dataset.id;
            document.getElementById('editName').value = button.dataset.name;
            document.getElementById('editEmail').value = button.dataset.email;
            document.getElementById('editPosition').value = button.dataset.position;
            document.getElementById('editSalary').value = button.dataset.salary;
        });
    });

    // Delete Button Handler
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', () => {
            document.getElementById('deleteId').value = button.dataset.id;
        });
    });
});