<html>

<body>
    <script language="javascript" type="text/javascript">
        //Checking Browser Compatibility
        function runAjax() {
            var ajaxHttpRequest; // Key variable that is necessary for AJAX
            try {
                // Opera 8.0+, Firefox, Safari
                ajaxHttpRequest = new XMLHttpRequest();
            } catch (e) {
                // Internet Explorer Browsers
                try {
                    ajaxHttpRequest = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e) {
                    try {
                        ajaxHttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (e) {
                        // Something went wrong
                        alert("Your browser is not working!");
                        return false;
                    }
                }
            }
            //Setting up ajax to update the page on receiving the query results
            ajaxHttpRequest.onreadystatechange = function() {
                if (ajaxHttpRequest.readyState == 4) {
                    var displayResponse = document.getElementById('result');
                    displayResponse.innerHTML = ajaxHttpRequest.responseText;
                }
            }
            //Setting up ajax to update the page on receiving the query results
            ajaxHttpRequest.onreadystatechange = function() {
                if (ajaxHttpRequest.readyState == 4) {
                    var displayResponse = document.getElementById('result');
                    displayResponse.innerHTML = ajaxHttpRequest.responseText;
                }
            }

            //Sending the input data to server-side
            var bill = document.getElementById('bill').value;
            var year = document.getElementById('year').value;
            var gender = document.getElementById('gender').value;
            var queryString = "?bill=" + bill;

            queryString += "&year=" + year + "&gender=" + gender;
            ajaxHttpRequest.open("GET", "customerdetail.php" + queryString, true);
            ajaxHttpRequest.send(null);
        }
    </script>
    <form name='customerForm'>
        Tất cả bill của khách hàng: <input type='number' id='bill'/> <br />
        Năm khách hàng tham gia: <input type='number' id='year'/>
        <br />
        Gender: 
        <select id='gender'>
            <option value="m">m</option>
            <option value="f">f</option>
        </select>
        <input type='button' onclick='runAjax()' value='Submit' />
    </form>
    <div id='result'>Dữ liệu của bạn sẽ được hiển thị ở dưới đây</div>
</body>
</html>