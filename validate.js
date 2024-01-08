function addCat(){
    var categoryOne = $('#categoryOne').val();
    var categoryTwo = $('#categoryTwoSelect').val();
console.log(categoryOne,categoryTwo,"check");
    if((categoryOne || categoryTwo)==true){
    return false;
    }
    else{
        $.ajax({
            url: 'server.php',
            method: 'POST',
            data: {
                categoryOne:categoryOne,
                categoryTwo:categoryTwo,
                ref: "angelo",
                action: "addcat"
            },
            success: function (data) {
                console.log(data);
                var data =JSON.parse(data);
                if (data.status=="success") {
                    $('#successNote').html('Created Successfully');
                    $('#errorNote').html('');
                    setTimeout(function () {
                        window.location.href = "index.php";
                    }, 2500);
                } else {
                    $('#successNote').html('');
                    $('#errorNote').html('Category Already Exists');
                }
            },
            
        });
    }
}
function viewCat() {
    $.ajax({
        url: 'server.php',
        method: 'POST',
        data: {
            ref: 'angelo',
            action: 'viewcat'
        },
        success: function (data) {
            var responseData = JSON.parse(data);

            if (responseData.status === 'success') {
                var selectBox = $('#categoryTwoSelect');
                selectBox.empty();

                responseData.data.forEach(function (cat2) {
                    var optionHtml = '<option value="' + cat2.category1 + '">' + cat2.category1 + '</option>';
                    selectBox.append(optionHtml);
                });
            } else {
                console.log('Error: ' + responseData.message);
            }
        },
        error: function (xhr, status, error) {
            console.log('Error: ' + error);
        }
    });
}


