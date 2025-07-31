<main class="flex-1 h-full overflow-x-hidden overflow-y-auto bg-gray-100">
  <div class="mt-8 px-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-8">
      
      <!-- Value Card -->
      <div class="flex items-center justify-between p-8 bg-white rounded-2xl shadow-md">
        <div class="ml-4">
          <h6 class="text-5xs font-semibold tracking-wide text-green-500 uppercase">Value</h6>
          <div class="text-3xl font-bold text-gray-700 mt-2">00</div>
        </div>
        <svg class="w-14 h-14 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </div>

      <!-- Stock Card -->
      <div class="flex items-center justify-between p-8 bg-white rounded-2xl shadow-md">
        <div class="ml-4">
          <h6 class="text-5xs font-semibold tracking-wide text-green-500 uppercase">Stock</h6>
          <div class="text-3xl font-bold text-gray-700 mt-2"><?= $stockProducts ?></div>
        </div>
        <svg class="w-14 h-14 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
        </svg>
      </div>

      <!-- Orders Card -->
      <div class="flex items-center justify-between p-8 bg-white rounded-2xl shadow-md">
        <div class="ml-4">
          <h6 class="text-5xs font-semibold tracking-wide text-green-500 uppercase">Orders</h6>
          <div class="text-3xl font-bold text-gray-700 mt-2">00</div>
        </div>
        <svg class="w-14 h-14 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
        </svg>
      </div>

      <!-- Products Card -->
      <div class="flex items-center justify-between p-8 bg-white rounded-2xl shadow-md">
        <div class="ml-4">
          <h6 class="text-5xs font-semibold tracking-wide text-green-500 uppercase">Products</h6>
          <div class="text-3xl font-bold text-gray-700 mt-2"><?= $totalProducts ?></div>
        </div>
        <svg class="w-14 h-14 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
        </svg>
      </div>
    </div>

      <!-- Chart -->
      <div class="flex flex-col justify-between md:flex-row gap-8 w-full mt-8">
        <div class="bg-white p-4 rounded-xl shadow-md flex-1">
          <h3 class="text-lg font-semibold mb-2 text-green-500 ">Products Sales</h3>
          <canvas id="salesChart" ></canvas>
        </div>
        <div class="flex-1 bg-white p-4 rounded-xl shadow-md">
          <h3 class="text-lg font-semibold text-green-500 mb-4">Out of Stock Products</h3>
          <div class="overflow-x-auto mx-auto h-48 overflow-y-auto custom-scroll">
            <table id="outOfStockTable" class="w-full table-auto border-collapse">
              <!-- <thead>
                <tr class="bg-green-500 text-white uppercase text-xs sm:text-sm leading-normal">
                  <th class="py-3 px-6 text-left text-5sml">Image</th>
                  <th class="py-3 px-6 text-5sml">Name</th>
                  <th class="py-3 px-6 text-5sml">Stock</th>
                </tr>
              </thead> -->
              <tbody id="outOfStockList" class="bg-white">

              </tbody>
            </table>
          </div>
        </div>
      </div>

  </div>
</main>



  <script>
  const salesCtx = document.getElementById('salesChart').getContext('2d');
  new Chart(salesCtx, {
    type: 'line',
    data: {
      labels: ['January', 'February', 'March', 'April', 'May', 'June',
               'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [
        {
          label: 'Sales',
          data: [0, 10, 5, 2, 20, 30, 45, 24, 18, 26, 35, 40],
          borderColor: 'green',
          backgroundColor: 'transparent',
          borderWidth: 2,
          tension: 0.4
        },
        {
          label: 'Earning',
          data: [15, 14, 11, 18, 30, 10, 25, 12, 22, 28, 33, 38],
          borderColor: '#4ade80',
          backgroundColor: 'rgba(6, 212, 27, 0.1)',
          borderWidth: 2,
          tension: 0.4,
          fill: true
        }
      ]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });


  fetch('../../Models/GetStockDataModel.php')
    .then(res => res.json())
    .then(products => {
      const tbody = document.getElementById('outOfStockList');
      products.forEach(p => {
        const row = document.createElement('tr');
        row.className = 'duration-200 rounded-lg shadow-md transition bg-white border-b border-green-500';
        const quantityCell = parseInt(p.stock_quantity) === 0
        ? `<td class="py-3 px-6 text-center text-sm text-red-600 font-semibold">Out Stock</td>`
        : `<td class="py-3 px-6 text-center text-sm">${p.stock_quantity}</td>`;

        row.innerHTML = `
          <td class="py-3 px-6 text-center text-sm">
            <img src="../Assets/images/uploads/${p.image}" alt="${p.name}" width="30">
          </td>
          <td class="py-3 px-6 text-center text-sm">${p.name}</td>
          ${quantityCell}
        `;
        tbody.appendChild(row);
      });
    });

</script>
