<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(init);

	function init(){
		$("#letter").change(getLetterChange);
		//$("#letter").on("change",function(){});
		/*$("#letterNumber option").each(function(k,v){
			//console.log(k,v)
			$(v).text("A" + (k+1));
		});	手動加上初始值*/
		$("#letter").trigger("change");//開始後就假裝觸發一次，更新選項值
	}

	function getLetterChange(){
		var l = $("#letter option:selected").text();
		var phpUrl = "getLetterNumber.php?letter=" + l;
		//$.get(url + l ,dataBackLetter);
		$.ajax({
			type: "get",
			url: phpUrl,
			success: function(e){
				dataBackLetter(e);
			}
		});
		//這裡如果使用promise可以同時對多個伺服器發送請求
	}

	function dataBackLetter(data){
		$("#letterNumber").html(data);
	}


</script>
</head>
<body>

<!--
 
畫面左右各有一個下拉式選單，
左邊的下拉式選單若選擇  A 這項時，右邉的下拉式選單要改成 A01, A02, A03, A04, A05;
左邊的下拉式選單若改選  B 這項時，右邉的下拉式選單要改成 B01, B02, B03, B04, B05;
左邊的下拉式選單若改選  C 這項時，右邉的下拉式選單要改成 C01, C02, C03, C04, C05

-->

	<form method="post" action="http://exec.hostzi.com/echo.php">
		<select name="letter" id="letter">
			<option value="0">A</option>
			<option value="1">B</option>
			<option value="2">C</option>
		</select>&nbsp;|&nbsp; 
		<select name="letterNumber" id="letterNumber">
			<option value="0">A01</option>
			<option value="1">B02</option>
			<option value="2">C03</option>
		</select> 
		<input type="submit" value="OK" /> 
	</form>

</body>
</html>