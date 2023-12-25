<?php
include_once "header.php"
?>

    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-t-30">
            <a href="index.html" class="mtext-106 cl8 hov-cl1 trans-04">
                خانه
                <i class="fa fa-angle-left m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="mtext-106 cl4">
				بازگشت از درگار پرداخت
			</span>
        </div>
    </div>


    <!-- Shoping Cart -->
    <form class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-12 my-5 text-center">
                    <i class="fa fa-check-circle text-success d-block m-b-50 fs-80"></i>
                    <h1 class="text-success">پرداخت شما با موفقیت انجام شد</h1>
                    <span class="pt-4 d-block fs-21">لینک های دانلود به ایمیل شما ارسال گردید</span>
                </div>
                <div class="col-12 m-b-50 mt-5">
                    <div>
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <tr class="table_head">
                                    <th class="column-1">محصول</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">قیمت</th>
                                    <th class="column-4">لینک دانلود</th>
                                </tr>

                                <tr class="table_row">
                                    <td class="column-1">
                                        <div class="how-itemcart1">
                                            <img src="images/item-cart-04.jpg" alt="IMG">
                                        </div>
                                    </td>
                                    <td class="column-2">کارت ویزیت مشاور املاک</td>
                                    <td class="column-3">۵۴ هزار تومان</td>
                                    <td class="column-3"><a href="#"><i class="fa fa-download ml-1"></i> دانلود کنید</a></td>
                                </tr>

                                <tr class="table_row">
                                    <td class="column-1">
                                        <div class="how-itemcart1">
                                            <img src="images/item-cart-05.jpg" alt="IMG">
                                        </div>
                                    </td>
                                    <td class="column-2">تراکت رستوران بیرون بر</td>
                                    <td class="column-3">۷ هزار تومان</td>
                                    <td class="column-3"><a href="#"><i class="fa fa-download ml-1"></i> دانلود کنید</a></td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

<?php
include_once "footer.php"
?>