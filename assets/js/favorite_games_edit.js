document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('.game-checkbox');
    const selectedCount = document.getElementById('selected-count');
    const unselectAllButton = document.getElementById('unselect-all');

    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            const selected = document.querySelectorAll('.game-checkbox:checked').length;
            selectedCount.textContent = selected;
        });
    });

    unselectAllButton.addEventListener('click', function () {
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = false;
        });
        selectedCount.textContent = '0';
    });

    document.querySelectorAll('.list-group-item').forEach(function (item) {
        item.addEventListener('click', function () {
            const checkbox = item.querySelector('.form-check-input');
            checkbox.checked = !checkbox.checked;
            checkbox.dispatchEvent(new Event('change'));
        });
    });
});