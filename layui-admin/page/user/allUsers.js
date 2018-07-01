layui.config({
	base : "js/"
}).use(['form','layer','jquery','laypage'],function(){



	//添加会员
	$(".usersAdd_btn").click(function(){
		var index = layui.layer.open({
			title : "添加会员",
			type : 2,
            area: ['800px', '500px'],
			content : "addUser.php",
			success : function(){
				layui.layer.tips('点击此处返回文章列表', '.layui-layer-setwin .layui-layer-close', {
					tips: 2,
				});
			}
		})
		//改变窗口大小时，重置弹窗的高度，防止超出可视区域（如F12调出debug的操作）
		$(window).resize(function(){
			layui.layer.full(index);
		})
		layui.layer.full(index);
	})

        
})