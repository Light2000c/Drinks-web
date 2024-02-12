var carts;
var product_list = [];


async function load(userId) {
    console.log("Loading User cart");
    await getCart(userId);
}

async function getCart(userId) {
    console.log("userID collected ==> ", userId)

    var list = [];

    url = `http://127.0.0.1:8000/api/cart/${userId}`;
    try {

        const response = await fetch(url);
        var data = await response.json();
        console.log("data is ==> ", data);

        carts = data;

        carts.forEach(element => {
            console.log(element.product_id);
            list.push(element.product_id);
        });

        productId_list = list;

        console.log("list ==>", list);
        console.log("product list ==>", productId_list);


    } catch (err) {
        console.log(err);
    }

}


function checkCart(productId) {
    if (productId_list.includes(productId)) {
        return true;
    }
    return false;
}


function increment(productId) {
    var input = document.querySelector("input[name='input" + productId + "']");

    let new_value = Number(input.value) + 1;

    console.log(new_value)

    if (new_value != 0) {
        input.value = new_value;
    } else {
        input.value = input.value;
    }

    input.dispatchEvent(new Event('change'));

}

function decrement(productId) {
    var input = document.querySelector("input[name='input" + productId + "']");

    let new_value = Number(input.value) - 1;

    if (new_value != 0) {
        input.value = new_value;
    } else {
        input.value = input.value;
    }

    input.dispatchEvent(new Event('change'));

}

async function updateQuantity(productId, userId) {

    console.log("productId ==>", productId);
    console.log("userId ==>", userId);
    var quantity = document.querySelector("input[name='input" + productId + "']").value;
    console.log("quantity ==>", quantity);

    var requestData = {
        productId: productId,
        userId: userId,
        quantity: quantity,
    }

    $.ajax({
        url: 'http://127.0.0.1:8000/api/cart',
        method: 'PUT',
        type: 'PUT',
        data: requestData,
        dataType: 'json',
        headers: {
            accept: 'application/json',
            contentType: 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            console.log(data);
            if (data.status == 'success') {
                console.log("Quantity has been successfully updated");
            }
        },
        error: function (error) {
            console.log(error);
        }
    });




}
