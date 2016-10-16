<?php

function soSachDangMuonCuaDocGia($ma_docgia){
	$muon = Muon::getInstance();
	$soluong = $muon->soSachDangMuonCuaDocGia($ma_docgia);
	return $soluong;
}