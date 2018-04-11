<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/18 0018
 * Time: 17:53
 */
/*
 * 获取文章内容中的图片
 * string $str 含有图片链接的字符串
 * array  $data 返回图片数组
 */
function get_ueditor_image_path($str){
    $preg='/\/Upload\/ueditor\/\d*\/\d*\.[jpg|jpeg|png|bmp|gif]*/i';
    preg_match_all($preg, $str,$data);
    return current($data);
}
function get_ueditor_image_path_bendi($str){
     $img_url = ltrim(C('UPLOAD_IMG_URL'),'/');
    $arr = explode('/',$img_url);
    $zz_str = '';
    foreach ($arr as $v){
        $zz_str .= '\/'.$v;
    }
    $preg='/'.$zz_str.'\/\d*\/\d*\.[jpg|jpeg|png|bmp|gif]*/i';
    preg_match_all($preg, $str,$data);
    return current($data);
}
//更改上传图片路径，方便删除编辑器中多余的图片
function messageUploadImage($content){
    $date = date('Ymd',time());
    $image_url_u = './Upload/ueditor';
    $u_image_url = '.'.C('UPLOAD_IMG_URL').'/'.$date;//定义上传图片的路径
    if (!is_dir($u_image_url)){
        mkdir($u_image_url);
    }
    $img_arr = get_ueditor_image_path($content);
    $i_url = array();
    if (empty($img_arr)){
            //删除编辑器上传的文件夹
        del_dir($image_url_u);
        return $i_url;exit;
        }else {
            foreach ($img_arr as $v) {
                $img_name_new =  $u_image_url.'/'.ltrim(strrchr($v,'/'),'/');
                copy('.'.$v, $img_name_new);
                $i_url[] = ltrim($img_name_new,'.');
            }
            del_dir($image_url_u);
            return $i_url;
        }
}
//遍历删除目录下的所有文件
function del_dir($dir) {
    if (!is_dir($dir)) {
        return false;
    }
        $handle = opendir($dir);
        while (($file = readdir($handle)) !== false) {
            if ($file != "." && $file != "..") {
                is_dir("$dir/$file") ? del_dir("$dir/$file") : @unlink("$dir/$file");
            }
        }
        if (readdir($handle) == false) {
            closedir($handle);
            @rmdir($dir);
        }
}
function returnApiMessage($flag = '', $msg = null, $data = null) {
    $result = array(
        'flag' => $flag,
        'msg' => $msg,
        'data' => $data,
    );
    return json_encode($result);
}
function selectLogo($logo_id){
    $model = M('ArticleLogo');
    if (empty($logo_id)){
        $logoDate = $model->select();
        return $logoDate;
    }else{
        $logoOne = $model->where("logo_id = {$logo_id}")->find();
        return $logoOne['css_name'];
    }
}

function selectLabel($lid){
    return M('ArticleLabel')->where("lid={$lid}")->getField('name');
}
function selectType($tid){
    return M('ArticleType')->where("tid={$tid}")->getField('name');
}
function openPage($count,$limit){
    return new \Org\Hl\Page($count,$limit);
}
//config
function writeWebConfig($data) {
    $str=<<<php
<?php
return array(
//*************************************网站设置****************************************
    'WEB_STATUS'                =>  '{$data['WEB_STATUS']}',           //网站状态1:开启 0:关闭
    'WEB_CLOSE_WORD'            =>  '{$data['WEB_CLOSE_WORD']}',       //网站关闭时提示文字
    'WEB_ICP_NUMBER'            =>  '{$data['WEB_ICP_NUMBER']}',       // 网站ICP备案号
    'ADMIN_EMAIL'               =>  '{$data['ADMIN_EMAIL']}',          // 站长邮箱
    'WEB_K_ARR'                 =>array(
       'name'=>'{$data['WEB_K_ARR_NAME']}',
       'css_name'=>'{$data['WEB_K_ARR_CSS_NAME']}'
    ),
    //*************************************优化推广****************************************
    'WEB_NAME'                  =>  '{$data['WEB_NAME']}',             //网站名：
    'WEB_KEYWORDS'              =>  '{$data['WEB_KEYWORDS']}',         //网站关键字
    'WEB_DESCRIPTION'           =>  '{$data['WEB_DESCRIPTION']}',      //网站描述
    'COPYRIGHT_WORD'            =>  '{$data['COPYRIGHT_WORD']}',       //文章保留版权提示

//*************************************水印设置****************************************
//    'WATER_TYPE'                =>  '1',           //水印类型 0:不使用水印 1:文字水印 2:图片水印 3:文字和图片水印同时使用
//    'TEXT_WATER_WORD'           =>  'baijunyao.com',      //文字水印内容
//    'TEXT_WATER_TTF_PTH'        =>  './Public/static/font/ariali.ttf',   //文字水印字体路径
//    'TEXT_WATER_FONT_SIZE'      =>  '15', //文字水印文字字号
//    'TEXT_WATER_COLOR'          =>  '#008CBA',     //文字水印文字颜色
//    'TEXT_WATER_ANGLE'          =>  '0',     //文字水印文字倾斜程度
//    'TEXT_WATER_LOCATE'         =>  '9',    //文字水印位置 1：上左 2：上中 3：上右 4：中左 5：中中 6：中右 7：下左 8：下中 9：下右
//    'IMAGE_WATER_PIC_PTAH'      =>  './Upload/image/logo/logo.png', //图片水印 水印路径
//    'IMAGE_WATER_LOCATE'        =>  '9',   //图片水印 水印位置 1：上左 2：上中 3：上右 4：中左 5：中中 6：中右 7：下左 8：下中 9：下右
//    'IMAGE_WATER_ALPHA'         =>  '80',    //图片水印 水印透明度：0-100

//*************************************第三方登录****************************************
//    'QQ_APP_ID'                 =>  '',            // QQ登录APP D
//    'QQ_APP_KEY'                =>  '',           // QQ登录APP KEY
//    'SINA_API_KEY'              =>  '',         // 新浪登录API KEY
//    'SINA_SECRET'               =>  '',          // 新浪登录SECRET
//    'DOUBAN_API_KEY'            =>  '',       // 豆瓣登录API KEY
//    'DOUBAN_SECRET'             =>  '',        // 豆瓣登录SECRET
//    'RENREN_API_KEY'            =>  '',       // 人人登录API KEY
//    'RENREN_SECRET'             =>  '',        // 人人登录SECRET
//    'KAIXIN_API_KEY'            =>  '',       // 开心网登录API KEY
//    'KAIXIN_SECRET'             =>  '',        // 开心网登录SECRET
//    'GITHUB_CLIENT_ID'          =>  '',     // github登录API KEY
//    'GITHUB_CLIENT_SECRET'      =>  '', // github登录SECRET
//    'SOHU_API_KEY'              =>  '',         // 搜狐网登录API KEY
//    'SOHU_SECRET'               =>  '',          // 搜狐网登录SECRT
//***********************************其他第三方接口****************************************
//    'WEB_STATISTICS'            =>  '',       // 第三方统计代码
//    'BAIDU_SITE_URL'            =>  '',       // 百度推送site提交接
//***********************************邮箱设置***********************************************
//    'EMAIL_SMTP'                =>  '',           //  SMTP服务器
//    'EMAIL_USERNAME'            =>  '',       //  邮箱用户名
//    'EMAIL_PASSWORD'            =>  '',       //  邮箱密码
//    'EMAIL_FROM_NAME'           =>  '',      //  发件名
//***********************************评论管理***********************************************
//    'COMMENT_REVIEW'            =>  '1',       // 评论审核1:开启 0:关闭
//    'COMMENT_SEND_EMAIL'        =>  '0',   // 被评论邮件通知1:开启 0:关闭
//    'EMAIL_RECEIVE'             =>  '',        // 接收评论通知邮箱
//******************************上传图片***********************************
    'UPLOAD_IMG_URL'        =>'{$data['UPLOAD_IMG_URL']}',//书写格式    /xxxx/xxx/xxx
    'DEFAULT_IMG_URL'       =>'{$data['DEFAULT_IMG_URL']}'

);
php;
    file_put_contents('./Application/Common/Conf/webconfig.php', $str);
    return true;
}
function subText($str,$len)
{
    $length = mb_strlen($str,"utf-8");
    if($length > $len)
    {
        $str = mb_substr($str,0,$len,"utf-8")."...";
    }
    return $str;
}
//处理U函数url
function RU($url){
    // 兼容 category/:cid\d 路由
    if(preg_match('/\/index.php\/Home\/Index\/category\/tid\/\d+/', $url)){
        $url=str_replace(array('/index.php/Home/Index','/tid'), '', $url);
    }
    // 兼容article/cid/:cid\d/:aid\d
    if(preg_match('/\/index.php\/Home\/Index\/label\/lid\/\d+/', $url)){
        $url=str_replace(array('/index.php/Home/Index','/lid'), '', $url);
    }
    // 兼容 article/tid/:tid\d/:aid\d
    if(preg_match('/\/index.php\/Home\/Index\/article\/aid\/\d+/', $url)){
        $url=str_replace(array('/index.php/Home/Index','/aid'), '', $url);
    }
    if(preg_match('/\/index.php\/Home\/Index\/search.html/', $url)){
        $url=str_replace('/index.php/Home/Index', '', $url);
        //$url=str_replace('keywords', 'sw', $url);
    }
    if(preg_match('/\/index.php\/Home\/Knowledge\/index.html/', $url)){
        $url=str_replace(array('/index.php/Home','/index'), '', $url);
    }
    if(preg_match('/\/index.php\/Home\/Knowledge\/One\/kid\/\d+/', $url)){
        $url=str_replace(array('/index.php/Home','/One/kid'), '', $url);
    }
    return $url;
}