function citiesDisp (selectedCounty) {
    $.ajax({
        url: 'display_cities.php',
        type: 'POST',
        data: {selectedCounty: selectedCounty},
        success: function (result) {
            $('#'+selectedCounty+'Id').html(result);
        },
        error: function (response) {
            alert('error!');
        }
    });
}  
function citisList (selectedCh, selectedCounty) {
    $.ajax({
        url: 'display_cities_full.php',
        type: 'POST',
        data: {
                selectedCh: selectedCh,
                selectedCounty: selectedCounty
        },
        success: function (result) {
            $('#'+selectedCounty+'IdC').html(result);
        },
        error: function (response) {
            alert('error!');
        }
    });
}