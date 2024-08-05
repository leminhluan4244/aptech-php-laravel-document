<html>

<body>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
    async function runAjax() {
      // Get form data
      const bill = document.getElementById('bill').value;
      const year = document.getElementById('year').value;
      const gender = document.getElementById('gender').value;

      // Build query string
      const queryString = `bill=${bill}&year=${year}&gender=${gender}`;

      try {
        // Make an Axios GET request
        const response = await axios.get(`customerdetail.php?${queryString}`);

        // Update the result element with the response data
        document.getElementById('result').innerHTML = response.data;
      } catch (error) {
        console.error('Error fetching data:', error);
        // Handle errors appropriately (e.g., display an error message to the user)
      }
    }
  </script>
  <form name='customerForm'>
    Tất cả bill của khách hàng: <input type='number' id='bill' /> <br />
    Năm khách hàng tham gia: <input type='number' id='year' /> <br />
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
