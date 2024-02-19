function citiesDisp (selectedCounty) {
        alert(selectedCounty);
        $.ajax({
            url: 'display_cities.php',
            type: 'POST',
            data: {selectedCounty: selectedCounty},
            success: function (response) {
                alert('mukodik');
                $(selectedCounty).html(response);
            },
            error: function (response) {
                alert('error!');
            }
        });
}   