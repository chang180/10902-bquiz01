
    <h3 class="cent">新增標題區圖片</h3>
    <hr>
<form action="api/insert_title.php" class="cent" method="post" enctype="multipart/form-data">
    <table style="width:80%;margin:auto">
        <tr>
            <td>標題區圖片：</td>
            <td><input type="file" name="img"></td>
        </tr>
        <tr>
            <td>標題區替代文字</td>
            <td><input type="text" name="text"></td>
        </tr>
    </table>
    <div class="btn-group">
        <input class="btn btn-danger" type="submit" value="新增">
        <input class="btn btn-warning" type="reset" value="重置">
    </div>
</form>