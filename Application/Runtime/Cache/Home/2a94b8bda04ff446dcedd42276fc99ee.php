<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
  <title>大学生导航</title>
  <link rel="stylesheet" href="/nav/Public/css/base.css">
  <link rel="stylesheet" href="/nav/Public/css/jquery.dataTables.css">
  <link rel="stylesheet" href="/nav/Public/css/table.css">
  <link rel="stylesheet" href="/nav/Public/css/index.css">
</head>
<body>
  <div class="container">
  <table id="user_table">
    <thead>
      <?php if(is_array($key)): foreach($key as $key=>$k): ?><th><?php echo ($k); ?></th><?php endforeach; endif; ?>

      <th>操作</th>
    </thead>
    <tbody>
      <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
        <?php if(is_array($vo)): foreach($vo as $key=>$value): ?><td><?php echo ($value); ?></td><?php endforeach; endif; ?>
        <td><a href="<?php echo U('Index/detail',array('id'=>$vo['id']));?>">【详情】</a>
          <a href="<?php echo U('Index/modify',array('id'=>$vo['id']));?>">【修改】</a>
        </td>
      </tr><?php endforeach; endif; ?>
  </tbody>
  </table>
</div>

</body>
<script src="/nav/Public/js/jquery-2.2.3.min.js"></script>
<script src="/nav/Public/js/jquery.dataTables.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#user_table').DataTable({
        language: {
            "sProcessing": "处理中...",
            "sLengthMenu": "显示 _MENU_ 项结果",
            "sZeroRecords": "没有匹配结果",
            "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
            "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
            "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
            "sInfoPostFix": "",
            "sSearch": "搜索:",
            "sUrl": "",
            "sEmptyTable": "表中数据为空",
            "sLoadingRecords": "载入中...",
            "sInfoThousands": ",",
            "oPaginate": {
                "sFirst": "首页",
                "sPrevious": "上页",
                "sNext": "下页",
                "sLast": "末页"
            },
            "oAria": {
                "sSortAscending": ": 以升序排列此列",
                "sSortDescending": ": 以降序排列此列"
            }
        }
    });
});
</script>
</html>