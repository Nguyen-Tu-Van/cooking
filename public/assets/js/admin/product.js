let scrollBottom = document.getElementById('inner_content').scrollHeight;
function combinations(arr1, arr2, arr3) {
    let result = [];
    // Lấy tất cả các cặp có thể có từ hai mảng đầu tiên
    for (let i = 0; i < arr1.length; i++) 
    {
        for (let j = 0; j < arr2.length; j++) 
        {
            let pair = [arr1[i], arr2[j]];
            result.push(pair);
        }
        if(arr2.length==0)
        {
            result.push(arr1[i]);
        }
    }
    // Kết hợp các cặp với phần tử từ mảng thứ ba
    let leng = result.length;
    for (let k = 0; k < leng; k++) 
    {
        for (let l = 0; l < arr3.length; l++) 
        {
            let triplet = [...result[k], arr3[l]];
            result.push(triplet);
        }
    }
    return result;
}
function handleArr(arr)
{
    if(arr.length<=1) return arr;
    else
    {
        let result = arr.join(' &#9830; ');
        return result;
    }
}

// create product detail when input enter
function removeTr(element) {
    let tr = element.parentNode.parentNode; // Lấy thẻ tr cha của thẻ a được nhấp vào
    tr.parentNode.removeChild(tr); // Xóa thẻ tr khỏi DOM
}
$(document).ready(function() {
    convertNumber();
    $('#feature1,#feature2,#feature3').change(function(e) {
        let arr = [];
        let feature1 = $('#feature3').val().split(',');
        let feature2 = $('#feature2').val().split(',');
        let feature3 = $('#feature1').val().split(',');
        feature1 = feature1.filter(item => item !== '');
        feature2 = feature2.filter(item => item !== '');
        feature3 = feature3.filter(item => item !== '');
        // Tạo một mảng mới chứa các mảng ban đầu
        let arrayOfArrays = [feature1, feature2, feature3];
        
        // Sắp xếp các mảng trong mảng mới theo độ dài của chúng
        arrayOfArrays.sort((a, b) => a.length - b.length);

        // Trích xuất các mảng đã sắp xếp từ mảng mới
        let sortedArr1 = arrayOfArrays[0];
        let sortedArr2 = arrayOfArrays[1];
        let sortedArr3 = arrayOfArrays[2];

        // Đếm
        let count = 0;
        if(sortedArr1.length > 0) count++;
        if(sortedArr2.length > 0) count++;
        if(sortedArr3.length > 0) count++;

        // tổ hợp
        let allCombinations = combinations(sortedArr3, sortedArr2, sortedArr1);
        //console.log(allCombinations);

        allCombinations.forEach(function(element) {
            if(element.length > 1 && typeof element === 'string') arr.push([element]);
            if(element.length == count)
            {
                arr.push(element);
            }
        });
        console.log(arr);

        // display table
        if(arr.length > 0)
        {
            let price_origin = $('#price_origin').val();
            let price = $('#price').val();
            let quantity = $('#quantity').val();
            let status = !$('#status').prop('checked');
            let elements = ``;
            for(let i = 0; i < arr.length; i++)
            {
                elements += `<tr>
                                <td width="120px"><img width="50px" src="asset/images/product/men/product1.jpg"/></td>
                                <td>`+handleArr(arr[i])+`
                                <input type="hidden" name="features[]" value="`+handleArr(arr[i])+`"/>
                                </td>
                                <td>
                                    <div class="form-group form-group-feedback form-group-feedback-left">
                                        <input type="text" class="form-control form-control-lg convert-money" name="price_origin_child[]" placeholder="" value="`+price_origin+`">
                                        <div class="form-control-feedback form-control-feedback-lg">
                                            <i>đ</i>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group form-group-feedback form-group-feedback-left">
                                        <input type="text" class="form-control form-control-lg convert-money" name="price_child[]" placeholder="" value="`+price+`">
                                        <div class="form-control-feedback form-control-feedback-lg">
                                            <i>đ</i>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <input type="number" class="form-control convert-quantity" name="quantity_child[]" value="`+quantity+`" min="0">
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox p-2">
                                        <input type="checkbox" class="custom-control-input" onclick="return false;" value="1" id="d_`+i+`" `+(status==true?'checked':'')+`>
                                        <label class="custom-control-label" for="d_`+i+`"> 
                                            <span class="badge badge-light"></span>    
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-light btn-icon btn-sm" onclick="removeTr(this)"><i class="icon-trash"></i></a>
                                </td>
                            </tr>`;
            }
            let html = `<table class="table table-togglable table-hover">
                            <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th style="min-width:250px">Phiên bản (`+arr.length+`)</th>
                                    <th data-breakpoints="xs sm md">Giá nhập</th>
                                    <th data-breakpoints="xs sm">Giá bán</th>
                                    <th data-breakpoints="xs sm" style="width:130px;min-width:140px">Số lượng</th>
                                    <th data-breakpoints="xs sm">Mở bán</th>
                                    <th data-breakpoints="xs sm"></th>
                                </tr>
                            </thead>
                            <tbody>
                                `+elements+`
                            </tbody>
                        </table>`;
            $('#listProduct').html(html);
        }
        else
        {
            //&#9830;
            $('#listProduct').html("");
        }
        document.getElementById('inner_content').scrollTo({
            top: scrollBottom - 100,
            left: 0,
            behavior: "smooth"
        });
        convertNumber();
    })
});

// click area image
$(document).ready(function() {
    let div = document.querySelectorAll('.kv-preview-thumb');
    let buttons = document.querySelectorAll('.kv-file-remove');
    $('#clickImage').click(function(){
        $('#image').click();
    })
    $('#image').change(function(){
        $('#submitImage').click();
    })
    $('#sortImage').click(function(){
        div = document.querySelectorAll('.kv-preview-thumb');
        let arr = [];
        div.forEach(function(element){
            arr.push($(element).attr("data-id"));
        })
        $('#sortImageValue').val(arr);
        $('#sortImageButton').click();
    })
    buttons.forEach((button, index) => {
        button.addEventListener('click', (e) => {
            $('#idImage').val(index);
            if(!confirm('Bạn có chắc chắn muốn xóa ảnh này không ?')) return false;
            $('#removeImage').click();
        });
        $(div[index]).attr("data-id",index);
    });
});
