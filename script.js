var openedId = -1;
var selectedPrevious = "";
function citiesDisp (selectedCounty, selectedCountyId) {
    if(openedId != -1){
        closeCities(selectedPrevious);
    }
    openedId = selectedCountyId;
    selectedPrevious = selectedCounty;
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
function closeCities (county) {
    $.ajax({
        url: 'close_buttons.php',
        type: 'POST',
        success: function(result) {
            $('#'+county+'Id').html(result);
        }
    })
    $.ajax({
        url: 'close_cities.php',
        type: 'POST',
        success: function(result) {
            $('#'+county+'IdC').html(result);
        }
    })
}