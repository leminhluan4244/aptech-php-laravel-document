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

        // Clear the result element (optional)
        document.getElementById('result').innerHTML = '';

        // Process JSON data
        const customers = response.data;

        // Create the table element dynamically
        const table = document.createElement('table');
        table.setAttribute('border', '1');

        // Create table header row
        const headerRow = document.createElement('tr');
        headerRow.appendChild(createTH('Name'));
        headerRow.appendChild(createTH('Total Bill'));
        headerRow.appendChild(createTH('Year Joined'));
        headerRow.appendChild(createTH('Gender'));
        table.appendChild(headerRow);

        // Create table rows for each customer
        for (const customer of customers) {
          const row = document.createElement('tr');
          row.appendChild(createTD(customer.name));
          row.appendChild(createTD(customer.bill));
          row.appendChild(createTD(customer.year));
          row.appendChild(createTD(customer.gender));
          table.appendChild(row);
        }

        // Append the table to the result element
        document.getElementById('result').appendChild(table);
      } catch (error) {
        console.error('Error fetching data:', error);
        // Handle errors appropriately (e.g., display an error message to the user)
      }
    }

    function createTH(text) {
      const th = document.createElement('th');
      th.innerText = text;
      return th;
    }

    function createTD(text) {
      const td = document.createElement('td');
      td.innerText = text;
      return td;
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
  <div id='result'></div>
</body>

</html>
