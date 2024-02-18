$(document).ready(function () {
    $('#dropdownId').change(function () {
        var selectedId = $(this).val();
        $.ajax({
            url: 'display_cities.php',
            type: 'POST',
            data: {selectedId: selectedId},
            succes: function (response) {
                $('citiesTr').html(response);
            }
        });
    });
});