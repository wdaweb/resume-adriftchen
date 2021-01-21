<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$tstr[$do];?></p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="30%">主選單名稱</td>
                    <td width="30%">選單連結網址</td>
                    <td width="10%">次選單數</td>
                    <td width="5%">顯示</td>
                    <td width="5%">刪除</td>
                    <td></td>

                </tr>
                <?php
                $rows=$Menu->all(['parent'=>0]); //增加'parent'=>0的條件，使頁面只顯示parent的選單

                foreach($rows as $row){
                ?>
                <tr>
                <td ><input type="text" name="text[]" value="<?=$row['text'];?>" style="width:95%"></td>
                <td ><input type="text" name="href[]" value="<?=$row['href'];?>" style="width:95%"></td>
                <td><?=$Menu->count(['parent'=>$row['id']]);?></td>
                <td ><input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>></td>
                <td ><input type="checkbox" name="del[]" value="<?=$row['id'];?>" style="width:95%"></td>
                <td ><input type="button" value="編輯次選單" onclick="op('#cover','#cvr','./modal/submenu.php?table=<?=$do;?>&id=<?=$row['id'];?>')"></td> <!-- ajax背景作業，用get方式拿id，畫面不會跳動-->
                <td ></td>
                <input type="hidden" name="id[]" value="<?=$row['id'];?>"> <!-- 用post方式從前端拿id，畫面會跳一下-->
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?=$do;?>">
                    <td width="200px">
                    <input type="button"
                            onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/<?=$do;?>.php?table=<?=$do;?>&#39;)"
                            value="<?=$addstr[$do];?>"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div> 