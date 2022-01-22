var subscribe_url = base_url +'subscribe-subCategory';
var unsubscribe_url =  base_url +'unsubscribe-subCategory';
function subscribe(related_id, type) {
    console.log(unsubscribe_url);
    var input = {};
    input[type] = related_id;

    $.ajax({
        url: subscribe_url,
        type: 'POST',
        data: input,
        success: function (response) {

            $(`#subscribe_status_${related_id}`).html(`<a class="btn  text-secondary" onclick="unsubscribe('${related_id}','${type}')">Unsubscribe </a>`);

        }
    });
}

function unsubscribe(related_id,type) {
    var input = {};
    input[type] = related_id;
    $.ajax({
        url: unsubscribe_url,
        type: 'POST',
        data: input,
        success: function (response) {

            $(`#subscribe_status_${related_id}`).html(`<a class="btn text-secondary" onclick="subscribe('${related_id}','${type}')"> <i class="fa fa-bell " aria-hidden="true"></i> </a>`);

        }
    });
}
