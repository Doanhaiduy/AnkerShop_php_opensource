<?php

function productItem($productid, $productname, $productprice, $productimg)
{
    $element = "<form action=\"./php/pages/details.php\"
    class=\" bg-white border mx-2 border-gray-200 rounded-lg shadow \" id=\"$productid\"  method=\"get\">
    <button type=\"submit\" class=\"relative group\" name=\"details\">
        <img class=\"p-4 rounded-t-lg w-full aspect-square\"
            src=\"$productimg\"
            alt=\"$productname\" />
        <span
            class=\"absolute top-[50%] translate-y-[-50%] left-[50%] translate-x-[-50%] px-4 py-1 text-center bg-red-400 text-[16px] font-bold text-white hidden group-hover:block\">MUA NHANH</span>
    </button>
    <div class=\"px-5 pb-5\">
        <a href=\"#\">
            <h5 class=\" tracking-tight text-gray-900 text-center min-h-[50px] line-clamp-2\">
               $productname
            </h5>
        </a>
        <p
            class=\"flex items-center mt-2.5 gap-1 justify-center font-medium\">
            <span>$productprice ₫</span>

        </p>
    </div>
    <input type=\"hidden\" name=\"product_id\" value=\"$productid\">
    <p class=\"text-center px-3\">Kết thúc sau: <strong
            class=\"text-red-600\">2 ngày 4 : 30 : 34</strong></p>
</form>";
    echo $element;
};

function cartItem($productid, $productname, $productprice, $productimg, $quantity)
{

    $totalPrice = $productprice * $quantity;
    $element = "<tr class=\"border-b\">
                    <td>
                        <div class=\"flex items-center space-x-3\">
                            <div class=\"avatar\">
                                <div class=\"h-[250px] w-[250px]\">
                                    <img 
                                    src=\"$productimg\"
                                    alt=\"$productname\"
             />
                                </div>
                            </div>
                            <form method=\"post\">
                                <div class=\"font-bold text-[20px] mb-[20px]\">
                                   $productname
                                </div>
                                <div class=\"text-sm opacity-50\">Trắng / 18 Tháng <br> Anker
                                </div>
                                <input type=\"hidden\" name=\"product_cart_id\" value=\"$productid\">
                                <button class=\"mt-4\" type=\"submit\" name=\"delete_item\" value=\"ok\">Xóa</button>
                            </form>
                        </div>
                    </td>
                    <td>
                        <strong class=\"text-[24px]\">$productprice ₫</strong>
                    </td>
                    <td>
                        <form class=\"update-quantity\" method=\"post\">
                            <input type=\"number\" name=\"quantity\" value=\"$quantity\" class=\"w-[50px] text-center\">
                            <input type=\"hidden\" name=\"product_cart_id\" value=\"$productid\">
                            <input type=\"hidden\" name=\"update_quantity\" value=\"ok\" class=\"hidden\">
                            </form>
                    </td>
                    <th>
                        <strong class=\"text-[24px]\">
                            $totalPrice ₫
                        </strong>
                    </th>
                </tr>";
    echo $element;
}




function orderItem($productid, $productname, $productprice, $productimg, $quantity)
{
    $totalPrice = $productprice * $quantity;

    $element = "<div class=\"flex items-center gap-4\">
                    <img class=\"w-[70px] h-[70px] object-cover border rounded-[8px]\"
                        src=\"$productimg\"
                        alt=\"$productname\">
                    <div class=\"flex justify-between w-full\">
                        <div>
                        <p class=\"font-medium text-[14px]\">
                            $productname
                        </p>
                         <span class=\"text-[12px] text-gray-400\">Giá: $productprice</span> -
                        <span class=\"text-[12px] text-gray-400\">Số lượng: $quantity</span>
                        </div>
                        <p>$totalPrice ₫</p>
                    </div>
                </div>";

    echo $element;
}


function orderedItem($orderid, $orderdate, $orderprice, $paymentMethod)
{
    $element = "<tr>
                    <td
                        class=\"px-5 py-5 border-b border-gray-200 bg-white text-sm\">
                        <div class=\"flex items-center\">
    
                            <div class=\"\">
                                <p
                                    class=\"text-gray-900 whitespace-no-wrap\">
                                    #$orderid
                                </p>
                            </div>
                        </div>
                    </td>
                    <td
                        class=\"px-5 py-5 border-b border-gray-200 bg-white text-sm\">
                        <p class=\"text-gray-900 whitespace-no-wrap\">
                            $orderdate
                        </p>
                    </td>
                    <td
                        class=\"px-5 py-5 border-b border-gray-200 bg-white text-sm\">
                        <p class=\"text-gray-900 whitespace-no-wrap\">
                            $orderprice ₫
                        </p>
                    </td>
                    <td
                        class=\"px-5 py-5 border-b border-gray-200 bg-white text-sm\">
                        <span
                            class=\"relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight\">
                            <span aria-hidden
                                class=\"absolute inset-0 bg-green-200 opacity-50 rounded-full\"></span>
                            <span class=\"relative\">Đang giao</span>
                        </span>
                    </td>
                    <td
                        class=\"px-5 py-5 border-b border-gray-200 bg-white text-sm\">
                        <p class=\"text-gray-900 whitespace-no-wrap\">
                            $paymentMethod 
                        </p>
                    </td>

                </tr>";
    echo $element;
}
