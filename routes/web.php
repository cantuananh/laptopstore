<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => 'login:admin|employee'], function () {

    Route::get('/thongke', 'StatisticalController@thongke')->name('thong');

    Route::get('/kekhai', 'StatisticalController@kekhai')->name('kekhai')->middleware('login:admin');

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('brands', 'BrandController')->middleware('login:admin');

    Route::resource('products', 'ProductController')->middleware('login:admin');

    Route::resource('users', 'UserController')->middleware('login:admin');

    Route::get('profile', 'UserController@profile')->name('users.profile');
    Route::get('profile/sua','UserController@getEditUser');

    Route::post('profile/sua','UserController@postEditUser');

    Route::resource('bills', 'BillController');

    Route::post('updateBillStatus/{id}', 'BillController@updateStatus')->name('updateBillStatus');

    Route::resource('billDetail', 'DetailBillController');

    Route::resource('orderDetail', 'DetailOrderController');

    Route::resource('orders', 'OrderController');

    Route::post('updateOrderStatus/{id}', 'OrderController@updateStatus')->name('updateOrderStatus');

    Route::get('/statistical', 'StatisticalController@index')->name('statistical');

    Route::get('bill/{id}/export','DetailBillController@exportBill')->name('exportBill');

    Route::get('order/{id}/export','DetailOrderController@exportOrder')->name('exportOrder');

    Route::get('order/detail/{id}/export','DetailOrderController@exportGuarantee')->name('exportGuarantee');

    Route::post('product/detail/{id}/update','ProductController@updateDetailProduct')->name('updateDetailProduct');

});
Route::get('dang-nhap',['as'=>'dangnhap', 'uses'=>'PageController@getLogin']);

Route::post('dang-nhap',['as'=>'dangnhap', 'uses'=>'PageController@postLogin']);

Route::get('dang-nhap-dat-hang',['as'=>'dangnhapdathang', 'uses'=>'PageController@getLoginDatHang']);

Route::post('dang-nhap-dat-hang',['as'=>'dangnhapdathang', 'uses'=>'PageController@postLoginDatHang']);

Route::get('dang-xuat',['as'=>'dangxuat', 'uses'=>'PageController@getLogout']);

Route::get('dang-ky',['as'=>'dangky', 'uses'=>'PageController@getSignup']);

Route::post('dang-ky',['as'=>'dangky', 'uses'=>'PageController@postSignup']);

Route::group(['prefix'=>'profile'],function (){

    Route::get('thongtin','PageController@getInfoUser');

    Route::get('sua','PageController@getEditUser');

    Route::post('sua','PageController@postEditUser');
});

Route::post('comment/{id}','PageController@comment')->name('feedback');

Route::get('order','PageController@order')->name('profile-order');

Route::get('loai-san-pham/{type}',['as'=>'loaisanpham','uses'=>'PageController@getLoaisanpham']);

Route::get('chi-tiet-san-pham/{id}',['as'=>'chitietsanpham', 'uses'=>'PageController@getChitietsanpham']);

Route::get('lien-he',['as'=>'thongtinlienhe', 'uses'=>'PageController@getLienhe']);

Route::get('gioi-thieu',['as'=>'gioithieu', 'uses'=>'PageController@getGioithieu']);

Route::get('add-to-cart/{id}',['as'=>'themgiohang', 'uses'=>'CartController@getAddToCart']);

Route::get('del-cart/{id}',['as'=>'xoagiohang', 'uses'=>'CartController@getDelItemCart']);

Route::get('gio-hang',['as'=>'giohang', 'uses'=>'CartController@getListCart']);

Route::post('sua-gio-hang/{id}',['as'=>'suagiohang', 'uses'=>'CartController@suaGioHang']);

Route::get('/',['as'=>'trang-chu','uses'=>'PageController@getIndexPage']);

Route::get('danh-muc/{id}/{url}',['as'=>'chuyen-muc','uses'=>'PageController@getCategory']);

Route::get('san-pham/{id}/{url}',['as'=>'san-pham','uses'=>'PageController@getDetailProduct']);

Route::group(['prefix'=>'user','middleware'=>'LoginDatHang'], function (){

    Route::get('dat-hang',['as'=>'dathang', 'uses'=>'CartController@getCheckout']);

    Route::post('dat-hang',['as'=>'dathang', 'uses'=>'CartController@postCheckout']);

});

Route::group(['prefix'=>'user','middleware'=>'userLogin'], function (){

    Route::get('profile',['as'=>'user.profile', 'uses'=>'PageController@getUserProfile']);

    Route::post('profile',['as'=>'user.profile', 'uses'=>'PageController@postEditProfile']);

    Route::get('password',['as'=>'get.password', 'uses'=>'PageController@getChangePassword']);

    Route::post('password',['as'=>'post.password', 'uses'=>'PageController@postChangePassword']);

    Route::get('danh-sach-hoa-don',['as'=>'list.bill', 'uses'=>'PageController@getListBill']);

});

Route::get('/', 'PageController@index')->name('index');

Auth::routes();
