<?php

function component($productid, $productname, $productprice, $productimg)
{
    $element = "<form action=\"./php/pages/details.php\"
    class=\" bg-white border mx-2 border-gray-200 rounded-lg shadow \" id=\"$productid\"  method=\"get\">
    <button type=\"submit\" class=\"relative group\" name=\"details\">
        <img class=\"p-4 rounded-t-lg w-full aspect-square\"
            src=\"$productimg\"
            alt=\"$productname\" />
        <span
            class=\"absolute top-[10px] left-[10px] px-4 text-[12px] py-1 bg-red-400 rounded-[3px] font-bold text-white\">-40%</span>
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
