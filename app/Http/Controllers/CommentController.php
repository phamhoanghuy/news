<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Comment;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
   public function getDanhSach(){
      
   }


   public function getSua($id){
      
   }

   public function postSua(Request $request, $id){
      
   }

   public function getThem(){
      
   }

   public function postThem(Request $request){

   }

   public function getXoa($id, $idTinTuc){
      $comment = Comment::find($id);
      $comment->delete();

      return redirect('admin/tintuc/sua/'.$idTinTuc)->with('thongbao','Xóa comment thành công');
   }

   public function postComment($id, Request $request){
      $tintuc = TinTuc::find($id);

      // có thể quản lý nội dung comment tại đây hoặc cho comment thoải mái
      $comment = new Comment;
      $comment->idTinTuc = $id;
      $comment->idUser = Auth::user()->id;
      $comment->NoiDung = $request->NoiDung;
      $comment->save();

      return redirect("tintuc/$id/".$tintuc->TieuDeKhongDau .".html")->with('thongbao','Viết bình luận thành công');
   }

}
