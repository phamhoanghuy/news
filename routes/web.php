<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dangnhap','UserController@getDangnhapAdmin');
Route::post('admin/dangnhap','UserController@postDangnhapAdmin');

Route::get('admin/logout','UserController@getDangxuatAdmin');

Route::get('thu', function(){
	return view('admin.theloai.danhsach');
});

///////////////////////////////////////////
Route::group(['prefix'=>'admin','middleware'=>'adminlogin'], function(){
	Route::group(['prefix'=>'theloai'], function(){
		Route::get('danhsach','TheLoaiController@getDanhSach');

		Route::get('sua/{id}','TheLoaiController@getSua');
		Route::post('sua/{id}','TheLoaiController@postSua');

		Route::get('them','TheLoaiController@getThem');
		Route::post('them','TheLoaiController@postThem');

		Route::get('xoa/{id}', 'TheLoaiController@getXoa');	
	});
	//////////////

	Route::group(['prefix'=>'loaitin'], function(){
		Route::get('danhsach','LoaiTinController@getDanhSach');

		Route::get('sua/{id}','LoaiTinController@getSua');
		Route::post('sua/{id}','LoaiTinController@postSua');

		Route::get('them','LoaiTinController@getThem');
		Route::post('them','LoaiTinController@postThem');

		Route::get('xoa/{id}', 'LoaiTinController@getXoa');		
	});
	//////////////

	Route::group(['prefix'=>'tintuc'], function(){
		Route::get('danhsach','TinTucController@getDanhSach');

		Route::get('sua/{id}','TinTucController@getSua');
		Route::post('sua/{id}','TinTucController@postSua');

		Route::get('them','TinTucController@getThem');
		Route::post('them','TinTucController@postThem');
		
		Route::get('xoa/{id}','TinTucController@getXoa');		
	});
	/////////////////////

	Route::group(['prefix'=>'comment'], function(){
		Route::get('danhsach','CommentController@getDanhSach');

		Route::get('sua/{id}','CommentController@getSua');
		Route::post('sua/{id}','CommentController@postSua');

		Route::get('them','CommentController@getThem');
		Route::post('them','CommentController@postThem');

		Route::get('xoa/{id}/{idTinTuc}','CommentController@getXoa');		
	});
	//////////////////////

	Route::group(['prefix'=>'slide'], function(){
		Route::get('danhsach','SlideController@getDanhSach');

		Route::get('sua/{id}','SlideController@getSua');
		Route::post('sua/{id}','SlideController@postSua');

		Route::get('them','SlideController@getThem');
		Route::post('them','SlideController@postThem');

		Route::get('xoa/{id}','SlideController@getXoa');		
	});
	/////////////////////

	Route::group(['prefix'=>'user'], function(){
		Route::get('danhsach','UserController@getDanhSach');

		Route::get('sua/{id}','UserController@getSua');
		Route::post('sua/{id}','UserController@postSua');

		Route::get('them','UserController@getThem');
		Route::post('them','UserController@postThem');

		Route::get('xoa/{id}','UserController@getXoa');		
	});
	/////////////////////

	Route::group(['prefix'=>'ajax'],function(){
		Route::get('loaitin/{idTheLoai}', 'AjaxController@getLoaiTin');
	});
	//////////////////////

});
////////////////////////

Route::get('trangchu', 'PageController@trangchu');

Route::get('lienhe', 'PageController@lienhe');

Route::get('loaitin/{id}/{tenKhongDau}.html', 'PageController@loaitin');

Route::get('tintuc/{id}/{TieuDeKhongDau}.html', 'PageController@tintuc');

/////////////////////////////

Route::get('dangnhap','PageController@getDangNhap');
Route::post('dangnhap','PageController@postDangNhap');

Route::get('dangxuat','PageController@getDangXuat');

Route::get('dangky','PageController@getDangKy');
Route::post('dangky','PageController@postDangKy');

////////////////////////////

Route::get('nguoidung','PageController@getNguoiDung');
Route::post('nguoidung','PageController@postNguoiDung');

///////////////////////////

Route::post('comment/{id}', 'CommentController@postComment');

//////////////////////////

//phân trang nếu dùng post thì có lỗi
Route::get('timkiem', 'PageController@getTimKiem');