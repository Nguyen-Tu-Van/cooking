function convertNumber()
{
    //convert string to money
    const inputElements = document.querySelectorAll(".convert-money");
    inputElements.forEach(inputElement => {
        inputElement.addEventListener("input", function(e) {
            const value = parseInt(e.target.value.replace(/[^\d]/g, "")); // loại bỏ các ký tự không phải số
            if (!isNaN(value)) {
                const formattedValue = new Intl.NumberFormat('en-US').format(value); // chuyển đổi sang định dạng số có dấu phẩy
                e.target.value = formattedValue;
            }
        });
    })
    //convert number to quantity
    const inputElements2 = document.querySelectorAll(".convert-quantity");
    inputElements2.forEach(inputElement => {
        inputElement.addEventListener("input", function(e) {
            const value = parseInt(e.target.value.replace(/[^\d]/g, "")); // loại bỏ các ký tự không phải số
            if (!isNaN(value)) {
                const formattedValue = new Intl.NumberFormat().format(value); // chuyển đổi sang định dạng số có dấu phẩy
                e.target.value = formattedValue;
            }
        });
    })
}