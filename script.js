$(document).ready(function () {
    $('#dropdownId').change(function () {
        var selectedCounty = $(this).val();
        $.ajax({
            url: 'display_cities.php',
            type: 'POST',
            data: {selectedCounty: selectedCounty},
        });
    });
});