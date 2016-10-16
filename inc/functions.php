<?php

function soSachDangMuon($ma_docgia){
	$docgia = DocGia::getInstance();
	$soluong = $docgia->soSachDangMuon($ma_docgia);
	return $soluong;
}