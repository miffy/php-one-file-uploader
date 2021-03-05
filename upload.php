<!DOCTYPE html>
<html>
<head></head>
<body>


<form method="post" enctype="multipart/form-data" id="myForm" name="myForm">
 <div>
   <label for="file">アップロードするフォルダを選択してください</label>
   <input type="file" name="upfile[]" webkitdirectory>
 </div>
 <div>
   <input type="submit" name="btn" value="ボタン" onclick="funcBtn();" />
 </div>
</form>


<script type="text/javascript">

var input = document.getElementById('myForm');
var ele = document.createElement('input');
var files;

input.onchange = function(e) {
  files = e.target.files; // FileList
};

function funcBtn() {
    var ary = [];

    // 相対パスを一つの文字列にまとめる
    for (var i = 0, f; f = files[i]; ++i){
        ary.push(files[i].webkitRelativePath);
    }
    var str = ary.join(',');
    // エレメントを作成
    var ele = document.createElement('input');
    ele.setAttribute('type', 'hidden');
    ele.setAttribute('name', 'file_path');
    ele.setAttribute('value', str);
    document.myForm.appendChild(ele);
}

</script>

</body>
</html>

<?PHP
//　************************ 注意 ************************ 
// ・PHPを実行できるディレクトリに置いてください。
// ・PHPを実行しているユーザーでフォルダを作成できるディレクトリで実行してください。
// ・なんか知らんけど、一回実行した後にデータが残る。残そうと思ってないのに…

if(!isset($_FILES) || !isset($_POST['file_path'])){
    echo "さいしょ";
    exit;
}else{
    $copy_path = explode(',', $_POST['file_path']);

    for($i = 0; $i < count($copy_path); $i++){

        //ディレクトリが存在しなかったら作る。
        if(!file_exists(dirname($copy_path[$i]))){
            if(!mkdir("./" . dirname($copy_path[$i]), 0755, true)){
                die("mkdirできんかった。");
            }
        }
        //tmpファイルからコピーする
        if(copy($_FILES["upfile"]["tmp_name"][$i], $copy_path[$i])){
        echo($copy_path[$i] . "<br/>");
        }
    }
}  
