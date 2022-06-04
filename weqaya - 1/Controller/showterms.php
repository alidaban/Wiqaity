<html>
<head>
</head>
<body>
        <input type=button id=btn value="show more"></button><br>
        <ul class="list">
        	<li></li>
        </ul>
        <script src="../js/jquery-3.2.1.min.js"></script>
        <script language=javascript>
                    var init = 7;

            $(document).ready(function () {

            $("#btn").click(function () {
            $.getJSON(
            'get_terms_json.php', //الرابط اللي طالبينه
            {'init': init }, //عشان الكاش
            function (data) {//دالة النجاح
                for(var i=0;i<data.details.length;i++){
                    $(".list").append("<li>term:" + data.details[i].term + "<br> definition " +data.details[i].definition+"</li>");
                }
                init = init + 3;
            });
        });
});
        </script>

</body>