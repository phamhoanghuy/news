<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;

class LoaiTinController extends Controller
{
   public function getDanhSach(){
   		$loaitin = LoaiTin::all();
   		return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
   }


   public function getSua($id){
         $theloai = TheLoai::all();
   		$loaitin = LoaiTin::find($id);
   		return view('admin.loaitin.sua',['loaitin'=>$loaitin, 'theloai'=>$theloai]);
   }

   public function postSua(Request $request, $id){
   		
   		$this->validate($request,
            [
               'Ten' =>'required|unique:LoaiTin,Ten|min:1|max:100',
               'TheLoai'=>'required'
            ],
            [
               'Ten.required' =>'Bạn chưa nhập tên thể loại',
               'Ten.unique'=> 'Tên thể loại đã tồn tại',
               'Ten.min'=> 'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự',
               'Ten.max'=> 'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự',
               'TheLoai.required'=>'Bạn chưa chọn thể loại'
            ]);
         $loaitin = LoaiTin::find($id);
   		$loaitin->Ten = $request->Ten;
   		$loaitin->TenKhongDau = changeTitle($request->Ten);
         $loaitin->idTheLoai = $request->TheLoai;
   		$loaitin->save();

   		return redirect('admin/loaitin/sua/' .$id)->with('thongbao','Sửa thành công');
   }

   public function getThem(){
   		$theloai = TheLoai::all();
   		return view('admin.loaitin.them',['theloai'=>$theloai]);
   }

   public function postThem(Request $request){
   		$this->validate($request,
   			[
   				'Ten' =>'required|unique:LoaiTin,Ten|min:1|max:100',
   				'TheLoai'=>'required'
   			],
   			[
   				'Ten.required' =>'Bạn chưa nhập tên thể loại',
   				'Ten.unique'=> 'Tên thể loại đã tồn tại',
   				'Ten.min'=> 'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự',
   				'Ten.max'=> 'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự',
   				'TheLoai.required'=>'Bạn chưa chọn thể loại'
   			]);

   		$loaitin = new LoaiTin;
   		$loaitin->Ten = $request->Ten;
   		$loaitin->TenKhongDau = changeTitle($request->Ten);
   		$loaitin->idTheLoai = $request->TheLoai;
   		$loaitin->save();

   		return redirect('admin/loaitin/them')->with('thongbao','Thêm thành công');
   }

   public function getXoa($id){
   		$loaitin = LoaiTin::find($id);
         $tenLt = $loaitin->Ten;
   		$loaitin->delete();

   		return redirect('admin/loaitin/danhsach')->with('thongbao','Đã xóa thành công loại tin: '.$tenLt);
   }

}
