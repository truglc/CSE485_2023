
SELECT b.tieude, b.ten_bhat 
FROM baiviet b 
JOIN theloai t ON b.ma_tloai = t.ma_tloai 
WHERE t.ten_tloai = 'Nhạc trữ tình';


SELECT b.tieude 
FROM baiviet b 
JOIN tacgia tg ON b.ma_tgia = tg.ma_tgia 
WHERE tg.ten_tgia = 'Nhacvietplus';


SELECT t.ten_tloai 
FROM theloai t 
LEFT JOIN baiviet b ON t.ma_tloai = b.ma_tloai 
WHERE b.ma_bviet IS NULL;

SELECT b.ma_bviet, b.tieude, b.ten_bhat, tg.ten_tgia, t.ten_tloai, b.ngayviet 
FROM baiviet b 
JOIN tacgia tg ON b.ma_tgia = tg.ma_tgia 
JOIN theloai t ON b.ma_tloai = t.ma_tloai;


SELECT TOP 1 t.ten_tloai 
FROM theloai t 
JOIN baiviet b ON t.ma_tloai = b.ma_tloai 
GROUP BY t.ten_tloai 
ORDER BY COUNT(b.ma_bviet) DESC;



SELECT TOP 2 tg.ten_tgia 
FROM tacgia tg 
JOIN baiviet b ON tg.ma_tgia = b.ma_tgia 
GROUP BY tg.ten_tgia 
ORDER BY COUNT(b.ma_bviet) DESC;



SELECT b.tieude 
FROM baiviet b 
WHERE b.ten_bhat LIKE '%yêu%' OR b.ten_bhat LIKE '%thương%' OR b.ten_bhat LIKE '%anh%' OR b.ten_bhat LIKE '%em%';



SELECT b.tieude 
FROM baiviet b 
WHERE b.tieude LIKE '%yêu%' OR b.tieude LIKE '%thương%' OR b.ten_bhat LIKE '%anh%' OR b.ten_bhat LIKE '%em%';



CREATE VIEW vw_Music AS
SELECT b.*, t.ten_tloai, tg.ten_tgia 
FROM baiviet b 
JOIN theloai t ON b.ma_tloai = t.ma_tloai 
JOIN tacgia tg ON b.ma_tgia = tg.ma_tgia;



CREATE PROCEDURE sp_DSBaiViet @TenTheLoai VARCHAR(50)
AS
BEGIN
    IF NOT EXISTS (SELECT * FROM theloai WHERE ten_tloai = @TenTheLoai)
    BEGIN
        PRINT 'Thể loại không tồn tại';
        RETURN;
    END

    SELECT b.* 
    FROM baiviet b 
    JOIN theloai t ON b.ma_tloai = t.ma_tloai 
    WHERE t.ten_tloai = @TenTheLoai;
END;


ALTER TABLE theloai ADD SLBaiViet INT DEFAULT 0;



CREATE TRIGGER tg_CapNhatTheLoai
ON baiviet
AFTER INSERT, UPDATE, DELETE
AS
BEGIN
    UPDATE theloai 
    SET SLBaiViet = (SELECT COUNT(*) FROM baiviet WHERE ma_tloai = theloai.ma_tloai)
    WHERE ma_tloai IN (SELECT DISTINCT ma_tloai FROM inserted)
       OR ma_tloai IN (SELECT DISTINCT ma_tloai FROM deleted);
END;






