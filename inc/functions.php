<?php

function soSachDangMuon($ma_docgia){
	$docgia = DocGia::getInstance();
	$soluong = $docgia->soSachDangMuon($ma_docgia);
	return $soluong;
}
function getTenDocGia($ma_docgia){
	return DocGia::getInstance()->getTenDocGia($ma_docgia);

}